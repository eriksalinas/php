<?php

class producto
{
    private $idproducto;
    private $nombre;
    private $cantidad;
    private $precio;
    private $descripcion;
    private $imagen;
    private $fk_idtipoprodidad;
  
    public function __construct()
    {
        $this->cantidad=0.0;
        $this->precio=0.0;
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

    public function cargarFormulario($request)
    {
        $this->idproducto = isset($request["id"]) ? $request["id"] : "";
        $this->nombre = isset($request["txtNombre"]) ? $request["txtNombre"] : "";
        $this->cantidad = isset($request["txtCantidad"]) ? $request["txtCantidad"] : "";
        $this->precio = isset($request["txtPrecio"]) ? $request["txtPrecio"] : "";
        $this->descripcion= isset($request["txtDescripcion"]) ? $request["txtDescripcion"] : "";
        $this->imagen = isset($request["img"]) ? $request["img"] : "";
        $this->fk_idtipoprodidad = isset($request["lstProducto"]) ? $request["lstProducto"] : "";
        if (isset($request["txtAnioNac"]) && isset($request["txtMesNac"]) && isset($request["txtDiaNac"])) {
            $this->fecha_nac = $request["txtAnioNac"] . "-" . $request["txtMesNac"] . "-" . $request["txtDiaNac"];
        }
    }

    public function insertar()
    {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        //Arma la query
        $sql = "INSERT INTO productos (
                    nombre,
                    cantidad,
                    precio,
                    descripcion,
                    imagen,
                    fk_idtipoproridad
                   
                ) VALUES (
                    '$this->nombre',
                    $this->cantidad,
                    $this->precio,
                    '$this->descripcion',
                    '$this->imagen',
                    $this->fk_idtipoprodidad,
                 
                );"; //Comillas solo van para los string(no llevan los numeros)
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

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE clientes SET
                nombre = '".$this->nombre."',
                cantidad = " .$this->cantidad .",
                precio = ".$this->precio.",
                descripcion = '".$this->descripcion."',
                imagen =  '".$this->imagen."',
                fk_idtipoproridad =  '".$this->fk_idtipoprodidad."'
                WHERE idproductos =  . $this->idproducto ";

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }
    //El ultimo no lleva ,

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM producto WHERE idproducto = " . $this->idcliente;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idproducto,
                        nombre,
                        cantidad,
                        precio,
                        descripcion,
                        imagen,
                        fk_idtipoprodidad
                FROM productos
                WHERE idproductos = $this->idproducto";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idproducto = $fila["idproductos"];
            $this->nombre = $fila["nombre"];
            $this->cantidad = $fila["cantidad"];
            $this->precio = $fila["precio"];
            $this->descripcion = $fila["descripcion"];
            $this->imagen = $fila["imagen"];
            $this->fk_idtipoprodidad = $fila["fk_idtipoprodidad"];
            if(isset($fila["fecha_nac"])){
                $this->fecha_nac = $fila["fecha_nac"];
            } else {
                $this->fecha_nac = "";
            }
            $this->fk_idprovincia = $fila["fk_idprovincia"];
            $this->fk_idlocalidad = $fila["fk_idlocalidad"];
            $this->domicilio = $fila["domicilio"];
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
                    fk_idtipoprodidad
                FROM productos";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new producto();
                $entidadAux->idproducto = $fila["idproductos"];
                $entidadAux->nombre = $fila["nombre"];
                $entidadAux->cantidad = $fila["cantidad"];
                $entidadAux->precio = $fila["precio"];
                $entidadAux->descripcion = $fila["descripcion"];
                $entidadAux->imagen = $fila["imagen"];
                $entidadAux->fk_idtipoprodidad = $fila["fk_idtipoprodidad"];
                if(isset($fila["fecha_nac"])){
                    $entidadAux->fecha_nac = $fila["fecha_nac"];
                } else {
                    $entidadAux->fecha_nac = "";
                }
                $entidadAux->fk_idprovincia = $fila["fk_idprovincia"];
                $entidadAux->fk_idlocalidad = $fila["fk_idlocalidad"];
                $entidadAux->domicilio = $fila["domicilio"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }

}
?>