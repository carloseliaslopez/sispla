<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/ComboPais.php';
include '../Entidades/ComboFormaPago.php';
include '../Entidades/ComboOrigenesFondos.php';
include '../Entidades/ComboAreaGeografica.php';
include '../Entidades/ComboActividadNegocio.php';
include '../Entidades/ComboEstadoCivil.php';
include '../Entidades/Pic.php';

include '../Entidades/Compartidas/RelacionCliente.php';
include '../Entidades/Compartidas/Causa.php';
include '../Entidades/Compartidas/Departamento.php';

include '../Entidades/Anexos/CategoriaSalario.php';
include '../Entidades/Anexos/Constitucion.php';
include '../Entidades/Anexos/TipoPerJuridica.php';
include '../Entidades/Anexos/BusquedaRes.php';
include '../Entidades/Anexos/InteresInfo.php';
//DATOS
include '../Datos/DtCombos.php';
include '../Datos/DtPic.php';
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

//INSTANCIAS
$combos = new DtCombos();

$datospic = new DtPic();

//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
$varIdEmp = $_GET['dataPIC'];

$empEdit;
$empEdit = $datospic->ObtenerPic($varIdEmp);


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

        <!-- JQUERY PLUGIN -->
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
       
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
                                        <p id="filtracion_Cli" name="filtracion_Cli" ></p>
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
                                    <form method="POST" action="../negocio/NgNewDataPicJuridico.php">
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
                                                    <label for="depto_paisContitucion_PJ">Departamento/Estado</label>
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
                                                    <input type="date" class="form-control form-control-sm" id="fechaConstitucion_PJ" name=" fechaConstitucion_PJ" placeholder="Fecha de constitución" autocomplete="off" max="9999-12-31" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fechaInscripcion_PJ">Fecha de inscripción</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaInscripcion_PJ" name="fechaInscripcion_PJ" placeholder="Fecha de inscripción" max="9999-12-31" >
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
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="nombrePersonaContacto_PJ" name="nombrePersonaContacto_PJ" placeholder="Nombre de la persona de  Contacto" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cargoPersonaContacto_PJ">Cargo en la empresa</label>
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="cargoPersonaContacto_PJ" name="cargoPersonaContacto_PJ" placeholder="Cargo en la empresa" autocomplete="off">
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
                                                <div class="form-group col-md-4">
                                                    <label for="nombreCompleto_RL">Nombre completo</label>
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="nombreCompleto_RL" name="nombreCompleto_RL" placeholder="Nombre completo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="paisNacimiento_RL">País de nacimiento</label>
                                                    <select  class="form-control form-control-sm" id= "paisNacimiento_RL" name="paisNacimiento_RL">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="depto_paisNacimiento_RL">Departamento</label>
                                                    <select id="depto_paisNacimiento_RL" name="depto_paisNacimiento_RL"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="nacionalidad_RL">Nacionalidad</label>
                                                    <select class="form-control form-control-sm" id="nacionalidad_RL" name ="nacionalidad_RL">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="depto_nacionalidad_RL">Departamento</label>
                                                    <select id="depto_nacionalidad_RL" name="depto_nacionalidad_RL"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="tipoId_RL">Tipo de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="tipoId_RL" name="tipoId_RL" placeholder="Tipo de identificación" >
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="numeroId_RL">Número de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="numeroId_RL" name="numeroId_RL" placeholder="Número de identificación" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="paisEmisionId_RL">País de emisión</label>
                                                    <select class="form-control form-control-sm" id="paisEmisionId_RL" name ="paisEmisionId_RL">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fechaEmisionId_RL">Fecha de emisión</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaEmisionId_RL" name="fechaEmisionId_RL" placeholder="Fecha de emisión">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fechaVencimientoId_RL">Fecha de vencimiento</label>
                                                    <input type="date" class="form-control form-control-sm" id="fechaVencimientoId_RL" name="fechaVencimientoId_RL" placeholder="Fecha de vencimiento">
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
                                                    <input type="text" class="form-control form-control-sm" id="correo_RL" name="correo_RL" placeholder="Correo electrónico" autocomplete="off">
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="cargo_RL">Cargo que desempeña</label>
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="cargo_RL" name="cargo_RL" placeholder="Cargo que desempeña">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="profesion_RL">Profesión/Oficio</label>
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="profesion_RL" name="profesion_RL" placeholder="Profesión/Oficio" autocomplete="off">
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

                                        <!-- START - IMPLEMENTACION DE DEL SCRIPT DE ACCIONISTAS -->
                                        <div class="input_fields_wrap" id ="input_fields_wrap">
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="nombre_AC[]">Nombre completo o razón social</label>
                                                        <input type="text" class="UpperCase form-control form-control-sm" id="nombre_AC[]" name="nombre_AC[]" placeholder="Nombre completo o razón social" autocomplete="off" required>
                                                        <p id="filtracion_AC" name="filtracion_AC" ></p>
                                                      
                                                        
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="nacionalidad_AC">Nacionalidad</label>
                                                        <select  class="form-control form-control-sm" id="nacionalidad_AC" name="nacionalidad_AC[]">
                                                            <option selected disabled value = "164">Elegir..</option>
                                                            <?php foreach($combos->ComboPais() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="depto_nacionalidad_AC">Departamento</label>
                                                        <select id="depto_nacionalidad_AC" name="depto_nacionalidad_AC[]"  class="form-control form-control-sm" >
                                                            <option selected  disabled >Elegir..</option>
                                                            <?php foreach($combos->ComboDepto() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                                
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="id_AC[]">N° de identificación</label>
                                                        <input type="text" class="UpperCase form-control form-control-sm" id="id_AC[]" name="id_AC[]" placeholder="N° de identificación" autocomplete="off" > 
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <label for="acciones_AC[]">% Acciones</label>
                                                        <input type="number" class="form-control form-control-sm" id="acciones_AC[]" name="acciones_AC[]" placeholder="% Acciones" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-sm-1">
                                                        <label for="">Eliminar</label>
                                                        <button type="button" class="btn btn-danger btn-sm" disabled> <i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                                <div class="form-group col-md-2">
                                                  <button type="button" class="btn btn-primary btn-sm" onclick="getvalues()"> busqueda</button>
                                                </div>
                                            
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


                                        <!-- START - IMPLEMENTACION DE DEL SCRIPT DE BENEFICIARIO FINAL -->
                                        <div class="input_fields_wrap_BF" id ="input_fields_wrap_BF">
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label for="nombre_BF[]">Nombres</label>
                                                        <input type="text" class="UpperCase form-control form-control-sm" id="nombre_BF[]" name="nombre_BF[]" placeholder="Nombres" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="apellido_BF[]">Apellidos</label>
                                                        <input type="text" class="UpperCase form-control form-control-sm" id="apellido_BF[]" name="apellido_BF[]" placeholder="Apellidos" autocomplete="off">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="nacionalidad_BF">Nacionalidad</label>
                                                        <select  class="form-control form-control-sm" id="nacionalidad_BF" name="nacionalidad_BF[]">
                                                            <option selected disabled value = "164">Elegir..</option>
                                                            <?php foreach($combos->ComboPais() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="depto_nacionalidad_BF">Departamento</label>
                                                        <select id="depto_nacionalidad_BF" name="depto_nacionalidad_BF[]"  class="form-control form-control-sm" >
                                                            <option selected  disabled >Elegir..</option>
                                                            <?php foreach($combos->ComboDepto() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                                
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="id_BF[]">N° de identificación</label>
                                                        <input type="text" class="UpperCase form-control form-control-sm" id="id_BF[]" name="id_BF[]" placeholder="N° de identificación" autocomplete="off" > 
                                                    </div>

                                                    <div class="form-group col-md-1">
                                                        <label for="acciones_BF[]">Acciones</label>
                                                        <input type="number" class="form-control form-control-sm" id="acciones_BF[]" name="acciones_BF[]" placeholder="% Acciones" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-sm-1">
                                                    <label for="">Eliminar</label>
                                                    <button type="button" class="btn btn-danger btn-sm" disabled> <i class="fas fa-trash-alt"></i></button>
                                                    </div>

                                                </div>
                                            </div>
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
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="nombreComercial" name="nombreComercial" placeholder="Nombre comercial" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="idTributaria">Identificación tributaria</label>
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="idTributaria" name="idTributaria" placeholder="Identificación tributaria" autocomplete="off">
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
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="DomicilioComercial" name="DomicilioComercial" placeholder="Domicilio comercial o físico de la sociedad" autocomplete="off">
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
 
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="paginaWeb">Página web </label>
                                                    <input type="text" class="form-control form-control-sm" id="paginaWeb" name="paginaWeb" placeholder="Página web" autocomplete="off">
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="telefonoOficina">Teléfono de oficina</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefonoOficina" name="telefonoOficina" placeholder="Teléfono de oficina" autocomplete="off">
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
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="descripcionEmpresa"  name="descripcionEmpresa" placeholder="*Descripción de la actividad o negocio a la que se dedica la empresa" autocomplete="off">
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
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Si">Si</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="indicarGrupoEco"><b>Indicar</b></label>
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="indicarGrupoEco" name="indicarGrupoEco" placeholder="Indicar" autocomplete="off">
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

                                        <!-- START - IMPLEMENTACION DE  SCRIPT DE PRINCIPALES CLIENTES -->
                                        <div class="input_fields_wrap_PC" id ="input_fields_wrap_PC">
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="nombre_Cli[]">Nombre</label>
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="nombre_Cli[]" name="nombre_Cli[]" placeholder="Nombre" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="domicilio_Cli[]">Domicilio Comercial</label>
                                                    <select  class="form-control form-control-sm" id="domicilio_Cli[]" name="domicilio_Cli[]">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                                
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="telefono_Cli[]">Teléfono</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefono_Cli[]" name="telefono_Cli[]" placeholder="Teléfono" autocomplete="off">
                                                </div>
                                                    
                                                <div class="form-group col-sm-1">
                                                    <label for="">Eliminar</label>
                                                    <button type="button" class="btn btn-danger btn-sm" disabled> <i class="fas fa-trash-alt"></i></button>
                                                </div>
                                                    
                                                </div>
                                            </div>
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

                                        <!-- START - IMPLEMENTACION DE  SCRIPT DE PRINCIPALES PROVEEDORES -->
                                        <div class="input_fields_wrap_PP" id ="input_fields_wrap_PP">
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="nombre_Prov[]">Nombre</label>
                                                        <input type="text" class="UpperCase form-control form-control-sm" id="nombre_Prov[]" name="nombre_Prov[]" placeholder="Nombre" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="servicio_Prov[]">Servicio o Producto</label>
                                                        <input type="text" class="UpperCase form-control form-control-sm" id="servicio_Prov[]" name="servicio_Prov[]" placeholder="Servicio o Producto" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="domicilio_Prov[]">Domicilio Comercial</label>
                                                        <select  class="form-control form-control-sm" id="domicilio_Prov[]" name="domicilio_Prov[]">
                                                            <option selected disabled>Elegir..</option>
                                                            <?php foreach($combos->ComboPais() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="telefono_Prov[]">Teléfono</label>
                                                        <input type="number" class="form-control form-control-sm" id="telefono_Prov[]" name="telefono_Prov[]" placeholder="Teléfono" autocomplete="off">
                                                    </div>
                                                        
                                                    <div class="form-group col-sm-1">
                                                        <label for="">Eliminar</label>
                                                        <button type="button" class="btn btn-danger btn-sm" disabled> <i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="nombre_pep" name="nombre_pep" placeholder="Nombre completo" autocomplete="off">
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
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="nombreEntidad_pep" name="nombreEntidad_pep" placeholder="Nombre de la entidad" autocomplete="off">
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
                                                    <input type="text" class="UpperCase form-control form-control-sm" id="nombre_facta" name="nombre_facta" placeholder="Nombre completo" autocomplete="off">
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
                                                        <button type="reset" class="btn btn-danger col-md-8">Borrar</button>
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

        <!-- PLUGIN CODIGO jQUERY-->
        <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->

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

         <!--SCRIPT PARA LAS FUNCIONES DE CAMBIO-->
        <script type="text/javascript" src="./Jscript/Panama/Juridico/selects.js"></script>
        <script type="text/javascript" src="./Jscript/Panama/Juridico/Reset.js"></script>
        <script type="text/javascript" src="./Jscript/Panama/Juridico/Multiplicar.js"></script>

        <!--SCRIPT PARA LOS ANEXOS DE TABLAS Y OTROS INTERESES-->
        <script type="text/javascript" src="./AnexosMatriz/Juridico/jsLActividadEconomica.js"></script>
                             
        
        <script>
            function setValoresEmp()
            {
                $("#idCli_PN").val("<?php echo $varIdEmp ?>");
                $("#fechaPic_PN").val("<?php echo $empEdit->__GET('fechaPic') ?>");
                $("#idCliente_PN").val("<?php echo $empEdit->__GET('id') ?>");
                $("#nombreCliente_PN").val("<?php echo $empEdit->__GET('nombreCliente') ?>");                                
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
                window.open ("menuBusqueda.html","_self")
            }
        </script>

        <script>
            $(document).ready(function() {
                var max_fields      = 50; //Cantidad maxima de inputs 
                var wrapper   		= $(".input_fields_wrap"); //atributos 
                var add_button      = $("#add_field_button"); //Boton agregar

                var x = 1; //Contador agregar
                var iname = 2;
                var inac = 2;
                var ifilt= 2;
                $(add_button).click(function(e){ //al realizar clia al boton add
                e.preventDefault();
                    if(x < max_fields){ //condicional de limites 
                        x++; //incrementa la cantidad de textbox
                        
                        $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-3"><input type="text" class="UpperCase form-control form-control-sm" id="nombre_AC[]" name="nombre_AC[]" placeholder="Nombre completo o razón social" autocomplete="off" required><p id="filtracion_AC" name="filtracion_AC" ></p></div><div class="form-group col-md-2"><select  class="form-control form-control-sm" id="nacionalidad_AC_'+ x +'" name="nacionalidad_AC[]" onchange="getval(this, $i='+ x +')" ><option selected disabled value = "164">Elegir..</option><?php foreach($combos->ComboPais() as $r): ?><option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-2"><select id="depto_nacionalidad_AC_'+ x +'" name="depto_nacionalidad_AC[]"  class="form-control form-control-sm" ><option selected  disabled >Elegir..</option><?php foreach($combos->ComboDepto() as $r): ?><option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-2"><input type="text" class="form-control form-control-sm" id="id_AC[]" name="id_AC[]" placeholder="N° de identificación" autocomplete="off" > </div><div class="form-group col-md-2"><input type="number" class="form-control form-control-sm" id="acciones_AC[]" name="acciones_AC[]" placeholder="% Acciones" autocomplete="off"></div><div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field" > <i class="fas fa-trash-alt"></i></button></div></div></div>'); //add input box
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
                        $(wrapper).append('<div class="col-md-12"><div class="form-row"><div class="form-group col-md-2"><input type="text" class="UpperCase form-control form-control-sm" id="nombre_BF[]" name="nombre_BF[]" placeholder="Nombres" autocomplete="off"></div><div class="form-group col-md-2"><input type="text" class="UpperCase form-control form-control-sm" id="apellido_BF[]" name="apellido_BF[]" placeholder="Apellidos" autocomplete="off"></div><div class="form-group col-md-2"><select  class="form-control form-control-sm" id="nacionalidad_BF_'+ x +'" name="nacionalidad_BF[]" onchange="getvalBF(this, $i='+ x +')"><option selected disabled value = "164">Elegir..</option><?php foreach($combos->ComboPais() as $r): ?><option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-2"><select id="depto_nacionalidad_BF_'+ x +'" name="depto_nacionalidad_BF[]"  class="form-control form-control-sm" ><option selected  disabled >Elegir..</option><?php foreach($combos->ComboDepto() as $r): ?><option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-2"><input type="text" class="form-control form-control-sm" id="id_BF[]" name="id_BF[]" placeholder="N° de identificación" autocomplete="off" > </div><div class="form-group col-md-1"><input type="number" class="form-control form-control-sm" id="acciones_BF[]" name="acciones_BF[]" placeholder="% Acciones" autocomplete="off"></div><div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field_BF"> <i class="fas fa-trash-alt"></i></button></div></div></div>'); //add input box
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
                        $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-3"><input type="text" class=" UpperCase form-control form-control-sm" id="nombre_Cli[]" name="nombre_Cli[]" placeholder="Nombre" autocomplete="off"></div><div class="form-group col-md-3"><select  class="form-control form-control-sm" id="domicilio_Cli[]" name="domicilio_Cli[]"><option selected disabled>Elegir..</option><?php foreach($combos->ComboPais() as $r): ?><option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-3"><input type="number" class="form-control form-control-sm" id="telefono_Cli[]" name="telefono_Cli[]" placeholder="Teléfono" autocomplete="off"></div> <div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field_PC"> <i class="fas fa-trash-alt" ></i></button></div></div></div>'); //add input box
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
                        $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-3"><input type="text" class=" UpperCase form-control form-control-sm" id="nombre_Prov[]" name="nombre_Prov[]" placeholder="Nombre" autocomplete="off"></div><div class="form-group col-md-3"><input type="text" class="form-control form-control-sm" id="servicio_Prov[]" name="servicio_Prov[]" placeholder="Servicio o Producto" autocomplete="off"></div><div class="form-group col-md-3"><select  class="form-control form-control-sm" id="domicilio_Prov[]" name="domicilio_Prov[]"><option selected disabled value="164">Elegir...</option><?php foreach($combos->ComboPais() as $r): ?><option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-2"><input type="number" class="form-control form-control-sm" id="telefono_Prov[]" name="telefono_Prov[]" placeholder="Teléfono" autocomplete="off"></div><div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field_PP"> <i class="fas fa-trash-alt"></i></button></div></div></div>'); //add input box
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
                            //alert($('select[id=codigoDescripcion]').val());
                            
                        });	   
                }); 
            });            
        </script>
        <script>
            $(document).ready(function (){
               //función para determinar La actividad economica
                $("#nombreCompleto_RL").on('change', function () {
                        
                    var id_name = $(this).val();
                    $.post("./JQuerys/Panama/MRJ/jQ_Busqueda_NombreRL.php", { id_name : id_name }, function(data) {
                        $("#filtracion").html(data);
                        //$('#codigoDescripcion').val($("#").val());
                    });	
                }); 

                var id_cliente = $("#nombreCliente_PN").val();
                //alert($('input[id=nombreCliente_PN]').val());
                $.post("./JQuerys/Panama/MRJ/jQ_Busqueda_NombreCliente.php", { id_cliente : id_cliente }, function(data) {
                    
                    $("#filtracion_Cli").html(data);
                        //$('#codigoDescripcion').val($("#").val());
                });	

                $("#nombre_AC_2").on('change', function () {
                    
                    var id_name_ac = $("#nombre_AC_2").val();
                    $.post("./JQuerys/Panama/MRJ/jQ_Busqueda_NombreAC.php", { id_name_ac : id_name_ac }, function(data) {
                    
                    $("#filtracion_AC_2").html(data);
                        //$('#codigoDescripcion').val($("#").val());
                    });		
                }); 
                          

            });
        </script>

        <script>
           $(document).ready(function (){

                //SELECCION DEL DEPARTAMENTO PARA EL LUGAR DE CONSTITUCION
                $("#paisContitucion_PJ").on('change', function () {
                    $("#paisContitucion_PJ option:selected").each(function () {
                        var id_pais = $(this).val();
                        
                        $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                        
                            $("#depto_paisContitucion_PJ").html(data);
                        // alert($('select[id=depto_paisContitucion_PJ]').val());
                        });			
                    });
                });

                //SELECCION DEL DEPARTAMENTO PARA EL LUGAR NACIMIENTO DEL REPRESENTANTE LEGAL
                $("#paisNacimiento_RL").on('change', function () {
                    $("#paisNacimiento_RL option:selected").each(function () {
                        var id_pais = $(this).val();
                        
                        $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                        
                            $("#depto_paisNacimiento_RL").html(data);
                        // alert($('select[id=depto_paisContitucion_PJ]').val());
                        });			
                    });
                });

                //SELECCION DEL DEPARTAMENTO PARA NACIONALIDAD DEL REPRESENTANTE LEGAL
                $("#nacionalidad_RL").on('change', function () {
                    $("#nacionalidad_RL option:selected").each(function () {
                        var id_pais = $(this).val();
                        
                        $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                        
                            $("#depto_nacionalidad_RL").html(data);
                        // alert($('select[id=depto_paisContitucion_PJ]').val());
                        });			
                    });
                });

                //SELECCION DEL DEPARTAMENTO PARA LUGAR DE RESIDENCIA DEL REPRESENTANTE LEGA
                $("#paisResidencia_RL").on('change', function () {
                    $("#paisResidencia_RL option:selected").each(function () {
                        var id_pais = $(this).val();
                        
                        $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                        
                            $("#depto_paisResidencia_RL").html(data);
                        // alert($('select[id=depto_paisContitucion_PJ]').val());
                        });			
                    });
                });

                //SELECCION DEL DEPARTAMENTO PARA ACCIONISTAS (1)
                $("#nacionalidad_AC").on('change', function () {
                    $("#nacionalidad_AC option:selected").each(function () {

                        //alert($('select[id=nacionalidad_AC]').val());

                        var id_pais = $(this).val();
                        $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                            
                            $("#depto_nacionalidad_AC").html(data);
                            //alert($('select[id=depto_nacionalidad_AC]').val());
                        });			
                    }); 
                }); 

                //SELECCION DEL DEPARTAMENTO PARA ACCIONISTAS (1)
                $("#nacionalidad_BF").on('change', function () {
                    $("#nacionalidad_BF option:selected").each(function () {

                        //alert($('select[id=nacionalidad_AC]').val());

                        var id_pais = $(this).val();
                        $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                            
                            $("#depto_nacionalidad_BF").html(data);
                            //alert($('select[id=depto_nacionalidad_AC]').val());
                        });			
                    }); 
                }); 

            });
        </script>
        <!--Script genera un id unico (valor del input) para los Accionistas-->
        <script>
            function getval(sel,x)
                {
                    var id_pais = sel.value;
                   // alert ("id-->Pais:"+id_pais)
                    var i = x;
                    //alert ("id-->Combobox:"+i)
                    
                    $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                           
                        //alert($('select[id=nacionalidad_AC_'+i+']').val());

                        $("#depto_nacionalidad_AC_"+i).html(data);
                          // alert($('select[id=depto_nacionalidad_AC_'+i+']').val());
                           
                    });	
                }
        </script>
        <!--Script genera un id unico (valor del input) para los beneficiarios finales-->
        <script>
            function getvalBF(nac_ID,x)
                {
                    var id_pais = nac_ID.value;
                   //alert ("id-->Pais:"+id_pais)
                    var i = x;
                    //alert ("id-->Combobox:"+i)
                    $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                        //alert($('select[id=nacionalidad_AC_'+i+']').val());
                        $("#depto_nacionalidad_BF_"+i).html(data);
                          // alert($('select[id=depto_nacionalidad_AC_'+i+']').val());
                    });	
                }
        </script>

        <!--Script para cambiar de minuscula a mayuscula-->
        <script>
            $(document).ready( function () {
                    $(".UpperCase").on("keypress", function () {
                    $input=$(this);
                    setTimeout(function () {
                    $input.val($input.val().toUpperCase());
                    },30);
                })
            })
        </script>
    </body>

</html>

