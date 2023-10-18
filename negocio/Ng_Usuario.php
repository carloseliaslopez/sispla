<?php
//error_reporting(0);
include_once("../Entidades/Seguridad/Usuario.php");
include_once("../Datos/DtSeguridad.php");


$mon = new Usuario();
$dtMon = new DtSeguridad();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteUsuario(($_POST['usuario'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombres', $_POST['nombre']);
                    $mon->__SET('apellidos', $_POST['apellidos']);
                    $mon->__SET('usuario', $_POST['usuario']);
                    $mon->__SET('correo', $_POST['correo']);
                    $encript = sha1($_POST['rand_pwd']);
                    $mon->__SET('pwd', $encript);

                    
                    $dtMon->registrarUsuario($mon);
                    
                    header("Location: ../dist/Usuario.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/Usuario.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/Usuario.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        /*
            case '2':
           
            try 
            {
                
                //$mon->__SET('idUsuario', $_POST['apt_UsuarioRol']);
                $mon->__SET('idRol', $_POST['apt_rol']);
                $mon->__SET('idRolUsuario', $_POST['idRolUsuario']);
                $dtMon->actualizarRolUsuario($mon);
                
                header("Location: ../dist/Usuario.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/Usuario.php?msjEditMon=2");
                die($e->getMessage());
            }
            break;
            */
            case '3':
           
                try 
                {
                    
                    $Nencript = sha1($_POST['newpwd']);
                    $test = $_POST['idUsuario'];


                    $mon->__SET('pwd', $Nencript);
                    $mon->__SET('idUsuario', $_POST['idUsuario']);
                    $mon->__SET('firt_time',1);
                                   
                    $dtMon->actualizarPwdUsuario($mon);
                    
                    session_destroy();
                    header("Location: ../dist/login.php");
                    break;
                } 
                catch (Exception $e) 
                {
                    header("Location: ../dist/login.php");
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