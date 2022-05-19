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
            <div class="col-6">
                <form action="" method="POST">
                    <div class="py-3">
                        <label for="txtTitulo">Titulo</label>
                        <input type="txtTitululo" name="txtTitulo" id="txtTitulo" class="form-control">
                    </div>
                    <div class="py-1">
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                            <!--Para crear una selda de opciones -->
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="lstPrioridad">Estado</label>
                        <select name="lstEstado" id="lstEstado" class="form-control">
                            <!--Para crear una selda de opciones -->
                            <option value="sin asignado"> Sin asignado</option>
                            <option value="asignado">Asignado</option>
                            <option value="enproceso">Enproceso</option>
                            <option value="terminado">Terminado</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="ltsUsuario">Usuario</label>
                        <select name="ltsUsuario" id="ltsUsuairo" class="form-control">
                            <option value="" disabled selected>Seleccionar</option> <!--  disabled selected Se utiliza para que no se pueda marcar una opcion -->
                            <option value="Ana">Ana</option>
                            <option value="Brenda">Brenda</option>
                            <option value="Daniel">Daniel</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for=""> Descripcion</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"></textarea>  <!-- textarea para hacer un cuadro de descripcion -->
                    </div>
                    <div class="p-3">
                        <button type="submit " id="btnEnviar" name="btnEnviar" class="btn btn-primary">ENVIAR</button>
                    </div>

                </form>

            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        
        </div>

    </main>

</body>

</html>