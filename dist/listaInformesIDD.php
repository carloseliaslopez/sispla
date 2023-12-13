<?php
error_reporting(0);

//Recurso para la ejecucion del pic
include '../Entidades/Evaluacion/InformeGeneralIDD.php';
include '../Datos/DtMatrizEvaluacion.php';

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
$datosIDD = new DtMatrizEvaluacion();


//variable de control msj Nuevo Empleado

$varMsjNewEmp = 0;
if(isset($varMsjNewEmp))
{ 
  $varMsjNewEmp = $_GET['msjNewEmp'];
}

//variable de control msj Actualizar Empleado
$varMsjUpdEmp = 0;
if(isset($varMsjUpdEmp))
{ 
  $varMsjUpdEmp = $_GET['msjEditEmp'];
}

//variable de control msj Eliminar Empleado
$varMsjDelEmp = 0;
if(isset($varMsjDelEmp))
{ 
  $varMsjDelEmp = $_GET['msjDelEmp'];
}

//fin jalerts
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Informes IDD</title>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->
        
        <!-- DATATABLE -->
        <link href="DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
         <!-- DATATABLE buttons -->
        <link href="DataTables/Buttons-1.6.3/css/buttons.dataTables.min.css" rel="stylesheet">
       <!-- jAlert css  -->
       <link rel="stylesheet" href="jAlert/dist/jAlert.css" />
       
    </head>
    <body class="sb-nav-fixed">
    <?php require "../dist/navbar.php" ?>
        <div id="layoutSidenav">
        <?php require "../dist/LayoutSidenav.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <h1 class="mt-4">Clientes</h1>
                      <link rel="icon" href="./images/icon_versatec.png">
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuInformes.html">Listas </a></li>
                            <li class="breadcrumb-item active">Lista de informes de cliente </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <b> En este apartado se visualiza a todos los clientes evaluados</b>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Informes
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>fecha de revisión</th>
                                                <th>Cliente</th>
                                                <th>Producto Solicitado</th>
                                                <th>Pais de solicitud</th>
                                                <th>Riesgo</th>
                                                <th>Opciones</th>
                                           
                                            </tr>
                                            
                                        </thead>
                                        <tbody> 
                                            <?php foreach($datosIDD->ListarInformesIDD() as $r): ?>
                                                <tr>
                                                
                                                    <td><?php echo $r->__GET('fechaRevision'); ?></td>
                                                    <td><?php echo $r->__GET('cliente'); ?></td>
                                                    <td><?php echo $r->__GET('productoSolicitado'); ?></td>
                                                    <td><?php echo $r->__GET('paisCliente'); ?></td>
                                                    <td><?php echo $r->__GET('riesgo'); ?></td>
                                                    
                                                    <td>
                                                    
                                                        <a href="#" onclick="Ver(<?php echo $r->__GET('idCliente'); ?>,'<?php echo $r->__GET('productoSolicitado'); ?>')" 
                                                        title="Ver Informe Completo">
                                                        <i class="fas fa-eye"></i>
                                                            Ver
                                                        </a>
                                                        <br>
                                                        <a href="#" onclick="Print(<?php echo $r->__GET('idCliente'); ?>,'<?php echo $r->__GET('productoSolicitado'); ?>')" 
                                                        title="Ver Informe de impresion">
                                                        <i class="fas fa-file-pdf"></i></i>
                                                            Impresion
                                                        </a>
                                                        
                                                    </td>

                                                    
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>fecha de revisión</th>
                                                <th>Cliente</th>
                                                <th>Producto Solicitado</th>
                                                <th>Pais de solicitud</th>
                                                <th>Riesgo</th>
                                                <th>Opciones</th>
                                           
                                            </tr>
                                        </tfoot>
                                    </table>
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
        <!-- jAlert js -->
        <script src="jAlert/dist/jAlert.min.js"></script>
        <script src="jAlert/dist/jAlert-functions.min.js"> //optional!!</script>

        
        <script>
          // Tratatando de realizar el cambio 
          function Ver($id, $ct)
            {
                window.open("verMatrizEvaluacion.php?editE="+$id+"&editProd="+$ct, "self");
                

            }
            function Print($id, $ct)
            {
                window.open("printMatrizEvaluacion.php?editE="+$id+"&editProd="+$ct, "self");
                

            }
        </script>
  

        <script>
            $(document).ready(function ()
            {
                ////// APLICAMOS FORMATO Y BOTONES A LA TABLA //// INICIAMOS EL PLUGIN DATATABLE
                
                $('#tbl_ctrl_bono').DataTable({
                    dom: 'Bfrtip',
                    
                    buttons: [
                    //'pdf',//
                    //'excel'//,
                    //'print'
                    ]

                });
                
                /////////// VARIABLES DE CONTROL MSJ ///////////
                
                var newEmp = 0;
                newEmp = "<?php echo $varMsjNewEmp ?>";

                if(newEmp == "1")
                {
                    successAlert('Éxito', 'la matriz ha sido guardada exitosamente');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos de la matriz o entidad e intente nuevamente');
                }

                if(newEmp == "3")
                {
                    errorAlert('Error', 'Al parecer ya existe una entidad con la misma identificacion, verifique los datos e intente nuevamente');
                }

                var updEmp = 0;
                updEmp = "<?php echo $varMsjUpdEmp ?>";
                if(updEmp == "1")
                {
                    successAlert('Éxito', 'Los datos del bono se actualizarón!!!');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del bono e intente nuevamente *_*');
                }

                var delEmp = 0;
                delEmp = " <?php echo $varMsjDelEmp ?>";

                if(delEmp == "1")
                {
                    successAlert('Éxito', 'El bono ha sido dado de baja !!!');
                }
                if(delEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del bono e intente nuevamente *_*');
                }
            });
        </script>
        



    </body>
</html>
