<?php

include_once("../Entidades/Empleados.php");
include_once("../Datos/DtEmpleados.php");

$mon = new Empleados();
$dtMon = new DtEmpleados();


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

if ($_GET) 
{
    try 
    {
        $mon->__SET('idEmpleados', $_GET['delEmp']);
        $dtMon->EliminarEmpleado($mon->__GET('idEmpleados'));
        header("Location: ../dist/ListaEmpleados.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/ListaEmpleados.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
