<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/Proveedores.php';

//DATOS
include '../Datos/DtProveedores.php';

//INSTANCIAS
$datosprov = new DtProveedores();

//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
$varIdEmp = $_GET['editE'];

$empEdit;
$empEdit = $datosprov->ObtenerProveedor($varIdEmp);

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
        <title>Nuevo Proveedor</title>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->
        
        <!-- DATATABLE -->
        <link href="DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
         <!-- DATATABLE buttons -->
        <link href="DataTables/Buttons-1.6.3/css/buttons.dataTables.min.css" rel="stylesheet">
       
       
    </head>
    <body class="sb-nav-fixed">
    <?php require "../dist/navbar.php" ?>
        <div id="layoutSidenav">
        <?php require "../dist/LayoutSidenav.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Editar elemento</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./ListaProveedores.php">Lista de proveedores</a></li>
                            <li class="breadcrumb-item active">editar elemento</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Editando un nuevo elemento
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Formulario para editar un elemento
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div style="text-align: right;">
                                        <a href="ListaProveedores.php" title="Regresar a la página anterior">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Regresar
                                        </a>
                                    </div>
                                    <form method="POST" action="../negocio/NgProveedores.php">
                                        <div class="form-row">
                                            <div class="col-md-12" >
                                                <div class="form-group">
                                                   <label class="small mb-1" > <b>Nombre:</b> </label>
                                                   <input type="hidden" name="idpro" id="idpro" />
                                                    <input class="form-control py-4" name="nombre" id="nombre"
                                                    type="text" placeholder="Ingrese el nombre del proveedor" title="Ingrese el nombre de la persona o entidad" autocomplete="off" required/>
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="2"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Identificación:</b></label>
                                                    <input class="form-control py-4" name="id" id="id"
                                                    type="text" placeholder="Ingrese la identificación del proveedor (cedula juridica)" title="Ingrese la identificación del del proveedor (cedula juridica)" autocomplete="off" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Ubicación:</b> </label>
                                                    <input class="form-control py-4" name="ubicacion" id="ubicacion"
                                                    type="text" placeholder="Ingrese el departamento o provincia del proveedor" title="Ingrese el departamento o provincia del proveedor" autocomplete="off" required/>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Servicio:</b> </label>
                                                    <input class="form-control py-4" name="servicio" id="servicio"
                                                    type="text" placeholder="Ingrese el servicio que ofrece el proveedor" title="Ingrese el servicio que ofrece el proveedor" autocomplete="off" required/>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Actividad económica:</b> </label>
                                                    <input class="form-control py-4" name="actividadEconomica" id="actividadEconomica"
                                                    type="text" placeholder="Ingrese la actividad economica del proveedor" title="Ingrese la actividad economica del proveedor" autocomplete="off" required/>
                                                    
                                                </div>

                                              
                                                <div class="form-group">
                                                <input class="btn btn-primary btn-block" type="submit" value="Guardar"/> &nbsp;
                                                <input class="btn btn-danger btn-block" type="reset" value="Cancelar" onclick="regresar()"/> &nbsp;
                                                </div>
                                            </div>

                                        </div>
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


        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="assets/demo/datatables-demo.js"></script> -->

        <script>
            function setValoresEmp()
            {
                $("#idpro").val("<?php echo $varIdEmp ?>");
                $("#nombre").val("<?php echo $empEdit->__GET('nombre') ?>");
                $("#id").val("<?php echo $empEdit->__GET('id') ?>");
                $("#ubicacion").val("<?php echo $empEdit->__GET('ubicacion') ?>");
                $("#servicio").val("<?php echo $empEdit->__GET('servicio') ?>");
                $("#actividadEconomica").val("<?php echo $empEdit->__GET('actividadEconomica') ?>");
              
            }

        </script>

        <script>
            $(document).ready(function ()
            {
                ////// ASIGNAMOS LOS VALORES A EDITAR EN LOS CONTROLES DEL FORMULARIO
                setValoresEmp();
            });
        </script>

        <script>
            function regresar(){
                window.open ("ListaProveedores.php","_self")
            }
        </script>



    </body>
</html>
