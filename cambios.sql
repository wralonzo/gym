CREATE TABLE `membresia` (
  `id_membresia` int NOT NULL AUTO_INCREMENT,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_membresia`)
)

ALTER TABLE cliente ADD id_membresia int NULL;

ALTER TABLE gym.cliente ADD CONSTRAINT cliente_FK FOREIGN KEY (id_membresia) REFERENCES gym.membresia(id_membresia);


INSERT INTO dias (nombre) VALUES('Lunes');
INSERT INTO dias (nombre) VALUES('Martes');
INSERT INTO dias (nombre) VALUES('Miercoles');
INSERT INTO dias (nombre) VALUES('Jueves');
INSERT INTO dias (nombre) VALUES('Viernes');
INSERT INTO dias (nombre) VALUES('Sabado');
INSERT INTO dias (nombre) VALUES('Domingo');