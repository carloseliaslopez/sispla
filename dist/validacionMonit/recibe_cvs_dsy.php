<?php
//$conexion = new mysqli('localhost','admin','adminCump123.','monitoreo');
$conexion = new mysqli('localhost','admin','root','monitoreo');

$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    //$cantidad_registros = count($lineas);
    //$cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(",", $linea);
       
        $moneda               = $datos[0] ? $datos[0]: '';
		$tipo_transaccion     = $datos[1] ? $datos[1]: '';
        $afiliado             = $datos[2] ? $datos[2]: '';
        $usuario              = $datos[3] ? $datos[3]: '';
        $autorizacion         = $datos[4] ? $datos[4]: '';
        $cod_plan             = $datos[5] ? $datos[5]: '';
        $plan                 = $datos[6] ? $datos[6]: '';
        $codigo_mcc           = $datos[7] ? $datos[7]: '';
        $tipo_comercio        = $datos[8] ? $datos[8]: '';
        $comercio             = $datos[9] ? $datos[9]: '';
        $ciudad               = $datos[10] ? $datos[10]: '';
        $cod_concepto         = $datos[11] ? $datos[11]: '';
        $fecha_transaccion    = $datos[12] ? $datos[12]: '';
        $fecha_proceso        = $datos[13] ? $datos[13]: '';
        $monto                = $datos[14] ? $datos[14]: '';
        $tipo_entr_tarjeta    = $datos[15] ? $datos[15]: '';
        $plastico             = $datos[16] ? $datos[16]: '';
        $nombre_cliente       = $datos[17] ? $datos[17]: '';
        $riesgo_pais          = $datos[18] ? $datos[18]: '';
        $empresa              = $datos[19] ? $datos[19]: '';
        $cuenta_equivalente   = $datos[20] ? $datos[20]: '';
        $pais                 = $datos[21] ? $datos[21]: '';
        $moneda_origen        = $datos[22] ? $datos[22]: '';
        $monto_origen         = $datos[23] ? $datos[23]: '';
        $moneda_destino       = $datos[24] ? $datos[24]: '';
        $monto_destino        = $datos[25] ? $datos[25]: '';
        $cod_pais             = $datos[26] ? $datos[26]: '';

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