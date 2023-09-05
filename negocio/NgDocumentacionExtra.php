<?php
error_reporting(0);
include_once("../Entidades/Evaluacion/DocumentacionExtra.php");
include_once("../Datos/DtMatrizEvaluacion.php");

$mon = new DocumentacionExtra();
$dtMon = new DtMatrizEvaluacion();


if ($_POST) 
{
    $varAccion = $_POST['txtextra'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                               
				$mon->__SET('idCliente', $_POST['idCliente']);
                $mon->__SET('productoSolicitado', $_POST['ProducSol']);
                $mon->__SET('documento', $_POST['nombreDoc_New']);
                $mon->__SET('comentario', $_POST['comentario_new']);
                $dtMon->registrarDocExtra($mon);
                //header("Location: ../dist/105_Gestion_FF.php?msjNewEmp=1");
                echo "Registrado con éxito";
                break;
                
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/105_Gestion_FF.php?msjNewEmp=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
           
            try 
            {
                /*
                
                $mon->__SET('nombreFuenteFondos', $_POST['nombreFF_E']);
                $mon->__SET('riesgoFF', $_POST['calificacion_E']);
                $mon->__SET('idEstado', 2);
                
                $mon->__SET('idFuenteFondos', $_POST['idFuenteFondos']);
        
                $dtMon->actualizarFF($mon);
                
                header("Location: ../dist/105_Gestion_FF.php?msjEditEmp=1");
                break;
                */
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/105_Gestion_FF.php?msjEditMon=2");
                die($e->getMessage());
            }
            break;
            
        
        default:
            # code...
            break;
    }

}

