<?php

$html = '';
//require "./Datos/Conexion.php";
         
$conexion = new mysqli('localhost','root','CEal2000!','sispla');

$id_user = $_POST['id_user']; 
 
$result = $conexion->query(
    " SELECT idRolUsuario, idUsuario, idRol, rolDescripcion, idEstado from vw_RolUsuario where idUsuario = ".$id_user." AND idEstado<>3 "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['idRol'].'">'.$row['rolDescripcion'].'</option>';
    }
}

echo $html;


?>