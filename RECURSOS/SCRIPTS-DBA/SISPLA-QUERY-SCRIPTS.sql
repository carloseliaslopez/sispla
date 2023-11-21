
/* INSERT DE LAS TABLAS DE  AGREGAR */
/*
insert into estado (nombre) values	('Agregado');
insert into estado (nombre) values	('Modificado');
insert into estado (nombre) values	('Eliminado');
*/
/*INSERT DE LOS ROLES*/
/*
INSERT INTO ROL (rolDescripcion, idEstado) values ('Administrador', 1);
INSERT INTO ROL (rolDescripcion, idEstado) values (' Oficial de Cumplimiento', 1);
INSERT INTO ROL (rolDescripcion, idEstado) values ('Suplente', 1)
*/
/*INSERT USUARIO*/
INSERT INTO USUARIO (usuario,pwd,nombres,apellidos,correo,idEstado) 
VALUES ('cacuna',aes_encrypt('TEST_USER','THIS IS THE KEY'),'CARLOS','LOPEZ','carloseliaslopez2015@gmail.com',1);