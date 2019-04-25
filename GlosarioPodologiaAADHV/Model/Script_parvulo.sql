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

CREATE TABLE Palabra_Asignatura(
id INT AUTO_INCREMENT PRIMARY KEY,
fk_palabra INT REFERENCES Palabra (id),
fk_asignatura INT REFERENCES Asignatura (id)
);

CREATE TABLE Significado(
id INT AUTO_INCREMENT,
descripcion VARCHAR (100),
definicionRecomendada BOOLEAN,
fk_palabra_asignatura INT,
FOREIGN KEY (fk_palabra_asignatura) REFERENCES Palabra_Asignatura (id),
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

INSERT INTO Usuario VALUES(NULL,'Algun usuario',0,'1','pass','alguien@hotmail.com');
INSERT INTO Asignatura VALUES(NULL,'Alguna asignatura','algun codigo');
INSERT INTO Asignatura VALUES(NULL,'Otra mas','algun codigo');
INSERT INTO Asignatura_Usuario VALUES(NULL, '1', '1');
INSERT INTO Palabra VALUES(NULL,'Algo','Alguna sigla');
INSERT INTO Palabra_Asignatura VALUES(NULL, '1', '1');
INSERT INTO Significado VALUES(NULL,'Alguna definicion cualquiera',0,1);
INSERT INTO Ejemplo VALUES(NULL,'Algun ejemplo cualquiera','alguna url',1);

INSERT INTO Usuario VALUES(NULL,'Algun usuario',0,'123','pass','alguien@hotmail.com');
INSERT INTO Asignatura VALUES(NULL,'Alguna asignatura','algun codigo');
INSERT INTO Asignatura VALUES(NULL,'Otra mas','algun codigo');
INSERT INTO Asignatura_Usuario VALUES(NULL, '1', '1');
INSERT INTO Palabra VALUES(NULL,'Algo','Alguna sigla');
INSERT INTO Palabra_Asignatura VALUES(NULL, '1', '1');
INSERT INTO Significado VALUES(NULL,'Alguna definicion cualquiera',0,1);
INSERT INTO Ejemplo VALUES(NULL,'Algun ejemplo cualquiera','alguna url',1);


/*
SELECT * FROM Usuario;
SELECT * FROM Asignatura;
SELECT * FROM Asignatura_Usuario;
SELECT * FROM Palabra;
SELECT * FROM Palabra_Asignatura;
SELECT * FROM Significado;
SELECT * FROM Ejemplo;
*/



/*
DROP DATABASE bd_parvulo;
*/