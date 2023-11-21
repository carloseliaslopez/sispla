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


CREATE VIEW  vw_con_list_risk AS
select fullName_E as 'fullName',origen from global_risk_lists.ofac_list_en
union all
select fullName_I as 'fullName',origen from global_risk_lists.ofac_list_in
union all
select fullName_E as 'fullName',origen from global_risk_lists.onu_list_en
union all
select fullName_I as 'fullName',origen from global_risk_lists.onu_list_in;

drop view if exists Lista_Coincidencia;	 
create view Lista_Coincidencia As
select i.nombre, i.id, i.origen as 'relacion', j.origen from vw_consol_nombre i
inner join GLOBAL_RISK_LISTS.vw_con_list_risk  j on i.nombre = j.fullName;

drop view if exists Lista_No_Coincidencia;	 
create view Lista_No_Coincidencia As
select a.nombre, a.id, a.origen from  sispla.vw_consol_nombre a
left join global_risk_lists.vw_con_list_risk b
on a.nombre = b.fullName
where b.fullName is null;


DROP TABLE IF EXISTS Posibles_List;
CREATE TABLE Posibles_List(
idPosibles_List int auto_increment not null primary key,
Nombre varchar(250) unique,
Id varchar(50),
Origen varchar(50),
Nombre2 varchar(250) unicode,
Origen2 varchar(50),

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

