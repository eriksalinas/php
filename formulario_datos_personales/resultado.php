<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){
    $nombre = $_POST["textNombre"];
    $tel = $_POST["textTel"];
    $dni = $_POST["textDni"];
    $edad = $_POST["textEdad"];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Datos personales</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Datos personales</h1>
            </div>
        </div>
        <div class="row"> 
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Telefono</th>
                            <th>Edad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <?php echo $nombre ?></td>
                            <td> <?php echo $dni ?> </td>
                            <td> <?php echo $tel ?></td>
                            <td> <?php echo $edad?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </main>
    
</body>
</html>