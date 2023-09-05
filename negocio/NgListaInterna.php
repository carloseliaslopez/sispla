<?php

include_once("../Entidades/ListasInternas.php");
include_once("../Datos/DtListasInternas.php");

$mon = new ListasInternas();
$dtMon = new DtListasInternas();


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
                $mon->__SET('origen', $_POST['origen']);
				
				if (($dtMon->ExisteListaInterna(($_POST['nombre']),($_POST['origen'])) == null)) {

                    $dtMon->registrarListaInterna($mon);
                    header("Location: ../dist/ListaInterna.php?msjNewEmp=1");
                    break;

                } else {
                    header("Location: ../dist/ListaInterna.php?msjNewEmp=3");    
                    break;
                }
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/ListaInterna.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
          
            try 
            {

            
                $mon->__SET('nombre', $_POST['nombre']);               
                $mon->__SET('idListasInternas', $_POST['idli']);
        
                $dtMon->actualizarListaInterna($mon);
                
                header("Location: ../dist/ListaInterna.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/ListaInterna.php?msjEditEmp=2");
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
        $mon->__SET('idListasInternas', $_GET['delEmp']);
        $dtMon->EliminarListaInterna($mon->__GET('idListasInternas'));
        header("Location: ../dist/ListaInterna.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/ListaInterna.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
