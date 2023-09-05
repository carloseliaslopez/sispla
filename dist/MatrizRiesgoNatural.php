<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/Pic.php';

include '../Entidades/Natural/DatosClienteNaturalPic.php';
include '../Entidades/Natural/DatosConyuge.php';
include '../Entidades/Natural/DatosLaborales.php';

include '../Entidades/Compartidas/Departamento.php';
include '../Entidades/Compartidas/Pais.php';
include '../Entidades/Compartidas/FormaPago.php';
include '../Entidades/Compartidas/FuenteFondos.php';
include '../Entidades/Compartidas/OrigenesFondos.php';
include '../Entidades/Compartidas/Pep.php';

include '../Entidades/Evaluacion/CatalogoAE.php';
include '../Entidades/Evaluacion/CatalogoDocumentos.php';
include '../Entidades/Evaluacion/CatalogoOCGO.php';
include '../Entidades/Evaluacion/CatalogoSubProducto.php';
include '../Entidades/Evaluacion/CategoriaProducto.php';
include '../Entidades/Evaluacion/Monto.php';

//DATOS
include '../Datos/DtCombos.php';
include '../Datos/DtMatrizRiesgoCompartida.php';
include '../Datos/DtPic.php';
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
//INSTANCIAS
$matrizERG = new DtMatrizRiesgoCompartida();

//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
//$varIdEmp = $_GET['dataPIC'];
//$empEdit;
//$empEdit = $datospic->ObtenerPic($varIdEmp);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Matriz de Riesgo</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/NewStyles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->
    <script src="./fontawesome5.15.1/js/all.min.js"></script>
     
    <style>
        .myDiv{
        display:none;
        }  
    </style>

</head>

