<?php
//error_reporting(0);

include '../Datos/DtBusquedaInterna.php';

include '../Entidades/Busquedas/Organismo.php';
include '../Datos/DtCombos.php';

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];

$busquedaInterna = new DtBusquedaInterna();
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
        <title>Busquedas Internas</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/NewStyles.css" rel="stylesheet" />
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
                        <h1 class="mt-4">Registro de busquedas obligadas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./menuBusqueda.html">Busquedas</a></li>
                            <li class="breadcrumb-item active">Busquedas obligadas</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Este apartado es el encargado de realizar una busqueda de un elemento hacia las fuentes de datos de la empresa (clientes, trabajadores, afiliados, proveedores, etc)
                            </div>
                        </div>
                        <form action="../negocio/Ng_BusquedaInterna.php" method="POST">
                            <div class="card mb-4"> 
                                <div class="card">
                                    <div class="card-header">
                                        Capturando información de circulares de busquedas obligadas
                                    </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                    <label for="">Fecha de la busqueda</label>
                                                    <input type="date" class="form-control form-control-sm" id="fecha_busqueda" name="fecha_busqueda"  value="<?php echo (new DateTime())->format('Y-m-d'); ?>" disabled >
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="id_organismo">Organismo</label>
                                                    <select  class="form-control form-control-sm" id="id_organismo" name="id_organismo" required>
                                                        <option value="">Elegir..</option>  
                                                        <?php foreach($combos->ComboOrganismo() as $r): ?>
                                                                <option value="<?php echo $r->__GET('idOrganismo') ?>"> <?php echo $r->__GET('nombreOrganismo') ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">SubOrganismo</label>
                                                    <input type="text" class="form-control form-control-sm" id="sub_organismo" name="sub_organismo"  autocomplete="off" >
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="">Referencia</label>
                                                    <input type="text" class="form-control form-control-sm" id="ref_circular" name="ref_circular"  autocomplete="off" >
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div id = "subprincipal">
                                    <label id ="Text"><b>Agregue la lista de las personas a buscar</b></label>
                                </div>
                            </div>


                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Listas de personas
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="#"> <b> <i>Sujetos obligados</i></b></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                                   
                                        </div>
                                                
                                        <div class="form-group col-md-2">
                                                   
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-primary col-md-10" id="add_field_button"> <i class="fas fa-user-plus"></i> Agregar</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- START - IMPLEMENTACION DE DEL SCRIPT DE SUJETOS OBLIGADOS -->
                                <div class="input_fields_wrap" id ="input_fields_wrap">
                                    <div class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="nombre_SO[]">Nombre completo</label>
                                                <input type="text" class="form-control form-control-sm" id="nombre_SO[]" name="nombre_SO[]" placeholder="Nombre completo" autocomplete="off" required>
                                            </div>
                                            
                                            <div class="form-group col-md-3">
                                                <label for="id_SO[]">N° de identificación</label>
                                                <input type="text" class="form-control form-control-sm" id="id_SO[]" name="id_SO[]" placeholder="N° de identificación" autocomplete="off" > 
                                            </div>
                                                            
                                            <div class="form-group col-md-3">
                                                <label for="acciones_SO[]">Nacionalidad</label>
                                                <input type="text" class="form-control form-control-sm" id="acciones_SO[]" name="acciones_SO[]" placeholder="Nacionalidad" autocomplete="off">
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <label for="">Eliminar</label>
                                                <button type="button" class="btn btn-danger btn-sm" disabled> <i class="fas fa-trash-alt"></i></button>
                                            </div>
                                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- END - IMPLEMENTACION DE DEL SCRIPT DE SUJETOS OBLIGADOS -->
                                <pre>

                                </pre>
                                <!--Start buttons-->
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <button type="submit" class="btn btn-primary col-md-8">Realizar busqueda</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="reset" class="btn btn-danger col-md-8">Borrar</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-success col-md-7" onclick="regresar()">Regresar</button>
                                        </div>
                                    </div>
                                </div>
                                <!--End buttons -->  
                            </div>
                        </div>
                       
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
                $('#busquedaInterna').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                    'pdf',
                    'excel'//,
                    //'print'
                    ]

                }); 
            });
        </script>
        <script>
            $(document).ready(function() {
                var max_fields      = 50; //Cantidad maxima de inputs 
                var wrapper   		= $(".input_fields_wrap"); //atributos 
                var add_button      = $("#add_field_button"); //Boton agregar

                var x = 1; //Contador agregar
                $(add_button).click(function(e){ //al realizar clia al boton add
                e.preventDefault();
                    if(x < max_fields){ //condicional de limites 
                        x++; //incrementa la cantidad de textbox
                        $(wrapper).append('<div class="input_fields_wrap" id ="input_fields_wrap"><div class="col-md-12" ><div class="form-row"><div class="form-group col-md-5"><input type="text" class="form-control form-control-sm" id="nombre_SO[]" name="nombre_SO[]" placeholder="Nombre completo" autocomplete="off" required></div><div class="form-group col-md-3"><input type="text" class="form-control form-control-sm" id="id_SO[]" name="id_SO[]" placeholder="N° de identificación" autocomplete="off" > </div><div class="form-group col-md-3"><input type="text" class="form-control form-control-sm" id="acciones_SO[]" name="acciones_SO[]" placeholder="Nacionalidad" autocomplete="off"></div><div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field"> <i class="fas fa-trash-alt"></i></button></div></div></div></div>'); //add input box
                    }
                });
                
                $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
                    })
            });       
        </script>
         <script>
            function regresar(){
                window.open ("ListaCirculares.php","_self")
            }
        </script>
    </body>
</html>
