<?php
//error_reporting(0);

//Integracion y validacion de sesion
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];

$rol = $_SESSION['idRol'];
if ($rol <> 1){
    header("Location: ../dist/401.html");
}

//entidades y datps
include '../Entidades/Seguridad/Usuario.php';
include '../Datos/DtSeguridad.php';

$datosEmp = new DtSeguridad();
//variables de jalerts

// Generate Random Password
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@$%&*_";
$password = substr( str_shuffle( $chars ), 0, 8 );



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nuevo Empleado</title>
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
                        <h1 class="mt-4">Nuevo Usuario</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./Usuario.php">Lista de Usuarios</a></li>
                            <li class="breadcrumb-item active">Nuevo Usuario</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Registrando un nuevo Usuario
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Formulario para agregar un Usuario
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div style="text-align: right;">
                                        <a href="ListaEmpleados.php" title="Regresar a la página anterior">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Regresar
                                        </a>
                                    </div>
                                    <form method="POST" action="../negocio/Ng_Usuario.php">
                                        <div class="form-row">
                                            <div class="col-md-12" >
                                                <div class="form-group">
                                                   <label class="small mb-1" > <b>Nombres:</b> </label>
                                                    <input class="form-control py-4" name="nombre" id="nombre"
                                                    type="text" placeholder="Nombres " autocomplete="off" required/>
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                    <input type="hidden" id="rand_pwd" name="rand_pwd"  value="<?php echo $password?>"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Apellidos:</b></label>
                                                    <input class="form-control py-4" name="apellidos" id="apellidos"
                                                    type="text" placeholder="Apellidos" autocomplete="off" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Usuario:</b> </label>
                                                    <input class="form-control py-4" name="usuario" id="usuario"
                                                    type="text" placeholder="Usuario" autocomplete="off" required/>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Correo corporativo:</b> </label>
                                                    <input class="form-control py-4" name="correo" id="correo"
                                                    type="email" placeholder="Correo corporativo" autocomplete="off" required/>
                                                    
                                                </div>
                                                <!--
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Contraseña:</b> </label>
                                                    <input class="form-control py-4" name="password" id="password"
                                                    type="text" placeholder="Contraseña" autocomplete="off" required/>
                                                    
                                                </div>
                                                !-->
                                              
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
            function regresar(){
                window.open ("Usuario.php","_self")
            }
        </script>
    </body>
</html>
