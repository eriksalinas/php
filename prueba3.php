<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Primer paso se difinen las class
class Persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function imprimir(){}
 

}
class Alumno extends Persona{ //extends(Extiende) es para decir de vuelta lo mismo que otra class
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct(){ // Se utiliza cuando hay datos como numeros. $notasPhp = 0.0;
        $this-> notasPorfolio = 0.0;
        $this-> notaPhp = 0.0;
        $this-> notaProyecto = 0.0;
        
    }
    public function imprimir(){

    }

    public function calcularPromedio(){

    }

}

class Docente extends Persona{
    public $especialidad;

    public function imprimir()
    {
        
    }
    public function imprimirEspecialidadesHabilitadas(){

    }
}
//Segundo paso escribimos la parte del programa, se escribe los objetos y se definen

$alumno1 = new Alumno();
$alumno1->nombre = "erik";
$alumno1->edad= 20;
$alumno1->dni = 25132879;
$alumno1->nacionalidad = "Argentino";
$alumno1->$notaPhp = 10;
$alumno1->$notaProyecto = 9;
print_r($alumno1);
?>