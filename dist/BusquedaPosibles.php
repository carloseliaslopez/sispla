<?php
session_start();
     //cadena de conexion
    $mysqli = new mysqli("localhost", 'root','CEal2000!','sispla'); 
    $query = "SELECT nombre, id, origen FROM vw_consol_nombre";

        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $Nombre = $row["nombre"];
                $Id = $row["id"];
                $Origen = $row["origen"];
            
                    $mysqli = new mysqli("localhost", 'root','CEal2000!','global_risk_lists'); 
                    $query2 = " SELECT  fullName_I AS 'fullname', origen , MATCH (fullName_I) AGAINST ('$Nombre') AS puntuacion
                                FROM ofac_list_IN WHERE  MATCH (fullName_I) AGAINST ('$Nombre')
                                
                                union all 
                                SELECT  fullName_E AS 'fullname', origen , MATCH (fullName_E) AGAINST ('$Nombre') AS puntuacion
                                FROM ofac_list_en WHERE  MATCH (fullName_E) AGAINST ('$Nombre')
                                
                                UNION ALL
                                SELECT  fullName_E AS 'fullname', origen , MATCH (fullName_E) AGAINST ('$Nombre') AS puntuacion
                                FROM onu_list_en WHERE  MATCH (fullName_E) AGAINST ('$Nombre')
                                
                                UNION ALL
                                SELECT  fullName_I AS 'fullname', origen , MATCH (fullName_I) AGAINST ('$Nombre') AS puntuacion
                                FROM onu_list_IN WHERE  MATCH (fullName_I) AGAINST ('$Nombre')
                                ORDER  BY puntuacion DESC LIMIT 1;
                            
                            ";
                    
                    $result2 = $mysqli->query($query2);
                                                                                    
                        while ($row2 = $result2->fetch_assoc()) {
                            $Nombre = $row["nombre"];
                            $Id = $row["id"];
                            $Origen = $row["origen"];
                            $Nombre2 = $row2["fullname"];
                            $Origen2 = $row2["origen"]; 
                            $usuario_creacion= $_SESSION['idUsuario'];
                            
                           
                            

                            $mysqli = new mysqli("localhost", 'root','CEal2000!','sispla'); 
                           $query3 = "INSERT IGNORE INTO Posibles_List (Nombre,Id,Origen,Nombre2,Origen2,idEstado,usuario_creacion,fecha_creacion) VALUES ('$Nombre', '$Id', '$Origen', '$Nombre2','$Origen2',1,$usuario_creacion,current_timestamp());";
                           $result3 = $mysqli->query($query3);
                            
                        }         
            }
        } 

        echo ("proceso Terminado");
    ?>