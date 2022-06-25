<?php
//Las entidades se escriben en plural ej: Cliente y en singular en la tabla ej: clientes

class Venta{
    private $idventa;
    private $fk_idcliente;
    private $fecha;
    private $cantidad;
    private $preciounitario;
    private $total;
    private $fk_idproducto;
   

    public function __construct()
    {
        $this->cantidad = 0.0;
        $this->total = 0.0;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request) //Se acceden  a la informacion
    {
        $this->idventa = isset($request["id"]) ? $request["id"] : "";
        $this->fk_idcliente= isset($request["lstCliente"]) ? $request["ltsCliente"] : "";
        $this->fk_idproducto= isset($request["lstProducto"]) ? $request["ltsProducto"] : "";
        $this->cantidad = isset($request["txtCantidad"]) ? $request["txtCantidad"] : "";
        $this->preciounitario = isset($request["txtPreciounitario"]) ? $request["txtPreciounitario"] : "";
        $this->total = isset($request["txtTotal"]) ? $request["txtTotal"] : "";
        if (isset($request["txtAno"]) && isset($request["txtMes"]) && isset($request["txtDia"])) {
            $this->fecha= $request["txtAno"] . "-" . $request["txtMes"] . "-" . $request["txtDia"];
        }
    }

    public function insertar() 
    {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT); //Conectarse a la base de datos
        //Arma la query
        $sql = "INSERT INTO ventas (
                    fk_idcliente,
                    fecha,
                    cantidad,
                    preciounitario,
                    total,
                    fk_idproducto
                ) VALUES (
                    
                    '$this->fk_idcliente',
                    '$this->fecha',
                    '$this->cantidad',
                    '$this->preciounitario',
                    $this->total,
                    $this->fk_idproducto
                );";
                //  Se usa '´ solo para las string ej: '$this->nombre',
                // La ultima string no lleva ,

        // print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idventa = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE Ventas SET 
                fk_idcliente = '". $this->fk_idcliente ."',
                fecha = ". $this->fecha .",
                cantidad = " .$this->cantidad .",
                preciounitario =  '" .$this->preciounitario ."',
                total=  ". $this->total .",
                fk_idproducto =  '". $this->fk_idproducto ."',
                WHERE idventsa = $this->idventa";

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM ventas WHERE idventa = " . $this->idventa;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId() //Se usa la Id
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idventa,
                        fk_idcliente,
                        fecha,
                        cantidad,
                        preciounitario,
                        total,
                        fk_idproducto
                FROM ventas
                WHERE idventa = $this->idventa";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idventa = $fila["idventa"];
            $this->cantidad = $fila["cantidad"];
            $this->preciounitario = $fila["preciounitario"];
            $this->total = $fila["total"];
            if(isset($fila["fecha"])){
                $this->fecha = $fila["fecha"];
            } else {
                $this->fecha = "";
            }
            $this->fk_idcliente = $fila["fk_idcliente"];
            $this->fk_idproducto = $fila["fk_idproducto"];
        }
        $mysqli->close();

    }

     public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                    idventa,
                    fk_idcliente,
                    fecha,
                    cantidad,
                    preciounitario,
                    total,
                    fk_idproducto
                FROM ventas";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Venta();
                $entidadAux->idventa = $fila["idventa"];
                $entidadAux->cantidad = $fila["cantidad"];
                $entidadAux->preciounitario = $fila["preciounitario"];
                $entidadAux->total = $fila["total"];
                if(isset($fila["fecha"])){
                    $entidadAux->fecha_nac = $fila["fecha"];
                } else {
                    $entidadAux->fecha = "";
                }
                $entidadAux->fk_idcliente = $fila["fk_idcliente"];
                $entidadAux->fk_idproducto = $fila["fk_idproducto"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }

}
?>