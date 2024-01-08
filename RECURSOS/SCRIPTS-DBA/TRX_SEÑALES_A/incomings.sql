DROP TABLE IF EXISTS trx_incoming_dsy;
CREATE TABLE trx_incoming_dsy(
 id_trx_incoming_dsy int auto_increment not null primary key,
 moneda varchar (25),
 tipo_transaccion varchar (30),
 afiliado varchar (30),
 usuario varchar (15),
 autorizacion varchar (30),
 cod_plan varchar (5),
 plan varchar (150),
 codigo_mcc varchar (10),
 tipo_comercio varchar (100),
 cod_concepto int,
 comercio varchar (255),
 ciudad varchar (25),
 fecha_transaccion 	date,
 fecha_proceso date,
 monto double,
 tipo_entr_tarjeta varchar (5),
 plastico varchar (30),
 nombre_cliente varchar (60),
 riesgo_pais varchar (15),
 empresa varchar (50),
 cuenta_equivalente varchar (50),
 pais varchar (50), 
 moneda_origen varchar (25), 
 monto_origen double,
 moneda_destino varchar (25), 
 monto_destino double,
 cod_pais varchar (5)
);

DROP TABLE IF EXISTS trx_incoming_pro;
CREATE TABLE trx_incoming_pro(
 id_trx_incoming_pro int auto_increment not null primary key,
 moneda varchar (25),
 tipo_transaccion varchar (30),
 afiliado varchar (30),
 plastico varchar (30),
 nombre_cliente varchar (60),
 usuario varchar (15),
 autorizacion varchar (30),
 cod_plan varchar (5),
 plan varchar (150),
 codigo_mcc varchar (10),
 tipo_comercio varchar (100),
 cod_concepto int,
 comercio varchar (255),
 ciudad varchar (25),
 fecha_proceso date,
 monto double,
 tipo_entr_tarjeta varchar (5),
 riesgo_pais varchar (15),
 fecha_transaccion 	date,
 empresa varchar (50),
 cuenta_equivalente varchar (50),
 pais varchar (50), 
 moneda_origen varchar (25), 
 monto_origen double,
 moneda_destino varchar (25), 
 monto_destino double,
 cod_pais varchar (5)
);

DROP TABLE IF EXISTS trx_incoming_pro_col;
CREATE TABLE trx_incoming_pro_col(
 id_trx_incoming_pro_col int auto_increment not null primary key,
 moneda varchar (25),
 tipo_transaccion varchar (30),
 afiliado varchar (30),
 plastico varchar (30),
 nombre_cliente varchar (60),
 usuario varchar (15),
 autorizacion varchar (30),
 cod_plan varchar (5),
 plan varchar (150),
 codigo_mcc varchar (10),
 tipo_comercio varchar (100),
 cod_concepto int,
 comercio varchar (255),
 ciudad varchar (25),
 fecha_proceso date,
 monto double,
 tipo_entr_tarjeta varchar (5),
 riesgo_pais varchar (15),
 fecha_transaccion 	date,
 empresa varchar (50),
 cuenta_equivalente varchar (50),
 pais varchar (50), 
 moneda_origen varchar (25), 
 monto_origen double,
 moneda_destino varchar (25), 
 monto_destino double,
 cod_pais varchar (5)
);

DROP TABLE IF EXISTS trx_incoming_gtm_vsy;
CREATE TABLE trx_incoming_gtm_vsy(
 id_trx_incoming_gtm_vsy int auto_increment not null primary key,
 moneda varchar (25),
 tipo_transaccion varchar (30),
 afiliado varchar (30),
 plastico varchar (30),
 nombre_cliente varchar (60),
 usuario varchar (15),
 autorizacion varchar (30),
 cod_concepto int,
 comercio varchar (255),
 ciudad varchar (25),
 cod_pais varchar (5),
 fecha_transaccion 	date,
 fecha_proceso date,
 monto_usd double,
 monto double,
 tipo_entr_tarjeta varchar (5),
 riesgo_pais varchar (15),
 pais varchar (50)
);

DROP TABLE IF EXISTS trx_incoming_cra;
CREATE TABLE trx_incoming_cra(
 id_trx_incoming_cra int auto_increment not null primary key,
 moneda varchar (25),
 tipo_transaccion varchar (30),
 afiliado varchar (30),
 plastico varchar (30),
 nombre_cliente varchar (60),
 usuario varchar (15),
 autorizacion varchar (30), 
 cod_concepto int,
 comercio varchar (255),
 ciudad varchar (25),
 cod_pais varchar (5),
 fecha_proceso date,
 monto_usd double,
 monto double,
 tipo_entr_tarjeta varchar (5),
 riesgo_pais varchar (15),
 fecha_transaccion 	date,
 empresa varchar (50),
 cuenta_equivalente varchar (50),
 pais varchar (50), 
 moneda_origen varchar (25), 
 monto_origen double,
 moneda_destino varchar (25), 
 monto_destino double
);

