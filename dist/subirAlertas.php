
<?php
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}

$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Insertar registros</title>
    <link rel="icon" href="./images/icon_versatec.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/cssGenerales.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="fontawesome5.15.1/js/all.min.js"></script>

</head>

<body class="sb-nav-fixed">
    <?php require "../dist/navbar.php" ?>
    <div id="layoutSidenav" >
    <?php require "../dist/LayoutSidenav.php" ?>
    
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <!--logos de VERSATEC-->
                    <div class="col-md-12" >
                        <div class="form-row">  
                                                                        
                            <div class="form-group col-md-4" style="align-content: center; padding: 50px 30px;">
                                <img src="./images/logo_fc.png"  style="max-width:100%;width:auto;height:auto; "/>
                            </div>
                            <div class="form-group col-md-2">
                                
                            </div>
                            <div class="form-group col-md-2">
                                
                            </div> 

                        </div>
                    </div>
                    <!--logos de VERSATEC-->

                    <h3 class="text-center">
                        Importar Archivo CSV correspondiente a cada Oficina 
                    </h3>
                    <hr>
                    <br><br>

                    <div class="col-md-12" >
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header bg-alerts text-center">
                                        <b>V_SYSTEM PANAMA</b>
                                    </div>
                                    <div class="card-body">
                                        <form action="./validacionMonit/recibe_cvs_dsy.php" method="POST" enctype="multipart/form-data">
                                            <div class="file-input text-center">
                                                <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv" required/>
                                                <label class="file-input__label" for="file-input">
                                                <i class="fas fa-file-upload "></i>
                                                <span>Elegir Archivo</span> </label
                                                >
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="subir" class="btn-enviar" value="Importar" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header bg-alerts text-center">
                                        <b>PROFIT PANAMA</b>
                                    </div>
                                    <div class="card-body">
                                        <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data">
                                            <div class="file-input text-center">
                                                <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv" required/>
                                                <label class="file-input__label" for="file-input">
                                                <i class="fas fa-file-upload "></i>
                                                <span>Elegir Archivo</span> </label
                                                >
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="subir" class="btn-enviar" value="Importar"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header bg-alerts text-center">
                                        <b>PROFIT COLATERIZADA</b>
                                    </div>
                                    <div class="card-body">
                                        <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data">
                                            <div class="file-input text-center">
                                                <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv"/>
                                                <label class="file-input__label" for="file-input">
                                                <i class="fas fa-file-upload "></i>
                                                <span>Elegir Archivo</span> </label
                                                >
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="subir" class="btn-enviar" value="Importar"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header bg-alerts text-center">
                                        <b class="bg-alerts-label">VSYSTEM GUATEMALA</b>
                                    </div>
                                    <div class="card-body">
                                        <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data">
                                            <div class="file-input text-center">
                                                <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv"/>
                                                <label class="file-input__label" for="file-input">
                                                <i class="fas fa-file-upload "></i>
                                                <span>Elegir Archivo</span> </label
                                                >
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="subir" class="btn-enviar" value="Importar"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header bg-alerts text-center">
                                        <b>PROFIT COSTA RICA</b>
                                    </div>
                                    <div class="card-body">
                                        <form action="./validacionMonit/recibe_cvs_dsy.php" method="POST" enctype="multipart/form-data">
                                            <div class="file-input text-center">
                                                <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv"/>
                                                <label class="file-input__label" for="file-input">
                                                <i class="fas fa-file-upload "></i>
                                                <span>Elegir Archivo</span> </label
                                                >
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="subir" class="btn-enviar" value="Importar"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header bg-alerts text-center">
                                        <b>PROFIT GUATEMALA</b>
                                    </div>
                                    <div class="card-body">
                                        <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data">
                                            <div class="file-input text-center">
                                                <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv"/>
                                                <label class="file-input__label" for="file-input">
                                                <i class="fas fa-file-upload "></i>
                                                <span>Elegir Archivo</span> </label
                                                >
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="subir" class="btn-enviar" value="Importar"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <!-- PLUGIN FONTAWESOME -->
    <script src="fontawesome5.15.1/js/all.min.js"></script>
    
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