DROP TABLE IF EXISTS sig_datos_centrales;
CREATE TABLE sig_datos_centrales(
id_sig_datos_centrales int auto_increment not null primary key,
fecha date,
estado_señal varchar (15),
nombre_cliente varchar (100),
tipo_alerta varchar (100),
id_alertas_diarias int, 

usuario_creacion int null,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (id_alertas_diarias) REFERENCES alertas_diarias(id_alertas_diarias)
);

DROP TABLE IF EXISTS sig_datos_generales;
CREATE TABLE sig_datos_generales(
id_sig_datos_generales int auto_increment not null primary key,
monto double,
tipo_pago varchar (50),
origenes_fondo varchar (50),
actividad_comercial varchar (250),
plastico varchar (25),
pais_origen varchar (50),
pais_destino varchar (50),
id_alertas_diarias int, 

usuario_creacion int null,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (id_alertas_diarias) REFERENCES alertas_diarias(id_alertas_diarias)

);


DROP TABLE IF EXISTS sig_acc_tomadas;
CREATE TABLE sig_acc_tomadas(
id_sig_acc_tomadas int auto_increment not null primary key,
contacto_cliente varchar (5),
solicitud_info varchar (5),
reporte_ros varchar (5),
id_alertas_diarias int,

usuario_creacion int null,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (id_alertas_diarias) REFERENCES alertas_diarias(id_alertas_diarias)
);

DROP TABLE IF EXISTS sig_doc_recibida;
CREATE TABLE sig_doc_recibida(
id_sig_doc_recibida int auto_increment not null primary key,
documento varchar (100),
observaciones varchar (250),
id_alertas_diarias int,

usuario_creacion int null,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (id_alertas_diarias) REFERENCES alertas_diarias(id_alertas_diarias)
);

DROP TABLE IF EXISTS sig_aspectos_finales;
CREATE TABLE sig_aspectos_finales(
id_sig_aspectos_finales int auto_increment not null primary key,
acc_seguimiento varchar (300),
fecha_revision date,
oficina varchar (50),
id_alertas_diarias int,

usuario_creacion int null,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (id_alertas_diarias) REFERENCES alertas_diarias(id_alertas_diarias)
);
