DROP TABLE IF EXISTS Empleados;
CREATE TABLE Empleados(
idEmpleados int auto_increment not null primary key,
nombre varchar (150),
id  varchar (150),
ubicacion varchar (100),
nombreEmpresa varchar (150),
areaLaboral varchar (150),
puesto varchar (100),
fechaIngreso datetime,
idEstado int,
origen varchar (15),

usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
foreign key (idEstado) references Estado(idEstado)
);

DROP TABLE IF EXISTS Proveedores;
CREATE TABLE Proveedores(
idProveedores int auto_increment not null primary key,
nombre varchar (150),
id varchar (50),
ubicacion varchar (150),
servicio varchar (150),
actividadEconomica varchar (250),
fechaIngreso datetime,
idEstado int,
origen varchar (15),

usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
foreign key (idEstado) references Estado(idEstado)
);

DROP TABLE IF EXISTS Empresa;
CREATE TABLE Empresa(
idEmpresa int auto_increment not null primary key,
razonSocial varchar (150),
idPaisOrigen int,
idEstado int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (idEstado) REFERENCES Estado(idEstado),
FOREIGN KEY (idPaisOrigen) REFERENCES Pais(idPais)
);

/*tabla para unir empleados y proveedore*/
Create view vw_busquedaInterna as 
select nombre, id, origen from empleados
union all 
select nombre, id, origen from empleados;

/*TABLAS PARA EL ALMACENAMIENTO DE PERSONAS OBLIGAS*/
drop view if exists vw_BusquedaInterna_Res;
CREATE VIEW vw_BusquedaInterna_Res AS
select po.idPersonasObligadas,po.nombre,po.identificacion,po.nacionalidad,po.idCircular, bi.nombre as 'concidencia', bi.origen from PersonasObligadas po
left join vw_busquedaInterna bi on po.nombre = bi.nombre;


/*2.3 Datos de los Accionistas*/
DROP TABLE IF EXISTS listas_riesgo;
CREATE TABLE listas_riesgo(
id_listas_riesgo int auto_increment not null primary key,
fechaIngreso date,
nombre varchar (150),
origen  varchar (50),
razon varchar (100),
idEstado int,

usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES usuario(idUsuario),
foreign key (idEstado) references estado(idEstado)
);