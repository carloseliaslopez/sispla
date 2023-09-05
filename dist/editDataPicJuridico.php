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

include '../Entidades/Juridio/DatosClienteJuridicoPic.php';
include '../Entidades/Juridio/DatosRepresentanteLegal.php';
include '../Entidades/Juridio/Accionistas.php';
include '../Entidades/Juridio/BeneficiariosFinales.php';
include '../Entidades/Juridio/ActividadEconomica.php';
include '../Entidades/Juridio/PrincipalesClientes.php';
include '../Entidades/Juridio/PrincipalesProveedores.php';

include '../Entidades/Anexos/CategoriaSalario.php';
include '../Entidades/Anexos/Constitucion.php';
include '../Entidades/Anexos/TipoPerJuridica.php';
include '../Entidades/Anexos/BusquedaRes.php';
include '../Entidades/Anexos/InteresInfo.php';
include '../Entidades/Anexos/vw_InteresInfo.php';
include '../Entidades/Anexos/vw_Accionistas.php';

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
                                    <form method="POST" action="../negocio/NgEditDataPicJuridico.php">
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
                                                    <input type="hidden" name="idCli_PN" id="idCli_PN" />
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                    <label for="fechaConstitucion_PJ">Fecha de constitución</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaConstitucion_PJ" name=" fechaConstitucion_PJ" placeholder="Fecha de constitución" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fechaInscripcion_PJ">Fecha de inscripción</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaInscripcion_PJ" name="fechaInscripcion_PJ" placeholder="Fecha de inscripción">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="correoPersonaContacto_PJ">Correo electrónico de la persona de  Contacto</label>
                                                    <input type="text" class="form-control form-control-sm" id="correoPersonaContacto_PJ" name="correoPersonaContacto_PJ" placeholder="Correo electrónico de la persona de Contacto" autocomplete="off">
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
                                                <div class="form-group col-md-6">
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
                                                    <label for="celular_RL">Celular</label>
                                                    <input type="number" class="form-control form-control-sm" id="celular_RL" name="celular_RL" placeholder="Celular" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="correo_RL">Correo electrónico </label>
                                                    <input type="text" class="form-control form-control-sm" id="correo_RL" name="correo_RL" placeholder="Correo electrónico" autocomplete="off">
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
                                                <div class="form-group col-md-2">
                                                    <label for="#"> <b> <i>Accionistas</i></b></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                   
                                                </div>
                                                <div class="form-group col-md-2">
                                                  <button type="button" class="btn btn-primary col-md-10" id="add_field_button"> <i class="fas fa-user-plus"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- START -ENCABEZADO- IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-5">
                                                        <label for="nombre_AC[]">Nombre completo o razón social</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="nacionalidad_AC[]">Nacionalidad</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="id_AC[]">N° de identificación</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="acciones_AC[]">% Acciones</label>
                                                    </div>
                                                    <div class="form-group col-sm-1">
                                                    <label for="">Eliminar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--END-ENCABEZADO- IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->


                                       <!-- START - IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->
                                      
                                       <div class="input_fields_wrap" id ="input_fields_wrap">
                                            <?php foreach($datospic->DatosAccionistas($varIdEmp) as $r): ?>
                                                    <div class="col-md-12" >
                                                        <div class="form-row">
                                                            <div class="form-group col-md-5">
                                                                <input type="text" class="form-control form-control-sm" id="nombre_AC[]" name="nombre_AC[]" placeholder="Nombre completo o razón social" autocomplete="off" value ="<?php echo $r->__GET('nombreCompletoAccionistas'); ?>" required>
                                                                <input type="hidden" id="idAccionistas" name="idAccionistas" value ="<?php echo $r->__GET('idAccionistas'); ?>"/>
                                                            </div>

                                                            <div class="form-group col-md-2">
                                                                                                                               
                                                                <select  class="form-control form-control-sm" id="nacionalidad_AC[]" name="nacionalidad_AC[]" >
                                                                    <?php foreach($combos->ComboPais() as $m): ?>
                                                                        <option value="<?php echo $m->__GET('idPais') ?>"> <?php echo $m->__GET('nombrePais') ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                    
                                                            </div>

                                                            <div class="form-group col-md-2">
                                                                <input type="text" class="form-control form-control-sm" id="id_AC[]" name="id_AC[]" placeholder="N° de identificación" autocomplete="off" value="<?php echo $r->__GET('numIdAccionistas'); ?>"> 
                                                            </div>
                                                            
                                                            <div class="form-group col-md-2">
                                                                <input type="number" class="form-control form-control-sm" id="acciones_AC[]" name="acciones_AC[]" placeholder="% Acciones" autocomplete="off" value = "<?php echo $r->__GET('acciones'); ?>">
                                                            </div>
                                                            <div class="form-group col-sm-1">
                                                            <button type="button" class="btn btn-danger btn-sm" id="remove_field"> <i class="fas fa-trash-alt"></i></button>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>

                                        </div>
                                        <!--END- IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->    

                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="#"> <b> <i>Beneficiarios Finales</i></b></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                   
                                                </div>
                                                <div class="form-group col-md-2">
                                                  <button type="button" class="btn btn-primary col-md-10" id="add_field_button_BF"> <i class="fas fa-user-plus"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                         <!-- START -ENCABEZADO- IMPLEMENTACION DE DEL SCRIPT DE BENEFICIARIO FINAL -->
                                         <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="nombre_BF[]">Nombres</label>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="apellido_BF[]">Apellidos</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="nacionalidad_BF[]">Nacionalidad</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="id_BF[]">N° de identificación</label>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label for="acciones_BF[]">Acciones</label>
                                                    </div>
                                                    <div class="form-group col-sm-1">
                                                    <label for="">Eliminar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--END-ENCABEZADO- IMPLEMENTACION DE DEL SCRIPT DE BENEFICIARIO FIN  -->
                                        
                                        <!-- START - IMPLEMENTACION DE DEL SCRIPT DE BENEFICIARIO FINAL -->
                                        <div class="input_fields_wrap_BF" id ="input_fields_wrap_BF">
                                                <?php foreach($datospic->DatosBeneFinales($varIdEmp) as $r): ?>
                                                    <div class="col-md-12" >
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                           
                                                            <input type="text" class="form-control form-control-sm" id="nombre_BF[]" name="nombre_BF[]" placeholder="Nombres" autocomplete="off" value="<?php echo $r->__GET('ApellidosBeneFinales'); ?>"> 
                                                            <input type="hidden" id="idBeneficiariosFinales" name="idBeneficiariosFinales" value ="<?php echo $r->__GET('idBeneficiariosFinales'); ?>"/>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            
                                                            <input type="text" class="form-control form-control-sm" id="apellido_BF[]" name="apellido_BF[]" placeholder="Apellidos" autocomplete="off" value="<?php echo $r->__GET('ApellidosBeneFinales'); ?>">
                                                        </div>

                                                        <div class="form-group col-md-2">
                                                            
                                                            <select  class="form-control form-control-sm" id="nacionalidad_BF[]" name="nacionalidad_BF[]" value="<?php echo $r->__GET('idPais') ?>">
                                                                <?php foreach($combos->ComboPais() as $m): ?>
                                                                    <option value="<?php echo $m->__GET('idPais') ?>"> <?php echo $m->__GET('nombrePais') ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-2">
                                                            
                                                            <input type="text" class="form-control form-control-sm" id="id_BF[]" name="id_BF[]" placeholder="N° de identificación" autocomplete="off" value="<?php echo $r->__GET('numIdBeneFinales'); ?>"> 
                                                        </div>
                                                        
                                                        <div class="form-group col-md-1">
                                                           
                                                            <input type="number" class="form-control form-control-sm" id="acciones_BF[]" name="acciones_BF[]" placeholder="% Acciones" autocomplete="off" value="<?php echo $r->__GET('AccionesBeneFinales'); ?>">
                                                        </div>
                                                        <div class="form-group col-sm-1">
                                                        <button type="button" class="btn btn-danger btn-sm" > <i class="fas fa-trash-alt"></i></button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                        </div>
                                        <!--END- IMPLEMENTACION DE DEL SCRIPT DE BENEFICIARIO FINAL -->
                                        
                                        <!--Start Black lines-->
                                        
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

                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="#"> <b> <i>Principales Clientes</i></b></label>
                                                </div>
                                                <div class="form-group col-md-6">                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                </div>
                                                <div class="form-group col-md-2">
                                                  <button type="button" class="btn btn-primary col-md-10" id="add_field_button_PC"> <i class="fas fa-user-plus"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- START -ENCABEZADO- IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->
                                        <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="nombre_Cli[]">Nombre</label>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="domicilio_Cli[]">Domicilio Comercial</label>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="telefono_Cli[]">Teléfono</label>
                                                    </div>
                                                    
                                                    <div class="form-group col-sm-3">
                                                    <label for="">Eliminar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--END-ENCABEZADO- IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->

                                        <!-- START - IMPLEMENTACION DE  SCRIPT DE PRINCIPALES CLIENTES -->
                                        <div class="input_fields_wrap_PC" id ="input_fields_wrap_PC">

                                            <?php foreach($datospic->DatosPClientes($varIdEmp) as $r): ?>
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <input type="hidden" id="idPrincipalesClientes" name="idPrincipalesClientes" value ="<?php echo $r->__GET('idPrincipalesClientes'); ?>"/>

                                                    <input type="text" class="form-control form-control-sm" id="nombre_Cli[]" name="nombre_Cli[]" placeholder="Nombre" autocomplete="off" value="<?php echo $r->__GET('nombreClientePic'); ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    
                                                    <select  class="form-control form-control-sm" id="domicilio_Cli[]" name="domicilio_Cli[]">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $m): ?>
                                                            <option value="<?php echo $m->__GET('idPais') ?>"> <?php echo $m->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>

                                                <div class="form-group col-md-3">
                                                    
                                                    <input type="number" class="form-control form-control-sm" id="telefono_Cli[]" name="telefono_Cli[]" placeholder="Teléfono" autocomplete="off" value="<?php echo $r->__GET('telefono'); ?>">
                                                </div>
                                                    
                                                <div class="form-group col-sm-1">
                                                    
                                                    <button type="button" class="btn btn-danger btn-sm" id="remove_field_PC"> <i class="fas fa-trash-alt" ></i></button>
                                                </div>
                                                    
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!--END- IMPLEMENTACION DE  SCRIPT DE PRINCIPALES CLIENTES -->

                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="#"> <b> <i>Principales Proveedores</i></b></label>
                                                </div>
                                                <div class="form-group col-md-5">                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                </div>
                                                <div class="form-group col-md-2">
                                                  <button type="button" class="btn btn-primary col-md-10" id="add_field_button_PP" > <i class="fas fa-user-plus"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- START -ENCABEZADO- IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->
                                        <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="nombre_Prov[]">Nombre</label>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="servicio_Prov[]">Servicio o Producto</label>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="domicilio_Prov[]">Domicilio Comercial</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="telefono_Prov[]">Teléfono</label>
                                                    </div>
                                                    
                                                    <div class="form-group col-sm-1">
                                                    <label for="">Eliminar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--END-ENCABEZADO- IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->

                                        <!-- START - IMPLEMENTACION DE  SCRIPT DE PRINCIPALES PROVEEDORES -->
                                        <div class="input_fields_wrap_PP" id ="input_fields_wrap_PP">
                                        <?php foreach($datospic->DatosPProveedores($varIdEmp) as $r): ?>
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                    <input type="hidden" id="idPrincipalesProveedores" name="idPrincipalesProveedores" value ="<?php echo $r->__GET('idPrincipalesProveedores'); ?>"/>
                                                        <input type="text" class="form-control form-control-sm" id="nombre_Prov[]" name="nombre_Prov[]" placeholder="Nombre" autocomplete="off" value="<?php echo $r->__GET('nombreProveedor'); ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        
                                                        <input type="text" class="form-control form-control-sm" id="servicio_Prov[]" name="servicio_Prov[]" placeholder="Servicio o Producto" autocomplete="off" value="<?php echo $r->__GET('servicio'); ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        
                                                        <select  class="form-control form-control-sm" id="domicilio_Prov[]" name="domicilio_Prov[]">
                                                            <option selected disabled>Elegir..</option>
                                                            <?php foreach($combos->ComboPais() as $m): ?>
                                                                <option value="<?php echo $m->__GET('idPais') ?>"> <?php echo $m->__GET('nombrePais') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        
                                                        <input type="number" class="form-control form-control-sm" id="telefono_Prov[]" name="telefono_Prov[]" placeholder="Teléfono" autocomplete="off" value="<?php echo $r->__GET('telefono'); ?>">
                                                    </div>
                                                        
                                                    <div class="form-group col-sm-1">
                                                        <button type="button" class="btn btn-danger btn-sm" id="remove_field_PP"> <i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!--END- IMPLEMENTACION DE  SCRIPT DE PRINCIPALES PROVEEDORES -->

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
                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 6. Informacion de interes</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End black line-->
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
                                                        <?php foreach($combos->Combo_PJuridica() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idTipoPerJuridica') ?>"> <?php echo $r->__GET('tipoPersona') ?></option>
                                                        <?php endforeach; ?>
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
                                                        <?php foreach($combos->Combo_Constitucion() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idConstitucion') ?>"> <?php echo $r->__GET('fechaConstitucion') ?></option>
                                                        <?php endforeach; ?>
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
                                                    <select id="codigoDescripcion" name="codigoDescripcion" class="form-control form-control-sm" required disabled>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
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
                                                            <?php foreach($combos->Combo_ResBusqueda() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idBusquedaRes') ?>"> <?php echo $r->__GET('busqueda') ?></option>
                                                            <?php endforeach; ?>
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
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                   
                                                    <select id="interes_depto_LAE" name="interes_depto_LAE"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
 
                                                    </select>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <pre>
                                        </pre>                                        
                                            <!--Start buttons-->
                                            <div class="col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <button type="submit" class="btn btn-primary col-md-8">Guardar</button>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-success col-md-7" onclick="regresar()">Regresar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End buttons -->  
                                    </form>
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
                $("#fechaConstitucion_PJ").val("<?php echo $datosGlobales->__GET('fechaConstitucion') ?>");
                $("#fechaInscripcion_PJ").val("<?php echo $datosGlobales->__GET('fechaInscripcion') ?>");
                $("#correoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('correoPersonaContacto') ?>");
                $("#nombrePersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('nombrePersonaContacto') ?>");
                $("#cargoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('cargoPersonaContacto') ?>");
                $("#telefonoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('telefono') ?>");

                //datos Representante legal
                $("#nombreCompleto_RL").val("<?php echo $datosRL->__GET('nombreRepresentanteLegal') ?>");
                $("#paisNacimiento_RL").val("<?php echo $datosRL->__GET('paisNacimiento') ?>");
                $("#nacionalidad_RL").val("<?php echo $datosRL->__GET('nacionalidad') ?>");
                $("#tipoId_RL").val("<?php echo $datosRL->__GET('tipoIdentificacion') ?>");  
                $("#numeroId_RL").val("<?php echo $datosRL->__GET('numeroIdentificacion') ?>"); 
                $("#paisEmisionId_RL").val("<?php echo $datosRL->__GET('paisEmision') ?>");
                $("#fechaEmisionId_RL").val("<?php echo $datosRL->__GET('fechaEmision') ?>");
                $("#fechaVencimientoId_RL").val("<?php echo $datosRL->__GET('fechaVencimiento') ?>");
                $("#paisResidencia_RL").val("<?php echo $datosRL->__GET('paisResidencia') ?>");  
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
                window.open ("ListaClientes.php","_self")
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

<script>
            $(document).ready(function() {
                var max_fields      = 50; //Cantidad maxima de inputs 
                var wrapper   		= $(".input_fields_wrap"); //atributos 
                var add_button      = $("#add_field_button"); //Boton agregar

                var x = 1; //Contador agregar
                $(add_button).click(function(e){ //al realizar clia al boton add
                e.preventDefault();
                    if(x < max_fields){ //condicional de limites 
                        x++; //incrementa la cantidad de textbox
                        $(wrapper).append('<div class="col-md-12" > <div class="form-row"> <div class="form-group col-md-5"> <input type="text" class="form-control form-control-sm" id="nombre_AC[]" name="nombre_AC[]" placeholder="Nombre completo o razón social" autocomplete="off" required> </div> <div class="form-group col-md-2"> <select  class="form-control form-control-sm" id="nacionalidad_AC[]" name="nacionalidad_AC[]"> <option selected disabled>Elegir..</option> <?php foreach($combos->ComboPais() as $r): ?> <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option> <?php endforeach; ?> </select> </div> <div class="form-group col-md-2"> <input type="text" class="form-control form-control-sm" id="id_AC[]" name="id_AC[]" placeholder="N° de identificación" autocomplete="off">  </div> <div class="form-group col-md-2"> <input type="number" class="form-control form-control-sm" id="acciones_AC[]" name="acciones_AC[]" placeholder="% Acciones" autocomplete="off"> </div> <div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field"> <i class="fas fa-trash-alt"></i></button> </div> </div> </div>'); //add input box
                    }
                });
                
                $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
                    })
            });       
        </script>
       <script>
            $(document).ready(function() {
                var max_fields      = 50; //Cantidad maxima de inputs 
                var wrapper   		= $(".input_fields_wrap_BF"); //atributos 
                var add_button      = $("#add_field_button_BF"); //Boton agregar

                var x = 1; //Contador agregar
                $(add_button).click(function(e){ //al realizar clia al boton add
                e.preventDefault();
                    if(x < max_fields){ //condicional de limites 
                        x++; //incrementa la cantidad de textbox
                        $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-3"><input type="text" class="form-control form-control-sm" id="nombre_BF[]" name="nombre_BF[]" placeholder="Nombres" autocomplete="off"></div><div class="form-group col-md-3"> <input type="text" class="form-control form-control-sm" id="apellido_BF[]" name="apellido_BF[]" placeholder="Apellidos" autocomplete="off"></div><div class="form-group col-md-2"> <select  class="form-control form-control-sm" id="nacionalidad_BF[]" name="nacionalidad_BF[]"> <option selected disabled value = "164">Elegir..</option> <?php foreach($combos->ComboPais() as $r): ?> <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option> <?php endforeach; ?> </select> </div><div class="form-group col-md-2"><input type="text" class="form-control form-control-sm" id="id_BF[]" name="id_BF[]" placeholder="N° de identificación" autocomplete="off" > </div> <div class="form-group col-md-1"><input type="number" class="form-control form-control-sm" id="acciones_BF[]" name="acciones_BF[]" placeholder="% Acciones" autocomplete="off"> </div> <div class="form-group col-sm-1"> <button type="button" class="btn btn-danger btn-sm" id="remove_field_BF"> <i class="fas fa-trash-alt"></i></button></div></div></div>'); //add input box
                    }
                });
                
                $(wrapper).on("click","#remove_field_BF", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
                    })
 
            });       
        </script>

        <script>
            $(document).ready(function() {
                var max_fields      = 50; //Cantidad maxima de inputs 
                var wrapper   		= $(".input_fields_wrap_PC"); //atributos 
                var add_button      = $("#add_field_button_PC"); //Boton agregar

                var x = 1; //Contador agregar
                $(add_button).click(function(e){ //al realizar clia al boton add
                e.preventDefault();
                    if(x < max_fields){ //condicional de limites 
                        x++; //incrementa la cantidad de textbox
                        $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-3"><input type="text" class="form-control form-control-sm" id="nombre_Cli[]" name="nombre_Cli[]" placeholder="Nombre" autocomplete="off"></div><div class="form-group col-md-3"><select  class="form-control form-control-sm" id="domicilio_Cli[]" name="domicilio_Cli[]"><option selected disabled>Elegir..</option><?php foreach($combos->ComboPais() as $r): ?><option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-3"><input type="number" class="form-control form-control-sm" id="telefono_Cli[]" name="telefono_Cli[]" placeholder="Teléfono" autocomplete="off"></div> <div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field_PC"> <i class="fas fa-trash-alt" ></i></button></div></div></div>'); //add input box
                    }
                });
                
                $(wrapper).on("click","#remove_field_PC", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
                    })
 
            });       
        </script>
        <script>
            $(document).ready(function() {
                var max_fields      = 50; //Cantidad maxima de inputs 
                var wrapper   		= $(".input_fields_wrap_PP"); //atributos 
                var add_button      = $("#add_field_button_PP"); //Boton agregar

                var x = 1; //Contador agregar
                $(add_button).click(function(e){ //al realizar clia al boton add
                e.preventDefault();
                    if(x < max_fields){ //condicional de limites 
                        x++; //incrementa la cantidad de textbox
                        $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-3"><input type="text" class="form-control form-control-sm" id="nombre_Prov[]" name="nombre_Prov[]" placeholder="Nombre" autocomplete="off"></div><div class="form-group col-md-3"><input type="text" class="form-control form-control-sm" id="servicio_Prov[]" name="servicio_Prov[]" placeholder="Servicio o Producto" autocomplete="off"></div><div class="form-group col-md-3"><select  class="form-control form-control-sm" id="domicilio_Prov[]" name="domicilio_Prov[]"><option selected disabled value="164">Elegir...</option><?php foreach($combos->ComboPais() as $r): ?><option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-2"><input type="number" class="form-control form-control-sm" id="telefono_Prov[]" name="telefono_Prov[]" placeholder="Teléfono" autocomplete="off"></div><div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field_PP"> <i class="fas fa-trash-alt"></i></button></div></div></div>'); //add input box
                    }
                });
                
                $(wrapper).on("click","#remove_field_PP", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
                    })
 
            });       
        </script>
        <script>
            $(document).ready(function (){
               //función para determinar La actividad economica
                $("#codigo").on('change', function () {    
                    var id_empleo = $(this).val();
                    var id_matriz = $("#paisContitucion_PJ").val();
                
                    //alert($('select[id=paisContitucion_PJ]').val());

                    
                        $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_ActiEconomica_PJ.php", { id_empleo: id_empleo, id_matriz: id_matriz }, function(data) {
                            $("#codigoDescripcion").html(data);
                            //$('#codigoDescripcion').val($("#").val());
                            
                        });	   
                }); 
            });            
        </script>
        
    </body>
</html>
