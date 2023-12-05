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
													  		  	
