<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
public $dni;
public $nombre;
public $edad;
public $nacionalidad;

public function __construct(){
    $this->dni = 43876209;
    $this->nombre = "erik";
    $this->edad=20;
}


}
class Alumnos extends Persona{ //extends(Extiende) es para decir de vuelta lo mismo que otra class


}

class Docente extends Persona{

}
?>