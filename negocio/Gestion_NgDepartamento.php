<?php
error_reporting(0);
include_once("../Entidades/Compartidas/Departamento.php");
include_once("../Datos/Gestion_DtDepartamento.php");


$mon = new Departamento();
$dtMon = new Gestion_DtDepartamento();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				if (($dtMon->ExisteDepartamento(($_POST['nombreDepto_N']),($_POST['paisOrigen_N'])) == null)) {
                    //DatosEntidad--datos Input
                    $mon->__SET('nombreDepartamento', $_POST['nombreDepto_N']);
                    $mon->__SET('calificacion', $_POST['calificacion_N']);
                    $mon->__SET('idPais', $_POST['paisOrigen_N']);

                    $dtMon->registrarDepartamento($mon);
                    header("Location: ../dist/102_Gestion_Departamento.php?msjNewEmp=1");
                    break;
                   
                } else {
                    header("Location: ../dist/102_Gestion_Departamento.php?msjNewEmp=3");    
                    break;
                }
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/102_Gestion_Departamento.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                
                $mon->__SET('nombreDepartamento', $_POST['nombreDepto_E']);
                $mon->__SET('calificacion', $_POST['calificacion_E']);
                $mon->__SET('idPais', $_POST['paisOrigen_E']);
                $mon->__SET('idEstado', 2);
                $mon->__SET('idDepartamento', $_POST['idDepartamento']);
        
                $dtMon->actualizarDepartamento($mon);
                
                header("Location: ../dist/102_Gestion_Departamento.php?msjEditEmp=1");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/102_Gestion_Departamento.php?msjEditMon=2");
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
        $mon->__SET('idDepartamento', $_GET['delEmp']);
        $dtMon->eliminarDepartamento($mon->__GET('idDepartamento'));
        header("Location: ../dist/102_Gestion_Departamento.php?msjDelEmp=1");
    }
    catch(Exception $e)
    {
        header("Location: ../dist/102_Gestion_Departamento.php?msjDelEmp=2");
        die($e->getMessage());
    }
}
