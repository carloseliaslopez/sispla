
CREATE VIEW vw_Accionistas as
select a.idPic, a.nombreCompletoAccionistas, a.nacionalidadAccionistas, p.nombrePais as 'nombre_nacionalidadAccionistas',
a.deptoNacionalidadAccionistas, d.nombreDepartamento as 'nombre_deptoNacionalidadAccionistas', a.numIdAccionistas, a.acciones
from Accionistas a 
inner join Pais p on a.nacionalidadAccionistas = p.idPais
inner join Departamento d on  a.deptoNacionalidadAccionistas= d.idDepartamento;

create view vw_ActividadEconomica as
select ac.IdPic, ac.nombreComercial, ac.idTributaria, ac.anios, ac.domicilioComercial,
ac.paisDomicilio, p.nombrePais as 'nombre_paisDomicilio', ac.departamento,d.nombreDepartamento as 'nombre_departamento', ac.paginaWeb,ac.telefonoOficina,
ac.idAreaGeografica,ag.nombreAreaGeografica as 'nombre_idAreaGeografica', ac.idActividadNegocio, an.nombreActividadNegocio as 'nombre_idActividadNegocio', 
ac.descripcion, ac.ventasMensual, ac.numEmpleados, ac.numSucursales, ac.grupoEconomico, ac.indicar
from actividadEconomica ac
inner join Pais p on ac.paisDomicilio = p.idPais
inner join Departamento d on ac.departamento = d.idDepartamento
inner join AreaGeografica ag on ac.idAreaGeografica = ag.idAreaGeografica
inner join ActividadNegocio an on ac.idActividadNegocio = an.idActividadNegocio;

CREATE VIEW vw_Benefinales AS
SELECT 
bf.idBeneficiariosFinales, bf.nombreBeneFinales, bf.ApellidosBeneFinales, 
bf.nacionalidadBeneFinales, p.nombrePais as 'nombre_nacionalidadBeneFinales', 
bf.deptoNacionalidadBeneFinales, d.nombreDepartamento as 'nombre_deptoNacionalidadBeneFinales',
bf.numIdBeneFinales, bf.AccionesBeneFinales, bf.idPic
FROM beneficiariosfinales bf 
INNER JOIN Pais p ON bf.nacionalidadBeneFinales = p.idPais
INNER JOIN departamento d ON bf.deptoNacionalidadBeneFinales = d.idDepartamento;

/*Vistas para evaluaciones*/
Create view vw_CatalogoSubProducto as
SELECT csp.idCatalogoSubProducto, csp.nombreSubProducto, cp.nombreCategoriaProducto as 'idCategoriaProducto', csp.riesgoSubProducto,csp.idEstado 
From CatalogoSubProducto csp
INNER JOIN CategoriaProducto cp  on csp.idCategoriaProducto = cp.idCategoriaProducto
and csp.idEstado<>3;

CREATE VIEW vw_CatalogoSubProducto_admin AS  
SELECT csp.idCatalogoSubProducto, csp.nombreSubProducto, csp.idCategoriaProducto,cp.nombreCategoriaProducto, csp.riesgoSubProducto, csp.idEstado
FROM CatalogoSubProducto csp
INNER JOIN CategoriaProducto cp ON csp.idCategoriaProducto = cp.idCategoriaProducto
AND csp.idEstado <> 3;

