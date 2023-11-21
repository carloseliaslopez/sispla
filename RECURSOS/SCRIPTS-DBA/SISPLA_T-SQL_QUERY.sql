/*CREACION DE LA BD DE DATOS*/
DROP DATABASE IF EXISTS SISPLA;
CREATE DATABASE SISPLA;
USE SISPLA;

/*TABLA DE CONTROL DE ESTADOS*/
DROP TABLE IF EXISTS Estado;
CREATE TABLE Estado(
idEstado int auto_increment not null primary key,
nombre varchar(15)
);

/*I. MODULO DE SEGURIDAD*/
/*01. Usuario*/
DROP TABLE IF EXISTS Usuario;
CREATE TABLE Usuario(
idUsuario int auto_increment not null primary key,
usuario varchar(45),
pwd varchar (150) ,
nombres varchar (50),
apellidos varchar (50),
correo varchar (50),
idEstado int,

foreign key (idEstado) references Estado(idEstado)
);

/*02. Rol*/
DROP TABLE IF EXISTS Rol;
CREATE TABLE Rol(
idRol int auto_increment not null primary key,
rolDescripcion varchar(70),
idEstado int,

foreign key (idEstado) references Estado(idEstado)
);

/*03. Opciones*/
DROP TABLE IF EXISTS Opciones;
CREATE TABLE Opciones(
idOpciones int auto_increment not null primary key,
opcionDescripcion varchar(70),
idEstado int,

foreign key (idEstado) references Estado(idEstado)
);

/*04. RolOpciones*/
DROP TABLE IF EXISTS RolOpciones;
CREATE TABLE RolOpciones(
idRolOpciones int auto_increment not null primary key,
idRol int,
idOpciones int,

foreign key (idRol) references Rol(idRol),
foreign key (idOpciones) references Opciones(idOpciones)
);

/*04. RolUsuario*/
DROP TABLE IF EXISTS RolUsuario;
CREATE TABLE RolUsuario(
idRolUsuario int auto_increment not null primary key,
idUsuario int,
idRol int,

foreign key (idUsuario) references Usuario(idUsuario),
foreign key (idRol) references Rol(idRol)
);

/* II. MODULO DE PERFIL CLIENTE*/
/*01. PIC --TABLA CENTRAL*/
DROP TABLE IF EXISTS Pic;
CREATE TABLE Pic(
idPic int auto_increment not null primary key,
fechaPic date,
nombreCliente varchar(350)  not null,
id varchar(50) ,
origen varchar (25) ,
categoria varchar (25) ,
fechaIngreso date,
idEstado int,
idEmpresa int,
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
FOREIGN KEY (idEmpresa) REFERENCES Empresa(idEmpresa)
);

/*3.2 PAISES  //Utilizado en todos los modulos*/
DROP TABLE IF EXISTS Pais;
CREATE TABLE Pais(
idPais int auto_increment not null primary key,
nombrePais varchar(25),
calificacion int,
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
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
foreign key (idEstado) references Estado(idEstado),
foreign key (idPais) references Pais(idPais)
);


/*3.3 ESTADO CIVIL //Utilizado en los modulos de pic natural*/
DROP TABLE IF EXISTS EstadoCivil;
CREATE TABLE EstadoCivil(
idEstadoCivil int auto_increment not null primary key,
descripcion varchar(25),
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
foreign key (idEstado) references Estado(idEstado)
);

/*3.4 Area Geografica //Utilizado en los modulos de pic natural-juridico*/
DROP TABLE IF EXISTS AreaGeografica;
CREATE TABLE AreaGeografica(
idAreaGeografica int auto_increment not null primary key,
nombreAreaGeografica varchar(25)not null,
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
foreign key (idEstado) references Estado(idEstado)
);

/*3.5 Actividad del Negocio //Utilizado modulo de perfil*/
DROP TABLE IF EXISTS ActividadNegocio;
CREATE TABLE ActividadNegocio(
idActividadNegocio int auto_increment not null primary key,
nombreActividadNegocio varchar(25)not null,
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
foreign key (idEstado) references Estado(idEstado)
);

/*3.6 Formas de Pago// Utilizado en modulo de perfil*/
DROP TABLE IF EXISTS FormaPago;
CREATE TABLE FormaPago(
idFormaPago int auto_increment not null primary key,
nombreFormaPago varchar(50)not null,
riesgoFP int,
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
foreign key (idEstado) references Estado(idEstado)
);

/*3.7 Fuente de los fondos// Utilizado en modulo de perfil*/
DROP TABLE IF EXISTS FuenteFondos;
CREATE TABLE FuenteFondos(
idFuenteFondos int auto_increment not null primary key,
nombreFuenteFondos varchar(50),
riesgoFF int,
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
foreign key (idEstado) references Estado(idEstado)
);

/* 3.8 Relaciones de los Clientes // TABLA ANTECESORA DE TABLA PEP*/
DROP TABLE IF EXISTS RelacionCliente;
CREATE TABLE RelacionCliente(
idRelacionCliente int auto_increment not null primary key,
descripcion varchar (100),
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
foreign key (idEstado) references Estado(idEstado)
);

/* 3.9 relacion Cliente Causa // TABLA ANTECESORA DE TABLA FACTA*/
DROP TABLE IF EXISTS Causa;
CREATE TABLE Causa(
idCausa int auto_increment not null primary key,
descripcion varchar (250),
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
foreign key (idEstado) references Estado(idEstado)
);


/*Tablas de datos de clientes juridicos*/
/*2.1 TBL- Datos generales del cliente */
drop table if exists DatosClienteJuridicoPic;
CREATE TABLE DatosClienteJuridicoPic(
idDatosClienteJuridicoPic int auto_increment not null primary key,
paisConstitucion int null,
deptoConstitucion int null,
fechaConstitucion date null,
fechaInscripcion date null,
correoPersonaContacto varchar(150) null,
nombrePersonaContacto varchar(200) null,
cargoPersonaContacto varchar (100) null,
paginaWeb varchar (50) null,
telefono varchar(25) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisConstitucion) references Pais(idPais),
foreign key (deptoConstitucion) references Departamento(idDepartamento),

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);


