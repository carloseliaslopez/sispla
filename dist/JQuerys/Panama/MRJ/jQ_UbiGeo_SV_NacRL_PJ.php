<?php
$html = '';

//require  __FILE__."/Conexion.php";
$conexion = new mysqli('localhost','admin','adminCump123.','sispla');

$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz']; 

$result1 = $conexion->query(
    "SELECT nacionalidad FROM datosrepresentantelegal WHERE idPic = ".$id_pic."  "
);

if ($result1->num_rows > 0){
    $result = $conexion->query(
        "SELECT calificacion,nombrePais,idPic FROM vw_nacionalidad_tbl_drl WHERE idPic = ".$id_pic." "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {                
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }
}

echo $html;
?>