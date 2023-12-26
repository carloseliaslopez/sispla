USE SISPLA;

/*TABLA-CATALOGO DE LA DOCUMENTACION RECIBIDA*/
DROP TABLE IF EXISTS Trx_cat_doc_recibida;
CREATE TABLE Trx_cat_doc_recibida(
 idDocumento int auto_increment not null primary key,
 nombreDocumento varchar (150),
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
FOREIGN KEY (idEstado) REFERENCES Estado(idEstado)
);

/*RECEPCION DE DOCUMENTACION RECIBIDA*/
DROP TABLE IF EXISTS Trx_doc_recibida;
CREATE TABLE Trx_doc_recibida(
 idDocumentoRec int auto_increment not null primary key,
 codRegla varchar (50),
 idDocumento int,
 
 usuario_creacion int,
 fecha_creacion datetime null,
 usuario_modificacion int null,
 fecha_modificacion datetime null,
 usuario_eliminacion int null,
 fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (idDocumento) REFERENCES Trx_cat_doc_recibida(idDocumento)
);

/*ESTADOS DE LAS ALERTAS (ABIERTA/ EN PROCESO/CERRADA)*/
DROP TABLE IF EXISTS Trx_estadoAlerta;
CREATE TABLE Trx_estadoAlerta(
 idEstadoAlerta int auto_increment not null primary key,
 nombreEstado varchar (50),
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
FOREIGN KEY (idEstado) REFERENCES Estado(idEstado)
);

/*TABLA CENTRAL DE LAS SEÑALES*/
DROP TABLE IF EXISTS Trx_senial;
CREATE TABLE Trx_senial(
 idSenial int auto_increment not null primary key,
 autorizacion varchar (50),
 cliente varchar (150),
 usuario varchar (150),
 cuenta varchar (25),
 fechaProceso datetime,
 operacion varchar (50),
 monto float,
 codRegla varchar (50),
 paisTrx varchar (100),
 idRegla int,
 idOficina int,
 idEstadoAlerta int,

 usuario_creacion int,
 fecha_creacion datetime null,
 usuario_modificacion int null,
 fecha_modificacion datetime null,
 usuario_eliminacion int null,
 fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (idRegla) REFERENCES Trx_regla(idRegla),
FOREIGN KEY (idOficina) REFERENCES Trx_oficina(idOficina)
);


/*TABLA-OFICINAS DONDE SE GENERAN SEÑALES DE ALERTAS*/
DROP TABLE IF EXISTS trx_oficina;
CREATE TABLE trx_oficina(
 idOficina int auto_increment not null primary key,
 nombreOficina varchar (50),
 paisOficina varchar (50),
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
FOREIGN KEY (idEstado) REFERENCES estado(idEstado)
);


/*CATALOGO DE LAS ALERTAS */
DROP TABLE IF EXISTS Trx_regla;
CREATE TABLE Trx_regla(
 idRegla int auto_increment not null primary key,
 nombreRegla varchar (100),
 criterio varchar (150),
 riesgo int,
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
FOREIGN KEY (idEstado) REFERENCES Estado(idEstado)
);

DROP TABLE IF EXISTS Trx_oficinaRegla;
CREATE TABLE Trx_oficinaRegla(
 idOficinaRegla int auto_increment not null primary key,
 idOficina int,
 idRegla int,
 
 usuario_creacion int,
 fecha_creacion datetime null,
 usuario_modificacion int null,
 fecha_modificacion datetime null,
 usuario_eliminacion int null,
 fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (idOficina) REFERENCES Trx_oficina(idOficina),
FOREIGN KEY (idRegla) REFERENCES Trx_regla(idRegla)
);

/*ANEXOS QUE AGREGAR A LA TABLA CENTRAL*/
DROP TABLE IF EXISTS Trx_cierre_alerta;
CREATE TABLE Trx_cierre_alerta(
 idCierreAlerta int auto_increment not null primary key,
 metodoPago varchar (150),
 origenFondo varchar (150),
 actComercial varchar (150),
 contactoCliente varchar (150),
 reporteROS varchar (150),
 obsSeguimiento varchar (250),
 FechaRevision datetime,
 codRegla varchar (50),
  
 usuario_creacion int,
 fecha_creacion datetime null,
 usuario_modificacion int null,
 fecha_modificacion datetime null,
 usuario_eliminacion int null,
 fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES Usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES Usuario(idUsuario)
);

/*VISTAS */
DROP VIEW IF EXISTS vw_trx_alertas;
CREATE VIEW vw_trx_alertas AS
SELECT s.idSenial, s.autorizacion, s.cliente, s.usuario, s.cuenta, s.fechaProceso, s.operacion, 
		s.monto, s.codRegla, s.paisTrx, s.idRegla, r.nombreRegla, s.idOficina,o.nombreOficina, s.idEstadoAlerta, e.nombreEstado
FROM trx_senial s
INNER JOIN trx_regla r ON s.idRegla = r.idRegla
INNER JOIN Trx_oficina o ON s.idOficina = o.idOficina
INNER JOIN trx_estadoalerta e ON s.idEstadoAlerta = e.idEstadoAlerta
AND s.idEstadoAlerta <>3;

DROP VIEW IF EXISTS vw_oficinaRegla;
CREATE VIEW vw_oficinaRegla AS
SELECT tor.idOficinaRegla, tor.idOficina, o.nombreOficina, tor.idRegla, r.nombreRegla
FROM trx_oficinaregla tor
INNER JOIN trx_oficina o ON tor.idOficina = o.idOficina
INNER JOIN trx_regla r ON tor.idRegla = r.idRegla;

DROP VIEW IF EXISTS Trx_senial_total;
CREATE VIEW Trx_senial_total AS
SELECT  cliente, usuario, codRegla, idRegla, nombreRegla, idOficina, nombreOficina,idEstadoAlerta, nombreEstado, format(sum(MONTO),2) as 'Monto_Total' FROM vw_trx_alertas GROUP BY codRegla;






















