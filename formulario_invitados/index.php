<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Es POST?
//Va todo en POST por que no trabajamos con la opccion boton ENVIAR
if($_POST){
    //Si existe el archivo invitado lo abrimos y cargamos una variable del tipo array
    //los DNIs permitidos
    if( file_exists("invitados.txt")){
         $strJson = file_get_contents("invitados.txt");

          //Convierte el $steJson(json) a una array
         $aInvitados = explode(",", $strJson);
    }
    //Si no el array queda como una array vacio
    else{
          $aInvitados = array();

        }

    if(isset($_POST["btnProcesar"])){
        //Si el DNI ingresado se encuentra en la lista se mostrará un mensaje de bienvenido a la fiesta
        $dni = $_POST ["txtDni"];
        if(in_array($dni, $aInvitados)){
            $mensaje = "Bienvenido $dni a la fiesta";
            $alert = "success"; //alerta de boostrap
        }
        // Si no un mensaje de No se encuentra en la lista de invitados
        else{
            $mensaje = "No se encuentra en la lista de invitados.";
            $alert = "danger"; //alerta de boostrap
        }
        
    }

    if(isset( $_POST["btnVip"])){
        $codigo = $_POST ["txtCodigo"];
        //Si el codigo es verde entonces mostrará Su código de acceso es...
        if($codigo == "verde"){
            $mensaje= " Su codigo de acceso es " . rand(1000,9999);// rand(1000,9999) es para que tire un numero aleatorio
            $alert = "success"; //alerta de boostrap
        }
        else{
            $mensaje = "Usted. No tiene pase VIP.";
            $alert = "danger"; //alerta de boostrap
        }
        // Si no usted. No tiene pase VIP
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Formulario de invitados</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 pt-3">
                <h1 class="pb-3">Lista de invitados</h1>
              <?php if($mensajec !=""): ?>
                <div class="alert alert- <?php echo $alert;?>" role="alert"> 
                        <?php echo $mensaje; ?>
                </div>
                <?php endif;?>
                <p>Completa el siguiente formulario:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <form action="" method="POST">
                    <div class="pt-3">
                        <p>Ingresar el DNI:</p> <input type="text" name="txtDni" id="txtDni" class="form-control">  <!--Se utiliza este metodo de boton  para vedificar el dato como DNI -->
                        <input type="submit" name="btnProcesar"id="btnPorecesar" value="Verificar invitado" class="btn btn-primary">
                    </div>
                    <div class="pb-2">
                        <p>Ingresar el código secreto para el pase VIP:</p> <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
                        <input type="submit" name="btnVip"id="btnVip" value="Verificar codigo" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>