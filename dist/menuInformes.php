<?php
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
    <title>Menu de informes</title>
    <link rel="icon" href="./images/icon_versatec.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->
    <script src="fontawesome5.15.1/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php require "../dist/navbar.php" ?>
    <div id="layoutSidenav">
    <?php require "../dist/LayoutSidenav.php" ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Menu de Informes</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Sistemas de prevención de lavado de activos V.1.1</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card text-white mb-4" style="background-color:#2B3990;">
                                <div class="card-body">Informe IDD</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="./listaInformesIDD.php">Opciones y Detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card text-white mb-4" style="background-color:#8DC63F;"> 
                                <div class="card-body">Evaluación de riesgos</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="./Matrices.php">Opciones y Detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>