<?php
error_reporting(0);

include '../Entidades/Evaluacion/CatalogoOCGO.php';

include '../Datos/Gestion_Dt_CatEmpleo.php';

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario']; 
$rol = $_SESSION ['idRol'];

$datosCE = new Gestion_Dt_CatEmpleo();
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
        <title>Gestión de producto</title>
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
                      <h1 class="mt-4">Tipos de empleos</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./adminTablasPic.php">Administración </a></li>
                            <li class="breadcrumb-item active">Gestión de empleos </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Este apartado administra el catalogo de empleos </b>
                            </div>
                        </div>

                        <!-- cardbody agregar start-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-plus-circle"></i>
                                Agregar un tipo de empleo 
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card bg-success text-white mb-4">
                                            <div class="card-body">Agregar empleo</div>
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
                                    <form method="POST" action="../negocio/Gestion_Ng_CatEmpleo.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo tipo de empleo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                                <div class="form-row">
                                                    <div class="col-md-12" >
                                                        <div class="form-group">
                                                        <label class="small mb-1"  for="codigo_N"> <b>Codigo del empleo</b> </label>
                                                            <input class="form-control py-4" name="codigo_N" id="codigo_N"
                                                            type="text" placeholder="Codigo del empleo" autocomplete="off" required/>
                                                            <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>  
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="descripcion_N"><b>Descripción del empleo</b></label>
                                                            <input class="form-control py-4" name="descripcion_N" id="descripcion_N"
                                                            type="text" placeholder="Descripción del empleo" autocomplete="off" required  />
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="small mb-1" for="riesgo_N"><b>Riesgo que pose el empleo</b></label>
                                                            <input class="form-control py-4" name="riesgo_N" id="riesgo_N"
                                                            type="number" placeholder="Riesgo que pose el empleo" autocomplete="off" min="1" max="3" required  />
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
                                Gestion empleo
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Descripción</th>
                                                <th>Riesgo</th>
                                                <th>Opciones</th>
                                                                                           
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach($datosCE->listarCatEmpleo() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('codigoCGO'); ?></td>
                                                    <td><?php echo $r->__GET('descripcionCGO'); ?></td>
                                                    <td><?php echo $r->__GET('riesgoCGO'); ?></td>
                                                   
                                                    <td>
                                                       <a href="javascript:;" class="addAttr" data-toggle="modal" data-target="#exampleModal2" 
                                                            data-id="<?php echo $r->__GET('idCatalogoOCGO'); ?>" 
                                                            data-codigo="<?php echo $r->__GET('codigoCGO'); ?>"
                                                            data-descripcion="<?php echo $r->__GET('descripcionCGO'); ?>"
                                                            data-riesgo="<?php echo $r->__GET('riesgoCGO'); ?>" > 
                                                            <i class="fas fa-pen-square"></i>
                                                                Editar 
                                                        </a>
                                                        <br/>
                                                        <!-- SEGUNDA FORMA -->
                                                        <a href="#" onclick="deleteEmp(<?php echo $r->__GET('idCatalogoOCGO'); ?>)" 
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
                                                <th>Código</th>
                                                <th>Descripción</th>
                                                <th>Riesgo</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header float-right">
        <h5>User details</h5>
        <div class="text-right">
          <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
        </div>
      </div>
      <div class="modal-body">
          


        <div>
          
          <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Samso</td>
      <td>Natto</td>
      <td>@samso</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Tinor</td>
      <td>Horton</td>
      <td>@tinor_har</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Mythor</td>
      <td>Bully</td>
      <td>@myth_tobo</td>
    </tr>
  </tbody>
</table>

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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
                window.location.href = "../negocio/Gestion_Ng_CatEmpleo.php?delEmp="+$r;
                
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
                    successAlert('Éxito', '¡Un nuevo tipo de empleo ha sido registrado !');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del tipo de empleo e intente nuevamente');
                }
                if(newEmp == "3")
                {
                    errorAlert('Error', 'Al parece ya existe un tipo de empleo con el mismo nombre, revise los datos e intente nuevamente');
                }

                var updEmp = 0;
                updEmp = "<?php echo $varMsjUpdEmp ?>";
                if(updEmp == "1")
                {
                    successAlert('Éxito', '¡Los datos del tipo de empleo se actualizarón con éxito!');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del tipo de empleo e intente nuevamente *_*');
                }

                var delEmp = 0;
                delEmp = "<?php echo $varMsjDelEmp ?>";

                if(delEmp == "1")
                {
                    successAlert('Éxito', '¡El tipo de empleo ha sido dado de baja!');
                }
                if(delEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos del tipo de empleo e intente nuevamente');
                }

            });
        </script>
        <script>
            $('.addAttr').click(function() {
            var id = $(this).data('id');   
            var codigo = $(this).data('codigo'); 
            var descripcion = $(this).data('descripcion');   
            var riesgo = $(this).data('riesgo');  
           
            $('#idCatalogoOCGO').val(id); 
            $('#codigo_E').val(codigo); 
            $('#descripcion_E').val(descripcion); 
            $('#riesgo_E').val(riesgo);
            
            } );
        </script>

    </body>
</html>
