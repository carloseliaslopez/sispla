<?php
$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','root','CEal2000!','versatec');
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];
 
$result1 = $conexion->query(
    "SELECT paisResidencia FROM DatosRepresentanteLegal WHERE idPic = ".$id_pic." and paisResidencia = ".$id_matriz." "
);
if ($result1->num_rows > 0){
    $result = $conexion->query(
        "SELECT prrl.deptoPaisResidencia, d.nombreDepartamento, d.calificacion FROM DatosRepresentanteLegal prrl
        INNER JOIN Departamento d ON idDepartamento = deptoPaisResidencia
        AND idPic = ".$id_pic.";"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombreDepartamento'].'</option>';
        }
    }
}else{
    $result = $conexion->query(
        "SELECT calificacion,nombrePais,idPic FROM vw_PResidencia_tbl_DRL WHERE idPic = ".$id_pic." "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {                
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }

}

echo $html;
?>