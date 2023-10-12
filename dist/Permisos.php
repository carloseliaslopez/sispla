<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/Seguridad/Usuario.php';

//DATOS
include '../Datos/DtSeguridad.php';
$combos = new DtSeguridad();


session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
//INSTANCIAS


//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EMPLEADO
//$varIdEmp = $_GET['dataPIC'];

//$empEdit;
//$empEdit = $datospic->ObtenerPic($varIdEmp);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Matriz de Riesgo</title>
       
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/NewStyles.css" rel="stylesheet" />
        <link href="./select2/dist/css/select2.css" rel="stylesheet" />
       
        <style>
            .myDiv{
            display:none;
            }  
        </style>
    </head>

    <body class="sb-nav-fixed">
        <?php require "../dist/navbar.php" ?>
        <div id="layoutSidenav">
            <?php require "../dist/LayoutSidenav.php" ?>
            

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 id="h1Informe" name= "h1Informe"  class="mt-4">Seguridad - Permisos Otorgados</h4>
                        <h5 id="h1Informe" name= "h1Informe"  class="mt-1">Usuarios</h5>
                        <!--Start encabezado-->
                        <div class="col-md-12" >
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                                    
                                </div>
                            </div>
                        </div>
                        <!--End encabezado-->
                        <form method="POST" action="../negocio/NgMatrizRiesgoJuridico.php" id="myForm" >
                            <div class="card mb-3">
                                <div class="col-md-12" >
                                    <div class="form-row">
                                        <div class="form-group col-md-6" >
                                            <label class="large mb-2" for="matriz" ><b>Seleccione el usuario..</b></label>
                                            <select  class="form-control form-control-md" id="matriz" name="matriz" >
                                                <option selected disabled>Selecione un elemento </option>
                                                    <?php foreach($combos->listarUsuario() as $r): ?>
                                                        <option value="<?php echo $r->__GET('idUsuario') ?>"> <?php echo $r->__GET('usuario') ?></option>
                                                    <?php endforeach; ?>
                                            </select>      
                                        </div>                
                                    </div>
                                </div>
                            </div>
                        
                    
                            <!--START BOX MATRIZ >>PANAMÁ-->
                            <div class="myDiv" id="showMatriz">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                                <div class="col-md-12" >
                                                    <div class="form-row">
                                                        <div class="form-group col-md-9">
                                                            <input type="hidden" name="idCli_PN" id="idCli_PN" />
                                                            <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                            <label class="large mb-2" for="usernameRol" ><b>Seleccione el el rol del Usuario</b></label>
                                                            <select  class="form-control form-control-md" id="usernameRol" name="usernameRol" >
                                                                <option selected disabled>Selecione un elemento </option>
                                                                    
                                                            </select>
                                                        </div>  
                                                                
                                                    </div>
                                                </div>
                                                <hr>
                                        </div>
                                    </div>
                                </div>                                                                      
                            </div>
                            <!--END BOX MATRIZ >>PANAMÁ-->
                        </form>
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
        <script src="fontawesome5.15.1/js/all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#matriz').on('change', function(){
                    $("#showMatriz").show();
                
                    $("#matriz option:selected").each(function () {
                        var id_user = $(this).val();
                        // recogiendo el rol del cliente
                        $.post("./JQuerys/Security/Roles.php",{ id_user: id_user }, function(data) {
                                $("#usernameRol").html(data);
                            });	
                   });
                                                          
                });
            });
        </script>
 
    </body>
</html>