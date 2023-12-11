<?php
error_reporting(0);

//ENTIDADES
include '../Entidades/Trx_monitoreo/Trx_oficina.php';
include '../Entidades/Trx_monitoreo/Trx_regla.php';
include '../Entidades/Trx_monitoreo/Trx_estadoAlerta.php';
include '../Entidades/Trx_monitoreo/vw_alertas.php';
include '../Entidades/Trx_monitoreo/alertas_diarias.php';



//DATOS
include '../Datos/Dt_trx_monitoreo.php';

include '../dist/script_alertas_diarias.php';

//INSTANCIAS
$Dt_monit = new Dt_trx_monitoreo();


session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

//variable de control msj Nuevo Empleado
$varMsjNewEmp = 0;
if(isset($varMsjNewEmp))
{ 
  $varMsjNewEmp = $_GET['msjNewEmp'];
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Señales de Alertas</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/NewStyles.css" rel="stylesheet" />

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  
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
                        <h3 id="h1Informe" name= "h1Informe"  class="mt-4">Señales de alertas detectadas</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Señales</a></li>
                            <li class="breadcrumb-item active">Señales de alertas Activas</li>
                        </ol>
                     
                        <div class="card mb-4"> 
                            <div class="card">
                                <div class="card-header">
                                    Filtrar señal de alerta por:
                                </div>
                                <form method="POST" action="Trx_alertas_diarias.php">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="large mb-2" for="cbxOficina" ><b>Oficina</b></label>
                                                        <select  class="form-control form-control-sm" id="cbxOficina" name="cbxOficina" >
                                                            <option selected disabled>Selecione un elemento </option>
                                                                <?php foreach($Dt_monit->ComboOficina() as $r): ?>
                                                                    <option value="<?php echo $r->__GET('nombreOficina') ?>"> <?php echo $r->__GET('nombreOficina') ?></option>
                                                                <?php endforeach; ?>
                                                        </select> 
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                       
                                                        <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario?>"/>
                                                        <label for="fechaConstitucion_PJ">Fecha de inicio </label>
                                                        <input type="date" class="form-control form-control-sm" id="fechaConstitucion_PJ" name=" fechaConstitucion_PJ" placeholder="Fecha de constitución" autocomplete="off" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d"))-3);?>">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="fechaInscripcion_PJ">fecha Finalización</label>
                                                        <input type="date" class="form-control form-control-sm" id="fechaInscripcion_PJ" name="fechaInscripcion_PJ" placeholder="Fecha de inscripción"  max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d"))-3);?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Start buttons-->                                              
                                            <div class="col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <button type="submit" class="btn btn-primary col-md-7">Filtrar</button>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button type="reset" class="btn btn-danger col-md-7" > Limpiar</button>
                                                    </div>                   
                                                </div>
                                            </div>
                                            <!--End buttons -->
                                        </div>  
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Señales
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                                                   
                                    <table class="table table-bordered" id="busquedaInterna"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tarjetahabiente</th>
                                                <th>Plastico</th>      
                                                <th>Monto</th> 
                                                <th>Regla</th> 
                                                <th>Oficina</th> 
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach($Dt_monit->tbl_TotalAlertas() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('nombre_cliente'); ?></td>
                                                    <td><?php echo $r->__GET('plastico'); ?></td>
                                                    <td><?php echo $r->__GET('monto'); ?></td>
                                                    <td><?php echo $r->__GET('regla'); ?></td>
                                                    <td><?php echo $r->__GET('oficina'); ?></td>
                                                    
                                                    <td>
                                
                                                        <a href="" onclick="revisar(<?php echo $r->__GET('id_alertas_diarias'); ?>)" 
                                                        title="Revisar Señal de alerta"> <i class="fas fa-pen-square"></i>
                                                        Revisar
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    
                                        <tfoot>
                                            <tr>
                                                <th>Tarjetahabiente</th>
                                                <th>Plastico</th>      
                                                <th>Monto</th> 
                                                <th>Regla</th> 
                                                <th>Oficina</th> 
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
                    successAlert('Éxito', 'Señal de alerta cerrada con éxito');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos  e intente nuevamente');
                }

                var updEmp = 0;
                updEmp = "<?php echo $varMsjUpdEmp ?>";
                if(updEmp == "1")
                {
                    successAlert('Éxito', 'Señal de alerta modificada con éxito');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos e intente nuevamente');
                }

                var delEmp = 0;
                delEmp = "<?php echo $varMsjDelEmp ?>";

               

            });
        </script>

    <script>
          // Tratatando de realizar el cambio 
          function revisar($id)
            {
                window.open("Trx_cierre_alerta.php?trx="+$id, "self");
            }
        </script>
    </body>
</html>
