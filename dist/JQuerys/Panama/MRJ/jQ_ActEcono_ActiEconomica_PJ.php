<?php

$html = '';
//require "./Datos/Conexion.php";
         
$conexion = new mysqli('localhost','root','CEal2000!','versatec');
$id_empleo = $_POST['id_empleo'];
$id_matriz = $_POST['id_matriz']; 
 
$result = $conexion->query(
    "SELECT idCatalogo_Acti_Economica, codigoCIIU, descripcion, idPais, calificacion 
    FROM Catalogo_acti_Economica WHERE codigoCIIU = ".$id_empleo." and idPais = ".$id_matriz." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['idCatalogo_Acti_Economica'].'">'.$row['descripcion'].'</option>';
    }
}

echo $html;
?>