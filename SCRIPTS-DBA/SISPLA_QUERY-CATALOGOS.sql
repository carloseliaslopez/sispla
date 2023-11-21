/*3.2 PAISES  //Utilizado en todos los modulos*/
DROP TABLE IF EXISTS Pais;
CREATE TABLE Pais(
idPais int auto_increment not null primary key,
nombrePais varchar(25),
calificacion int,
idEstado int,
foreign key (idEstado) references Estado(idEstado)
);

/* 3. MODULO DE CATALOGOS (ADMINISTRACION DE LA BD)*/
/* 3.1 DEPARTAMENTOS //Utilizado en todos los modulos*/
DROP TABLE IF EXISTS Departamento;
CREATE TABLE Departamento(
idDepartamento int auto_increment not null primary key,
nombreDepartamento varchar(25)not null,
calificacion int,
idEstado int,
idPais int,
foreign key (idEstado) references Estado(idEstado),
foreign key (idPais) references Pais(idPais)
);


/*3.3 ESTADO CIVIL //Utilizado en los modulos de pic natural*/
DROP TABLE IF EXISTS EstadoCivil;
CREATE TABLE EstadoCivil(
idEstadoCivil int auto_increment not null primary key,
descripcion varchar(25),
idEstado int,
foreign key (idEstado) references Estado(idEstado)
);

/*3.4 Area Geografica //Utilizado en los modulos de pic natural-juridico*/
DROP TABLE IF EXISTS AreaGeografica;
CREATE TABLE AreaGeografica(
idAreaGeografica int auto_increment not null primary key,
nombreAreaGeografica varchar(25)not null,
idEstado int,
foreign key (idEstado) references Estado(idEstado)
);

/*3.5 Actividad del Negocio //Utilizado modulo de perfil*/
DROP TABLE IF EXISTS ActividadNegocio;
CREATE TABLE ActividadNegocio(
idActividadNegocio int auto_increment not null primary key,
nombreActividadNegocio varchar(25)not null,
idEstado int,
foreign key (idEstado) references Estado(idEstado)
);

/*3.6 Formas de Pago// Utilizado en modulo de perfil*/
DROP TABLE IF EXISTS FormaPago;
CREATE TABLE FormaPago(
idFormaPago int auto_increment not null primary key,
nombreFormaPago varchar(50)not null,
riesgoFP int,
idEstado int,
foreign key (idEstado) references Estado(idEstado)
);

/*3.7 Fuente de los fondos// Utilizado en modulo de perfil*/
CREATE TABLE FuenteFondos(
idFuenteFondos int auto_increment not null primary key,
nombreFuenteFondos varchar(50),
idEstado int,
foreign key (idEstado) references Estado(idEstado)
);

/* 3.8 Relaciones de los Clientes // TABLA ANTECESORA DE TABLA PEP*/
CREATE TABLE RelacionCliente(
idRelacionCliente int auto_increment not null primary key,
descripcion varchar (100),
idEstado int
);

/* 3.9 relacion Cliente Causa // TABLA ANTECESORA DE TABLA FACTA*/
CREATE TABLE Causa(
idCausa int auto_increment not null primary key,
descripcion varchar (250),
idEstado int
);






