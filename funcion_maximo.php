<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

$aNotas = array(8, 4, 5, 3, 9,1);
$aSueldo = array(800.30, 400.87, 500,45, 300, 900.70, 100, 900, 1800);

function maximo($aVector){
   $maximo=0;
     foreach ($aVector as $item){ //foreach es un bucle
       if($maximo < $item){
       $maximo=$item;
       }
    }
    return $maximo;
    
  
}
echo "La nota máxima es:" .maximo($aNotas) ."<br>";
echo "El suelto máximo es:" .maximo($aSueldo);

?>