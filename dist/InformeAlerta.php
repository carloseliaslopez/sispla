<?php
error_reporting(0);

include '../Entidades/sig_alertas/vw_informe_alertas.php';
include '../Datos/Dt_sig_Alertas.php';

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

$datosEmp = new Dt_sig_Alertas();
//variables de jalerts


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Empleados</title>
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
    <body class="sb-nav-fixed">
        <?php require "../dist/navbar.php" ?>
        <div id="layoutSidenav">
        <?php require "../dist/LayoutSidenav.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <h1 class="mt-4">Empleados</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./Trx_alertas_diarias.php">Alertas </a></li>
                            <li class="breadcrumb-item active">Bitacora de señales de alertas </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Este apartado muestra los registros de las señales de alertas cerrada</b>
                            </div>
                        </div>

                       

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Bitacora Señales de alertas cerradas
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Fecha </th>
                                                <th>Nombre</th>
                                                <th>Estado regla</th>
                                                <th>Regla</th>
                                                <th>Monto</th>
                                                <th>Tipo de pago</th>
                                                <th>Origenes fondos</th>
                                                <th>Actividad economica</th>
                                                <th>Cuenta </th>
                                                <th>Pais origen transacción </th>
                                                <th>Pais destino transacción </th>
                                                <th>Contacto cliente </th>
                                                <th>Solicitud información </th>
                                                <th>Reporte ROS </th>
                                                <th>Fecha proceso </th>
                                                <th>Acciones seguimiento </th>
                                                <th>fecha revision </th>
                                                <th>oficina </th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach($datosEmp->listar_informe() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('fecha'); ?></td>
                                                    <td><?php echo $r->__GET('estado_señal'); ?></td>
                                                    <td><?php echo $r->__GET('nombre_cliente'); ?></td>
                                                    <td><?php echo $r->__GET('regla'); ?></td>
                                                    <td><?php echo $r->__GET('monto'); ?></td>
                                                    <td><?php echo $r->__GET('tipo_pago'); ?></td>
                                                    <td><?php echo $r->__GET('origenes_fondo'); ?></td>
                                                    <td><?php echo $r->__GET('actividad_comercial'); ?></td>
                                                    <td><?php echo $r->__GET('plastico'); ?></td>
                                                    <td><?php echo $r->__GET('pais_origen'); ?></td>
                                                    <td><?php echo $r->__GET('pais_destino'); ?></td>
                                                    <td><?php echo $r->__GET('contacto_cliente'); ?></td>
                                                    <td><?php echo $r->__GET('solicitud_info'); ?></td>
                                                    <td><?php echo $r->__GET('reporte_ros'); ?></td>
                                                    <td><?php echo $r->__GET('fecha_proceso'); ?></td>
                                                    <td><?php echo $r->__GET('acc_seguimiento'); ?></td>
                                                    <td><?php echo $r->__GET('fecha_revision'); ?></td>
                                                    <td><?php echo $r->__GET('oficina'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Fecha </th>
                                                <th>Nombre</th>
                                                <th>Estado regla</th>
                                                <th>Regla</th>
                                                <th>Monto</th>
                                                <th>Tipo de pago</th>
                                                <th>Origenes fondos</th>
                                                <th>Actividad economica</th>
                                                <th>Cuenta </th>
                                                <th>Pais origen transacción </th>
                                                <th>Pais destino transacción </th>
                                                <th>Contacto cliente </th>
                                                <th>Solicitud información </th>
                                                <th>Reporte ROS </th>
                                                <th>Fecha proceso </th>
                                                <th>Acciones seguimiento </th>
                                                <th>fecha revision </th>
                                                <th>oficina </th>
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

                
                var newEmp = 0;
                newEmp = "<?php echo $varMsjNewEmp ?>";

                if(newEmp == "1")
                {
                    successAlert('Éxito', '¡Un nuevo Empleado ha sido agregado con exito!');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del Empleado e intente nuevamente');
                }
                if(newEmp == "3")
                {
                    errorAlert('Error', 'Al parece ya existe un Empleado con la misma identificación, revise los datos e intente nuevamente');
                }

                var updEmp = 0;
                updEmp = "<?php echo $varMsjUpdEmp ?>";
                if(updEmp == "1")
                {
                    successAlert('Éxito', '¡Los datos del Empleado se actualizarón!');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del Empleado e intente nuevamente ');
                }

                var delEmp = 0;
                delEmp = "<?php echo $varMsjDelEmp ?>";

                if(delEmp == "1")
                {
                    successAlert('Éxito', '¡El Empleado ha sido dado de baja!');
                }
                if(delEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del Empleado e intente nuevamente');
                }
               

            });
        </script>

    </body>
</html>
