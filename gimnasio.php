<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

//Primer paso
class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;


    public function imprimir(){

    }
     //Se utiliza este metodo para seguir usando las -> 
     public function __get($propiedad){return $this->$propiedad;}
     public function __set($propiedad, $valor){$this->$propiedad = $valor;}
 
    
}
class Entrenador extends Persona{
    private $aClases;

    public function __construct($dni, $nombre, $correo, $celular){ //Este metodo se utiliza si es que en el programa esta con () y se agrega $this
                                                                    //Como no hat datos se pone de la siguiente manera $this->dni = $dni;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
         $this->aClases = array(); 
    }

    public function asignarClase(){

    }

    public function imprimir(){
        echo "Clases:". $this->aClases . "<br>";
    }
     //Se utiliza este metodo para seguir usando las -> 
     public function __get($propiedad){return $this->$propiedad;}
     public function __set($propiedad, $valor){$this->$propiedad = $valor;}
 
}
class Alumno extends Persona{
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;

    public function __construct($dni, $nombre, $correo, $celular, $fechaNac) {//Este metodo se utiliza si es que en el programa esta con () y se agrega $this
                                                                              //Como no hat datos se pone de la siguiente manera $this->dni = $dni;
      $this->dni =$dni;
      $this->nombre =$nombre;
      $this->correo = $correo;
      $this->celular = $celular;
      $this->fechaNac = $fechaNac;
      $this->peso = 0.0;
      $this->altura = 0.0;
      $this->aptoFisico = false;
      $this->presentismo = 0.0;
    }
   
    public function setFichaMedica($peso,$altura,$aptoFisico){//Este metodo se utiliza si es que en el programa esta con () y se agrega $this
                                                              //Como no hat datos se pone de la siguiente manera $this->dni = $dni;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->aptoFisico = $aptoFisico;
    }

    public function imprimir(){
        echo "Peso:". $this->peso . "<br>";
        echo "Altura:". $this->altura . "<br>";
        echo "Apto Fisico:". $this->aptoFisico . "<br>";
        echo "Presentismo:". $this->presentismo . "<br>";
    }
     //Se utiliza este metodo para seguir usando las -> 
     public function __get($propiedad){return $this->$propiedad;}
     public function __set($propiedad, $valor){$this->$propiedad = $valor;}
 
}
class Clase{
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __construct(){
       $this->aAlumnos = array(); 
    }

    public function asignarEntrenador(){

    }
    public function inscribirAlumno(){

    }
    public function imprimirListado(){
        echo "Nombres:". $this->nombre . "<br>";
        echo "Entrenador:". $this->entrenador . "<br>";
        echo "Alumnos:". $this->alumnos . "<br>";
    }
     //Se utiliza este metodo para seguir usando las -> 
     public function __get($propiedad){return $this->$propiedad;}
     public function __set($propiedad, $valor){$this->$propiedad = $valor;}
 
}

//Segundo paso Desarrollar Programa

$entrenador1 = new Entrenador("34987789", "Miguel Ocampo", "miguel@mail.com", "11678634");
$entrenador2 = new Entrenador("28987589", "Andrea Zarate", "andrea@mail.com", "11768654");

//print_r($entrenador1);
//print_r($entrenador2);
//exit;

$alumno1 = new Alumno("40787657", "Dante Montera", "dante@mail.com", "1145632457", "1997-08-28");
$alumno1->setFichaMedica(90, 178, true);
$alumno1->presentismo = 78;
print_r($alumno1);
exit;

$alumno2 = new Alumno("46766547", "Darío Turchi", "dario@mail.com", "1145632457", "1986-11-21");
$alumno2->setFichaMedica(73, 1.68, false);
$alumno2->presentismo = 68;


$alumno3 = new Alumno("39765454", "Facundo Fagnano", "facundo@mail.com", "1145632457", "1993-02-06");
$alumno3->setFichaMedica(90, 1.87, true);
$alumno3->presentismo = 88;

$alumno4 = new Alumno("41687536", "Gastón Aguilar", "gaston@mail.com", "1145632457", "1999-11-02");
$alumno4->setFichaMedica(70, 1.69, false);
$alumno4->presentismo = 98;

$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);
$clase1->imprimirListado();

$clase2 = new Clase();
$clase2->nombre = "Zumba";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno2);
$clase2->inscribirAlumno($alumno3);
$clase2->imprimirListado();


?>