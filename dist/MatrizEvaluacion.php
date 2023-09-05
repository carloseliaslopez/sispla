<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/Evaluacion/CatalogoSubProducto.php';
include '../Entidades/Evaluacion/CatalogoDocumentos.php';
include '../Entidades/Clientes.php';
include '../Entidades/Evaluacion/vw_informeIDD.php';
include '../Entidades/Evaluacion/vw_DocumentacionRecibida.php';

//DATOS
include '../Datos/DtCombos.php';
include '../Datos/DtMatrizEvaluacion.php';
include '../Datos/DtPic.php';
include '../Datos/DtMatrizRiesgoCompartida.php';
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
//INSTANCIAS
$combos = new DtCombos();
$matrizE = new DtMatrizEvaluacion();

//$matrizMRN = new DtMatrizRiesgoNatural();
$matrizMRC = new DtMatrizRiesgoCompartida();
//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
$varIdEmp = $_GET['editE'];
$varProd = $_GET['editProd'];

$empEdit;
$empEdit = $matrizMRC->obtenerCliente($varIdEmp, $varProd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Matriz preInforme</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/NewStyles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="fontawesome5.15.1/js/all.min.js"></script>
    <script type="text/javascript" src="./documentacion.js"></script>
    <!-- jAlert css  -->
    <link rel="stylesheet" href="jAlert/dist/jAlert.css" />
    <style>
        .myDiv{
            display:none;
        }  
        .divcase{
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
                    <h4 id="h1Informe" name= "h1Informe"  class="mt-4">Informe de Debida Diligencia</h4>
                    <!--Start encabezado-->
                    <div class="col-md-12" >
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                                
                            </div>
                        </div>
                    </div>
                    <!--End encabezado-->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="../negocio/NgMatrizEvaluacion.php">
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-9">
                                                <input type="hidden" name="idCli_PN" id="idCli_PN" />
                                                <input type="hidden" name="TipoCliente_hide" id="TipoCliente_hide" />
                                                <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>

                                                <label class="large mb-2" for="razonSocial_ME" ><b>Razón Social o Nombre Completo del Cliente</b></label>
                                                <input type="text" class="form-control form-control-md" id="razonSocial_ME" name="razonSocial_ME" 
                                                    placeholder="Razón Social o Nombre Completo del Cliente"  >
                                                
                                            </div>  
                                            <div class="form-group col-md-3">
                                                <label class="large mb-2" for="tipoCliente_ME" ><b>Tipo de Cliente</b></label>
                                                <input type="text" class="form-control form-control-md" id="matriz" name="matriz" 
                                                    placeholder="Tipo de cliente"  >
    
                                            </div>          
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="large mb-2" for="pSolicitado_ME" ><b>Producto Solicitado</b></label>
                                                <input type="text" class="form-control form-control-md" id="pSolicitado_ME" name="pSolicitado_ME" 
                                                    placeholder="Producto Solicitado"  >

                                            </div>      
                                            <div class="form-group col-md-3">
                                                <label class="large mb-2" for="pais_ME"><b>País</b></label>
                                                <input type="text" class="form-control form-control-md" id="pais_ME" name="pais_ME" 
                                                    placeholder="País"  >
                                            </div>  
                                            <div class="form-group col-md-2">
                                                <label class="large mb-2" for="monto_ME" ><b>Monto</b></label>
                                                <input type="number" class="form-control form-control-md" id="monto_ME" name="monto_ME" 
                                                    placeholder="Monto" autocomplete="off" required>
                                            </div>  
                                            <div class="form-group col-md-3">
                                                <label class="large mb-2" for="fechaRevision_ME" ><b>Fecha de revisión</b></label>
                                                <input type="date" class="form-control form-control-md" id="fechaRevision_ME" name="fechaRevision_ME" 
                                                    autocomplete="off" >
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--START BOX DOCUMENTACIÓN JURIDICA>>-->
                                        <div class="myDiv" id="showJuridico">

                                         <!--Start encabezado-->
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label><b>I. Documentación Recibida</b></label>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                   
                                                    </div>
                                                <div class="form-group col-md-2">
                                                  <button type="button" class="btn btn-primary col-md-10" id="add_field_button_J"> <i class="fas fa-user-plus"></i> Agregar</button>
                                                </div>
                                                </div>
                                            </div>
                                         <!--End encabezado-->

                                            <div class="input_fields_wrap_J" id ="input_fields_wrap_J">
                                                <div class="col-md-12" >
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="large mb-2" for="nombreDoc_ME_J[]" ><b>Nombre del Documento</b></label>
                                                            <select id="nombreDoc_ME_J[]" name="nombreDoc_ME_J[]" class="form-control form-control-sm">
                                                                <option selected disabled value="164">Elegir..</option>
                                                                <?php foreach($matrizE->CatalogoDocumentosJ() as $r): ?>
                                                                    <option value="<?php echo $r->__GET('idCatalogoDocumentos') ?>"> <?php echo $r->__GET('descripcion') ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>   
                                                        <div class="form-group col-md-5">
                                                            <label class="large mb-2" for="comentario_ME_J[]" ><b>Comentario</b></label>
                                                            <input type="text" class="form-control form-control-sm" id="comentario_ME_J[]" name="comentario_ME_J[]" 
                                                                placeholder="Comentario" autocomplete="off" >
                                                        </div> 
                                                        
                                                        <div class="form-group col-sm-1">
                                                            <label for="">Eliminar</label>
                                                            <button type="button" class="btn btn-danger btn-sm" id="remove_field_PP" disabled> <i class="fas fa-trash-alt"></i></button>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        
                                    <!--END BOX DOCUMENTACIÓN JURIDICA>>-->

                                    <!--START BOX DOCUMENTACIÓN NACIONAL>>-->
                                    <div class="myDiv" id="showNatural">
                                        <!--Start encabezado-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label><b>I. Documentación Recibida</b></label>
                                                </div>
                                                <div class="form-group col-md-6"></div>
                                                <div class="form-group col-md-2">
                                                  <button type="button" class="btn btn-primary col-md-10" id="add_field_button_N"> <i class="fas fa-user-plus"></i> Agregar</button>
                                                </div>
                                                </div>
                                        </div>
                                         <!--End encabezado-->

                                        <div class="input_fields_wrap_N" id ="input_fields_wrap_N">
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="large mb-2" for="nombreDoc_ME_N[]" ><b>Nombre del Documento</b></label>
                                                        <select id="nombreDoc_ME_N[]" name="nombreDoc_ME_N[]" class="form-control form-control-sm">
                                                            <option selected disabled value="164">Elegir..</option>
                                                            <?php foreach($matrizE->CatalogoDocumentosN() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idCatalogoDocumentos') ?>"> <?php echo $r->__GET('descripcion') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>   
                                                    <div class="form-group col-md-5">
                                                        <label class="large mb-2" for="comentario_ME_N[]" ><b>Comentario</b></label>
                                                        <input type="text" class="form-control form-control-sm" id="comentario_ME_N[]" name="comentario_ME_N[]" 
                                                            placeholder="Comentario" autocomplete="off" >
                                                    </div> 
                                                        
                                                    <div class="form-group col-sm-1">
                                                        <label for="">Eliminar</label>
                                                        <button type="button" class="btn btn-danger btn-sm" id="remove_field_PN" disabled> <i class="fas fa-trash-alt"></i></button>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <!--END BOX DOCUMENTACIÓN NATURAL>>-->

                                    <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                <a href="javascript:;" class="addAttr" data-toggle="modal" data-target="#exampleModal2" 
                                                    > <i class="fas fa-pen-square"></i>
                                                        Documentacion Extra </a>
                                                </div> 
                                             </div>
                                        </div>

                                        <!-- Modal UPDATE -->
                                    <div class="modal fade " id="exampleModal2" tabindex="-1" role="document" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Agregar un nuevo documento del cliente</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <div class="form-row">
                                                            <div class="col-md-12" >
                                                                <div class="form-group">
                                                                <label class="small mb-1"  for="nombreDoc_New"> <b>Nombre del documento</b> </label>
                                                                    <input class="form-control py-4" name="nombreDoc_New" id="nombreDoc_New"
                                                                    type="text" placeholder="Nombre del documento" autocomplete="off" />
                                                                        
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="comentario_new"><b>Comentario:</b></label>
                                                                    <input class="form-control py-4" name="comentario_new" id="calificacion_E"
                                                                    type="text" placeholder="Comentario" autocomplete="off"  />
                                                                </div>                                                                                                                              
                                                            </div>

                                                        </div>
                                                
                                                </div>
                                            
                                                <div class="modal-footer">
                                                    
                                                </div>
                                            
                                           
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END MODAL INSERT-->

                                    <!--Start encabezado-->
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label><b>II. Calificación de Riesgo</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End encabezado-->
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-1">
                                            </div>  
                                            <div class="form-group col-md-3">
                                                <label class="small mb-1" for="riesgoCliente_ME" ><b>Riesgo Inherente del Cliente</b></label>
                                                <div class="form-group col-md-9"  id="riesgo" name="riesgo" style="text-align: center;  padding: 8px ;" >
                                                    <input type="text" class="form-control form-control-md" id="etiqueta" name="etiqueta" 
                                                    placeholder="Riesgo"  >

                                                    <input type="hidden" name="Doc_J_1" id="Doc_J_1" />
                                                    <input type="hidden" name="Doc_J_2" id="Doc_J_2" />
                                                    <input type="hidden" name="Doc_J_3" id="Doc_J_3" />
                                                    <input type="hidden" name="Doc_J_4" id="Doc_J_4" />
                                                    <input type="hidden" name="Doc_J_5" id="Doc_J_5" />
                                                    <input type="hidden" name="Doc_J_6" id="Doc_J_6" />
                                                    <input type="hidden" name="Doc_J_7" id="Doc_J_7" />
                                                    <input type="hidden" name="Doc_J_8" id="Doc_J_8" />
                                                    <input type="hidden" name="Doc_J_9" id="Doc_J_9" />
                                                    <input type="hidden" name="Doc_J_10" id="Doc_J_10" />
                                                    <input type="hidden" name="Doc_J_11" id="Doc_J_11" />
                                                    <input type="hidden" name="Doc_J_12" id="Doc_J_12" />
                                                    <input type="hidden" name="Doc_J_13" id="Doc_J_13" />
                                                    <input type="hidden" name="Doc_J_14" id="Doc_J_14" />
                                                    <input type="hidden" name="Doc_J_15" id="Doc_J_15" />

                                                    <input type="hidden" name="Doc_N_1" id="Doc_N_1" />
                                                    <input type="hidden" name="Doc_N_2" id="Doc_N_2" />
                                                    <input type="hidden" name="Doc_N_3" id="Doc_N_3" />
                                                    <input type="hidden" name="Doc_N_4" id="Doc_N_4" />
                                                    <input type="hidden" name="Doc_N_5" id="Doc_N_5" />
                                                    <input type="hidden" name="Doc_N_6" id="Doc_N_6" />
                                                    <input type="hidden" name="Doc_N_7" id="Doc_N_7" />
                                                    <input type="hidden" name="Doc_N_8" id="Doc_N_8" />
                                                    <input type="hidden" name="Doc_N_9" id="Doc_N_9" />
                                                    <input type="hidden" name="Doc_N_10" id="Doc_N_10" />
                                                    
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-1">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="small mb-1" for="fechaProxRevision_ME" ><b>Fecha Próxima Revisión</b></label>
                                                <input type="date" class="form-control form-control-lg" id="fechaProxRevision_ME" name="fechaProxRevision_ME" 
                                                     autocomplete="off" required>
                                            </div>          
                                        </div>
                                    </div>
                                    <div class="divcase" id="inputValidation">
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control form-control-sm" id="validacionRecib" name="validacionRecib" 
                                                    placeholder="Autorizado por Cumplimiento"  >
                                                </div> 
                                             </div>
                                        </div>
                                    </div>

                                    <!--Start encabezado-->
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label><b>III. Controles Aplicados</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End encabezado-->

                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="motoresBusqueda_ME" name="motoresBusqueda_ME" >
                                                        <label class="form-check-label" for="motoresBusqueda_ME">
                                                         Motores de Búsqueda
                                                        </label>
                                                </div>
                                            </div>   
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="registroPublico_ME" name="registroPublico_ME">
                                                        <label class="form-check-label" for="registroPublico_ME">
                                                            Registro Público y/o Mercantil
                                                        </label>
                                                </div>
                                            </div>  
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="poderJudicial_ME" name="poderJudicial_ME">
                                                        <label class="form-check-label" for="poderJudicial_ME">
                                                            Poder Judicial
                                                        </label>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="intelicheck_ME" name="intelicheck_ME">
                                                        <label class="form-check-label" for="intelicheck_ME">
                                                            Intelicheck
                                                        </label>
                                                </div>
                                            </div>   
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="interpol_ME" name="interpol_ME">
                                                        <label class="form-check-label" for="interpol_ME">
                                                            INTERPOL
                                                        </label>
                                                </div>
                                            </div>  
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="fbi_ME" name="fbi_ME">
                                                        <label class="form-check-label" for="fbi_ME">
                                                            FBI
                                                        </label>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="ofac_ME" name="ofac_ME">
                                                        <label class="form-check-label" for="ofac_ME">
                                                            OFAC
                                                        </label>
                                                </div>
                                            </div>   
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="listaConsolidada_ME" name="listaConsolidada_ME">
                                                        <label class="form-check-label" for="listaConsolidada_ME">
                                                            Lista Consolidada UNSC
                                                        </label>
                                                </div>
                                            </div>  
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"  id="sancionesUE_ME" name="sancionesUE_ME">
                                                        <label class="form-check-label" for="sancionesUE_ME">
                                                            Sanciones UE
                                                        </label>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <!--Start encabezado observaciones-->
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label><b>IV. Observaciones</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End encabezado observaciones-->

                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <textarea class="form-control" id="observaciones_ME" name="observaciones_ME" rows="3"></textarea>
                                            </div>
                                                 
                                        </div>
                                    </div>
                                    <!--Start buttons-->
                                    
                                    <pre>
                                        </pre>                                        
                                            <div class="col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <button type="submit" class="btn btn-primary col-md-7">Guardar Informe</button>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-danger col-md-7" onclick="regresar()">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--End buttons -->  
                                </form>   
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    
    <!-- jAlert js -->
    <script src="jAlert/dist/jAlert.min.js"></script>
    <script src="jAlert/dist/jAlert-functions.min.js"> //optional!!</script>


    <script>
        $(document).ready(function ()
        {
            ////// ASIGNAMOS LOS VALORES A EDITAR EN LOS CONTROLES DEL FORMULARIO
            setValoresEmp();
            cambiarEndDate()
            
        });
    </script>
     <script>
        $(document).ready(function(){
            var id_matriz = $("#matriz").val();
                //alert(id_matriz);
                if (id_matriz == "Natural"){
                    $("#showNatural").show();
                }else{
                    $("#showJuridico").show();
                }
            

            var riesgo = $("#etiqueta").val();
                //alert(riesgo);
                if (riesgo =="Bajo"){
                document.getElementById("etiqueta").style.backgroundColor = "#00b050";   

                }else if (riesgo =="Medio") {
                    
                    document.getElementById("etiqueta").style.backgroundColor = "#ffff00";
                    
                    } else if(riesgo =="Alto"){
                        //document.getElementById("riesgo").style.backgroundColor = "#ff0000";
                        document.getElementById("etiqueta").style.backgroundColor = "#ff0000";
                        
                        $("#inputValidation").show();
                        
                    }else{
                        document.getElementById("etiqueta").style.backgroundColor = "#808080";
                    }
        });

    </script>

    <script>
        function setValoresEmp()
        { 
            
            $("#idCli_PN").val("<?php echo $empEdit->__GET('idCliente') ?>");
            $("#razonSocial_ME").val("<?php echo $empEdit->__GET('cliente') ?>");
            $("#pSolicitado_ME").val("<?php echo $empEdit->__GET('productoSolicitado') ?>");
            $("#TipoCliente_hide").val("<?php echo $empEdit->__GET('tipoCliente') ?>");
            $("#matriz").val("<?php echo $empEdit->__GET('tipoCliente') ?>");
            $("#pais_ME").val("<?php echo $empEdit->__GET('paisMatriz') ?>");
            $("#fechaRevision_ME").val("<?php echo $empEdit->__GET('fechaRealizacion') ?>");
            $("#etiqueta").val("<?php echo $empEdit->__GET('riesgoCliente') ?>");
                 
        }
    </script>

    <script>
        
        function MatrizCambio(){
            mtz = document.getElementById("matriz");
            matriz = mtz.options[mtz.selectedIndex].text;
            //alert(matriz); 
        }

        /*funciones Para capturar el text select uno de los textos del select*/
        function A_J_1(){
            aj1 = document.getElementById("nombreDoc_ME_1_J");
            matriz = aj1.options[aj1.selectedIndex].text;
            document.getElementById("Doc_J_1").value = matriz;
            
        }
        function A_J_2(){
            aj2 = document.getElementById("nombreDoc_ME_2_J");
            matriz = aj2.options[aj2.selectedIndex].text;
            document.getElementById("Doc_J_2").value = matriz;
            
        }
        function A_J_3(){
            aj3 = document.getElementById("nombreDoc_ME_3_J");
            matriz = aj3.options[aj3.selectedIndex].text;
            document.getElementById("Doc_J_3").value = matriz;
            
        }
        function A_J_4(){
            aj4 = document.getElementById("nombreDoc_ME_4_J");
            matriz = aj4.options[aj4.selectedIndex].text;
            document.getElementById("Doc_J_4").value = matriz;
            
        }
        function A_J_5(){
            aj5 = document.getElementById("nombreDoc_ME_5_J");
            matriz = aj5.options[aj5.selectedIndex].text;
            document.getElementById("Doc_J_5").value = matriz;
            
        }
        function A_J_6(){
            aj6 = document.getElementById("nombreDoc_ME_6_J");
            matriz = aj6.options[aj6.selectedIndex].text;
            document.getElementById("Doc_J_6").value = matriz;
            
        }
        function A_J_7(){
            aj7 = document.getElementById("nombreDoc_ME_7_J");
            matriz = aj7.options[aj7.selectedIndex].text;
            document.getElementById("Doc_J_7").value = matriz;
            
        }
        function A_J_8(){
            aj8 = document.getElementById("nombreDoc_ME_8_J");
            matriz = aj8.options[aj8.selectedIndex].text;
            document.getElementById("Doc_J_8").value = matriz;
            
        }
        function A_J_9(){
            aj9 = document.getElementById("nombreDoc_ME_9_J");
            matriz = aj9.options[aj9.selectedIndex].text;
            document.getElementById("Doc_J_9").value = matriz;
            
        }
        function A_J_10(){
            aj10 = document.getElementById("nombreDoc_ME_10_J");
            matriz = aj10.options[aj10.selectedIndex].text;
            document.getElementById("Doc_J_1").value = matriz;
            
        }
        function A_J_11(){
            aj11 = document.getElementById("nombreDoc_ME_11_J");
            matriz = aj11.options[aj11.selectedIndex].text;
            document.getElementById("Doc_J_11").value = matriz;
            
        }
        function A_J_12(){
            aj12 = document.getElementById("nombreDoc_ME_12_J");
            matriz = aj12.options[aj12.selectedIndex].text;
            document.getElementById("Doc_J_12").value = matriz;
            
        }
        function A_J_13(){
            aj13 = document.getElementById("nombreDoc_ME_13_J");
            matriz = aj13.options[aj13.selectedIndex].text;
            document.getElementById("Doc_J_13").value = matriz;
            
        }
        function A_J_14(){
            aj14 = document.getElementById("nombreDoc_ME_14_J");
            matriz = aj14.options[aj14.selectedIndex].text;
            document.getElementById("Doc_J_14").value = matriz;
            
        }
        function A_J_15(){
            aj15 = document.getElementById("nombreDoc_ME_15_J");
            matriz = aj15.options[aj15.selectedIndex].text;
            document.getElementById("Doc_J_15").value = matriz;
            
        }
        //FUNCIONES PARA NATURALES DOCUMENTACIÓN"

        function A_N_1(){
            an1 = document.getElementById("nombreDoc_ME_1_N");
            matriz = an1.options[an1.selectedIndex].text;
            document.getElementById("Doc_N_1").value = matriz;
        }
        function A_N_2(){
            an2 = document.getElementById("nombreDoc_ME_2_N");
            matriz = an2.options[an2.selectedIndex].text;
            document.getElementById("Doc_N_2").value = matriz;
        }
        function A_N_3(){
            an3 = document.getElementById("nombreDoc_ME_3_N");
            matriz = an3.options[an3.selectedIndex].text;
            document.getElementById("Doc_N_3").value = matriz;
        }
        function A_N_4(){
            an4 = document.getElementById("nombreDoc_ME_4_N");
            matriz = an4.options[an4.selectedIndex].text;
            document.getElementById("Doc_N_4").value = matriz;
        }
        function A_N_5(){
            an5 = document.getElementById("nombreDoc_ME_5_N");
            matriz = an5.options[an5.selectedIndex].text;
            document.getElementById("Doc_N_5").value = matriz;
        }
        function A_N_6(){
            an6 = document.getElementById("nombreDoc_ME_6_N");
            matriz = an6.options[an6.selectedIndex].text;
            document.getElementById("Doc_N_6").value = matriz;
        }
        function A_N_7(){
            an7 = document.getElementById("nombreDoc_ME_7_N");
            matriz = an7.options[an7.selectedIndex].text;
            document.getElementById("Doc_N_7").value = matriz;
        }
        function A_N_8(){
            an8 = document.getElementById("nombreDoc_ME_8_N");
            matriz = an8.options[an8.selectedIndex].text;
            document.getElementById("Doc_N_8").value = matriz;
        }
        function A_N_9(){
            an9 = document.getElementById("nombreDoc_ME_9_N");
            matriz = an9.options[an9.selectedIndex].text;
            //alert (matriz) 
            document.getElementById("Doc_N_9").value = matriz;
        }
        function A_N_10(){
            an10 = document.getElementById("nombreDoc_ME_10_N");
            matriz = an10.options[an10.selectedIndex].text;
            document.getElementById("Doc_N_10").value = matriz;
        }

    </script>

    <script>
        function regresar() {
            confirm(function(e,btn){ 
                e.preventDefault();
                window.location.href = "./ListaInformesIDD.php";
            }, 
            function(e,btn)
            {
                e.preventDefault();
                
            });

            }
    </script>
    
    <script>
        function cambiarEndDate(){

            var riesgo =document.getElementById("etiqueta").value;
            var inicio=document.getElementById("fechaRevision_ME").value;
            
            if (riesgo == "Bajo"){
                var start = new Date(inicio);
                start.setFullYear(start.getFullYear() + 5);          
                var startf = start.toISOString().slice(0,10).replace("/-/","/");
                document.getElementById("fechaProxRevision_ME").value= startf;
            }

            if (riesgo == "Medio"){
                var inicio=document.getElementById("fechaRevision_ME").value;
                var start = new Date(inicio);
                start.setFullYear(start.getFullYear() + 2);          
                var startf = start.toISOString().slice(0,10).replace("/-/","/");
                document.getElementById("fechaProxRevision_ME").value= startf;
            }

            if (riesgo == "Alto"){
                var inicio=document.getElementById("fechaRevision_ME").value;
                var start = new Date(inicio);
                start.setFullYear(start.getFullYear() + 1);          
                var startf = start.toISOString().slice(0,10).replace("/-/","/");
                document.getElementById("fechaProxRevision_ME").value= startf;
            }
             
        }
    </script>

    <script>
        $(document).ready(function() {
            var max_fields      = 50; //Cantidad maxima de inputs 
            var wrapper   		= $(".input_fields_wrap_J"); //atributos 
            var add_button      = $("#add_field_button_J"); //Boton agregar

            var x = 1; //Contador agregar
            $(add_button).click(function(e){ //al realizar clia al boton add
            e.preventDefault();
                if(x < max_fields){ //condicional de limites 
                    x++; //incrementa la cantidad de textbox
                    $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-6"><select id="nombreDoc_ME_J[]" name="nombreDoc_ME_J[]" class="form-control form-control-sm"><option selected disabled> Elegir..</option><?php foreach($matrizE->CatalogoDocumentosJ() as $r): ?><option value="<?php echo $r->__GET('idCatalogoDocumentos') ?>"> <?php echo $r->__GET('descripcion') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-5"><input type="text" class="form-control form-control-sm" id="comentario_ME_J[]" name="comentario_ME_J[]" placeholder="Comentario" autocomplete="off" ></div> <div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field_J" > <i class="fas fa-trash-alt"></i></button></div></div></div>'); //add input box
                }
            });
                
            $(wrapper).on("click","#remove_field_J", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
            })
 
        });       
    </script>
    <script>
        $(document).ready(function() {
            var max_fields      = 50; //Cantidad maxima de inputs 
            var wrapper   		= $(".input_fields_wrap_N"); //atributos 
            var add_button      = $("#add_field_button_N"); //Boton agregar

            var x = 1; //Contador agregar
            $(add_button).click(function(e){ //al realizar clia al boton add
            e.preventDefault();
                if(x < max_fields){ //condicional de limites 
                    x++; //incrementa la cantidad de textbox
                    $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-6"><select id="nombreDoc_ME_N[]" name="nombreDoc_ME_N[]" class="form-control form-control-sm"><option selected disabled value="164">Elegir..</option><?php foreach($matrizE->CatalogoDocumentosN() as $r): ?><option value="<?php echo $r->__GET('idCatalogoDocumentos') ?>"> <?php echo $r->__GET('descripcion') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-5"><input type="text" class="form-control form-control-sm" id="comentario_ME_N[]" name="comentario_ME_N[]" placeholder="Comentario" autocomplete="off" ></div><div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field_PN"> <i class="fas fa-trash-alt"></i></button></div></div></div>'); //add input box
                }
            });
                
            $(wrapper).on("click","#remove_field_PN", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
            })
 
        });       
    </script>

      
</body>

</html>