<?php

$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('172.22.1.12','localhost','Cumpl1m1ento2023*','sispla');
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];
 
$result = $conexion->query(
    "SELECT * FROM vw_interesinfo_matriz WHERE idPic = ".$id_pic." and idPaisAE = ".$id_matriz." "
);
if ($result->num_rows > 0) {
    $html .= '<option value="2">Nacional</option>';
}else{
    $html .= '<option value="1">Internacional</option>';
}
echo $html;

?>