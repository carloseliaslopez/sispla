
<?php

$html = '';
require "./Datos/Conexion.php";
 
$id_categoria = $_POST['id_categoria'];
 
$result = $conexion->query(
    "SELECT nombreSubProducto,idCategoriaProducto,riesgoSubProducto FROM catalogosubproducto WHERE idCategoriaProducto = ".$id_categoria." and idEstado<>3"
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['riesgoSubProducto'].'">'.$row['nombreSubProducto'].'</option>';
    }
}
echo $html;
?>