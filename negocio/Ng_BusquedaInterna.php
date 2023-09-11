<?php

include_once("../Entidades/Busquedas/Circular.php");
include_once("../Entidades/Busquedas/PersonasObligadas.php");
include_once("../Entidades/Busquedas/Organismo.php");

include_once("../Datos/DtBusquedaInterna.php");
include_once("../Datos/DtCombos.php");

$mon = new Circular();
$po = new PersonasObligadas();

$dtMon = new DtBusquedaInterna();


if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                //DatosEntidad--datos Input
                $mon->__SET('idOrganismo', $_POST['id_organismo']);
                $mon->__SET('subOrganismo', $_POST['sub_organismo']);
                $mon->__SET('referencia', $_POST['ref_circular']);
                $mon->__SET('usuario_creacion', $_POST['idUsuario']);

                $dtMon->registrarCircular($mon);

                //sleep(5);

                // iNSERTANDO DATOS DE de las personas a buscar  
                $nombre_SO = $_POST['nombre_SO'];
                $id_SO = $_POST['id_SO'];
                $acciones_SO = $_POST['acciones_SO'];
               

                foreach ($nombre_SO as $key => $n){
                    
                    $nombre =$n; 
                    
                    $id =$id_SO[$key]; 

                    $nacionalidad = $acciones_SO[$key];
                    
                    $po->__SET('nombre', $nombre);
                    $po->__SET('identificacion', $id);
                    $po->__SET('nacionalidad',$nacionalidad);
                    $po->__SET('idCircular', $_POST['ref_circular']);   
                    $mon->__SET('usuario_creacion', $_POST['idUsuario']);        
                    $dtMon->registrarPerObligadas($po);

                    
                }

                $ref = $_POST['ref_circular'];



                header("Location: ../dist/Constancia_list_interna.php?ref=$ref");
                break;
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/Constancia_list_interna.php?msjNewEmp=2");
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
