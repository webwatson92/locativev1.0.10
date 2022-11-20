<?php

//Génération du code client/

function getClientCode($number)
{
    $clientPrefix="";
    $codeValue="";
    
    //Donc compris entre 101 et 999
    if ($number<1000){
        $codeValue="000000".$number;
    }
    //Donc compris entre 1000 et  9999
    else if($number<10000){
        $codeValue="00000".$number;
    }
    //Donc compris entre 10000 et  99999
    else if($number<100000){
        $codeValue="0000".$number;
    }
    //Donc compris entre 100000 et  999999
    else if($number<10000000){
        $codeValue="000".$number;
    }
    else if($number<100000000){
        $codeValue="00".$number;
    }
    else if($number<1000000000){
        $codeValue="0".$number;
    }
    else{
         $codeValue=$number;
    }
    
    return $codeValue;
}

// $value = getClientCode(100);

// //Je démarre l'exemple dans une boucle pour que tu vois/
// for($j=100;$j<=9999;$j++){
//     echo getClientCode($j)."<br/>";
// }

?>