<?php
error_reporting(0);

include '../Entidades/ComboFechaCliente.php';
include '../Entidades/Vw_BusquedaMensual.php';
include '../Entidades/ComboPic.php';

include '../Datos/DtClientes.php';
include '../Datos/DtBusquedaMensual.php';
include '../Datos/DtCombos.php';
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

$comboFechaCliente = new DtClientes();

$busquedaMensual= new DtBusquedaMensual();
$combos = new DtCombos();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Busquedas Mensuales</title>
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
                        <h1 class="mt-4">Busquedas Mensuales</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuBusqueda.html">Busquedas</a></li>
                            <li class="breadcrumb-item active">Busqueda Mensual</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Este apartado es el encargado de conocer si un cliente es parte de una lista restrictiva.
                            </div>
                        </div>
                        <div class="card mb-4"> 
                            <div class="card">
                                <div class="card-header">
                                   Busquedas mensuales
                                </div>
                                <form method="POST" action="BusquedaMensual.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                                <div class="col-md-12" >
                                                    <div class="form-row">
                                                        
                                                        <div class="form-group col-md-3">
                                                            <label for="FechaInicio">Fecha de inicio:</label>
                                                            <input type="date" class="form-control form-control-sm" id="FechaInicio" name="FechaInicio">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="FechaFin">Fecha Final:</label>
                                                            <input type="date" class="form-control form-control-sm" id="FechaFin" name="FechaFin">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        
                                        <!--Start buttons-->
                                        <div class="col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <button type="submit" class="btn btn-primary col-md-8">Buscar</button>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="reset" class="btn btn-danger col-md-8">Borrar</button>
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
                               Resultado exacto de cliente
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                                                   
                                    <table class="table table-bordered" id="TblBusquedaInterna" width="100%" cellspacing="0" >
                                        <thead>
                                            <tr>
                                                <th>Ingreso PIC</th>   
                                                <th>Cliente</th>
                                                <th>Coincidencia</th>
                                                <th>Origen</th>
                                                <th>Representante/Conyuge</th>
                                                <th>Coincidencia</th>
                                                <th>Origen</th>
                                                <th>Accionistas</th>
                                                <th>Coincidencia</th>
                                                <th>Origen</th>
                                                
                                                                                           
                                            </tr>
                                            
                                        </thead>
                                        <tbody id="fbody">
                                            <?php foreach($busquedaMensual->BusquedaMensual() as $r): ?>
                                                
                                                <tr>
                                                    <td><?php echo $r->__GET('fechaIngreso'); ?></td>
                                                    <td><?php echo $r->__GET('nombreCliente'); ?></td>
                                                    <td><?php echo $r->__GET('PosibleCliente'); ?></td>
                                                    <td><?php echo $r->__GET('origenC'); ?></td>
                                                    <td><?php echo $r->__GET('Repreconyugue'); ?></td>
                                                    <td><?php echo $r->__GET('PosibleRepresentante'); ?></td>
                                                    <td><?php echo $r->__GET('origenRLC'); ?></td>
                                                    <td><?php echo $r->__GET('accionistas'); ?></td>
                                                    <td><?php echo $r->__GET('PosibleAccionista'); ?></td>
                                                    <td><?php echo $r->__GET('origenABF'); ?></td>
                                                    
                                                </tr>
                                            <?php endforeach; ?>       
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Ingreso PIC</th>   
                                                <th>Cliente</th>
                                                <th>Coincidencia</th>
                                                <th>Origen</th>
                                                <th>Representante/Conyuge</th>
                                                <th>Coincidencia</th>
                                                <th>Origen</th>
                                                <th>Accionistas</th>
                                                <th>Coincidencia</th>
                                                <th>Origen</th>                                    
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
                $('#TblBusquedaInterna').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel',
                    'print'
                    ]

                });

                
            });
        </script>

<script type="text/javascript">
	 $("#fecha").change(function () {
         
        if(this.value != "")
		  {
		  //split the current value of searchInput
		  var data = this.value.split(" ");
		    //create a jquery object of the rows
		  var jo = $("#fbody").find("tr");
		   
		 if (this.value == "" || this.value=="all") {
		        
		    jo.show();
		     return;
		    }
		    //hide all the rows
		    jo.hide();
		    //Recusively filter the jquery object to get results.
		    jo.filter(function (i, v) {
		        var $t = $(this);
		        for (var d = 0; d < data.length; ++d) {
		            if ($t.is(":contains('" + data[d] + "')")) {
		                return true;
		            }
		        }
		        return false;
		    })
		    //show the rows that match.
		    .show();
		      }
		    }).focus(function () {
		    this.value = "";
		    $(this).css({
		        "color": "black"
		    });
		    $(this).unbind('focus');
		    }).css({
		    "color": "#C0C0C0"
		    });
	</script>




    </body>
</html>
