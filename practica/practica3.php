<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$mensaje = "";


if($_POST){
    //Si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
    //los DNIs permitidos
    if(file_exists("invitados.txt")){
        $strJson = file_get_contents("invitados.txt");
        $aInvitados = explode(",", $strJson);
    }else{
        //Sino el array queda como un array vacio
        $aInvitados = array();
    }
    //echo gettype($aInvitados);
    //print_r($aInvitados);
    //si el DNI ingresado se encuentra en la lista mostrará un mensaje de bienvenido
    //si no un mensaje de no se encuentra en la lista de invitados
    if(isset($_POST["btnProcesar"])){
        $dni = $_POST["txtDni"];
        if(in_array($dni, $aInvitados)){
            $mensaje = "Bienvenid@ $dni a la fiesta";
            $alert = "success";
        }else{
            $mensaje = "No se encuentra en la lista de ivitados.";
            $alert = "danger";
        }
    }

    //Si el codigo es verde entonces mostrará Su código de acceso es ....
    //Sino Ud. no tiene pase VIP
    if(isset($_POST["btnVip"])){
        $codigo = $_POST["txtCodigo"];
        if($codigo == "verde"){
            $mensaje = "Su código de acceso es " . rand(1000,9999);
            $alert = "success";
        }else{
            $mensaje = "Ud. no tiene pase vip.";
            $alert = "danger";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 pt-3">
                <h1 class="pb-3">Lista de invitados</h1>
                <?php if($mensaje != ""):?>
                    <div class="alert alert-<?php echo $alert; ?>" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>
                <p>Complete el siguiente formulario</p>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <form action="" method="post">
                    <div class="pt-3">
                        <label for="txtDni">Ingrese el DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control mt-3">
                        <input type="submit" id="btnProcesar" name="btnProcesar" class="btn btn-primary" value="Verificar invitado">
                    </div>
                    <div class="pt-3">
                        <label for="txtCodigo">Ingresa el código secreto para el pase VIP:</label>
                        <input type="text" name="txtCodigo" id="txtCodigo" class="form-control mt-3">
                        <input type="submit" id="btnVip" name="btnVip" class="btn btn-primary" value="Verificar código">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>