<?php
error_reporting(0);

//ENTIDADES combos
include '../Entidades/ComboPais.php';
include '../Entidades/ComboFormaPago.php';
include '../Entidades/ComboOrigenesFondos.php';
include '../Entidades/ComboEstadoCivil.php';

//Entidad Central
include '../Entidades/Pic.php';

//Entidades compartidas
include '../Entidades/Compartidas/Departamento.php';
include '../Entidades/Compartidas/RelacionCliente.php';
include '../Entidades/Compartidas/Causa.php';
include '../Entidades/Compartidas/OrigenesFondos.php';
include '../Entidades/Compartidas/Pep.php';
include '../Entidades/Compartidas/Facta.php';
include '../Entidades/Compartidas/Referencias.php';

//NATURAL
include '../Entidades/Natural/DatosLaborales.php';
include '../Entidades/Natural/DatosConyuge.php';
include '../Entidades/Natural/Fiador.php';
include '../Entidades/Anexos/InteresInfoPN.php';

include '../Entidades/Anexos/CategoriaOcupacional.php';
include '../Entidades/Anexos/BusquedaRes.php';



include '../Entidades/Vistas/vw_DatosClienteNaturalPic.php';
include '../Entidades/Vistas/vw_InteresInfoPN.php';

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
$datoscompartidos = new DtDataPicCompartidos();
$datospic = new DtPic();

//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
$varIdEmp = $_GET['dataPIC'];

$empEdit;
$empEdit = $datospic->ObtenerPic($varIdEmp);

$datosGene;
$datosGene = $datospic->DatosClienteNaturalPic($varIdEmp);

$datosLab;
$datosLab = $datospic->DatosLaborales($varIdEmp);

$datosCon;
$datosCon = $datospic->DatosConyuge($varIdEmp);

$datosFi;
$datosFi = $datospic->Fiador($varIdEmp);

$datosII;
$datosII = $datospic->DatosInteresPN($varIdEmp);

//variables compartida
//compartidos
$dtOrigenesFondos;
$dtOrigenesFondos = $datoscompartidos->OrigenesFondos($varIdEmp);

$datosPep;
$datosPep = $datoscompartidos->DatosPep($varIdEmp);

