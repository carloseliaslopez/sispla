<?php
$html = '';

//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','admin','adminCump123.','sispla');

$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];

 
$result1 = $conexion->query(
    "SELECT idPaisACII FROM vw_interesinfopn WHERE idPic = ".$id_pic." and idPaisACII = ".$id_matriz." " 
);



if ($result1->num_rows > 0){
    $result = $conexion->query(
        "SELECT iipn.idDeptoACII, d.nombreDepartamento, d.calificacion FROM interesinfopn iipn
        INNER JOIN departamento d ON idDepartamento = idDeptoACII
        AND idPic = ".$id_pic.""
    );

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombreDepartamento'].'</option>';
        }
        
    }
}else{
    $result = $conexion->query(
        "SELECT riesgo_Pais,nombrePais,idPic FROM vw_interesInfopn WHERE idPic = ".$id_pic." "
    );

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {                
            $html .= '<option value="'.$row['riesgo_Pais'].'">'.$row['nombrePais'].'</option>';
        }
        

    }


}

echo $html;
?>