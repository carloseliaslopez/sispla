<html>
<?php
//cadena de conexion
$mysqli = new mysqli("localhost", 'root','CEal2000!','sispla'); 
$query = "SELECT nombre, id, origen FROM vw_consol_nombre";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $Nombre = $row["nombre"];
        $Id = $row["id"];
        $Origen = $row["origen"];
               
        echo '<tr> 
                  <td>'.$Nombre.'</td> <br>
                  <td>'.$Id.'</td> <br>
                  <td>'.$Origen.'</td> <br>
                  
                  
              </tr>';
        
        $mysqli = new mysqli("localhost", 'root','CEal2000!','global_risk_lists'); 
        $query2 = "SELECT  fullName_I AS 'fullname', origen , MATCH (fullName_I) AGAINST ('$Nombre') AS puntuacion
                  FROM ofac_list_IN WHERE  MATCH (fullName_I) AGAINST ('$Nombre')
                  ORDER  BY puntuacion DESC LIMIT 3;";
        
        $result2 = $mysqli->query($query2);
        while ($row2 = $result2->fetch_assoc()) {
            $Nombre2 = $row2["fullname"];
            $Origen2 = $row2["origen"];

            echo '<tr> 
                    <td>'.$Nombre2.'</td>
                    <td>'.$Origen2.'</td>  
                    <br>
                    <br>                  
                 </tr>';

        }



      
    }
   
} 


?>

</html>