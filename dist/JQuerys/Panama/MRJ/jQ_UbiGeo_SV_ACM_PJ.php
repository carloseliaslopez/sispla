<?php
$html = '';

//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','admin','adminCump123.','sispla');

$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];
 
$resultGene = $conexion->query(
    "SELECT a.nombreCompletoAccionistas, p.calificacion, a.nacionalidadAccionistas, p.nombrePais, a.idPic
    FROM accionistas a
    INNER JOIN pais p on a.nacionalidadAccionistas = p.Idpais
    AND a.nacionalidadAccionistas= ".$id_matriz."
    AND idPic=".$id_pic." 
    AND a.acciones = (SELECT MAX(acciones) FROM accionistas WHERE idPic= ".$id_pic.")"
);
if ($resultGene->num_rows > 0){
    $result = $conexion->query(
        "SELECT a.nombreCompletoAccionistas, p.calificacion, a.nacionalidadAccionistas, p.nombrePais, a.idPic
        FROM accionistas a
        INNER JOIN pais p on a.nacionalidadAccionistas = p.Idpais
        AND idPic=".$id_pic." 
        AND a.acciones = (SELECT MAX(acciones) FROM accionistas WHERE idPic= ".$id_pic.")"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }else{
        $result2 = $conexion->query(
            "SELECT a.nombreCompletoAccionistas, p.calificacion, a.nacionalidadAccionistas, p.nombrePais, a.idPic
            FROM accionistas a
            INNER JOIN pais p on a.nacionalidadAccionistas = p.Idpais
            AND idPic=".$id_pic." "
        );

        if($result2->num_rows > 0){
            while ($row = $result2->fetch_assoc()) {   
                $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'('.$row['nombreCompletoAccionistas'].')</option>';
            }
        }else{
            $html .= '<option value="0">N/A</option>';
        }
       

    }
}
echo $html;
?>