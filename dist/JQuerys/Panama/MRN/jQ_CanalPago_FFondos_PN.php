<?php

$html = '';
require "./Datos/Conexion.php";

$id_pic = $_POST['id_pic'];
 
$result = $conexion->query(
    "SELECT idPic, idFuenteFondos, nombre_idFuenteFondos, riesgoFF FROM vw_origenesfondos WHERE idPic = ".$id_pic." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['riesgoFF'].'">'.$row['nombre_idFuenteFondos'].'</option>';
    }
}
echo $html;
?>