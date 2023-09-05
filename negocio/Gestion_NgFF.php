<?php
error_reporting(0);
include_once("../Entidades/Compartidas/FuenteFondos.php");
include_once("../Datos/Gestion_DtFFondos.php");

$mon = new FuenteFondos();
$dtMon = new Gestion_DtFFondos();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteFF(($_POST['nombreFF_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombreFuenteFondos', $_POST['nombreFF_N']);
                    $mon->__SET('riesgoFF', $_POST['calificacion']);
                    $mon->__SET('idEstado', 1);
                    $dtMon->registrarFF($mon);
                    header("Location: ../dist/105_Gestion_FF.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/105_Gestion_FF.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/105_Gestion_FF.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombreFuenteFondos', $_POST['nombreFF_E']);
                $mon->__SET('riesgoFF', $_POST['calificacion_E']);
                $mon->__SET('idEstado', 2);
                
                $mon->__SET('idFuenteFondos', $_POST['idFuenteFondos']);
        
                $dtMon->actualizarFF($mon);
                
                header("Location: ../dist/105_Gestion_FF.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/105_Gestion_FF.php?msjEditMon=2");
                die($e->getMessage());
            }
            break;
            
        
        default:
            # code...
            break;
    }

}

if ($_GET) 
{
    try 
    {
        $mon->__SET('idPais', $_GET['delEmp']);
        $dtMon->eliminarPais($mon->__GET('idPais'));
        header("Location: ../dist/105_Gestion_FF.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/105_Gestion_FF.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
