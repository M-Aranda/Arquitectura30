DROP DATABASE bd_parvulo;

CREATE DATABASE bd_parvulo;

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
fk_usuario  INT,
FOREIGN KEY (fk_usuario) REFERENCES Usuario(id),
PRIMARY KEY(id)
);

CREATE TABLE Palabra(
id INT AUTO_INCREMENT,
nombre VARCHAR (100),
sigla VARCHAR (50),
fk_asignatura INT,
FOREIGN KEY (fk_asignatura) REFERENCES Asignatura (id),
PRIMARY KEY(id)
);

CREATE TABLE Significado(
id INT AUTO_INCREMENT,
descripcion VARCHAR (100),
definicionRecomendada BOOLEAN,
fk_palabra INT,
FOREIGN KEY (fk_palabra) REFERENCES palabra (id),
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
INSERT INTO Asignatura VALUES(NULL,'Alguna asignatura','algun codigo', 1);
INSERT INTO Palabra VALUES(NULL,'Algo','Alguna sigla',1);
INSERT INTO Significado VALUES(NULL,'Alguna definicion cualquiera',0,1);
INSERT INTO Ejemplo VALUES(NULL,'Algun ejemplo cualquiera','alguna url',1);

INSERT INTO Usuario VALUES(NULL,'Administrador',1,'111-1','admin','admin@example.com');

/*
SELECT * FROM Palabra;
*/



/*
DROP DATABASE bd_parvulo;
*/