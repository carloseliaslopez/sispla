<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/Pic.php';
include '../Entidades/Juridio/Accionistas.php';
include '../Entidades/Juridio/ActividadEconomica.php';
include '../Entidades/Juridio/BeneficiariosFinales.php';
include '../Entidades/Juridio/DatosClienteJuridicoPic.php';
include '../Entidades/Juridio/DatosRepresentanteLegal.php';
include '../Entidades/Juridio/PrincipalesClientes.php';
include '../Entidades/Juridio/PrincipalesProveedores.php';


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

include '../Entidades/Anexos/BusquedaRes.php';
include '../Entidades/Anexos/CategoriaSalario.php';
include '../Entidades/Anexos/Constitucion.php';
include '../Entidades/Anexos/TipoPerJuridica.php';
include '../Entidades/Anexos/vw_InteresInfo_matriz.php';
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

$combos = new DtCombos();

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
        <script src="fontawesome5.15.1/js/all.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css"  rel="stylesheet"/>
       
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
                        <h5 id="h1Informe" name= "h1Informe"  class="mt-1">Cliente Persona Jurídica</h5>
                        <!--Start encabezado-->
                        <div class="col-md-12" >
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                                    
                                </div>
                            </div>
                        </div>
                        <!--End encabezado-->
                        <form method="POST" action="../negocio/NgMatrizRiesgoJuridico.php" id="myForm" >
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
                                                        <input type="hidden" name="idCli_PN" id="idCli_PN" />
                                                        <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>

                                                        <label class="large mb-2" for="razonSocial_MR_J" ><b>Razón o Denominación Social del Cliente</b></label>
                                                        <select  class="form-control form-control-md" id="razonSocial_MR_J" name="razonSocial_MR_J" >
                                                            <option selected disabled>Selecione un elemento </option>
                                                                <?php foreach($matrizERG->listarPicJuridico() as $r): ?>
                                                                    <option value="<?php echo $r->__GET('idpic') ?>"> <?php echo $r->__GET('nombreCliente') ?></option>
                                                                <?php endforeach; ?>
                                                        </select> 
                                                    </div>  
                                                    <div class="form-group col-md-3">
                                                        <label class="large mb-2" for="fecha_MR_J" ><b>Fecha</b></label>
                                                        <input type="date" class="form-control form-control-md" id="fecha_MR_J" name="fecha_MR_J" 
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
                                                            aria-describedby="inputGroup-sizing-default"placeholder="30%" autocomplete="off" 
                                                            id="ubicacionGeneral_MR_J" name="ubicacionGeneral_MR_J" disabled>

                                                            <input type="hidden" name="ubicacionG_MR_N_Val" id="ubicacionG_MR_J_Val" value="0.30" />
                                                    </div>                                       
                                                </div>
                                            </div>
                                                                            
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="large mb-1" for="constitucion_MR_J" ><b>Variable</b></label>  
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <label class="large mb-1" for="indicador_Constitucion_MR_J" ><b>Indicador</b></label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="large mb-1" for="sbVariable_Constitucion_MR_J" ><b>Subvariable</b></label>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <label class="large mb-1" for="calificacion_Constitucion_MR_J" ><b>Calificación</b></label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="large mb-1" for="pesoVariable_Constitucion_MR_J" ><b>Peso variable</b></label>
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        
                                                    </div>  
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-control form-control-sm"><b> Lugar de Constitución</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <select id="indicador_Constitucion_MR_J" name="indicador_Constitucion_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option> 
                                                            <option >Nacional</option>
                                                            <option >Internacional</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_Constitucion_MR_J" name="sbVariable_Constitucion_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_Constitucion_MR_J" name="calificacion_Constitucion_MR_J" 
                                                            placeholder="Calificación" style="text-align: center; " disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_Constitucion_MR_J" name="pesoVariable_Constitucion_MR_J" 
                                                            placeholder="30%" style="text-align: center; " disabled>
                                                            <input type="hidden" name="PV_Constitucion_MR_J_Val" id="PV_Constitucion_MR_J_Val" value="0.30" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_Contitucion_MR_J" name="valor_Contitucion_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-control form-control-sm" title="Lugar de Nacimiento Representante Legal" ><b>Nacimiento Representante Legal</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <select id="indicador_NacimientoRL_MR_J" name="indicador_NacimientoRL_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            <option >Nacional</option>
                                                            <option >Internacional</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_NacimientoRL_MR_J" name="sbVariable_NacimientoRL_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_NacimientoRL_MR_J" name="calificacion_NacimientoRL_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_NacimientoRL_MR_J" name="pesoVariable_NacimientoRL_MR_J" 
                                                            placeholder="5%" style="text-align: center;" disabled>

                                                            <input type="hidden" name="PV_NacimientoRL_MR_J_Val" id="PV_NacimientoRL_MR_J_Val" value="0.05" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_NacimientoRL_MR_J" name="valor_NacimientoRL_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">                                                   
                                                        <label class="form-control form-control-sm" ><b>Nacionalidad Representante Legal</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <select id="indicador_NacionalidadRL_MR_J" name="indicador_NacionalidadRL_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            <option >Nacional</option>
                                                            <option >Internacional</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_NacionalidadRL_MR_J" name="sbVariable_NacionalidadRL_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_NacionalidadRL_MR_J" name="calificacion_NacionalidadRL_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_NacionalidadRL_MR_J" name="pesoVariable_NacionalidadRL_MR_J" 
                                                            placeholder="5%" style="text-align: center;" disabled>

                                                            <input type="hidden" name="PV_NacionalidadRL_MR_J_Val" id="PV_NacionalidadRL_MR_J_Val" value="0.05" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valorNacionalidadRL_MR_J" name="valorNacionalidadRL_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-control form-control-sm" title="Lugar de Residencia Representante Legal"><b> Resid. Representante Legal</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <select id="indicador_LResidenciaRL_MR_J" name="indicador_LResidenciaRL_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            <option >Nacional</option>
                                                            <option >Internacional</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_LResidenciaRL_MR_J" name="sbVariable_LResidenciaRL_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_LResidenciaRL_MR_J" name="calificacion_LResidenciaRL_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_LResidenciaRL_MR_J" name="pesoVariable_LResidenciaRL_MR_J" 
                                                            placeholder="10%" style="text-align: center;" disabled>
                                                            
                                                            <input type="hidden" name="PV_LResidenciaRL_MR_J_Val" id="PV_LResidenciaRL_MR_J_Val" value="0.10" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_LResidenciaRL_MR_J" name="valor_LResidenciaRL_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-control form-control-sm" title="Nacionalidad Accionista Mayoritario"><b>Nacionalidad Accionista</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <select id="indicador_NacionalidadAC_MR_J" name="indicador_NacionalidadAC_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            <option >Nacional</option>
                                                            <option >Internacional</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_NacionalidadAC_MR_J" name="sbVariable_NacionalidadAC_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_NacionalidadAC_MR_J" name="calificacion_NacionalidadAC_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_NacionalidadAC_MR_J" name="pesoVariable_NacionalidadAC_MR_J" 
                                                            placeholder="25%" style="text-align: center;" disabled>

                                                            <input type="hidden" name="PV_NacionalidadAC_MR_J_Val" id="PV_NacionalidadAC_MR_J_Val" value="0.25" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_NacionalidadAC_MR_J" name="valor_NacionalidadAC_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-control form-control-sm" title="Nacionalidad Beneficiario Final Mayoritario"><b>Nacionalidad Beneficiario Final</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <select id="indicador_NacionalidadBF_MR_J" name="indicador_NacionalidadBF_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            <option >Nacional</option>
                                                            <option >Internacional</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_NacionalidadBF_MR_J" name="sbVariable_NacionalidadBF_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_NacionalidadBF_MR_J" name="calificacion_NacionalidadBF_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_NacionalidadBF_MR_J" name="pesoVariable_NacionalidadBF_MR_J" 
                                                            placeholder="25%" style="text-align: center;" disabled>

                                                            <input type="hidden" name="PV_NacionalidadBF_MR_J_Val" id="PV_NacionalidadBF_MR_J_Val" value="0.25" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_NacionalidadBF_MR_J" name="valor_NacionalidadBF_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        
                                                    </div>  
                                                    <div class="form-group col-md-2">    
                                                    <input type="text" class="form-control form-control-sm" id="pesoFinal_AG_MR_J" name="pesoFinal_AG_MR_J" 
                                                        placeholder="Peso final" style="text-align: center;" disabled>                                                
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="valorFinal_AG_MR_J" name="valorFinal_AG_MR_J" 
                                                        placeholder="Valor final" style="text-align: center;" disabled>
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
                                                            aria-describedby="inputGroup-sizing-default"placeholder="35%" autocomplete="off" 
                                                            id="ACGeneral_MR_J" name="ACGeneral_MR_J" disabled>
                                                            
                                                            <input type="hidden" name="ACGeneral_MR_J_Val" id="ACGeneral_MR_J_Val" value="0.35" />
                                                    </div>                                       
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                            <label class="form-control form-control-sm" ><b>Personalidad Jurídica</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" placeholder="-" style="text-align: center;" disabled>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_PersonalidadJuridica_MR_J" name="sbVariable_PersonalidadJuridica_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_PersonalidadJuridica_MR_J" name="calificacion_PersonalidadJuridica_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>

                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_PersonalidadJuridica_MR_J" name="pesoVariable_PersonalidadJuridica_MR_J" 
                                                            placeholder="15%" style="text-align: center;" disabled>

                                                            <input type="hidden" name="PV_PJuridica_MR_J_Val" id="PV_PJuridica_MR_J_Val" value="0.15" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_PersonalidadJuridica_MR_J" name="valor_PersonalidadJuridica_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-control form-control-sm" ><b>Fecha de Constitución</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" placeholder="-" style="text-align: center;" disabled>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_FConstitucion_MR_J" name="sbVariable_FConstitucion_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_FConstitucion_MR_J" name="calificacion_FConstitucion_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_FConstitucion_MR_J" name="pesoVariable_FConstitucion_MR_J" 
                                                            placeholder="15%" style="text-align: center;" disabled>
                                                            <input type="hidden" name="PV_FConstitucion_MR_J_Val" id="PV_FConstitucion_MR_J_Val" value="0.15" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_FConstitucion_MR_J" name="valor_FConstitucion_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-control form-control-sm" ><b>Actividad Económica</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <select id="indicador_ActividadEconomica_MR_J" name="indicador_ActividadEconomica_MR_J" class="form-control form-control-sm" title="Digite el número que aparece a la par de la actividad detallada en el Aviso de Operaciones." disabled>
                                                            <option selected disabled>Elegir...</option>
                                                        </select>
                                                        

                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_ActividadEconomica_MR_J" name="sbVariable_ActividadEconomica_MR_J" class="form-control form-control-sm" required >
                                                            <option selected disabled>Elegir...</option>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_ActividadEconomica_MR_J" name="calificacion_FConstitucion_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>

                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_ActividadEconomica_MR_J" name="pesoVariable_ActividadEconomica_MR_J" 
                                                            placeholder="40%" style="text-align: center;" disabled>
                                                            <input type="hidden" name="PV_ActividadEconomica_MR_J_Val" id="PV_ActividadEconomica_MR_J_Val" value="0.40" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_ActividadEconomica_MR_J" name="valor_ActividadEconomica_MR_J" 
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
                                                        <select id="indicador_LActividadEconomica_MR_J" name="indicador_LActividadEconomica_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_LActividadEconomica_MR_J" name="sbVariable_LActividadEconomica_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_LActividadEconomica_MR_J" name="calificacion_LActividadEconomica_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_LActividadEconomica_MR_J" name="pesoVariable_LActividadEconomica_MR_J" 
                                                            placeholder="28%" style="text-align: center;" disabled>
                                                            <input type="hidden" name="PV_LActividadEconomica_MR_J_Val" id="PV_LActividadEconomica_MR_J_Val" value="0.28" />
                                                            
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_LActividadEconomica_MR_J" name="valor_LActividadEconomica_MR_J" 
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
                                                        <select id="sbVariable_ResultadosBusquedas_MR_J" name="sbVariable_ResultadosBusquedas_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_ResultadosBusquedas_MR_J" name="calificacion_ResultadosBusquedas_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_ResultadosBusquedas_MR_J" name="pesoVariable_ResultadosBusquedas_MR_J" 
                                                            placeholder="1%" style="text-align: center;" disabled>

                                                            <input type="hidden" name="PV_ResultadosBusquedas_MR_J_Val" id="PV_ResultadosBusquedas_MR_J_Val" value="0.01" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_ResultadosBusquedas_MR_J" name="valor_ResultadosBusquedas_MR_J" 
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
                                                        <select id="sbVariable_CondicionPep_MR_J" name="sbVariable_CondicionPep_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_CondicionPep_MR_J" name="calificacion_CondicionPep_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_CondicionPep_MR_J" name="pesoVariable_CondicionPep_MR_J" 
                                                            placeholder="1%" style="text-align: center;" disabled>
                                                            <input type="hidden" name="PV_CondicionPep_MR_J_Val" id="PV_CondicionPep_MR_J_Val" value="0.01" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_CondicionPep_MR_J" name="valor_CondicionPep_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                            
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        
                                                    </div>  
                                                    <div class="form-group col-md-2">    
                                                    <input type="text" class="form-control form-control-sm" id="pesoFinal_AC_MR_J" name="pesoFinal_AC_MR_J" 
                                                        placeholder="Peso final" autocomplete="off" disabled>                                                
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="valorFinal_AC_MR_J" name="valorFinal_AC_MR_J" 
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
                                                            <span class="input-group-text" id="inputGroup-sizing-default" ><b>Producto</b></span>
                                                        </div>
                                                            <input type="text" class="form-control" aria-label="Default" 
                                                            aria-describedby="inputGroup-sizing-default"placeholder="25%"  
                                                            id="productoGeneral_MR_J" name="productoGeneral_MR_J" disabled>
                                                            <input type="hidden" name="productoGeneral_MR_J_Val" id="productoGeneral_MR_J_Val" value="0.25" />
                                            
                                                    </div>                                       
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-control form-control-sm"><b>Producto Solicitado</b></label>
                                                    </div>  
                                                    <div class="form-group col-md-2">
                                                        <select id="indicador_ProductoSolicitado_MR_J" name="indicador_ProductoSolicitado_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            <?php foreach($matrizERG->listarCategoriaProducto() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idCategoriaProducto') ?>"> <?php echo $r->__GET('nombreCategoriaProducto') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <select id="sbVariable_ProductoSolicitado_MR_J" name="sbVariable_ProductoSolicitado_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_ProductoSolicitado_MR_J" name="calificacion_ProductoSolicitado_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_ProductoSolicitado_MR_J" name="pesoVariable_ProductoSolicitado_MR_J" 
                                                            placeholder="40%" style="text-align: center;" disabled>
                                                            <input type="hidden" name="PV_ProductoSolicitado_MR_J_Val" id="PV_ProductoSolicitado_MR_J_Val" value="0.40" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_ProductoSolicitado_MR_J" name="valor_ProductoSolicitado_MR_J" 
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
                                                        <select id="sbVariable_Monto_MR_J" name="sbVariable_Monto_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            <?php foreach($matrizERG->listarMonto() as $r): ?>
                                                                <option value="<?php echo $r->__GET('calificacion') ?>"> <?php echo $r->__GET('descripcion') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_Monto_MR_J" name="calificacion_Monto_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_Monto_MR_J" name="pesoVariable_Monto_MR_J" 
                                                            placeholder="60%" style="text-align: center;" disabled>
                                                            <input type="hidden" name="PV_Monto_MR_J_Val" id="PV_Monto_MR_J_Val" value="0.60" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_Monto_MR_J" name="valor_Monto_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        
                                                    </div>  
                                                    <div class="form-group col-md-2">    
                                                    <input type="text" class="form-control form-control-sm" id="pesoFinal_Monto_MR_J" name="pesoFinal_Monto_MR_J" 
                                                        placeholder="Peso final" autocomplete="off" disabled>                                                
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="valorFinal_Monto_MR_J" name="valorFinal_Monto_MR_J" 
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
                                                            aria-describedby="inputGroup-sizing-default"placeholder="10%" 
                                                            id="canalPago_MR_J" name="canalPago_MR_J" disabled>
                                                            <input type="hidden" name="canalPago_MR_J_Val" id="canalPago_MR_J_Val" value="0.10" />
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
                                                        <select id="sbVariable_FormaPago_MR_J" name="sbVariable_FormaPago_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_FormaPago_MR_J" name="calificacion_FormaPago_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_FormaPago_MR_J" name="pesoVariable_FormaPago_MR_J" 
                                                            placeholder="50%" style="text-align: center;" disabled>
                                                            <input type="hidden" name="PV_FormaPago_MR_J_Val" id="PV_FormaPago_MR_J_Val" value="0.50" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_FormaPago_MR_J" name="valor_FormaPago_MR_J" 
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
                                                        <select id="sbVariable_OrigenesRecursos_MR_J" name="sbVariable_OrigenesRecursos_MR_J" class="form-control form-control-sm" required>
                                                            <option selected disabled>Elegir...</option>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="calificacion_OrigenesRecursos_MR_J" name="calificacion_OrigenesRecursos_MR_J" 
                                                            placeholder="Calificación" style="text-align: center;" disabled>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-2">
                                                        <input type="text" class="form-control form-control-sm" id="pesoVariable_OrigenesRecursos_MR_J" name="pesoVariable_OrigenesRecursos_MR_J" 
                                                            placeholder="50%" style="text-align: center;" disabled>
                                                            <input type="hidden" name="PV_OrigenesRecursos_MR_J_Val" id="PV_OrigenesRecursos_MR_J_Val" value="0.50" />
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-sm" id="valor_OrigenesRecursos_MR_J" name="valor_OrigenesRecursos_MR_J" 
                                                            placeholder="Valor" style="text-align: center;" disabled>
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        
                                                    </div>  
                                                    <div class="form-group col-md-2">    
                                                    <input type="text" class="form-control form-control-sm" id="pesoFinal_OrigenesRecursos_MR_J" name="pesoFinal_OrigenesRecursoS_MR_J" 
                                                        placeholder="Peso final" autocomplete="off" disabled>                                                
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <input type="text" class="form-control form-control-sm" id="valorFinal_OrigenesRecursos_MR_J" name="valorFinal_OrigenesRecursos_MR_J" 
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
                                                        <input type="hidden" name="lugarConstitucion" id="lugarConstitucion" />
                                                        <input type="hidden" name="lugarNacimiento_RL" id="lugarNacimiento_RL" />
                                                        <input type="hidden" name="lugarNacionalidad_RL" id="lugarNacionalidad_RL" />
                                                        <input type="hidden" name="lugarResidencia_RL" id="lugarResidencia_RL" />
                                                        <input type="hidden" name="lugarNacionalidad_ACM" id="lugarNacionalidad_ACM" />
                                                        <input type="hidden" name="lugarNacionalidad_BFM" id="lugarNacionalidad_BFM" />
                                                        <input type="hidden" name="personalidadJuridica" id="personalidadJuridica" />
                                                        <input type="hidden" name="fechaConstitucion" id="fechaConstitucion" />
                                                        <input type="hidden" name="actividadEconomica" id="actividadEconomica" />
                                                    
                                                        <input type="hidden" name="lugarActividadEconomica" id="lugarActividadEconomica" />
                                                        <input type="hidden" name="resultadosBusquedas" id="resultadosBusquedas" />
                                                        <input type="hidden" name="condicionPEP" id="condicionPEP" />
                                                        <input type="hidden" name="productoSolicitado" id="productoSolicitado" />
                                                        <input type="hidden" name="monto" id="monto" />
                                                        <input type="hidden" name="formaPago" id="formaPago" />
                                                        <input type="hidden" name="origenRecursos" id="origenRecursos" />
                                                        <input type="hidden" name="riesgoCliente" id="riesgoCliente" />                                                     
                                                        <input type="hidden" name="tipoCliente" id="tipoCliente" value="Juridico"/>
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
                                                        
                                                        <input type="hidden" name="etiquetalabel" id="etiquetalabel" value=""/>
                                                    </div>    
                                                    <div class="form-group col-md-1">
                                                        <input type="text" class="form-control form-control-lg" id="puntuacionFinal_MR_J" name="puntuacionFinal_MR_J" 
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
                                                            <button type="submit" class="btn btn-primary col-md-7">Guardar Matriz</button>
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
        <script type="text/javascript" src="./Jscript/Panama/Juridico/selects.js"></script>
        <script type="text/javascript" src="./Jscript/Panama/Juridico/Reset.js"></script>
    <script type="text/javascript" src="./Jscript/Panama/Juridico/Multiplicar.js"></script>
       
        
    
        <script>
            /**********APARTADO UBICACION GEOGRAFICA**********/
            // SCRIPT PARA UBICACION GEOGRAFICA -->
            $(document).ready(function(){

                $('#matriz').on('change', function(){
                    
                    $("#showMatriz").show();
                                        
                });
         
                $("#razonSocial_MR_J").on('change', function () {
                    $("#razonSocial_MR_J option:selected").each(function () {
                        
                        var id_pic = $(this).val();
                        var id_matriz = $("#matriz").val();
                        
                            // recogiendo los datos de pais de constitución
                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_LConstitucion_PJ.php",{ id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#indicador_Constitucion_MR_J").html(data);
                            });	
                            
                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_LC_PJ.php",{ id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#sbVariable_Constitucion_MR_J").html(data);
                                $('#calificacion_Constitucion_MR_J').val($("#sbVariable_Constitucion_MR_J").val());  
                            });

                            //Recogiendo los datos de nacimiento del representante legal
                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_NacimientoRL_PJ.php",{ id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#indicador_NacimientoRL_MR_J").html(data);
                            });	

                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_LNRL_PJ.php",{ id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#sbVariable_NacimientoRL_MR_J").html(data);
                                $('#calificacion_NacimientoRL_MR_J').val($("#sbVariable_NacimientoRL_MR_J").val());  
                            });

                            //Recogiendo los datos de nacionalidad del representante legal
                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_NacionalidadRL_PJ.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#indicador_NacionalidadRL_MR_J").html(data);
                            });	

                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_NacRL_PJ.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#sbVariable_NacionalidadRL_MR_J").html(data);
                                $('#calificacion_NacionalidadRL_MR_J').val($("#sbVariable_NacionalidadRL_MR_J").val());  
                            });

                            //Recogiendo los datos de residencia del representante legal
                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_ResidenciaRL_PJ.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#indicador_LResidenciaRL_MR_J").html(data);
                            });	

                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_ResidRL_PJ.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#sbVariable_LResidenciaRL_MR_J").html(data);
                                $('#calificacion_LResidenciaRL_MR_J').val($("#sbVariable_LResidenciaRL_MR_J").val());  
                            });
                            
                            //Recogiendo los datos de nacionalidad de accionista mayoritario
                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_NacionalidadACM_PJ.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#indicador_NacionalidadAC_MR_J").html(data);
                            
                            });	

                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_ACM_PJ_.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#sbVariable_NacionalidadAC_MR_J").html(data);

                                bandera = $('select[id=sbVariable_NacionalidadAC_MR_J]').val();

                                /*
                                if (bandera==0){
                                    alert("Error al encontrar la nacionalidad del Accionista, verifique Los campos del pic");
                                }
                                */
                                alert($('select[id=sbVariable_NacionalidadAC_MR_J]').val());

                                $('#calificacion_NacionalidadAC_MR_J').val($("#sbVariable_NacionalidadAC_MR_J").val());  
                            });

                            //Recogiendo los datos de nacionalidad de Beneficiario Final mayoritario
                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_NacionalidadBFM_PJ.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#indicador_NacionalidadBF_MR_J").html(data);
                            
                            });	

                            $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_BFM_PJ.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#sbVariable_NacionalidadBF_MR_J").html(data);
                                bandera = $('select[id=sbVariable_NacionalidadBF_MR_J]').val();

                                if (bandera==0){
                                    alert("Error al encontrar la nacionalidad del Beneficiario Final, verifique Los campos del pic");
                                }
                                $('#calificacion_NacionalidadBF_MR_J').val($("#sbVariable_NacionalidadBF_MR_J").val());  
                            });

                            // recogiendo los datos de lugar de la actividad Economica
                            $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_LActiEcono.php",{ id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#indicador_LActividadEconomica_MR_J").html(data);
                            });	

                            $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_SV_LAE.php",{ id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                                $("#sbVariable_LActividadEconomica_MR_J").html(data);
                                $('#calificacion_LActividadEconomica_MR_J').val($("#sbVariable_LActividadEconomica_MR_J").val());  
                            });
                        
                            
                    });    
                });

                $("#sbVariable_Constitucion_MR_J").on('change', function () {
                    //alert($('select[id=sbVariable_Constitucion_MR_J]').val());
                    $('#calificacion_Constitucion_MR_J').val($(this).val());
                });

                $("#sbVariable_NacimientoRL_MR_J").on('change', function () {
                    //alert($('select[id=sbVariable_Constitucion_MR_J]').val());
                    $('#calificacion_NacimientoRL_MR_J').val($(this).val());
                });

                $("#sbVariable_NacionalidadRL_MR_J").on('change', function () {
                    //alert($('select[id=sbVariable_Constitucion_MR_J]').val());
                    $('#calificacion_NacionalidadRL_MR_J').val($(this).val());
                });

                $("#sbVariable_LResidenciaRL_MR_J").on('change', function () {
                    //alert($('select[id=sbVariable_LResidenciaRL_MR_J]').val());
                    $('#calificacion_LResidenciaRL_MR_J').val($(this).val());
                });

                $("#sbVariable_NacionalidadAC_MR_J").on('change', function () {
                    //alert($('select[id=sbVariable_LResidenciaRL_MR_J]').val());
                    $('#calificacion_NacionalidadAC_MR_J').val($(this).val());
                });

                $("#sbVariable_NacionalidadBF_MR_J").on('change', function () {
                    //alert($('select[id=sbVariable_NacionalidadBF_MR_J]').val());
                    $('#calificacion_NacionalidadBF_MR_J').val($(this).val());
                });

                $("#razonSocial_MR_J").on('change', function () {
                    $("#razonSocial_MR_J option:selected").each(function () {
                        
                        var id_pic = $('#razonSocial_MR_J').val();
                        
                                            
                            $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_Perjuridico.php", { id_pic: id_pic }, function(data) {
                                $("#sbVariable_PersonalidadJuridica_MR_J").html(data);
                                
                                $('#calificacion_PersonalidadJuridica_MR_J').val($("#sbVariable_PersonalidadJuridica_MR_J").val());
                            });	

                            
                            $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_Constitucion.php", { id_pic: id_pic }, function(data) {
                                $("#sbVariable_FConstitucion_MR_J").html(data);
                                //alert($('select[id=sbVariable_FConstitucion_MR_J]').val());
                                $('#calificacion_FConstitucion_MR_J').val($("#sbVariable_FConstitucion_MR_J").val());
                            });	

                        
                            $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_BusquedaListas.php", { id_pic: id_pic }, function(data) {
                                $("#sbVariable_ResultadosBusquedas_MR_J").html(data);
                                //alert($('select[id=sbVariable_ResultadosBusquedas_MR_J]').val());
                                $('#calificacion_ResultadosBusquedas_MR_J').val($("#sbVariable_ResultadosBusquedas_MR_J").val());
                            });

                            //AGREGANDO EL ID PARA LLAMADO DE CALIFICACIÓN
                            $.post("./JQuerys/Panama/MRJ/jQ_ActEconomica_Matrizdetalle_PJ.php", { id_pic: id_pic }, function(data) {
                                $("#indicador_ActividadEconomica_MR_J").html(data);
                                
                                //$('#calificacion_ResultadosBusquedas_MR_J').val($("#sbVariable_ResultadosBusquedas_MR_J").val());
                            });     
                            
                            //AGREGANDO LA DESCRIPCION Y CALIFICACION DE LA ACTIVIDAD ECONOMICA

                            $.post("./JQuerys/Panama/MRJ/jQ_ActEconomica_MatrizdetalleCalificacion_PJ.php", { id_pic: id_pic }, function(data) {
                                $("#sbVariable_ActividadEconomica_MR_J").html(data);
                                
                                //alert($('select[id=sbVariable_ActividadEconomica_MR_J]').val());

                                $('#calificacion_ActividadEconomica_MR_J').val($("#sbVariable_ActividadEconomica_MR_J").val());
                            });
                            
                    });
                });
            });
        </script>

        <script>
            function multiplicar(){
                //START UBICACION  GEOGRAFICA
                Fila1 = document.getElementById("calificacion_Constitucion_MR_J").value * document.getElementById("PV_Constitucion_MR_J_Val").value;
                document.getElementById("valor_Contitucion_MR_J").value =  Number.parseFloat(Fila1).toFixed(2);

                Fila2 = document.getElementById("calificacion_NacimientoRL_MR_J").value * document.getElementById("PV_NacimientoRL_MR_J_Val").value;
                document.getElementById("valor_NacimientoRL_MR_J").value =  Number.parseFloat(Fila2).toFixed(2);

                Fila3 = document.getElementById("calificacion_NacionalidadRL_MR_J").value * document.getElementById("PV_NacionalidadRL_MR_J_Val").value;
                document.getElementById("valorNacionalidadRL_MR_J").value =  Number.parseFloat(Fila3).toFixed(2);

                Fila4 = document.getElementById("calificacion_LResidenciaRL_MR_J").value * document.getElementById("PV_LResidenciaRL_MR_J_Val").value;
                document.getElementById("valor_LResidenciaRL_MR_J").value =  Number.parseFloat(Fila4).toFixed(2);

                Fila5 = document.getElementById("calificacion_NacionalidadAC_MR_J").value * document.getElementById("PV_NacionalidadAC_MR_J_Val").value;
                document.getElementById("valor_NacionalidadAC_MR_J").value =  Number.parseFloat(Fila5).toFixed(2);

                Fila6 = document.getElementById("calificacion_NacionalidadBF_MR_J").value * document.getElementById("PV_NacionalidadBF_MR_J_Val").value;
                document.getElementById("valor_NacionalidadBF_MR_J").value =  Number.parseFloat(Fila6).toFixed(2);

                UbiGeoSuma= Fila1 + Fila2 + Fila3 + Fila4 + Fila5 + Fila6;
                document.getElementById("pesoFinal_AG_MR_J").value = Number.parseFloat(UbiGeoSuma).toFixed(2);
                
                UbiGeoValFinal= document.getElementById("pesoFinal_AG_MR_J").value * document.getElementById("ubicacionG_MR_J_Val").value;
                document.getElementById("valorFinal_AG_MR_J").value = Number.parseFloat(UbiGeoValFinal).toFixed(2);

                //START ACTIVIDAD ECONOMICA
                Fila7 = document.getElementById("calificacion_PersonalidadJuridica_MR_J").value * document.getElementById("PV_PJuridica_MR_J_Val").value;
                document.getElementById("valor_PersonalidadJuridica_MR_J").value =  Number.parseFloat(Fila7).toFixed(2);
                
                Fila8 = document.getElementById("calificacion_FConstitucion_MR_J").value * document.getElementById("PV_FConstitucion_MR_J_Val").value;
                document.getElementById("valor_FConstitucion_MR_J").value =  Number.parseFloat(Fila8).toFixed(2);

                Fila9 = document.getElementById("calificacion_ActividadEconomica_MR_J").value * document.getElementById("PV_ActividadEconomica_MR_J_Val").value;
                document.getElementById("valor_ActividadEconomica_MR_J").value =  Number.parseFloat(Fila9).toFixed(2);

                Fila10 = document.getElementById("calificacion_LActividadEconomica_MR_J").value * document.getElementById("PV_LActividadEconomica_MR_J_Val").value;
                document.getElementById("valor_LActividadEconomica_MR_J").value =  Number.parseFloat(Fila10).toFixed(2);

                Fila11 = document.getElementById("calificacion_ResultadosBusquedas_MR_J").value * document.getElementById("PV_ResultadosBusquedas_MR_J_Val").value;
                document.getElementById("valor_ResultadosBusquedas_MR_J").value =  Number.parseFloat(Fila11).toFixed(2);
                
                Fila12 = document.getElementById("calificacion_CondicionPep_MR_J").value * document.getElementById("PV_CondicionPep_MR_J_Val").value;
                document.getElementById("valor_CondicionPep_MR_J").value =  Number.parseFloat(Fila12).toFixed(2);
                
                ActEcoSuma= Fila7  + Fila8 + Fila9 + Fila10 + Fila11 +  Fila12;
                document.getElementById("pesoFinal_AC_MR_J").value = Number.parseFloat(ActEcoSuma).toFixed(2);
                
                ActEcoValFinal= document.getElementById("pesoFinal_AC_MR_J").value * document.getElementById("ACGeneral_MR_J_Val").value;
                document.getElementById("valorFinal_AC_MR_J").value = Number.parseFloat(ActEcoValFinal).toFixed(2);

                //START PRODUCTO
                Fila13 = document.getElementById("calificacion_ProductoSolicitado_MR_J").value * document.getElementById("PV_ProductoSolicitado_MR_J_Val").value;
                document.getElementById("valor_ProductoSolicitado_MR_J").value =  Number.parseFloat(Fila13).toFixed(2);

                Fila14 = document.getElementById("calificacion_Monto_MR_J").value * document.getElementById("PV_Monto_MR_J_Val").value;
                document.getElementById("valor_Monto_MR_J").value =  Number.parseFloat(Fila14).toFixed(2);

                ProductoSuma= Fila13  + Fila14 ;
                document.getElementById("pesoFinal_Monto_MR_J").value = Number.parseFloat(ProductoSuma).toFixed(2);
                
                ProductoValFinal= document.getElementById("pesoFinal_Monto_MR_J").value * document.getElementById("productoGeneral_MR_J_Val").value;
                document.getElementById("valorFinal_Monto_MR_J").value = Number.parseFloat(ProductoValFinal).toFixed(2);

                //START CANAL DE PAGO
                Fila15 = document.getElementById("calificacion_FormaPago_MR_J").value * document.getElementById("PV_FormaPago_MR_J_Val").value;
                document.getElementById("valor_FormaPago_MR_J").value =  Number.parseFloat(Fila15).toFixed(2);

                Fila16 = document.getElementById("calificacion_OrigenesRecursos_MR_J").value * document.getElementById("PV_OrigenesRecursos_MR_J_Val").value;
                document.getElementById("valor_OrigenesRecursos_MR_J").value =  Number.parseFloat(Fila16).toFixed(2);

                CpagoSuma= Fila15  + Fila16 ;
                document.getElementById("pesoFinal_OrigenesRecursos_MR_J").value = Number.parseFloat(CpagoSuma).toFixed(2);
                
                CpagoValFinal= document.getElementById("pesoFinal_OrigenesRecursos_MR_J").value * document.getElementById("canalPago_MR_J_Val").value;
                document.getElementById("valorFinal_OrigenesRecursos_MR_J").value = Number.parseFloat(CpagoValFinal).toFixed(2);

                //TRATABAJANDO EN EL RIESGO FINAL
                var RiesgoFinal;
                RiesgoFinal = UbiGeoValFinal + ActEcoValFinal + ProductoValFinal + CpagoValFinal ;
                

                if (RiesgoFinal>= 0.01 && RiesgoFinal<=1.99 ){
                    document.getElementById("riesgo").style.backgroundColor = "#00b050";
                    s = document.getElementById('etiqueta').innerHTML = 'Bajo';
                    document.getElementById("riesgoCliente").value = s;

               

                 
                    }else if (RiesgoFinal>= 2  && RiesgoFinal<=2.99) {
                        document.getElementById("riesgo").style.backgroundColor = "#ffff00";
                        s = document.getElementById('etiqueta').innerHTML = 'Medio';
                        document.getElementById("riesgoCliente").value = s;                   

                        } else if(RiesgoFinal>=3){
                            document.getElementById("riesgo").style.backgroundColor = "#ff0000";
                            s = document.getElementById('etiqueta').innerHTML = 'Alto';
                            document.getElementById("riesgoCliente").value = s;

                        }else{
                            document.getElementById("riesgo").style.backgroundColor = "#808080";
                        }
                document.getElementById("puntuacionFinal_MR_J").value = Number.parseFloat(RiesgoFinal).toFixed(2);
               
                
                //ESTABLECER PARAMETROS DE TIPO TEXTO PARA LA MATRIZ DE INFORME GENERAL
                b = document.getElementById("razonSocial_MR_J");
                cliente = b.options[b.selectedIndex].text;
                document.getElementById("cliente").value = cliente;

                a = document.getElementById("razonSocial_MR_J");
                idcliente = a.options[a.selectedIndex].value;
                document.getElementById("idCliente").value = idcliente;
                
                c = document.getElementById("sbVariable_Constitucion_MR_J");
                lugarConstitucion = c.options[c.selectedIndex].text;
                document.getElementById("lugarConstitucion").value = lugarConstitucion;

                d = document.getElementById("sbVariable_NacimientoRL_MR_J");
                lugarNacimiento_RL = d.options[d.selectedIndex].text;
                document.getElementById("lugarNacimiento_RL").value = lugarNacimiento_RL;

                e = document.getElementById("sbVariable_NacionalidadRL_MR_J");
                lugarNacionalidad_RL = e.options[e.selectedIndex].text;
                document.getElementById("lugarNacionalidad_RL").value = lugarNacionalidad_RL;

                f = document.getElementById("sbVariable_LResidenciaRL_MR_J");
                lugarResidencia_RL = f.options[f.selectedIndex].text;
                document.getElementById("lugarResidencia_RL").value = lugarResidencia_RL;
                
                g = document.getElementById("sbVariable_NacionalidadAC_MR_J");
                lugarNacionalidad_ACM = g.options[g.selectedIndex].text;
                document.getElementById("lugarNacionalidad_ACM").value = lugarNacionalidad_ACM;

                h = document.getElementById("sbVariable_NacionalidadBF_MR_J");
                lugarNacionalidad_BFM = h.options[h.selectedIndex].text;
                document.getElementById("lugarNacionalidad_BFM").value = lugarNacionalidad_BFM;
                
                     

                i = document.getElementById("sbVariable_LActividadEconomica_MR_J");
                lugarActividadEconomica = i.options[i.selectedIndex].text;
                document.getElementById("lugarActividadEconomica").value = lugarActividadEconomica;

                j = document.getElementById("sbVariable_ResultadosBusquedas_MR_J");
                resultadosBusquedas = j.options[j.selectedIndex].text;
                document.getElementById("resultadosBusquedas").value = resultadosBusquedas;

                k = document.getElementById("sbVariable_CondicionPep_MR_J");
                condicionPEP = k.options[k.selectedIndex].text;
                document.getElementById("condicionPEP").value = condicionPEP;

                l = document.getElementById("sbVariable_ProductoSolicitado_MR_J");
                productoSolicitado = l.options[l.selectedIndex].text;
                document.getElementById("productoSolicitado").value = productoSolicitado;

                o = document.getElementById("sbVariable_Monto_MR_J");
                monto = o.options[o.selectedIndex].text;
                document.getElementById("monto").value = monto;

                p = document.getElementById("sbVariable_FormaPago_MR_J");
                formaPago = p.options[p.selectedIndex].text;
                document.getElementById("formaPago").value = formaPago;

                q = document.getElementById("sbVariable_OrigenesRecursos_MR_J");
                origenRecursos = q.options[q.selectedIndex].text;
                document.getElementById("origenRecursos").value = origenRecursos;
                
               
                s = document.getElementById("sbVariable_PersonalidadJuridica_MR_J");
                personalidadJuridica = s.options[s.selectedIndex].text;
                document.getElementById("personalidadJuridica").value = personalidadJuridica;
                
                t = document.getElementById("sbVariable_FConstitucion_MR_J");
                fechaConstitucion = t.options[t.selectedIndex].text;
                document.getElementById("fechaConstitucion").value = fechaConstitucion;

                u = document.getElementById("sbVariable_ActividadEconomica_MR_J");
                actividadEconomica = u.options[u.selectedIndex].text;
                document.getElementById("actividadEconomica").value = actividadEconomica;

               // alert ("ERROR CODE 404 NOT FOUND RIESGO");
                 
                z = document.getElementById("matriz");
                //alert (z);

                paisMatriz = z.options[z.selectedIndex].text;
                //alert (paisMatriz);
            
                document.getElementById("paisMatriz").value = paisMatriz;

                    riesgo = document.getElementById("riesgoCliente").value;
                   // alert (riesgo);
                    
                    inicio=document.getElementById("fecha_MR_J").value;
                // alert (inicio);
                    if (riesgo == "Bajo"){
                        start = new Date(inicio);
                        start.setFullYear(start.getFullYear() + 5);          
                        startf = start.toISOString().slice(0,10).replace("/-/","/");
                        document.getElementById("fechaProxRevision_ME").value= startf;
                    }

                    if (riesgo == "Medio"){
                        inicio=document.getElementById("fecha_MR_J").value;
                        start = new Date(inicio);
                        start.setFullYear(start.getFullYear() + 2);          
                        startf = start.toISOString().slice(0,10).replace("/-/","/");
                        document.getElementById("fechaProxRevision_ME").value= startf;
                    }

                    if (riesgo == "Alto"){
                        inicio=document.getElementById("fecha_MR_J").value;
                        start = new Date(inicio);
                        start.setFullYear(start.getFullYear() + 1);          
                        startf = start.toISOString().slice(0,10).replace("/-/","/");
                        document.getElementById("fechaProxRevision_ME").value= startf;
                    }                    
            }
        </script>
       
    </body>
</html>