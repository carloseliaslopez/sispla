<?php

$html = '';

require "./Datos/Conexion.php";
//$conexion = new mysqli('172.22.1.12','localhost','Cumpl1m1ento2023*','sispla');

$id_pic = $_POST['id_pic'];

$result = $conexion->query(
    "SELECT idCatalogoOCGO, codigoCGO, idPic
     FROM vw_interesinfopn WHERE idPic = ".$id_pic." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['idCatalogoOCGO'].'">'.$row['codigoCGO'].'</option>';
    }
}
echo $html;

?>