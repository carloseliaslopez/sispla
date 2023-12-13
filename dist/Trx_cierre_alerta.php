<?php

error_reporting(0);
//ENTIDADES
include '../Entidades/Trx_monitoreo/Trx_cat_doc_recibida.php';
include '../Entidades/Trx_monitoreo/Trx_oficina.php';
include '../Entidades/Trx_monitoreo/Trx_regla.php';
include '../Entidades/Trx_monitoreo/Trx_estadoAlerta.php';
include '../Entidades/Trx_monitoreo/vw_alertas.php';
include '../Entidades/Trx_monitoreo/alertas_diarias.php';

//DATOS
include '../Datos/Dt_trx_monitoreo.php';

session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}
$nombre = $_SESSION['usuario'];
$rol = $_SESSION ['idRol'];
$idUsuario = $_SESSION ['idUsuario'];

$combos = new Dt_trx_monitoreo();

//RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA BUSCAR EN LA BD

$varIdEmp = $_GET['trx'];

//cargamos los datos 
$trxSignal;
$trxSignal = $combos->ObtenerAlerta($varIdEmp);


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cierre de alerta</title>
        <link rel="icon" href="./images/icon_versatec.png">
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
                    <form method="POST" action="../negocio/Sig_Ng_Alertas.php">
                        <div class="container-fluid">
                            <!-- cardbody agregar start-->
                            <div class="card mb-4">
                                <div class="col-md-12" >
                                    <div class="form-row">  
                                    </div>
                                </div>
                            </div>

                            <!--logos de VERSATEC-->
                        <div class="col-md-12" >
                            <div class="form-row">  
                                                                            
                                <div class="form-group col-md-4" style="align-content: center; padding: 60px 30px;">
                                    <img src="./images/logo_fc.png"  style="max-width:100%;width:auto;height:auto;"/>
                                </div>
                                <div class="form-group col-md-2">
                                    
                                </div>
                                <div class="form-group col-md-2">
                                    
                                </div> 
                                <div class="form-group col-md-4"  style="align-content: center; ">
                                    <img src="./images/logo_versatec.png" style="max-width:100%;width:auto;height:auto;" />
                                </div>
                                
                            </div>
                        </div>
                        <!--logos de VERSATEC-->
                            
                           <!--start datos del Pic-->
                            <div class="card mb-4">
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div style="text-align: right;">
                                            <a href="#" title="Regresar a la página anterior">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                Regresar
                                            </a>
                                        </div>
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
                                                    value="<?php echo (new DateTime())->format('Y-m-d'); ?>" autocomplete="off" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario?>"/>
                                                    <input type="hidden" id="id_senial_alert" name="id_senial_alert" /> 

                                                    
                                                </div>
                                               
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="large mb-2" for="bcxEstadoS" >Estado de Señal</label>
                                                    <select  class="form-control form-control-sm" id="bcxEstadoS" name="bcxEstadoS" >
                                                        
                                                        <?php foreach($combos->ComboEstadoAlerta() as $r): ?>
                                                                <option value="<?php echo $r->__GET('nombreEstado') ?>" > <?php echo $r->__GET('nombreEstado') ?></option>
                                                        <?php endforeach; ?>
                                                    </select> 
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="txt_nombre_cliente">Nombre del cliente o transacción</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_nombre_cliente" name="txt_nombre_cliente" placeholder="Nombre del cliente o transacción" autocomplete="off" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="txt_regla_asig">Descripcion de la señal de la alerta</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_regla_asig" name="txt_regla_asig" placeholder="Descripcion de la señal de la alerta" autocomplete="off" >
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
                                                    <input type="text" class="form-control form-control-sm" id="txt_origen_fondo" name="txt_origen_fondo" placeholder="Origenes de los fondos"  >                                               
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="txt_acti_comercial">Actividad comercial del cliente</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_acti_comercial" name="txt_acti_comercial" placeholder="Actividad comercial del cliente"  autocomplete="off">                                               
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
                                                <div class="form-group col-md-4">
                                                    <label for="cbx_contac_cli">Contacto con el cliente</label>
                                                    <select class="form-control form-control-sm"  id="cbx_contac_cli" name="cbx_contac_cli">
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Si" >Si se contacto con el cliente</option>
                                                        <option value="No" >No se contacto con el cliente</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cbx_sol_adicional">Solicitud de documentación adicional</label>
                                                    <select class="form-control form-control-sm"  id="cbx_sol_adicional" name="cbx_sol_adicional">
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Si" >Si se solicito documentación adiconal</option>
                                                        <option value="No" >No se solicito documentación adiconal</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cbx_rep_ros">Reporte de Transacciones Sospechas</label>
                                                    <select class="form-control form-control-sm"  id="cbx_rep_ros" name="cbx_rep_ros">
                                                        <option selected disabled>Elegir..</option>
                                                        <option value="Si" >Si</option>
                                                        <option value="No" >No</option>
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
                                        <!--START BOX DOCUMENTACIÓN JURIDICA>>-->
                                        <!--Start encabezado-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    
                                                </div>
                                                <div class="form-group col-md-6">
                                            
                                                </div>
                                            <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-primary col-md-10" id="add_field_button_J"> <i class="fas fa-user-plus"></i> Agregar</button>
                                            </div>
                                            </div>
                                        </div>
                                        <!--End encabezado-->
                                        <div class="input_fields_wrap_J" id ="input_fields_wrap_J">
                                            <div class="col-md-12" >
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="large mb-2" for="nombreDoc_ME_J[]" ><b>Documento</b></label>
                                                        <select id="nombreDoc_ME_J[]" name="nombreDoc_ME_J[]" class="form-control form-control-sm">
                                                            <option selected disabled value="164">Elegir..</option>
                                                            <?php foreach($combos->ComboCatDocumentacion() as $r): ?>
                                                                <option value="<?php echo $r->__GET('nombreDocumento') ?>"> <?php echo $r->__GET('nombreDocumento') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>   
                                                    <div class="form-group col-md-5">
                                                        <label class="large mb-2" for="comentario_ME_J[]" ><b>Observaciones</b></label>
                                                        <input type="text" class="form-control form-control-sm" id="comentario_ME_J[]" name="comentario_ME_J[]" 
                                                            placeholder="Observaciones" autocomplete="off" >
                                                    </div> 
                                                    
                                                    <div class="form-group col-sm-1">
                                                        <label for="">Eliminar</label>
                                                        <button type="button" class="btn btn-danger btn-sm" id="remove_field_PP" disabled> <i class="fas fa-trash-alt"></i></button>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                        <!--END BOX DOCUMENTACIÓN JURIDICA>>-->
                                        
                                        <!--Start encabezado observaciones-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label><b>Acciones de seguimiento recomendadas</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End encabezado observaciones-->
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" id="trx_acc_seguim" name="trx_acc_seguim" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label for="txt_fecha_rev">Fecha revisión</label>
                                                    <input type="date" class="form-control form-control-sm" id="txt_fecha_rev" name="txt_fecha_rev" value="" autocomplete="off" >
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <label for="txt_oficina">Oficina</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt_oficina" name="txt_oficina" placeholder="País de origen de la transacción" autocomplete="off">
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <pre>
                                        </pre>                                        
                                        <!--Start buttons-->
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <button type="submit" class="btn btn-primary col-md-8">Guardar</button>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="reset" class="btn btn-danger col-md-8">Borrar</button>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <button type="button" class="btn btn-success col-md-7" onclick="regresar()">Regresar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End buttons-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                $("#id_senial_alert").val("<?php echo $varIdEmp ?>");
                $("#txt_nombre_cliente").val("<?php echo $trxSignal->__GET('nombre_cliente') ?>");
                $("#txt_regla_asig").val("<?php echo $trxSignal->__GET('regla') ?>");
                $("#txt_monto").val("<?php echo $trxSignal->__GET('monto') ?>");  
                $("#txt_cuenta").val("<?php echo $trxSignal->__GET('plastico') ?>");     
                $("#txt_oficina").val("<?php echo $trxSignal->__GET('oficina') ?>");
                
                

                
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
                window.open ("Trx_alertas_diarias.php","_self");
            }
        </script>

        <script>
        $(document).ready(function() {
            var max_fields      = 50; //Cantidad maxima de inputs 
            var wrapper   		= $(".input_fields_wrap_J"); //atributos 
            var add_button      = $("#add_field_button_J"); //Boton agregar

            var x = 1; //Contador agregar
            $(add_button).click(function(e){ //al realizar clia al boton add
            e.preventDefault();
                if(x < max_fields){ //condicional de limites 
                    x++; //incrementa la cantidad de textbox
                    $(wrapper).append('<div class="col-md-12" ><div class="form-row"><div class="form-group col-md-6"><select id="nombreDoc_ME_J[]" name="nombreDoc_ME_J[]" class="form-control form-control-sm"><option selected disabled value="164">Elegir..</option><?php foreach($combos->ComboCatDocumentacion() as $r): ?><option value="<?php echo $r->__GET('nombreDocumento') ?>"> <?php echo $r->__GET('nombreDocumento') ?></option><?php endforeach; ?></select></div><div class="form-group col-md-5"><input type="text" class="form-control form-control-sm" id="comentario_ME_J[]" name="comentario_ME_J[]" placeholder="Observaciones" autocomplete="off" ></div><div class="form-group col-sm-1"><button type="button" class="btn btn-danger btn-sm" id="remove_field_PP" > <i class="fas fa-trash-alt"></i></button></div></div></div>'); //add input box
                }
            });
                
            $(wrapper).on("click","#remove_field_PP", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
            })
 
        });       
        </script>

       
     
        
    </body>
</html>