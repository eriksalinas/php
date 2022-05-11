<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//definición
function print_f1($variable){
    if(is_array($variable)){
          //si es un array, lo recorre y guardo el contenido en el archivo "datos.txt"
          $archivo1 = fread("datos.txt","a");
        foreach($variable as $item){
        fwrite($archivo1, $item . "\n");
        }
        fclose($archivo1);

    }
    else{
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actulizado";
}
function print_f2($variable){

   if(is_array($variable)){
    $contenido ="";
    foreach($variable as $item){
        $contenido .= $item;

    }
    file_put_contents("datos.txt", $contenido);
   }  
    else{
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actulizado 2";
}
function print_f3($variable){

    if(is_array($variable)){
     $contenido ="";
     foreach($variable as $item){
        $contenido .= $item .="\n";
 
     }
     file_put_contents("datos.txt", $contenido);
    }  
     else{
         //Entonces es string, guardo el contenido en el archivo "datos.txt"
         file_put_contents("datos.txt", $variable);
     }
     echo "Archivo actulizado 3";
 }
//uso
$aNotas = array(8,5,7,9,10,11, 12);
$msg = "Este es un mensaje";
print_f1($aNotas);
?>
