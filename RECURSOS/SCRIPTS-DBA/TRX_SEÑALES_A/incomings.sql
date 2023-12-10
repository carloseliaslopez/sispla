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
 comercio varchar (100),
 ciudad varchar (25),
 cod_concepto int,
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
SELECT nombre_cliente, plastico, format(sum(monto), 2) as 'monto', 'Operaciones de criptoactivos' as 'regla','VSYSTEM_PANAMA'  as 'oficina' from  trx_incoming_dsy where codigo_mcc = '6051' group by plastico

