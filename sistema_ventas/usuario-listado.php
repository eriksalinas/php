<?php

include_once "config.php";
include_once "entidades/usuario.php";
$pg = "Listado de usuarios";

$usuario = new Usuario();
$aUsuario = $usuario->obtenerTodos();

include_once("header.php"); 
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de usuarios</h1>
          <div class="row">
                <div class="col-12 mb-3">
                    <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
          <table class="table table-hover border">
            <tr>
                <th>CUIT</th>
                <th>Nombre</th>
                <th>Fecha nac.</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($aUsuario as $usuario): ?>
              <tr>
                  <td><?php echo $usuario->cuit; ?></td>
                  <td><?php echo $usuario->nombre; ?></td>
                  <td><?php echo date_format(date_create($usuario->fecha_nac), "d/m/Y"); ?></td>
                  <td><?php echo $usuario->telefono; ?></td>
                  <td><?php echo $usuario->correo; ?></td>
                  <td style="width: 110px;">
                      <a href="cliente-formulario.php?id=<?php echo $usuario->idusuario; ?>"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once("footer.php"); ?>