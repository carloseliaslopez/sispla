<?php
$html = '';
require "./Datos/Conexion.php";

$id_lugar = $_POST['id_lugar'];
 

if ($id_lugar==1){
    $result = $conexion->query(
        "SELECT calificacion, nombreDepartamento FROM departamento WHERE idPais = 2 or idDepartamento = 66 or idDepartamento = 67 and idEstado<>3"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombreDepartamento'].'</option>';
        }
    }
}else{
    $result = $conexion->query(
        "SELECT calificacion,nombrePais FROM Pais WHERE idPais <> 2 "
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {                
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }
    }

}

echo $html;
?>