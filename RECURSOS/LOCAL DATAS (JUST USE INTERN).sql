/*
insert into estado (nombre) values ('Creado'),('Modificado'),('Eliminado') ;

insert into usuario (usuario,pwd,nombres,apellidos,correo,idEstado,firt_time);

values ('carlos', sha1('CEal2025*'), 'Carlos Elias', 'Acuña Lopez', 'carloseliaslopez2015@gmail.com', 1, 1),
	   ('m_vargas', sha1('filter_text'), 'Marvin Noel', 'Vargas Macías', 'mvargas@versateclatam.com', 1, 1),
       ('z_jarquin', sha1('filter_text'), 'system', 'system', 'system@gmail.com', 1, 1);
	
insert into rol (rolDescripcion, idEstado) values ('Administrador',1),('Usuario',1),('Operador',1) ; 

insert into opciones (opcionDescripcion, idEstado) values ('Agregar',1),('Modificar',1),('Eliminar',1),('Visualizar',1); 

insert into rolopciones (idRol, idOpciones) values (1,1),(1,2),(1,3),(2,1),(2,4); 

insert into rolusuario (idUsuario, idRol) values (1,1),(2,1),(3,1);

insert into intentos_permitido (idUsuario, num_intentos) values (1,5),(2,5),(3,5);

*/



