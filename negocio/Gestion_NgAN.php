<?php
error_reporting(0);
include_once("../Entidades/Compartidas/ActividadNegocio.php");
include_once("../Datos/Gestion_DtAN.php");

$mon = new ActividadNegocio();
$dtMon = new Gestion_DtAN();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteAN(($_POST['nombreAN_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombreActividadNegocio', $_POST['nombreAN_N']);
                    $mon->__SET('idEstado', 1);

                    $dtMon->registrarAN($mon);
                    header("Location: ../dist/106_Gestion_ActividadNegocio.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/106_Gestion_ActividadNegocio.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/106_Gestion_ActividadNegocio.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombreActividadNegocio', $_POST['nombreAN_E']);
                $mon->__SET('idEstado', 2);
                
                $mon->__SET('idActividadNegocio', $_POST['idActividadNegocio']);
        
                $dtMon->actualizarAN($mon);
                
                header("Location: ../dist/106_Gestion_ActividadNegocio.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/106_Gestion_ActividadNegocio.php?msjEditMon=2");
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
        $mon->__SET('idActividadNegocio', $_GET['delEmp']);
        $dtMon->eliminarAN($mon->__GET('idActividadNegocio'));
        header("Location: ../dist/106_Gestion_ActividadNegocio.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/106_Gestion_ActividadNegocio.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
