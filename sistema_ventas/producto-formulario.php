<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php"; //Se utiliza para vincular y obtener datos


$pg = "Edición de producto";


$producto = new Producto();
$producto->cargarFormulario($_REQUEST);



if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $producto->actualizar();
        } else {
            //Es nuevo
            $producto->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";
    } else if (isset($_POST["btnBorrar"])) {
        $producto->eliminar();
        header("Location: tipoproducto-listado.php");
    }
}
if (isset($GET["id"]) && $_GET["id"] > 0) {
    $producto->obtenerPorId(); //Se utiliza para que aparescan los datos en la web // Consulta con profe
}


include_once("header.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Prodcutos</h1>
    <?php if (isset($msg)) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                    <?php echo $msg["texto"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a> <!-- Se vincula con otra pagina -->
            <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a> <!-- Se vincula con otra pagina -->
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre ?>"> <!-- Se utiliza eco para mostar datos en pantalla -->
        </div>
        <div class="col-6 form-group">
            <label for="ltsNombre">Tipo de productos:</label>
            <select class="form-control selectpicker" name="lstproducto" id="lstProducto" data-live-search="true" required>
                <!-- selectpicker se utiliza para abrir las opciones y data-live-search="true" Se utiliza para ver si es verdadedo y para mostrar las opciones -->
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aTipoproducto as $tipoproducto) : ?>
                    <?php if ($producto->fk_idtipoproducto == $tipoproducto->idtipoproducto) : ?>
                        <option selected value="<?php echo $producto->idtipoproducto; ?>"><?php echo $producto->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $tipoproducto->idtipoproducto; ?>"><?php echo $tipoproducto->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>

        </div>
        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="text" required class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad ?>"> <!-- Se utiliza eco para mostar datos en pantalla -->
        </div>
        <div class="col-6 form-group">
            <label for="txtCantidad">Precio:</label>
            <input type="text" required class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $producto->precio ?>"> <!-- Se utiliza eco para mostar datos en pantalla -->
        </div>
        <div class="col-12 form-group">
            <label for="txtCorreo">Descripción:</label>
            <textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion; ?></textarea>
        </div>
        <div class="col-6 form-group">
            <label for="fileImagen">Imagen:</label>
            <input type="file" class="form-control-file" name="imagen" id="imagen">
            <img src="files/<?php echo $producto->imagen; ?>" class="img-thumbnail">
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

<script> //Seutiliza este scrip para darle estilo al cuadro de la descripcion
    ClassicEditor
        .create(document.querySelector('#txtDescripcion'))
        .catch(error => {
            console.error(error);
        });
</script>

<?php include_once("footer.php"); ?>