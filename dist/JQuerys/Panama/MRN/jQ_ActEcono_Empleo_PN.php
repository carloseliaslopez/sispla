
<?php

$html = '';

//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','admin','adminCump123.','sispla');


$id_pic = $_POST['id_pic'];

$result = $conexion->query(
    "SELECT riesgo_AC, descripcion, idPic
     FROM vw_interesinfopn WHERE idPic = ".$id_pic.""
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['riesgo_AC'].'">'.$row['descripcion'].'</option>';
    }
}
echo $html;
?>