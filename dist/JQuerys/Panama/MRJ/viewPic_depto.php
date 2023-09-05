<?php

$html = '';
require "./Datos/Conexion.php";
 
$id_pic = $_POST['id_pic'];
 
$result = $conexion->query(
    "SELECT idDepto, nombreDepartamento FROM vw_InteresInfo WHERE idPic =".$id_pic." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['idDepto'].'">'.$row['nombreDepartamento'].'</option>';
    }
}
else {
    $html .= '<option value="67">N/A</option>';
}
echo $html;
?>