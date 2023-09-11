<?php

include_once("../Entidades/Pic.php");
include_once("../Datos/DtPic.php");

$mon = new Pic();
$dtMon = new DtPic();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                //DatosEntidad--datos Input
                $mon->__SET('fechaPic', $_POST['fechaPic']);
                $mon->__SET('nombreCliente', $_POST['nombreCliente']);
                $mon->__SET('id', $_POST['id']);
                $mon->__SET('categoria', $_POST['txtcategoria']);
                $mon->__SET('usuario_creacion', $_POST['idUsuario']);
                $mon->__SET('idEmpresa', $_POST['empresa']);
                
                
				
				if (($dtMon->ExistePic(($_POST['id'])) == null)) {

                    $dtMon->registrarPic($mon);
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
           break;
        
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