CREATE VIEW vw_DatosClienteNaturalPic AS
SELECT 
dcnp.idPic,dcnp.fechaNacimiento, dcnp.paisNacimiento, p_naci.nombrePais AS 'nombre_paisNacimiento',
dcnp.deptoPaisNacimiento, d_naci.nombreDepartamento AS 'nombre_deptoPaisNacimiento', dcnp.nacionalidad, p_nacio.nombrePais AS 'nombre_nacionalidad',
dcnp.deptoNacionalidad, d_nacio.nombreDepartamento AS 'nombre_deptoNacionalidad', dcnp.idEstadoCivil, 
ec.descripcion AS 'nombre_idEstadoCivil', dcnp.sexo, dcnp.ndependientes, dcnp.tipoIdentificacion, 
dcnp.numIdentificacion, dcnp.paisEmision, p_paemi.nombrePais AS 'nombre_paisEmision', dcnp.fechaEmision, 
dcnp.fechaVencimiento, dcnp.direccionDomicilio, dcnp.PaisDomicilio, p_padomi.nombrePais AS 'nombre_PaisDomicilio', 
dcnp.deptoPaisDomicilio, d_domi.nombreDepartamento AS 'nombre_deptoPaisDomicilio', dcnp.telefono, 
dcnp.celular, dcnp.correoPersonaNatural, dcnp.profesion
FROM datosclientenaturalpic dcnp
INNER JOIN pais p_naci ON dcnp.paisNacimiento = p_naci.idPais
INNER JOIN pais p_nacio ON dcnp.nacionalidad = p_nacio.idPais
INNER JOIN estadocivil ec ON dcnp.idEstadoCivil = ec.idEstadoCivil
INNER JOIN pais p_paemi ON dcnp.paisEmision = p_paemi.idPais
INNER JOIN pais p_padomi ON dcnp.PaisDomicilio = p_padomi.idPais
INNER JOIN departamento d_naci ON dcnp.deptoPaisNacimiento = d_naci.idDepartamento
INNER JOIN departamento d_nacio ON dcnp.deptoNacionalidad = d_nacio.idDepartamento
INNER JOIN departamento d_domi ON dcnp.deptoPaisDomicilio = d_domi.idDepartamento;


create view vw_DatosConyuge as
select dtc.idPic, dtc.nombreConyugue, dtc.fechaNacimiento, dtc.paisNacimientoConyuge, p_nacim.nombrePais as 'nombre_paisNacimientoConyuge',
dtc.nacionalidadConyuge, p_nacim.nombrePais as 'nombre_nacionalidadConyuge', dtc.tipoIdentificacion, dtc.numeroIdentificacion, 
dtc.paisEmision, p_nacim.nombrePais as 'nombre_paisEmision', dtc.profesion, dtc.celular, dtc.empresaLabora, 
dtc.telefono, dtc.cargoEmpresa,dtc.ingresoMensual
from DatosConyuge dtc
inner join pais p_nacim on dtc.paisNacimientoConyuge = p_nacim.idPais
inner join pais p_nacio on dtc.nacionalidadConyuge = p_nacio.idPais
inner join pais p_emi on dtc.paisEmision = p_emi.idPais;


CREATE VIEW vw_DatosGenerales as
SELECT 
dcjp.idPiC,dcjp.paisConstitucion, p_dcjp.nombrePais as 'nombre_paisConstitucion',dcjp.deptoConstitucion,dpto.nombreDepartamento,  dcjp.fechaConstitucion, dcjp.fechaInscripcion,
dcjp.correoPersonaContacto,dcjp.nombrePersonaContacto,dcjp.cargoPersonaContacto,dcjp.telefono
from DatosClienteJuridicoPic dcjp 
inner join Pais p_dcjp on  dcjp.paisConstitucion = p_dcjp.idPais
inner join Departamento dpto on dcjp.deptoConstitucion = dpto.idDepartamento;

/*Vista datos laborales*/
Create view vw_DatosLaborales as
select dtl.idPic, dtl.nombreEmpresa, dtl.cargoEmpresa, dtl.fechaIngreso, dtl.antiguedad, dtl.direccionEmpresa,
	   dtl.paisEmpresa, p_em.nombrePais as 'nombre_paisEmpresa', dtl.telefono, dtl.salarioMensual, dtl.otrosIngresos, 
       dtl.egresosMensuales, dtl.fuenteOtrosIngresos
from DatosLaborales dtl
inner join pais p_em on dtl.paisEmpresa = p_em.idPais;


CREATE VIEW vw_datosRL as
select drl.idPic, drl.nombreRepresentanteLegal,drl.paisNacimiento, p_pn.nombrePais as 'nombre_paisNacimiento', drl.deptoPaisNacimiento, d_naci.nombreDepartamento as 'nombre_deptoPaisNacimiento',
drl.nacionalidad,p_na.nombrePais as 'nombre_nacionalidad',drl.deptoNacionalidad, d_nac.nombreDepartamento as 'nombre_deptoNacionalidad',drl.tipoIdentificacion,drl.numeroIdentificacion,
drl.paisEmision,p_pe.nombrePais as 'nombre_paisEmision', drl.fechaEmision,drl.fechaVencimiento,
drl.paisResidencia, p_pr.nombrePais as 'nombre_paisResidencia', drl.deptoPaisResidencia, d_resi.nombreDepartamento as 'nombre_deptoPaisResidencia',
drl.celular, drl.correo, drl.cargo, drl.profesion
from DatosRepresentanteLegal drl 
inner join Pais p_pn on drl.paisNacimiento = p_pn.idPais
inner join Departamento d_naci on drl.deptoPaisNacimiento = d_naci.idDepartamento
inner join Pais p_na on drl.nacionalidad = p_na.idPais
inner join Departamento d_nac on drl.deptoNacionalidad = d_nac.idDepartamento
inner join Pais p_pe on drl.paisEmision = p_pe.idPais
inner join Pais p_pr on drl.paisResidencia = p_pr.idPais
inner join Departamento d_resi on drl.deptoPaisResidencia = d_resi.idDepartamento;

