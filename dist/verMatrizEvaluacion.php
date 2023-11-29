
<?php
error_reporting(0);
$conexion = new mysqli('localhost','admin','adminCump123.','sispla');

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

//INSTANCIAS
$combos = new DtCombos();
$matrizE = new DtMatrizEvaluacion();


//$matrizMRN = new DtMatrizRiesgoNatural();
//$matrizMRC = new DtMatrizEvaluacion();
//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
$varIdEmp = $_GET['editE'];
$varProd = $_GET['editProd'];

$conexion = new mysqli('localhost','admin','adminCump123.','sispla');

$empEdit;
$empEdit = $matrizE->obtenerClienteInforme($varIdEmp, $varProd);

$controlAp;
$controlAp = $matrizE->ListarControlesAplicados($varIdEmp, $varProd);
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Informe IDD</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/NewStyles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->
    <script src="fontawesome5.15.1/js/all.min.js"></script>
    <style>
        .myDiv{
        display:none;
        }
        .divcase{
            display:none; 
        }  
    </style>
</head>
<body class="sb-nav-fixed" >
<?php require "../dist/navbar.php" ?>
    <div id="layoutSidenav">
    <?php require "../dist/LayoutSidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    
                    <div class="card mb-4">
                        <div class="card-body" id= "pdf">
                        <h4 id="h1Informe" name= "h1Informe"  >Informe de Debida Diligencia</h4>
                        <hr>
                            <div class="table-responsive">
                                <form method="#" action="#" >
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-9">
                                                <input type="hidden" name="idCli_PN" id="idCli_PN" />
                                                <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>

                                                <label class="large mb-2" for="razonSocial_ME" ><b>Razón Social o Nombre Completo del Cliente</b></label>
                                                <input type="text" class="form-control form-control-md" id="razonSocial_ME" name="razonSocial_ME" 
                                                placeholder="Razón Social o Nombre Completo del Cliente"  value="<?php echo $empEdit->__GET('cliente') ?>" disabled>
                                            </div>  
                                            <div class="form-group col-md-3">
                                                <label class="large mb-2" for="tipoCliente_ME" ><b>Tipo de Cliente</b></label>
                                                  
                                                <input type="text" class="form-control form-control-md" id="tipoCliente_ME" name="tipoCliente_ME" 
                                                    placeholder="Tipo de Cliente" value="<?php echo $empEdit->__GET('tipoCliente') ?>" disabled>
                                            </div>          
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="large mb-2" for="pSolicitado_ME" ><b>Producto Solicitado</b></label>
                                                <input type="text" class="form-control form-control-md" id="pSolicitado_ME" name="pSolicitado_ME" 
                                                    placeholder="Producto Solicitado" value="<?php echo $empEdit->__GET('productoSolicitado') ?>" disabled>

                                            </div>      
                                            <div class="form-group col-md-3">
                                                <label class="large mb-2" for="pais_ME"><b>País</b></label>
                                                <input type="text" class="form-control form-control-md" id="pais_ME" name="pais_ME" 
                                                    placeholder="País" value="<?php echo $empEdit->__GET('paisCliente') ?> " disabled>
                                            </div>  
                                            <div class="form-group col-md-2">
                                                <label class="large mb-2" for="monto_ME" ><b>Monto</b></label>
                                                <input type="number" class="form-control form-control-md" id="monto_ME" name="monto_ME" 
                                                    placeholder="Monto" autocomplete="off" value="<?php echo $empEdit->__GET('monto') ?>" disabled >
                                            </div>  
                                            <div class="form-group col-md-3">
                                                <label class="large mb-2" for="fechaRevision_ME" ><b>Fecha de revisión</b></label>
                                                <input type="date" class="form-control form-control-md" id="fechaRevision_ME" name="fechaRevision_ME" 
                                                    autocomplete="off" value="<?php echo $empEdit->__GET('fechaRevision') ?>" disabled>
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
                                        </div>
                                    </div>
                                    <!--Start table Principales clientes-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                            <thead>
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
                                                   
                                                    //$varIdEmp = $_GET['editE'];
                                                    //$varProd = $_GET['editProd'];
    
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
                                                       
                                                        //$varIdEmp = $_GET['editE'];
                                                        //$varProd = $_GET['editProd'];
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
                                                        //$conexion = new mysqli('localhost','root','CEal2000!','versatec');
                                                        //$varIdEmp = $_GET['editE'];
                                                        //$varProd = $_GET['editProd'];
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
                                                        //$conexion = new mysqli('localhost','root','CEal2000!','versatec');
                                                        //$varIdEmp = $_GET['editE'];
                                                        //$varProd = $_GET['editProd'];
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
                                                        //$conexion = new mysqli('localhost','root','CEal2000!','versatec');
                                                        //$varIdEmp = $_GET['editE'];
                                                        //$varProd = $_GET['editProd'];
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
                                                        //$conexion = new mysqli('localhost','root','CEal2000!','versatec');
                                                        //$varIdEmp = $_GET['editE'];
                                                        //$varProd = $_GET['editProd'];
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
                                                        //$conexion = new mysqli('localhost','root','CEal2000!','versatec');
                                                        //$varIdEmp = $_GET['editE'];
                                                        //$varProd = $_GET['editProd'];
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
                                                        //$conexion = new mysqli('localhost','root','CEal2000!','versatec');
                                                        //$varIdEmp = $_GET['editE'];
                                                        //$varProd = $_GET['editProd'];
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
                                                        //$conexion = new mysqli('localhost','root','CEal2000!','versatec');
                                                        //$varIdEmp = $_GET['editE'];
                                                       // $varProd = $_GET['editProd'];
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
                                     <!--
                                   
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label><b>IV. Observaciones</b></label>
                                            </div>
                                        </div>
                                    </div>
                                   

                                   
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <textarea class="form-control" id="observaciones_ME" name="observaciones_ME" rows="3" disabled> </?php echo  str_replace("<br />","",$empEdit->__GET('observaciones'),); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                                    -->
                                </form>   
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Start buttons-->                                              
                        <div class="col-md-12">
                            <div class="form-row">
                                
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary col-md-7" onclick="printPageArea('pdf')"> <i class="fas fa-file-pdf"></i> Generar Informe</button>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success col-md-7" onclick="regresar()"> Atras</button>
                                </div>                   
                            </div>
                        </div>
                        <!--End buttons --> 
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

    <!--SCRIPT PARA LAS FUNCIONES DE CAMBIO-->
    <script type="text/javascript" src="./Jscript/Panama/Natural/selects.js"></script>
    <script type="text/javascript" src="./Jscript/Panama/Natural/Funciones.js"></script>
    <script type="text/javascript" src="./documentacion.js"></script>
   

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

    <script>
        function regresar(){
            window.open ("listaInformesIDD.php","_self")
        }
    </script>

    <script>
        function printPageArea(elem)
            {
                var mywindow = window.open('', 'PRINT', 'height=500,width=700');
                //setValoresEmp();
                mywindow.document.write('<html><head>');
                mywindow.document.write("<link href=\"./css/styles.css\" rel=\"stylesheet\"><link href=\"./css/NewStyles.css\" rel=\"stylesheet\">")
                mywindow.document.write("<link href=\"./css/styles.css\" rel=\"stylesheet\"><link href=\"./css/NewStyles.css\" rel=\"stylesheet\">")

                mywindow.document.write('</head><body>');
                mywindow.document.write(document.getElementById('pdf').innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/


                setTimeout(function () {
                mywindow.print();
                mywindow.close();
                }, 1000)
                return true;
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