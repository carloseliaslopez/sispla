drop view if Exists vw_consol_nombre;
Create view vw_consol_nombre as
select nombre, id, origen from empleados
union all
select nombre, id, origen from proveedores
union all
select nombreCliente as 'nombre', id, origen from pic
union all 
select rl.nombreRepresentanteLegal as 'nombre', rl.numeroIdentificacion as 'id', concat_ws("", "Representante Legal-", p.nombreCliente) as 'origen'  from datosrepresentantelegal rl
inner join pic p on rl.idPic= p.idPic
union all
Select ac.nombreCompletoAccionistas as 'nombre', ac.numIdAccionistas as 'id', concat_ws("", "Accionista-", p.nombreCliente) as 'origen'  from accionistas ac
inner join pic p on ac.idPic= p.idPic
union all
Select concat_ws("",bf.nombreBeneFinales," ",bf.ApellidosBeneFinales) as 'nombre', bf.numIdBeneFinales as 'id', concat_ws("", "Beneficiario final-", p.nombreCliente) as 'origen'  from beneficiariosfinales bf
inner join pic p on bf.idPic= p.idPic;
