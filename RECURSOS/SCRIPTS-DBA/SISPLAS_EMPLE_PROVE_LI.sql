DROP TABLE IF EXISTS Empleados;
CREATE TABLE Empleados(
idEmpleados int auto_increment not null primary key,
nombre varchar(250)  null,
id varchar (25) null,
ubicacion int,
nombreEmpresa varchar (100) null,
areaLaboral varchar (100) null,
puesto varchar (100) null,
fechaIngreso date,
idEstado int,
origen varchar (25),
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
foreign key (ubicacion) references Pais(idPais),
foreign key (idEstado) references Estado(idEstado)
);

