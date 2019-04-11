CREATE DATABASE bd_glosario_podologia;

USE bd_glosario_podologia;

CREATE TABLE Palabra(
id INT AUTO_INCREMENT,
nombre VARCHAR (100),
PRIMARY KEY(id)
);

CREATE TABLE Significado(
id INT AUTO_INCREMENT,
definicion VARCHAR (100),
fk_palabra INT,
FOREIGN KEY (fk_palabra) REFERENCES palabra (id),
PRIMARY KEY(id)
);

CREATE TABLE Ejemplo(
id INT AUTO_INCREMENT,
descripcionEj VARCHAR (100),
fk_palabra INT,
FOREIGN KEY (fk_palabra) REFERENCES palabra (id),
PRIMARY KEY(id)
);

INSERT INTO Palabra VALUES(NULL,'Algo');
INSERT INTO Significado VALUES(NULL,'Alguna definicion cualquiera',1);
INSERT INTO Ejemplo VALUES(NULL,'Algun ejemplo cualquiera',1);



/*
DROP DATABASE bd_glosario_podologia;
*/