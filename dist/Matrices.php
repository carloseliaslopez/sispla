<?php
error_reporting(0);
//Recurso para la ejecucion del carga de datos de la matriz
include '../Entidades/Evaluacion/vw_MatrizRiesgoNatural.php';
include '../Datos/DtMatrizRiesgoNatural.php';

include '../Entidades/Evaluacion/vw_MatrizRiesgoJuridico.php';
include '../Datos/DtMatrizRiesgoJuridica.php';
$datosMN = new DtMatrizRiesgoNatural();
$datosMJ = new DtMatrizRiesgoJuridica();

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
        <title>Matriz</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/NewStyles.css" rel="stylesheet" />
        <script src="./fontawesome5.15.1/js/all.min.js"></script>
        
        <style>
            .myDiv{
            display:none;
            }  
        </style>
        
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
                      <h1 class="mt-4">Matrices de riesgos</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuInformes.html">Menu de informes </a></li>
                            <li class="breadcrumb-item active">Matrices de riesgos </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <b> Este apartado administra la gestión de evaluaciones de riesgo para Clientes jurídicos y naturales</b>
                            </div>
                        </div>

                        <!-- cardbody agregar start-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-plus-circle"></i>
                                Realizar Evaluación de riesgo de clientes
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card  text-white mb-4" style="background-color:#2B3990;">
                                            <div class="card-body">Evaluación de riesgo de clientes Jurídico</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="MatrizRiesgoJuridico.php">Realizar Evaluación</a>
                                                <div class="small text-white"><i class="fas fa-plus-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card b text-white mb-4" style="background-color:#8DC63F;">
                                            <div class="card-body">Evaluación de riesgo de clientes Natural </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="MatrizRiesgoNatural.php">Realizar Evaluación</a>
                                                <div class="small text-white"><i class="fas fa-plus-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card  text-white mb-4" style="background-color:#606060;">
                                            <div class="card-body">Documentación proxima a expirar</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="#">Realizar actualizacion</a>
                                                <div class="small text-white"><i class="fas fa-plus-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-file-alt"></i>
                                Visualizar Matriz de evaluación de riesgos
                            </div>
                            <div class="col-md-12" >
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="large mb-2" for="matriz" ><b>Seleccione la matriz a visualizar</b></label>
                                        <select  class="form-control form-control-md" id="matriz" name="matriz">
                                            <option selected disabled>Seleccione..</option>
                                            <option value="One">Natural</option>
                                            <option value="Two">Juridico</option>                                              
                                        </select>       
                                    </div>                       
                                </div>
                            </div>
                        </div>

                         <!--START BOX TABLA >>-->
                        <div class="myDiv" id="showOne">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Matriz general de clientes Evaluados
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"> 
                                        <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Nacimiento</th>
                                                    <th>Nacionalidad</th>
                                                    <th>Residencia</th>
                                                    <th>Categoria</th>
                                                    <th>Profesión</th>
                                                    <th>Empleo</th>
                                                    <th>Lugar Actividad Económica</th>
                                                    <th>Resultados de busquedas</th>
                                                    <th>Condición PEP</th>
                                                    <th>Producto Solicitado</th>
                                                    <th>Monto</th>
                                                    <th>Forma de Pago</th>
                                                    <th>Origen de los Recursos</th>
                                                    <th>Riesgo</th>
                                                    <th>Proxima revisión</th>
                                                    <th>Dias Restantes</th>
                                                   
                                                </tr>  
                                            </thead>
                                            <tbody> 
                                                    <?php foreach($datosMN->listarMatriz_N_dias() as $r): ?>
                                                        <tr>
                                                            <td><?php echo $r->__GET('cliente'); ?></td>
                                                            <td><?php echo $r->__GET('lugarNacimiento'); ?></td>
                                                            <td><?php echo $r->__GET('lugarNacionalidad'); ?></td>
                                                            <td><?php echo $r->__GET('lugarResidencia'); ?></td>
                                                            <td><?php echo $r->__GET('categoria'); ?></td>   
                                                            <td><?php echo $r->__GET('profesion'); ?></td>    
                                                            <td><?php echo $r->__GET('actividadEmpleo'); ?></td>                                  
                                                            <td><?php echo $r->__GET('lugarActividadEconomica'); ?></td>
                                                            <td><?php echo $r->__GET('resultadosBusquedas'); ?></td>
                                                            <td><?php echo $r->__GET('condicionPEP'); ?></td>
                                                            <td><?php echo $r->__GET('productoSolicitado'); ?></td>
                                                            <td><?php echo $r->__GET('monto'); ?></td>
                                                            <td><?php echo $r->__GET('formaPago'); ?></td>
                                                            <td><?php echo $r->__GET('origenRecursos'); ?></td>
                                                            <td><?php echo $r->__GET('riesgoCliente'); ?></td>
                                                            <td><?php echo $r->__GET('proximaRevision'); ?></td>
                                                            <td><?php echo $r->__GET('diasRestantes'); ?></td>
                                                           
                                                        </tr>
                                                    <?php endforeach; ?>
                                            </tbody>   
                                            <tfoot>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Nacimiento</th>
                                                    <th>Nacionalidad</th>
                                                    <th>Residencia</th>
                                                    <th>Categoria</th>
                                                    <th>Profesión</th>
                                                    <th>Empleo</th>
                                                    <th>Lugar Actividad Económica</th>
                                                    <th>Resultados de busquedas</th>
                                                    <th>Condición PEP</th>
                                                    <th>Producto Solicitado</th>
                                                    <th>Monto</th>
                                                    <th>Forma de Pago</th>
                                                    <th>Origen de los Recursos</th>
                                                    <th>Riesgo</th>
                                                    <th>Proxima revisión</th>
                                                    <th>Dias Restantes</th>
                                                
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <!--END BOX TABLA >>-->
                        
                        <!--START BOX TABLA >>-->
                        <div class="myDiv" id="showTwo">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table mr-1"></i>
                                    Matriz general de clientes Evaluados
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive"> 
                                        <table class="table table-bordered" id="tbl_ctrl_juridico" width="100%" cellspacing="0" >
                                            <thead>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Constitución Representante</th>
                                                    <th>Nacimiento Representante</th>
                                                    <th>Nacionalidad Representante</th>
                                                    <th>Residencia Representante</th>
                                                    <th>Nacionalidad Accionista Mayoritario</th>
                                                    <th>Nacionalidad Beneficiario Final</th>
                                                    <th>Personalidad Juridica</th>
                                                    <th>Fecha de Constitución</th>
                                                    <th>Actividad Económica</th>                                                   
                                                    <th>Lugar Actividad Económica</th>
                                                    <th>Resultados de busquedas</th>
                                                    <th>Condición PEP</th>
                                                    <th>Producto Solicitado</th>
                                                    <th>Monto</th>
                                                    <th>Forma de Pago</th>
                                                    <th>Origen de los Recursos</th>
                                                    <th>Riesgo</th>
                                                    <th>Proxima revisión</th>
                                                    <th>Dias Restantes</th>
                                                                                                       
                                                </tr>  
                                            </thead>
                                            <tbody> 
                                                    <?php foreach($datosMJ->listarMatriz_J_dias() as $r): ?>
                                                        <tr>
                                                            <td><?php echo $r->__GET('cliente'); ?></td>
                                                            <td><?php echo $r->__GET('lugarConstitucion'); ?></td>
                                                            <td><?php echo $r->__GET('lugarNacimiento_RL'); ?></td>
                                                            <td><?php echo $r->__GET('lugarNacionalidad_RL'); ?></td>
                                                            <td><?php echo $r->__GET('lugarResidencia_RL'); ?></td>                                              
                                                            <td><?php echo $r->__GET('lugarNacionalidad_ACM'); ?></td>   
                                                            <td><?php echo $r->__GET('lugarNacionalidad_BFM'); ?></td>
                                                            <td><?php echo $r->__GET('personalidadJuridica'); ?></td>    
                                                            <td><?php echo $r->__GET('fechaConstitucion'); ?></td>
                                                            <td><?php echo $r->__GET('actividadEconomica'); ?></td>                               
                                                            <td><?php echo $r->__GET('lugarActividadEconomica'); ?></td>
                                                            <td><?php echo $r->__GET('resultadosBusquedas'); ?></td>
                                                            <td><?php echo $r->__GET('condicionPEP'); ?></td>
                                                            <td><?php echo $r->__GET('productoSolicitado'); ?></td>
                                                            <td><?php echo $r->__GET('monto'); ?></td>
                                                            <td><?php echo $r->__GET('formaPago'); ?></td>
                                                            <td><?php echo $r->__GET('origenRecursos'); ?></td>
                                                            <td><?php echo $r->__GET('riesgoCliente'); ?></td>
                                                            <td><?php echo $r->__GET('proximaRevision'); ?></td>
                                                            <td><?php echo $r->__GET('diasRestantes'); ?></td>
                                              
                                                        </tr>
                                                    <?php endforeach; ?>
                                            </tbody>   
                                            <tfoot>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Constitución Representante</th>
                                                    <th>Nacimiento Representante</th>
                                                    <th>Nacionalidad Representante</th>
                                                    <th>Residencia Representante</th>
                                                    <th>Nacionalidad Accionista Mayoritario</th>
                                                    <th>Nacionalidad Beneficiario Final</th>
                                                    <th>Personalidad Juridica</th>
                                                    <th>Fecha de Constitución</th>
                                                    <th>Actividad Económica</th>
                                                    <th>Lugar Actividad Económica</th>
                                                    <th>Resultados de busquedas</th>
                                                    <th>Condición PEP</th>
                                                    <th>Producto Solicitado</th>
                                                    <th>Monto</th>
                                                    <th>Forma de Pago</th>
                                                    <th>Origen de los Recursos</th>
                                                    <th>Riesgo</th>
                                                    <th>Proxima revisión</th>
                                                    <th>Dias Restantes</th>
                                                  
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <!--END BOX TABLA >>-->

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
            $(document).ready(function ()
            {
                ////// APLICAMOS FORMATO Y BOTONES A LA TABLA //// INICIAMOS EL PLUGIN DATATABLE
                $('#tbl_ctrl_bono').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    //'pdf',
                    'excel'//,
                    //'print'
                    ]
                });
            });
        </script>
        <script>
            $(document).ready(function ()
            {
                ////// APLICAMOS FORMATO Y BOTONES A LA TABLA //// INICIAMOS EL PLUGIN DATATABLE
                $('#tbl_ctrl_juridico').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    //'pdf',
                    'excel'//,
                    //'print'
                    ]
                });

                var newEmp = 0;
                newEmp = "<?php echo $varMsjNewEmp ?>";
                if(newEmp == "2")
                {
                    errorAlert('Error', 'Revise los datos proporcionados e intente nuevamente');
                }

                if(newEmp == "3")
                {
                    errorAlert('Error', 'Al parecer ya existe una evaluación del cliente con el mismo nombre y producto, verifique los datos e intente nuevamente');
                }
            });
        </script> 
        <script>
            $(document).ready(function(){
                $('#matriz').on('change', function(){
                var demovalue = $(this).val(); 
                    $("div.myDiv").hide();
                $("#show"+demovalue).show();
                });
            });
        </script>


    </body>
</html>
