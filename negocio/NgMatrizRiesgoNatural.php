<?php

include_once("../Entidades/Evaluacion/MatrizRiesgoNatural.php");
include_once("../Entidades/Natural/DatosClienteNaturalPic.php");
include_once("../Entidades/Natural/vw_DatosClienteNaturalPic.php");
include_once("../Entidades/Compartidas/OrigenesFondos.php");
include_once("../Entidades/Compartidas/Pep.php");

include_once("../Entidades/Evaluacion/CatalogoAE.php");
include_once("../Entidades/Evaluacion/CatalogoDocumentos.php");
include_once("../Entidades/Evaluacion/CatalogoOCGO.php");
include_once("../Entidades/Evaluacion/CatalogoSubProducto.php");
include_once("../Entidades/Evaluacion/CategoriaProducto.php");
include_once("../Entidades/Evaluacion/Monto.php");

include_once("../Datos/DtMatrizRiesgoNatural.php");
include_once("../Datos/DtPic.php");
include_once("../Datos/DtMatrizRiesgoCompartida.php");

$mon = new MatrizRiesgoNatural();
$dtMon = new DtMatrizRiesgoNatural();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                //DatosEntidad--datos Input
                $mon->__SET('idCliente', $_POST['idCliente']);
                $mon->__SET('cliente', $_POST['cliente']);
                $mon->__SET('lugarNacimiento', $_POST['lugarNacimiento']);
                $mon->__SET('lugarNacionalidad', $_POST['lugarNacionalidad']);
                $mon->__SET('lugarResidencia', $_POST['lugarResidencia']);
                $mon->__SET('categoria', $_POST['categoria']);
                $mon->__SET('profesion', $_POST['profesion']);
                $mon->__SET('actividadEmpleo', $_POST['actividadEmpleo']);
                $mon->__SET('lugarActividadEconomica', $_POST['lugarActividadEconomica']);
                $mon->__SET('resultadosBusquedas', $_POST['resultadosBusquedas']);
                $mon->__SET('condicionPEP', $_POST['condicionPEP']);
                $mon->__SET('productoSolicitado', $_POST['productoSolicitado']);
                if (empty($_POST['productoSolicitado'])){
                    $mon->__SET('productoSolicitado',null);
                }else{
                    $mon->__SET('productoSolicitado', $_POST['productoSolicitado']);
                }
                $mon->__SET('monto', $_POST['monto']);
                $mon->__SET('formaPago', $_POST['formaPago']);
                $mon->__SET('origenRecursos', $_POST['origenRecursos']);
                $mon->__SET('riesgoCliente', $_POST['riesgoCliente']);
                $mon->__SET('tipoCliente', $_POST['tipoCliente']);
                $mon->__SET('paisMatriz', $_POST['paisMatriz']);
                $mon->__SET('proximaRevision', $_POST['fechaProxRevision_ME']);
                $editE = $_POST['idCliente'];
                $editProd = $_POST['productoSolicitado'];
				
				if (($dtMon->ExisteEvaluacion(($_POST['idCliente']),($_POST['productoSolicitado'])) == null)) {

                    $dtMon->registrarMatriz_N($mon);

                    header("Location: ../dist/MatrizEvaluacion.php?editE=$editE&editProd=$editProd");
                    break;

                } else {
                    header("Location: ../dist/Matrices.php?msjNewEmp=3");    
                    break;
                }
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/Matrices.php?msjNewEmp=2");
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