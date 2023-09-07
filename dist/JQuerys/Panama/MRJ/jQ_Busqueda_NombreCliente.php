<?php
error_reporting(0);
$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','root','CEal2000!','versatec');
$id_cliente = $_POST['id_cliente'];
$arr = explode(" ",$id_cliente);
$arr[0];
$arr[1];
$arr[2];
$arr[3];
$arr[4];
		
 
$result = $conexion->query(
    "SELECT nombre, origen
    FROM ListasInternas WHERE 
            nombre LIKE'%".$arr[0]."%' and
			nombre like'%".$arr[1]."%' and
            nombre like'%".$arr[2]."%' and
            nombre like'%".$arr[3]."%' and
			nombre like'%".$arr[4]."%' "
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<p style="color: red;">'.'Posible Coincidencia<br> nombre: '.$row['nombre'].'  Lista: '.$row['origen'].'</p>';
    }
    
}
else {
    $html .= '<p style="color: blue;">'.'Sin coincidencias'.'</p>';

}
 
echo $html;
?>