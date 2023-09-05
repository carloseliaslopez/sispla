<?php
error_reporting(0);
include_once("../Entidades/Compartidas/AreaGeografica.php");
include_once("../Datos/Gestion_DtAG.php");

$mon = new AreaGeografica();
$dtMon = new Gestion_DtAG();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteAG(($_POST['nombreAG_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombreAreaGeografica', $_POST['nombreAG_N']);
                    $mon->__SET('idEstado', 1);

                    $dtMon->registrarAG($mon);
                    header("Location: ../dist/104_Gestion_AreaGeografica.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/104_Gestion_AreaGeografica.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/104_Gestion_AreaGeografica.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombreAreaGeografica', $_POST['nombreAG_E']);
                $mon->__SET('idEstado', 2);
                
                $mon->__SET('idAreaGeografica', $_POST['idAreaGeografica']);
        
                $dtMon->actualizarAG($mon);
                
                header("Location: ../dist/104_Gestion_AreaGeografica.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/104_Gestion_AreaGeografica.php?msjEditMon=2");
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
        $mon->__SET('idAreaGeografica', $_GET['delEmp']);
        $dtMon->eliminarAG($mon->__GET('idAreaGeografica'));
        header("Location: ../dist/104_Gestion_AreaGeografica.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/104_Gestion_AreaGeografica.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
