<?php

$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','root','CEal2000!','versatec');
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];
 
$result = $conexion->query(
    "SELECT * FROM DatosRepresentanteLegal WHERE idPic = ".$id_pic." and nacionalidad = ".$id_matriz." "
);
if ($result->num_rows > 0) {
    $html .= '<option value="2">Nacional</option>';
}else{
    $html .= '<option value="1">Internacional</option>';
}
echo $html;

?>