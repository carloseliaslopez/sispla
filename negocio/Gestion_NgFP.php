<?php
error_reporting(0);
include_once("../Entidades/Compartidas/FormaPago.php");
include_once("../Datos/Gestion_DtFormaPago.php");

$mon = new FormaPago();
$dtMon = new Gestion_DtFormaPago();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteFP(($_POST['nombreFP_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombreFormaPago', $_POST['nombreFP_N']);
                    $mon->__SET('riesgoFP', $_POST['riesgoFP_N']);
                    $mon->__SET('idEstado',1);
                    $dtMon->registrarFP($mon);
                    header("Location: ../dist/103_Gestion_FormaPago.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/103_Gestion_FormaPago.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/103_Gestion_FormaPago.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombreFormaPago', $_POST['nombreFP_E']);
                $mon->__SET('riesgoFP', $_POST['riesgoFP_E']);
                $mon->__SET('idEstado', 2);                
                $mon->__SET('idFormaPago', $_POST['idFormaPago']);
        
                $dtMon->actualizarFP($mon);
                
                header("Location: ../dist/103_Gestion_FormaPago.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/103_Gestion_FormaPago.php?msjEditMon=2");
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
        $mon->__SET('idFormaPago', $_GET['delEmp']);
        $dtMon->eliminarFP($mon->__GET('idFormaPago'));
        header("Location: ../dist/103_Gestion_FormaPago.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/103_Gestion_FormaPago.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