$datosFacta;
$datosFacta = $datoscompartidos->DatosFacta($varIdEmp);

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
                                    <div class="form-group col-md-6">
                                        
                                    </div>
                                    <div class="form-group col-md-4" style="text-align: right;  padding: 16px ; ">
                                        
                                        <button type="button" class="btn btn-primary col-md-7" onclick="">Editar Pic</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" >
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="nombreCliente_PN">Nombre del cliente</label>
                                        <input type="hidden" name="idCli_PN" id="idCli_PN" />
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
                                    <form>
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
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
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
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
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
                                                    <input type="text" class="form-control form-control-sm" id="tipoId_PN" name ="tipoId_PN" placeholder="Nombre completo">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="numeroId_PN">Número de identificación</label>
                                                    <input type="text" class="form-control form-control-sm" id="numeroId_PN" name="numeroId_PN" placeholder="País de nacimiento">
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
                                                    <input type="text" class="form-control form-control-sm" id="direccionDomi_PN" name="direccionDomi_PN" placeholder="Dirección de domicilio">
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
                                                    <label for="departamento">Departamento</label>
                                                    <select id="departamento" name="departamento"  class="form-control form-control-sm" >
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
                                                    <label for="telefono_PN">Teléfono</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefono_PN" name="telefono_PN" placeholder="Teléfono">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="celular_PN">Celular</label>
                                                    <input type="number" class="form-control form-control-sm" id="celular_PN" name="celular_PN" placeholder="Celular">
                                                </div>

                                                <div class="form-group col-md-5">
                                                    <label for="correo_PN">Correo electrónico </label>
                                                    <input type="email" class="form-control form-control-sm" id="correo_PN" name="correo_PN" placeholder="Correo electrónico">
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="profesion_PN">Profesión/Oficio</label>
                                                    <input type="text" class="form-control form-control-sm" id="profesion_PN" name="profesion_PN" placeholder="Nombre completo">
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
                                                    <input type="text" class="form-control form-control-sm" id="empresa_DL" name="empresa_DL" placeholder="Empresa donde labora">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="Cargo_DL">Cargo que desempeña</label>
                                                    <input type="text" class="form-control form-control-sm" id="Cargo_DL" name="Cargo_DL" placeholder="Cargo que desempeña">
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
                                                    <input type="text" class="form-control form-control-sm" id="direcEmpresa_DL" name="direcEmpresa_DL" placeholder="Dirección de la empresa donde labora">
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
                                                    <input type="text" class="form-control form-control-sm" id="IndicarOI_DL" name="IndicarOI_DL" placeholder="Indicar la fuente de 'Otros Ingresos'">
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
                                                    <input type="text" class="form-control form-control-sm" id="Nombre_CO" name="Nombre_CO" placeholder="Nombre completo">
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
                                                    <input type="text" class="form-control form-control-sm" id="numId_CO" name="numId_CO" placeholder="Número de identificación">
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
                                                    <input type="text" class="form-control form-control-sm" id="profesion_CO" name="profesion_CO" placeholder="Profesión/Oficio">
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
                                                    <input type="text" class="form-control form-control-sm" id="empresaTrab_CO" name="empresaTrab_CO" placeholder="Empresa donde labora">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="telefonoEmpresa_CO">Teléfono empresa</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefonoEmpresa_CO" name="telefonoEmpresa_CO" placeholder="Teléfono empresa">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="cargo_CO">Cargo</label>
                                                    <input type="text" class="form-control form-control-sm" id="cargo_CO" name="cargo_CO" placeholder="Cargo">
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
                                                    <input type="text" class="form-control form-control-sm" id="nombre_F" name="nombre_F" placeholder="Nombre Completo">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="relacionDeudor_F">Relación con el deudor</label>
                                                    <input type="text" class="form-control form-control-sm" id="relacionDeudor_F" name="relacionDeudor_F" placeholder="Relación con el deudor">
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
                                                    <input type="text" class="form-control form-control-sm" id="numId_F" name="numId_F" placeholder="Número de identificación">
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
                                                    <input type="email" class="form-control form-control-sm" id="correo_F" name="correo_F" placeholder="Correo electrónico">
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
                                                    <input type="text" class="form-control form-control-sm" id="direcDomicilio_F" name="direcDomicilio_F" placeholder="Dirección de domicilio">
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
                                                    <input type="text" class="form-control form-control-sm" id="empresa_F" name="empresa_F" placeholder="Empresa donde labora">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="telefonoEmpresa_F">Teléfono empresa</label>
                                                    <input type="number" class="form-control form-control-sm" id="telefonoEmpresa_F" name="telefonoEmpresa_F" placeholder="Teléfono empresa">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="cargo_F">Cargo</label>
                                                    <input type="text" class="form-control form-control-sm" id="cargo_F" name="cargo_F" placeholder="Cargo">
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
                                                    <label for="#">Forma de Pago</label>
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
                                                    <label for="#">Fuente y origen de los recursos</label>
                                                    <select class="form-control form-control-sm" id="origenesRecursos_PN"  >
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
                                        <!--Start table Referencias-->
                                        <div class="table-responsive">
                                    
                                            <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre completo</th>
                                                        <th>Tipo de indentificación</th>
                                                        <th>N° de identificación</th>
                                                        <th>tiempo de conocer al referido</th>
                                                        <th>Celular</th>
                                                        <th>Teléfono</th>
                                                        <th>Lugar donde labora</th>
                                                                                                
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php foreach($datospic->Referencias($varIdEmp) as $r): ?>
                                                        <tr>
                                                        
                                                            <td><?php echo $r->__GET('nombreReferencia'); ?></td>
                                                            <td><?php echo $r->__GET('tipoIdentificacion'); ?></td>
                                                            <td><?php echo $r->__GET('numeroIdentificacion'); ?></td>
                                                            <td><?php echo $r->__GET('tiempoReferido'); ?></td>
                                                            <td><?php echo $r->__GET('celular'); ?></td>
                                                            <td><?php echo $r->__GET('telefono'); ?></td>
                                                            <td><?php echo $r->__GET('LugarLabora'); ?></td>
                                                                                                                                                            
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                        <!-- End table Referencias-->


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
                                                    <select d="causa_facta" name="causa_facta" class="form-control form-control-sm" >
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
                                                    <label class="large mb-1" for="#" ><b>Indicador</b></label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="large mb-1" for="#" ><b>Subvariable</b></label>
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
                                                <input type="text" class="form-control form-control-sm" id="sbVariable_Profesion_MR_N" name="sbVariable_Profesion_MR_N" 
                                                        placeholder="Complete indicador"  title="Actividad economica " autocomplete="off" >
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
                                                    <input type="text" class="form-control form-control-sm" id="sbVariable_Empleo_MR_N" name="sbVariable_Empleo_MR_N" 
                                                            placeholder="ingrese ID"  title="Actividad Economica" autocomplete="off" >
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
                                                        <?php foreach($combos->ComboDepto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idDepartamento') ?>"> <?php echo $r->__GET('nombreDepartamento') ?></option>
                                                        <?php endforeach; ?>
 
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
                                                <input type="button"  class="btn btn-primary col-md-12" onclick="regresar()" value="Volver"/>
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
                
                //seteando los datos generales 
                $("#fNacimiento_PN").val("<?php echo $datosGene->__GET('fechaNacimiento') ?>");
                $("#paisNacimiento_PN").val("<?php echo $datosGene->__GET('paisNacimiento') ?>");
                $("#depto_paisNacimiento_PN").val("<?php echo $datosGene->__GET('deptoPaisNacimiento') ?>");
                $("#nacionalidad_PN").val("<?php echo $datosGene->__GET('nacionalidad') ?>");
                $("#depto_nacionalidad_PN").val("<?php echo $datosGene->__GET('deptoNacionalidad') ?>");
                $("#estadoCivil_PN").val("<?php echo $datosGene->__GET('idEstadoCivil') ?>");
                $("#sexo_PN").val("<?php echo $datosGene->__GET('sexo') ?>");
                $("#nDependientes_PN").val("<?php echo $datosGene->__GET('ndependientes') ?>");
                $("#tipoId_PN").val("<?php echo $datosGene->__GET('tipoIdentificacion') ?>");
                $("#numeroId_PN").val("<?php echo $datosGene->__GET('numIdentificacion') ?>");
                $("#paisEmisionId_PN").val("<?php echo $datosGene->__GET('paisEmision') ?>");
                $("#fEmisionId_PN").val("<?php echo $datosGene->__GET('fechaEmision') ?>");
                $("#fVencimientoId_PN").val("<?php echo $datosGene->__GET('fechaVencimiento') ?>");
                $("#direccionDomi_PN").val("<?php echo $datosGene->__GET('direccionDomicilio') ?>");
                $("#paisDominicilio_AE").val("<?php echo $datosGene->__GET('PaisDomicilio') ?>");
                $("#departamento").val("<?php echo $datosGene->__GET('deptoPaisDomicilio') ?>");
                $("#telefono_PN").val("<?php echo $datosGene->__GET('telefono') ?>");
                $("#celular_PN").val("<?php echo $datosGene->__GET('celular') ?>");
                $("#correo_PN").val("<?php echo $datosGene->__GET('correoPersonaNatural') ?>");
                $("#profesion_PN").val("<?php echo $datosGene->__GET('profesion') ?>");

                //seteando los datos laborales

                $("#empresa_DL").val("<?php echo $datosLab->__GET('nombreEmpresa') ?>");
                $("#Cargo_DL").val("<?php echo $datosLab->__GET('cargoEmpresa') ?>");
                $("#fIngreso_DL").val("<?php echo $datosLab->__GET('fechaIngreso') ?>");
                $("#antiguedad_DL").val("<?php echo $datosLab->__GET('antiguedad') ?>");
                $("#direcEmpresa_DL").val("<?php echo $datosLab->__GET('direccionEmpresa') ?>");
                $("#paisEmpresa_DL").val("<?php echo $datosLab->__GET('paisEmpresa') ?>");
                $("#telEmpresa_DL").val("<?php echo $datosLab->__GET('telefono') ?>");
                $("#salario_DL").val("<?php echo $datosLab->__GET('salarioMensual') ?>");
                $("#otrosIngresos_DL").val("<?php echo $datosLab->__GET('otrosIngresos') ?>");
                $("#Egresos_DL").val("<?php echo $datosLab->__GET('egresosMensuales') ?>");
                $("#IndicarOI_DL").val("<?php echo $datosLab->__GET('fuenteOtrosIngresos') ?>");

                //seteando los datos del conyuge
                $("#Nombre_CO").val("<?php echo $datosCon->__GET('nombreConyugue') ?>");
                $("#nacimiento_CO").val("<?php echo $datosCon->__GET('fechaNacimiento') ?>");
                $("#paisNacimiento_CO").val("<?php echo $datosCon->__GET('paisNacimientoConyuge') ?>");
                $("#nacionalidad_CO").val("<?php echo $datosCon->__GET('nacionalidadConyuge') ?>");
                $("#tipoId_CO").val("<?php echo $datosCon->__GET('tipoIdentificacion') ?>");
                $("#numId_CO").val("<?php echo $datosCon->__GET('numeroIdentificacion') ?>");
                $("#paisEmisionId_CO").val("<?php echo $datosCon->__GET('paisEmision') ?>");
                $("#profesion_CO").val("<?php echo $datosCon->__GET('profesion') ?>");
                $("#celular_CO").val("<?php echo $datosCon->__GET('celular') ?>");
                $("#empresaTrab_CO").val("<?php echo $datosCon->__GET('empresaLabora') ?>");
                $("#telefonoEmpresa_CO").val("<?php echo $datosCon->__GET('telefono') ?>");
                $("#cargo_CO").val("<?php echo $datosCon->__GET('cargoEmpresa') ?>");
                $("#ingreMensual_CO").val("<?php echo $datosCon->__GET('ingresoMensual') ?>");

                //seteando los datos del Fiador
                $("#nombre_F").val("<?php echo $datosFi->__GET('nombreFiador') ?>");
                $("#relacionDeudor_F").val("<?php echo $datosFi->__GET('RelacionDeudor') ?>");
                $("#nacionalidad_F").val("<?php echo $datosFi->__GET('nacionalidad') ?>");
                $("#TipoId_F").val("<?php echo $datosFi->__GET('tipoIdentificacionFiador') ?>");
                $("#numId_F").val("<?php echo $datosFi->__GET('numIdFiador') ?>");
                $("#PaisEmisionId_F").val("<?php echo $datosFi->__GET('paisEmision') ?>");
                $("#correo_F").val("<?php echo $datosFi->__GET('correoFiador') ?>");
                $("#celular_F").val("<?php echo $datosFi->__GET('celularFiador') ?>");
                $("#direcDomicilio_F").val("<?php echo $datosFi->__GET('direccionFiador') ?>");
                $("#paisDomicilio_F").val("<?php echo $datosFi->__GET('paisDomicilioFiador') ?>");
                $("#telefono_F").val("<?php echo $datosFi->__GET('telefonoFiador') ?>");  
                $("#empresa_F").val("<?php echo $datosFi->__GET('EmpresaFiador') ?>");
                $("#telefonoEmpresa_F").val("<?php echo $datosFi->__GET('telefonoEmpresa') ?>");
                $("#cargo_F").val("<?php echo $datosFi->__GET('cargoFiador') ?>");
                $("#Ingresos_F").val("<?php echo $datosFi->__GET('ingresoMensualFiador') ?>");

                //datos de origenes de los fondos
                $("#formaPago_PN").val("<?php echo $dtOrigenesFondos->__GET('idFormaPago') ?>");
                $("#origenesRecursos_PN").val("<?php echo $dtOrigenesFondos->__GET('idFuenteFondos') ?>");


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
                
                //datos Informacion de Interes

                
                $("#cat_ocupacional_PN").val("<?php echo $datosII->__GET('idCategoriaOcupacional') ?>");                
                $("#indicador_Profesion_MR_N").val("<?php echo $datosII->__GET('codigoCGO') ?>");
                $("#sbVariable_Profesion_MR_N").val("<?php echo $datosII->__GET('descripcionCGO') ?>"); 
                $("#indicador_Empleo_MR_N").val("<?php echo $datosII->__GET('codigoCIIU') ?>");
                $("#sbVariable_Empleo_MR_N").val("<?php echo $datosII->__GET('descripcion') ?>");
                $("#interes_LAE").val("<?php echo $datosII->__GET('idPaisACII') ?>");
                $("#interes_depto_LAE").val("<?php echo $datosII->__GET('idDeptoACII') ?>");
                $("#resultBusqueda_II").val("<?php echo $datosII->__GET('idBusquedaRes') ?>");

                

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
    </body>
</html>
