<?php

error_reporting(0);
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
$idUsuario = $_SESSION['idUsuario'];

include '../Entidades/estado_cliente/cat_estado_cliente.php';
include '../Entidades/estado_cliente/estado_cliente.php';
include '../Entidades/estado_cliente/vw_estado_cliente.php';


include '../Datos/DtPic.php';
include '../Datos/DtCombos.php';

$estadocli = new DtPic();

$combos = new DtCombos();

//variables de jalerts

//variable de control msj Nuevo Empleado
$varMsjUpdEmp = 0;
if(isset($varMsjUpdEmp)){ 
  $varMsjUpdEmp = $_GET['msjNewEmp'];
}


//variable de control msj Eliminar Empleado
$varMsjDelEmp = 0;
if(isset($varMsjDelEmp)){ 
  $varMsjDelEmp = $_GET['msjDelEmp'];
}
//fin jalerts
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestión de Clientes</title>
        <link rel="icon" href="./images/icon_versatec.png">
        <link href="css/styles.css" rel="stylesheet" />

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
                      <h1 class="mt-4">Clientes</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./adminTablasPic.php">Administración </a></li>
                            <li class="breadcrumb-item active">Gestión de estado de cliente </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Este apartado administra el estado del cliente</b>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Clientes 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Identificacion</th>
                                                <th>Estado </th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach($estadocli->ListarClienteEstado() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('nombreCliente'); ?></td>
                                                    <td><?php echo $r->__GET('id'); ?></td>
                                                    <td><?php echo $r->__GET('nombre_estado'); ?></td>
                                                   
                                                    <td>
                                                       <a href="javascript:;" class="addAttr" data-toggle="modal" data-target="#exampleModal2" 
                                                            data-id="<?php echo $r->__GET('id_estado_cliente'); ?>" 
                                                            data-nombre="<?php echo $r->__GET('nombreCliente'); ?>"
                                                            data-identificacion="<?php echo $r->__GET('id'); ?>"
                                                            data-idCatCliente="<?php echo $r->__GET('id_cat_estado_cliente'); ?>" > 
                                                            <i class="fas fa-pen-square"></i>
                                                                Modificar 
                                                        </a>

                                                        
                                                    </td>
                                                    
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Identificacion</th>
                                                <th>Estado </th>
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- Modal UPDATE -->
                                    <div class="modal fade " id="exampleModal2" tabindex="-1" role="document" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            <form method="POST" action="../negocio/NgPic.php">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Cambiar el estado de un cliente</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <div class="form-row">
                                                            <div class="col-md-12" >
                                                                <div class="form-group">
                                                                <label class="small mb-1"  for="nombre_cli"> <b>Nombre del cliente:</b> </label>
                                                                    <input class="form-control py-4" name="nombre_cli" id="nombre_cli"
                                                                    type="text" placeholder="Nombre del cliente:" autocomplete="off" disabled/>
                                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="3"/>
                                                                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario?>"/>

                                                                    <input type="hidden" id="idEstado_Cli" name="idEstado_Cli"/>

                                                                        
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="identificacion_clie"><b>Identificación:</b></label>
                                                                    <input class="form-control py-4" name="identificacion_clie" id="identificacion_clie"
                                                                    type="text" placeholder="Identificacion de la persona juridica/natural" autocomplete="off"  disabled  />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="estado_client"><b>Estado</b></label>
                                                                    <select  class="form-control py-4" id="estado_client" name="estado_client">
                                                                        <option selected disabled>Elegir..</option>

                                                                        <?php foreach($combos->ComboEstadoCli() as $r): ?>
                                                                            <option value="<?php echo $r->__GET('id_cat_estado_cliente') ?>"> <?php echo $r->__GET('nombre_estado') ?></option>
                                                                        <?php endforeach; ?>

                                                                    </select>
                                                                </div>

                                                                
                                                                
                                                                <div class="form-group">
                                                                    <input class="btn btn-primary btn-block" type="submit" value="Guardar"/> &nbsp;
                                                                    <input class="btn btn-danger btn-block" type="reset" value="Cancelar" data-dismiss="modal"/> &nbsp;
                                                                </div>
                                                                                                                
                                                                
                                                            </div>

                                                        </div>
                                                
                                                </div>
                                            <!--
                                                <div class="modal-footer">
                                                    
                                                </div>
                                            -->
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END MODAL INSERT-->
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
          // SEGUNDA FORMA - INCLUYE EL API DE JALERT
          function deleteEmp($r)
            {
            
            confirm(function(e,btn)
            { //event + button clicked
                e.preventDefault();
                window.location.href = "../negocio/Gestion_NgDepartamento.php?delEmp="+$r;
                
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
                
                $('#tbl_ctrl_bono').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    //'pdf',
                    //'excel',
                    //'print'
                    ]

                });
                

                /////////// VARIABLES DE CONTROL MSJ ///////////

                
                var newEmp = 0;
                newEmp = "<?php echo $varMsjNewEmp ?>";

                if(newEmp == "1")
                {
                    successAlert('Éxito', '¡!');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del departamento e intente nuevamente');
                }
                if(newEmp == "3")
                {
                    errorAlert('Error', 'Al parece ya existe un departamento con el mismo nombre, revise los datos e intente nuevamente');
                }

                var updEmp = 0;
                updEmp = "<?php echo $varMsjUpdEmp ?>";
                if(updEmp == "1")
                {
                    successAlert('Éxito', '¡El estado del cliente se actualizó con éxito!');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos e intente nuevamente *_*');
                }

                var delEmp = 0;
                delEmp = "<?php echo $varMsjDelEmp ?>";

                if(delEmp == "1")
                {
                    successAlert('Éxito', '¡El departamento ha sido dado de baja!');
                }
                if(delEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del departamento e intente nuevamente');
                }

            });
        </script>
        <script>
            $('.addAttr').click(function() {
            var id = $(this).data('id');   
            var nombre = $(this).data('nombre'); 
            var identificacion = $(this).data('identificacion');   
            var idCatCliente = $(this).data('idCatCliente');  
           
            $('#idEstado_Cli').val(id); 
            $('#nombre_cli').val(nombre); 
            $('#identificacion_clie').val(identificacion); 
            $('#estado_client').val(idCatCliente);
            
            } );
        </script>

    </body>
</html>
