<?php
session_start();
     //cadena de conexion
     $conexion = new mysqli('localhost','admin','adminCump123.','monitoreo'); 
     $query = "SELECT cod_alert_temp,nombre_cliente, plastico,fecha_proceso, monto, regla, oficina FROM vw_alertas_;";

        if ($result = $conexion->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $cod_alert_temp = $row["cod_alert_temp"];
                $nombre_cliente = $row["nombre_cliente"];
                $plastico = $row["plastico"];
                $fecha_proceso = $row["fecha_proceso"];
                $monto = $row["monto"];
                $regla = $row["regla"];
                $oficina = $row["oficina"];
                $estado_regla = 'Abierta';

                $usuario_creacion= $_SESSION['idUsuario'];
              
                $conexion2 = new mysqli("localhost", 'admin','adminCump123.','sispla'); 
               
               $query2 = "INSERT IGNORE INTO alertas_diarias (cod_alert_temp,nombre_cliente,plastico,fecha_proceso,monto,regla,oficina,estado_regla,idEstado, usuario_creacion,fecha_creacion ) VALUES 
                ('$cod_alert_temp','$nombre_cliente', '$plastico', '$fecha_proceso', $monto,'$regla','$oficina','$estado_regla',1,$usuario_creacion,current_timestamp());";
                
                $result2 = $conexion2->query($query2);
                
            }
      
        } 
 

     
    ?> 