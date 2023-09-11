<?php
///error_reporting(0);

include '../Entidades/Busquedas/Circular.php';
include '../Entidades/Busquedas/Organismo.php';

include '../Datos/DtBusquedaInterna.php';
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$idUsuario = $_SESSION['idUsuario'];
$nombre = $_SESSION['usuario'];

$rol = $_SESSION ['idRol'];

$datosCircular = new DtBusquedaInterna();
//variables de jalerts

//variable de control msj Nuevo Empleado
$varMsjNewEmp = 0;
if(isset($varMsjNewEmp))
{ 
  $varMsjNewEmp = $_GET['msjNewEmp'];
}

/*
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
*/
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
        <title>Circulares</title>
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
    <body class="sb-nav-fixed" >
        
        <?php require "../dist/navbar.php" ?>
        <div id="layoutSidenav">
        <?php require "../dist/LayoutSidenav.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <h1 class="mt-4">Circulares</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuBusqueda.html">Busquedas </a></li>
                            <li class="breadcrumb-item active">Lista de circulares </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Este apartado es el encargado de mostrar todas las circulares realizadas </b>
                            </div>
                        </div>

                        <!-- cardbody agregar start-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-plus-circle"></i>
                                Realizar busqueda
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card bg-success text-white mb-4">
                                            <div class="card-body">Realizar una nueva busqueda</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="BusquedaInterna.php">Buscar</a>
                                                <div class="small text-white"><i class="fas fa-search"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card bg-info text-white mb-4">
                                            <div class="card-body">Agregar Organismo</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" data-toggle="modal" data-target="#exampleModal" href="#">Agregar </a>
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
                                Lista de circulares
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Fecha de busqueda</th>
                                                <th>Referencia</th>
                                                <th>Organismo</th>
                                                <th>Opciones</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach($datosCircular->listarCirculares() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('fechaBusqueda'); ?></td>
                                                    <td><?php echo $r->__GET('referencia'); ?></td>
                                                    <td><?php echo $r->__GET('subOrganismo'); ?></td>
                                                   
                                                    <td>
                                                        <a href="Constancia_list_interna.php?ref=<?php echo $r->__GET('referencia'); ?>" 
                                                        title="Ver circular">
                                                            <i class="fas fa-pen-square"></i>
                                                            Ver circular
                                                        </a>
                                                    </td>

                                                    
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Fecha de busqueda</th>
                                                <th>Referencia</th>
                                                <th>Organismo</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- Modal INSERT -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <form method="POST" action="../negocio/Gestion_Ng_Organismo.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Organismos reguladores</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="form-row">
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                    <label class="small mb-1"  for="nombre_O"> <b>Organismo</b> </label>
                                                        <input class="form-control py-4" name="nombre_O" id="nombre_O"
                                                        type="text" placeholder="Ingrese el nombre del organismo" autocomplete="off" required/>
                                                        <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario?>"/>
                                                        
                                                            
                                                    </div>
                                                                                                        
                                                    <div class="form-group">
                                                        <input class="btn btn-primary btn-block" type="submit" value="Guardar"/> &nbsp;
                                                        <input class="btn btn-danger btn-block" type="reset" value="Cancelar" data-dismiss="modal"/> &nbsp;
                                                    </div>
                                                                                                     
                                                    
                                                </div>

                                            </div>
                                       
                                    </div>
                                <!--
                                    <div class="modal-footer">
                                        
                                    </div>
                                -->
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- END MODAL INSERT-->

                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Versatec-Nicaragua 2022</div>
                            <div>
                                <a href="#">Politica de privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
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
            $(document).ready(function ()
            {
                ////// APLICAMOS FORMATO Y BOTONES A LA TABLA //// INICIAMOS EL PLUGIN DATATABLE
                $('#tbl_ctrl_bono').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel',
                    'print'
                    ]

                });

                /////////// VARIABLES DE CONTROL MSJ ///////////

                // Variables de control para organismos 
                var newEmp = 0;
                newEmp = "<?php echo $varMsjNewEmp ?>";

                if(newEmp == "1")
                {
                    successAlert('Éxito', 'Un nuevo organismo ha sido agregado');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del organismo e intente nuevamente');
                }
                if(newEmp == "3")
                {
                    errorAlert('Error', 'Al parece ya existe un organismos registrado con este nombre, revise los datos e intente nuevamente');
                }              

            });
        </script>
        
         <script>
            $(document).ready(function ()
            {
                ////// ASIGNAMOS LOS VALORES A EDITAR EN LOS CONTROLES DEL FORMULARIO
                setValoresEmp();
            });
        </script>
        <script>
            function setValoresEmp()
            {
                $("#idUsuario").val("<?php  echo $idUsuario ?>");
                

            }
        </script>

    </body>
</html>
