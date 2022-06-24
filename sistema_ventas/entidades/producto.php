<?php
//Las entidades se escriben en plural ej: Cliente y en singular en la tabla ej: clientes
class Producto
{
    private $idproducto;
    private $nombre;
    private $cantidad;
    private $precio;
    private $descripcion;
    private $imagen;
    private $fk_idtipoproducto;
   

    public function __construct()
    {
        $this->cantidad = 0.0;
        $this->precio = 0.0;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request) //Se acceden  a la informacion
    {
        $this->idproducto = isset($request["id"]) ? $request["id"] : "";
        $this->nombre = isset($request["txtNombre"]) ? $request["txtNombre"] : "";
        $this->cantidad = isset($request["txtcantidad"]) ? $request["txtcantidad"] : "";
        $this->precio = isset($request["txtprecio"]) ? $request["txtprecio"] : "";
        $this->descripcion = isset($request["txtdescripcion"]) ? $request["txtdescripcion"] : "";
        $this->imagen = isset($request["img"]) ? $request["igm"] : "";
        $this->fk_idtipoproducto = isset($request["lstproducto"]) ? $request["lstproducto"] : "";
        
    }

    public function insertar() 
    {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT); //Conectarse a la base de datos
        //Arma la query
        $sql = "INSERT INTO productos (
                    nombre,
                    cantidad,
                    precio,
                    descripcion,
                    imagen,
                    fk_idtipoproducto
                ) VALUES (
                    '$this->nombre',
                     $this->cantidad,
                     $this->precio,
                    '$this->descripcion',
                    '$this->imagen',
                    $this->fk_idtipoproducto
                );";
                //  Se usa '´ solo para las string ej: '$this->nombre',
                // Las string que son numericas no llevan ''
                // La ultima string no lleva ,

        // print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idproducto = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar() // Las strign numericos llevan solo "
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE productos SET 
                nombre = '" . $this->nombre ."',
                cantidad = ". $this->cantidad . ",
                precio = " . $this->precio .",
                descripcion = '" . $this->descripcion ."',
                imagen =  '" . $this->imagen ."',
                fk_idtipoproducto =  '" . $this->fk_idtipoproducto ."'
                WHERE idproducto = $this->idproducto";

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM productos WHERE idproducto = " . $this->idproducto;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId() //Se usa la Id
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idproducto,
                        nombre,
                        cantidad,
                        precio,
                        descripcion,
                        imagen,
                        fk_idtipoproducto
                FROM productos
                WHERE idproducto = $this->idproductos";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idproducto = $fila["idproducto"];
            $this->nombre = $fila["nombre"];
            $this->cantidad = $fila["cantidad"];
            $this->precio = $fila["precio"];
            $this->descripcion = $fila["descripcion"];
            $this->imagen = $fila["imagen"];
            $this->fk_idtipoproducto = $fila["fk_idtipoproducto"];
          
        }
        $mysqli->close();

    }

     public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                    idproducto,
                    nombre,
                    cantidad,
                    precio,
                    descripcion,
                    imagen,
                    fk_idtipoproducto 
                FROM productos";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Producto();
                $entidadAux->idproducto = $fila["idproducto"];
                $entidadAux->nombre = $fila["nombre"];
                $entidadAux->cantidad = $fila["cantidad"];
                $entidadAux->precio= $fila["precio"];
                $entidadAux->descripcion = $fila["descripcion"];
                $entidadAux->imagen = $fila["imagen"];
                $entidadAux->fk_idtipoproducto = $fila["fk_idtipoproducto"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }

}
?>