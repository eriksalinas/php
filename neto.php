<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);                //Hay que ponerlo siempre cuando utilicemos php

function calcularNeto($bruto){
    return  $bruto - ($bruto * 0.17); //El por es *
}
echo" El sueldo neto es $ " .calcularNeto(5000);
?>