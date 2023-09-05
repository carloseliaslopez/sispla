<?php

/*
//XML DE LA OFAC
$xmldata_ofac = simplexml_load_file("https://www.treasury.gov/ofac/downloads/consolidated/consolidated.xml") or die("Failed to load");
foreach($xmldata_ofac->sdnEntry as $key2){
    echo"OFAC - Nombre y apellido:". $name = $key2->firstName." ".$key2->lastName. "<br>";
    //echo "Primer nombre:". $key2->FIRST_NAME . "<br>"; 
}
*/
    
/*
//XML DE LA ONU
$xmldata_onu = simplexml_load_file("https://scsanctions.un.org/resources/xml/sp/consolidated.xml") or die("Failed to load"); 
foreach($xmldata_onu->INDIVIDUALS->INDIVIDUAL as $key2){
    $First_name = $key2->FIRST_NAME ; 
    $Second_name = $key2->SECOND_NAME ;
    $third_name = $key2->THIRD_NAME;
    $four_name = $key2-> FOUR_NAME;
     
    echo "ONU-Nombre Completo: ". $key2->FIRST_NAME ." ". $key2->SECOND_NAME ." ". $key2->THIRD_NAME ." ". $key2->FOUR_NAME ."<br>"; 
}

*/

//XML DE UK
$xmldata_uk = simplexml_load_file("https://assets.publishing.service.gov.uk/government/uploads/system/uploads/attachment_data/file/1141733/UK_Sanctions_List.xml") or die("Failed to load"); 
foreach($xmldata_uk->Designation as $key2){
    $Name6 = $key2->Name6 ; 
    //$Second_name = $key2->SECOND_NAME ;
    //$third_name = $key2->THIRD_NAME;
    //$four_name = $key2-> FOUR_NAME;
     
    echo "UK-Nombre Completo: ". $key2->Names->Name->Name6 ."<br>"; 
    
}


/*
$xmlDOM = new DOMDocument();
$xmlDOM->load("https://assets.publishing.service.gov.uk/government/uploads/system/uploads/attachment_data/file/1141733/UK_Sanctions_List.xml");
$document = $xmlDOM->documentElement;
foreach ($document->childNodes as $node) {
    if ($node->hasChildNodes()) {
        foreach($node->childNodes as $temp) {
            echo $temp->nodeName."=".$temp->nodeValue."<br />";
        }
    }
}
*/

?> 
