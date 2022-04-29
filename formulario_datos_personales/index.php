<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>formulario de datos personales</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center p-3">
                <h1>Formulario datos personales</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-12 offset-sm-3 col-sm-6">
                <form method="POST" action="resultado.php"></form>
            </div>
            <div class="pb-3">
                <label for="">Nombre:*</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" require> <!-- form-control es de boostrap da estilo-->
            </div>
            <div>
                <label for="">DNI:</label>
                <input type="text" name="txtDni" id="txtdni" class="form-control" require> <!-- form-control es de boostrap da estilo-->
            </div>
            <div>
                <label for="">Edad:</label>
                <input type="text" name="txtEdad" id="txtEdad" class="form-control" require> <!-- form-control es de boostrap da estilo-->
            </div>
            <div class="pb-3">
                <button type="submit"></button>

            </div>

        </div>
    </main>
    
</body>
</html>