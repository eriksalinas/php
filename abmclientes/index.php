<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")){
    //Si el archivo existe, cargo los clientes en la variable aClientes
    $strjson = file_get_contents("archivo.txt");
    $aClientes =json_decode($strjson, true);
}   
   else{
       $aClientes = array();
   }


   if(isset($_GET["id"])){
    $id = $_GET["id"];
} else {
    $id="";
}
if(isset($_GET["do"]) && $_GET ["do"] == "eliminar"){
    unset($aClientes[$id]);
   //convertir aClientes en json
   $strjson = json_encode(($aClientes));

   //almacenar el json en el archivo
   file_put_contents("archivo.txt", $strjson);

   header("Location: index.php");

}

if ($_POST){
    $dni = $_POST ["txtDni"];
    $nombre = $_POST ["txtNombre"];
    $telefono = $_POST ["txtTelefono"];
    $correo = $_POST ["txtCorreo"];
    $nombreImagen ="";
   
    $aClientes [] = array("dni" => $dni,
                     "nombre" => $nombre, 
                     "telefono" => $telefono, 
                     "correo" => $correo,
                     "imagen" => $nombreImagen
     );
         
    //Convertir el array de clientes en json
    $strjson = json_encode($aClientes);

    //almacenar en un archivo.txt el json con file_put_contents
    file_put_contents("archivo.txt", $strjson);

    header("Location: index.php");

}
//print_r($aClientes)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fontawesome-free-6.1.1-web/css/all.css">
  <link rel="stylesheet" href="css/fontawesome-free-6.1.1-web/css/fontawesome.min.css">
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
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($aClientes[$id])? $aClientes[$id]["dni"] : ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control"required value="<?php echo isset($aClientes[$id])? $aClientes[$id]["nombre"] : ""; ?> ">
                    </div>
                    <div class="pb-3">
                        <label for="">Teléfono:*</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control" required value="<?php echo isset($aClientes[$id])? $aClientes[$id]["telefono"] : ""; ?> " >
                    </div>
                    <div class="pb-3">
                        <label for="">Correo:*</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$id])? $aClientes[$id]["correo"] : ""; ?> ">
                    </div>
                    <div class="pb-3">
                        <label for=""> Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <p>Archivos admitidos .jpg, .jpeg, .png</p>
                    </div>
                    <div class="pb-2">
                        <button class="btn btn-primary" type="submit">GUARDAR</button>
                        <button class="btn btn-danger" type="submit">NUEVO</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Imegen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($aClientes as $pos => $cliente){ ?>

                        <tr>
                        <td> <img src="imagen/" <?php  echo $cliente ["imagen"]; ?> ></td>
                            <td> <?php  echo  $cliente["dni"]; ?></td>
                            <td> <?php echo $cliente["nombre"];?></td>
                            <td> <?php echo $cliente["telefono"];?></td>
                            <td> <?php echo $cliente["correo"];?></td> 
                            <td>
                                 <a href="?id=<?php echo $pos; ?>"><i class="fa-solid fa-pen-to-square"></a></i>
                                 <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </main>
    
</body>
</html>