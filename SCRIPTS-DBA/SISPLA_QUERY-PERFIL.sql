/*2. MODULO DE PERFIL DEL CLIENTE */
/*2.0 TBL_PIC-TABLA CENTRAL*/
DROP TABLE IF EXISTS Pic;
CREATE TABLE Pic(
idPic int auto_increment not null primary key,
fechaPic date,
nombreCliente varchar(350)  not null,
id varchar(50),
origen varchar (25),
categoria varchar (25),
fechaIngreso datetime,
idEstado int,
usuario_creacion int null,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (idEstado) REFERENCES Estado(idEstado)
); 
/*Tablas de datos de clientes juridicos*/
/*2.1 TBL- Datos generales del cliente */
CREATE TABLE DatosClienteJuridicoPic(
idDatosClienteJuridicoPic int auto_increment not null primary key,
paisConstitucion int null,
fechaConstitucion date null,
fechaInscripcion date null,
correoPersonaContacto varchar(150) null,
nombrePersonaContacto varchar(200) null,
cargoPersonaContacto varchar (100) null,
paginaWeb varchar (50) null,
telefono varchar(25) null,
idPic int,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisConstitucion) references Pais(idPais)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisNacimiento) references Pais(idPais),
foreign key (deptoPaisNacimiento) references Departamento(idDepartamento),
foreign key (nacionalidad) references Pais(idPais),
foreign key (deptoNacionalidad) references Departamento(idDepartamento),
foreign key (paisEmision) references Pais(idPais),
foreign key (paisResidencia) references Pais(idPais),
foreign key (deptoPaisResidencia) references Departamento(idDepartamento)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (nacionalidadAccionistas) references Pais(idPais),
foreign key (deptoNacionalidadAccionistas) references Departamento(idDepartamento)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (nacionalidadBeneFinales) references Pais(idPais),
foreign key (deptoNacionalidadBeneFinales) references Departamento(idDepartamento)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisDomicilio) references Pais(idPais) ON DELETE CASCADE,
foreign key (departamento) references Departamento(idDepartamento),
foreign key (idAreaGeografica) references AreaGeografica(idAreaGeografica),
foreign key (idActividadNegocio) references ActividadNegocio(idActividadNegocio)
);

/* 2.6 Principales clientes*/
DROP TABLE IF EXISTS PrincipalesClientes;
CREATE TABLE PrincipalesClientes(
idPrincipalesClientes int auto_increment not null primary key,
nombreClientePic varchar (250) null,
domicilio int null,
telefono varchar(25) null,
idPic int,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (domicilio) references Pais(idPais)
);

/* 2.7 PRINCIPALES PROVEEDORES*/
DROP TABLE IF EXISTS PrincipalesProveedores;
CREATE TABLE PrincipalesProveedores(
idPrincipalesProveedores int auto_increment not null primary key,
nombreProveedor varchar (150) null,
servicio varchar(150) null,
domicilio int null,
telefono varchar(25) null,
idPic int,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (domicilio) references Pais(idPais)
);

/*Tablas de datos de clientes naturales*/
/*2.8 TBL- Datos de los clientes de persona natural */
DROP TABLE IF EXISTS DatosClienteNaturalPic;
CREATE TABLE DatosClienteNaturalPic(
idDatosClienteNaturalPic int auto_increment not null primary key,
fechaNacimiento date null,
paisNacimiento int null,
nacionalidad int null,
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
departamentoDomicilio int null,
telefono varchar(25) null,
celular varchar(25) null,
correoPersonaNatural varchar(50) null,
profesion varchar(50) null,
idPic int,

foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisNacimiento) references Pais(idPais),
foreign key (nacionalidad) references Pais(idPais),
foreign key (idEstadoCivil) references EstadoCivil(idEstadoCivil),
foreign key (paisEmision) references Pais(idPais),
foreign key (PaisDomicilio) references Pais(idPais),
foreign key (departamentoDomicilio) references Departamento(idDepartamento)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisEmpresa) references Pais(idPais)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (paisNacimientoConyuge) references Pais(idPais),
foreign key (nacionalidadConyuge) references Pais(idPais),
foreign key (paisEmision) references Pais(idPais)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (nacionalidad) references Pais(idPais),
foreign key (paisEmision) references Pais(idPais),
foreign key (paisDomicilioFiador) references Pais(idPais)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE
);

/*Tablas que comparten ambos perfiles*/

/*2.12 ORIGENES DE LOS FONDOS-->TABLA A USAR*/

CREATE TABLE OrigenesFondos(
idOrigenesFondos int auto_increment not null primary key,
idPic int,
idFormaPago int NULL,
idFuenteFondos int NULL,
foreign key (idPic) references Pic(idPic),
foreign key (idFormaPago) references FormaPago(idFormaPago),
foreign key (idFuenteFondos) references FuenteFondos(idFuenteFondos)
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
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (idRelacionCliente) references RelacionCliente(idRelacionCliente),
foreign key (PaisPep) references Pais(idPais)
);

/*2.14 TBL FACTA*/
DROP TABLE IF EXISTS Fatca;
CREATE TABLE Fatca (
idFatca int auto_increment not null primary key,
Fatca varchar(5),
nombreFatca varchar (250) null,
idRelacionCliente int null,
idCausa int null,
idPic int,
foreign key (idPic) references Pic(idPic) ON DELETE CASCADE,
foreign key (idRelacionCliente) references RelacionCliente(idRelacionCliente),
foreign key (idCausa) references Causa(idCausa)
);








