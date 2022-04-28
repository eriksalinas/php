<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function sumar($num1, $num2){
    return $num1+$num2;
}
function alcuadrado($num){
    return $num * $num;
}
$resultado=alcuadrado(sumar(2,8));
echo  $resultado;
?>