/*2.2 Datos del Representante Legal*/
DROP TABLE IF EXISTS DatosRepresentanteLegal;
CREATE TABLE DatosRepresentanteLegal(
idDatosRepresentanteLegal int auto_increment not null primary key,
nombreRepresentanteLegal varchar (150) not null,
paisNacimiento int null,
deptoPaisNacimiento int null,
nacionalidad int null,
deptoNacionalidad int null,
tipoIdentificacion  varchar(150) null,
numeroIdentificacion varchar(50) null,
paisEmision int null,
fechaEmision date null ,
fechaVencimiento date null ,
paisResidencia int null,
deptoPaisResidencia int null,
celular varchar(15) null,
correo varchar(150) null,
cargo varchar (150) null,
profesion varchar (100) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisNacimiento) references Pais(idPais),
foreign key (deptoPaisNacimiento) references Departamento(idDepartamento),
foreign key (nacionalidad) references Pais(idPais),
foreign key (deptoNacionalidad) references Departamento(idDepartamento),
foreign key (paisEmision) references Pais(idPais),
foreign key (paisResidencia) references Pais(idPais),
foreign key (deptoPaisResidencia) references Departamento(idDepartamento),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*2.3 Datos de los Accionistas*/
DROP TABLE IF EXISTS Accionistas;
CREATE TABLE Accionistas(
idAccionistas int auto_increment not null primary key,  
nombreCompletoAccionistas varchar (250) null,
nacionalidadAccionistas int null,
deptoNacionalidadAccionistas int null,
numIdAccionistas varchar(50) null,
Acciones float null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (nacionalidadAccionistas) references Pais(idPais),
foreign key (deptoNacionalidadAccionistas) references Departamento(idDepartamento),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*2.4 Datos de los Beneficiarios Finales*/
DROP TABLE IF EXISTS BeneficiariosFinales;
CREATE TABLE BeneficiariosFinales(
idBeneficiariosFinales int auto_increment not null primary key,
nombreBeneFinales varchar (150) null,
ApellidosBeneFinales varchar(150) null,
nacionalidadBeneFinales int null,
deptoNacionalidadBeneFinales int null,
numIdBeneFinales varchar(50) null,
AccionesBeneFinales float null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (nacionalidadBeneFinales) references Pais(idPais),
foreign key (deptoNacionalidadBeneFinales) references Departamento(idDepartamento),

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/* 2.5 Datos de la Actividad Economica*/
DROP TABLE IF EXISTS ActividadEconomica;
CREATE TABLE ActividadEconomica(
idActividadEconomica int auto_increment not null primary key,
nombreComercial varchar(350) null,
idTributaria varchar (50) null,
anios int null,
domicilioComercial varchar(500) null,
paisDomicilio int null,
departamento int null,
paginaWeb varchar (50) null,
telefonoOficina varchar(30) null,
idAreaGeografica int null,
idActividadNegocio int null,
descripcion varchar(500) null,
ventasMensual float null,
numEmpleados int null,
numSucursales int null,
grupoEconomico varchar(5) null,
indicar varchar (100) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisDomicilio) references Pais(idPais) ON DELETE CASCADE,
foreign key (departamento) references Departamento(idDepartamento),
foreign key (idAreaGeografica) references AreaGeografica(idAreaGeografica),
foreign key (idActividadNegocio) references ActividadNegocio(idActividadNegocio),

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/* 2.6 Principales clientes*/
DROP TABLE IF EXISTS PrincipalesClientes;
CREATE TABLE PrincipalesClientes(
idPrincipalesClientes int auto_increment not null primary key,
nombreClientePic varchar (250) null,
domicilio int null,
telefono varchar(25) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (domicilio) references Pais(idPais),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/* 2.7 PRINCIPALES PROVEEDORES*/
DROP TABLE IF EXISTS PrincipalesProveedores;
DROP TABLE IF EXISTS PrincipalesProveedores;
CREATE TABLE PrincipalesProveedores(
idPrincipalesProveedores int auto_increment not null primary key,
nombreProveedor varchar (150) null,
servicio varchar(150) null,
domicilio int null,
telefono varchar(25) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (domicilio) references Pais(idPais),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*Tablas de datos de clientes naturales*/
/*2.8 TBL- Datos de los clientes de persona natural */
DROP TABLE IF EXISTS DatosClienteNaturalPic;
CREATE TABLE DatosClienteNaturalPic(
idDatosClienteNaturalPic int auto_increment not null primary key,
fechaNacimiento date null,
paisNacimiento int null,
deptoPaisNacimiento int null,
nacionalidad int null,
deptoNacionalidad int null,
idEstadoCivil int null,
sexo varchar(15) null,
ndependientes int null,
tipoIdentificacion varchar(50) null,
numIdentificacion varchar(25) null,
paisEmision int null,
fechaEmision date null,
fechaVencimiento date null,
direccionDomicilio varchar(350) null,
PaisDomicilio int null,
deptoPaisDomicilio int null,
telefono varchar(25) null,
celular varchar(25) null,
correoPersonaNatural varchar(50) null,
profesion varchar(50) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisNacimiento) references Pais(idPais),
foreign key (deptoPaisNacimiento) references Departamento(idDepartamento),
foreign key (nacionalidad) references Pais(idPais),
foreign key (deptoNacionalidad) references Departamento(idDepartamento),
foreign key (idEstadoCivil) references EstadoCivil(idEstadoCivil),
foreign key (paisEmision) references Pais(idPais),
foreign key (PaisDomicilio) references Pais(idPais),
foreign key (deptoPaisDomicilio) references Departamento(idDepartamento),

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*Tablas correspondiente a persona Natural*/
/* 2.9 Datos laborales de la persona natural*/
DROP TABLE IF EXISTS DatosLaborales;
CREATE TABLE DatosLaborales (
idDatosLaborales int auto_increment not null primary key,
nombreEmpresa varchar(150) null,
cargoEmpresa varchar (50) null,
fechaIngreso date null,
antiguedad int null,
direccionEmpresa varchar (500) null,
paisEmpresa int null,
telefono varchar (25) null,
salarioMensual float null,
otrosIngresos float null,
egresosMensuales float null,
fuenteOtrosIngresos varchar (150) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisEmpresa) references Pais(idPais),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);


/*2.10 Datos del Conyuge */
DROP TABLE IF EXISTS DatosConyuge;
 CREATE TABLE DatosConyuge(
 idDatosConyuge int auto_increment not null primary key,
 nombreConyugue varchar (150) null,
 fechaNacimiento date null,
 paisNacimientoConyuge int null,
 nacionalidadConyuge int null,
 tipoIdentificacion varchar (25) null,
 numeroIdentificacion varchar (25) null,
 paisEmision int null,
 profesion varchar (50) null,
 celular varchar (15) null,
 empresaLabora varchar (50) null,
 telefono varchar (15) null,
 cargoEmpresa varchar (50) null,
 ingresoMensual float null,
 idPic int,
 usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisNacimientoConyuge) references Pais(idPais),
foreign key (nacionalidadConyuge) references Pais(idPais),
foreign key (paisEmision) references Pais(idPais),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
 );
 
/*2.11 Datos del Fiador (Si Aplica)*/
DROP TABLE IF EXISTS Fiador;
CREATE TABLE Fiador(
idFiador int auto_increment not null primary key,
nombreFiador varchar (150) null,
RelacionDeudor varchar (100) null,
nacionalidad int null,
tipoIdentificacionFiador varchar(50) null,
numIdFiador varchar (25) null,
paisEmision int null,
correoFiador varchar (75) null,
celularFiador varchar (15) null,
direccionFiador varchar(500) null,
paisDomicilioFiador int null,
telefonoFiador varchar(25) null, 
EmpresaFiador varchar (150) null,
telefonoEmpresa varchar (25) null,
cargoFiador varchar (50) null,
ingresoMensualFiador float null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (nacionalidad) references Pais(idPais),
foreign key (paisEmision) references Pais(idPais),
foreign key (paisDomicilioFiador) references Pais(idPais),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*2.11 Referencias */
DROP TABLE IF EXISTS Referencias;
CREATE TABLE Referencias (
idReferencias int auto_increment not null primary key,
nombreReferencia varchar (150) null,
tipoIdentificacion varchar (50) null,
numeroIdentificacion varchar (50) null,
tiempoReferido varchar (15) null,
celular varchar (15) null,
telefono varchar (15) null,
LugarLabora varchar (50) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*Tablas que comparten ambos perfiles*/
/*2.12 ORIGENES DE LOS FONDOS-->TABLA A USAR*/
DROP TABLE IF EXISTS OrigenesFondos;
CREATE TABLE OrigenesFondos(
idOrigenesFondos int auto_increment not null primary key,
idPic int,
idFormaPago int NULL,
idFuenteFondos int NULL,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic),
foreign key (idFormaPago) references FormaPago(idFormaPago),
foreign key (idFuenteFondos) references FuenteFondos(idFuenteFondos),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*2.13 TABLA PERSONA EXPUESTA POLITICAMENTE*/
DROP TABLE IF EXISTS Pep;
CREATE TABLE Pep (
idPep int auto_increment not null primary key,
pep varchar(5),
nombrePep varchar (250) null,
idRelacionCliente int null,
nombreEntidad varchar (250) null,
PaisPep int null,
cargo varchar(50) null,
perido varchar (50) null,
riesgoPep int,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (idRelacionCliente) references RelacionCliente(idRelacionCliente),
foreign key (PaisPep) references Pais(idPais),

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

DROP TABLE IF EXISTS Facta;
CREATE TABLE Facta (
idFacta int auto_increment not null primary key,
facta varchar(5),
nombreFacta varchar (250) null,
idRelacionCliente int null,
idCausa int null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (idRelacionCliente) references RelacionCliente(idRelacionCliente),
foreign key (idCausa) references Causa(idCausa),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*OTRAS TABLAS DE ACCESOS */
DROP TABLE IF EXISTS BusquedaRes;
CREATE TABLE BusquedaRes(
idBusquedaRes int auto_increment not null primary key,
busqueda varchar(10)  not null,
calificacion int ,
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
foreign key (idEstado) references Estado(idEstado)
);

/*5.6 CATALOGO DE ACTIVIDADES UNIFICADO*/
DROP TABLE IF EXISTS Catalogo_Acti_Economica;
CREATE TABLE Catalogo_Acti_Economica(
idCatalogo_Acti_Economica int auto_increment not null primary key,
codigoCIIU int,
descripcion varchar (500)  null,
idPais int,
calificacion int,
idEstado int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idPais) references Pais(idPais),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
foreign key (idEstado) references Estado(idEstado)
);

/*5.2 CATEGORIA DE UN PRODUCTO*/
DROP TABLE IF EXISTS CategoriaProducto;
CREATE TABLE CategoriaProducto(
idCategoriaProducto int auto_increment not null primary key,
nombreCategoriaProducto	varchar (150),
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
foreign key (idEstado) references Estado(idEstado)
);

/*5.1 CATALOGO DE DOCUMENTOS*/
DROP TABLE IF EXISTS CatalogoDocumentos;
CREATE TABLE CatalogoDocumentos(
idCatalogoDocumentos int auto_increment not null primary key,
descripcion	varchar (250),
categoriaCatProducto varchar (15),
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
foreign key (idEstado) references Estado(idEstado)
);

/*5.4 CATALOGO DE OCUPACIONES 2021*/
DROP TABLE IF EXISTS CatalogoOCGO;
CREATE TABLE CatalogoOCGO(
idCatalogoOCGO int auto_increment not null primary key,
codigoCGO varchar (15),
descripcionCGO varchar (800),
riesgoCGO int,
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
foreign key (idEstado) references Estado(idEstado)
);

/*5.3 CATALOGO DE UN SUB PRODUCTO*/
DROP TABLE IF EXISTS CatalogoSubProducto;
CREATE TABLE CatalogoSubProducto(
idCatalogoSubProducto int auto_increment not null primary key,
nombreSubProducto varchar (150),
idCategoriaProducto int,
riesgoSubProducto int, 
idEstado int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,
foreign key (idCategoriaProducto) references CategoriaProducto(idCategoriaProducto),
foreign key (idEstado) references Estado(idEstado),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*ANEXOS PARA EL PIC DE PERSONA NATURAL */
DROP TABLE IF EXISTS CategoriaOcupacional;
CREATE TABLE CategoriaOcupacional(
idCategoriaOcupacional int auto_increment not null primary key,
tipoCategoria varchar(150)  not null,
calificacion int,
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
foreign key (idEstado) references Estado(idEstado)
);

/*5.8 CATALOGO SALARIO CLIENTE */
DROP TABLE IF EXISTS CategoriaSalario;
CREATE TABLE CategoriaSalario(
idCategoriaSalario int auto_increment not null primary key,
categoria varchar(150)  not null,
calificacion int ,
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
foreign key (idEstado) references Estado(idEstado)
);

DROP TABLE IF EXISTS Organismo; 
CREATE TABLE Organismo (
idOrganismo int auto_increment not null primary key,
nombreOrganismo varchar (50),
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
foreign key (idEstado) references Estado(idEstado)
);

DROP TABLE IF EXISTS Circular; 
CREATE TABLE Circular (
idCircular int auto_increment not null primary key,
fechaBusqueda date,
referencia varchar (100),
subOrganismo varchar(100),
idOrganismo int,
idEstado int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idOrganismo) references Organismo(idOrganismo),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
foreign key (idEstado) references Estado(idEstado)
);

DROP TABLE IF EXISTS Constitucion;
CREATE TABLE Constitucion(
idConstitucion int auto_increment not null primary key,
fechaConstitucion varchar(150)  not null,
calificacion int ,
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
foreign key (idEstado) references Estado(idEstado)
);

DROP TABLE IF EXISTS ControlesAplicados;
CREATE TABLE ControlesAplicados(
idControlesAplicados int auto_increment not null primary key,
idCliente int,
productoSolicitado varchar (150)  null,
motorBusqueda boolean null,
registroMercantil boolean null,
poderJudicial boolean null,
intelichek boolean null,
interpol boolean null,
fbi boolean null,
ofac boolean null,
listasConsoUNSC boolean null,
sancionesUE boolean null
);

DROP TABLE IF EXISTS DocumentacionExtra;
CREATE TABLE DocumentacionExtra(
idDocumentacionExtra int auto_increment not null primary key,
idCliente int,
productoSolicitado varchar (150)  null,
documento varchar (500),
comentario varchar (500),
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
foreign key (idCliente) references Pic(idPic)

);

/* Tabla Documentacion IDD*/
DROP TABLE IF EXISTS DocumentacionRecibida;
CREATE TABLE DocumentacionRecibida(
idDocumentacionRecibida int auto_increment not null primary key,
idCliente int,
idCatalogoDocumentos int,
productoSolicitado varchar (150)  null,
comentario varchar (500),
foreign key (idCliente) references Pic(idPic),
foreign key (idCatalogoDocumentos) references CatalogoDocumentos(idCatalogoDocumentos)
);

/* Tabla central IDD*/
DROP TABLE IF EXISTS InformeGeneralIDD;
CREATE TABLE InformeGeneralIDD(
idInformeGeneralIDD int auto_increment not null primary key,
idCliente int,
cliente varchar(250)  null ,
tipoCliente varchar (25)  null,
productoSolicitado varchar (150)  null,
paisCliente varchar (50) null,
monto float null,
fechaRevision date,
proximaRevision date,
riesgo varchar (25),
observaciones varchar (800),
inputRiesgo varchar (250),
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
foreign key (idEstado) references Estado(idEstado)
);

DROP TABLE IF EXISTS TipoPerJuridica;
CREATE TABLE TipoPerJuridica(
idTipoPerJuridica int auto_increment not null primary key,
tipoPersona varchar(150)  not null,
calificacion int,
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
foreign key (idEstado) references Estado(idEstado)
);


DROP TABLE IF EXISTS InteresInfo;
CREATE TABLE InteresInfo(
idInteresInfo int auto_increment not null primary key,
idTipoPerJuridica int,
idConstitucion int,
idCatalogoAE int,
idBusquedaRes int,
idPaisAE int,
idDepto int,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),

foreign key (idTipoPerJuridica) references TipoPerJuridica(idTipoPerJuridica),
foreign key (idConstitucion) references Constitucion(idConstitucion),
foreign key (idBusquedaRes) references BusquedaRes(idBusquedaRes),
foreign key (idPaisAE) references Pais(idPais),
foreign key (idDepto) references Departamento(idDepartamento),
foreign key (idPic) references Pic(idPic)
);

/*TABLA DE INTERES PARA PIC-NATURAL*/
DROP TABLE IF EXISTS InteresInfoPN;
CREATE TABLE InteresInfoPN(
idInteresInfoPN INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
idCategoriaOcupacional INT,
idCatalogoOCGO INT,
idCatalogo_Acti_Economica INT,
idPaisACII INT,
idDeptoACII INT,
idBusquedaRes INT,
idPic INT,

usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),

FOREIGN KEY (idCategoriaOcupacional) REFERENCES CategoriaOcupacional(idCategoriaOcupacional),
FOREIGN KEY (idCatalogoOCGO) REFERENCES CatalogoOCGO(idCatalogoOCGO),
FOREIGN KEY (idCatalogo_Acti_Economica) REFERENCES Catalogo_Acti_Economica(idCatalogo_Acti_Economica),
FOREIGN KEY (idPaisACII) REFERENCES Pais(idPais),
FOREIGN KEY (idDeptoACII) REFERENCES Departamento(idDepartamento),
FOREIGN KEY (idBusquedaRes) REFERENCES BusquedaRes(idBusquedaRes),
FOREIGN KEY (idPic) REFERENCES Pic(idPic)
);

/* 5.11 MATRIZ DE RIESGO JURIDICO*/
DROP TABLE IF EXISTS MatrizRiesgoJuridico;
CREATE TABLE MatrizRiesgoJuridico(
idMatrizRiesgoJuridico int auto_increment not null primary key,
cliente varchar (350),
lugarConstitucion varchar (100),
lugarNacimiento_RL varchar (100),
lugarNacionalidad_RL varchar (100),
lugarResidencia_RL varchar (100),
lugarNacionalidad_ACM varchar (100),
lugarNacionalidad_BFM varchar (100),
personalidadJuridica varchar (50),
fechaConstitucion varchar (50),
actividadEconomica varchar (800),
lugarActividadEconomica varchar (100),
resultadosBusquedas varchar (10),
condicionPEP varchar (10),
productoSolicitado varchar (150),
monto varchar (50),
formaPago varchar (150),
origenRecursos varchar (150),
riesgoCliente varchar (15),
fechaRealizacion date null,
tipoCliente varchar (15),
paisMatriz varchar (50),
idCliente int,
idEstado int,
proximaRevision date,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idEstado) references Estado(idEstado),
foreign key (idCliente) references Pic(idPic),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);


/*5.10 MATRIZ DE RIESGO NATURAL*/
DROP TABLE IF EXISTS MatrizRiesgoNatural;
CREATE TABLE MatrizRiesgoNatural(
idMatrizRiesgoNatural int auto_increment not null primary key,
cliente varchar (350),
lugarNacimiento varchar (100),
lugarNacionalidad varchar (100),
lugarResidencia varchar (100),
categoria varchar (25),
profesion varchar (800),
actividadEmpleo varchar (800),
lugarActividadEconomica varchar (100),
resultadosBusquedas varchar (10),
condicionPEP varchar (10),
productoSolicitado varchar (150),
monto varchar (50),
formaPago varchar (150),
origenRecursos varchar (150),
riesgoCliente varchar (15),
fechaRealizacion date null,
tipoCliente varchar (15),
paisMatriz varchar (50),
idCliente int,
idEstado int,
proximaRevision date,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

foreign key (idEstado) references Estado(idEstado),
foreign key (idCliente) references Pic(idPic),
FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/* 5.6 MONTO SOBRE ACTIVIDAD ECONOMICA */
DROP TABLE IF EXISTS Monto;
CREATE TABLE Monto(
idMonto int auto_increment not null primary key,
descripcion varchar (50),
calificacion int,
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
foreign key (idEstado) references Estado(idEstado)
);

DROP TABLE IF EXISTS PersonasObligadas; 
CREATE TABLE PersonasObligadas(
idPersonasObligadas int auto_increment not null primary key,
nombre varchar (250),
identificacion varchar (25),
nacionalidad varchar (100),
idCircular varchar(50),

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
foreign key (idEstado) references Estado(idEstado)
);

/*TABLAS INDEPENDIENTE*/


/*COMIENZO DE SCRIPTS PARA VISTAS_*/

DROP VIEW IF EXISTS vw_Accionistas;
CREATE VIEW vw_Accionistas as
select a.idPic, a.nombreCompletoAccionistas, a.nacionalidadAccionistas, p.nombrePais as 'nombre_nacionalidadAccionistas',
a.deptoNacionalidadAccionistas, d.nombreDepartamento as 'nombre_deptoNacionalidadAccionistas', a.numIdAccionistas, a.acciones
from Accionistas a 
inner join Pais p on a.nacionalidadAccionistas = p.idPais
inner join Departamento d on  a.deptoNacionalidadAccionistas= d.idDepartamento;

DROP VIEW IF EXISTS vw_ActividadEconomica;
create view vw_ActividadEconomica as
select ac.IdPic, ac.nombreComercial, ac.idTributaria, ac.anios, ac.domicilioComercial,
ac.paisDomicilio, p.nombrePais as 'nombre_paisDomicilio', ac.departamento,d.nombreDepartamento as 'nombre_departamento', ac.paginaWeb,ac.telefonoOficina,
ac.idAreaGeografica,ag.nombreAreaGeografica as 'nombre_idAreaGeografica', ac.idActividadNegocio, an.nombreActividadNegocio as 'nombre_idActividadNegocio', 
ac.descripcion, ac.ventasMensual, ac.numEmpleados, ac.numSucursales, ac.grupoEconomico, ac.indicar
from actividadEconomica ac
inner join Pais p on ac.paisDomicilio = p.idPais
inner join Departamento d on ac.departamento = d.idDepartamento
inner join AreaGeografica ag on ac.idAreaGeografica = ag.idAreaGeografica
inner join ActividadNegocio an on ac.idActividadNegocio = an.idActividadNegocio;

DROP VIEW IF EXISTS vw_Benefinales;
CREATE VIEW vw_Benefinales AS
SELECT 
bf.idBeneficiariosFinales, bf.nombreBeneFinales, bf.ApellidosBeneFinales, 
bf.nacionalidadBeneFinales, p.nombrePais as 'nombre_nacionalidadBeneFinales', 
bf.deptoNacionalidadBeneFinales, d.nombreDepartamento as 'nombre_deptoNacionalidadBeneFinales',
bf.numIdBeneFinales, bf.AccionesBeneFinales, bf.idPic
FROM beneficiariosfinales bf 
INNER JOIN Pais p ON bf.nacionalidadBeneFinales = p.idPais
INNER JOIN departamento d ON bf.deptoNacionalidadBeneFinales = d.idDepartamento;

/*Vistas para evaluaciones*/
DROP VIEW IF EXISTS vw_CatalogoSubProducto;
Create view vw_CatalogoSubProducto as
SELECT csp.idCatalogoSubProducto, csp.nombreSubProducto, cp.nombreCategoriaProducto as 'idCategoriaProducto', csp.riesgoSubProducto,csp.idEstado 
From CatalogoSubProducto csp
INNER JOIN CategoriaProducto cp  on csp.idCategoriaProducto = cp.idCategoriaProducto
and csp.idEstado<>3;

DROP VIEW IF EXISTS vw_CatalogoSubProducto_admin;
CREATE VIEW vw_CatalogoSubProducto_admin AS  
SELECT csp.idCatalogoSubProducto, csp.nombreSubProducto, csp.idCategoriaProducto,cp.nombreCategoriaProducto, csp.riesgoSubProducto, csp.idEstado
FROM CatalogoSubProducto csp
INNER JOIN CategoriaProducto cp ON csp.idCategoriaProducto = cp.idCategoriaProducto
AND csp.idEstado <> 3;

DROP VIEW IF EXISTS vw_DatosClienteNaturalPic;
CREATE VIEW vw_DatosClienteNaturalPic AS
SELECT 
dcnp.idPic,dcnp.fechaNacimiento, dcnp.paisNacimiento, p_naci.nombrePais AS 'nombre_paisNacimiento',
dcnp.deptoPaisNacimiento, d_naci.nombreDepartamento AS 'nombre_deptoPaisNacimiento', dcnp.nacionalidad, p_nacio.nombrePais AS 'nombre_nacionalidad',
dcnp.deptoNacionalidad, d_nacio.nombreDepartamento AS 'nombre_deptoNacionalidad', dcnp.idEstadoCivil, 
ec.descripcion AS 'nombre_idEstadoCivil', dcnp.sexo, dcnp.ndependientes, dcnp.tipoIdentificacion, 
dcnp.numIdentificacion, dcnp.paisEmision, p_paemi.nombrePais AS 'nombre_paisEmision', dcnp.fechaEmision, 
dcnp.fechaVencimiento, dcnp.direccionDomicilio, dcnp.PaisDomicilio, p_padomi.nombrePais AS 'nombre_PaisDomicilio', 
dcnp.deptoPaisDomicilio, d_domi.nombreDepartamento AS 'nombre_deptoPaisDomicilio', dcnp.telefono, 
dcnp.celular, dcnp.correoPersonaNatural, dcnp.profesion
FROM datosclientenaturalpic dcnp
INNER JOIN pais p_naci ON dcnp.paisNacimiento = p_naci.idPais
INNER JOIN pais p_nacio ON dcnp.nacionalidad = p_nacio.idPais
INNER JOIN estadocivil ec ON dcnp.idEstadoCivil = ec.idEstadoCivil
INNER JOIN pais p_paemi ON dcnp.paisEmision = p_paemi.idPais
INNER JOIN pais p_padomi ON dcnp.PaisDomicilio = p_padomi.idPais
INNER JOIN departamento d_naci ON dcnp.deptoPaisNacimiento = d_naci.idDepartamento
INNER JOIN departamento d_nacio ON dcnp.deptoNacionalidad = d_nacio.idDepartamento
INNER JOIN departamento d_domi ON dcnp.deptoPaisDomicilio = d_domi.idDepartamento;

DROP VIEW IF EXISTS vw_DatosConyuge;
create view vw_DatosConyuge as
select dtc.idPic, dtc.nombreConyugue, dtc.fechaNacimiento, dtc.paisNacimientoConyuge, p_nacim.nombrePais as 'nombre_paisNacimientoConyuge',
dtc.nacionalidadConyuge, p_nacim.nombrePais as 'nombre_nacionalidadConyuge', dtc.tipoIdentificacion, dtc.numeroIdentificacion, 
dtc.paisEmision, p_nacim.nombrePais as 'nombre_paisEmision', dtc.profesion, dtc.celular, dtc.empresaLabora, 
dtc.telefono, dtc.cargoEmpresa,dtc.ingresoMensual
from DatosConyuge dtc
inner join pais p_nacim on dtc.paisNacimientoConyuge = p_nacim.idPais
inner join pais p_nacio on dtc.nacionalidadConyuge = p_nacio.idPais
inner join pais p_emi on dtc.paisEmision = p_emi.idPais;

DROP VIEW IF EXISTS vw_DatosGenerales;
CREATE VIEW vw_DatosGenerales as
SELECT 
dcjp.idPiC,dcjp.paisConstitucion, p_dcjp.nombrePais as 'nombre_paisConstitucion',dcjp.deptoConstitucion,dpto.nombreDepartamento,  dcjp.fechaConstitucion, dcjp.fechaInscripcion,
dcjp.correoPersonaContacto,dcjp.nombrePersonaContacto,dcjp.cargoPersonaContacto,dcjp.telefono
from DatosClienteJuridicoPic dcjp 
inner join Pais p_dcjp on  dcjp.paisConstitucion = p_dcjp.idPais
inner join Departamento dpto on dcjp.deptoConstitucion = dpto.idDepartamento;

/*Vista datos laborales*/
DROP VIEW IF EXISTS vw_DatosLaborales;
Create view vw_DatosLaborales as
select dtl.idPic, dtl.nombreEmpresa, dtl.cargoEmpresa, dtl.fechaIngreso, dtl.antiguedad, dtl.direccionEmpresa,
	   dtl.paisEmpresa, p_em.nombrePais as 'nombre_paisEmpresa', dtl.telefono, dtl.salarioMensual, dtl.otrosIngresos, 
       dtl.egresosMensuales, dtl.fuenteOtrosIngresos
from DatosLaborales dtl
inner join pais p_em on dtl.paisEmpresa = p_em.idPais;

DROP VIEW IF EXISTS vw_datosRL;
CREATE VIEW vw_datosRL as
select drl.idPic, drl.nombreRepresentanteLegal,drl.paisNacimiento, p_pn.nombrePais as 'nombre_paisNacimiento', drl.deptoPaisNacimiento, d_naci.nombreDepartamento as 'nombre_deptoPaisNacimiento',
drl.nacionalidad,p_na.nombrePais as 'nombre_nacionalidad',drl.deptoNacionalidad, d_nac.nombreDepartamento as 'nombre_deptoNacionalidad',drl.tipoIdentificacion,drl.numeroIdentificacion,
drl.paisEmision,p_pe.nombrePais as 'nombre_paisEmision', drl.fechaEmision,drl.fechaVencimiento,
drl.paisResidencia, p_pr.nombrePais as 'nombre_paisResidencia', drl.deptoPaisResidencia, d_resi.nombreDepartamento as 'nombre_deptoPaisResidencia',
drl.celular, drl.correo, drl.cargo, drl.profesion
from DatosRepresentanteLegal drl 
inner join Pais p_pn on drl.paisNacimiento = p_pn.idPais
inner join Departamento d_naci on drl.deptoPaisNacimiento = d_naci.idDepartamento
inner join Pais p_na on drl.nacionalidad = p_na.idPais
inner join Departamento d_nac on drl.deptoNacionalidad = d_nac.idDepartamento
inner join Pais p_pe on drl.paisEmision = p_pe.idPais
inner join Pais p_pr on drl.paisResidencia = p_pr.idPais
inner join Departamento d_resi on drl.deptoPaisResidencia = d_resi.idDepartamento;

DROP VIEW IF EXISTS vw_Departamento;
Create view vw_Departamento as
select d.idDepartamento, d.nombreDepartamento,d.calificacion, d.idEstado, d.idPais, p.nombrePais
from Departamento d
inner join Pais p on d.idPais = P.idPais
AND d.idEstado <> 3;

DROP VIEW IF EXISTS vw_DocumentacionRecibida;
create view vw_DocumentacionRecibida as
select dr.idDocumentacionRecibida , dr.idCliente, dr.idCatalogoDocumentos,
dr.productoSolicitado, dr.comentario, cd.descripcion
from DocumentacionRecibida dr
inner join CatalogoDocumentos cd on dr.idCatalogoDocumentos = cd.idCatalogoDocumentos;

DROP VIEW IF EXISTS vw_Facta;
create view vw_Facta as
select f.idPic, f.facta, f.nombreFacta,f.idRelacionCliente, rc.descripcion as 'nombre_idRelacionCliente', 
f.idCausa, c.descripcion as 'nombre_idCausa'
from facta f
inner join RelacionCliente rc on f.idRelacionCliente= rc.idRelacionCliente
inner join Causa c on f.idCausa = c.idCausa;

/*Vistas datos del fiador */
DROP VIEW IF EXISTS vw_Fiador;
create view vw_Fiador as
select f.idPic, f.nombreFiador, f.RelacionDeudor, f.nacionalidad, p_nacio.nombrePais as 'nombre_nacionalidad', f.tipoIdentificacionFiador,
	   f.numIdFiador, f.paisEmision, p_emi.nombrePais as 'nombre_paisEmision', f.correoFiador, f.celularFiador, f.direccionFiador,
	   f.paisDomicilioFiador, p_domi.nombrePais as 'nombre_paisDomicilioFiador', f.telefonoFiador, f.EmpresaFiador, f.telefonoEmpresa,
       f.cargoFiador, f.ingresoMensualFiador
from Fiador f
inner join pais p_nacio on f.nacionalidad = p_nacio.idPais
inner join pais p_emi on f.paisEmision = p_emi.idPais
inner join pais p_domi on f.paisDomicilioFiador = p_domi.idPais;

/*VISTA PARA MOSTRAR LOS DATOS EN LA MATRIZ DE INFORME GENERAL IDD */
DROP VIEW IF EXISTS vw_informeIDD;
CREATE VIEW vw_informeIDD as 
select idCliente, cliente, tipoCliente, productoSolicitado, paisMatriz, riesgoCliente, fechaRealizacion from MatrizRiesgoJuridico 
union all
select idCliente, cliente, tipoCliente, productoSolicitado, paisMatriz, riesgoCliente, fechaRealizacion from MatrizRiesgoNatural;

DROP VIEW IF EXISTS vw_InteresInfo;
CREATE VIEW vw_InteresInfo AS 
SELECT 
ii.idInteresInfo,
ii.idTipoPerJuridica, tpj.tipoPersona,
ii.idConstitucion, c.fechaConstitucion,
ii.idCatalogoAE, cae.descripcion,
ii.idBusquedaRes, br.busqueda,
ii.idPaisAE, p.nombrePais,
ii.idDepto, d.nombreDepartamento,
ii.idPic
FROM InteresInfo ii
INNER JOIN  TipoPerJuridica tpj ON ii.idTipoPerJuridica = tpj.idTipoPerJuridica
INNER JOIN Constitucion c ON ii.idConstitucion = c.idConstitucion
INNER JOIN catalogo_acti_economica cae ON ii.idCatalogoAE = cae.idCatalogo_Acti_Economica
INNER JOIN BusquedaRes br ON ii.idBusquedaRes = br.idBusquedaRes
INNER JOIN Pais p ON ii.idPaisAE = p.idPais
INNER JOIN Departamento d ON ii.idDepto = d.idDepartamento
INNER JOIN Pic pic ON ii.idPic = pic.idPic;

DROP VIEW IF EXISTS vw_InteresInfo_matriz;
CREATE VIEW vw_InteresInfo_matriz AS 
SELECT 
ii.idInteresInfo,
ii.idTipoPerJuridica, tpj.tipoPersona, tpj.calificacion as 'riesgoTPJ',
ii.idConstitucion, c.fechaConstitucion, c.calificacion as 'riesgoC',
ii.idCatalogoAE, cae.descripcion, cae.calificacion as 'riesgoAE',
ii.idBusquedaRes, br.busqueda, br.calificacion as 'riesgoBR',
ii.idPaisAE, p.nombrePais, p.calificacion as 'riesgoP',
ii.idDepto, d.nombreDepartamento, d.calificacion as 'riesgoD',
ii.idPic
FROM InteresInfo ii
INNER JOIN  TipoPerJuridica tpj ON ii.idTipoPerJuridica = tpj.idTipoPerJuridica
INNER JOIN Constitucion c ON ii.idConstitucion = c.idConstitucion
INNER JOIN Catalogo_Acti_Economica cae ON ii.idCatalogoAE = cae.idCatalogo_Acti_Economica
INNER JOIN BusquedaRes br ON ii.idBusquedaRes = br.idBusquedaRes
INNER JOIN Pais p ON ii.idPaisAE = p.idPais
INNER JOIN Departamento d ON ii.idDepto = d.idDepartamento
INNER JOIN Pic pic ON ii.idPic = pic.idPic;

DROP VIEW IF EXISTS vw_InteresInfoPN;
CREATE VIEW vw_InteresInfoPN AS 
SELECT 
iin.idInteresInfoPN,
iin.idCategoriaOcupacional, co.tipoCategoria, co.calificacion as 'riesgo_CatOcup',
iin.idCatalogoOCGO, cocgo.codigoCGO, cocgo.descripcionCGO, cocgo.riesgoCGO,
iin.idCatalogo_Acti_Economica, cae.codigoCIIU, cae.descripcion,cae.calificacion as 'riesgo_AC',
iin.idPaisACII, p.nombrePais, p.calificacion as 'riesgo_Pais',
iin.idDeptoACII, d.nombreDepartamento, d.calificacion as 'riesgo_Depto',
iin.idBusquedaRes, br.busqueda, br.calificacion as 'riesgo_Busqueda',
iin.idPic
FROM InteresInfoPN iin
INNER JOIN CategoriaOcupacional co ON iin.idCategoriaOcupacional = co.idCategoriaOcupacional
INNER JOIN CatalogoOCGO cocgo ON iin.idCatalogoOCGO = cocgo.idCatalogoOCGO
INNER JOIN Catalogo_Acti_Economica cae ON iin.idCatalogo_Acti_Economica = cae.idCatalogo_Acti_Economica
INNER JOIN Pais p ON iin.idPaisACII = p.idPais
INNER JOIN Departamento d ON iin.idDeptoACII = d.idDepartamento
INNER JOIN BusquedaRes br ON iin.idBusquedaRes = br.idBusquedaRes
INNER JOIN Pic pi ON iin.idPic = pi.idPic;

DROP VIEW IF EXISTS vw_MatrizRiesgoJuridico;
CREATE VIEW vw_MatrizRiesgoJuridico AS 
SELECT idMatrizRiesgoJuridico,cliente, lugarConstitucion, lugarNacimiento_RL, lugarNacionalidad_RL,lugarResidencia_RL, lugarNacionalidad_ACM, lugarNacionalidad_BFM, 
personalidadJuridica,fechaConstitucion,actividadEconomica,lugarActividadEconomica,
resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente,
DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') AS 'fechaRealizacion',tipoCliente,paisMatriz,idCliente,idEstado,proximaRevision, datediff(proximaRevision,now()) as "diasRestantes"
FROM MatrizRiesgoJuridico
WHERE idEstado<>3;

DROP VIEW IF EXISTS vw_MatrizRiesgoNatural;
CREATE VIEW vw_MatrizRiesgoNatural AS 
SELECT idMatrizRiesgoNatural,cliente, lugarNacimiento,lugarNacionalidad,lugarResidencia,categoria,profesion,actividadEmpleo,lugarActividadEconomica,
resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente, 
DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') as 'fechaRealizacion',tipoCliente,paisMatriz,idCliente,idEstado, proximaRevision,datediff(proximaRevision,now()) as "diasRestantes"
FROM MatrizRiesgoNatural 
WHERE idEstado<>3;

DROP VIEW IF EXISTS vw_Nacionalidad_tbl_DCNP;
create view vw_Nacionalidad_tbl_DCNP as
select p.calificacion, p. nombrePais, dcnp.idPic
from DatosClienteNaturalPic dcnp
inner join pais p on dcnp.nacionalidad = p.Idpais;

DROP VIEW IF EXISTS vw_Nacionalidad_tbl_DRL;
create view vw_Nacionalidad_tbl_DRL as
select p.calificacion, p.nombrePais, drl.idPic
from DatosRepresentanteLegal drl
inner join pais p on drl.nacionalidad = p.Idpais;

DROP VIEW IF EXISTS vw_UGeografica_PN;
create view vw_UGeografica_PN as
select dtn.idPic,
p_dtn1.calificacion as 'calificacion_PN', p_dtn1.nombrePais as 'nombre_PaisNacimiento', dtn.PaisNacimiento,
p_dtn2.calificacion as 'calificacion_N', p_dtn2.nombrePais as 'nombre_nacionalidad', dtn.nacionalidad, 
p_dtn3.calificacion as 'calificacion_PD', p_dtn3.nombrePais as 'nombre_PaisDomicilio', dtn.PaisDomicilio
from DatosClienteNaturalPic dtn
inner join pais p_dtn1 on dtn.PaisNacimiento =  p_dtn1.idPais
inner join pais p_dtn2 on dtn.nacionalidad =  p_dtn2.idPais
inner join pais p_dtn3 on dtn.paisDomicilio =  p_dtn3.idPais;

DROP VIEW IF EXISTS vw_PaisNacimiento_tbl_DCNP;
create view vw_PaisNacimiento_tbl_DCNP as
select p.calificacion, p. nombrePais, dcnp.idPic
from DatosClienteNaturalPic dcnp
inner join pais p on dcnp.paisNacimiento = p.Idpais;

DROP VIEW IF EXISTS vw_PConstitucion_tbl_DCJP;
create view vw_PConstitucion_tbl_DCJP as
select p.calificacion, p. nombrePais, dcjp.idPic
from DatosClienteJuridicoPic dcjp
inner join pais p on dcjp.paisConstitucion = p.Idpais;

DROP VIEW IF EXISTS vw_PDomicilio_tbl_DCNP;
create view vw_PDomicilio_tbl_DCNP as
select p.calificacion, p. nombrePais, dcnp.idPic
from DatosClienteNaturalPic dcnp
inner join pais p on dcnp.paisDomicilio = p.Idpais;

DROP VIEW IF EXISTS vw_OrigenesFondos;
create view vw_OrigenesFondos as
SELECT ofs.idPic, ofs.idFormaPago, fp.nombreFormaPago as 'nombre_idFormaPago', fp.riesgoFP,
ofs.idFuenteFondos,ff.nombreFuenteFondos as 'nombre_idFuenteFondos', ff.riesgoFF
from origenesfondos ofs
inner join formapago fp on ofs.idFormaPago = fp.idFormaPago
inner join fuentefondos ff on ofs.idFuenteFondos = ff.idFuenteFondos;

DROP VIEW IF EXISTS vw_Pep;
create view vw_Pep as
select p.IdPic, p.pep, p.nombrePep, p.idRelacionCliente, rc.descripcion as 'nombre_idRelacionCliente', p.nombreEntidad,
p.PaisPep,pa.nombrePais as 'nombre_PaisPep', p.cargo, p.perido
from  pep p
inner join RelacionCliente rc on p.idRelacionCliente= rc.idRelacionCliente
inner join pais pa on p.PaisPep = pa.IdPais;

DROP VIEW IF EXISTS vw_PNacimiento_tbl_DRL;
create view vw_PNacimiento_tbl_DRL as
select p.calificacion, p.nombrePais, drl.idPic
from DatosRepresentanteLegal drl
inner join pais p on drl.paisNacimiento = p.Idpais;

DROP VIEW IF EXISTS vw_PResidencia_tbl_DRL;
create view vw_PResidencia_tbl_DRL as
select p.calificacion, p.nombrePais, drl.idPic
from DatosRepresentanteLegal drl
inner join pais p on drl.paisResidencia = p.Idpais;

DROP VIEW IF EXISTS vw_PrincipalesClientes;
create view vw_PrincipalesClientes as
select pc.idPrincipalesClientes,pc.IdPic,pc.nombreClientePic, p.nombrePais as 'domicilio', pc.telefono
from PrincipalesClientes pc
inner join pais p on pc.domicilio = p.idPais ;

DROP VIEW IF EXISTS vw_PrincipalesProveedores;
create view vw_PrincipalesProveedores as
select pp.idPrincipalesProveedores, pp.idPic, pp.nombreProveedor, pp.servicio, p.nombrePais as 'domicilio', pp.telefono
from PrincipalesProveedores pp
inner join pais p on pp.domicilio = p.idPais;

DROP VIEW IF EXISTS AlertaMatrizEvaluacion;
CREATE VIEW AlertaMatrizEvaluacion AS
Select idMatrizRiesgoJuridico,idCliente,cliente, productoSolicitado, riesgoCliente,tipoCliente,idEstado,proximaRevision,datediff(proximaRevision,now()) as "diasRestantes"
from MatrizRiesgoJuridico
WHERE idEstado<>3
union all 
Select idMatrizRiesgoNatural,idCliente,cliente, productoSolicitado, riesgoCliente,tipoCliente,idEstado,proximaRevision,datediff(proximaRevision,now()) as "diasRestantes"
from MatrizRiesgoNatural
WHERE idEstado<>3;







