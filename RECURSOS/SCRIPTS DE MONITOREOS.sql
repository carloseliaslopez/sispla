select nombre_cliente,plastico, tipo_transaccion,codigo_mcc,riesgo_pais,empresa,pais,cod_pais, fecha_proceso, sum(monto) as 'monto', 'Abierta ' as 'Estado' from trx_incoming_dsy group by plastico, month(fecha_proceso) order by monto desc;
