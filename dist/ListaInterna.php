<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
include '../Entidades/ListasInternas.php';
include '../Datos/DtListasInternas.php';

$datosListasInternas = new DtListasInternas();

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
        <title>Listas Restrictivas</title>
        <link rel="icon" href="./images/icon_versatec.png">
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
                      <h1 class="mt-4">Listas internas</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuLista.html">Listas</a></li>
                            <li class="breadcrumb-item active">Lista restrictivas</li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Este apartado administra la gestión todas personas o 
                                   entidades encontradas en las Listas Restrictivas
                                   (ONU, OFAC, PEP...)
                                </b>
                            </div>
                        </div>
                        <!-- cardbody agregar start-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-plus-circle"></i>
                                Agregar nuevas personas o entidades a las Listas Restrictivas
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card text-white mb-4" style="background-color:#2B3990;" >
                                            <div class="card-body">Agregar un elemento</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="newListaInterna.php">Agregar elemento</a>
                                                <div class="small text-white"><i class="fas fa-plus-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card text-white mb-4" style="background-color:#8DC63F;">
                                            <div class="card-body">Agregar muchos elementos</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="#">Agregar elementos</a>
                                                <div class="small text-white"><i class="fas fa-plus-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cardbody agregar end-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Gestion de listas restrictivas
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Ingreso</th>
                                                <th>Nombre</th>
                                                <th>Origen</th>
                                                <th>Razón</th>
                                                <th>Opciones</th>
                                           
                                            </tr>
                                            
                                        </thead>
                                        <tbody> 
                                            <?php foreach($datosListasInternas->listarListasInternas() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('fechaIngreso'); ?></td>
                                                    <td><?php echo $r->__GET('nombre'); ?></td>
                                                    <td><?php echo $r->__GET('origen'); ?></td>
                                                    <td><?php echo $r->__GET('razon'); ?></td>

                                                    <td>
                                                        <a href="#editListaInterna.php?editE=<?php echo $r->__GET('idListasInternas'); ?>" 
                                                        title="Modificar elemento">
                                                            <i class="fas fa-pen-square"></i>
                                                            Editar
                                                        </a>
                                                    
                                                        <br>
                                                        <!-- SEGUNDA FORMA -->
                                                        <a href="#" onclick="deleteEmp(<?php echo $r->__GET('idListasInternas'); ?>)" 
                                                        title="Eliminar un registro de Bono">
                                                            <i class="fas fa-trash-alt"></i>
                                                            Eliminar
                                                        </a>
                                                    </td>

                                                    
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Ingreso</th>
                                                <th>Nombre</th>
                                                <th>Origen</th>
                                                <th>Razón</th>
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

        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="assets/demo/datatables-demo.js"></script> -->
        
        
        <script>
          // SEGUNDA FORMA - INCLUYE EL API DE JALERT
          
          function deleteEmp($r)
            {
                
            confirm(function(e,btn)
            { //event + button clicked
                
                e.preventDefault();
                window.location.href = "../negocio/NgListaInterna.php?delEmp="+$r;
               
            }, 

            function(e,btn)
            {
                e.preventDefault();
                
            });

            }
        </script>
        

        <script>
            $(document).ready(function ()
            {
                ////// APLICAMOS FORMATO Y BOTONES A LA TABLA //// INICIAMOS EL PLUGIN DATATABLE
                $('#tbl_ctrl_bono').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel'//,
                    //'print'
                    ]

                });

                /////////// VARIABLES DE CONTROL MSJ ///////////

                
                var newEmp = 0;
                newEmp = "<?php echo $varMsjNewEmp ?>";

                if(newEmp == "1")
                {
                    successAlert('Éxito', '¡Se ha agregado un nueva persona o entidad exitosamente!');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos e intente nuevamente');
                }
                if(newEmp == "3")
                {
                    errorAlert('Error', 'Al parecer ya existe una entidad con los mismos datos,revise e intente nuevamente');
                }

                //mensajes de editar
                var updEmp = 0;
                updEmp = "<?php echo $varMsjUpdEmp ?>";
                if(updEmp == "1")
                {
                    successAlert('Éxito', '¡Se ha modificado un nueva persona o entidad exitosamente!');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos e intente nuevamente');
                }

                if(updEmp == "3")
                {
                    errorAlert('Error', 'Al parecer ya existe una entidad con los mismos datos,revise e intente nuevamente');
                }

                var delEmp = 0;
                delEmp = "<?php echo $varMsjDelEmp ?>";

                if(delEmp == "1")
                {
                    successAlert('Éxito', '¡La entidad o persona ha sido dado de baja exitosamente!');
                }
                if(delEmp == "2")
                {
                    errorAlert('Error', 'Error al eliminar la entidad o persona');
                }
                

            });
        </script>




    </body>
</html>
