<?php
error_reporting(0);



$busqueda = "KOREA UNITED DEVELOPMENT BANK";

$xmldata_onu = simplexml_load_file("./XML_LIST/ONU_LIST_XML.xml");
//print_r($xmldata_onu);

foreach($xmldata_onu->ENTITIES->ENTITY as $key2){ 
        
    $origen = "SDN_ONU";
    $type = "Entity";
    $design_list  = $key2 -> UN_LIST_TYPE;
    $name = trim($key2 -> FIRST_NAME);
    $date_design_list = $key2 -> LISTED_ON;
    $country = $key2 -> ENTITY_ADDRESS -> COUNTRY;
    $comments = $key2 -> COMMENTS1; 
    
    
    
    $myObj = new stdClass();
    $myObj-> $origen;
    $myObj-> $type;
    $myObj-> $design_list;
    $myObj-> $name;
    $myObj-> $date_design_list;
    $myObj-> $country;
    $myObj-> $comments;
   
    /*
   if ($name == $busqueda ){
        echo "lista de origen: ".$origen."<br>";

        echo "TIPO DE PERSONA: ". $type ."<br>";
        echo "LISTA DESIGNADA: ". $design_list ."<br>";
        echo "FECHA DE SANCION: ". $date_design_list ."<br>";
        echo "NOMBRE: ". $name ."<br>";
        echo "PAIS: ". $country ."<br>";
        echo "OBSERVACIONES: ". $comments ."<br>";
        ECHO "===///===///===///===///===///===///===///===/// <br>";
    };

    */
   
}
$myJSON = json_encode($myObj);
echo $myJSON;
?>

  