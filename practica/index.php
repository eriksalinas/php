<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Comprobar si un archivo existe
if (file_exists("archivo.txt")){
    //Si el archivo existe, cargo los clientes en la variable aClientes
    $strJson = file_get_contents("archivo.txt"); //file_get_contents Utilizamos para leer

    //Convierte el $steJson(json) a una array
   $aClientes = json_decode($strJson, true);// json_decode() Descodifica, es $aClientes por q es la array
  
}else{
    //Si el archivo no existe es por que no hay clientes
    $aClientes =array();
}
if(isset($_GET ["id"])){ // isset Verifica si esta difinido la variable. Variable con datos
    $id = $_GET ["id"]; //Accede a toda a toda la acurio string como "id"
}else {
    $id=""; //Variable vacia
}
if ($_POST){
    $dni = $_POST["txtDni"];
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $correo = $_POST ["txtCorreo"];

    
    $aClientes[] = array("dni" => $dni,
                        "nombre" => $nombre,
                        "telefono" => $telefono,
                        "correo" =>$correo
    );
    //Convertir el array de aClientes en json
     $strJson = json_encode($aClientes); // $strJson es una variable (Cualquier nombre)que es =  json_encode() CODIFICA
     
    //Almacenar un archivo.txt el json
    file_put_contents("archivo.txt", $strJson);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome-free-6.1.1-web/css/all.min.css">
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
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pb-2">
                        <label for="">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value=" <?php echo isset($aClientes [$id])? $aClientes[$id] ["dni"] : ""; ?>"> <!-- echo isset($aClientes [$id])? $aClientes[$id] ["dni"] : ""; se utiliza para editar la array  -->
                    </div>
                    <div class="pb-2">
                        <label for="">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes [$id])? $aClientes[$id] ["nombre"] : ""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="">Teléfono:*</label>
                        <input type="txt" name="txtTelefono" id="txtTelefono" class="form-control" required value="<?php echo isset($aClientes [$id])? $aClientes[$id] ["telefono"] : ""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="">Correo:*</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes [$id])? $aClientes[$id] ["correo"] : ""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="">Archivo adjuntos</label>
                        <input type="file" name="archivo" id="archivo" accept=".png, .jpng, .png" > <p>Archivos admitidos .png, .jpng, .png </p>
                    </div>
                    <div class="pb-2 ">
                        <button  type="submit" class="btn btn-primary text-wuite " >Guardar</button>
                        <a href="index.php" type="submit" class="btn bg-danger text-white ">NUEVO</a> <!-- esta opcion se usa para actualizar pagina web -->
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
                           <th>Telefono</th>
                           <th>Correo</th>
                           <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($aClientes as $pos =>  $cliente){ // EL $pos nos indica si la array es un 0,1,2, etc
                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $cliente ["dni"]; ?></td>
                            <td><?php echo $cliente ["nombre"]; ?></td>
                            <td><?php echo $cliente ["telefono"]; ?></td>
                            <td><?php echo $cliente ["correo"]; ?></td>
                            <td>
                            <a href="?id=<?php echo $pos; // $pos que indica array automaticamente ?>"><i class="fa-solid fa-pen-to-square"></a></i>
                            <i class="fa-solid fa-trash-can"></i>
                            </td>
                            
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>