<?php
error_reporting(0);
include_once("../Entidades/Compartidas/Pais.php");
include_once("../Datos/Gestion_DtPais.php");

$mon = new Pais();
$dtMon = new Gestion_DtPais();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExistePais(($_POST['nombrePais_M'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombrePais', $_POST['nombrePais_M']);
                    $mon->__SET('calificacion', $_POST['calificacion']);
                    $dtMon->registrarPais($mon);
                    header("Location: ../dist/101_Gestion_Pais.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/101_Gestion_Pais.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/101_Gestion_Pais.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombrePais', $_POST['nombrePais_E']);
                $mon->__SET('calificacion', $_POST['calificacion_E']);
                $mon->__SET('idEstado', 2);
                
                $mon->__SET('idPais', $_POST['idPais']);
        
                $dtMon->actualizarPais($mon);
                
                header("Location: ../dist/101_Gestion_Pais.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/101_Gestion_Pais.php?msjEditMon=2");
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
        header("Location: ../dist/101_Gestion_Pais.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/101_Gestion_Pais.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
