<?php
$html = '';
require "./Datos/Conexion.php";
 
$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];

$result1 = $conexion->query(
    "SELECT PaisDomicilio FROM datosclientenaturalpic WHERE idPic = ".$id_pic." and PaisDomicilio = ".$id_matriz." "
);
if ($result1->num_rows > 0){
    $result = $conexion->query(
        "SELECT dcjp.deptoPaisDomicilio, d.nombreDepartamento, d.calificacion FROM datosclientenaturalpic dcjp
        INNER JOIN departamento d ON idDepartamento = deptoPaisDomicilio
        AND idPic = ".$id_pic.";"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombreDepartamento'].'</option>';
        }
    }
}else{
    $result = $conexion->query(
        "SELECT calificacion,nombrePais,idPic FROM vw_pdomicilio_tbl_dcnp WHERE idPic = ".$id_pic." "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {                
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }

}

echo $html;
?>