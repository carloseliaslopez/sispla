<?php
error_reporting(0);
include_once("../Entidades/Evaluacion/CatalogoSubProducto.php");
include_once("../Datos/Gestion_Dt_CatSubProducto.php");


$mon = new CatalogoSubProducto();
$dtMon = new Gestion_Dt_CatSubProducto();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteProducto(($_POST['nombreProd_N']),($_POST['CatProduct_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombreSubProducto', $_POST['nombreProd_N']);
                    $mon->__SET('idCategoriaProducto', $_POST['CatProduct_N']);
                    $mon->__SET('riesgoSubProducto', $_POST['calificacion_N']);
                    $mon->__SET('idEstado', 1);

                    $dtMon->registrarProducto($mon);
                    header("Location: ../dist/108_Gestion_CatSubProducto.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/108_Gestion_CatSubProducto.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/108_Gestion_CatSubProducto.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombreSubProducto', $_POST['nombreProd_E']);
                $mon->__SET('idCategoriaProducto', $_POST['catProduct_E']);
                $mon->__SET('riesgoSubProducto', $_POST['calificacion_E']);
                $mon->__SET('idEstado', 2);

                $mon->__SET('idCatalogoSubProducto', $_POST['idCatalogoSubProducto']);
        
                $dtMon->actualizarProducto($mon);
                
                header("Location: ../dist/108_Gestion_CatSubProducto.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/108_Gestion_CatSubProducto.php?msjEditMon=2");
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
        $mon->__SET('idCatalogoSubProducto', $_GET['delEmp']);
        $dtMon->eliminarProducto($mon->__GET('idCatalogoSubProducto'));
        header("Location: ../dist/108_Gestion_CatSubProducto.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/108_Gestion_CatSubProducto.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
