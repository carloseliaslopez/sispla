<?php
/*
error_reporting(0);

//ENTIDADES
include '../Entidades/ComboPais.php';
include '../Entidades/ComboFormaPago.php';
include '../Entidades/ComboOrigenesFondos.php';
include '../Entidades/ComboAreaGeografica.php';
include '../Entidades/ComboActividadNegocio.php';
include '../Entidades/ComboEstadoCivil.php';

//Entidad Central
include '../Entidades/Pic.php';

include '../Entidades/Compartidas/Departamento.php';
include '../Entidades/Compartidas/RelacionCliente.php';
include '../Entidades/Compartidas/Causa.php';
include '../Entidades/Compartidas/OrigenesFondos.php';
include '../Entidades/Compartidas/Pep.php';
include '../Entidades/Compartidas/Facta.php';

//include '../Entidades/Juridio/DatosClienteJuridicoPic.php';
include '../Entidades/Juridio/DatosRepresentanteLegal.php';
include '../Entidades/Juridio/Accionistas.php';
include '../Entidades/Juridio/BeneficiariosFinales.php';
include '../Entidades/Juridio/ActividadEconomica.php';
include '../Entidades/Juridio/PrincipalesClientes.php';
include '../Entidades/Juridio/PrincipalesProveedores.php';

include '../Entidades/Anexos/CategoriaSalario.php';
include '../Entidades/Anexos/Constitucion.php';
include '../Entidades/Anexos/TipoPerJuridica.php';
include '../Entidades/Anexos/BusquedaRes.php';
include '../Entidades/Anexos/InteresInfo.php';
include '../Entidades/Anexos/vw_InteresInfo.php';


include '../Entidades/Vistas/vw_DatosGenerales.php';
include '../Entidades/Vistas/vw_datosRL.php';
include '../Entidades/Vistas/vw_Accionistas.php';
include '../Entidades/Vistas/vw_BeneficiariosFinales.php';

//DATOS
include '../Datos/DtCombos.php';
include '../Datos/DtPic.php';
include '../Datos/DtDataPicCompartidos.php';
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
//INSTANCIAS
$combos = new DtCombos();

$datospic = new DtPic();
$datoscompartidos = new DtDataPicCompartidos();

//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA BUSCAR EN LA BD

//datos del pic Juridico
$varIdEmp = $_GET['dataPIC'];

$empEdit;
$empEdit = $datospic->ObtenerPic($varIdEmp);
*/
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PIC</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/NewStyles.css" rel="stylesheet" />

        <!-- DATATABLE -->
        <link href="DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
         <!-- DATATABLE buttons -->
        <link href="DataTables/Buttons-1.6.3/css/buttons.dataTables.min.css" rel="stylesheet">
      
       
    </head>
    <body class="sb-nav-fixed">
    <?php require "../dist/navbar.php" ?>
        <div id="layoutSidenav">
        <?php require "../dist/LayoutSidenav.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <!-- cardbody agregar start-->
                      <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Información PIC
                            </div>
                            
                            <div class="col-md-12" >
                                <div class="form-row">                                              
                                    <div class="form-group col-md-2">
                                        <label for="fechaPic_PN">Fecha del PIC</label>
                                        <input type="text" class="form-control form-control-sm" id="fechaPic_PN" name="fechaPic_PN" placeholder="Fecha del PIC" disabled>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" >
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="nombreCliente_PN">Nombre del cliente</label>
                                        
                                        <input type="text" class="form-control form-control-sm" id="nombreCliente_PN" name="nombreCliente_PN" placeholder="Nombre del cliente" disabled>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="idCliente_PN">Número de identidad</label>
                                        <input type="text" class="form-control form-control-sm" id="idCliente_PN" name="idCliente_PN" placeholder="Número de identidad" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- cardbody PIC Datos end-->
                     
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div style="text-align: right;">
                                        <a href="#" title="Regresar a la página anterior">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Regresar
                                        </a>
                                    </div>
                               

                                    <!--Start form-->
                                    <hr/>
                                    
                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> Datos generales de la alerta</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="fecha_actual">Fecha</label>
                                                    <input type="date" class="form-control form-control-sm" id="fecha_MR_J" name="fecha_MR_J" 
                                                    value="<?php echo (new DateTime())->format('Y-m-d'); ?>" autocomplete="off" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="txt_codigo_alerta">Codigo de la señal de alerta</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_codigo_alerta" name="txt_codigo_alerta" placeholder="Codigo de la señal de alerta" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="txt_nombre_cliente">Nombre del cliente o transacción</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_nombre_cliente" name="txt_nombre_cliente" placeholder="Nombre del cliente o transacción" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="txt_regla_asig">Descripcion de la señal de la alerta</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_regla_asig" name="txt_regla_asig" placeholder="Descripcion de la señal de la alerta" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> Detalles de la Transacción</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!--End black line-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="txt_monto">Monto</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_monto" name="txt_monto" placeholder="Monto" >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="txt_metodo_pago">Método de pago utilizado</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_metodo_pago" name="txt_metodo_pago" placeholder="Método de pago utilizado" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="txt_origen_fondo">Origenes de los fondos</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_origen_fondo" name="txt_origen_fondo" placeholder="Origenes de los fondos" >                                               
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="txt_acti_comercial">Actividad comercial del cliente</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_acti_comercial" name="txt_acti_comercial" placeholder="Actividad comercial del cliente" >                                               
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="txt_cuenta">Número de cuenta o referencia</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_cuenta" name="txt_cuenta" placeholder="Número de cuenta o referencia" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="txt_origen_pais_trx">País de origen de la transacción</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_origen_pais_trx" name="txt_origen_pais_trx" placeholder="País de origen de la transacción" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="txt_destino_pais_trx">País de destino de la transacción</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_destino_pais_trx" name="txt_destino_pais_trx" placeholder="País de destino de la transacción" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <!--Start Black lines-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b> Acciones tomadas</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="txt_contacto_cliente">Contacto con cliente</label>
                                                    <select class="form-control form-control-sm"  id="txt_contacto_cliente" name="txt_contacto_cliente">
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Se contacto con el cliente" >Si Se contacto con el cliente</option>
                                                        <option value="No contacto con el cliente" >No Se contacto con el cliente</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="txt_sol_adicional">Solicitud de documentación adicional</label>
                                                    <select class="form-control form-control-sm"  id="txt_sol_adicional" name="txt_sol_adicional">
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Se solicito documentación adiconal" >Si se solicito documentación adiconal</option>
                                                        <option value="No se solicito documentación adiconal" >No se solicito documentación adiconal</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "subprincipal">
                                                        <label id ="Text"><b>Documentación recibida</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                         <!--Start Black lines-->
                                       <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id = "principal">
                                                        <label id ="Text"><b> 3. Actividad económica</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
          


                                        <pre>
                                        </pre>                                        
                                        <!--Start buttons-->
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <input type="button"  class="btn btn-primary col-md-12" onclick="regresar()" value="Volver"/>
                                            </div>
                                        </div>
                                        <!--End buttons -->  
                                   

                                      <!--End form-->
                                   
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


        <script>
            function setValoresEmp()
            {
                
                $("#idCli_PN").val("<?php echo $varIdEmp ?>");
                $("#fechaPic_PN").val("<?php echo $empEdit->__GET('fechaPic') ?>");
                $("#idCliente_PN").val("<?php echo $empEdit->__GET('id') ?>");
                $("#nombreCliente_PN").val("<?php echo $empEdit->__GET('nombreCliente') ?>");  
                
                //datos generales 
                $("#paisContitucion_PJ").val("<?php echo $datosGlobales->__GET('paisConstitucion') ?>");
                $("#depto_paisContitucion_PJ").val("<?php echo $datosGlobales->__GET('deptoConstitucion') ?>");
                $("#fechaConstitucion_PJ").val("<?php echo $datosGlobales->__GET('fechaConstitucion') ?>");
                $("#fechaInscripcion_PJ").val("<?php echo $datosGlobales->__GET('fechaInscripcion') ?>");
                $("#correoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('correoPersonaContacto') ?>");
                $("#nombrePersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('nombrePersonaContacto') ?>");
                $("#cargoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('cargoPersonaContacto') ?>");
                $("#telefonoPersonaContacto_PJ").val("<?php echo $datosGlobales->__GET('telefono') ?>");
                
                
            }

        </script>
        <script>
            $(document).ready(function ()
            {
                ////// ASIGNAMOS LOS VALORES A EDITAR EN LOS CONTROLES DEL FORMULARIO
                setValoresEmp();
            });
        </script>

        <script>
            function regresar(){
                window.open ("ListaClientes.php","_self");
            }
        </script>
 
     
        
    </body>
</html>