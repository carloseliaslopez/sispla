<?php
error_reporting(0);

include '../Entidades/Administracion/CatalogoAE.php';
include '../Entidades/Compartidas/Pais.php';
include '../Entidades/ComboPais.php';

include '../Entidades/Administracion/vw_CatalogoAE.php';

include '../Datos/Gestion_Dt_ActiEconomica.php';
include '../Datos/DtCombos.php';

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

$datosAE = new Gestion_Dt_ActiEconomica();
$combos = new DtCombos();
//variables de jalerts

//variable de control msj Nuevo 
$varMsjNewEmp = 0;
if(isset($varMsjNewEmp))
{ 
  $varMsjNewEmp = $_GET['msjNewEmp'];
}

$varMsjNewEmp2 = 0;
if(isset($varMsjNewEmp2))
{ 
  $varMsjNewEmp2 = $_GET['msjNewCat'];
}


//variable de control msj Actualizar Empleado
$varMsjUpdEmp = 0;
if(isset($varMsjUpdEmp))
{ 
  $varMsjUpdEmp = $_GET['msjEditEmp'];
}

//variable de control msj Eliminar Empleado
$varMsjDelEmp = 0;
if(isset($varMsjDelEmp))
{ 
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
        <title>Actividad Económica</title>
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
                      <h1 class="mt-4">Actividades economicas </h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./adminTablasPic.php">Administración </a></li>
                            <li class="breadcrumb-item active">Actividad económica </li>
                          </ol>
                            
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Este apartado se administra la Clasificación Industrial Internacional Uniforme</b>
                            </div>
                        </div>
                        
                        <!-- Modal INSERT -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <form method="POST" action="../negocio/Gestion_NgAE.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agregar una clasificación industrial</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="form-row">
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                    <label class="small mb-1"  for="codigo_N"> <b>Código</b> </label>
                                                        <input class="form-control py-4" name="codigo_N" id="codigo_N"
                                                        type="text" placeholder="Codigo de la clasificación industrial " autocomplete="off" required/>
                                                        <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>  
                                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="descripcion_N"><b>Descripcion de la clasificación</b></label>
                                                        <input class="form-control py-4" name="descripcion_N" id="descripcion_N"
                                                        type="text" placeholder="Descripcion de la clasificación " autocomplete="off" min="1" max="3" required  />
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
                                Gestion actividad económica
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div style="text-align: right;" >
                                        <a data-toggle="modal" data-target="#exampleModal" href="#" title="Registrar nueva actividad económica">
                                            <i class="fas fa-plus-circle"></i>
                                            Nueva actividad económica
                                        </a>
                                    </div>
                                    <div class="mt-2"></div>
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Descripción</th>
                                                <th>Opciones</th>
                                                                                           
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach($datosAE->listarAE() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('codigoCIIU'); ?></td>
                                                    <td><?php echo $r->__GET('descripcionCIIU'); ?></td>
                                                   
                                                    <td>
                                                       <a href="javascript:;" class="addAttr" data-toggle="modal" data-target="#exampleModal2" 
                                                       data-id="<?php echo $r->__GET('idCatalogoAE'); ?>" 
                                                       data-nombre="<?php echo $r->__GET('codigoCIIU'); ?>"
                                                       data-calificacion="<?php echo $r->__GET('descripcionCIIU'); ?>" > <i class="fas fa-pen-square"></i>
                                                        Editar </a>
                                                        <br/>
                                                        <!-- SEGUNDA FORMA -->
                                                        <a href="#" onclick="deleteEmp(<?php echo $r->__GET('idCatalogoAE'); ?>)" 
                                                        title="Eliminar ">
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
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- Modal UPDATE -->
                                    <div class="modal fade " id="exampleModal2" tabindex="-1" role="document" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            <form method="POST" action="../negocio/Gestion_NgAE.php">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Calibrar actividad económica</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <div class="form-row">
                                                            <div class="col-md-12" >
                                                                <div class="form-group">
                                                                <label class="small mb-1"  for="codigo_E"> <b>Código</b> </label>
                                                                    <input class="form-control py-4" name="codigo_E" id="codigo_E"
                                                                    type="text" placeholder="Código" autocomplete="off" required/>
                                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="2"/>
                                                                    <input type="hidden" id="idCatalogoAE" name="idCatalogoAE"/>
                                                                        
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="descripcion_E"><b>Descripcion de la clasificación</b></label>
                                                                    <input class="form-control py-4" name="descripcion_E" id="descripcion_E"
                                                                    type="text" placeholder="Descripcion de la clasificación" autocomplete="off" min="1" max="3" required  />
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
                                    <!-- END MODAL UPDATE-->
                                </div>
                            </div>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><b>Administracion de calificación y procecencia de una Clasificación Industrial Internacional Uniforme  </b></li>
                        </ol>
                        <div class="card mb-4"> 
                            <div class="card">
                                <div class="card-header">
                                   Asignar pais y calificacion
                                </div>
                                <form method="POST" action="../negocio/Gestion_Ng_RiesgoCatPais.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                                <div class="col-md-12" >
                                                    <div class="form-row">
                                                        
                                                        <div class="form-group col-md-4">
                                                        <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                            <label for="pais">Pais</label>
                                                            <select  class="form-control form-control-sm" id="pais" name="pais">
                                                                <option selected disabled>Elegir..</option>
                                                                <?php foreach($combos->ComboPais_CA() as $r): ?>
                                                                    <option value="<?php echo $r->__GET('idPais') ?>"> <?php echo $r->__GET('nombrePais') ?></option>
                                                                <?php endforeach; ?>
                                                            </select>                                               
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label for="actividadEconomica">Clasificación industrial</label>
                                                            <select  class="form-control form-control-sm" id="actividadEconomica" name="actividadEconomica">
                                                                <option selected disabled>Elegir..</option>
                                                                <?php foreach($datosAE->listarAE() as $r): ?>
                                                                    <option value="<?php echo $r->__GET('idCatalogoAE') ?>"> <?php echo $r->__GET('descripcionCIIU') ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-2">
                                                            <label for="calificación_Cat">Calificación</label>
                                                            <input type="number" class="form-control form-control-sm" id="calificación_Cat" name="calificación_Cat" min="1" max="3">       
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        
                                        <!--Start buttons-->
                                        <div class="col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <button type="submit" class="btn btn-primary col-md-8">Registar</button>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="reset" class="btn btn-danger col-md-8">limpiar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End buttons -->  
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Calificación por pais actividad economica 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                                                       
                                    <table class="table table-bordered" id="tbl_ctrl_bono_2" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Descripción</th>
                                                <th>País</th>
                                                <th>Calificación</th>
                                                                                                                                           
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach($datosAE->listar_vw_AE() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('codigoCIIU'); ?></td>
                                                    <td><?php echo $r->__GET('descripcionCIIU'); ?></td>
                                                    <td><?php echo $r->__GET('nombrePais'); ?></td>
                                                    <td><?php echo $r->__GET('calificacion_Cat_Pais'); ?></td>
                                                                                                                                                        
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Descripción</th>
                                                <th>País</th>
                                                <th>Calificación</th>
                                                
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
          // SEGUNDA FORMA - INCLUYE EL API DE JALERT
          function deleteEmp($r)
            {
            
            confirm(function(e,btn)
            { //event + button clicked
                e.preventDefault();
                window.location.href = "../negocio/Gestion_NgAE.php?delEmp="+$r;
                
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
                $('#tbl_ctrl_bono_2').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel',
                    'print'
                    ]

                });

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
                    successAlert('Éxito', '¡Una nueva clasificación industrial ha sido registrado !');
                }
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos de la clasificación industrial e intente nuevamente');
                }
                if(newEmp == "3")
                {
                    errorAlert('Error', 'Al parece ya existe una clasificación industrial con el mismo codigo y descripción, revise los datos e intente nuevamente');
                }

                var updEmp = 0;
                updEmp = "<?php echo $varMsjUpdEmp ?>";
                if(updEmp == "1")
                {
                    successAlert('Éxito', '¡Los datos de la clasificación industrial se actualizarón con éxito!');
                }
                if(updEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos e intente nuevamente *_*');
                }

                var delEmp = 0;
                delEmp = "<?php echo $varMsjDelEmp ?>";

                if(delEmp == "1")
                {
                    successAlert('Éxito', '¡la clasificación industrial ha sido dado de baja!');
                }
                if(delEmp == "2")
                {
                    errorAlert('Error', 'Revise la clasificación industrial e intente nuevamente');
                }


                /////////// VARIABLES DE CONTROL MSJ 2.0 ///////////           
                var newEmp1 = 0;
                newEmp1 = "<?php echo $varMsjNewEmp2 ?>";

                if(newEmp1 == "1")
                {
                    successAlert('Éxito', '¡Una nueva calificacion se ha registrado !');
                }
                if(newEmp1 == "2")
                {
                    errorAlert('Error', 'Revise  intente nuevamente');
                }
                if(newEmp1 == "3")
                {
                    errorAlert('Error', 'Al parece ya existe una clasificación industrial con el mismo codigo y pais, revise los datos e intente nuevamente');
                }

            });
        </script>
        <script>
            $('.addAttr').click(function() {
            var id = $(this).data('id');   
            var nombre = $(this).data('nombre'); 
            var calificacion = $(this).data('calificacion');   
           
            $('#idCatalogoAE').val(id); 
            $('#codigo_E').val(nombre); 
            $('#descripcion_E').val(calificacion); 
            
            } );
        </script>

    </body>
</html>
