<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/ComboPais.php';
include '../Entidades/ComboFormaPago.php';
include '../Entidades/ComboOrigenesFondos.php';
include '../Entidades/ComboAreaGeografica.php';
include '../Entidades/ComboActividadNegocio.php';
include '../Entidades/ComboEstadoCivil.php';

//Entidad Central
include '../Entidades/Pic.php';

include '../Entidades/Compartidas/Departamento.php';
include '../Entidades/Compartidas/RelacionCliente.php';
include '../Entidades/Compartidas/Causa.php';
include '../Entidades/Compartidas/OrigenesFondos.php';
include '../Entidades/Compartidas/Pep.php';
include '../Entidades/Compartidas/Facta.php';

//include '../Entidades/Juridio/DatosClienteJuridicoPic.php';
include '../Entidades/Juridio/DatosRepresentanteLegal.php';
include '../Entidades/Juridio/Accionistas.php';
include '../Entidades/Juridio/BeneficiariosFinales.php';
include '../Entidades/Juridio/ActividadEconomica.php';
include '../Entidades/Juridio/PrincipalesClientes.php';
include '../Entidades/Juridio/PrincipalesProveedores.php';
include '../Entidades/Juridio/Apoderados.php';

include '../Entidades/Anexos/CategoriaSalario.php';
include '../Entidades/Anexos/Constitucion.php';
include '../Entidades/Anexos/TipoPerJuridica.php';
include '../Entidades/Anexos/BusquedaRes.php';
include '../Entidades/Anexos/InteresInfo.php';
include '../Entidades/Anexos/vw_InteresInfo.php';


include '../Entidades/Vistas/vw_DatosGenerales.php';
include '../Entidades/Vistas/vw_datosRL.php';
include '../Entidades/Vistas/vw_Accionistas.php';
include '../Entidades/Vistas/vw_BeneficiariosFinales.php';

//DATOS
include '../Datos/DtCombos.php';
include '../Datos/DtPic.php';
include '../Datos/DtDataPicCompartidos.php';
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
//INSTANCIAS
$combos = new DtCombos();

$datospic = new DtPic();
$datoscompartidos = new DtDataPicCompartidos();
//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO

//datos del pic Juridico
$varIdEmp = $_GET['dataPIC'];

$empEdit;
$empEdit = $datospic->ObtenerPic($varIdEmp);

$datosGlobales;
$datosGlobales= $datospic->Obtenerdatos($varIdEmp);

$datosRL;
$datosRL= $datospic->DatosRL($varIdEmp);

$datosAc;
$datosAc= $datospic->ActividadEconomica($varIdEmp);

//compartidos
$dtOrigenesFondos;
$dtOrigenesFondos = $datoscompartidos->OrigenesFondos($varIdEmp);

$datosPep;
$datosPep = $datoscompartidos->DatosPep($varIdEmp);

$datosFacta;
$datosFacta = $datoscompartidos->DatosFacta($varIdEmp);