DROP VIEW IF EXISTS vw_Departamento;
Create view vw_Departamento as
select d.idDepartamento, d.nombreDepartamento,d.calificacion, d.idEstado, d.idPais, p.nombrePais
from Departamento d
inner join Pais p on d.idPais = P.idPais
AND d.idEstado <> 3;


create view vw_DocumentacionRecibida as
select dr.idDocumentacionRecibida , dr.idCliente, dr.idCatalogoDocumentos,
dr.productoSolicitado, dr.comentario, cd.descripcion
from DocumentacionRecibida dr
inner join CatalogoDocumentos cd on dr.idCatalogoDocumentos = cd.idCatalogoDocumentos;

create view vw_Facta as
select f.idPic, f.facta, f.nombreFacta,f.idRelacionCliente, rc.descripcion as 'nombre_idRelacionCliente', 
f.idCausa, c.descripcion as 'nombre_idCausa'
from facta f
inner join RelacionCliente rc on f.idRelacionCliente= rc.idRelacionCliente
inner join Causa c on f.idCausa = c.idCausa;

/*Vistas datos del fiador */
create view vw_Fiador as
select f.idPic, f.nombreFiador, f.RelacionDeudor, f.nacionalidad, p_nacio.nombrePais as 'nombre_nacionalidad', f.tipoIdentificacionFiador,
	   f.numIdFiador, f.paisEmision, p_emi.nombrePais as 'nombre_paisEmision', f.correoFiador, f.celularFiador, f.direccionFiador,
	   f.paisDomicilioFiador, p_domi.nombrePais as 'nombre_paisDomicilioFiador', f.telefonoFiador, f.EmpresaFiador, f.telefonoEmpresa,
       f.cargoFiador, f.ingresoMensualFiador
from Fiador f
inner join pais p_nacio on f.nacionalidad = p_nacio.idPais
inner join pais p_emi on f.paisEmision = p_emi.idPais
inner join pais p_domi on f.paisDomicilioFiador = p_domi.idPais;

/*VISTA PARA MOSTRAR LOS DATOS EN LA MATRIZ DE INFORME GENERAL IDD */
CREATE VIEW vw_informeIDD as 
select idCliente, cliente, tipoCliente, productoSolicitado, paisMatriz, riesgoCliente, fechaRealizacion from MatrizRiesgoJuridico 
union all
select idCliente, cliente, tipoCliente, productoSolicitado, paisMatriz, riesgoCliente, fechaRealizacion from MatrizRiesgoNatural;

CREATE VIEW vw_InteresInfo AS 
SELECT 
ii.idInteresInfo,
ii.idTipoPerJuridica, tpj.tipoPersona,
ii.idConstitucion, c.fechaConstitucion,
ii.idCatalogoAE, cae.descripcion,
ii.idBusquedaRes, br.busqueda,
ii.idPaisAE, p.nombrePais,
ii.idDepto, d.nombreDepartamento,
ii.idPic
FROM InteresInfo ii
INNER JOIN  TipoPerJuridica tpj ON ii.idTipoPerJuridica = tpj.idTipoPerJuridica
INNER JOIN Constitucion c ON ii.idConstitucion = c.idConstitucion
INNER JOIN catalogo_acti_economica cae ON ii.idCatalogoAE = cae.idCatalogo_Acti_Economica
INNER JOIN BusquedaRes br ON ii.idBusquedaRes = br.idBusquedaRes
INNER JOIN Pais p ON ii.idPaisAE = p.idPais
INNER JOIN Departamento d ON ii.idDepto = d.idDepartamento
INNER JOIN Pic pic ON ii.idPic = pic.idPic;

