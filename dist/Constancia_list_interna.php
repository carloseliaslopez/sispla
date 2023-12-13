<?php
//error_reporting(0);
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
//ENTIDADES
include '../Entidades/Busquedas/Circular.php';
include '../Entidades/Busquedas/Organismo.php';
include '../Entidades/Busquedas/PersonasObligadas.php';
include '../Entidades/Busquedas/vw_BusquedaInterna_Res.php';

//DATOS
include '../Datos/DtBusquedaInterna.php';
//INSTANCIAS

$matrizE = new DtBusquedaInterna();

//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
$varIdEmp = $_GET['ref'];

/*
$empEdit;
$empEdit = $matrizE->obtenerPersonasObligadas($varIdEmp);
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Constancia</title>
    <link rel="icon" href="./images/icon_versatec.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/NewStyles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->
    <script src="fontawesome5.15.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" media='all'
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        .myDiv{
        display:none;
        }
        .divcase{
            display:none; 
        } 
        #pdf{
            margin-top: 35px; margin-bottom: 35px; margin-right: 35px; margin-left: 35px;
        }
        p{
          font-family: Arial, Helvetica, sans-serif;  
          font-size: larger;
        }
        
    </style>

<style>
        @media print {
            @page {
                /* To give the user the possibility to choise between landscape and portrait printing format */
                size: auto;
                /* setting custom margin, so the date and the url can be displayed */
                /*margin: 40px 10px 35px;*/
            }

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
                    <div class="card">
                        <!--<div class="card mb-4">-->
                            <div  class="card-body" id= "pdf">
                                <div class="pdf-body" id="pdf-body">
    <!--    
                                <h4 id="h1Informe" name= "h1Informe" >Constancia de busquedas obligadas</h4>
                                    <hr>
    -->
                                    <div class="col-md-12" >
                                        <p class="text-right" ><b>
                                            <?php
                                        setlocale(LC_TIME, "spanish");
                                        echo strftime("%A, %d de %B de %Y");
                                        ?>
                                        </b></p>

                                    </div>
                                    <div class="space" id="space" style=" height: 70px">

                                    </div>
                                                            
                                    <p class="text-left">A interesados:</p>
                                    <div class="space" id="space" style=" height: 100px">

                                    </div>

                                    <p class="text-justify">
                                        Por este medio se hace constar que las personas enlistadas a continuación, 
                                        debidamente identificadas y bajo número de referencia, <b><?php echo $varIdEmp?></b>, 
                                        fueron filtradas de forma automatizadas en nuestas bases de datos:
                                        <b>Proveedores</b>, <b>Clientes</b>, <b>Empleados</b>, <br>
                                        obteniendo como resultado:
                                    </p>
                                    <div class="space" id="space" style=" height: 20px">

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                    <tr>
                                                        <th style="text-align:center" rowspan="2">Nombre completo</th>
                                                        <th  rowspan="2" style="text-align:center">Identificación</th>    
                                                        <th style="text-align:center" colspan="2">Coincidencia</th>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align:center" >Coincidencia</th>
                                                        <th style="text-align:center" >Relación</th>
                                                        
                                                    </tr>
                                                </thead>
                                                
                                                <?php foreach($matrizE->obtenerPersonasObligadas($varIdEmp) as $r): ?>
                                                    <tr>
                                                    
                                                        <td><?php echo $r->__GET('nombre'); ?></td>
                                                        <td><?php echo $r->__GET('identificacion'); ?></td>
                                                        
                                                        <td style="text-align:center"><?php echo $r->__GET('busqueda'); ?></td>
                                                        <td style="text-align:center"><?php echo $r->__GET('origen'); ?></td>                                                       
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                                    
                                        </table>
                                    </<div>
                                    <div class="space" id="space" style=" height: 30px">

                                    </div>
                                    <p class="text-left">Área de cumplimiento</p>
                                    <div class="space" id="space" style=" height: 30px">

                                    </div>
                                    <p class="text-center">____________________________</p>
                                    <p class="text-center"><b>nombre</b></p>
                                    <p class="text-center">cargo</p>
                                    <div class="space" id="space" style=" height: 60px">
                                    
                                    </div>
                                    <p class="text-justify" >
                                        <?php setlocale(LC_TIME, "spanish"); 
                                        echo strftime("Dado en la ciudad de Managua-Nicaragua, a los %d días del mes de %B de %Y"); ?>
                                    </p>


                                </div>
                            </div>
                        <!--</div>-->
                    </div>
                    <div class="card-body">
                        <!--Start buttons-->                                              
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-primary col-md-7" id="print"> <i class="fas fa-file-pdf"></i> Generar Informe</button>
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
                        <div class="text-muted">Todos los derechos Reservados &copy; Versatec 2022</div>
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

    
    <!--
    <script>
        function printPageArea(elem)
            {
                var mywindow = window.open('', 'PRINT', 'height=600,width=700');
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
        -->

        <!-- Another Jquery version, which will be compatible with PrintThis.js -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <!-- CDN/Reference To the pluggin PrintThis.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
            integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
            crossorigin="anonymous"></script>

        <script type="text/javascript">
            // important : to avoid conflict between the two version of Jquery
            var j = jQuery.noConflict(true);
            // define a function that you can call as an EventListener or whatever you want ...
            function Print_Specific_Element() {
                // the element's id must be unique .. 
                // you can't print multiple element, but can put them all in one div and give it an id, then you will be able to print them !
                // use the 'j' alias to call PrintThis, with its compatible version of jquery 
                j('#pdf').printThis({
                    importCSS: true, // to import the page css
                    importStyle: true, // to import <style>css here will be imported !</style> the stylesheets (bootstrap included !)
                    loadCSS: true, // to import style="The css writed Here will be imported !"
                    canvas: true // only if you Have image/Charts ... 
                });
            }

            $("#print").click(Print_Specific_Element);
        </script>





     <script>
        function regresar(){
            window.open ("ListaCirculares.php","_self")
        }
    </script>


</body>

</html>