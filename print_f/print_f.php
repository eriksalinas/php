<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Todos son ejemplos

//Definicion
function print_f1($variable){
    if(is_array($variable)){
        //Si es un array, lo recorre y guardo el contenido en archivo "datos.txt"
        foreach($variable as $item){ //foreach usamos para recorrer

        }
        
    } else{
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo"Actualizado";
}

function print_f2($variable){
    if(is_array($variable)){
        //Si es un array, lo recorre y guardo el contenido en archivo "datos.txt"
       file_put_contents("datos.txt", $variable); //Agrega o sobreescribe datos de un archivo y guarda una cadena de texto.    
    } else{
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo"Actualizado";
}

//Usamos foreach y file_put_conts
function print_f3($variable){ //Recomendable usar esta funcion
    if(is_array($variable)){
        //Si es un array, lo recorre y guardo el contenido en archivo "datos.txt"
        $contenido = "";
        foreach($variable as $item){ //foreach usamos para recorrer
        $contenido .= $item ."\n";  //  $contenido .= $item ."\n"; para que nos leea linea por linea
                
        }
        file_put_contents("datos.txt",$contenido); //Agrega o sobreescribe datos de un archivo y guarda una cadena de texto.    
    } else{
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo"Actualizado";
}

function print_f4($variable){
    if(is_array($variable)){
        //Si es un array, lo recorre y guardo el contenido en archivo "datos.txt"
        file_put_contents("datos.txt","");
       $archivo1 = fopen("datos.txt", "a");
       foreach ($variable as $item){
           fwrite( $archivo1,$item . "\n"); // "\n" es igual que decir <br>, se usa en php
       }
       fclose($archivo1);
    } else{
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo"Actualizado";
}
function print_f5($variable){ //Recomendado Usar esta funcion
    if(is_array($variable)){
        //Si es un array, lo recorre y guardo el contenido en archivo "datos.txt"
       $contenido = "";
       $archivo1 = fopen("datos.txt", "w");
       foreach ($variable as $item){
           $contenido .= $item . "\n";  // "\n" es igual que decir <br>, se usa en php
       }
       fwrite( $archivo1,$contenido );
       fclose($archivo1);
    } else{
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo"Actualizado";
}

// Uso
$aNotas = array(8,5,7,9,10);
$msg = "Este es un mensaje";
print_f5($aNotas); //Usando print_f($); y actualizando la pafina web, automaticamnete se crea un archivo llamado "datos.txt
?>

