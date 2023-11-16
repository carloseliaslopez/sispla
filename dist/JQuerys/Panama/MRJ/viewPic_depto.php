<?php

$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('172.22.1.12','localhost','Cumpl1m1ento2023*','sispla');
$id_pic = $_POST['id_pic'];
 
$result = $conexion->query(
    "SELECT idDepto, nombreDepartamento FROM vw_interesinfo WHERE idPic =".$id_pic." "
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