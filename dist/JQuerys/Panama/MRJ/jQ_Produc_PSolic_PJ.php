
<?php

$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','root','CEal2000!','versatec');
$id_categoria = $_POST['id_categoria'];
 
$result = $conexion->query(
    "SELECT nombreSubProducto,idCategoriaProducto,riesgoSubProducto FROM catalogoSubProducto WHERE idCategoriaProducto = ".$id_categoria." and idEstado<>3"
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['riesgoSubProducto'].'">'.$row['nombreSubProducto'].'</option>';
    }
}
echo $html;
?>