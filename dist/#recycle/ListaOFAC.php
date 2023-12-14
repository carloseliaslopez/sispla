<?php
error_reporting(0);

include '../Entidades/ListasInternas.php';
include '../Datos/DtListasInternas.php';

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

$dtlXML = new DtListasInternas();

//variable de control msj Nuevo Empleado
$varMsjNewEmp = 0;
if(isset($varMsjNewEmp))
{ 
  $varMsjNewEmp = $_GET['msjNewEmp'];
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
        <title>Lista Consolidada OFAC</title>
        <link rel="icon" href="./images/icon_versatec.png">
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
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">SISPLA</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="#">Configuración</a>
                      <a class="dropdown-item" href="#">Registro de actividades</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="login.html">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                     <!--start sidebar-->
                     <div class="nav">
                        <div class="sb-sidenav-menu-heading">Página principal</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Página principal
                        </a>
                        <!-- start sub-menu Busquedas-->
                        <div class="sb-sidenav-menu-heading">Busquedas</div>
                        
                        <a class="nav-link collapsed" data-target="#Busquedas" href="#" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                            Busquedas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="Busquedas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="ListaCirculares.php">Busqueda Interna</a>
                                <a class="nav-link" href="BusquedasObligatorias.php">Busqueda Obligada</a>
                                <a class="nav-link" href="BusquedaMensual.php">Busqueda Mensual</a>
                            </nav>
                        </div>
                        <!-- end sub-menu Busquedas-->

                        <!-- start sub-menu listas-->
                        <div class="sb-sidenav-menu-heading">Listas de datos</div>
                        
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Listas" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Listas de datos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="Listas" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="ListaClientes.php">lista de clientes</a>
                                <a class="nav-link" href="ListaEmpleados.php">Lista de empleados</a>
                                <a class="nav-link" href="ListaProveedores.php">Lista de proveedores</a>
                                <a class="nav-link" href="ListaInterna.php">Lista restrictiva</a>
                                
                            </nav>
                        </div>
                        <!-- end sub-menu listas-->

                        <!-- start sub-menu Informes-->
                        <div class="sb-sidenav-menu-heading">Informes y reportes</div>
                        
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Informes" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Informes y reportes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                        <div class="collapse" id="Informes" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./listaInformesIDD.php">Informe IDD</a>
                                
                            </nav>
                        </div>
                        <div class="collapse" id="Informes" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./Matrices.php">Matrices de Riegos</a>
                            </nav>
                        </div>
                        
                        <!-- end sub-menu Informes-->
                        
                        <!-- start sub-menu Administracion-->
                        <div class="sb-sidenav-menu-heading"> Gestión Adimistrativa</div>
                        
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Admin" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                                Administración

                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                        <div class="collapse" id="Admin" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="adminTablasPic.php">Gestiones administrativas</a>
                                
                            </nav>
                        </div>
                        <!-- end sub-menu Administracion-->

                        <!-- start sub-menu Administracion-->
                         <div class="sb-sidenav-menu-heading"> Listas de Riesgos</div>
                        
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Lriesgo" aria-expanded="false" aria-controls="collapseLayouts">
                             <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                                 Listas de riesgos
                             <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                         </a>
                         
                         <div class="collapse" id="Lriesgo" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                 <a class="nav-link" href="./ListaONU.php">Lista ONU </a>
                             </nav>
                         </div>
                         <div class="collapse" id="Lriesgo" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./ListaOFAC.php">Lista OFAC </a>
                            </nav>
                        </div>
                         <!-- end sub-menu Administracion--> 
                    </div>
                     <!--end sidebar-->
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Registrado como:</div>
                         Usuario
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <h1 class="mt-4">OFAC</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuLista.html">Listas </a></li>
                            <li class="breadcrumb-item active">Lista de persona y entidades </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Registro de personas/entidades que no han sido registradas en la lista de riesgo del sistema</b>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Specially Designated Nationals List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nombre Completo</th>
                                                <th>Origen</th>
                                                <th>Fecha de entrada </th>
                                                <th>Estado</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php
                                                
                                                include_once("../Entidades/ListasInternas.php");
                                                include_once("../Datos/DtListasInternas.php");
                                                
                                                $mon = new ListasInternas();
                                                $dtMon = new DtListasInternas();
                                                
                                                //$xmldata = simplexml_load_file("https://www.treasury.gov/ofac/downloads/sdn.xml") or die("Failed to load");
                                                $xmldata = simplexml_load_file("../LRiesgos/sdn.xml") or die("Failed to load");
                                                
                                                $origen = "OFAC_SDN";
                                                $fechaingreso = (new DateTime())->format('Y-m-d');
                                                $idEstado = 1;

                                                foreach($xmldata->sdnEntry as $key2): 
                                                    $name = $key2->firstName." ".$key2->lastName; 
                                                    $clean = trim($name); 

                                                    $mon->__SET('nombre', $clean); 
                                                    $mon->__SET('origen', $origen); 
                                                    $mon->__SET('fechaIngreso', $fechaingreso); 
                                                    $mon->__SET('idEstado', $idEstado); 
                                                    $dtMon->replaceListaInterna($mon); 
                                                    
                                                   
                                               ?>   
                                                                                            
                                                    <tr>
                                                        <td><?php echo $clean?></td>
                                                        <td><?php echo "OFAC_SDN"?></td>
                                                        <td><?php echo (new DateTime())->format('Y-m-d'); ?></td>
                                                        <td><?php echo "1"?></td>
                                                    </tr>   
                                                
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre Completo</th>
                                                <th>Origen</th>
                                                <th>Fecha de entrada </th>
                                                <th>Estado</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <b>Registro de personas/entidades que no han sido registradas en la lista de riesgo del sistema</b>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Consolidated Sanctions List (Non-SDN Lists)
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="tbl_ctrl_bono" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nombre Completo</th>
                                                <th>Origen</th>
                                                <th>Fecha de entrada </th>
                                                <th>Estado</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php
                                                
                                                include_once("../Entidades/ListasInternas.php");
                                                include_once("../Datos/DtListasInternas.php");
                                                
                                                $mon = new ListasInternas();
                                                $dtMon = new DtListasInternas();
                                                
                                                $xmldata = simplexml_load_file("https://www.treasury.gov/ofac/downloads/consolidated/consolidated.xml") or die("Failed to load");
                                                //$xmldata = simplexml_load_file("../LRiesgos/sdn.xml") or die("Failed to load");
                                                
                                                $origen = "OFAC_SDNT";
                                                $fechaingreso = (new DateTime())->format('Y-m-d');
                                                $idEstado = 1;

                                                foreach($xmldata->sdnEntry as $key2): 
                                                    $name = $key2->firstName." ".$key2->lastName; 
                                                    $clean = trim($name); 

                                                    $mon->__SET('nombre', $clean); 
                                                    $mon->__SET('origen', $origen); 
                                                    $mon->__SET('fechaIngreso', $fechaingreso); 
                                                    $mon->__SET('idEstado', $idEstado); 
                                                    $dtMon->replaceListaInterna($mon); 
                                                                             
                                               ?>   
                                                                                         
                                               <tr>
                                                    <td><?php echo $clean?></td>
                                                    <td><?php echo "OFAC_SDNT"?></td>
                                                    <td><?php echo (new DateTime())->format('Y-m-d'); ?></td>
                                                    <td><?php echo "1"?></td>
                                                </tr>   
                                                                                             
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre Completo</th>
                                                <th>Origen</th>
                                                <th>Fecha de entrada </th>
                                                <th>Estado</th>
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
                    'csv'
                    ]

                });
                $('#tbl_ctrl_bono2').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel',
                    'csv'
                    ]

                });
                successAlert('Éxito', 'La lista consolidada OFAC_SDN ha sido actualizada');
            });
        </script>
     
    </body>
</html>
