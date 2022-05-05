<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
            <div>
                <form action="" method="POST">
                    <div class="py-2">
                        <label for="">Nombre:*</label> <input type="text" name="textNombre" id="textNombre" class="form-control" >
                    </div>
                    <div class="py-2">
                         <label for="">DNI:*</label> <input type="text" name="textDni" id="textDni" class="form-control">
                    </div>
                    <div class="py-2">
                         <label for="">Telefono:*</label> <input type="text" name="textTel" id="textTel" class="form-control">
                    </div>
                    <div class="py-2">
                          <label for="">Edad:*</label> <input type="text" name="textEdad" id="textEdad" class="form-control">
                    </div>
                    <div class=" py-3 ">
                        <button class="btn btn-primary float-end" type="submit">ENVIAR</button>
                    </div>
                </form>
            </div>

        </div>

    </main>
    
</body>
</html>
