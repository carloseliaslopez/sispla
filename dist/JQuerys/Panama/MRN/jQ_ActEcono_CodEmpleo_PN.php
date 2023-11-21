<?php

$html = '';

//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','admin','adminCump123.','sispla');


$id_pic = $_POST['id_pic'];

$result = $conexion->query(
    "SELECT idCatalogo_Acti_Economica, codigoCIIU, idPic
     FROM vw_interesinfopn WHERE idPic = ".$id_pic." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['idCatalogo_Acti_Economica'].'">'.$row['codigoCIIU'].'</option>';
    }
}
echo $html;

?>