<body class="sb-nav-fixed">
    <?php require "../dist/navbar.php" ?>
    <div id="layoutSidenav">
        <?php require "../dist/LayoutSidenav.php" ?>
        

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
               
                    <h4 id="h1Informe" name= "h1Informe"  class="mt-4">Matriz de Evaluación de Riesgo de LD/FT/FP</h4>
                    <h5 id="h1Informe" name= "h1Informe"  class="mt-1">Cliente Persona Natural</h5>
                    <!--Start encabezado-->
                    <div class="col-md-12" >
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                                
                            </div>
                        </div>
                    </div>
                    <!--End encabezado-->
                    <form method="POST" action="../negocio/NgMatrizRiesgoNatural.php" id ="myForm">
                    <div class="card mb-4">
                        <div class="col-md-12" >
                            <div class="form-row">
                                <div class="form-group col-md-3" >
                                    <label class="large mb-2" for="matriz" ><b>Seleccione la matriz a usar</b></label>
                                    <select  class="form-control form-control-md" id="matriz" name="matriz">
                                        <option selected disabled>Seleccione..</option>
                                        <option value="5">Guatemala</option>
                                        <option value="3">El Salvador</option>
                                        <option value="4">Honduras</option>
                                        <option value="1">Nicaragua</option>
                                        <option value="6">Costa Rica</option>
                                        <option value="2">Panamá</option>
                                    </select>       
                                </div>                       
                            </div>
                        </div>
                    </div>
                    
                    

                    <!--START BOX MATRIZ >>PANAMÁ-->
                    <div class="myDiv" id="showMatriz">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                    <label class="large mb-2" for="razonSocial_MR_N" ><b>Razón o Denominación Social del Cliente</b></label>
                                                    <select  class="form-control form-control-md" id="razonSocial_MR_N" name="razonSocial_MR_N" >
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($matrizERG->listarPicNatural() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idpic') ?>"> <?php echo $r->__GET('nombreCliente') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>       
                                                </div>  
                                                <div class="form-group col-md-3">
                                                    <label class="large mb-2" for="fecha_MR_N" ><b>Fecha</b></label>
                                                    <input type="date" class="form-control form-control-md" id="fecha_MR_N" name="fecha_MR_N" 
                                                    value="<?php echo (new DateTime())->format('Y-m-d'); ?>" autocomplete="off" disabled>
                                                </div>          
                                            </div>
                                        </div>
                                        <hr>

                                        <!--Start Ubicación Geografica-->
                                        <div class="col-md-3" >
                                            <div class="form-row">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default" ><b>Ubicación Geográfica</b></span>
                                                    </div>
                                                        <input type="text" class="form-control" aria-label="Default" 
                                                        aria-describedby="inputGroup-sizing-default" placeholder="30%"
                                                        id="ubicacionGeneral_MR_N" name="ubicacionGeneral_MR_N" disabled>
                                                        
                                                        <input type="hidden" name="ubicacionG_MR_N_Val" id="ubicacionG_MR_N_Val" value="0.30" />

                                                </div>                                       
                                            </div>
                                        </div>
                                                                        
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="large mb-1" for="constitucion_MR_N" ><b>Variable</b></label>  
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <label class="large mb-1" for="indicador_Constitucion_MR_N" ><b>Indicador</b></label>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="large mb-1" for="sbVariable_Constitucion_MR_N" ><b>Subvariable</b></label>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <label class="large mb-1" for="calificacion_Constitucion_MR_N" ><b>Calificación</b></label>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="large mb-1" for="pesoVariable_Constitucion_MR_N" ><b>Peso variable</b></label>
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    
                                                </div>  
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3" >
                                                    <label class="form-control form-control-sm"><b> Lugar de Nacimiento</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <select id="indicador_LNacimiento_MR_N" name="indicador_LNacimiento_MR_N" class="form-control form-control-sm" >
                                                    <option selected disabled>Elegir...</option>   
                                                    <option  >Nacional</option>
                                                    <option  >Internacional</option>
                                                                                                     
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_LNacimiento_MR_N" name="sbVariable_LNacimiento_MR_N" class="form-control form-control-sm"  required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_Constitucion_MR_N" name="calificacion_Constitucion_MR_N" 
                                                        placeholder="Calificación" style="text-align: center; " disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_LNacimiento_MR_N" name="pesoVariable_LNacimiento_MR_N" 
                                                        placeholder="25%" style="text-align: center; " disabled>
                                                        <input type="hidden" name="PV_LNacimiento_MR_N_Val" id="PV_LNacimiento_MR_N_Val" value="0.25" />
                                                        
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_LNacimiento_MR_N" name="valor_LNacimiento_MR_N" 
                                                        placeholder="Valor" style="text-align: center; " disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b> Nacionalidad</b></label>
                                                    
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <select id="indicador_Nacionalidad_MR_N" name="indicador_Nacionalidad_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        <option  >Nacional</option>
                                                        <option  >Internacional</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_Nacionalidad_MR_N" name="sbVariable_Nacionalidad_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_Nacionalidad_MR_N" name="calificacion_Nacionalidad_MR_N" 
                                                        placeholder="Calificación"  style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_Nacionalidad_MR_N" name="pesoVariable_Nacionalidad_MR_N" 
                                                        placeholder="35%" style="text-align: center;" disabled>

                                                        <input type="hidden" name="PV_Nacionalidad_MR_N_Val" id="PV_Nacionalidad_MR_N_Val" value="0.35" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_Nacionalidad_MR_N" name="valor_Nacionalidad_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b> Lugar de Residencia</b></label>
                                                    
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <select id="indicador_LResidencia_MR_N" name="indicador_LResidencia_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        <option  >Nacional</option>
                                                        <option  >Internacional</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_LResidencia_MR_N" name="sbVariable_LResidencia_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_LResidencia_MR_N" name="calificacion_LResidencia_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_LResidencia_MR_N" name="pesoVariable_LResidencia_MR_N" 
                                                        placeholder="40%" style="text-align: center;" disabled>
                                                       
                                                        <input type="hidden" name="PV_LResidencia_MR_N_Val" id="PV_LResidencia_MR_N_Val" value="0.40" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_LResidencia_MR_N" name="valor_LResidencia_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    
                                                </div>  
                                                <div class="form-group col-md-2">    
                                                <input type="text" class="form-control form-control-sm" id="pesoFinal_AG_MR_N" name="pesoFinal_AG_MR_N" 
                                                    placeholder="Peso final" autocomplete="off" disabled>                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                <input type="text" class="form-control form-control-sm" id="valorFinal_AG_MR_N" name="valorFinal_AG_MR_N" 
                                                    placeholder="Valor final" autocomplete="off" disabled>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    
                                                </div>  
                                            </div>
                                        </div>
                                        <hr>
                                    <!--End Ubicación Geografica-->

                                    <!--Start Actividad Economica-->
                                        <div class="col-md-3" >
                                            <div class="form-row">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default" ><b>Actividad Económica</b></span>
                                                    </div>
                                                        <input type="text" class="form-control" aria-label="Default" 
                                                        aria-describedby="inputGroup-sizing-default"placeholder="35%" 
                                                        id="ACGeneral_MR_N" name="ACGeneral_MR_N" disabled>
                                                        <input type="hidden" name="ACGeneral_MR_N_Val" id="ACGeneral_MR_N_Val" value="0.35" />
                                                </div>                                       
                                            </div>
                                        </div>
                                    <!--End Actividad Economica-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b> Categoría</b></label>
                                                        
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" placeholder="-" style="text-align: center;" disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_Categoria_MR_N" name="sbVariable_Categoria_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_Categoria_MR_N" name="calificacion_Categoria_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_Categoria_MR_N" name="pesoVariable_Categoria_MR_N" 
                                                        placeholder="10%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_Categoria_MR_N_Val" id="PV_Categoria_MR_N_Val" value="0.10" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_Categoria_MR_N" name="valor_Categoria_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b> Profesión (Ocupación)</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <select id="indicador_Profesion_MR_N" name="indicador_Profesion_MR_N" class="form-control form-control-sm" title="Digite el número que aparece a la par de la actividad detallada en el Aviso de Operaciones." disabled>
                                                        <option selected disabled>Elegir...</option>
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_Profesion_MR_N" name="sbVariable_Profesion_MR_N" class="form-control form-control-sm" disabled>
                                                        <option selected disabled>Complete indicador</option>
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_Profesion_MR_N" name="calificacion_Profesion_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_Profesion_MR_N" name="pesoVariable_Profesion_MR_N" 
                                                        placeholder="20%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_Profesion_MR_N_Val" id="PV_Profesion_MR_N_Val" value="0.20" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_Profesion_MR_N" name="valor_Profesion_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b>Información del Empleo/Empresa</b></label>

                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <select id="indicador_Empleo_MR_N" name="indicador_Empleo_MR_N" class="form-control form-control-sm" title="Digite el número que aparece a la par de la actividad detallada en el Aviso de Operaciones." disabled>
                                                        <option selected disabled>Elegir...</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-2">                                                    
                                                    <select id="sbVariable_Empleo_MR_N" name="sbVariable_Empleo_MR_N" class="form-control form-control-sm" disabled>
                                                        <option selected disabled>Complete indicador</option>
                                                    </select>

                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_Empleo_MR_N" name="calificacion_Empleo_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_Empleo_MR_N" name="pesoVariable_Empleo_MR_N" 
                                                        placeholder="30%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_Empleo_MR_N_Val" id="PV_Empleo_MR_N_Val" value="0.30" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_Empleo_MR_N" name="valor_Empleo_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b> Lugar Actividad Económica</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <select id="indicador_LActividadEconomica_MR_N" name="indicador_LActividadEconomica_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        <option value="1">Nacional</option>
                                                        <option value="2">Internacional</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_LActividadEconomica_MR_N" name="sbVariable_LActividadEconomica_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_LActividadEconomica_MR_N" name="calificacion_LActividadEconomica_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_LActividadEconomica_MR_N" name="pesoVariable_LActividadEconomica_MR_N" 
                                                        placeholder="30%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_LActividadEconomica_MR_N_Val" id="PV_LActividadEconomica_MR_N_Val" value="0.30" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_LActividadEconomica_MR_N" name="valor_LActividadEconomica_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>


                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm" title="Resultados negativos en motores de búsqueda y coincidencias en listas restrictivas"><b>Resultados en busquedas</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" placeholder="-" style="text-align: center;" disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_ResultadosBusquedas_MR_N" name="sbVariable_ResultadosBusquedas_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        <option  value="3">Sí</option>
                                                        <option  value="1">No</option>
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_ResultadosBusquedas_MR_N" name="calificacion_ResultadosBusquedas_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_ResultadosBusquedas_MR_N" name="pesoVariable_ResultadosBusquedas_MR_N" 
                                                        placeholder="5%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_ResultadosBusquedas_MR_N_Val" id="PV_ResultadosBusquedas_MR_N_Val" value="0.05" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_ResultadosBusquedas_MR_N" name="valor_ResultadosBusquedas_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b>Condición PEP</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                <input type="text" class="form-control form-control-sm" placeholder="-" style="text-align: center;" disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_CondicionPep_MR_N" name="sbVariable_CondicionPep_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_CondicionPep_MR_N" name="calificacion_CondicionPep_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_CondicionPep_MR_N" name="pesoVariable_CondicionPep_MR_N" 
                                                        placeholder="5%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_CondicionPep_MR_N_Val" id="PV_CondicionPep_MR_N_Val" value="0.05" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_CondicionPep_MR_N" name="valor_CondicionPep_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    
                                                </div>  
                                                <div class="form-group col-md-2">    
                                                <input type="text" class="form-control form-control-sm" id="pesoFinal_AC_MR_N" name="pesoFinal_AC_MR_N" 
                                                    placeholder="Peso final" autocomplete="off" disabled>                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                <input type="text" class="form-control form-control-sm" id="valorFinal_AC_MR_N" name="valorFinal_AC_MR_N" 
                                                    placeholder="Valor final" autocomplete="off" disabled>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    
                                                </div>  
                                            </div>
                                        </div>
                                        <hr>
                                        <!--End Actividad Economica-->

                                        <!--Start Producto-->
                                        <div class="col-md-3" >
                                            <div class="form-row">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default" ><b>Producto </b></span>
                                                    </div>
                                                        <input type="text" class="form-control" aria-label="Default" 
                                                        aria-describedby="inputGroup-sizing-default"placeholder="30%" 
                                                        id="productoGeneral_MR_N" name="productoGeneral_MR_N" disabled>
                                                        <input type="hidden" name="productoGeneral_MR_N_Val" id="productoGeneral_MR_N_Val" value="0.30" />
                                                </div>                                       
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b>Producto Solicitado</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <select id="indicador_ProductoSolicitado_MR_N" name="indicador_ProductoSolicitado_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        <?php foreach($matrizERG->listarCategoriaProducto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idCategoriaProducto') ?>"> <?php echo $r->__GET('nombreCategoriaProducto') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_ProductoSolicitado_MR_N" name="sbVariable_ProductoSolicitado_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_ProductoSolicitado_MR_N" name="calificacion_ProductoSolicitado_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_ProductoSolicitado_MR_N" name="pesoVariable_ProductoSolicitado_MR_N" 
                                                        placeholder="40%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_ProductoSolicitado_MR_N_Val" id="PV_ProductoSolicitado_MR_N_Val" value="0.40" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_ProductoSolicitado_MR_N" name="valor_ProductoSolicitado_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b>Monto</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" placeholder="-" style="text-align: center;" disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_Monto_MR_N" name="sbVariable_Monto_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        <?php foreach($matrizERG->listarMonto() as $r): ?>
                                                            <option value="<?php echo $r->__GET('calificacion') ?>"> <?php echo $r->__GET('descripcion') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_Monto_MR_N" name="calificacion_Monto_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_Monto_MR_N" name="pesoVariable_Monto_MR_N" 
                                                        placeholder="60%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_Monto_MR_N_Val" id="PV_Monto_MR_N_Val" value="0.60" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_Monto_MR_N" name="valor_Monto_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    
                                                </div>  
                                                <div class="form-group col-md-2">    
                                                <input type="text" class="form-control form-control-sm" id="pesoFinal_Monto_MR_N" name="pesoFinal_Monto_MR_N" 
                                                    placeholder="Peso final" autocomplete="off" disabled>                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                <input type="text" class="form-control form-control-sm" id="valorFinal_Monto_MR_N" name="valorFinal_Monto_MR_N" 
                                                    placeholder="Valor final" autocomplete="off" disabled>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    
                                                </div>  
                                            </div>
                                        </div>
                                        <hr>
                                        <!--End Producto-->

                                        <!--Start Canal de Pago-->
                                        <div class="col-md-3" >
                                            <div class="form-row">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default" ><b>Canal de pago</b></span>
                                                    </div>
                                                        <input type="text" class="form-control" aria-label="Default" 
                                                        aria-describedby="inputGroup-sizing-default"placeholder="30%" 
                                                        id="canalPago_MR_N" name="canalPago_MR_N" disabled>
                                                        <input type="hidden" name="canalPago_MR_N_Val" id="canalPago_MR_N_Val" value="0.30" />
                                                </div>                                       
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b>Forma de Pago</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" placeholder="-" style="text-align: center;" disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_FormaPago_MR_N" name="sbVariable_FormaPago_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_FormaPago_MR_N" name="calificacion_FormaPago_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_FormaPago_MR_N" name="pesoVariable_FormaPago_MR_N" 
                                                        placeholder="50%" style="text-align: center;" disabled>
                                                        <input type="hidden" name="PV_FormaPago_MR_N_Val" id="PV_FormaPago_MR_N_Val" value="0.50" />
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_FormaPago_MR_N" name="valor_FormaPago_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="form-control form-control-sm"><b>Origen de los Recursos</b></label>
                                                </div>  
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" placeholder="-" style="text-align: center;" disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <select id="sbVariable_OrigenesRecursos_MR_N" name="sbVariable_OrigenesRecursos_MR_N" class="form-control form-control-sm" required>
                                                        <option selected disabled>Elegir...</option>
                                                        
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="calificacion_OrigenesRecursos_MR_N" name="calificacion_OrigenesRecursos_MR_N" 
                                                        placeholder="Calificación" style="text-align: center;" disabled>
                                                    
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="pesoVariable_OrigenesRecursos_MR_N" name="pesoVariable_OrigenesRecursos_MR_N" 
                                                        placeholder="50%" style="text-align: center;" disabled>
                                                    <input type="hidden" name="PV_OrigenesRecursos_MR_N_Val" id="PV_OrigenesRecursos_MR_N_Val" value="0.50" />
                                                        
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-sm" id="valor_OrigenesRecursos_MR_N" name="valor_OrigenesRecursos_MR_N" 
                                                        placeholder="Valor" style="text-align: center;" disabled>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    
                                                </div>  
                                                <div class="form-group col-md-2">    
                                                <input type="text" class="form-control form-control-sm" id="pesoFinal_OrigenesRecursos_MR_N" name="pesoFinal_OrigenesRecurso_MR_N" 
                                                    placeholder="Peso final" autocomplete="off" disabled>                                                
                                                </div>
                                                <div class="form-group col-md-2">
                                                <input type="text" class="form-control form-control-sm" id="valorFinal_OrigenesRecursos_MR_N" name="valorFinal_OrigenesRecursos_MR_N" 
                                                    placeholder="Valor final" autocomplete="off" disabled>
                                                </div> 
                                                <div class="form-group col-md-2">
                                                    
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    
                                                </div>  
                                            </div>
                                        </div>
                                        <hr>
                                        <!--End Forma de Pago-->

                                        <!-- Start Calificación-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                <!---START SET ALL DATA TEXT-->
                                                    <input type="hidden" name="idCliente" id="idCliente" />
                                                    <input type="hidden" name="cliente" id="cliente" />
                                                    <input type="hidden" name="lugarNacimiento" id="lugarNacimiento" />
                                                    <input type="hidden" name="lugarNacionalidad" id="lugarNacionalidad" />
                                                    <input type="hidden" name="lugarResidencia" id="lugarResidencia" />
                                                    <input type="hidden" name="categoria" id="categoria" />
                                                    <input type="hidden" name="profesion" id="profesion" />
                                                    <input type="hidden" name="actividadEmpleo" id="actividadEmpleo" />
                                                    <input type="hidden" name="lugarActividadEconomica" id="lugarActividadEconomica" />
                                                    <input type="hidden" name="resultadosBusquedas" id="resultadosBusquedas" />
                                                    <input type="hidden" name="condicionPEP" id="condicionPEP" />
                                                    <input type="hidden" name="productoSolicitado" id="productoSolicitado" />
                                                    <input type="hidden" name="monto" id="monto" />
                                                    <input type="hidden" name="formaPago" id="formaPago" />
                                                    <input type="hidden" name="origenRecursos" id="origenRecursos" />
                                                    <input type="hidden" name="riesgoCliente" id="riesgoCliente" />
                                                                                                        
                                                    <input type="hidden" name="tipoCliente" id="tipoCliente" value="Natural"/>
                                                    <input type="hidden" name="paisMatriz" id="paisMatriz" />
                                                    

                                                 <!---END SET ALL DATA TEXT-->
                                                </div>  
                                                <div class="form-group col-md-2">    
                                                                                                
                                                </div>
                                                <div class="form-group col-md-4" style="text-align: right;  padding: 8px ; " >
                                                    <span><b style="font-size: 18px;">Riesgo Inherente del Cliente:</b></span>

                                                </div>
                                                    
                                                <div class="form-group col-md-2"  id="riesgo" name="riesgo" style="text-align: center;  padding: 8px 0; " >
                                                    <label><b id ="etiqueta" name="etiqueta">Riesgo</b></label>   
                                                </div>    
                                                <div class="form-group col-md-1">
                                                    <input type="text" class="form-control form-control-lg" id="puntuacionFinal_MR_N" name="puntuacionFinal_MR_N" 
                                                        placeholder="Valor" autocomplete="off" disabled>
                                                </div>  
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- End calificación -->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="small mb-1" for="fechaProxRevision_ME" ><b>Fecha Próxima Revisión</b></label>
                                                    <input type="date" class="form-control form-control-lg" id="fechaProxRevision_ME" name="fechaProxRevision_ME" 
                                                        autocomplete="off" required> 
                                                </div>  
                                            </div>
                                        </div>

                                        <!--Start buttons-->
                                        <pre>
                                        </pre>                                        
                                            <div class="col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <button type="submit" class="btn btn-primary col-md-7" >Guardar Matriz</button>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-success col-md-7" onclick="multiplicar()">Calcular</button>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-danger col-md-7" onclick="Reset()">Limpiar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--End buttons -->  

                                    </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END BOX MATRIZ >>PANAMÁ-->                   
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
    <script src="fontawesome5.15.1/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <!--SCRIPT PARA LAS FUNCIONES DE CAMBIO-->
    <script type="text/javascript" src="./Jscript/Panama/Natural/selects.js"></script>
    <script type="text/javascript" src="./Jscript/Panama/Natural/Reset.js"></script>
    <!--<script type="text/javascript" src="./Jscript/Panama/Natural/Multiplicar.js"></script>-->
   
    <script>
        $(document).ready(function(){
            $('#matriz').on('change', function(){
                
                $("#showMatriz").show();
                
            });
        });
    </script>

    <script>
        /**********APARTADO UBICACION GEOGRAFICA**********/
        $(document).ready(function(){
            $("#razonSocial_MR_N").on('change', function () {
                $("#razonSocial_MR_N option:selected").each(function () {
                    
                    //alert($('select[id=razonSocial_MR_N]').val());
                    //alert ($('select[id=matriz]').val())

                    var id_pic = $(this).val();
                    var id_matriz = $("#matriz").val();
                    //alert (id_matriz);
                        // SCRIPT PARA SABER EL LUGAR DE NACIMIENTO -->
                        $.post("./JQuerys/Panama/MRN/jQ_UbiGeo_LNacimiento_PN.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                            $("#indicador_LNacimiento_MR_N").html(data);
                        });	

                        $.post("./JQuerys/Panama/MRN/jQ_UbiGeo_SV_LN_PN.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                            $("#sbVariable_LNacimiento_MR_N").html(data);
                            $('#calificacion_Constitucion_MR_N').val($("#sbVariable_LNacimiento_MR_N").val());  
                            
                        }); 

                        //SCRIPT PARA SABER LA NACIONALIDAD -->
                        $.post("./JQuerys/Panama/MRN/jQ_UbiGeo_Nacionalidad_PN.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                            $("#indicador_Nacionalidad_MR_N").html(data);
                        
                        });	

                        $.post("./JQuerys/Panama/MRN/jQ_UbiGeo_SV_NA_PN.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                            $("#sbVariable_Nacionalidad_MR_N").html(data);

                            $('#calificacion_Nacionalidad_MR_N').val($("#sbVariable_Nacionalidad_MR_N").val());

                        });
                        
                        //SCRIPT PARA SABER EL LUGAR DE RESIDENCIA-->
                        $.post("./JQuerys/Panama/MRN/jQ_UbiGeo_LResidencia_PN.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                            $("#indicador_LResidencia_MR_N").html(data);
                        
                        });	

                        $.post("./JQuerys/Panama/MRN/jQ_UbiGeo_SV_LR_PN.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                            $("#sbVariable_LResidencia_MR_N").html(data);
                            
                            $('#calificacion_LResidencia_MR_N').val($("#sbVariable_LResidencia_MR_N").val());
                        });
                        
                        //EN CONSTRUCCION
                        // SCRIPT PARA SABER EL LUGAR DE LA ACTIVIDAD ECONOMICA -->
                        
                        $.post("./JQuerys/Panama/MRN/jQ_UbiGeo_LActividadEconomica.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                            $("#indicador_LActividadEconomica_MR_N").html(data);
                        });	

                        
                        $.post("./JQuerys/Panama/MRN/jQ_UbiGeo_SV_LAC_PN.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                            $("#sbVariable_LActividadEconomica_MR_N").html(data);
                            $('#calificacion_LActividadEconomica_MR_N').val($("#sbVariable_LActividadEconomica_MR_N").val());  
                            
                        }); 
                        
                        //SCRIPT PARA LA CATEGORIA A LA QUE DE INGRESO (ASALARIADO/INDEPENDIENTE)>
                        
                        $.post("./JQuerys/Panama/MRN/jQ_ActEcono_SV_CatIngreso.php", { id_pic: id_pic }, function(data) {
                            $("#sbVariable_Categoria_MR_N").html(data);
                            
                            $('#calificacion_Categoria_MR_N').val($("#sbVariable_Categoria_MR_N").val());
                        });

                        //SCRIPT PARA OBTENER EL ID PARA LLAMADO DE CALIFICACIÓN
                        $.post("./JQuerys/Panama/MRN/jQ_ActEcono_CatOcup_PN.php", { id_pic: id_pic }, function(data) {
                            $("#indicador_Profesion_MR_N").html(data);
                            
                            //alert($('select[id=indicador_Profesion_MR_N]').val());
                            //$('#calificacion_ResultadosBusquedas_MR_J').val($("#sbVariable_ResultadosBusquedas_MR_J").val());
                        });

                        //AGREGANDO LA DESCRIPCION Y CALIFICACION DE LA ACTIVIDAD ECONOMICA - Ocupacion
                        $.post("./JQuerys/Panama/MRN/jQ_ActEcono_Profesion_PN.php", { id_pic: id_pic }, function(data) {
                            $("#sbVariable_Profesion_MR_N").html(data);
                            
                            //alert($('select[id=sbVariable_Profesion_MR_N]').val());

                            $('#calificacion_Profesion_MR_N').val($("#sbVariable_Profesion_MR_N").val());
                        });
                        
                        
                        //SCRIPT PARA OBTENER EL ID PARA LLAMADO DE CALIFICACIÓN -Empleo
                        $.post("./JQuerys/Panama/MRN/jQ_ActEcono_CodEmpleo_PN.php", { id_pic: id_pic }, function(data) {
                            $("#indicador_Empleo_MR_N").html(data);
                            
                            //$('#calificacion_ResultadosBusquedas_MR_J').val($("#sbVariable_ResultadosBusquedas_MR_J").val());
                        });

                        //AGREGANDO LA DESCRIPCION Y CALIFICACION DE LA ACTIVIDAD ECONOMICA
                        $.post("./JQuerys/Panama/MRN/jQ_ActEcono_Empleo_PN.php", { id_pic: id_pic }, function(data) {
                            $("#sbVariable_Empleo_MR_N").html(data);
                            
                            $('#calificacion_Empleo_MR_N').val($("#sbVariable_Empleo_MR_N").val());
                        });

                        //SCRIPT PARA AGREGAR EL RESULTADO DE BUSQUEDA 
                        $.post("./JQuerys/Panama/MRN/jQ_ActEcono_ResultBusq_PN.php", { id_pic: id_pic }, function(data) {
                            $("#sbVariable_ResultadosBusquedas_MR_N").html(data);
                            
                            //alert($('select[id=sbVariable_Profesion_MR_N]').val());

                            $('#calificacion_ResultadosBusquedas_MR_N').val($("#sbVariable_ResultadosBusquedas_MR_N").val());
                        });

                });    
            });

            $("#sbVariable_LNacimiento_MR_N").on('change', function () {
                $('#calificacion_Constitucion_MR_N').val($(this).val());

            }); 
            $("#sbVariable_Nacionalidad_MR_N").on('change', function () {
                $('#calificacion_Nacionalidad_MR_N').val($(this).val());
            });
            $("#sbVariable_LResidencia_MR_N").on('change', function () {
                $('#calificacion_LResidencia_MR_N').val($(this).val());
            });
        });
            
    </script>

    <script>
        function multiplicar(){
    //START UBICACION  GEOGRAFICA


    Fila1 = document.getElementById("calificacion_Constitucion_MR_N").value * document.getElementById("PV_LNacimiento_MR_N_Val").value;
    document.getElementById("valor_LNacimiento_MR_N").value =  Number.parseFloat(Fila1).toFixed(2);

    Fila2 = document.getElementById("calificacion_Nacionalidad_MR_N").value * document.getElementById("PV_Nacionalidad_MR_N_Val").value;
    document.getElementById("valor_Nacionalidad_MR_N").value =  Number.parseFloat(Fila2).toFixed(2);

    Fila3 = document.getElementById("calificacion_LResidencia_MR_N").value * document.getElementById("PV_LResidencia_MR_N_Val").value;
    document.getElementById("valor_LResidencia_MR_N").value =  Number.parseFloat(Fila3).toFixed(2);

    UbiGeoSuma= Fila1 + Fila2 + Fila3;
    document.getElementById("pesoFinal_AG_MR_N").value = Number.parseFloat(UbiGeoSuma).toFixed(2);
    
    UbiGeoValFinal= document.getElementById("pesoFinal_AG_MR_N").value * document.getElementById("ubicacionG_MR_N_Val").value;
    document.getElementById("valorFinal_AG_MR_N").value = Number.parseFloat(UbiGeoValFinal).toFixed(2);


    //START ACTIVIDAD ECONOMICA
    Fila4 = document.getElementById("calificacion_Categoria_MR_N").value * document.getElementById("PV_Categoria_MR_N_Val").value;
    document.getElementById("valor_Categoria_MR_N").value =  Number.parseFloat(Fila4).toFixed(2);

    Fila5 = document.getElementById("calificacion_Profesion_MR_N").value * document.getElementById("PV_Profesion_MR_N_Val").value;
    document.getElementById("valor_Profesion_MR_N").value =  Number.parseFloat(Fila5).toFixed(2);

    Fila6 = document.getElementById("calificacion_Empleo_MR_N").value * document.getElementById("PV_Empleo_MR_N_Val").value;
    document.getElementById("valor_Empleo_MR_N").value =  Number.parseFloat(Fila6).toFixed(2);

    Fila7 = document.getElementById("calificacion_LActividadEconomica_MR_N").value * document.getElementById("PV_LActividadEconomica_MR_N_Val").value;
    document.getElementById("valor_LActividadEconomica_MR_N").value =  Number.parseFloat(Fila7).toFixed(2);

    Fila8 = document.getElementById("calificacion_ResultadosBusquedas_MR_N").value * document.getElementById("PV_ResultadosBusquedas_MR_N_Val").value;
    document.getElementById("valor_ResultadosBusquedas_MR_N").value =  Number.parseFloat(Fila8).toFixed(2);

    Fila9 = document.getElementById("calificacion_CondicionPep_MR_N").value * document.getElementById("PV_CondicionPep_MR_N_Val").value;
    document.getElementById("valor_CondicionPep_MR_N").value =  Number.parseFloat(Fila9).toFixed(2);

    ActEcoSuma= Fila4  + Fila5 + Fila6 + Fila7 + Fila8 + Fila9;
    document.getElementById("pesoFinal_AC_MR_N").value = Number.parseFloat(ActEcoSuma).toFixed(2);
    
    ActEcoValFinal= document.getElementById("pesoFinal_AC_MR_N").value * document.getElementById("ACGeneral_MR_N_Val").value;
    document.getElementById("valorFinal_AC_MR_N").value = Number.parseFloat(ActEcoValFinal).toFixed(2);

    //START PRODUCTO
    Fila10 = document.getElementById("calificacion_ProductoSolicitado_MR_N").value * document.getElementById("PV_ProductoSolicitado_MR_N_Val").value;
    document.getElementById("valor_ProductoSolicitado_MR_N").value =  Number.parseFloat(Fila10).toFixed(2);

    Fila11 = document.getElementById("calificacion_Monto_MR_N").value * document.getElementById("PV_Monto_MR_N_Val").value;
    document.getElementById("valor_Monto_MR_N").value =  Number.parseFloat(Fila11).toFixed(2);

    ProductoSuma= Fila10  + Fila11 ;
    document.getElementById("pesoFinal_Monto_MR_N").value = Number.parseFloat(ProductoSuma).toFixed(2);
    
    ProductoValFinal= document.getElementById("pesoFinal_Monto_MR_N").value * document.getElementById("productoGeneral_MR_N_Val").value;
    document.getElementById("valorFinal_Monto_MR_N").value = Number.parseFloat(ProductoValFinal).toFixed(2);

    //START CANAL DE PAGO

    Fila12 = document.getElementById("calificacion_FormaPago_MR_N").value * document.getElementById("PV_FormaPago_MR_N_Val").value;
    document.getElementById("valor_FormaPago_MR_N").value =  Number.parseFloat(Fila12).toFixed(2);

    Fila13 = document.getElementById("calificacion_OrigenesRecursos_MR_N").value * document.getElementById("PV_OrigenesRecursos_MR_N_Val").value;
    document.getElementById("valor_OrigenesRecursos_MR_N").value =  Number.parseFloat(Fila13).toFixed(2);

    CpagoSuma= Fila12  + Fila13 ;
    document.getElementById("pesoFinal_OrigenesRecursos_MR_N").value = Number.parseFloat(CpagoSuma).toFixed(2);
    
    CpagoValFinal= document.getElementById("pesoFinal_OrigenesRecursos_MR_N").value * document.getElementById("canalPago_MR_N_Val").value;
    document.getElementById("valorFinal_OrigenesRecursos_MR_N").value = Number.parseFloat(CpagoValFinal).toFixed(2);

    //TRATABAJANDO EN EL RIESGO FINAL
    var RiesgoFinal;
    RiesgoFinal = UbiGeoValFinal + ActEcoValFinal + ProductoValFinal + CpagoValFinal ;
    m = document.getElementById("puntuacionFinal_MR_N").value = Number.parseFloat(RiesgoFinal).toFixed(2);
    //alert (m);

    if (RiesgoFinal>= 0.01 && RiesgoFinal<=1.99 ){
        document.getElementById("riesgo").style.backgroundColor = "#00b050";
        s= document.getElementById('etiqueta').innerHTML = 'Bajo';
        document.getElementById("riesgoCliente").value = s;
        //alert(m);

    }else if (RiesgoFinal>= 2  && RiesgoFinal<=2.99) {
        document.getElementById("riesgo").style.backgroundColor = "#ffff00";
        s= document.getElementById('etiqueta').innerHTML = 'Medio';
        document.getElementById("riesgoCliente").value = s;
        //alert(m);

    } else if(RiesgoFinal>=3){
        document.getElementById("riesgo").style.backgroundColor = "#ff0000";
        s= document.getElementById('etiqueta').innerHTML = 'Alto';
        document.getElementById("riesgoCliente").value = s;
    

    }
    else{
        document.getElementById("riesgo").style.backgroundColor = "#808080";
        
    }

    //ESTABLECER PARAMETROS DE TIPO TEXTO PARA LA MATRIZ DE INFORME GENERAL
    b = document.getElementById("razonSocial_MR_N");
    cliente = b.options[b.selectedIndex].text;
    document.getElementById("cliente").value = cliente;
    
    a = document.getElementById("razonSocial_MR_N");
    idcliente = a.options[a.selectedIndex].value;
    document.getElementById("idCliente").value = idcliente;
    
    c = document.getElementById("sbVariable_LNacimiento_MR_N");
    lugarNacimiento = c.options[c.selectedIndex].text;
    document.getElementById("lugarNacimiento").value = lugarNacimiento;

    d = document.getElementById("sbVariable_Nacionalidad_MR_N");
    lugarNacionalidad = d.options[d.selectedIndex].text;
    document.getElementById("lugarNacionalidad").value = lugarNacionalidad;
    
    e = document.getElementById("sbVariable_LResidencia_MR_N");
    lugarResidencia = e.options[e.selectedIndex].text;
    document.getElementById("lugarResidencia").value = lugarResidencia;

    f = document.getElementById("sbVariable_Categoria_MR_N");
    categoria = f.options[f.selectedIndex].text;
    document.getElementById("categoria").value = categoria;

    g = document.getElementById("sbVariable_Profesion_MR_N");
    profesion = g.options[g.selectedIndex].text;
    document.getElementById("profesion").value = profesion;

    h = document.getElementById("sbVariable_Empleo_MR_N");
    actividadEmpleo = h.options[h.selectedIndex].text;
    document.getElementById("actividadEmpleo").value = actividadEmpleo;

    i = document.getElementById("sbVariable_LActividadEconomica_MR_N");
    lugarActividadEconomica = i.options[i.selectedIndex].text;
    document.getElementById("lugarActividadEconomica").value = lugarActividadEconomica;

    j = document.getElementById("sbVariable_ResultadosBusquedas_MR_N");
    resultadosBusquedas = j.options[j.selectedIndex].text;
    document.getElementById("resultadosBusquedas").value = resultadosBusquedas;

    k = document.getElementById("sbVariable_CondicionPep_MR_N");
    condicionPEP = k.options[k.selectedIndex].text;
    document.getElementById("condicionPEP").value = condicionPEP;

    l = document.getElementById("sbVariable_ProductoSolicitado_MR_N");
    productoSolicitado = l.options[l.selectedIndex].text;
    document.getElementById("productoSolicitado").value = productoSolicitado;

    o = document.getElementById("sbVariable_Monto_MR_N");
    monto = o.options[o.selectedIndex].text;
    document.getElementById("monto").value = monto;

    p = document.getElementById("sbVariable_FormaPago_MR_N");
    formaPago = p.options[p.selectedIndex].text;
    document.getElementById("formaPago").value = formaPago;

    q = document.getElementById("sbVariable_OrigenesRecursos_MR_N");
    origenRecursos = q.options[q.selectedIndex].text;
    document.getElementById("origenRecursos").value = origenRecursos;

    r = document.getElementById("sbVariable_OrigenesRecursos_MR_N");
    origenRecursos = r.options[r.selectedIndex].text;
    document.getElementById("origenRecursos").value = origenRecursos;

    z = document.getElementById("matriz");
    paisMatriz = z.options[z.selectedIndex].text;
    //alert (paisMatriz);
    document.getElementById("paisMatriz").value = paisMatriz;


       //alert ("ERROR CODE 404 NOT FOUND RIESGO");
   
        riesgo = document.getElementById("riesgoCliente").value;
        //alert (riesgo);
          
          inicio=document.getElementById("fecha_MR_N").value;
       //alert (inicio);
          if (riesgo == "Bajo"){
              start = new Date(inicio);
              start.setFullYear(start.getFullYear() + 5);          
              startf = start.toISOString().slice(0,10).replace("/-/","/");
              document.getElementById("fechaProxRevision_ME").value= startf;
          }

          if (riesgo == "Medio"){
              inicio=document.getElementById("fecha_MR_N").value;
              start = new Date(inicio);
              start.setFullYear(start.getFullYear() + 2);          
              startf = start.toISOString().slice(0,10).replace("/-/","/");
              document.getElementById("fechaProxRevision_ME").value= startf;
          }

          if (riesgo == "Alto"){
              inicio=document.getElementById("fecha_MR_N").value;
              start = new Date(inicio);
              start.setFullYear(start.getFullYear() + 1);          
              startf = start.toISOString().slice(0,10).replace("/-/","/");
              document.getElementById("fechaProxRevision_ME").value= startf;
          }       
}
    </script>
    

</body>
</html>
