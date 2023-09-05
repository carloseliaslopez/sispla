<?php
error_reporting(0);
include_once("../Entidades/Evaluacion/CatalogoOCGO.php");
include_once("../Datos/Gestion_Dt_CatEmpleo.php");


$mon = new CatalogoOCGO();
$dtMon = new Gestion_Dt_CatEmpleo();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->existeCatEmpleo(($_POST['codigo_N']),($_POST['descripcion_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('codigoCGO', $_POST['codigo_N']);
                    $mon->__SET('descripcionCGO', $_POST['descripcion_N']);
                    $mon->__SET('riesgoCGO', $_POST['riesgo_N']);
                    $mon->__SET('idEstado', 1);

                    $dtMon->registrarCatEmpleo($mon);
                    header("Location: ../dist/110_Gestion_CatEmpleo.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/110_Gestion_CatEmpleo.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/110_Gestion_CatEmpleo.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('codigoCGO', $_POST['codigo_E']);
                $mon->__SET('descripcionCGO', $_POST['descripcion_E']);
                $mon->__SET('riesgoCGO', $_POST['riesgo_E']);
                $mon->__SET('idEstado', 2);

                $mon->__SET('idCatalogoOCGO', $_POST['idCatalogoOCGO']);
        
                $dtMon->actualizarCatEmpleo($mon);
                
                header("Location: ../dist/110_Gestion_CatEmpleo.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/110_Gestion_CatEmpleo.php?msjEditMon=2");
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
        $mon->__SET('idCatalogoOCGO', $_GET['delEmp']);
        $dtMon->eliminarCatEmpleo($mon->__GET('idCatalogoOCGO'));
        header("Location: ../dist/110_Gestion_CatEmpleo.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/110_Gestion_CatEmpleo.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
