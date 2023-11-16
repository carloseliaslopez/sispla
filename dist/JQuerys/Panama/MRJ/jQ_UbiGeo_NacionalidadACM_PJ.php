<?php

$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('172.22.1.12','localhost','Cumpl1m1ento2023*','sispla');
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];
 
$result = $conexion->query(
    //"SELECT nombreCompletoAccionistas, nacionalidadAccionistas, max(acciones) as 'acciones', idPic FROM Accionistas WHERE idPic = ".$id_pic." and nacionalidadAccionistas = 2"

    "SELECT a.nombreCompletoAccionistas, p.calificacion, a.nacionalidadAccionistas, p. nombrePais, a.idPic
    FROM accionistas a
    INNER JOIN pais p on a.nacionalidadAccionistas = p.Idpais
    AND a.nacionalidadAccionistas= ".$id_matriz."
    AND idPic=".$id_pic." 
    AND a.acciones = (SELECT MAX(acciones) FROM accionistas WHERE idPic= ".$id_pic.") "
);


if ($result->num_rows >0) {
    $html .= '<option value="2">Nacional</option>';
}else{

    $result1 = $conexion->query(
        "SELECT a.nombreCompletoAccionistas, p.calificacion, a.nacionalidadAccionistas, p. nombrePais, a.idPic
        FROM accionistas a
        INNER JOIN pais p on a.nacionalidadAccionistas = p.Idpais
        AND idPic=".$id_pic." "
    );

    if ($result1->num_rows >0) {
        $html .= '<option value="1">Internacional</option>';
    }
    else{
        $html .= '<option value="0">N/A</option>';
        
    }
    
}

echo $html;

?>
