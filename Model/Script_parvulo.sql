CREATE DATABASE bd_parvulo;
/* DROP DATABASE bd_parvulo; */
USE bd_parvulo;


CREATE TABLE Usuario(
id INT AUTO_INCREMENT,
nombre VARCHAR (100),
esProfesor BOOLEAN,
rut  VARCHAR (13) UNIQUE,
contrasenia VARCHAR (16),
correo VARCHAR (50),
PRIMARY KEY(id)
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

INSERT INTO Usuario VALUES(NULL,'Marcelo',0,'1','pass','cheloz_20@hotmail.com');
INSERT INTO Asignatura VALUES(NULL,'Arquitectura de Software','ARQ');
INSERT INTO Asignatura_Usuario VALUES(NULL, '1', '1');



INSERT INTO Palabra VALUES(NULL,'Patrón','Arqu');
INSERT INTO Palabra_Asignatura_Usuario VALUES(NULL, '1', '1');

INSERT INTO Significado VALUES(NULL,'Una forma de diseñar un sw',1,1);
INSERT INTO Ejemplo VALUES(NULL,'El patrón MVC','No disponible',1);


/*
SELECT palabra.id, palabra.nombre, palabra.sigla FROM Palabra, Asignatura_Usuario, Palabra_Asignatura_Usuario
WHERE Asignatura_Usuario.fk_usuario =1 AND Palabra_Asignatura_Usuario.fk_asignatura_usuario=1;

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
DROP DATABASE bd_parvulo;
*/