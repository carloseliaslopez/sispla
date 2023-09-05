<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/ComboPais.php';
include '../Entidades/ComboFormaPago.php';
include '../Entidades/ComboEstadoCivil.php';
include '../Entidades/Pic.php';
include '../Entidades/ComboOrigenesFondos.php';
include '../Entidades/Natural/DatosClienteNaturalPic.php';
include '../Entidades/Compartidas/RelacionCliente.php';
include '../Entidades/Compartidas/Causa.php';

include '../Entidades/Anexos/CategoriaOcupacional.php';
include '../Entidades/Anexos/BusquedaRes.php';

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

                                    <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 1. Datos Cliente persona natural</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->

                                     <!--Start form-->
                                    <form method="POST" action="../negocio/NgNewDataPicNatural.php">
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="fNacimiento_PN">Fecha de nacimiento</label>
                                                    <input type="date" class="form-control form-control-sm" id="fNacimiento_PN" name="fNacimiento_PN" placeholder="Fecha de nacimiento">
                                                    <input type="hidden" name="idCli_PN" id="idCli_PN" />   
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>                                               
                                                    
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="paisNacimiento_PN">Pais de nacimiento</label>
                                                    <select class="form-control form-control-sm" id="paisNacimiento_PN" name="paisNacimiento_PN">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="depto_paisNacimiento_PN">Departamento</label>
                                                    <select id="depto_paisNacimiento_PN" name="depto_paisNacimiento_PN"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="nacionalidad_PN">Nacionalidad</label>
                                                    <select  class="form-control form-control-sm" id="nacionalidad_PN" name="nacionalidad_PN">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="depto_nacionalidad_PN">Departamento</label>
                                                    <select id="depto_nacionalidad_PN" name="depto_nacionalidad_PN"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                    </select>
                                                </div>
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="estadoCivil_PN">Estado civil</label>
                                                    <select  class="form-control form-control-sm" id="estadoCivil_PN" name="estadoCivil_PN">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboEstadoCivil() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idEstadoCivil') ?>"> <?php echo $r->__GET('descripcion') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="sexo_PN">Sexo</label>
                                                    <select id="sexo_PN"  name="sexo_PN" class="form-control form-control-sm">
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                               
                                                <div class="form-group col-md-4">
                                                    <label for="nDependientes_PN">N° de dependientes</label>
                                                    <input type="number" class="form-control form-control-sm" id="nDependientes_PN" name="nDependientes_PN" placeholder="N° de dependientes" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="tipoId_PN">Tipo de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="tipoId_PN" name ="tipoId_PN" placeholder="Nombre completo" >
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="numeroId_PN">Número de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="numeroId_PN" name="numeroId_PN" placeholder="Número de identificación" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="paisEmisionId_PN">País de emisión</label>
                                                    <select  class="form-control form-control-sm" id="paisEmisionId_PN" name="paisEmisionId_PN">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fEmisionId_PN">Fecha de emisión</label>
                                                    <input type="date" class="form-control form-control-sm" id="fEmisionId_PN" name="fEmisionId_PN" placeholder="Fecha de emisión">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fVencimientoId_PN">Fecha de vencimiento</label>
                                                    <input type="date" class="form-control form-control-sm" id="fVencimientoId_PN" name="fVencimientoId_PN" placeholder="vencimiento">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="direccionDomi_PN">Dirección de domicilio</label>
                                                    <input type="text" class="form-control form-control-sm" id="direccionDomi_PN" name="direccionDomi_PN" placeholder="Dirección de domicilio" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="paisDominicilio_AE">País de domicilio</label>
                                                    <select class="form-control form-control-sm" id="paisDominicilio_AE" name="paisDominicilio_AE">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="departamento">Provincia/Departamento</label>
                                                    <select id="departamento" name="departamento"  class="form-control form-control-sm" >
                                                        <option selected  disabled >Elegir..</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="telefono_PN">Teléfono</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefono_PN" name="telefono_PN" placeholder="Teléfono" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="celular_PN">Celular</label>
                                                    <input type="number" class="form-control form-control-sm" id="celular_PN" name="celular_PN" placeholder="Celular" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-5">
                                                    <label for="correo_PN">Correo electrónico </label>
                                                    <input type="text" class="form-control form-control-sm" id="correo_PN" name="correo_PN" placeholder="Correo electrónico" autocomplete="off">
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="profesion_PN">Profesión/Oficio</label>
                                                    <input type="text" class="form-control form-control-sm" id="profesion_PN" name="profesion_PN" placeholder="Profesión/Oficio" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> 1.1 Datos laborales</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label for="empresa_DL">Empresa donde labora</label>
                                                    <input type="text" class="form-control form-control-sm" id="empresa_DL" name="empresa_DL" placeholder="Empresa donde labora" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="Cargo_DL">Cargo que desempeña</label>
                                                    <input type="text" class="form-control form-control-sm" id="Cargo_DL" name="Cargo_DL" placeholder="Cargo que desempeña" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="fIngreso_DL">Fecha de ingreso</label>
                                                    <input type="date" class="form-control form-control-sm" id="fIngreso_DL" name="fIngreso_DL" placeholder="Fecha de ingreso">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="antiguedad_DL">Antigüedad</label>
                                                    <input type="number" class="form-control form-control-sm" id="antiguedad_DL" name="antiguedad_DL" placeholder="Antigüedad">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label for="direcEmpresa_DL">Dirección de la empresa donde labora</label>
                                                    <input type="text" class="form-control form-control-sm" id="direcEmpresa_DL" name="direcEmpresa_DL" placeholder="Dirección de la empresa donde labora" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="paisEmpresa_DL">País</label>
                                                    <select  class="form-control form-control-sm" id="paisEmpresa_DL" name="paisEmpresa_DL">
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
                                                <div class="form-group col-md-3">
                                                    <label for="telEmpresa_DL">Telefono de la empresa</label>
                                                    <input type="number" class="form-control form-control-sm" id="telEmpresa_DL" name="telEmpresa_DL" placeholder="Empresa donde labora">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="col-12">
                                                        <label for="salario_DL">Salario mensual</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text form-control-sm"><b>U$</b></div>
                                                            <input type="number" class="form-control form-control-sm" id="salario_DL" name="salario_DL" placeholder="Salario mensual">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="col-12">
                                                        <label for="otrosIngresos_DL">Otros ingresos</label>
                                                        <div class="input-group">
                                                        <div class="input-group-text form-control-sm"><b>U$</b></div>
                                                            <input type="number" class="form-control form-control-sm" id="otrosIngresos_DL" name="otrosIngresos_DL" placeholder="Otros ingresos">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="col-12">
                                                        <label for="Egresos_DL">Egresos mensuales</label>
                                                        <div class="input-group">
                                                        <div class="input-group-text form-control-sm"><b>U$</b></div>
                                                            <input type="number" class="form-control form-control-sm" id="Egresos_DL" name="Egresos_DL" placeholder="Egresos mensuales">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="IndicarOI_DL">Indicar la fuente de "Otros Ingresos" </label>
                                                    <input type="text" class="form-control form-control-sm" id="IndicarOI_DL" name="IndicarOI_DL" placeholder="Indicar la fuente de 'Otros Ingresos'" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                         <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> 1.2 Datos del conyuge</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="Nombre_CO">Nombre completo</label>
                                                    <input type="text" class="form-control form-control-sm" id="Nombre_CO" name="Nombre_CO" placeholder="Nombre completo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="nacimiento_Con">Fecha de nacimiento</label>
                                                    <input type="date" class="form-control form-control-sm" id="nacimiento_CO" name="nacimiento_CO" placeholder="Fecha de ingreso">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="paisNacimiento_CO">País de nacimiento</label>
                                                    <select class="form-control form-control-sm" id="paisNacimiento_CO" name="paisNacimiento_CO">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="nacionalidad_CO">Nacionalidad</label>
                                                    <select class="form-control form-control-sm" id="nacionalidad_CO" name="nacionalidad_CO">
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
                                                    <label for="tipoId_CO">Tipo de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="tipoId_CO" name="tipoId_CO" placeholder="Nombre completo">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="numId_CO">Número de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="numId_CO" name="numId_CO" placeholder="Número de identificación" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="paisEmisionId_CO">País de emisión</label>
                                                    <select  class="form-control form-control-sm" id="paisEmisionId_CO" name="paisEmisionId_CO">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="profesion_CO">Profesión/Oficio</label>
                                                    <input type="text" class="form-control form-control-sm" id="profesion_CO" name="profesion_CO" placeholder="Profesión/Oficio" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="celular_CO">Celular</label>
                                                    <input type="number" class="form-control form-control-sm" id="celular_CO" name="celular_CO" placeholder="Celular">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="empresaTrab_CO">Empresa donde labora</label>
                                                    <input type="text" class="form-control form-control-sm" id="empresaTrab_CO" name="empresaTrab_CO" placeholder="Empresa donde labora" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="telefonoEmpresa_CO">Teléfono empresa</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefonoEmpresa_CO" name="telefonoEmpresa_CO" placeholder="Teléfono empresa">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="cargo_CO">Cargo</label>
                                                    <input type="text" class="form-control form-control-sm" id="cargo_CO" name="cargo_CO" placeholder="Cargo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="col-12">
                                                        <label for="ingreMensual_CO">Ingresos mensuales</label>
                                                        <div class="input-group">
                                                        <div class="input-group-text form-control-sm"><b>U$</b></div>
                                                            <input type="number" class="form-control form-control-sm" id="ingreMensual_CO" name="ingreMensual_CO" placeholder="Ingresos mensuales">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> 1.3 Datos del fiador (Si Aplica) </b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label for="nombre_F">Nombre Completo</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_F" name="nombre_F" placeholder="Nombre Completo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="relacionDeudor_F">Relación con el deudor</label>
                                                    <input type="text" class="form-control form-control-sm" id="relacionDeudor_F" name="relacionDeudor_F" placeholder="Relación con el deudor" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="nacionalidad_F">Nacionalidad</label>
                                                    <select class="form-control form-control-sm" id="nacionalidad_F" name="nacionalidad_F">
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
                                                    <label for="TipoId_F">Tipo de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="TipoId_F" name="TipoId_F" placeholder="Tipo de identificación">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="numId_F">Número de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="numId_F" name="numId_F" placeholder="Número de identificación" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="PaisEmisionId_F">País de emisión</label>
                                                    <select  class="form-control form-control-sm" id="PaisEmisionId_F" name="PaisEmisionId_F">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="correo_F">Correo electrónico</label>
                                                    <input type="email" class="form-control form-control-sm" id="correo_F" name="correo_F" placeholder="Correo electrónico" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="celular_F">Celular</label>
                                                    <input type="number" class="form-control form-control-sm" id="celular_F" name="celular_F" placeholder="Celular">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-7">
                                                    <label for="direcDomicilio_F">Dirección de domicilio</label>
                                                    <input type="text" class="form-control form-control-sm" id="direcDomicilio_F" name="direcDomicilio_F" placeholder="Dirección de domicilio" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="paisDomicilio_F">País de domicilio</label>
                                                    <select class="form-control form-control-sm" id="paisDomicilio_F" name="paisDomicilio_F">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="telefono_F">Teléfono domicilio </label>
                                                    <input type="number" class="form-control form-control-sm" id="telefono_F" name="telefono_F" placeholder="Teléfono domicilio">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="empresa_F">Empresa donde labora</label>
                                                    <input type="text" class="form-control form-control-sm" id="empresa_F" name="empresa_F" placeholder="Empresa donde labora" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="telefonoEmpresa_F">Teléfono empresa</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefonoEmpresa_F" name="telefonoEmpresa_F" placeholder="Teléfono empresa">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="cargo_F">Cargo</label>
                                                    <input type="text" class="form-control form-control-sm" id="cargo_F" name="cargo_F" placeholder="Cargo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="col-12">
                                                        <label for="Ingresos_F">Ingresos mensuales</label>
                                                        <div class="input-group">
                                                        <div class="input-group-text form-control-sm"><b>U$</b></div>
                                                            <input type="number" class="form-control form-control-sm" id="Ingresos_F" name="Ingresos_F" placeholder="Ingresos mensuales">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                    <label for="formaPago_PN">Forma de Pago</label>
                                                    <select class="form-control form-control-sm" id="formaPago_PN" name="formaPago_PN">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboFormaPago() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idFormaPago') ?>"> <?php echo $r->__GET('nombreFormaPago') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="origenesRecursos_PN">Fuente y origen de los recursos</label>
                                                    <select class="form-control form-control-sm" id="origenesRecursos_PN" name="origenesRecursos_PN" >
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
                                                        <label id ="Text"><b> 3. Referencias</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="#"> <b>Datos del referente (1):</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nombre_R1">Nombre completo</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_R1" name="nombre_R1" placeholder="Nombre completo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="tipoId_R1">Tipo de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="tipoId_R1" name="tipoId_R1" placeholder="Tipo de identificación">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="numId_R1">Número de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="numId_R1" name="numId_R1" placeholder="Número de identificación" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="tiempoReferido_R1">Tiempo de conocer al referido</label>
                                                    <input type="text" class="form-control form-control-sm" id="tiempoReferido_R1" name="tiempoReferido_R1" placeholder="Tiempo de conocer al referido" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="celular_R1">Celular</label>
                                                    <input type="number" class="form-control form-control-sm" id="celular_R1" name="celular_R1" placeholder="Celular">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="telefono_R1">Teléfono domicilio</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefono_R1" name="telefono_R1" placeholder="Teléfono domicilio">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="lTrabaja_R1">Lugar donde labora</label>
                                                    <input type="text" class="form-control form-control-sm" id="lTrabaja_R1" name="lTrabaja_R1" placeholder="Lugar donde labora" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="#"> <b>Datos del referente (2):</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nombre_R2">Nombre completo</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_R2" name="nombre_R2" placeholder="Nombre completo" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="tipoId_R2">Tipo de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="tipoId_R2" name="tipoId_R2" placeholder="Tipo de identificación">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="numId_R2">Número de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="numId_R2" name="numId_R2" placeholder="Número de identificación" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="tiempoReferido_R2">Tiempo de conocer al referido</label>
                                                    <input type="text" class="form-control form-control-sm" id="tiempoReferido_R2" name="tiempoReferido_R2" placeholder="Tiempo de conocer al referido" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="celular_R2">Celular</label>
                                                    <input type="number" class="form-control form-control-sm" id="celular_R2" name="celular_R2" placeholder="Celular">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="telefono_R2">Teléfono domicilio</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefono_R2" name="telefono_R2" placeholder="Teléfono domicilio">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="lTrabaja_R2">Lugar donde labora</label>
                                                    <input type="text" class="form-control form-control-sm" id="lTrabaja_R2" name="lTrabaja_R2" placeholder="Lugar donde labora" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
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
                                                    <label class="large mb-1" for="cat_ocupacional_PN" ><b>Variable</b></label>  
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <label class="large mb-1" for="indicador_Constitucion_MR_J" ><b>Indicador</b></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="large mb-1" for="sbVariable_Constitucion_MR_J" ><b>Subvariable</b></label>
                                                </div> 
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                        <label class="form-control form-control-sm" ><b>Categoria Ocupacional</b></label>
                                                </div>  
                                                
                                                <div class="form-group col-md-2">
                                                    <select id="cat_ocupacional_PN" name="cat_ocupacional_PN" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboCatOcupacional() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idCategoriaOcupacional') ?>"> <?php echo $r->__GET('tipoCategoria') ?></option>
                                                        <?php endforeach; ?>
                                                        
                                                    </select>
                                                </div> 
                                                 
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-control form-control-sm"><b> Profesión (Ocupación)</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="indicador_Profesion_MR_N" name="indicador_Profesion_MR_N" 
                                                        placeholder="ingrese ID"  title="Digite el número que aparece a la casificación general de ocupaciones" autocomplete="off" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select id="sbVariable_Profesion_MR_N" name="sbVariable_Profesion_MR_N" class="form-control form-control-sm" >
                                                        <option selected disabled>Complete indicador</option>
                                                    </select>
                                                </div>                                               
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-control form-control-sm"><b>Información del Empleo/Empresa</b></label>

                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="indicador_Empleo_MR_N" name="indicador_Empleo_MR_N" 
                                                        placeholder="ingrese ID"  title="Digite el número que aparece a la par de la actividad detallada en el Aviso de Operaciones." autocomplete="off" >                                                        
                                                </div>
                                                <div class="form-group col-md-6">                                                    
                                                    <select id="sbVariable_Empleo_MR_N" name="sbVariable_Empleo_MR_N" class="form-control form-control-sm" >
                                                        <option selected disabled>Complete indicador</option>
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


        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="assets/demo/datatables-demo.js"></script> -->

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
                window.open ("ListaClientes.php","_self")
            }
        </script>

        <script language="javascript">
            $(document).ready(function(){
                // SCRIPT PARA RELLENAR EL COMBOBOX DE DEPARRTAMENTO DE LUGAR DE NACIMIENTO
                $("#paisNacimiento_PN").on('change', function () {
                    $("#paisNacimiento_PN option:selected").each(function () {
                        var id_pais = $(this).val();
                        $.post("JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                            $("#depto_paisNacimiento_PN").html(data);
                        });			
                    });
                });


                $("#nacionalidad_PN").on('change', function () {
                    $("#nacionalidad_PN option:selected").each(function () {
                        var id_pais = $(this).val();
                        $.post("JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                            $("#depto_nacionalidad_PN").html(data);
                        });			
                    });
                });

                $("#paisDominicilio_AE").on('change', function () {
                    $("#paisDominicilio_AE option:selected").each(function () {
                        var id_pais = $(this).val();
                        $.post("JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                            $("#departamento").html(data);
                        });			
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function (){
               //función para determinar La actividad economica
                $("#indicador_Profesion_MR_N").on('change', function () {    
                    var id_profesion = $(this).val();

                        $.post("./JQuerys/Panama/MRN/jQ_ActEcono_Profesion_PN.php", { id_profesion: id_profesion }, function(data) {
                            $("#sbVariable_Profesion_MR_N").html(data);
                            //alert($('select[id=codigoDescripcion]').val());
                            
                        });	   
                });
                
                $("#indicador_Empleo_MR_N").on('change', function () {    
                    var id_empleo = $(this).val();
                    var id_matriz = $("#nacionalidad_PN").val();
                
                    //alert($('select[id=paisContitucion_PJ]').val());
                        $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_ActiEconomica_PJ.php", { id_empleo: id_empleo, id_matriz: id_matriz }, function(data) {
                            $("#sbVariable_Empleo_MR_N").html(data);
                            //alert($('select[id=codigoDescripcion]').val());
                        });	   
                }); 

                $("#interes_LAE").on('change', function () {
                    $("#interes_LAE option:selected").each(function () {
                        var id_pais = $(this).val();
                        
                        $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
                        
                            $("#interes_depto_LAE").html(data);
                        // alert($('select[id=depto_paisContitucion_PJ]').val());
                        });			
                    });
                });


            });   

        </script>



    </body>
</html>
