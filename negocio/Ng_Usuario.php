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
        
            case '2':
                try 
                {
                    $mon->__SET('nombres', $_POST['txt_nombre']);
                    $mon->__SET('apellidos', $_POST['txt_apellidos']);
                    $mon->__SET('correo', $_POST['txt_correo']);
                    $mon->__SET('idUsuario', $_POST['txt_id_usuario']);

                    $dtMon->actualizarUsuario($mon);
                    header("Location: ../dist/Usuario.php?msjEditEmp=1");
                    break;
                } catch (Exception $e) 
                {
                    header("Location: ../dist/Usuario.php?msjEditEmp=2");
                    die($e->getMessage());
                }
            break;

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
    $rolCase = $_GET['delEmp'];
    $userCase = $_GET['delUser'];
    $blockUser = $_GET['blocUser'];
    $desblockUser = $_GET['dblocUser'];

    if(!empty($rolCase)){
        try {
            $mon->__SET('idRolUsuario', $_GET['delEmp']);
            $dtMon->eliminarRol($mon->__GET('idRolUsuario'));
            header("Location: ../dist/Roles.php?msjDelEmp=1");
        }catch(Exception $e)
        {
            header("Location: ../dist/Roles.php?msjDelEmp=2");
            die($e->getMessage());
        }
    }

    if(!empty($blockUser)){
        try {
            $mon->__SET('idUsuario', $_GET['blocUser']);
            $dtMon->bloquearUsuario($mon->__GET('idUsuario'));
            header("Location: ../dist/Usuario.php?msjbloEmp=1");
        }
        catch(Exception $e)
        {
            header("Location: ../dist/Usuario.php?msjbloEmp=2");
            die($e->getMessage());
        }
    }

    if(!empty($desblockUser)){
        try {
            $mon->__SET('idUsuario', $_GET['blocUser']);
            $dtMon->desbloquearUsuario($mon->__GET('idUsuario'));
            header("Location: ../dist/Usuario.php?msjdbloEmp=1");
        }
        catch(Exception $e)
        {
            header("Location: ../dist/Usuario.php?msjdbloEmp=2");
            die($e->getMessage());
        }
    }



    
}