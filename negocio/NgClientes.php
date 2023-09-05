<?php

include_once("../Entidades/Clientes.php");
include_once("../Datos/DtClientes.php");

$mon = new Clientes();
$dtMon = new DtClientes();


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
				
				if (($dtMon->ExisteCliente(($_POST['nombre']),($_POST['id'])) == null)) {

                    $dtMon->registrarClientes($mon);
                    header("Location: ../dist/ListaClientes.php?msjNewEmp=1");
                    break;

                } else {
                    header("Location: ../dist/ListaClientes.php?msjNewEmp=3");    
                    break;
                }
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/ListaClientes.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           /*
            try 
            {
                $mon->__SET('id_moneda', $_POST['idMon']);
                $mon->__SET('nombre', $_POST['nombre']);
                $mon->__SET('simbolo', $_POST['simbolo']);
                $mon->__SET('estado', $_POST['estado']);
        
                if (($dtMon->ExisteMoneda($_POST['moneda']) == null) and 
                    ($dtMon->ExisteSimbolo($_POST['simbolo']) == null)) {

                    $dtMon->actualizarMon($mon);
                    header("Location: ../dist/TblMoneda.php?msjEditMon=1");
                    break;

                } else {
                    header("Location: ../dist/TblMoneda.php?msjEditMon=3");    
                    break;
                }
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/TblMoneda.php?msjEditMon=2");
                die($e->getMessage());
            }
            break;
            */

        // case '3':
            // try 
            // {
                // $mon->__SET('id_moneda', $_POST['idMon']);
                // $mon->__SET('nombre', $_POST['nombre']);
                // $mon->__SET('simbolo', $_POST['simbolo']);
                // $mon->__SET('estado', $_POST['estado']);
        
                // $dtMon->actualizarMon($mon);
                //var_dump($emp);
                // header("Location: ../dist/TblMoneda.php?msjDelMon=1");
            // } 
            // catch (Exception $e) 
            // {
                // header("Location: ../dist/TblMoneda.php?msjDelMon=2");
                // die($e->getMessage());
            // }
            // break;
        
        default:
            # code...
            break;
    }

}
/*
if ($_GET) 
{
    try 
    {
        $mon->__SET('id_moneda', $_GET['DelMon']);
        $dtMon->EliminarMoneda($mon->__GET('id_moneda'));
        header("Location: ../dist/TblMoneda.php?msjDelMon=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/TblMoneda.php?msjDelMon=2");
        die($e->getMessage());
    }
}
*/