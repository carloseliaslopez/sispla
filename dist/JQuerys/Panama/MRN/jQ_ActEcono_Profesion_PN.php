
<?php

$html = '';
require "./Datos/Conexion.php";
 
$id_pic = $_POST['id_pic'];
 
$result = $conexion->query(
    "SELECT idCatalogoOCGO, riesgoCGO, descripcionCGO, idPic
     FROM vw_interesinfopn WHERE idPic = ".$id_pic." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['riesgoCGO'].'">'.$row['descripcionCGO'].'</option>';
    }
}
echo $html;
?>