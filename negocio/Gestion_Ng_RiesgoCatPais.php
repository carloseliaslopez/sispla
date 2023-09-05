<?php
error_reporting(0);
include_once("../Entidades/Administracion/Riesgo_Cat_Pais.php");
include_once("../Datos/Gestion_Dt_ActiEconomica.php");

$mon = new Riesgo_Cat_Pais();
$dtMon = new Gestion_Dt_ActiEconomica();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->Existe_Riesgo_CxP(($_POST['actividadEconomica']),($_POST['pais'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('idCatalogoAE', $_POST['actividadEconomica']);
                    $mon->__SET('idPais', $_POST['pais']);
                    $mon->__SET('calificacion_Cat_Pais', $_POST['calificación_Cat']);

                    $dtMon->registrarAExPais($mon);
                    header("Location: ../dist/109_Gestion_AE.php?msjNewCat=1");
                    break;
                   
                } else {
                    header("Location: ../dist/109_Gestion_AE.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/109_Gestion_AE.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           /*
            try 
            {
                
                $mon->__SET('codigoCIIU', $_POST['codigo_E']);
                $mon->__SET('descripcionCIIU', $_POST['descripcion_E']);
                $mon->__SET('idEstado', 1);
                
                $mon->__SET('idCatalogoAE', $_POST['idCatalogoAE']);
        
                $dtMon->actualizarAE($mon);
                
                header("Location: ../dist/109_Gestion_AE.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/109_Gestion_AE.php?msjEditMon=2");
                die($e->getMessage());
            }
            break;
            */
        
        default:
            # code...
            break;
    }

}
/*
if ($_GET) 
{
    try 
    {
        $mon->__SET('idCatalogoAE', $_GET['delEmp']);
        $dtMon->eliminarAE($mon->__GET('idCatalogoAE'));
        header("Location: ../dist/109_Gestion_AE.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/109_Gestion_AE.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
*/