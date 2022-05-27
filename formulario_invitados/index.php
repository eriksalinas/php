<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Formulario de invitados</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-2">
                <h1>Lista de invitados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-2">
                 <p>Completa el siguiente formulario:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    <div class="bm-3">
                        <p>Ingresar el DNI:</p> <input type="text" name="txtDni" id="txtDni" class="form-control">
                        <input type="submi" name="btnPorcesar" value="Verificar invitado" class="btn btn-primary">
                    </div>
                    <div class="bm-3">
                        <p>Ingresar el código secreto para el pase VIP:</p> <input type="text" name="txtVip" id="txtVip" class="form-control">
                        <input type="submi" name="btnPorcesar" value="Verificar codigo" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

    </main>
    
</body>
</html>