<?php

$html = '';
require "./Datos/Conexion.php";
 
$id_pic = $_POST['id_pic'];

$result = $conexion->query(
    "SELECT idCatalogo_Acti_Economica, codigoCIIU, idPic
     FROM vw_InteresInfoPN WHERE idPic = ".$id_pic." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['idCatalogo_Acti_Economica'].'">'.$row['codigoCIIU'].'</option>';
    }
}
echo $html;

?>