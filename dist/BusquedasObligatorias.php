<?php
error_reporting(0);

include '../Entidades/ListasInternas.php';
include '../Datos/DtListasInternas.php';
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

$busquedaListasInternas = new DtListasInternas();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Busquedas Obligatorias</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

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
                        <h1 class="mt-4">Busquedas obligatorias</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuBusqueda.html">Busquedas</a></li>
                            <li class="breadcrumb-item active">Busquedas Obligatorias</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Este apartado es el encargado de realizar una busqueda de un elemento hacia las listas restrictivas (ONU, PEP_NI, OFAC_SND, ETC.)
                            </div>
                        </div>
                        <div class="card mb-4"> 
                            <div class="card">
                                <div class="card-header">
                                    Busqueda del elemento
                                </div>
                                <form method="POST" action="BusquedasObligatorias.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input class="form-control py-4" name="buscar" autocomplete="off"
                                                type="search" placeholder="Ingrese la persona o entidad a buscar"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary btn-block" type="submit" value="Buscar" /> &nbsp;
                                            
                                        </div>
                                        
                                    </div>
                                </form>

                            </div>
                            
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Posible resultado
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                                                   
                                    <table class="table table-bordered" id="busquedaInterna" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Origen</th>
                                                                                                                                  
                                            </tr>
                                            
                                        </thead>

                                        <tbody>
                                            <?php foreach($busquedaListasInternas->BuscarListaInterna() as $r): ?>
                                                <tr>
                                                    
                                                    <td><?php echo $r->__GET('nombre'); ?></td>
                                                    <td><?php echo $r->__GET('origen'); ?></td>
                                                    

                                                    
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Origen</th>
                                                                                                                                                                                         
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
            // PRIMERA FORMA
            function deleteEmp()
            {
                window.location.href = "../negocio/NgComunidad.php?delEmp=<?php echo $r->__GET('id_comunidad'); ?>";
            }

            // SEGUNDA FORMA - INCLUYE EL API DE JALERT
            function deleteEmp2()
            {
            
            confirm(function(e,btn)
            { //event + button clicked
                e.preventDefault();
                window.location.href = "../negocio/NgComunidad.php?delEmp=<?php echo $r->__GET('id_comunidad'); ?>";
                //successAlert('Confirmed!');
            }, 
            function(e,btn)
            {
                e.preventDefault();
                //errorAlert('Denied!');
            });

            }
 
        </script>
        

        <script>
            $(document).ready(function ()
            {
                ////// APLICAMOS FORMATO Y BOTONES A LA TABLA //// INICIAMOS EL PLUGIN DATATABLE
                $('#busquedaInterna').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel',
                    'print'
                    ]

                });

                /////////// VARIABLES DE CONTROL MSJ ///////////
                var newEmp = 0;
                newEmp = "<?php echo $varMsjNewEmp ?>";

                if(newEmp == "1")
                {
                    successAlert('Éxito', 'La Comunidad ha sido registrada!!!');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos de la comunidad e intente nuevamente *_*');
                }

                var updEmp = 0;
                updEmp = "<?php echo $varMsjUpdEmp ?>";
                if(updEmp == "1")
                {
                    successAlert('Éxito', 'Los datos de la comunidad se actualizarón!!!');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos de la comunidad e intente nuevamente *_*');
                }

                var delEmp = 0;
                delEmp = "<?php echo $varMsjDelEmp ?>";

                if(delEmp == "1")
                {
                    successAlert('Éxito', 'La comunidad ha sido dado de baja !!!');
                }
                if(delEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos de la comunidad e intente nuevamente *_*');
                }

            });
        </script>




    </body>
</html>
