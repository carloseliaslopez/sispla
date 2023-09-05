<?php
    
    //error_reporting(0);

    include_once("../Entidades/ListasInternas.php");
    include_once("../Datos/DtListasInternas.php");
    
    $mon = new ListasInternas();
    $dtMon = new DtListasInternas();
    //$xmldata = simplexml_load_file("https://www.treasury.gov/ofac/downloads/sdn.xml") or die("Failed to load"); 
    $xmldata = simplexml_load_file("../LRiesgos/sdn.xml") or die("Failed to load"); 

    $origen = "OFAC_SDN";
    $fechaingreso = (new DateTime())->format('Y-m-d');
    $idEstado = 1;
    $i=1;
    
    foreach($xmldata->sdnEntry as $key2){
        $name = $key2->firstName." ".$key2->lastName; 
        $clean = trim($name); 
        $mon->__SET('nombre', $clean); 
        $mon->__SET('origen', $origen); 
        $mon->__SET('fechaIngreso', $fechaingreso); 
        $mon->__SET('idEstado', $idEstado); 
        $dtMon->replaceListaInterna($mon); 

       echo $clean, "--";echo $origen, "--";echo $fechaingreso, "--";echo $idEstado,"Registro:",$i++, "<br>";  
       
       /*
        $mon->__SET('nombre', $clean); 
        $mon->__SET('origen', $origen); 
        $mon->__SET('fechaIngreso', $fechaingreso); 
        $mon->__SET('idEstado', $idEstado); 
        $dtMon->replaceListaInterna($mon);
        */
    }

    /*
    foreach($xmldata->ENTITIES->ENTITY as $key2){
        $test =  $key2->FIRST_NAME ; 
        $clean = trim($test); 
        
        echo $test, "---";echo $origen, "---";echo $fechaingreso, "---";echo $idEstado, "<br>";  

        $mon->__SET('nombre', $test); 
        $mon->__SET('origen', $origen); 
        $mon->__SET('fechaIngreso', $fechaingreso); 
        $mon->__SET('idEstado', $idEstado); 
        $dtMon->replaceListaInterna($mon);
        

    }
    */
       

    
    
      
?>