CREATE VIEW vw_InteresInfo_matriz AS 
SELECT 
ii.idInteresInfo,
ii.idTipoPerJuridica, tpj.tipoPersona, tpj.calificacion as 'riesgoTPJ',
ii.idConstitucion, c.fechaConstitucion, c.calificacion as 'riesgoC',
ii.idCatalogoAE, cae.descripcion, cae.calificacion as 'riesgoAE',
ii.idBusquedaRes, br.busqueda, br.calificacion as 'riesgoBR',
ii.idPaisAE, p.nombrePais, p.calificacion as 'riesgoP',
ii.idDepto, d.nombreDepartamento, d.calificacion as 'riesgoD',
ii.idPic
FROM InteresInfo ii
INNER JOIN  TipoPerJuridica tpj ON ii.idTipoPerJuridica = tpj.idTipoPerJuridica
INNER JOIN Constitucion c ON ii.idConstitucion = c.idConstitucion
INNER JOIN Catalogo_Acti_Economica cae ON ii.idCatalogoAE = cae.idCatalogo_Acti_Economica
INNER JOIN BusquedaRes br ON ii.idBusquedaRes = br.idBusquedaRes
INNER JOIN Pais p ON ii.idPaisAE = p.idPais
INNER JOIN Departamento d ON ii.idDepto = d.idDepartamento
INNER JOIN Pic pic ON ii.idPic = pic.idPic;


CREATE VIEW vw_InteresInfoPN AS 
SELECT 
iin.idInteresInfoPN,
iin.idCategoriaOcupacional, co.tipoCategoria, co.calificacion as 'riesgo_CatOcup',
iin.idCatalogoOCGO, cocgo.codigoCGO, cocgo.descripcionCGO, cocgo.riesgoCGO,
iin.idCatalogo_Acti_Economica, cae.codigoCIIU, cae.descripcion,cae.calificacion as 'riesgo_AC',
iin.idPaisACII, p.nombrePais, p.calificacion as 'riesgo_Pais',
iin.idDeptoACII, d.nombreDepartamento, d.calificacion as 'riesgo_Depto',
iin.idBusquedaRes, br.busqueda, br.calificacion as 'riesgo_Busqueda',
iin.idPic
FROM InteresInfoPN iin
INNER JOIN CategoriaOcupacional co ON iin.idCategoriaOcupacional = co.idCategoriaOcupacional
INNER JOIN CatalogoOCGO cocgo ON iin.idCatalogoOCGO = cocgo.idCatalogoOCGO
INNER JOIN Catalogo_Acti_Economica cae ON iin.idCatalogo_Acti_Economica = cae.idCatalogo_Acti_Economica
INNER JOIN Pais p ON iin.idPaisACII = p.idPais
INNER JOIN Departamento d ON iin.idDeptoACII = d.idDepartamento
INNER JOIN BusquedaRes br ON iin.idBusquedaRes = br.idBusquedaRes
INNER JOIN Pic pi ON iin.idPic = pi.idPic;

CREATE VIEW vw_MatrizRiesgoJuridico AS 
SELECT idMatrizRiesgoJuridico,cliente, lugarConstitucion, lugarNacimiento_RL, lugarNacionalidad_RL,lugarResidencia_RL, lugarNacionalidad_ACM, lugarNacionalidad_BFM, 
personalidadJuridica,fechaConstitucion,actividadEconomica,lugarActividadEconomica,
resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente,
DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') AS 'fechaRealizacion',tipoCliente,paisMatriz,idCliente,idEstado,proximaRevision, datediff(proximaRevision,now()) as "diasRestantes"
FROM MatrizRiesgoJuridico
WHERE idEstado<>3;

CREATE VIEW vw_MatrizRiesgoNatural AS 
SELECT idMatrizRiesgoNatural,cliente, lugarNacimiento,lugarNacionalidad,lugarResidencia,categoria,profesion,actividadEmpleo,lugarActividadEconomica,
resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente, 
DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') as 'fechaRealizacion',tipoCliente,paisMatriz,idCliente,idEstado, proximaRevision,datediff(proximaRevision,now()) as "diasRestantes"
FROM MatrizRiesgoNatural 
WHERE idEstado<>3;

create view vw_Nacionalidad_tbl_DCNP as
select p.calificacion, p. nombrePais, dcnp.idPic
from DatosClienteNaturalPic dcnp
inner join pais p on dcnp.nacionalidad = p.Idpais;

