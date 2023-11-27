<?php
$html = '';

//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','admin','adminCump123.','sispla');

$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];

$resultGene = $conexion->query(

    "SELECT bf.nombreBeneFinales, p.calificacion, bf.nacionalidadBeneFinales, p. nombrePais, bf.idPic
    FROM beneficiariosfinales bf
    INNER JOIN pais p on bf.nacionalidadBeneFinales = p.Idpais
    AND bf.nacionalidadBeneFinales= ".$id_matriz."
    AND idPic=".$id_pic." 
    AND bf.AccionesBeneFinales = (SELECT MAX(AccionesBeneFinales) FROM beneficiariosfinales WHERE idPic= ".$id_pic.") "
);

if ($resultGene->num_rows > 0){
    $result = $conexion->query(

        "SELECT bf.nombreBeneFinales, p.calificacion, bf.nacionalidadBeneFinales, p. nombrePais, bf.idPic
        FROM beneficiariosfinales bf
        INNER JOIN pais p on bf.nacionalidadBeneFinales = p.Idpais
        AND idPic=".$id_pic." 
        AND bf.AccionesBeneFinales = (SELECT MAX(AccionesBeneFinales) FROM beneficiariosfinales WHERE idPic= ".$id_pic.") "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }else{
        $result2 = $conexion->query(
            "SELECT bf.nombreBeneFinales, p.calificacion, bf.nacionalidadBeneFinales, p. nombrePais, bf.idPic
            FROM beneficiariosfinales bf
            INNER JOIN pais p on bf.nacionalidadBeneFinales = p.Idpais
            AND bf.nacionalidadBeneFinales<>141
            AND idPic=".$id_pic." "
        );

        if($result2->num_rows > 0){
            while ($row = $result2->fetch_assoc()) {   
                $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'('.$row['nombreBeneFinales'].')</option>';
            }
        }else{
            $html .= '<option value="0">N/A</option>';
        }
       

    }
}else

echo $html;
?>