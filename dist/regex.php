<?php
error_reporting(0);
//$busqueda = "KOREA UNITED DEVELOPMENT BANK";
//$busqueda = "Khalid QADDUR";
$busqueda = "Al-Aqsa Martyrs' Brigade";


//CONEXION A XML DE OFAC 
$xmldata_ofac=simplexml_load_file("./XML_LIST/OFAC_LIST_XML.xml");
//$category = $xmldata_ofac->xpath('/sdnEntry[sdnType="Entity"]');
$category = $xmldata_ofac->xpath('/sdnEntry/*');
//print_r($xmldata_ofac);

foreach($category as $key1){
    $origen = "SDN_OFAC";
    $type = $key1-> sdnType;
    $design_list  = $key1-> programList -> program ;
    $name = trim($key1-> firstName." ".$key1->lastName); 
    $country = $key1-> addressList -> address -> country ; 
    $city = $key1-> addressList ->address -> city ; 
    $alias =  $key1 -> akaList -> aka -> lastName ; 
    
    if ($name == $busqueda ){
        echo "lista de origen: ".$origen."<br>";
        echo "TIPO DE PERSONA: ". $type ."<br>";
        echo "LISTA DESIGNADA: ". $design_list ."<br>";
        echo "NOMBRE: ". $name ."<br>";
        echo "PAIS: ". $country ."<br>";
        echo "CIUDAD: ". $city ."<br>";
        echo "ALIAS: ". $alias ."<br>";
        ECHO "===///===///===///===///===///===///===///===/// <br>";
    };
    

}


//CONEXION A XML DE ONU 
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
   
}

//CONEXION A XML DE UE
$xmldata_ue = simplexml_load_file("./XML_LIST/UE_LIST_XML.xml");
$code = $xmldata_ue->xpath('//@code[.="enterprise"]/../..');
//print_r($xmldata_ue);

foreach($code as $key3){ 
    $origen = "SDN_UE";
    $type = $key3 -> subjectType->attributes()->code;
    $design_list  = $key3 -> regulation->attributes()-> programme;
    $date_design_list = $key3 ->regulation->attributes()-> publicationDate;
    $name = $key3 ->nameAlias->attributes()-> wholeName;
    $name_clean = trim($name);
    $country = $key3 -> citizenship ->attributes()-> countryDescription;
    if ($country == NULL){
        $country = "NOT FOUND";
    }

   
   if ($name_clean == $busqueda ){
        echo "lista de origen: ".$origen."<br>";
        echo "TIPO DE PERSONA: ". $type ."<br>";
        echo "LISTA DESIGNADA: ". $design_list ."<br>";
        echo "FECHA DE SANCION: ". $date_design_list ."<br>";
        echo "NOMBRE: ". $name_clean ."<br>";
        echo "PAIS: ". $country ."<br>"; 
        ECHO "===///===///===///===///===///===///===///===/// <br>";
    }
    
   
}
  

?>