$dtinfo;
$dtinfo = $datospic->DatosInteres($varIdEmp);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PIC</title>
        <link rel="icon" href="./images/icon_versatec.png">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/NewStyles.css" rel="stylesheet" />
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->
        
        <!-- DATATABLE -->
        <link href="DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
         <!-- DATATABLE buttons -->
        <link href="DataTables/Buttons-1.6.3/css/buttons.dataTables.min.css" rel="stylesheet">
      
       
    </head>
    <body class="sb-nav-fixed">
    <?php require "../dist/navbar.php" ?>
        <div id="layoutSidenav">
        <?php require "../dist/LayoutSidenav.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <!-- cardbody agregar start-->
                      <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Información PIC
                            </div>
                            
                            <div class="col-md-12" >
                                <div class="form-row">                                              
                                    <div class="form-group col-md-2">
                                        <label for="fechaPic_PN">Fecha del PIC</label>
                                        <input type="text" class="form-control form-control-sm" id="fechaPic_PN" name="fechaPic_PN" placeholder="Fecha del PIC" disabled>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" >
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="nombreCliente_PN">Nombre del cliente</label>
                                        
                                        <input type="text" class="form-control form-control-sm" id="nombreCliente_PN" name="nombreCliente_PN" placeholder="Nombre del cliente" disabled>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="idCliente_PN">Número de identidad</label>
                                        <input type="text" class="form-control form-control-sm" id="idCliente_PN" name="idCliente_PN" placeholder="Número de identidad" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- cardbody PIC Datos end-->
                     
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div style="text-align: right;">
                                        <a href="#" title="Regresar a la página anterior">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Regresar
                                        </a>
                                    </div>
                               

                                    <!--Start form-->
                                    <hr/>
                                    
                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 1. Datos Cliente persona júridica</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="paisContitucion_PJ">Pais de constitución</label>
                                                    <select  class="form-control form-control-sm" id="paisContitucion_PJ" name="paisContitucion_PJ" required>
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="departamento">Departamento</label>
                                                    <select id="depto_paisContitucion_PJ" name="depto_paisContitucion_PJ"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="hidden" name="idCli_PN" id="idCli_PN" />
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                    <label for="fechaConstitucion_PJ">Fecha de constitución</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaConstitucion_PJ" name=" fechaConstitucion_PJ" placeholder="Fecha de constitución" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fechaInscripcion_PJ">Fecha de inscripción</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaInscripcion_PJ" name="fechaInscripcion_PJ" placeholder="Fecha de inscripción">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="correoPersonaContacto_PJ">Correo de la persona de  Contacto</label>
                                                    <input type="email" class="form-control form-control-sm" id="correoPersonaContacto_PJ" name="correoPersonaContacto_PJ" placeholder="Correo electrónico de la persona de Contacto" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label for="nombrePersonaContacto_PJ">Nombre de la persona de  Contacto</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombrePersonaContacto_PJ" name="nombrePersonaContacto_PJ" placeholder="Nombre de la persona de  Contacto" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cargoPersonaContacto_PJ">Cargo en la empresa</label>
                                                    <input type="text" class="form-control form-control-sm" id="cargoPersonaContacto_PJ" name="cargoPersonaContacto_PJ" placeholder="Cargo en la empresa" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="telefonoPersonaContacto_PJ">Teléfono de contacto</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefonoPersonaContacto_PJ" name="telefonoPersonaContacto_PJ" placeholder="Teléfono de contacto" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> 1.1 Datos representante legal</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="nombreCompleto_RL">Nombre completo</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombreCompleto_RL" name="nombreCompleto_RL" placeholder="Nombre completo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="paisNacimiento_RL">País de nacimiento</label>
                                                    <select  class="form-control form-control-sm" id= "paisNacimiento_RL" name="paisNacimiento_RL">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="depto_paisNacimiento_RL">Departamento</label>
                                                    <select id="depto_paisNacimiento_RL" name="depto_paisNacimiento_RL"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="nacionalidad_RL">Nacionalidad</label>
                                                    <select class="form-control form-control-sm" id="nacionalidad_RL" name ="nacionalidad_RL">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="tipoId_RL">Tipo de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="tipoId_RL" name="tipoId_RL" placeholder="Nombre completo" >
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="numeroId_RL">Número de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="numeroId_RL" name="numeroId_RL" placeholder="País de nacimiento" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="paisEmisionId_RL">País de emisión</label>
                                                    <select class="form-control form-control-sm" id="paisEmisionId_RL" name ="paisEmisionId_RL">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fechaEmisionId_RL">Fecha de emisión</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaEmisionId_RL" name="fechaEmisionId_RL" placeholder="Fecha de emisión">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fechaVencimientoId_RL">Fecha de vencimiento</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaVencimientoId_RL" name="fechaVencimientoId_RL" placeholder="vencimiento">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="paisResidencia_RL">País de residencia</label>
                                                    <select  class="form-control form-control-sm" id="paisResidencia_RL" name="paisResidencia_RL">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                               
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="depto_paisResidencia_RL">Departamento</label>
                                                    <select id="depto_paisResidencia_RL" name="depto_paisResidencia_RL"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="celular_RL">Celular</label>
                                                    <input type="number" class="form-control form-control-sm" id="celular_RL" name="celular_RL" placeholder="Celular" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label for="correo_RL">Correo electrónico </label>
                                                    <input type="email" class="form-control form-control-sm" id="correo_RL" name="correo_RL" placeholder="Correo electrónico" autocomplete="off">
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="cargo_RL">Cargo que desempeña</label>
                                                    <input type="text" class="form-control form-control-sm" id="cargo_RL" name="cargo_RL" placeholder="Nombre completo">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="profesion_RL">Profesión/Oficio</label>
                                                    <input type="text" class="form-control form-control-sm" id="profesion_RL" name="profesion_RL" placeholder="Nombre completo" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> 1.2 Declaración jurada dueño o beneficiario</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End black line-->
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="#"> <b> <i>Accionistas</i></b></label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="table-responsive table-sm">
                                                <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre completo</th>
                                                            <th>Nacionalidad</th>
                                                            <th>N° de identificación</th>
                                                            <th>% Acciones</th>
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody> 
                                                        <?php foreach($datospic->DatosAccionistas($varIdEmp) as $r): ?>
                                                            <tr>
                                                            
                                                                <td><?php echo $r->__GET('nombreCompletoAccionistas'); ?></td>
                                                                <td><?php echo $r->__GET('nombre_nacionalidadAccionistas'); ?></td>                                                                <td><?php echo $r->__GET('numIdAccionistas'); ?></td>
                                                                <td><?php echo $r->__GET('acciones'); ?></td>
                                                                                                                                                                
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="#"> <b><i>Beneficiarios finales</i></b></label>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Start -->
                                        <div class="col-md-12">
                                            <div class="table-responsive table-sm">
                                        
                                                <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombres</th>
                                                            <th>Apellidos</th>
                                                            <th>Nacionalidad</th>
                                                            <th>N° de identificación</th>
                                                            <th>% Acciones</th>
                                                                                                    
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody> 
                                                        <?php foreach($datospic->DatosBeneFinales($varIdEmp) as $r): ?>
                                                            <tr>
                                                            
                                                                <td><?php echo $r->__GET('nombreBeneFinales'); ?></td>
                                                                <td><?php echo $r->__GET('ApellidosBeneFinales'); ?></td>
                                                                <td><?php echo $r->__GET('nombre_nacionalidadBeneFinales'); ?></td>
                                                                <td><?php echo $r->__GET('numIdBeneFinales'); ?></td>
                                                                <td><?php echo $r->__GET('AccionesBeneFinales'); ?></td>                                                                                                 
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <!--Start Black lines-->

                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="#"> <b><i>Dignatarios, directores y/o Apoderados</i></b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive table-sm">
                                                <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre completo</th>
                                                            <th>N° de identificación</th>
                                                            <th>Cargo</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php foreach($datospic->DatosApoderados($varIdEmp) as $r): ?>
                                                            <tr>
                                                                <td><?php echo $r->__GET('nombreCompletoApoderados'); ?></td>
                                                                <td><?php echo $r->__GET('numIdApoderados'); ?></td>                                                                <td><?php echo $r->__GET('numIdAccionistas'); ?></td>
                                                                <td><?php echo $r->__GET('cargo'); ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                      
                                       <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 2. Origenes de los fondos</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End black line-->

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="formaPago_OFPJ">Forma de Pago</label>
                                                    <select class="form-control form-control-sm" id="formaPago_OFPJ" name="formaPago_OFPJ">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboFormaPago() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idFormaPago') ?>"> <?php echo $r->__GET('nombreFormaPago') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="origenesFondos_OFPJ">Fuente y origen de los fondos</label>
                                                    <select class="form-control form-control-sm" id="origenesFondos_OFPJ" name="origenesFondos_OFPJ" >
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboOrigenesFondos() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idFuenteFondos') ?>"> <?php echo $r->__GET('nombreFuenteFondos') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                            </div>
                                        </div>
                                         <!--Start Black lines-->
                                       <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 3. Actividad económica</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End black line-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nombreComercial">Nombre comercial </label>
                                                    <input type="text" class="form-control form-control-sm" id="nombreComercial" name="nombreComercial" placeholder="Nombre comercial" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="idTributaria">Identificación tributaria</label>
                                                    <input type="text" class="form-control form-control-sm" id="idTributaria" name="idTributaria" placeholder="Identificación tributaria" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="aniosNegocio">Años de tener el negocio</label>
                                                    <input type="number" class="form-control form-control-sm" id="aniosNegocio" name="aniosNegocio" placeholder="Años de tener el negocio" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="DomicilioComercial">Domicilio comercial o físico de la sociedad(Dirección exacta de la ubicación de la sociedad) </label>
                                                    <input type="text" class="form-control form-control-sm" id="DomicilioComercial" name="DomicilioComercial" placeholder="Nombre comercial" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="paisDominicilio_AE">País de domicilio</label>
                                                    <select class="form-control form-control-sm"  id="paisDominicilio_AE" name="paisDominicilio_AE">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="departamento">Departamento</label>
                                                    <select id="departamento" name="departamento"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="paginaWeb">Página web </label>
                                                    <input type="text" class="form-control form-control-sm" id="paginaWeb" name="paginaWeb" placeholder="Página web" autocomplete="off">
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="telefonoOficina">Teléfono de oficina</label>
                                                    <input type="text" class="form-control form-control-sm" id="telefonoOficina" name="telefonoOficina" placeholder="Teléfono de oficina" autocomplete="off">
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="AreaGeografica">Área geográfica del negocio </label>
                                                    <select id="AreaGeografica" name="AreaGeografica" class="form-control form-control-sm">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboAreaGeografica() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idAreaGeografica') ?>"> <?php echo $r->__GET('nombreAreaGeografica') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-5">
                                                    
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="ActividadNegocio">Actividad del negocio</label>
                                                    <select id="ActividadNegocio" name="ActividadNegocio" class="form-control form-control-sm">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboActividadNegocio() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idActividadNegocio') ?>"> <?php echo $r->__GET('nombreActividadNegocio') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="descripcionEmpresa">*Descripción de la actividad o negocio a la que se dedica la empresa</label>
                                                    <input type="text" class="form-control form-control-sm" id="descripcionEmpresa"  name="descripcionEmpresa" placeholder="*Descripción de la actividad o negocio a la que se dedica la empresa" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <div class="col-12">
                                                        <label for="ventasMensual">Ventas mensuales</label>
                                                        <div class="input-group">
                                                        <div class="input-group-text form-control-sm"><b>U$</b></div>
                                                            <input type="number" class="form-control form-control-sm" id="ventasMensual" name="ventasMensual" placeholder="Ventas mensuales" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="noEmpleado">No.de empleados</label>
                                                    <input type="number" class="form-control form-control-sm" id="noEmpleado" name="noEmpleado" placeholder="No.de empleados" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="noSucursal">No. de sucursales</label>
                                                    <input type="number" class="form-control form-control-sm" id="noSucursal" name="noSucursal" placeholder="No. de sucursales" autocomplete="off">
                                                </div>                                               
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <label for="#"><b>¿Pertenece la empresa a algun grupo economico o Holding?</b></label>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="grupoEco">Elegir</label>
                                                    <select id="grupoEco" name="grupoEco" class="form-control form-control-sm">
                                                        <option selected >Elegir..</option>
                                                        <option value="Si">Si</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="indicarGrupoEco"><b>Indicar</b></label>
                                                    <input type="text" class="form-control form-control-sm" id="indicarGrupoEco" name="indicarGrupoEco" placeholder="Indicar" autocomplete="off">
                                                </div>                                      
                                            </div>
                                        </div>
                                        <!--Start Black lines-->
                                       <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> 3.1 Clientes y proveedores </b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End black line-->
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="#" ><b>Principales Clientes</b></label>
                                                </div>
                                            </div>
                                        </div>
                                         <!--Start table Principales clientes-->
                                        <div class="table-responsive">
                                    
                                            <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre </th>
                                                        <th>Domicilio Comercial</th>
                                                        <th>Telefono</th>
                                                                           
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody> 
                                                    <?php foreach($datospic->DatosPClientes($varIdEmp) as $r): ?>
                                                        <tr>
                                                        
                                                            <td><?php echo $r->__GET('nombreClientePic'); ?></td>
                                                            <td><?php echo $r->__GET('domicilio'); ?></td>
                                                            <td><?php echo $r->__GET('telefono'); ?></td>
                                                            
                                                                                                                                                            
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                        <!-- End table Principales Cliente-->
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="#" ><b>Principales proveedores</b></label>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Start table Principales clientes-->
                                        <div class="table-responsive ">
                                    
                                            <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre </th>
                                                        <th>Servicio o Producto</th>
                                                        <th>Domicilio Comercial</th>
                                                        <th>Telefono</th>
                                                                        
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody> 
                                                    <?php foreach($datospic->DatosPProveedores($varIdEmp) as $r): ?>
                                                        <tr>
                                                        
                                                            <td><?php echo $r->__GET('nombreProveedor'); ?></td>
                                                            <td><?php echo $r->__GET('servicio'); ?></td>
                                                            <td><?php echo $r->__GET('domicilio'); ?></td>
                                                            <td><?php echo $r->__GET('telefono'); ?></td>
                                                            
                                                                                                                                                            
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                        <!-- End table accionista-->
                                        
                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 4. Declaración Persona Expuesta Politicamente (PEP*):</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-1">
                                                    <label for="pep">PEP</label>
                                                    <select id="pep" name="pep" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Si">Si</option>
                                                        <option Value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="nombre_pep" >Nombre completo</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_pep" name="nombre_pep" placeholder="Nombre completo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="relacion_pep">Relación con el cliente</label>
                                                    <select id="relacion_pep" name="relacion_pep" class="form-control form-control-sm">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboRelacionCliente() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idRelacionCliente') ?>"> <?php echo $r->__GET('descripcion') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="nombreEntidad_pep">Nombre de la entidad</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombreEntidad_pep" name="nombreEntidad_pep" placeholder="Nombre de la entidad" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="pais_PEP">País </label>
                                                    <select class="form-control form-control-sm"  id="pais_PEP" name="pais_PEP">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="cargo_pep">Cargo</label>
                                                    <input type="text" class="form-control form-control-sm" id="cargo_pep" name="cargo_pep" placeholder="Cargo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="periodo_pep">Periodo</label>
                                                    <input type="text" class="form-control form-control-sm" id="periodo_pep" name="periodo_pep" placeholder="Periodo" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 5. Auto certificación FACTA:</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-1">
                                                    <label for="facta">FACTA</label>
                                                    <select id="facta" name="facta" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Si">Si</option>
                                                        <option Value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="nombre_facta">Nombre completo</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_facta" name="nombre_facta" placeholder="Nombre completo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="relacionCliente_facta">Relación con el cliente</label>
                                                    <select id="relacionCliente_facta" name="relacionCliente_facta" class="form-control form-control-sm">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboRelacionCliente() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idRelacionCliente') ?>"> <?php echo $r->__GET('descripcion') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="causa_facta">Causa</label>
                                                    <select id="causa_facta" name="causa_facta" class="form-control form-control-sm" >
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboCausaFacta() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idCausa') ?>"> <?php echo $r->__GET('descripcion') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                             
                                                </div>
                                            </div>
                                        </div>

                                        <!--Start Black line
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 6. Informacion de interes</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        End black line-->

                                        <!---
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="large mb-1" for="constitucion_MR_J" ><b>Variable</b></label>  
                                                </div>  
                                                <div class="form-group col-md-3">
                                                    <label class="large mb-1" for="indicador_Constitucion_MR_J" ><b>Indicador</b></label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="large mb-1" for="sbVariable_Constitucion_MR_J" ><b>Subvariable</b></label>
                                                </div> 
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                        <label class="form-control form-control-sm" ><b>Personalidad Jurídica</b></label>
                                                </div>  
                                                
                                                <div class="form-group col-md-3">
                                                    
                                                    <select  class="form-control form-control-sm" id= "personalidadJ_II" name="personalidadJ_II">
                                                        <option selected disabled>Elegir..</option>
                                                        </?php foreach($combos->Combo_PJuridica() as $r): ?>
                                                            <option value="</?php echo $r->__GET('idTipoPerJuridica') ?>"> <?php echo $r->__GET('tipoPersona') ?></option>
                                                        </?php endforeach; ?>
                                                    </select>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-control form-control-sm" ><b>Fecha de Constitución</b></label>
                                                </div>  
                                               
                                                <div class="form-group col-md-3">
                                                    <select  class="form-control form-control-sm" id= "fechaConstitucion_II" name="fechaConstitucion_II">
                                                        <option selected disabled>Elegir..</option>
                                                        </?php foreach($combos->Combo_Constitucion() as $r): ?>
                                                            <option value="</?php echo $r->__GET('idConstitucion') ?>"> <?php echo $r->__GET('fechaConstitucion') ?></option>
                                                        </?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-control form-control-sm" ><b>Actividad Económica</b></label>
                                                </div>  
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control form-control-sm" id="codigo" name="codigo" 
                                                        placeholder="ingrese ID"  title="Digite el número que aparece a la par de la actividad detallada en el Aviso de Operaciones." autocomplete="off" required>
                                                </div>
                                                <div class="form-group col-md-5">
                                                <input type="text" class="form-control form-control-sm" id="codigoDescripcion" name="codigoDescripcion" 
                                                        placeholder="ingrese ID"  title="Digite el codigo" autocomplete="off" required>
                                                </div> 
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-control form-control-sm" title="Resultados negativos en motores de búsqueda y coincidencias en listas restrictivas"><b>Resultados en busquedas</b></label>
                                                </div>  
                                                
                                                <div class="form-group col-md-3">
                                                    <select id="resultBusqueda_II" name="resultBusqueda_II" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                            </?php foreach($combos->Combo_ResBusqueda() as $r): ?>
                                                                <option value="</?php echo $r->__GET('idBusquedaRes') ?>"> <?php echo $r->__GET('busqueda') ?></option>
                                                            </?php endforeach; ?>
                                                    </select>
                                                </div> 
                                                 
                                            </div>
                                        </div>


                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-control form-control-sm"><b> Lugar Actividad Económica</b></label>
                                                </div>  

                                                <div class="form-group col-md-3">
                                                    
                                                    <select class="form-control form-control-sm"  id="interes_LAE" name="interes_LAE">
                                                        <option selected disabled>Elegir..</option>
                                                        </?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="</?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        </?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                   
                                                    <select id="interes_depto_LAE" name="interes_depto_LAE"  class="form-control form-control-sm" >
                                                        </?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="</?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        </?//php endforeach; ?>
                                                    </select>
                                                </div>                                                
                                            </div>
                                        </div>
                                                        -->

                                        <pre>
                                        </pre>                                        
                                        <!--Start buttons-->
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <input type="button"  class="btn btn-primary col-md-12" onclick="regresar()" value="Volver"/>
                                            </div>
                                        </div>
                                        <!--End buttons -->  
                                   

                                      <!--End form-->
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Todos los derechos Reservados &copy; Versatec-Nicaragua 2022</div>
                        <div>
                            <a href="#">Politica de Privacidad</a> &middot;
                            <a href="#">Terminos  &amp; Condiciones</a>
                        </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- PLUGIN FONTAWESOME -->
        <script src="fontawesome5.15.1/js/all.min.js"></script>
        <!-- DATATABLE -->
        <script src="DataTables/DataTables-1.10.21/js/jquery.dataTables.js"></script>

        <!-- DATATABLE buttons -->
        <script src="DataTables/Buttons-1.6.3/js/dataTables.buttons.min.js"></script>

        <!-- js Datatable buttons print -->
        <script src="DataTables/Buttons-1.6.3/js/buttons.html5.min.js"></script>
        <script src="DataTables/Buttons-1.6.3/js/buttons.print.min.js"></script>

        <!-- js Datatable buttons pdf -->
        <script src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>

        <!-- js Datatable buttons excel -->
        <script src="DataTables/JSZip-2.5.0/jszip.min.js"></script>


        <script>
            function setValoresEmp()
            {
                $("#idCli_PN").val("<?php echo $varIdEmp ?>");
                $("#fechaPic_PN").val("<?php echo $empEdit->__GET('fechaPic') ?>");
                $("#idCliente_PN").val("<?php echo $empEdit->__GET('id') ?>");
                $("#nombreCliente_PN").val("<?php echo $empEdit->__GET('nombreCliente') ?>");  
                
                //datos generales 
                $("#paisContitucion_PJ").val("<?php echo $datosGlobales->__GET('paisConstitucion') ?>");
                $("#depto_paisContitucion_PJ").val("<?php echo $datosGlobales->__GET('deptoConstitucion') ?>");
                $("#fechaConstitucion_PJ").val("<?php echo $datosGlobales->__GET('fechaConstitucion') ?>");
                $("#fechaInscripcion_PJ").val("<?php echo $datosGlobales->__GET('fechaInscripcion') ?>");
                $("#correoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('correoPersonaContacto') ?>");
                $("#nombrePersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('nombrePersonaContacto') ?>");
                $("#cargoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('cargoPersonaContacto') ?>");
                $("#telefonoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('telefono') ?>");

                //datos Representante legal
                $("#nombreCompleto_RL").val("<?php echo $datosRL->__GET('nombreRepresentanteLegal') ?>");
                $("#paisNacimiento_RL").val("<?php echo $datosRL->__GET('paisNacimiento') ?>");
                $("#depto_paisNacimiento_RL").val("<?php echo $datosRL->__GET('deptoPaisNacimiento') ?>");
                $("#nacionalidad_RL").val("<?php echo $datosRL->__GET('nacionalidad') ?>");
                $("#tipoId_RL").val("<?php echo $datosRL->__GET('tipoIdentificacion') ?>");  
                $("#numeroId_RL").val("<?php echo $datosRL->__GET('numeroIdentificacion') ?>"); 
                $("#paisEmisionId_RL").val("<?php echo $datosRL->__GET('paisEmision') ?>");
                $("#fechaEmisionId_RL").val("<?php echo $datosRL->__GET('fechaEmision') ?>");
                $("#fechaVencimientoId_RL").val("<?php echo $datosRL->__GET('fechaVencimiento') ?>");
                $("#paisResidencia_RL").val("<?php echo $datosRL->__GET('paisResidencia') ?>");  
                $("#depto_paisResidencia_RL").val("<?php echo $datosRL->__GET('deptoPaisResidencia') ?>");
                $("#celular_RL").val("<?php echo $datosRL->__GET('celular') ?>");
                $("#correo_RL").val("<?php echo $datosRL->__GET('correo') ?>");
                $("#cargo_RL").val("<?php echo $datosRL->__GET('cargo') ?>");
                $("#profesion_RL").val("<?php echo $datosRL->__GET('profesion') ?>");

                //datos de origenes de los fondos
                $("#formaPago_OFPJ").val("<?php echo $dtOrigenesFondos->__GET('idFormaPago') ?>");
                $("#origenesFondos_OFPJ").val("<?php echo $dtOrigenesFondos->__GET('idFuenteFondos') ?>");

                //datos de Actividad Economica
                $("#nombreComercial").val("<?php echo $datosAc->__GET('nombreComercial') ?>");
                $("#idTributaria").val("<?php echo $datosAc->__GET('idTributaria') ?>");
                $("#aniosNegocio").val("<?php echo $datosAc->__GET('anios') ?>");
                $("#DomicilioComercial").val("<?php echo $datosAc->__GET('domicilioComercial') ?>");
                $("#paisDominicilio_AE").val("<?php echo $datosAc->__GET('paisDomicilio') ?>");
                $("#departamento").val("<?php echo $datosAc->__GET('departamento') ?>");
                $("#paginaWeb").val("<?php echo $datosAc->__GET('paginaWeb') ?>");
                $("#telefonoOficina").val("<?php echo $datosAc->__GET('telefonoOficina') ?>");
                $("#AreaGeografica").val("<?php echo $datosAc->__GET('idAreaGeografica') ?>");
                $("#ActividadNegocio").val("<?php echo $datosAc->__GET('idActividadNegocio') ?>");
                $("#descripcionEmpresa").val("<?php echo $datosAc->__GET('descripcion') ?>");
                $("#ventasMensual").val("<?php echo $datosAc->__GET('ventasMensual') ?>");
                $("#noEmpleado").val("<?php echo $datosAc->__GET('numEmpleados') ?>");
                $("#noSucursal").val("<?php echo $datosAc->__GET('numSucursales') ?>");
                $("#grupoEco").val("<?php echo $datosAc->__GET('grupoEconomico') ?>");
                $("#indicarGrupoEco").val("<?php echo $datosAc->__GET('indicar') ?>");
                
                //datos pep
                $("#pep").val("<?php echo $datosPep->__GET('pep') ?>");
                $("#nombre_pep").val("<?php echo $datosPep->__GET('nombrePep') ?>");
                $("#relacion_pep").val("<?php echo $datosPep->__GET('idRelacionCliente') ?>");
                $("#nombreEntidad_pep").val("<?php echo $datosPep->__GET('nombreEntidad') ?>");
                $("#pais_PEP").val("<?php echo $datosPep->__GET('PaisPep') ?>");
                $("#cargo_pep").val("<?php echo $datosPep->__GET('cargo') ?>");
                $("#periodo_pep").val("<?php echo $datosPep->__GET('perido') ?>");

                //datos facta
                $("#facta").val("<?php echo $datosFacta->__GET('facta') ?>");
                $("#nombre_facta").val("<?php echo $datosFacta->__GET('nombreFacta') ?>");
                $("#relacionCliente_facta").val("<?php echo $datosFacta->__GET('idRelacionCliente') ?>"); 
                $("#causa_facta").val("<?php echo $datosFacta->__GET('idCausa') ?>");   
                
                //Datos de interes
                $("#personalidadJ_II").val("<?php echo $dtinfo->__GET('idTipoPerJuridica') ?>"); 
                $("#fechaConstitucion_II").val("<?php echo $dtinfo->__GET('idConstitucion') ?>"); 
                $("#codigo").val("<?php echo $dtinfo->__GET('idCatalogoAE') ?>"); 
                $("#codigoDescripcion").val("<?php echo $dtinfo->__GET('descripcion') ?>");

                
                $("#resultBusqueda_II").val("<?php echo $dtinfo->__GET('idBusquedaRes') ?>"); 
                $("#interes_LAE").val("<?php echo $dtinfo->__GET('idPaisAE') ?>"); 
                $("#interes_depto_LAE").val("<?php echo $dtinfo->__GET('idDepto') ?>"); 
            }

        </script>
        <script>
            $(document).ready(function ()
            {
                ////// ASIGNAMOS LOS VALORES A EDITAR EN LOS CONTROLES DEL FORMULARIO
                setValoresEmp();
            });
        </script>

        <script>
            function regresar(){
                window.open ("ListaClientes.php","_self");
            }
        </script>
        <script>
            $(document).ready(function (){
               //función para determinar La actividad economica
                
                var id_empleo = $("#codigo").val();
                var id_matriz = $("#interes_LAE").val();

                
                $.post("./JQuerys/Panama/MRJ/viewPic_catalogo_ActEcono.php", { id_empleo: id_empleo, id_matriz: id_matriz }, function(data) {
                    $("#codigoDescripcion").html(data);
                    //$('#codigoDescripcion').val($("#").val());       
                    });	
            });            
        </script>
       <script>
            $(document).ready(function (){
               //función para determinar La actividad economica
                
                var id_pic = $("#idCli_PN").val();
                
                //alert($('input[id=idCli_PN]').val());

                $.post("./JQuerys/Panama/MRJ/viewPic_depto.php", {id_pic: id_pic}, function(data) {
                    $("#interes_depto_LAE").html(data);
                    
                    //alert($('select[id=interes_depto_LAE]').val());
                    //$('#codigoDescripcion').val($("#").val());       
                    });	
            });            
        </script>
        
    </body>
</html>