DROP TABLE IF EXISTS trx_incoming_gtm;
CREATE TABLE trx_incoming_gtm(
 id_trx_incoming_gtm int auto_increment not null primary key,
 moneda varchar (25),
 tipo_transaccion varchar (30),
 afiliado varchar (30),
 plastico varchar (30),
 nombre_cliente varchar (60),
 usuario varchar (15),
 autorizacion varchar (30),
 cod_concepto int,
 comercio varchar (255),
 ciudad varchar (25),
 cod_pais varchar (5),
 fecha_proceso date,
 monto_usd double,
 monto double,
 tipo_entr_tarjeta varchar (5),
 riesgo_pais varchar (15),
 fecha_transaccion 	date,
 pais varchar (50)
);

DROP TABLE IF EXISTS trx_incoming_gt;
CREATE TABLE trx_incoming_gt(
 id_trx_incoming_gt int auto_increment not null primary key,
 moneda varchar (25),
 tipo_transaccion varchar (30),
 afiliado varchar (30),
 plastico varchar (30),
 nombre_cliente varchar (60),
 usuario varchar (15),
 autorizacion varchar (30),
 cod_concepto int,
 comercio varchar (50),
 ciudad varchar (25),
 cod_pais varchar (5),
 fecha_proceso date,
 monto_usd double,
 monto double,
 tipo_entr_tarjeta varchar (5),
 riesgo_cliente varchar (15),
 fecha_transaccion 	date
);




use sispla;
DROP TABLE IF EXISTS alertas_diarias;
CREATE TABLE alertas_diarias(
id_alertas_diarias int auto_increment not null primary key,
nombre_cliente varchar(100), 
plastico varchar(35),
fecha_proceso date,
monto double,
regla varchar(150),
oficina varchar(50),
estado_regla varchar (15),
idEstado int,
cod_alert_temp varchar (250) unique,

usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,

FOREIGN KEY (usuario_creacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (idEstado) references estado(idEstado)
);





/*VISTAS PARA GENERAR LAS ALERTAS*/
CREATE view central_trx as
select nombre_cliente,plastico, tipo_transaccion,codigo_mcc,riesgo_pais,empresa,pais,cod_pais, fecha_proceso, sum(monto) as 'monto', 'Abierta ' as 'Estado' 
from trx_incoming_dsy group by plastico, month(fecha_proceso) order by monto desc;

DROP view if exists vw_alertas ;
CREATE VIEW  vw_alertas AS
SELECT nombre_cliente, plastico, format(monto, 2) as 'monto', 'Compras Mayores a 100K'  as 'regla', 'VSYSTEM_PANAMA'  as 'oficina' from  central_trx where monto >= 100000
UNION ALL
SELECT nombre_cliente, plastico, format(monto, 2) as 'monto', 'Retiros Mayores a 10K' as 'regla','VSYSTEM_PANAMA'  as 'oficina' from  central_trx where monto >= 20000 and tipo_transaccion = '07| RETIROS'
UNION ALL 
SELECT nombre_cliente, plastico, format(sum(monto), 2) as 'monto', 'Transacciones en Paises de riesgo Alto' as 'regla','VSYSTEM_PANAMA'  as 'oficina' from  trx_incoming_dsy where riesgo_pais = 'Alto' group by plastico
UNION ALL 
SELECT nombre_cliente, plastico, format(sum(monto), 2) as 'monto', 'Operaciones de criptoactivos' as 'regla','VSYSTEM_PANAMA'  as 'oficina' from  trx_incoming_dsy where codigo_mcc = '6051' group by plastico;

DROP VIEW IF EXISTS vw_informe_alertas;
CREATE VIEW vw_informe_alertas AS
SELECT ad.id_alertas_diarias, dc.fecha, dc.estado_señal, ad.nombre_cliente, ad.regla, ad.monto, dg.tipo_pago, dg.origenes_fondo,
	   dg.actividad_comercial, ad.plastico, dg.pais_origen, dg.pais_destino, act.contacto_cliente, act.solicitud_info, act.reporte_ros,
	   ad.fecha_proceso, apf.acc_seguimiento, apf.fecha_revision, ad.oficina 
FROM alertas_diarias ad
INNER JOIN sig_datos_centrales dc ON  dc.id_alertas_diarias = ad.id_alertas_diarias
INNER JOIN sig_datos_generales dg ON dg.id_alertas_diarias = ad.id_alertas_diarias
INNER JOIN sig_acc_tomadas act ON act.id_alertas_diarias = ad.id_alertas_diarias
INNER JOIN sig_aspectos_finales apf ON apf.id_alertas_diarias = ad.id_alertas_diarias;
