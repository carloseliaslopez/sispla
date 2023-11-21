/*INSERT DE ESTADOS*/
INSERT INTO estado (nombre) VALUES ('Creado'),('Modificado'), ('Eliminado');

/*INSERT DE USUARIOS */
INSERT INTO Usuario (usuario, pwd, nombres, apellidos, correo, idEstado) VALUES ('carlos',sha1('carlos_lopez'),'Carlos Elias', 'Acuña Lopez', 'carloseliaslopez2015@gmail.com',1);
INSERT INTO Usuario (usuario, pwd, nombres, apellidos, correo, idEstado) VALUES ('temporal',sha1('temporal'),'system', 'system', 'system',1);
/*INSERT ROLES*/
insert into rol (rolDescripcion, idEstado) values ('Administrador',1);
insert into rol (rolDescripcion, idEstado) values ('Usuario',1);

/*INSERT DE FORMAS DE PAGOS*/
INSERT INTO FormaPago (nombreFormaPago,riesgoFP,idEstado,usuario_creacion,fecha_creacion) VALUES ('Efectivo',3,1,1,current_timestamp());
INSERT INTO FormaPago (nombreFormaPago,riesgoFP,idEstado,usuario_creacion,fecha_creacion) VALUES ('Cheque',2,1,1,current_timestamp());
INSERT INTO FormaPago (nombreFormaPago,riesgoFP,idEstado,usuario_creacion,fecha_creacion) VALUES ('Depósito',2,1,1,current_timestamp());
INSERT INTO FormaPago (nombreFormaPago,riesgoFP,idEstado,usuario_creacion,fecha_creacion) VALUES ('Transferencia Local',2,1,1,current_timestamp());
INSERT INTO FormaPago (nombreFormaPago,riesgoFP,idEstado,usuario_creacion,fecha_creacion) VALUES ('Transferencia Internacional',3,1,1,current_timestamp());

/*INSERT DE FUENTE DE LOS FONDOS*/
INSERT INTO fuentefondos (nombreFuenteFondos, riesgoFF, idEstado, usuario_creacion, fecha_creacion) VALUES ('Operaciones del Negocio',2,1,1,current_timestamp());
INSERT INTO fuentefondos (nombreFuenteFondos, riesgoFF, idEstado, usuario_creacion, fecha_creacion) VALUES ('Salario',1,1,1,current_timestamp());
INSERT INTO fuentefondos (nombreFuenteFondos, riesgoFF, idEstado, usuario_creacion, fecha_creacion) VALUES ('Cuota de Socios',2,1,1,current_timestamp());
INSERT INTO fuentefondos (nombreFuenteFondos, riesgoFF, idEstado, usuario_creacion, fecha_creacion) VALUES ('Donaciones',3,1,1,current_timestamp());
INSERT INTO fuentefondos (nombreFuenteFondos, riesgoFF, idEstado, usuario_creacion, fecha_creacion) VALUES ('Presupuesto General de la República',2,1,1,current_timestamp());
INSERT INTO fuentefondos (nombreFuenteFondos, riesgoFF, idEstado, usuario_creacion, fecha_creacion) VALUES ('Venta y/o servicios',2,1,1,current_timestamp());
INSERT INTO fuentefondos (nombreFuenteFondos, riesgoFF, idEstado, usuario_creacion, fecha_creacion) VALUES ('Otros',2,1,1,current_timestamp());

/*INSERT DE TIPO DE PERSONA JURIDICA*/
INSERT INTO TipoPerJuridica (tipoPersona, calificacion, idEstado, usuario_creacion, fecha_creacion) VALUES ('Empresa', 3, 1,1,current_timestamp());
INSERT INTO TipoPerJuridica (tipoPersona, calificacion, idEstado, usuario_creacion, fecha_creacion) VALUES ('Entidad Pública', 2, 1,1,current_timestamp());
INSERT INTO TipoPerJuridica (tipoPersona, calificacion, idEstado, usuario_creacion, fecha_creacion) VALUES ('ONG', 3, 1,1,current_timestamp());

/*INSERT TIPO DE CONSTITUCION*/
INSERT INTO constitucion (fechaConstitucion, calificacion, idEstado, usuario_creacion,fecha_creacion) VALUES ('Menor a 2 años',3, 1,1,current_timestamp());
INSERT INTO constitucion (fechaConstitucion, calificacion, idEstado,usuario_creacion,fecha_creacion) VALUES ('Entre 2 y 5 años',2, 1,1,current_timestamp());
INSERT INTO constitucion (fechaConstitucion, calificacion, idEstado,usuario_creacion,fecha_creacion) VALUES ('Mayor a 5 años',1, 1,1,current_timestamp());

/*INSERT - Categoria salario*/
INSERT INTO categoriasalario (categoria, calificacion, idEstado, usuario_creacion, fecha_creacion) VALUES ('Asalariado', 1,1,1, current_timestamp());
INSERT INTO categoriasalario (categoria, calificacion, idEstado, usuario_creacion, fecha_creacion) VALUES ('Independiente', 3,1,1, current_timestamp());


