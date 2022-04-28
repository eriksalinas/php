<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aAlumnos = array();
$aAlumnos [] = array("nombre" =>"Ana Valle", "notas" => array(7, 8));
$aAlumnos[] = array("nombre" => "Bernabe Paz", "notas" => array(5,7));
$aAlumnos [] = array ("nombre" => "Sebastian Aguirre","notas"=> array(6, 7) );

function promediar($aNumeros){
    $sumatoria=0;
    foreach ($aNumeros as $numero){
        $sumatoria=$sumatoria+$numero;
    }
    return $sumatoria / count($aNumeros);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center p-5">
                <h1>Actas</h1>
            </div> 
            <div class="row">
                <table class="table table-hover border ">
                    <tr>
                        <th>Alumnos</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Promedio</th>
                    </tr>
                    <?php
                        $promedioCursada=0;
                        $sumatoria=0;
                        foreach($aAlumnos as $alumno){
                            $promerio= promediar($alumno["notas"]);
                            $sumatoria=$sumatoria+$promerio;
                            
                        
                    ?>
                    <tr>
                        <td> <?php echo $alumno["nombre"];?></td>
                        <td> <?php echo $alumno["notas"][0]; ?></td>
                        <td> <?php echo $alumno["notas"][1];?></td>
                        <td> <?php  echo number_format(promediar($alumno ["notas"]), 2,",","," );?></td>
                    </tr>
                    <?php  $promedioCursada=$sumatoria / count($aAlumnos);
                    
                    }
                    ?>

                </table>
                <div class="row">
                    <div class="col-12">
                        <p> Promedio de la cursa: <?php echo number_format($promedioCursada,2,",",",");?></p>
                    </div>

                </div>

            </div>

        </div>

    </main>
    
</body>
</html>