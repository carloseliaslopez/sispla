<?php
$conexion = new mysqli('localhost','admin','adminCump123.','monitoreo');

$tipo       = $_FILES['dataCliente_procol']['type'];
$tamanio    = $_FILES['dataCliente_procol']['size'];
$archivotmp = $_FILES['dataCliente_procol']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;
$j = 0;
$k = 0;
foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(",", $linea);        

        $moneda               = $datos[0] ? $datos[0]: '';
		$tipo_transaccion     = $datos[1] ? $datos[1]: '';
        $afiliado             = $datos[2] ? $datos[2]: '';
        $plastico             = $datos[3] ? $datos[3]: '';
        $nombre_cliente       = $datos[4] ? $datos[4]: '';
        $usuario              = $datos[5] ? $datos[5]: '';
        $autorizacion         = $datos[6] ? $datos[6]: '';
        $cod_plan             = $datos[7] ? $datos[7]: '';
        $plan                 = $datos[8] ? $datos[8]: '';
        $codigo_mcc           = $datos[9] ? $datos[9]: '';
        $tipo_comercio        = $datos[10] ? $datos[10]: '';
        $cod_concepto         = $datos[11] ? $datos[11]: '';
        $comercio             = $datos[12] ? $datos[12]: '';
        $ciudad               = $datos[13] ? $datos[13]: '';
        $fecha_proceso        = $datos[14] ? $datos[14]: '';
        $monto                = $datos[15] ? $datos[15]: '';
        $tipo_entr_tarjeta    = $datos[16] ? $datos[16]: '';
        $riesgo_pais          = $datos[17] ? $datos[17]: '';
        $fecha_transaccion    = $datos[18] ? $datos[18]: '';
        $empresa              = $datos[19] ? $datos[19]: '';
        $cuenta_equivalente   = $datos[20] ? $datos[20]: '';
        $pais                 = $datos[21] ? $datos[21]: '';
        $moneda_origen        = $datos[22] ? $datos[22]: '';
        $monto_origen         = $datos[23] ? $datos[23]: '';
        $moneda_destino       = $datos[24] ? $datos[24]: '';
        $monto_destino        = $datos[25] ? $datos[25]: '';
        $cod_pais             = $datos[26] ? $datos[26]: '';

        if( !empty($plastico) ){
            $duplicidad = ("SELECT autorizacion,monto  FROM trx_incoming_pro_col WHERE autorizacion ='".($autorizacion)."' and  monto ='".($monto)."'");
            $ca_dupli = mysqli_query($conexion, $duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   
         
        if ( $cant_duplicidad == 0 ) { 

            $insertarData = "INSERT INTO trx_incoming_pro_col( 
            moneda, tipo_transaccion, afiliado, plastico, 
            nombre_cliente, usuario, autorizacion, cod_plan, 
            plan, codigo_mcc, tipo_comercio, cod_concepto,
            comercio, ciudad, fecha_proceso, monto,
            tipo_entr_tarjeta, riesgo_pais, fecha_transaccion,
            empresa, cuenta_equivalente, pais, moneda_origen,
            monto_origen, moneda_destino, monto_destino,cod_pais 
            ) VALUES(
                '$moneda','$tipo_transaccion','$afiliado','$plastico',
                '$nombre_cliente','$usuario','$autorizacion','$cod_plan',
                '$plan','$codigo_mcc','$tipo_comercio','$cod_concepto',
                '$comercio','$ciudad','$fecha_proceso','$monto',
                '$tipo_entr_tarjeta','$riesgo_pais','$fecha_transaccion',
                '$empresa','$cuenta_equivalente','$pais','$moneda_origen',
                '$monto_origen','$moneda_destino','$monto_destino','$cod_pais'
                
            )";
            mysqli_query($conexion, $insertarData);
            $j++;
            
        } 
        /**Caso Contrario actualizo el o los Registros ya existentes*/
        else{
            $k++; 
        } 
    }
 $i++;
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resumen de Registros</title>
        <link rel="icon" href="./images/icon_versatec.png">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="fontawesome5.15.1/js/all.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <main >
            <div class="container-fluid">
                <!--logos de VERSATEC-->
                <div class="col-sm-12" >
                    <div class="form-row">  
                        <div class="form-group col-sm-8" style="align-content: center; padding: 20px 10px;">
                            <img src="../images/logo_fc.png"  style="max-width:100%;width:auto;height:auto; "/>
                        </div>
                        <div class="form-group col-sm-2">
                        </div>
                        <div class="form-group col-sm-2">
                        </div> 
                                            
                    </div>
                </div>
                <!--logos de VERSATEC-->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-50">
                            <div class="card-header">
                                Control de registros
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Resumen de datos </h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Registros insertados <span class="badge badge-primary badge-pill"><?php echo $j ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Registros Duplicados <span class="badge badge-primary badge-pill"><?php echo $k ?></span>
                                    </li>
                                </ul>
                                <br>
                                <a href="../subirAlertas.php" class="btn btn-primary">Regresar</a>
                            </div>
                            <div class="card-footer text-muted">
                                Bitacoras de transacciones de reportes de incoming  PROFIT-PANAMÁ-COLATERIZADA
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- PLUGIN FONTAWESOME -->
        <script src="../fontawesome5.15.1/js/all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>
</html>