create view vw_Nacionalidad_tbl_DRL as
select p.calificacion, p.nombrePais, drl.idPic
from DatosRepresentanteLegal drl
inner join pais p on drl.nacionalidad = p.Idpais;

create view vw_UGeografica_PN as
select dtn.idPic,
p_dtn1.calificacion as 'calificacion_PN', p_dtn1.nombrePais as 'nombre_PaisNacimiento', dtn.PaisNacimiento,
p_dtn2.calificacion as 'calificacion_N', p_dtn2.nombrePais as 'nombre_nacionalidad', dtn.nacionalidad, 
p_dtn3.calificacion as 'calificacion_PD', p_dtn3.nombrePais as 'nombre_PaisDomicilio', dtn.PaisDomicilio
from DatosClienteNaturalPic dtn
inner join pais p_dtn1 on dtn.PaisNacimiento =  p_dtn1.idPais
inner join pais p_dtn2 on dtn.nacionalidad =  p_dtn2.idPais
inner join pais p_dtn3 on dtn.paisDomicilio =  p_dtn3.idPais;

create view vw_PaisNacimiento_tbl_DCNP as
select p.calificacion, p. nombrePais, dcnp.idPic
from DatosClienteNaturalPic dcnp
inner join pais p on dcnp.paisNacimiento = p.Idpais;

create view vw_PConstitucion_tbl_DCJP as
select p.calificacion, p. nombrePais, dcjp.idPic
from DatosClienteJuridicoPic dcjp
inner join pais p on dcjp.paisConstitucion = p.Idpais;

create view vw_PDomicilio_tbl_DCNP as
select p.calificacion, p. nombrePais, dcnp.idPic
from DatosClienteNaturalPic dcnp
inner join pais p on dcnp.paisDomicilio = p.Idpais;


create view vw_OrigenesFondos as
SELECT ofs.idPic, ofs.idFormaPago, fp.nombreFormaPago as 'nombre_idFormaPago', fp.riesgoFP,
ofs.idFuenteFondos,ff.nombreFuenteFondos as 'nombre_idFuenteFondos', ff.riesgoFF
from origenesfondos ofs
inner join formapago fp on ofs.idFormaPago = fp.idFormaPago
inner join fuentefondos ff on ofs.idFuenteFondos = ff.idFuenteFondos;


create view vw_Pep as
select p.IdPic, p.pep, p.nombrePep, p.idRelacionCliente, rc.descripcion as 'nombre_idRelacionCliente', p.nombreEntidad,
p.PaisPep,pa.nombrePais as 'nombre_PaisPep', p.cargo, p.perido
from  pep p
inner join RelacionCliente rc on p.idRelacionCliente= rc.idRelacionCliente
inner join pais pa on p.PaisPep = pa.IdPais;

create view vw_PNacimiento_tbl_DRL as
select p.calificacion, p.nombrePais, drl.idPic
from DatosRepresentanteLegal drl
inner join pais p on drl.paisNacimiento = p.Idpais;

create view vw_PResidencia_tbl_DRL as
select p.calificacion, p.nombrePais, drl.idPic
from DatosRepresentanteLegal drl
inner join pais p on drl.paisResidencia = p.Idpais;

create view vw_PrincipalesClientes as
select pc.idPrincipalesClientes,pc.IdPic,pc.nombreClientePic, p.nombrePais as 'domicilio', pc.telefono
from PrincipalesClientes pc
inner join pais p on pc.domicilio = p.idPais ;

create view vw_PrincipalesProveedores as
select pp.idPrincipalesProveedores, pp.idPic, pp.nombreProveedor, pp.servicio, p.nombrePais as 'domicilio', pp.telefono
from PrincipalesProveedores pp
inner join pais p on pp.domicilio = p.idPais;


CREATE VIEW AlertaMatrizEvaluacion AS
Select idMatrizRiesgoJuridico,idCliente,cliente, productoSolicitado, riesgoCliente,tipoCliente,idEstado,proximaRevision,datediff(proximaRevision,now()) as "diasRestantes"
from MatrizRiesgoJuridico
WHERE idEstado<>3
union all 
Select idMatrizRiesgoNatural,idCliente,cliente, productoSolicitado, riesgoCliente,tipoCliente,idEstado,proximaRevision,datediff(proximaRevision,now()) as "diasRestantes"
from MatrizRiesgoNatural
WHERE idEstado<>3;


