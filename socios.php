<?php

use Persona as GlobalPersona;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');  //Para poner el dia y hora de zona horaria

 abstract class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;
    
    abstract public function imprimir(); //abstract nos permite imprimir 

    
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
  
    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }
}
class Cliente extends Persona {
    private $aTarjeta;
    private $bActivo;
    private $FechaAlta;
    private $fechaBaja;

    public function __construct()
    {
        $this->FechaAlta = date("d/m/Y H:i:s"); //Para poner el dia y hora de zona horaria
        $this->aTarjeta = array();
        $this->bActivo = true;
    }

    public function agregarTarjeta($tarjeta){
        $this->aTarjeta[] = $tarjeta;
    }

    public function darDeBaja($fechaBaja){
        $this->bActivo = false;
        $this->fechaBaja = $fechaBaja;
    }


    public function imprimir(){
        
    }

   
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
}

class Tarjeta {
   
    private $numero;
    private $fechaVto;
    private $tipo;
    private $cvv;

    const VISA = "Visa"; //Constantes 
    const MASTERCARD = "Mastercard";
    const AMEX = "Amex";
    const NARANJA = "Naranja";
    const CABAL = "Cabal";

    public function __construct( $tipo,$numero, $fechaVto,  $cvv)
    {
        $this->tipo = $tipo;
        $this->numero = $numero;
        $this->fechaVto = $fechaVto;
        $this->cvv = $cvv;
    }
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
  
    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }
     
}

//Desarrollar Programa
$cliente1 = new Cliente();
$cliente1->dni = "35123789";
$cliente1->nombre = "Ana Valle";
$cliente1->correo = "ana@correo.com";
$cliente1->celular = "1156781234";
$tarjeta1 = new Tarjeta (Tarjeta::VISA,"4253634777", "01/2023","277" );
$tarjeta2 = new Tarjeta (Tarjeta::AMEX,"4253634777", "01/2023","277" ); // Tarjeta::VISA, Se utiliza este metodo cuando esta fuera de la class
$tarjeta3 = new Tarjeta (Tarjeta::MASTERCARD,"4253634777", "01/2023","277" );
$cliente1->agregarTarjeta($tarjeta1);
$cliente1->agregarTarjeta($tarjeta2);
$cliente1->agregarTarjeta($tarjeta3);


$cliente2 = new Cliente();
$cliente2->dni ="035293";
$cliente2->nombre ="Maira";
$cliente2->correo ="Maira@gmail.com";
$cliente2->celular ="11773529";
$cliente2->agregarTarjeta(new Tarjeta (Tarjeta::VISA,"63739474837", "05/2025","333" )); //FORMA CORTA
$cliente2->agregarTarjeta(new Tarjeta (Tarjeta::MASTERCARD,"64737494376", "01/2025","477" ));

print_r($cliente1);
print_r($cliente2);
exit;
?>