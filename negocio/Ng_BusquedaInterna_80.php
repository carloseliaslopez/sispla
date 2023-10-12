<?php
session_start();

$user= $_SESSION['idUsuario'];

include_once("../Entidades/Busquedas/Busqueda_80.php");
include_once("../Datos/DtBusqueda_100.php");

$mon = new Busqueda_80();
$dtMon = new DtBusqueda_100();
/*

if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                //DatosEntidad--datos Input
                $mon->__SET('nombre', $_POST['nombre']);
                $mon->__SET('ubicacion', $_POST['ubicacion']);
                $mon->__SET('nombreEmpresa', $_POST['nombreEmpresa']);
                $mon->__SET('areaLaboral', $_POST['areaLaboral']);
                $mon->__SET('puesto', $_POST['puesto']);

				if (($dtMon->ExisteEmpleado(($_POST['nombre'])) == null)) {

                    $dtMon->registrarEmpleado($mon);
                    header("Location: ../dist/ListaEmpleados.php?msjNewEmp=1");
                    break;

                } else {
                    header("Location: ../dist/ListaEmpleados.php?msjNewEmp=3");    
                    break;
                }
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/ListaEmpleados.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombre', $_POST['nombre']);
                $mon->__SET('ubicacion', $_POST['ubicacion']);
                $mon->__SET('nombreEmpresa', $_POST['nombreEmpresa']);
                $mon->__SET('areaLaboral', $_POST['areaLaboral']);
                $mon->__SET('puesto', $_POST['puesto']);
                $mon->__SET('idEmpleados', $_POST['idpro']);
                        
                $dtMon->actualizarEmpleados($mon);
                
                header("Location: ../dist/ListaEmpleados.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/ListaEmpleados.php?msjEditMon=2");
                die($e->getMessage());
            }
            break;
            
        
        default:
            # code...
            break;
    }

}

*/
if ($_GET) 
{

    try 
    {
        //echo $user;
        $mon->__SET('idPosibles_List', $_GET['delEmp']);
        $mon->__SET('usuario_eliminacion', $user);

        $dtMon->EliminarRegistro_80($mon->__GET('usuario_eliminacion'),$mon->__GET('idPosibles_List') );
        header("Location: ../dist/BusquedaMensual.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/BusquedaMensual.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
