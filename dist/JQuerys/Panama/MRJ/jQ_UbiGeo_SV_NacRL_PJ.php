<?php
$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','root','CEal2000!','versatec');
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz']; 

$result1 = $conexion->query(
    "SELECT nacionalidad FROM DatosRepresentanteLegal WHERE idPic = ".$id_pic." and nacionalidad = ".$id_matriz." "
);
if ($result1->num_rows > 0){
    $result = $conexion->query(
        "SELECT lnacim.deptoNacionalidad, d.nombreDepartamento, d.calificacion FROM DatosRepresentanteLegal lnacim
        INNER JOIN Departamento d ON idDepartamento = deptoNacionalidad
        AND idPic = ".$id_pic.";"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombreDepartamento'].'</option>';
        }
    }
}else{
    $result = $conexion->query(
        "SELECT calificacion,nombrePais,idPic FROM vw_Nacionalidad_tbl_DRL WHERE idPic = ".$id_pic." "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {                
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }

}

echo $html;
?>