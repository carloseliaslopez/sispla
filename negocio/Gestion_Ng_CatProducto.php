<?php
error_reporting(0);
include_once("../Entidades/Evaluacion/CategoriaProducto.php");
include_once("../Datos/Gestion_Dt_CatProducto.php");

$mon = new CategoriaProducto();
$dtMon = new Gestion_Dt_CatProducto();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->existeCatProducto(($_POST['nombreCat_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombreCategoriaProducto', $_POST['nombreCat_N']);
                    $mon->__SET('idEstado', 1);

                    $dtMon->registrarCatProducto($mon);
                    header("Location: ../dist/107_Gestion_CategoriaProducto.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/107_Gestion_CategoriaProducto.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/107_Gestion_CategoriaProducto.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombreCategoriaProducto', $_POST['nombreCat_E']);
                $mon->__SET('idEstado', 2);
                
                $mon->__SET('idCategoriaProducto', $_POST['idCategoriaProducto']);
        
                $dtMon->actualizarCatProducto($mon);
                
                header("Location: ../dist/107_Gestion_CategoriaProducto.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/107_Gestion_CategoriaProducto.php?msjEditMon=2");
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
        $mon->__SET('idCategoriaProducto', $_GET['delEmp']);
        $dtMon->eliminarCatProducto($mon->__GET('idCategoriaProducto'));
        header("Location: ../dist/107_Gestion_CategoriaProducto.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/107_Gestion_CategoriaProducto.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
