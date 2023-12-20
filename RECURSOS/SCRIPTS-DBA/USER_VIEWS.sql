drop view vw_usuario_per_opc;
Create view vw_usuario_per_opc AS
select ru.idRolUsuario, ru.idUsuario, ru.idRol , ro.idOpciones,
 u.usuario, u.pwd, u.nombres, u.apellidos, u.correo, u.idEstado,u.firt_time, r.rolDescripcion,o.opcionDescripcion,ip.num_intentos
from rolUsuario ru
inner join rolopciones ro on ru.idRol = ro.idRol
inner join usuario u on ru.idUsuario = u.idUsuario
inner join rol r on ru.idRol = r.idRol
inner join opciones o on ro.idOpciones = o.idOpciones
inner join intentos_permitido ip on ip.idUsuario = u.idUsuario
and u.idEstado<>3;

SELECT  idRolUsuario, idUsuario, idRol, idOpciones, usuario, pwd, nombres, apellidos, correo, idEstado, RolDescripcion, opcionDescripcion
FROM vw_usuario_per_opc;


Create view vw_rolusuario as
select ru.idRolUsuario, ru.idUsuario, ru.idRol , r.rolDescripcion,
 u.usuario, u.pwd, u.nombres, u.apellidos, u.correo, u.idEstado
from rolUsuario ru
inner join usuario u on ru.idUsuario = u.idUsuario
inner join rol r on ru.idRol = r.idRol
and u.idEstado<>3;

