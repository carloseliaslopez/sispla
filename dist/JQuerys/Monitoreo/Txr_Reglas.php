<?php
$html = '';

$conexion = new mysqli('localhost','admin','adminCump123.','sispla');

$id_oficina = $_POST['id_oficina'];

$result = $conexion->query(
    "SELECT idOficinaRegla, idOficina, nombreOficina, idRegla, nombreRegla  FROM vw_oficinaregla WHERE idOficina = ".$id_oficina." "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {   
        $html .= '<option value="'.$row['idRegla'].'">'.$row['nombreRegla'].'</option>';
    }
}
else{
    $html .= '<option value="67">Sin Resultados</option>';
}

echo $html;
?>