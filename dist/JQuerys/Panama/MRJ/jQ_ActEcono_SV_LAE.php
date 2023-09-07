<?php
$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','root','CEal2000!','versatec');
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];

$result1 = $conexion->query(
    "SELECT idPaisAE FROM vw_InteresInfo_matriz WHERE idPic = ".$id_pic." and idPaisAE = ".$id_matriz." "
);
if ($result1->num_rows > 0){
    $result = $conexion->query(
        "SELECT idDepto, nombreDepartamento, riesgoD FROM vw_InteresInfo_matriz WHERE idPic = ".$id_pic." and  idDepto <> 67"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['riesgoD'].'">'.$row['nombreDepartamento'].'</option>';
        }
    }
}else{
    $result = $conexion->query(
        "SELECT idPaisAE,nombrePais,riesgoP FROM vw_InteresInfo_matriz WHERE idPic = ".$id_pic." "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {                
            $html .= '<option value="'.$row['riesgoP'].'">'.$row['nombrePais'].'</option>';
        }
    }

}

echo $html;
?>