<?php

include_once("../Entidades/Proveedores.php");
include_once("../Datos/DtProveedores.php");

$mon = new Proveedores();
$dtMon = new DtProveedores();


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
                $mon->__SET('id', $_POST['id']);
                $mon->__SET('ubicacion', $_POST['ubicacion']);
                $mon->__SET('servicio', $_POST['servicio']);
                $mon->__SET('actividadEconomica', $_POST['actividadEconomica']);
                				
				if (($dtMon->ExisteProveedorId(($_POST['id'])) == null)) {

                    $dtMon->registrarProveedores($mon);
                    header("Location: ../dist/ListaProveedores.php?msjNewEmp=1");
                    break;

                } else {
                    header("Location: ../dist/ListaProveedores.php?msjNewEmp=3");    
                    break;
                }
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/ListaProveedores.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombre', $_POST['nombre']);
                $mon->__SET('id', $_POST['id']);
                $mon->__SET('ubicacion', $_POST['ubicacion']);
                $mon->__SET('servicio', $_POST['servicio']);
                $mon->__SET('actividadEconomica', $_POST['actividadEconomica']);
                $mon->__SET('idProveedores', $_POST['idpro']);
        
                $dtMon->actualizarProveedor($mon);
                
                header("Location: ../dist/ListaProveedores.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/ListaProveedores.php?msjEditMon=2");
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
        $mon->__SET('idProveedores', $_GET['delEmp']);
        $dtMon->EliminarProveedor($mon->__GET('idProveedores'));
        header("Location: ../dist/ListaProveedores.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/ListaProveedores.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
