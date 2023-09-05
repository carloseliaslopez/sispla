<?php

include_once("../Entidades/Evaluacion/InformeGeneralIDD.php");
include_once("../Entidades/Evaluacion/DocumentacionRecibida.php");
include_once("../Entidades/Evaluacion/ControlesAplicados.php");
include_once("../Entidades/Evaluacion/CatalogoDocumentos.php");

include_once("../Entidades/Evaluacion/MatrizRiesgoNatural.php");
include_once("../Entidades/Evaluacion/MatrizRiesgoJuridico.php");

include_once("../Entidades/Evaluacion/DocumentacionExtra.php");

include_once("../Datos/DtMatrizEvaluacion.php");
include_once("../Datos/DtMatrizRiesgoNatural.php");
include_once("../Datos/DtMatrizRiesgoJuridica.php");

$igIDD = new InformeGeneralIDD();
$docRec = new DocumentacionRecibida();
$CtrlAp = new ControlesAplicados();
$extra = new DocumentacionExtra();

$dtMon = new DtMatrizEvaluacion();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {

                
                //Insertando los datos generales dela evaluación
                $igIDD->__SET('idCliente', $_POST['idCli_PN']);
                $igIDD->__SET('cliente', $_POST['razonSocial_ME']);
                $igIDD->__SET('tipoCliente', $_POST['TipoCliente_hide']);
                $igIDD->__SET('productoSolicitado', $_POST['pSolicitado_ME']);
                $igIDD->__SET('paisCliente', $_POST['pais_ME']);
                $igIDD->__SET('monto', $_POST['monto_ME']);
                $igIDD->__SET('fechaRevision', $_POST['fechaRevision_ME']);
                $igIDD->__SET('proximaRevision', $_POST['fechaProxRevision_ME']);
                $igIDD->__SET('riesgo', $_POST['etiqueta']);
                $igIDD->__SET('observaciones', $_POST['observaciones_ME']);
               
                if(empty($_POST['validacionRecib'])){  
                }else{
                    $igIDD->__SET('inputRiesgo', $_POST['validacionRecib']);
                }
                
                $dtMon->registrarInformesIDD($igIDD);

                //Guardando datos extras

                $extra->__SET('idCliente', $_POST['idCli_PN']);
                $extra->__SET('productoSolicitado', $_POST['pSolicitado_ME']);
                $extra->__SET('documento', $_POST['nombreDoc_New']);
                $extra->__SET('comentario', $_POST['comentario_new']);
                $dtMon->registrarDocExtra($extra);

                $idDoc = $_POST['nombreDoc_ME_J'];
                $comentarioDR = $_POST['comentario_ME_J'];
                
                foreach ($idDoc as $key => $id){
                     
                    $nombre =$id; 
                    $comentario =$comentarioDR[$key]; 
                    
                                       
                    if(empty($nombre))
                    {
                        $docRec->__SET('idCatalogoDocumentos',30);
                    }else{
                        $docRec->__SET('idCatalogoDocumentos', $nombre);
                    }
                    if (empty($comentario)){
                        $docRec->__SET('comentario', NULL);
                    }else{
                        $docRec->__SET('comentario', $comentario);
                    }
                    
                    $docRec->__SET('idCliente', $_POST['idCli_PN']);
                    $docRec->__SET('productoSolicitado', $_POST['pSolicitado_ME']);
                    $dtMon->registrarDocIDD($docRec);     
                }

                $idDocN = $_POST['nombreDoc_ME_N'];
                $comentarioDRN = $_POST['comentario_ME_N'];
                
                foreach ($idDocN as $keyn => $idn){
                     
                    $nombreN =$idn; 
                    $comentarioN =$comentarioDRN[$keyn]; 
                    
                                       
                    if(empty($nombreN))
                    {
                        $docRec->__SET('idCatalogoDocumentos',30);
                    }else{
                        $docRec->__SET('idCatalogoDocumentos', $nombreN);
                    }
                    if (empty($comentarioN)){
                        $docRec->__SET('comentario', NULL);
                    }else{
                        $docRec->__SET('comentario', $comentarioN);
                    }
                    
                    $docRec->__SET('idCliente', $_POST['idCli_PN']);
                    $docRec->__SET('productoSolicitado', $_POST['pSolicitado_ME']);
                    $dtMon->registrarDocIDD($docRec);     
                }
                                           
                //GUARDANDO LOS CONTROLES APLICADOS
                $CtrlAp->__SET('idCliente', $_POST['idCli_PN']);
                $CtrlAp->__SET('productoSolicitado', $_POST['pSolicitado_ME']);
                if(empty($_POST['motoresBusqueda_ME'])){  
                    $CtrlAp->__SET('motorBusqueda', 0);
                }else{
                    $CtrlAp->__SET('motorBusqueda', 1);
                }

                if(empty($_POST['registroPublico_ME'])){  
                    $CtrlAp->__SET('registroMercantil', 0);
                }else{
                    $CtrlAp->__SET('registroMercantil', 1);
                }

                if(empty($_POST['poderJudicial_ME'])){  
                    $CtrlAp->__SET('poderJudicial', 0);
                }else{
                    $CtrlAp->__SET('poderJudicial', 1);
                }

                if(empty($_POST['intelicheck_ME'])){  
                    $CtrlAp->__SET('intelichek', 0);
                }else{
                    $CtrlAp->__SET('intelichek', 1);
                }

                if(empty($_POST['interpol_ME'])){  
                    $CtrlAp->__SET('interpol', 0);
                }else{
                    $CtrlAp->__SET('interpol', 1);
                }

                if(empty($_POST['fbi_ME'])){  
                    $CtrlAp->__SET('fbi', 0);
                }else{
                    $CtrlAp->__SET('fbi', 1);
                }

                if(empty($_POST['ofac_ME'])){  
                    $CtrlAp->__SET('ofac', 0);
                }else{
                    $CtrlAp->__SET('ofac', 1);
                }

                if(empty($_POST['listaConsolidada_ME'])){  
                    $CtrlAp->__SET('listasConsoUNSC', 0);
                }else{
                    $CtrlAp->__SET('listasConsoUNSC', 1);
                }

                if(empty($_POST['sancionesUE_ME'])){  
                    $CtrlAp->__SET('sancionesUE', 0);
                }else{
                    $CtrlAp->__SET('sancionesUE', 1);
                }
               

                $dtMon->registrarCtrlAplicados($CtrlAp);
				
                header("Location: ../dist/ListaInformesIDD.php?msjNewEmp=1");
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