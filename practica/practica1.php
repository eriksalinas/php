<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Gestor de tarea</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Gestor de tarea</h1>
            </div>
        </div>
        <div class="row">
            <form action="" method="POST">
                <div class="row pb-2">
                    <div class="col-4">
                        <label for="ltsPrioridad">Prioridad</label>
                        <select name="ltsPrioridad" id="ltsPrioridad" class="form-control">
                            <option value="alta">Alta</option>
                            <option value="media">Media</option>
                            <option value="baja">Baja</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="ltsUsuario">Usuario</label>
                        <select name="ltsUsuario" id="ltsUsuario" class="form-control">
                            <option value="ana">Ana</option>
                            <option value="bernabe">Bernabé</option>
                            <option value="daniela">Daniela</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="ltsEstado">Estado</label>
                        <select name="ltsEstado" id="ltsEstado" class="form-control">
                            <option value="sin asignar">Sin asignar</option>
                            <option value="asignado">Asignado</option>
                            <option value="en proceso">En proceso</option>
                            <option value="terminado">Terminado</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="pb-2">
                        <label for="">Título</label>
                        <input type="text" name="txtTitulo" id="txtTitulo" class=" form-control">
                    </div>
                    <div class="pb-2">
                        <label for="">Descripcion</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">ENVIAR</button>
                        <a href="practica1.php" class="btn ">CANCELAR</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-12 py-5 ">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>Título</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </main>
</body>
</html>