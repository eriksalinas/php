<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Iniciamos la session
session_start();

//Estos datos se encuentra en la base de datos del programa HeidiSQL
class Config {
    const BBDD_HOST = "127.0.0.1";//IP 
    const BBDD_PORT= "3306";     //Puerto 
    const BBDD_USUARIO = "root"; // Usuario 
    const BBDD_CLAVE = "";
    const BBDD_NOMBRE = "abmventas"; //Nombre del codigo
}

?>