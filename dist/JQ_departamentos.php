<?php
$html = '';
$conexion = new mysqli('localhost','root','CEal2000!','versatec');

$id_pais = $_POST['id_pais'];

$result = $conexion->query(
    "SELECT idDepartamento, nombreDepartamento FROM Departamento WHERE idPais = ".$id_pais." and idEstado<>3"
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {   
        $html .= '<option value="'.$row['idDepartamento'].'">'.$row['nombreDepartamento'].'</option>';
    }
}
else{
    $html .= '<option value="67">N/A</option>';
}

echo $html;
?>