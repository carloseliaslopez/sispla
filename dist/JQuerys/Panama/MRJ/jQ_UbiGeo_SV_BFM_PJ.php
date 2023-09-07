<?php
$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','root','CEal2000!','versatec');
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];

$resultGene = $conexion->query(

    "SELECT bf.nombreBeneFinales, p.calificacion, bf.nacionalidadBeneFinales, p. nombrePais, bf.idPic
    FROM BeneficiariosFinales bf
    INNER JOIN pais p on bf.nacionalidadBeneFinales = p.Idpais
    AND bf.nacionalidadBeneFinales= ".$id_matriz."
    AND idPic=".$id_pic." 
    AND bf.AccionesBeneFinales = (SELECT MAX(AccionesBeneFinales) FROM BeneficiariosFinales WHERE idPic= ".$id_pic.") "
);
if ($resultGene->num_rows > 0){
    $result = $conexion->query(
        "SELECT bf.deptoNacionalidadBeneFinales, d.nombreDepartamento, d.calificacion FROM BeneficiariosFinales bf
        INNER JOIN Departamento d ON idDepartamento = deptoNacionalidadBeneFinales
        AND idPic = ".$id_pic."
        AND bf.AccionesBeneFinales = (SELECT MAX(AccionesBeneFinales) FROM BeneficiariosFinales WHERE idPic= ".$id_pic.")"
        
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombreDepartamento'].'</option>';
        }
    }
}else{
    $result = $conexion->query(

        "SELECT bf.nombreBeneFinales, p.calificacion, bf.nacionalidadBeneFinales, p. nombrePais, bf.idPic
        FROM BeneficiariosFinales bf
        INNER JOIN pais p on bf.nacionalidadBeneFinales = p.Idpais
        AND idPic=".$id_pic." 
        AND bf.AccionesBeneFinales = (SELECT MAX(AccionesBeneFinales) FROM BeneficiariosFinales WHERE idPic= ".$id_pic.") "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }else{
        $result2 = $conexion->query(
            "SELECT bf.nombreBeneFinales, p.calificacion, bf.nacionalidadBeneFinales, p. nombrePais, bf.idPic
            FROM BeneficiariosFinales bf
            INNER JOIN pais p on bf.nacionalidadBeneFinales = p.Idpais
            AND bf.nacionalidadBeneFinales<>164
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
    
}

echo $html;
?>