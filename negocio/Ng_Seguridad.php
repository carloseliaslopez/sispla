<?php
//error_reporting(0);
include_once("../Entidades/Seguridad/RolUsuario.php");
include_once("../Datos/DtSeguridad.php");


$mon = new RolUsuario();
$dtMon = new DtSeguridad();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteRolUsuario(($_POST['Usuario_Rol']),($_POST['Rol'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('idUsuario', $_POST['Usuario_Rol']);
                    $mon->__SET('idRol', $_POST['Rol']);
                   

                    $dtMon->registrarRolUsuario($mon);
                    header("Location: ../dist/Roles.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/Roles.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/Roles.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                //$mon->__SET('idUsuario', $_POST['apt_UsuarioRol']);
                $mon->__SET('idRol', $_POST['apt_rol']);
                $mon->__SET('idRolUsuario', $_POST['idRolUsuario']);
                $dtMon->actualizarRolUsuario($mon);
                
                header("Location: ../dist/Roles.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/Roles.php?msjEditMon=2");
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
        $mon->__SET('idRolUsuario', $_GET['delEmp']);
        $dtMon->eliminarRol($mon->__GET('idRolUsuario'));
        header("Location: ../dist/Roles.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/Roles.php?msjDelEmp=2");
        die($e->getMessage());
    }
}