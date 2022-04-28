<?php 
if($_POST){
    $prod =$_GET["prod"];
    $nombre = $_POST["txtNombre"];
    $correo = $_POST ["txtCorreo"];
}

if($nombre !="" && $clave !=""){
    header("Location: acceso-confirmado.php");
}
else{
    $mensaje = "valido para usuarios registrados.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="">
                   
                    <div>
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" required class="form-control"> 
                    </div>
                    <div>
                        <label for="txtCorreo">Correo:</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" required class="form-control"> 
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>