<?php
$conexion = new mysqli('localhost','admin','adminCump123.','monitoreo');

$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $moneda               = !empty($datos[0])  ? ($datos[0]) : '';
		$tipo_transaccion     = !empty($datos[1])  ? ($datos[1]) : '';
        $afiliado             = !empty($datos[2])  ? ($datos[2]) : '';
        $usuario              = !empty($datos[3])  ? ($datos[3]) : '';
        $autorizacion         = !empty($datos[4])  ? ($datos[4]) : '';
        $cod_plan             = !empty($datos[5])  ? ($datos[5]) : '';
        $plan                 = !empty($datos[6])  ? ($datos[6]) : '';
        $codigo_mcc           = !empty($datos[7])  ? ($datos[7]) : '';
        $tipo_comercio        = !empty($datos[8])  ? ($datos[8]) : '';
        $comercio             = !empty($datos[9])  ? ($datos[9]) : '';
        $ciudad               = !empty($datos[10])  ? ($datos[10]) : '';
        $cod_concepto         = !empty($datos[11])  ? ($datos[11]) : '';
        $fecha_transaccion    = !empty($datos[12])  ? ($datos[12]) : '';
        $fecha_proceso        = !empty($datos[13])  ? ($datos[13]) : '';
        $monto                = !empty($datos[14])  ? ($datos[14]) : '';
        $tipo_entr_tarjeta    = !empty($datos[15])  ? ($datos[15]) : '';
        $plastico             = !empty($datos[16])  ? ($datos[15]) : '';
        $nombre_cliente       = !empty($datos[17])  ? ($datos[16]) : '';
        $riesgo_pais          = !empty($datos[18])  ? ($datos[17]) : '';
        $empresa              = !empty($datos[19])  ? ($datos[18]) : '';
        $cuenta_equivalente   = !empty($datos[20])  ? ($datos[19]) : '';
        $pais                 = !empty($datos[20])  ? ($datos[20]) : '';
        $moneda_origen        = !empty($datos[21])  ? ($datos[21]) : '';
        $monto_origen         = !empty($datos[22])  ? ($datos[22]) : '';
        $moneda_destino       = !empty($datos[23])  ? ($datos[23]) : '';
        $monto_destino        = !empty($datos[24])  ? ($datos[24]) : '';
        $cod_pais             = !empty($datos[25])  ? ($datos[25]) : '';

        if( !empty($plastico) ){
            $duplicidad = ("SELECT autorizacion,monto  FROM trx_incoming_dsy WHERE autorizacion ='".($autorizacion)."' and  monto ='".($monto)."'");
            $ca_dupli = mysqli_query($conexion, $duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

        if ( $cant_duplicidad == 0 ) { 

            $insertarData = "INSERT INTO trx_incoming_dsy( 
            moneda, tipo_transaccion, afiliado, usuario, 
            autorizacion, cod_plan, plan, codigo_mcc, 
            tipo_comercio, comercio, ciudad, cod_concepto, 
            fecha_transaccion, fecha_proceso, monto, 
            tipo_entr_tarjeta, plastico, nombre_cliente, 
            riesgo_pais, empresa, cuenta_equivalente, pais, 
            moneda_origen, monto_origen, moneda_destino, 
            monto_destino, cod_pais
            ) VALUES(
                '$moneda','$tipo_transaccion','$afiliado','$usuario',
                '$autorizacion','$cod_plan','$plan','$codigo_mcc',
                '$tipo_comercio','$comercio','$ciudad','$cod_concepto',
                '$fecha_transaccion','$fecha_proceso','$monto',
                '$tipo_entr_tarjeta','$plastico','$nombre_cliente',
                '$riesgo_pais','$empresa','$cuenta_equivalente','$pais',
                '$moneda_origen','$monto_origen','$moneda_destino',
                '$monto_destino','$cod_pais'
                
            )";
            mysqli_query($conexion, $insertarData);
            echo ("Registro Insertado");

        } 
        /**Caso Contrario actualizo el o los Registros ya existentes*/
        else{
            echo ("Registro Duplicado");
        } 
    }

 $i++;
}

?>

<a href="index.php">Atras</a>