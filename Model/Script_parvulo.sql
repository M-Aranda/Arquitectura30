CREATE DATABASE bd_parvulo;
/* DROP DATABASE bd_parvulo; */
USE bd_parvulo;

CREATE TABLE anio_ingreso(
	id INT AUTO_INCREMENT PRIMARY KEY,
    anio INT
);



CREATE TABLE Usuario(
id INT AUTO_INCREMENT,
nombre VARCHAR (100),
esProfesor BOOLEAN,
rut  VARCHAR (13) UNIQUE,
contrasenia VARCHAR (16),
correo VARCHAR (50),
PRIMARY KEY(id)
);

CREATE TABLE anio_usuario(
	id INT AUTO_INCREMENT PRIMARY KEY,
    fk_anio_ingreso INT REFERENCES anio_ingreso (id),
    fk_usuario INT REFERENCES usuario (id)
);

CREATE TABLE Asignatura(
id INT AUTO_INCREMENT,
nombre VARCHAR (30),
codigo VARCHAR (30),
PRIMARY KEY(id)
);

CREATE TABLE Asignatura_Usuario(
id INT AUTO_INCREMENT PRIMARY KEY,
fk_usuario INT REFERENCES Usuario (id),
fk_asignatura INT REFERENCES Asignatura (id)
);



CREATE TABLE Palabra(
id INT AUTO_INCREMENT,
nombre VARCHAR (100),
sigla VARCHAR (50),
PRIMARY KEY(id)
);

CREATE TABLE Palabra_Asignatura_Usuario(
id INT AUTO_INCREMENT PRIMARY KEY,
fk_palabra INT REFERENCES Palabra (id),
fk_asignatura_usuario INT REFERENCES Asignatura_Usuario (id)
);



CREATE TABLE Significado(
id INT AUTO_INCREMENT,
descripcion VARCHAR (100),
definicionRecomendada BOOLEAN,
fk_palabra_asignatura_usuario INT,
FOREIGN KEY (fk_palabra_asignatura_usuario) REFERENCES Palabra_Asignatura_Usuario (id),
PRIMARY KEY(id)
);

CREATE TABLE Ejemplo(
id INT AUTO_INCREMENT,
fraseExplicativa VARCHAR (100),
url_imagen VARCHAR (200),
fk_significado INT,
FOREIGN KEY (fk_significado) REFERENCES Significado (id),
PRIMARY KEY(id)
);

INSERT INTO Usuario VALUES(NULL,'Carla',0,'1','123','ccar@hotmail.com');
INSERT INTO Usuario VALUES(NULL,'Francisca',0,'12','pass','fran@hotmail.com');
INSERT INTO Usuario VALUES(NULL,'Lena',0,'123','sami','sam@hotmail.com');
INSERT INTO Usuario VALUES(NULL,'Samantha',1,'333','aaa','sam@hotmail.com');
INSERT INTO Usuario VALUES(NULL,'Alumnos sin asignaturas',0,'111','qqq','sam@hotmail.com');

INSERT INTO anio_ingreso VALUES(NULL, 2017);

INSERT INTO anio_usuario VALUES(NULL, 1, 1);
INSERT INTO anio_usuario VALUES(NULL, 1, 3);

INSERT INTO Asignatura VALUES(NULL,'Conceptos de juego','C');
INSERT INTO Asignatura VALUES(NULL,'Niñez explicada','NE');
INSERT INTO Asignatura VALUES(NULL,'Pedadogía básica','PB');
INSERT INTO Asignatura VALUES(NULL,'Religion','RG');

INSERT INTO Asignatura_Usuario VALUES(NULL, '1', '1');
INSERT INTO Asignatura_Usuario VALUES(NULL, '1', '2');
INSERT INTO Asignatura_Usuario VALUES(NULL, '1', '3');
INSERT INTO Asignatura_Usuario VALUES(NULL, '2', '1');
INSERT INTO Asignatura_Usuario VALUES(NULL, '2', '2');
INSERT INTO Asignatura_Usuario VALUES(NULL, '2', '3');

INSERT INTO Asignatura_Usuario VALUES(NULL, '3', '1');
INSERT INTO Asignatura_Usuario VALUES(NULL, '3', '2');
INSERT INTO Asignatura_Usuario VALUES(NULL, '3', '3');
INSERT INTO Asignatura_Usuario VALUES(NULL, '3', '4');

INSERT INTO Palabra VALUES(NULL,'Xilófono','XLFN');
INSERT INTO Palabra VALUES(NULL,'Compás','CMPS');
INSERT INTO Palabra VALUES(NULL,'Tambor','TMBR');


INSERT INTO Palabra_Asignatura_Usuario VALUES(NULL, '1', '1');
INSERT INTO Palabra_Asignatura_Usuario VALUES(NULL, '2', '1');
INSERT INTO Palabra_Asignatura_Usuario VALUES(NULL, '3', '1');

INSERT INTO Significado VALUES(NULL,'Instrumento musical',0,1);
INSERT INTO Ejemplo VALUES(NULL,'El xilófono se toca poco','No disponible',1);

INSERT INTO Significado VALUES(NULL,'Instrumento musical',0,2);
INSERT INTO Ejemplo VALUES(NULL,'El compas se toca poco','No disponible',2);

INSERT INTO Significado VALUES(NULL,'Instrumento musical de percusión',0,3);
INSERT INTO Ejemplo VALUES(NULL,'El tambor se toca poco','No disponible',3);
INSERT INTO Ejemplo VALUES(NULL,'El tambor  suena fuerte','No disponible',3);



DELIMITER //
CREATE PROCEDURE return_usuario_by_ingreso_and_asignatura(id_anio INT, id_asignatura INT)
	BEGIN
		SELECT
			Usuario.id,
            Usuario.nombre
		FROM
			Usuario,
            anio_usuario,
            Asignatura_Usuario
		WHERE
			anio_usuario.fk_usuario = Usuario.id AND
            anio_usuario.fk_anio_ingreso = id_anio AND
            Asignatura_Usuario.fk_usuario = Usuario.id AND
            Asignatura_Usuario.fk_asignatura = id_asignatura;
	END //
DELIMITER ;

-- DROP PROCEDURE return_usuario_by_ingreso_and_asignatura;  --Su drop procedure piola después de crear el procedimiento necesario....

/*
SELECT palabra.id, palabra.nombre, palabra.sigla FROM Usuario, Palabra, Asignatura_Usuario, Palabra_Asignatura_Usuario
WHERE Asignatura_Usuario.fk_usuario =1 AND Palabra_Asignatura_Usuario.fk_asignatura_usuario=1 AND Palabra.id=Palabra_Asignatura_Usuario.fk_palabra AND
Palabra_Asignatura_Usuario.fk_asignatura_usuario=Asignatura_Usuario.id;
SELECT * FROM Significado WHERE fk_palabra_asignatura_usuario=1;
SELECT * FROM Ejemplo WHERE fk_significado=1;
*/

/*
SELECT * FROM Usuario;
SELECT * FROM Asignatura;
SELECT * FROM Asignatura_Usuario;
SELECT * FROM Palabra;
SELECT * FROM Palabra_Asignatura_Usuario;
SELECT * FROM Significado;
SELECT * FROM Ejemplo;
*/


/*
Para borrar palabras
DELETE FROM Ejemplo WHERE fk_significado=1; 
DELETE FROM Significado WHERE fk_palabra_asignatura_usuario=1;
DELETE FROM Palabra_Asignatura_Usuario WHERE id=1;
*/

/*
DROP DATABASE bd_parvulo;
*/