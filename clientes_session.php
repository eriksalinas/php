<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); //Indica que utilizamos variables de session


if($_POST){
    if(isset($_POST["btnEnviar"])){
        $nombre = $_POST["textNombre"];
    $dni = $_POST["textDni"];
    $telefono = $_POST["textTel"];
    $edad = $_POST["textEdad"];

    $cliente = array("nombre" =>$nombre, "dni" => $dni,"telefono"=> $telefono,"edad" => $edad);

    $_SESSION["listadoClientes"][] = $cliente;
    } else if(isset($_POST["btnEliminar"])){
        session_destroy();
        header("Location: clientes_session.php");
    }

   
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Tablas clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Tablas de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
            <form action="" method="POST">
                    <div class="pb-2">
                        <label for="">Nombre:*<input type="text" name="textNombre" id="textNombre" class="form-control" required >
                    </div>
                    <div class="pb-2">
                         <label for="">DNI:* <input type="text" name="textDni" id="textDni" class="form-control" required>
                    </div>
                    <div class="pb-2">
                         <label for="">Telefono:* <input type="text" name="textTel" id="textTel" class="form-control" required>
                    </div>
                    <div class="pb-2">
                          <label for="">Edad:* <input type="text" name="textEdad" id="textEdad" class="form-control" required>
                    </div>
                    <div class=" pb-3 ">
                        <button class="btn btn-primary text-white " type="submit">ENVIAR</button>
                        <button class="btn bg-danger  text-white " type="submit">ELIMINAR</button>
                    </div>
                </form>
            </div>
            
            <div class="col-7 text-center">
                <table class="table table-hover border">
                    <thead >
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Telefono</th>
                            <th>Edad</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                       foreach($_SESSION["listadoClientes"] as $cliente){ ?>
                                <tr>
                                    <td> <?php echo $cliente["nombre"]; ?></td>
                                    <td> <?php echo $cliente["dni"];?></td>
                                    <td> <?php echo $cliente["telefono"];?></td>
                                    <td> <?php echo $cliente["edad"];?></td>
                                </tr>
                            
                        <?php }?>

                    </tbody>
                </table>

            </div>

        </div>
        
    </main>
    
</body>
</html>