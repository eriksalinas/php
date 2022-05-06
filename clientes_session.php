<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); //Indica que utilizamos variables de session

if($_POST){

    if(isset($_POST["btnEnviar"])){ //isset es existe? empieza bucle

    
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $apellido = $_POST["txtApellido"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];

    $cliente =array( "nombre" => $nombre,
                    "dni" => $dni, 
                    "apellido" => $apellido,
                     "telefono" =>$telefono,
                      "edad" => $edad);
    $_SESSION["listadoClientes"][]= $cliente; //UTILIZAMOS  $_SESSION UNIR UNA ARRAY Y FORMAR UN BUCLE

    } else if(isset($_POST["btnEliminar"])){ //cierre de bucle
        session_destroy();
        header("Location: clientes_session.php");
    }
}
//unset($_SESSION)["istadoClientes"][0]; //ELIMINA VARIABLES
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Tabla de clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <form action="clientes_session.php" method="POST">
                   <div class="pb-3">
                        <label for="">Nombre* <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                   </div>
                   <div class="pb-3">
                        <label for="">Dni* <input type="text" name="txtDni" id="txtDni" class="form-control" required>
                   </div>
                   <div class="pb-3">
                        <label for="">Apellido* <input type="text" name="txtApellido" id="txtApellido" class="form-control" required>
                   </div>
                   <div class="pb-3">
                        <label for="">Telefono* <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required>
                   </div>
                   <div class="pb-3">
                        <label for=""> Edad*<input type="text" name="txtEdad" id="txtEdad" class="form-control" required>
                   </div>
                   <div class="pb-3">
                        <button class="btn bg-primary" type="submit" name="btnEnviar">Enviar</button>
                        <button class="btn bg-danger " type="submit" name="btnEliminar"> Eliminar</button>
                   </div>
                </form>
            </div>
            <div class="col-7">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Apellido:</th>
                            <th>Telefono:</th>
                            <th>Edad:</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        foreach($_SESSION ["listadoClientes"] as $cliente){
                           
                        ?>
                        <tr>
                            <td>  <?php echo $cliente ["nombre"];?></td>
                            <td> <?php echo $cliente ["dni"]; ?></td>
                            <td> <?php  echo $cliente ["apellido"];?></td>
                            <td> <?php  echo $cliente ["telefono"]; ?></td>
                            <td> <?php  echo $cliente ["edad"];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    
                </table>

            </div>

        </div>

    </main>
    
</body>
</html>