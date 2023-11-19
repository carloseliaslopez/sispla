
<?php

$html = '';

require "./Datos/Conexion.php";
//$conexion = new mysqli('172.22.1.12','localhost','Cumpl1m1ento2023*','sispla');
$id_empleo = $_POST['id_empleo'];
$id_matriz = $_POST['id_matriz']; 
 
$result = $conexion->query(
    "SELECT idRiesgo_Cat_Pais,idCatalogoAE,descripcionCIIU,idPais,nombrePais,calificacion_Cat_Pais,idEstado 
    FROM vw_catalogoae_det WHERE idCatalogoAE = ".$id_empleo." and idPais = ".$id_matriz." "
);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['calificacion_Cat_Pais'].'">'.$row['descripcionCIIU'].'</option>';
    }
}
echo $html;
?>