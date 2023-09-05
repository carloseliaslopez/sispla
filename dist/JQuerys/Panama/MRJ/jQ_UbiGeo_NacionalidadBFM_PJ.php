<?php

$html = '';
require "./Datos/Conexion.php";
 
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];
 
$result = $conexion->query(

    "SELECT bf.nombreBeneFinales, p.calificacion, bf.nacionalidadBeneFinales, p. nombrePais, bf.idPic
    FROM BeneficiariosFinales bf
    INNER JOIN pais p on bf.nacionalidadBeneFinales = p.Idpais
    AND bf.nacionalidadBeneFinales= ".$id_matriz."
    AND idPic=".$id_pic." 
    AND bf.AccionesBeneFinales = (SELECT MAX(AccionesBeneFinales) FROM BeneficiariosFinales WHERE idPic= ".$id_pic.") "
);

if ($result->num_rows >0) {
    $html .= '<option value="2">Nacional</option>';
}else{

    $result1 = $conexion->query(
        "SELECT bf.nombreBeneFinales, p.calificacion, bf.nacionalidadBeneFinales, p. nombrePais, bf.idPic
        FROM BeneficiariosFinales bf
        INNER JOIN pais p on bf.nacionalidadBeneFinales = p.Idpais
        AND idPic=".$id_pic."
        AND nacionalidadBeneFinales<>164 "
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
