<?php

//Se carga el xml
$xml = simplexml_load_file("./XML_LIST/ONU_LIST_XML.xml") or die("Error: No se puede cargar el fichero xml");

//Se cargan los nodos raices (hijos)
    foreach ($xml->INDIVIDUALS->INDIVIDUAL as $fila) {
    
            //se declaran las variables que se van a utilizar   
        $fullName_I = trim($fila-> FIRST_NAME." ".$fila->SECOND_NAME." ".$fila->THIRD_NAME." ".$fila->FOURTH_NAME); 
        $sdnType_I = "Individual";
        $program_I = $fila->UN_LIST_TYPE;
    
        //bifurcacion, si no hay registro lo creo
        if(empty( $fila->LISTED_ON)){
            $LISTED_ON_I ="NULL";
        }else{
            $LISTED_ON_I = $fila->UN_LIST_TYPE;
        }

        if(empty($fila->NATIONALITY->VALUE)){
        $VALUE_I ="NULL";
        }else{
            $VALUE_I = $fila->NATIONALITY->VALUE;
        }

        if(empty($fila->INDIVIDUAL_DATE_OF_BIRTH->YEAR)){
        $YEAR_I ="NULL";
        
        }else{
            $YEAR_I = $fila->INDIVIDUAL_DATE_OF_BIRTH->YEAR;
        }
        if(empty($fila->INDIVIDUAL_DOCUMENT->TYPE_OF_DOCUMENT)){
            $TYPE_OF_DOCUMENT_I ="NULL";
        }else{
                $TYPE_OF_DOCUMENT_I = $fila->INDIVIDUAL_DOCUMENT->TYPE_OF_DOCUMENT;
        }

        if(empty($fila->INDIVIDUAL_DOCUMENT->NUMBER)){
            $NUMBER_I ="NULL";
        }else{
                $NUMBER_I = $fila->INDIVIDUAL_DOCUMENT->NUMBER;
        }

        //arreglo que guarda los datos
        $arreglo_individual[] = array($fullName_I,$sdnType_E ,$program_E,$LISTED_ON_I,$VALUE_I,$VALUE_I,$YEAR_I,$TYPE_OF_DOCUMENT_I,$NUMBER_I);
        
    }
  foreach ($xml->ENTITIES->ENTITY as $fila_E) {

      //se declaran las variables que se van a utilizar   
      $fullName_E = trim($fila_E->FIRST_NAME); 
      $sdnType_E = "Entity";
      $program_E = $fila_E->UN_LIST_TYPE;
      //bifurcacion, si no hay registro lo creo
      if(empty( $fila_E->LISTED_ON)){
          $LISTED_ON_E ="NULL";
      }else{
          $LISTED_ON_E = $fila_E->LISTED_ON;
      }
  
      if(empty($fila_E->ENTITY_ADDRESS->COUNTRY)){
        $COUNTRY_E ="NULL";
    }else{
        $COUNTRY_E = $fila_E->ENTITY_ADDRESS->COUNTRY;
    }
      //arreglo que guarda los datos
      $arreglo_entity[] = array($fullName_E,$sdnType_I ,$program_I,$LISTED_ON_E,$COUNTRY_E);
  
        
    }

  //nombre del Archivo
    $ruta_E ="ONU_LIST_ENTITY.csv";
    $ruta_I="ONU_LIST_INDIVIDUAL.csv";
    //funcion para generar el arreglo
    generarCSV_E($arreglo_entity, $ruta_E, $delimitador = ';', $encapsulador = '"');
    generarCSV_I($arreglo_individual, $ruta_I, $delimitador = ';', $encapsulador = '"');
    //funcion que permite crear un arreglo

    function generarCSV_E($arreglo_entity, $ruta_E, $delimitador, $encapsulador){
        $file_handle = fopen($ruta_E, 'w');
        foreach ($arreglo_entity as $linea) {
          fputcsv($file_handle, $linea, $delimitador, $encapsulador);
        }
        //reescribe el archivo
        rewind($file_handle);
        //cierra el archivo
        fclose($file_handle);
        //log de sastifaccion
        echo "proceso terminado";
    }

    function generarCSV_I($arreglo_individual, $ruta_I, $delimitador, $encapsulador){
        $file_handle = fopen($ruta_I, 'w');
        foreach ($arreglo_individual as $linea_I) {
          fputcsv($file_handle, $linea_I, $delimitador, $encapsulador);
        }
        //reescribe el archivo
        rewind($file_handle);
        //cierra el archivo
        fclose($file_handle);
        //log de sastifaccion
        echo "proceso terminado";
      }

?>