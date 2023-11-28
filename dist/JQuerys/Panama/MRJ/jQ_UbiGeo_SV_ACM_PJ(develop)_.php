<?php
$html = '';
$tpersona = '';

//require "./Datos/Conexion.php";
$conexion = new mysqli('localhost','admin','adminCump123.','sispla');

$id_pic = $_POST['id_pic'];
$id_matriz = $_POST['id_matriz'];

//consulta que determina si el cliente tiene 
$resulEmpresa = $conexion->query(
    "SELECT idTipoPerJuridica, tipoPersona FROM vw_interesinfo_matriz 
    WHERE idPic=".$id_pic." limit 1"
);

//si encuentra resultados comienza el proceso
if ($resulEmpresa->num_rows > 0){
    //cargamos el dato
    while ($row = $resultGene->fetch_assoc()) {   
        $tpersona = $row['idTipoPerJuridica'];
    }
    //si el tipo de persona no es 1 (empresa)
    if ($tpersona <>1){
        //ejecutamos para cargar la tabla de paises
        $resultPais = $conexion->query(
            "SELECT idPais, nombrePais, calificacion, idEstado, usuario_creacion, fecha_creacion 
             FROM pais 
             WHERE idEstado <>3 "
        );

        while ($row = $resultPais->fetch_assoc()) {   
            $html .= '<option value="'.$row['calificacion'].'">'.$row['nombrePais'].'</option>';
        }

    }else{
        $resultGene = $conexion->query(
            "SELECT a.nombreCompletoAccionistas, p.calificacion, a.nacionalidadAccionistas, p.nombrePais, a.idPic
            FROM accionistas a
            INNER JOIN pais p on a.nacionalidadAccionistas = p.Idpais
            AND idPic=".$id_pic." 
            AND a.acciones = (SELECT MAX(acciones) FROM accionistas WHERE idPic= ".$id_pic.")"
        );
        
        if ($resultGene->num_rows > 0){
        
              while ($row = $resultGene->fetch_assoc()) {   
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
            }
        
        }


    }
  
}else{
    $html .= '<option value="0">N/A</option>';
}

echo $tpersona
//echo $html;


?>