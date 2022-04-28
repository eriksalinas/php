<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);                //Hay que ponerlo siempre cuando utilicemos php

function calcularAreaRect($base, $altura){
    return $base * $altura;
}
echo"El área es " .calcularAreaRect(100,0.60) ."<br>";
echo"El área es " .calcularArearect(800,300);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area retangular</title>
</head>
<body>
    
</body>
</html>