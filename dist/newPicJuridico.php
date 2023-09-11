<?php
//error_reporting(0);

//ENTIDADES
include '../Entidades/Pic.php';
include '../Entidades/Compartidas/Empresa.php';

//DATOS
include '../Datos/DtPic.php';
include '../Datos/DtCombos.php';

$combos = new DtCombos();

//INSTANCIAS
//$datosLI = new DtListasInternas();
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$idUsuario = $_SESSION['idUsuario'];
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
        <title>PIC-Jurídico</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/NewStyles.css" rel="stylesheet" />
       
        

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
                        <h1 class="mt-4">Nuevo Perfil Persona-Jurídica</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Listas Internas</a></li>
                            <li class="breadcrumb-item active">Nuevo Perfil Persona-Jurídica</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Registrando un nuevo Perfil Persona-Jurídica
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Formulario para agregar Perfil Persona-Jurídica
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div style="text-align: right;">
                                        <a href="ListaClientes.php" title="Regresar a la página anterior">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Regresar
                                        </a>
                                    </div>
                                    <form method="POST" action="../negocio/NgPic.php">
                                        <div class="form-row">
                                            <div class="col-md-12" >
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Fecha de PIC</b></label>
                                                    <input class="form-control form-control-sm" name="fechaPic" id="fechaPic"
                                                    type="date" placeholder="Fecha de PIC" title="Fecha de PIC" autocomplete="off" required  max="9999-12-31"/>
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                    <input type="hidden" id="txtcategoria" name="txtcategoria" value="Jurídico"/>
                                                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario?>"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Nombre del cliente:</b></label>
                                                    <input class="UpperCase form-control form-control-sm " name="nombreCliente" id="nombreCliente"
                                                    type="text" placeholder="Nombre del cliente:" title="Nombre del cliente:" autocomplete="off" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" ><b>Número de identificación:</b></label>
                                                    <input class="form-control form-control-sm" name="id" id="id"
                                                    type="text" placeholder="Número de identificación" title="Número de identificación" autocomplete="off" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="empresa">Empresa a la que pertenece</label>
                                                    <select class="form-control form-control-sm" id="empresa" name="empresa">
                                                        <option selected disabled>Elegir..</option>
                                                        <?php foreach($combos->ComboCatEmpresa() as $r): ?>
                                                            <option value="<?php echo $r->__GET('idEmpresa') ?>"> <?php echo $r->__GET('razonSocial') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                              
                                                <div class="form-group">
                                                <input class="btn btn-primary btn-block" type="submit" value="Guardar" /> &nbsp;
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
                window.open ("ListaClientes.php","_self")
            }
        </script>
        <script>
            function Visitar(){
                window.open ("NewDataPicJuridico.php","_self")
            }
        </script>
        <script>
            $(document).ready( function () {
                    $(".UpperCase").on("keypress", function () {
                    $input=$(this);
                    setTimeout(function () {
                    $input.val($input.val().toUpperCase());
                    },30);
                })
            })
        </script>

    </body>
</html>
