<?php

$html = '';
require "./Datos/Conexion.php";
 
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];

 
$result = $conexion->query(
    "SELECT * FROM vw_InteresInfoPN WHERE idPic = ".$id_pic." and idPaisACII = ".$id_matriz." "
);
if ($result->num_rows > 0) {
    $html .= '<option value="2">Nacional</option>';
}else{
    $html .= '<option value="1">Internacional</option>';
}
echo $html;

?>