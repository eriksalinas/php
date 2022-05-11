<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <div class="col-5">
                <form action="" method="POST">
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
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for=""> Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <p>Archivos admitidos .jpg, .jpeg, .png</p>
                    </div>
                    <div class="pb-2">
                        <button class="btn btn-primary" type="submit">GUARDAR</button>
                        <button class="btn btn-danger" type="submit">ENVIAR</button>
                    </div>
                </form>
            </div>
            <div class="col-7">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Imegen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </main>
    
</body>
</html>