<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {
    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];

    if ($usuario != "" &&  $clave != "") {
        header("Location: practica2.php");
      
    } else {
        $mensaje = "Valido para usuarios registrados.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>formulario</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <div class="py-3">
                    <h1>Formulario</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (isset($mensaje)) { ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>

                <?php }  ?>
                <form action="" method="POST">
                <div class="pb-3">
                    <label for="">Usuario: <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" > </label>
                </div>
                <div class="pb-3">
                    <label for="">Clave: <input type="password" name="txtClave" id="txtClave" class="form-control" > </label>
                </div>
                <div class="pb-3">
                    <button class="btn btn-primary" type="submit">ENVIAR</button>
                </div>
                </form>
            </div>
        </div>

    </main>

</body>

</html>