<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Primer paso se difinen las class
//Todos las clases Padres (class Persona) tienen que estar los datos protegidos
//Todos las clases Hijas (class Alumno extends Persona) tienen que estar privado
//Todas las funciones quedan publicas
class Persona{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;


    public function setDni($dni){ $this->dni = $dni;  }  //Se utliza esta metodo(por que pueden ser punlicos ) set y get para  accinar un parametro a la variable
    public function getDni(){return $this->dni;}        //Los metodos  se imprimer en 
                                                        // Es solo un ejemplo, no usar este metodo


    public function setNombre($nombre){$this->nombre = $nombre;}
    public function getNombre(){ return $this->nombre;}


    public function setEdad($edad){$this->edad = $edad; }
    public function getEdad(){return $this->edad;}


    public function setNacionalidad($nacionalidad){$this->nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad;}


    public function imprimir(){}
 
    public function __destruct()  { //Destruye toda la informacion una vez que finaliza y libera espacio de Ram.
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}
class Alumno extends Persona{ //extends(Extiende) es para decir de vuelta lo mismo que otra class
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    //Se utiliza este metodo para seguir usando las -> 
    public function __get($propiedad){return $this->$propiedad;}
    public function __set($propiedad, $valor){$this->$propiedad = $valor;}


    public function __construct($dni ="", $nombre =""){ // Se utiliza cuando hay datos o numeros en la class Alumno extendes Persona. $notasPhp = 0.0;
        $this->dni = $dni;
        $this->nombre = $nombre;                      //No se puede utilizar mas de 1 ves el public function __construct en una misma clase
        $this->notaPortfolio = 0.0;                   // Usando este public function __construct($dni ="", $nombre ="" se muestra em la pagina web tambein
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;

}
    public function imprimir(){ //Imprime en pantalla los datos puestos.
                                // Para acceder a las propiedades de las class se utiliza this.
        echo "Alumno:  " . $this->nombre . "<br>";
        echo "Documento:  " . $this->dni . "<br>";
        echo "Nota del portfolio  " . $this->notaPortfolio ."<br><br>";
      
    }

    public function __destruct()  { //Destruye toda la informacion una vez que finaliza y libera espacio de Ram.
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function calcularPromedio(){

    }

}

class Docente extends Persona{
    private $especialidad;
    
     //Se utiliza este metodo para seguir usando las ->
    public function __get($propiedad){return $this->$propiedad;}
    public function __set($propiedad, $valor){$this->$propiedad = $valor;}

    const ESPECIALIDAD_WP = "Wordpress"; //Se utiliza este metodo para no tener o generar errores ortografico al escribir la informacion
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";
    public function imprimir()
    {
        echo "Nombre del docente:" . $this->nombre . "<br>";
        echo "Especialidad:" . $this->especialidad . "<br><br>";
        
    }
    public function imprimirEspecialidadesHabilitadas(){

        echo "Especialidades: <br>"; //echo self:: Para agragar varios contenidos de la class como Especialidades
        echo self::ESPECIALIDAD_BBDD . "<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_WP ."<br><br>";
    }

    public function __destruct(){ //Destruye toda la informacion una vez que finaliza y libera espacio de Ram.
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}
//Segundo paso escribimos la parte del programa, se escribe los objetos y se definen

$alumno1 = new Alumno("24876109", "Juanda Mendoza"); //Este es otro metodo para usar con public function __construct($dni ="", $nombre =""

$alumno1->edad = 32;
$alumno1->nacionalidad = "Argentina";
$alumno1->notaPhp = 9;
$alumno1->notaPortfolio = 10;
$alumno1->notaProyecto = 7;
$alumno1->imprimir(); //Para que se muestre en pantalla (Pagina web)


$alumno2 = new Alumno();
$alumno2->setNombre("erik"); //Ejemplo de la funcion Set y get 
$alumno2->setEdad(20);
$alumno2->setNacionalidad("Argentino");
$alumno2->setDni(90762345);

$alumno2->notaPhp = 7;
$alumno2->notaPortfolio = 10;
$alumno2->notaProyecto = 9;
$alumno2->imprimir(); //Para que se muestre en pantalla (Pagina web)

$docente = new Docente();
$docente->nombre = "Sergio Gonzales";
$docente->especialidad = Docente::ESPECIALIDAD_ECO; // Se utilizo el metodo const ESPECIALIDAD_ECO Para no escribir y no tener errores ortograficos
$docente->imprimir(); //Para que se muestre en pantalla (Pagina web)
$docente->imprimirEspecialidadesHabilitadas(); //Se utilizo echo self:: para agregar varias especialidades y Para no escribir y no tener errores ortograficos


?>