<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Formulario de datos personales</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-3 col-sm-6 " > <!-- offset-sm-3 col-sm-6 pone el formulario en el centro -->
                <form action="practica2.php" method="POST">
                    <div class="pb-3">
                        <label for="">Nombre:* </label><input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                    </div>
                    <div class="pb-3"> 
                        <label for="">DNI:* </label><input type="text" name="txtDni" id="txtDni" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="">Teléfono:* </label><input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="">Edad:* </label><input type="text" name="txtEdad" id="txtEdad" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <button class="btn btn-primary float-end">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
    
</body>
</html>

