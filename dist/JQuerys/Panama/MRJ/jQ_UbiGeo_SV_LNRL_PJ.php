<?php
$html = '';
//require "./Datos/Conexion.php";
$conexion = new mysqli('172.22.1.12','localhost','Cumpl1m1ento2023*','sispla');
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];

$result1 = $conexion->query(
    "SELECT paisNacimiento FROM datosrepresentantelegal WHERE idPic = ".$id_pic." and paisNacimiento = ".$id_matriz." "
);
if ($result1->num_rows > 0){
    $result = $conexion->query(
        "SELECT lnrl.deptoPaisNacimiento, d.nombreDepartamento, d.calificacion FROM datosrepresentantelegal lnrl
        INNER JOIN departamento d ON idDepartamento = deptoPaisNacimiento
        AND idPic = ".$id_pic.";"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombreDepartamento'].'</option>';
        }
    }
}else{
    $result = $conexion->query(
        "SELECT calificacion,nombrePais,idPic FROM vw_pnacimiento_tbl_drl WHERE idPic = ".$id_pic." "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {                
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }

}

echo $html;
?>