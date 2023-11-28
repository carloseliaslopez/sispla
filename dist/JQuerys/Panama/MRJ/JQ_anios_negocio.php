<?php

$html = '';

$fecha = $_POST['fecha'];



$fecha_ins = date_format($fecha, "Y-m-d");
$fecha_ac = date("Y-m-d");
 

$interval = $fecha->diff($fecha_ac);

$html =  "$interval->y ";



//$html .= '<option value="'.$row['idCatalogo_Acti_Economica'].'">'.$row['descripcion'].'</option>';

echo $html;
?>