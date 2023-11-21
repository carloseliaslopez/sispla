drop view vw_Usuario_per_opc;
Create view vw_Usuario_per_opc AS
select ru.idRolUsuario, ru.idUsuario, ru.idRol , ro.idOpciones,
 u.usuario, u.pwd, u.nombres, u.apellidos, u.correo, u.idEstado,u.firt_time, r.rolDescripcion,o.opcionDescripcion
from rolUsuario ru
inner join rolOpciones ro on ru.idRol = ro.idRol
inner join usuario u on ru.idUsuario = u.idUsuario
inner join rol r on ru.idRol = r.idRol
inner join opciones o on ro.idOpciones = o.idOpciones
and u.idEstado<>3;


SELECT  idRolUsuario, idUsuario, idRol, idOpciones, usuario, pwd, nombres, apellidos, correo, idEstado, RolDescripcion, opcionDescripcion
FROM vw_Usuario_per_opc;


Create view vw_RolUsuario as
select ru.idRolUsuario, ru.idUsuario, ru.idRol , r.rolDescripcion,
 u.usuario, u.pwd, u.nombres, u.apellidos, u.correo, u.idEstado
from rolUsuario ru
inner join usuario u on ru.idUsuario = u.idUsuario
inner join rol r on ru.idRol = r.idRol
and u.idEstado<>3;

