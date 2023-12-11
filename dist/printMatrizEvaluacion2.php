<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/Evaluacion/CatalogoSubProducto.php';
include '../Entidades/Evaluacion/CatalogoDocumentos.php';
include '../Entidades/Clientes.php';
include '../Entidades/Evaluacion/vw_informeIDD.php';
include '../Entidades/Evaluacion/InformeGeneralIDD.php';
include '../Entidades/Evaluacion/DocumentacionRecibida.php';
include '../Entidades/Evaluacion/ControlesAplicados.php';
include '../Entidades/Evaluacion/vw_DocumentacionRecibida.php';
include '../Entidades/Evaluacion/DocumentacionExtra.php';

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
//$matrizMRC = new DtMatrizEvaluacion();
//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
$varIdEmp = $_GET['editE'];
$varProd = $_GET['editProd'];

$empEdit;
$empEdit = $matrizE->obtenerClienteInforme($varIdEmp, $varProd);

$controlAp;
$controlAp = $matrizE->ListarControlesAplicados($varIdEmp, $varProd);

$conexion = new mysqli('localhost','admin','adminCump123.','sispla');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Informe IDD</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/NewStyles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="fontawesome5.15.1/js/all.min.js"></script>
    
</head>
<body class="sb-nav-fixed" >
    <main>
        <div class="container-fluid">   
                <div class="card-body">
                    <h4 id="h1Informe" name= "h1Informe"  >Informe de Debida Diligencia</h4>
                    <hr>
                    <div class="justify-content-md-center" >
                        <div class="form-row-inline">
                            <div class="form-group col-sm-6">
                                <label  for="razonSocial_ME" ><b> Nombre del Cliente</b></label>
                                <input type="text" class="form-control form-control-sm" id="razonSocial_ME" name="razonSocial_ME" 
                                placeholder="Razón Social o Nombre Completo del Cliente"  value="<?php echo $empEdit->__GET('cliente') ?>" disabled>
                            </div>  
                            <div class="form-group col-sm-3">
                                <label for="tipoCliente_ME" ><b>Tipo de Cliente</b></label>
                                <input type="text" class="form-control form-control-sm" id="tipoCliente_ME" name="tipoCliente_ME" 
                                    placeholder="Tipo de Cliente" value="<?php echo $empEdit->__GET('tipoCliente') ?>" disabled>
                            </div>
                        </div>    
                    </div>
                            <div class="col-md-12" >
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="large mb-2" for="pSolicitado_ME" ><b>Producto Solicitado</b></label>
                                        <input type="text" class="form-control form-control-sm" id="pSolicitado_ME" name="pSolicitado_ME" 
                                            placeholder="Producto Solicitado" value="<?php echo $empEdit->__GET('productoSolicitado') ?>" disabled>

                                    </div>      
                                    <div class="form-group col-md-3">
                                        <label class="large mb-2" for="pais_ME"><b>País</b></label>
                                        <input type="text" class="form-control form-control-sm" id="pais_ME" name="pais_ME" 
                                            placeholder="País" value="<?php echo $empEdit->__GET('paisCliente') ?> " disabled>
                                    </div>  
                                    <div class="form-group col-md-2">
                                        <label class="large mb-2" for="monto_ME" ><b>Monto</b></label>
                                        <input type="number" class="form-control form-control-sm" id="monto_ME" name="monto_ME" 
                                            placeholder="Monto" autocomplete="off" value="<?php echo $empEdit->__GET('monto') ?>" disabled >
                                    </div>  
                                    <div class="form-group col-md-3">
                                        <label class="large mb-2" for="fechaRevision_ME" ><b>Fecha de revisión</b></label>
                                        <input type="date" class="form-control form-control-sm" id="fechaRevision_ME" name="fechaRevision_ME" 
                                            autocomplete="off" value="<?php echo $empEdit->__GET('fechaRevision') ?>" disabled>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--Start encabezado-->
                            <div class="col-md-12" >
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label><b>I. Documentación Recibida</b></label>
                                    </div>
                                </div>
                            </div>
                                    <!--End encabezado-->
                            <!--Start table Principales clientes-->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Documento </th>
                                            <th>Comentario</th>       
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        
                                        <?php foreach($matrizE->ListarDocumentosIDD($varIdEmp,$varProd) as $r): ?>
                                            <tr>
                                                <td><?php echo $r->__GET('descripcion'); ?></td>
                                                <td><?php echo $r->__GET('comentario'); ?></td>                                                                                               
                                            </tr>
                                        <?php endforeach; ?>
                                        
                                        <?php foreach($matrizE->ListarDocumentosExtras($varIdEmp,$varProd) as $r): ?>
                                            <tr>
                                                <td><?php echo $r->__GET('documento'); ?></td>
                                                <td><?php echo $r->__GET('comentario'); ?></td>                                                                                               
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            <!-- End table Principales Cliente-->


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
                                            <input type="text" class="form-control form-control-md" id="etiqueta" name="etiqueta" style="text-align: center; "
                                            placeholder="Riesgo" value="<?php echo $empEdit->__GET('riesgo') ?>" >
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-1">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="small mb-1" for="fechaProxRevision_ME" ><b>Fecha Próxima Revisión</b></label>
                                        <input type="date" class="form-control form-control-lg" id="fechaProxRevision_ME" name="fechaProxRevision_ME" 
                                                autocomplete="off" value="<?php  echo  $empEdit->__GET('proximaRevision') ?>" disabled>
                                    </div>          
                                </div>
                            </div>
                            <div class="divcase" id="inputValidation">
                                <div class="col-md-12" >
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control form-control-sm" id="validacionRecib" name="validacionRecib" 
                                            placeholder="Autorizado por Cumplimiento" value="<?php  echo  $empEdit->__GET('inputRiesgo') ?>"  autocomplete="off" disabled>
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
                                            <?php 
                                                
                                            $rMB = $conexion->query("SELECT motorBusqueda FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                            $row = mysqli_fetch_array($rMB);
                                                                                                
                                            if($row[0] == 1){  
                                                $chkMB = 1;
                                            }else{
                                                $chkMB = 0;
                                                } 
                                            ?>

                                            <input class="form-check-input" type="checkbox"  id="motoresBusqueda_ME" name="motoresBusqueda_ME" <?php if($chkMB == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
                                                <label class="form-check-label" for="motoresBusqueda_ME">
                                                    Motores de Búsqueda
                                                </label>
                                        </div>
                                    </div>   
                                    <div class="form-group col-md-4">
                                        <div class="form-check">
                                            <?php 
                                                
                                                $rRP = $conexion->query("SELECT registroMercantil FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                                $row = mysqli_fetch_array($rRP);                                                      
                                                if($row[0] == 1){
                                                    $chkRP = 1;
                                                }else{
                                                    $chkRP = 0;
                                                } 
                                                ?>

                                                <input class="form-check-input" type="checkbox"  id="registroPublico_ME" name="registroPublico_ME" <?php if($chkRP == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
                                                <label class="form-check-label" for="registroPublico_ME">
                                                    Registro Público y/o Mercantil
                                                </label>
                                        </div>
                                        
                                    </div>  
                                    <div class="form-group col-md-4">
                                        <div class="form-check">
                                            <?php 
                                                
                                                $rPJ = $conexion->query("SELECT poderJudicial FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                                $row = mysqli_fetch_array($rPJ);                                                       
                                                if($row[0] == 1){
                                                    $chkPJ = 1;
                                                }else{
                                                    $chkPJ = 0;
                                                } 
                                            ?>
                                            <input class="form-check-input" type="checkbox"  id="poderJudicial_ME" name="poderJudicial_ME" <?php if($chkPJ == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
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
                                            <?php 
                                                
                                                $rICK = $conexion->query("SELECT intelichek FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                                $row = mysqli_fetch_array($rICK);                                                       
                                                if($row[0] == 1){
                                                    $chkICK = 1;
                                                }else{
                                                    $chkICK = 0;
                                                } 
                                            ?>
                                            <input class="form-check-input" type="checkbox"  id="intelicheck_ME" name="intelicheck_ME" <?php if($chkICK == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
                                                <label class="form-check-label" for="intelicheck_ME">
                                                    Intelicheck
                                                </label>
                                        </div>

                                    </div>   
                                    <div class="form-group col-md-4">
                                        <div class="form-check">
                                            <?php 
                                                
                                                $rIPL = $conexion->query("SELECT interpol FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                                $row = mysqli_fetch_array($rIPL);                                                       
                                                if($row[0] == 1){
                                                    $chkIPL = 1;
                                                }else{
                                                    $chkIPL = 0;
                                                } 
                                            ?>  
                                            <input class="form-check-input" type="checkbox"  id="interpol_ME" name="interpol_ME"<?php if($chkIPL == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
                                                <label class="form-check-label" for="interpol_ME">
                                                    INTERPOL
                                                </label>
                                        </div>
                                    </div>  
                                    <div class="form-group col-md-4">
                                        <div class="form-check">
                                            <?php 
                                                
                                                $rFBI = $conexion->query("SELECT fbi FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                                $row = mysqli_fetch_array($rFBI);                                                       
                                                if($row[0] == 1){
                                                    $chkFBI = 1;
                                                }else{
                                                    $chkFBI = 0;
                                                } 
                                            ?>
                                            <input class="form-check-input" type="checkbox"  id="fbi_ME" name="fbi_ME"<?php if($chkFBI == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
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
                                            <?php 
                                                
                                                $rOFAC = $conexion->query("SELECT ofac FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                                $row = mysqli_fetch_array($rOFAC);                                                       
                                                if($row[0] == 1){
                                                    $chkOFAC = 1;
                                                }else{
                                                    $chkOFAC = 0;
                                                } 
                                            ?>
                                            <input class="form-check-input" type="checkbox"  id="ofac_ME" name="ofac_ME" <?php if($chkOFAC == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
                                                <label class="form-check-label" for="ofac_ME">
                                                    OFAC
                                                </label>
                                        </div>
                                    </div>   
                                    <div class="form-group col-md-4">
                                        <div class="form-check">
                                            <?php 
                                                
                                                $rUNSC = $conexion->query("SELECT listasConsoUNSC FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                                $row = mysqli_fetch_array($rUNSC);                                                       
                                                if($row[0] == 1){
                                                    $chkUNSC = 1;
                                                }else{
                                                    $chkUNSC = 0;
                                                } 
                                            ?>
                                            <input class="form-check-input" type="checkbox"  id="listaConsolidada_ME" name="listaConsolidada_ME"<?php if($chkUNSC == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
                                                <label class="form-check-label" for="listaConsolidada_ME">
                                                    Lista Consolidada UNSC
                                                </label>
                                        </div>
                                    </div>  
                                    <div class="form-group col-md-4">
                                        <div class="form-check">
                                            <?php 
                                                
                                                $rUE = $conexion->query("SELECT sancionesUE FROM controlesaplicados WHERE idCliente =".$varIdEmp."  and productoSolicitado = '".$varProd."' ");
                                                $row = mysqli_fetch_array($rUE);                                                       
                                                if($row[0] == 1){
                                                    $chkUE = 1;
                                                }else{
                                                    $chkUE = 0;
                                                } 
                                            ?>
                                            <input class="form-check-input" type="checkbox"  id="sancionesUE_ME" name="sancionesUE_ME"<?php if($chkUE == 1){ echo "checked='checked'"; } else { echo " "; }?> disabled>
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
                                    <textarea class="form-control" id="observaciones_ME" name="observaciones_ME" rows="3" disabled> <?php echo  str_replace("<br />","",$empEdit->__GET('observaciones'),); ?></textarea>
                                    </div>
                                            
                                </div>
                            </div>
                </div>
          
        
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>



    <script>
        $(document).ready(function ()
        {
            ////// ASIGNAMOS LOS VALORES A EDITAR EN LOS CONTROLES DEL FORMULARIO
            setValoresEmp();
            $(function(){
            setTextareaHeight($('textarea'));
            })
        });
    </script>

    <script>
        function setValoresEmp(){ 
            $("#idCli_PN").val("<?php echo $empEdit->__GET('idCliente') ?>");
  
        }
    </script>

    <script type="text/javascript">
        function printPageArea(divID) {
            var divContent = document.getElementById(divID);
            var WinPrint = window.open('', '', 'width=800,height=600');
            WinPrint.document.write('<link rel="stylesheet" type="text/css" href="css/styles.css">');
            WinPrint.document.write(divContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>

    <script>
        function setTextareaHeight(textareas) {
            textareas.each(function () {
                var textarea = $(this);
        
                if ( !textarea.hasClass('autoHeightDone') ) {
                    textarea.addClass('autoHeightDone');
        
                    var extraHeight = parseInt(textarea.css('padding-top')) + parseInt(textarea.css('padding-bottom')), // to set total height - padding size
                        h = textarea[0].scrollHeight - extraHeight;
        
                    // init height
                    textarea.height('auto').height(h);
        
                    textarea.bind('keyup', function() {
        
                        textarea.removeAttr('style'); // no funciona el height auto
        
                        h = textarea.get(0).scrollHeight - extraHeight;
        
                        textarea.height(h+'px'); // set new height
                    });
                }
            })
        }
    </script>
    <script>
        $(document).ready(function(){
                     

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
    



</body>

</html>