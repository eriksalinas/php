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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Registro de clientes</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Resgistro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pb-3">
                        <label for="">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Teléfono:*</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Correo:*</label>
                        <input type="email" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Archivo adjuntos</label>
                        <input type="file" name="archivo1" id="archivo1" accept=".png, .jpng, .png" > <p>Archivos admitidos .png, .jpng, .png </p>
                    </div>
                    <div class="pb-3">
                        <button  type="submit" class="btn btn-primary text-wuite " >GUARDAR</button>
                        <a href="index.php" type="submit" class="btn bg-danger text-white">NUEVO</a>
                    </div>
                    <div></div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                           <th>Imagen</th>
                           <th>DNI</th>
                           <th>Nombre</th>
                           <th>Correo</th>
                           <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td> <?php ?></td>
                        <td> <?php ?></td>
                        <td> <?php ?></td>
                        <td> <?php ?></td>
                        <td> <?php ?></td>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>