<?php

$html = '';
//$conexion = new mysqli('localhost','root','CEal2000!','Versatec');

require "./Datos/Conexion.php";
 
$id_pic = $_POST['id_pic'];
 
$result = $conexion->query(
    "SELECT idPic, idFuenteFondos, nombre_idFuenteFondos, riesgoFF FROM vw_OrigenesFondos WHERE idPic = ".$id_pic." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['riesgoFF'].'">'.$row['nombre_idFuenteFondos'].'</option>';
    }
}
echo $html;
?>