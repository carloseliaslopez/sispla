<?php

$html = '';
require "./Datos/Conexion.php";
 
$id_pic = $_POST['id_pic'];
 
$result = $conexion->query(
    "SELECT idCatalogoAE  FROM vw_InteresInfo_matriz WHERE idPic = ".$id_pic." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['idCatalogoAE'].'">'.$row['idCatalogoAE'].'</option>';
    }
}
echo $html;
?>