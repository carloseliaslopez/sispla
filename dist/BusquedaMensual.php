<?php
error_reporting(0);

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
$user = $_SESSION['idUsuario'];
include '../Datos/DtBusqueda_100.php';

include '../Entidades/Busquedas/Busqueda_100.php';
include '../Entidades/Busquedas/Busqueda_80.php';

include '../dist/BusquedaPosibles.php';

$datosBusq = new DtBusqueda_100();


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Busquedas Mensuales</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/NewStyles.css" rel="stylesheet" />
   
        <!-- DATATABLE -->
        <link href="DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
         <!-- DATATABLE buttons -->
        <link href="DataTables/Buttons-1.6.3/css/buttons.dataTables.min.css" rel="stylesheet">
       <!-- jAlert css  -->
       <link rel="stylesheet" href="jAlert/dist/jAlert.css" />
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
                        <h1 class="mt-4">Busquedas Mensuales</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuBusqueda.html">Busquedas</a></li>
                            <li class="breadcrumb-item active">Busqueda Mensual</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Este apartado es el encargado de conocer si un cliente es parte de una lista restrictiva.
                            </div>
                        </div>
                        <div class="card mb-4"> 
                            <div class="card">
                                <div class="card-header">
                                   Busquedas mensuales
                                </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="large mb-2" for="matriz" ><b>Seleccione el tipo de resultado</b></label>
                                                        <select  class="form-control form-control-md" id="matriz" name="matriz">
                                                            <option selected disabled>Seleccione..</option>
                                                            <option value="One">Coincidencia Exacta</option>
                                                            <option value="Two">Falso Positivo</option>  
                                                            <option value="Three">Sin Coincidencias</option>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--START BOX TABLA >>-->
                        <div class="myDiv" id="showOne">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Clientes, empleados y proveedores encontrados con una coincidencia positiva
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"> 
                                        <table class="table table-bordered" id="tbl_Coin_E" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Identificacion</th>
                                                    <th>Origen</th> 
                                                    <th>lista Encontrada</th> 
                                                    <th>Opciones</th>   
                                                </tr>  
                                            </thead>
                                            <tbody> 
                                                <?php foreach($datosBusq->listarBusqueda_100() as $r): ?>
                                                    <tr>
                                                        <td><?php echo $r->__GET('nombre'); ?></td>
                                                        <td><?php echo $r->__GET('id'); ?></td>
                                                        <td><?php echo $r->__GET('relacion'); ?></td>
                                                        <td><?php echo $r->__GET('origen'); ?></td>
                                                    
                                                                                                                                                                    
                                                        <td>
                                                            <a href="verPosibles.php?editE=<?php echo $r->__GET('nombre'); ?>" 
                                                            title="Posibles coincidencias">
                                                                <i class="fas fa-pen-square"></i>
                                                                Ver
                                                            </a>
                                                        </td>   
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>   
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Identificacion</th>
                                                    <th>Origen</th> 
                                                    <th>lista Encontrada</th> 
                                                    <th>Opciones</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <!--END BOX TABLA >>-->
                        <!--START BOX TABLA >>-->
                        <div class="myDiv" id="showTwo">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Clientes, empleados y proveedores encontrados con una coincidencia posible
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"> 
                                        <table class="table table-bordered" id="tbl_Coin_P" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Identificacion</th>
                                                    <th>Origen</th> 
                                                    <th>Posible</th>
                                                    <th>Lista</th>
                                                    <th>Opciones</th>

                                                </tr>  
                                            </thead>
                                            <tbody>
                                                <?php foreach($datosBusq->listarBusqueda_80() as $r): ?>
                                                    <tr>
                                                        <td><?php echo $r->__GET('Nombre'); ?></td>
                                                        <td><?php echo $r->__GET('Id'); ?></td>
                                                        <td><?php echo $r->__GET('Origen'); ?></td>
                                                        <td><?php echo $r->__GET('Nombre2'); ?></td>
                                                        <td><?php echo $r->__GET('Origen2'); ?></td>
                                                                                                                                                                                                                            
                                                        <td>
                                                            <a href="#" onclick="Reportar(<?php echo $r->__GET('idPosibles_List'); ?>)" 
                                                            title="Reportar Coincidente">
                                                            <i class="fas fa-exclamation-triangle " style="color: #fbff00;"></i>
                                                               Reportar 
                                                            </a>
                                                            <br>
                                                            <a href="#" onclick="Eliminar(<?php echo $r->__GET('idPosibles_List'); ?>)" 
                                                            title="Reportar Coincidente">
                                                            <i class="fas fa-trash " style="color: #ff0000;"></i>  
                                                            Eliminar
                                                            </a>
                                                            
                                                       </td>   
                                                    </tr>
                                                <?php endforeach; ?> 
                                            </tbody>   
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Identificacion</th>
                                                    <th>Origen</th> 
                                                    <th>Posible</th>
                                                    <th>Lista</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <!--END BOX TABLA >>-->
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

        <!-- jAlert js -->
        <script src="jAlert/dist/jAlert.min.js"></script>
        <script src="jAlert/dist/jAlert-functions.min.js"> //optional!!</script>

       
        <script>
            $(document).ready(function (){
                
                ////// APLICAMOS FORMATO Y BOTONES A LA TABLA //// INICIAMOS EL PLUGIN DATATABLE
                $('#TblBusquedaInterna').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel',
                    'print'
                    ]

                });
                
            });
        </script>

        <script>
            $(document).ready(function(){
                $('#matriz').on('change', function(){
                    var demovalue = $(this).val(); 
                    
                    $("div.myDiv").hide();
                    $("#show"+demovalue).show();
                });

                $('#tbl_Coin_P').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel',
                    'print'
                    ]

                });

                $('#tbl_Coin_E').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel',
                    'print'
                    ]

                });

            });
        </script>
       <script>
          // SEGUNDA FORMA - INCLUYE EL API DE JALERT
          function Eliminar($r, $s)
            {
            
            confirm(function(e,btn)
            { //event + button clicked
                e.preventDefault();
                
                
                window.location.href = "../negocio/Ng_BusquedaInterna_80.php?delEmp="+$r;
                
                //successAlert('Confirmed!');
            }, 
            function(e,btn)
            {
                e.preventDefault();
                //errorAlert('Denied!');
            });

            }
        </script>



    </body>
</html>
