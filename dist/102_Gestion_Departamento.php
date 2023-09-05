<?php


error_reporting(0);
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
include '../Entidades/Administracion/vw_Departamento.php';
include '../Entidades/Compartidas/Departamento.php';
include '../Datos/Gestion_DtDepartamento.php';

include '../Datos/DtCombos.php';
include '../Entidades/Compartidas/Pais.php';
include '../Entidades/ComboPais.php';


$datosDepto = new Gestion_DtDepartamento();
$combos = new DtCombos();
//variables de jalerts

//variable de control msj Nuevo Empleado
$varMsjNewEmp = 0;
if(isset($varMsjNewEmp)){ 
  $varMsjNewEmp = $_GET['msjNewEmp'];
}

//variable de control msj Actualizar Empleado
$varMsjUpdEmp = 0;
if(isset($varMsjUpdEmp)){ 
  $varMsjUpdEmp = $_GET['msjEditEmp'];
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
        <title>Gestión de Departamento</title>
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
                      <h1 class="mt-4">Departamentos</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./adminTablasPic.php">Administración </a></li>
                            <li class="breadcrumb-item active">Gestión para departamento </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Este apartado administra la gestión de todos los departamentos asociados a un país</b>
                            </div>
                        </div>

                        <!-- cardbody agregar start-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-plus-circle"></i>
                                Agregar un nuevo departamento a un pais existente 
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card bg-success text-white mb-4">
                                            <div class="card-body">Agregar un nuevo departamento</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" data-toggle="modal" data-target="#exampleModal" href="#">Agregar </a>
                                                <div class="small text-white"><i class="fas fa-plus-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cardbody agregar end-->
                        
                        <!-- Modal INSERT -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="POST" action="../negocio/Gestion_NgDepartamento.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo departamento</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                                <div class="form-row">
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                        <label class="small mb-1"  for="nombreDepto_N"> <b>Nombre del departamento:</b> </label>
                                                            <input class="form-control py-4" name="nombreDepto_N" id="nombreDepto_N"
                                                            type="text" placeholder="Ingrese el nombre del departamento" autocomplete="off" required/>
                                                            <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                            
                                                                
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="calificacion_N"><b>Calificación:</b></label>
                                                            <input class="form-control py-4" name="calificacion_N" id="calificacion_N"
                                                            type="number" placeholder="Ingrese la calificación/riesgo del departamento" autocomplete="off" min="1" max="3" required  />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="paisOrigen_N"><b>Pais de Origen:</b></label>
                                                            <select  class="form-control py-4" id="paisOrigen_N" name="paisOrigen_N" >
                                                                <option disabled selected>Elegir..</option>
                                                                <?php foreach($combos->ComboPais() as $r): ?>
                                                                    <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
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

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Gestion de país
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Calificación</th>
                                                <th>Pais</th>
                                                <th>Opciones</th>
                                                                                           
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach($datosDepto->listarDepartamento() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('nombreDepartamento'); ?></td>
                                                    <td><?php echo $r->__GET('calificacion'); ?></td>
                                                    <td><?php echo $r->__GET('nombrePais'); ?></td>
                                                   
                                                    <td>
                                                       <a href="javascript:;" class="addAttr" data-toggle="modal" data-target="#exampleModal2" 
                                                            data-id="<?php echo $r->__GET('idDepartamento'); ?>" 
                                                            data-nombre="<?php echo $r->__GET('nombreDepartamento'); ?>"
                                                            data-calificacion="<?php echo $r->__GET('calificacion'); ?>"
                                                            data-pais="<?php echo $r->__GET('idPais'); ?>" > 
                                                            <i class="fas fa-pen-square"></i>
                                                                Editar 
                                                        </a>

                                                        <!-- SEGUNDA FORMA -->
                                                        <a href="#" onclick="deleteEmp(<?php echo $r->__GET('idDepartamento'); ?>)" 
                                                        title="Eliminar un País">
                                                            <i class="fas fa-trash-alt"></i>
                                                            Eliminar
                                                        </a>
                                                    </td>

                                                    
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Calificación</th>
                                                <th>Pais</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- Modal UPDATE -->
                                    <div class="modal fade " id="exampleModal2" tabindex="-1" role="document" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            <form method="POST" action="../negocio/Gestion_NgDepartamento.php">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Calibrar un Departamento</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <div class="form-row">
                                                            <div class="col-md-12" >
                                                                <div class="form-group">
                                                                <label class="small mb-1"  for="nombreDepto_E"> <b>Nombre del departamento:</b> </label>
                                                                    <input class="form-control py-4" name="nombreDepto_E" id="nombreDepto_E"
                                                                    type="text" placeholder="Ingrese el nombre del País" autocomplete="off" required/>
                                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="2"/>
                                                                    <input type="hidden" id="idDepartamento" name="idDepartamento"/>
                                                                        
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="calificacion_E"><b>Calificación:</b></label>
                                                                    <input class="form-control py-4" name="calificacion_E" id="calificacion_E"
                                                                    type="number" placeholder="Ingrese la calificación/riesgo del pais" autocomplete="off" min="1" max="3" required  />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="paisOrigen_E"><b>Pais de Origen:</b></label>
                                                                    <select  class="form-control py-4" id="paisOrigen_E" name="paisOrigen_E">
                                                                        <option selected disabled>Elegir..</option>
                                                                        <?php foreach($combos->ComboPais() as $r): ?>
                                                                            <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
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
                    successAlert('Éxito', '¡Un nuevo departamento ha sido registrado !');
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
                    successAlert('Éxito', '¡Los datos del departamento se actualizarón con éxito!');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del departamento e intente nuevamente *_*');
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
            var calificacion = $(this).data('calificacion');   
            var pais = $(this).data('pais');  
           
            $('#idDepartamento').val(id); 
            $('#nombreDepto_E').val(nombre); 
            $('#calificacion_E').val(calificacion); 
            $('#paisOrigen_E').val(pais);
            
            } );
        </script>

    </body>
</html>
