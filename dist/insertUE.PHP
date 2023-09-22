<?php

//Se carga el xml
$xml = simplexml_load_file("./XML_LIST/UE_LIST_XML.xml") or die("Error: No se puede cargar el fichero xml");

//Se cargan los nodos raices (hijos)
foreach ($xml->attributes() as $fila) {
  $code = $fila->code;

  if($code == "person"){
    //se declaran las variables que se van a utilizar   
    $wholeName = trim($fila->wholeName); 
    $sdnType_E = $fila->sdnType;
    $program_E = $fila->programList->program;
    //bifurcacion, si no hay registro lo creo
    if(empty( $fila->addressList->address->city)){
        $city_E ="NULL";
    }else{
        $city_E = $fila->addressList->address->city;
    }

    if(empty($fila->addressList->address->country)){
        $country_E ="NULL";
    }else{
        $country_E = $fila->addressList->address->country;
    }
    //arreglo que guarda los datos
    $arreglo_entity[] = array($fullName_E,$sdnType_E ,$program_E,$city_E,$country_E);

      
  }
  
  if($sdnType=="Individual"){
    //se declaran las variables que se van a utilizar   
    $fullName_I = trim($fila-> firstName." ".$fila->lastName); 
    $sdnType_I = $fila->sdnType;
    $program_I = $fila->programList->program;
   
    //bifurcacion, si no hay registro lo creo
    if(empty( $fila->idList->id->idType)){
        $idType_I ="NULL";
    }else{
        $idType_I = $fila->idList->id->idType;
    }

    if(empty($fila->idList->id->idNumber)){
        $idNumber_I ="NULL";
      
    }else{
        $idNumber_I = $fila->idList->id->idNumber;
    }

    if(empty($fila->nationalityList->nationality->country)){
      $country_I ="NULL";
    
    }else{
        $country_I = $fila->nationalityList->nationality->country;
    }

    if(empty($fila->dateOfBirthList->dateOfBirthItem->dateOfBirth)){
      $dateOfBirth_I ="NULL";
    
    }else{
        $dateOfBirth_I = $fila->dateOfBirthList->dateOfBirthItem->dateOfBirth;
    }

    //arreglo que guarda los datos
    $arreglo_individual[] = array($fullName_I,$sdnType_I,$program_I,$idType_I,$idNumber_I,$country_I,$dateOfBirth_I);
  
  }

     
  }

  //nombre del Archivo
    $ruta_E ="OFAC_LIST_ENTITY.csv";
    $ruta_I="OFAC_LIST_INDIVIDUAL.csv";
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