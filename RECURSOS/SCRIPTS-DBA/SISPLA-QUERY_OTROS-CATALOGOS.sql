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


