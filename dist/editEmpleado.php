<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/Empleados.php';

//DATOS
include '../Datos/DtEmpleados.php';

//INSTANCIAS
$datosEmp = new DtEmpleados();

//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
$varIdEmp = $_GET['editE'];

$empEdit;
$empEdit = $datosEmp->ObtenerEmpleado($varIdEmp);
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
        <title>Editar Empleado</title>
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
                            <li class="breadcrumb-item"><a href="./ListaEmpleados.php">Lista de Empleados</a></li>
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
                                        <a href="ListaEmpleados.php" title="Regresar a la página anterior">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Regresar
                                        </a>
                                    </div>
                                    <form method="POST" action="../negocio/NgEmpleados.php">
                                        <div class="form-row">
                                            <div class="col-md-12" >
                                                <div class="form-group">
                                                   <label class="small mb-1" > <b>Nombres y Apellidos:</b> </label>
                                                    <input class="form-control py-4" name="nombre" id="nombre"
                                                    type="text" placeholder="Nombre completo del empleado" autocomplete="off" required/>
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="2"/>
                                                    <input type="hidden" name="idpro" id="idpro" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Ubicación:</b></label>
                                                    <input class="form-control py-4" name="ubicacion" id="ubicacion"
                                                    type="text" placeholder="Pais en que reside el empleado" autocomplete="off" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Nombre de la empresa:</b> </label>
                                                    <input class="form-control py-4" name="nombreEmpresa" id="nombreEmpresa"
                                                    type="text" placeholder="Nombre de la empresa en que labora" autocomplete="off" required/>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Área laboral:</b> </label>
                                                    <input class="form-control py-4" name="areaLaboral" id="areaLaboral"
                                                    type="text" placeholder="Área laboral en que se desempeña" autocomplete="off" required/>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Puesto:</b> </label>
                                                    <input class="form-control py-4" name="puesto" id="puesto"
                                                    type="text" placeholder="Puesto que desempeña en la empresa" autocomplete="off" required/>
                                                    
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
                $("#ubicacion").val("<?php echo $empEdit->__GET('ubicacion') ?>");
                $("#nombreEmpresa").val("<?php echo $empEdit->__GET('nombreEmpresa') ?>");
                $("#areaLaboral").val("<?php echo $empEdit->__GET('areaLaboral') ?>");
                $("#puesto").val("<?php echo $empEdit->__GET('puesto') ?>");
              
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
                window.open ("ListaEmpleados.php","_self")
            }
        </script>



    </body>
</html>
