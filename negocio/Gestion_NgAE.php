<?php
error_reporting(0);
include_once("../Entidades/Administracion/CatalogoAE.php");
include_once("../Datos/Gestion_Dt_ActiEconomica.php");

$mon = new CatalogoAE();
$dtMon = new Gestion_Dt_ActiEconomica();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteAE(($_POST['codigo_N']),($_POST['descripcion_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('codigoCIIU', $_POST['codigo_N']);
                    $mon->__SET('descripcionCIIU', $_POST['descripcion_N']);
                    $mon->__SET('idEstado', 1);
                    $dtMon->registrarAE($mon);
                    header("Location: ../dist/109_Gestion_AE.php?msjNewEmp=1");
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
            
        
        default:
            # code...
            break;
    }

}

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
