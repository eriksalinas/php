<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definir class
//Se utiliza las class protegida cuando hay una class hija, sino es privada la class
class Cliente{
    private $dni;
    private $nombre;
    private $telefono;
    private $descuento;

    public function imprimir(){
        echo "Dni:" . $this->dni . "<br>";
        echo "Nombre:" . $this->nombre . "<br>";
        echo "Telefono:" . $this->telefono . "<br>";
        echo "Descuento:" . $this->descuento . "<br><br>";
    }

    public function __construct(){$this->descuento = 0.0;}

    //Se utiliza este metodo para seguir usando las -> 
    public function __get($propiedad){return $this->$propiedad;}
    public function __set($propiedad, $valor){$this->$propiedad = $valor;}
  
}

class Producto{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function imprimir(){
        echo "Cod:" . $this->cod . "<br>";
        echo "Nombre:" . $this->nombre . "<br>";
        echo "Precio:" . $this->precio . "<br>";
        echo "Descripcion:" . $this->descripcion . "<br>";
        echo "Iva:" . $this->iva . "<br><br>";
    }

    public function __construct(){$this->precio = 0.0; $this->iva = 0.0;}

    //Se utiliza este metodo para seguir usando las -> 
    public function __get($propiedad){return $this->$propiedad;}
    public function __set($propiedad, $valor){$this->$propiedad = $valor;}
}

class Carrito{
    private $cliente;
    private $aProducto = array();
    private $subtotal;
    private $total;

    public function imprimir(){}

    public function __construct(){$this->subtotal = 0.0;$this->total = 0.0;}

    public function cargarProducto(){}

    public function imprimirTicket(){}
}
// Escribir programa
$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabe";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.05;
//print_r($cliente1);
$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Netebook 12\"HP"; // Se utiliza 12\" para poner las pulgadas
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 21;
$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirlpool";
$producto2->descripcion = "Esta es una heladera no froze";
$producto2->precio = 76000;
$producto2->iva =10.5;
$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
//print_r($carrito);
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);
//print_r($carrito);
$carrito->imprimirTicket();//Imprimir el ticket de la compra
?>