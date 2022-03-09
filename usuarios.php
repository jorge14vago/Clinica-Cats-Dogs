<?php
include_once "config/conexion.php";

$sentencia = $bd ->query("SELECT * FROM usuarios");
$usuarios = $sentencia ->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="es">
  <head>
    <title>CATS&DOGS</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--estilos css-->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/usuarios.css">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--cdn iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  </head>
  
  <body>

    <!-- Barra de navegacion-->
    <nav>
      <div >
        <ul class="menu">
          <li><a href="home.php" class="link-light">Regresar</a></li>
          <li><a href="registrarNuevoUsuario.php" class="link-light">Registrar Usuario</a></li>
          <li><a href="config/salir.php" class="link-light">Cerrar Sesion</a></li>
        </ul>
      </div>
    </nav>

    <!--Datos de la tablas usuarios-->
    <div class="conteiner mt-5">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <!--inicio alertas-->
              <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
              ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> Rellena todos los campos.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             <?php 
                    }
             ?>
            
            <?php 
              if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Registrado!</strong> Se agregaron los datos.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php 
              }
            ?>

            <?php 
              if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> Los datos fueron borrados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php 
               }
            ?> 

            <?php 
               if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cambiado!</strong> Los datos fueron actualizados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php 
              }
            ?> 
                
           <?php 
               if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
           ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Vuelve a intentar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
           <?php 
              }
           ?>   
          <!--fin alertas-->

          <!-- DATOS DE TABLA CITAS-->
          <div class="card">
            <div class="card-header">
                Usuarios.
                <span>
                  <?php
                  date_default_timezone_set("America/Mazatlan");
                  echo date("d/m/Y h:i a");
                  ?>
                </span>
            </div>
            <div class="p-4">
              <table class="table aling-middle table-light table-striped table-hover">
                <thead>
                
                  <tr>
                    <th scope="col"># EMPLEADO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">CORREO</th>
                    <th scope="col" colspan="2">OPCIONES</th>
                  </tr>
                
                </thead>
                <tbody>
                  <?php
                  foreach ($usuarios as $dato) {
                  
                  ?>
                  <tr>
                    <td scope="row"><?php echo $dato->numero_empleado  ?></td>
                    <td><?php echo $dato->nombre ?></td>
                    <td><?php echo $dato->numero_telefono  ?></td>
                    <td><?php echo $dato->direccion  ?></td>
                    <td><?php echo $dato->tipo  ?></td>
                    <td><?php echo $dato->correo ?></td>
                    <td><a class="text-success" href="editarUsuario.php?numero_empleado=<?php echo $dato->numero_empleado  ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td><a class="text-danger" href="config/eliminarUsuario.php?numero_empleado=<?php echo $dato->numero_empleado  ?>"><i class="bi bi-trash"></i></a></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
    </div>

    

      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>