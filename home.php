<?php
  session_start();

  $correo = $_SESSION['correo'];

  if(!isset($correo)){
    header("location: index.php");
  }
?>
<!--CONEXION PARA VALIDAR EL TIPO DE USUARIO-->
<?php
  include_once "config/conexion.php";

  $sentencia = $bd ->prepare("SELECT * FROM usuarios where correo = ?;");
  $sentencia->execute([$correo]);
  $tipo_usuario = $sentencia ->fetchAll(PDO::FETCH_OBJ);
?>
<!--CONEXION PARA LA TABLA CITAS  DEL DIA-->
<?php
  include_once "config/conexion.php";

  date_default_timezone_set("America/Mazatlan");
  $fecha_actual = date("Y-m-d");

  $sentencia = $bd ->prepare("SELECT * FROM citas where fecha = ?;");
  $sentencia->execute([$fecha_actual]);
  $cita = $sentencia ->fetchAll(PDO::FETCH_OBJ);
?>
<!--CONEXION PARA LA TABLA DE TODAS LAS CITAS-->
<?php
  include_once "config/conexion.php";

  $sentencia = $bd ->query("SELECT * FROM citas;");
  $todas_citas = $sentencia ->fetchAll(PDO::FETCH_OBJ);
?>
<!--INICIO DEL DOCUMENTO HTML-->
<!doctype html>
<html lang="es">
  <head>
    <title>CATS&DOGS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="css/home.css">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--cdn iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  </head>

  <body class="bg-light">
    <!--VALIDACION DEL TIPO DE USUARIO Y BARRA DE NAVEGACION-->
    <?php
       foreach ($tipo_usuario as $usuario) {
         if($usuario->tipo == "Doctor"){
    ?>
    <nav>
      <div>
        <ul class="menu">
          <li class="usuario" ><span class="text-white">Bienvenido <?php echo $usuario->nombre?> </span></li>
          <li><a href="home.php#fecha" class="link-light">Agendar Citas</a></li>
          <li><a href="usuarios.php"class="link-light">Usuarios</a></li>
          <li><a href="config/salir.php" class="link-light">Cerrar Sesion</a></li>
        </ul>
      </div>
    </nav>
    <?php
       }else{
    ?>
    <nav>
      <div>
        <ul class="menu">
          <li class="usuario" class="link-light"><span class="text-white">Bienvenido <?php echo $usuario->nombre?> </span></li>
          <li><a href="home.php#fecha" class="link-light">Agendar Citas</a></li>
          <li><a href="config/salir.php" class="link-light">Cerrar Sesion</a></li>
        </ul>
      </div>
    </nav>
    <?php
       }
      }
    ?>
      <form action="agendarCita.php" method="post" class="fecha p-2 bg-info text-white" id="fecha">
            <div class="mb-3">
              <label for="" class="form-label">FECHA:</label>
              <input type="date" class="form-control" name="fecha" autofocus require>
            </div>
            <div class="d-grid">
                <input type="hidden" name="oculto" value="1">
                <input type="submit" class="btn btn-primary" value="Agendar">
              </div> <div class="text-center d-grid">
                <a href="home.php" class="mt-3 btn link-light btn-primary">Cancelar</a>
              </div>   
          </form>
          
    
    <!--CONTENEDOR DE LAS TABLAS-->
      <div class="mt-5">
        <div class="row justify-content-center">
          <div class="col-md-9">
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
            <!--FIN ALERTAS-->

            <!-- TABLA DE CITAS DEL DIA-->
            <div class="card">
              <div class="card-header">
                  Citas Del Dia.
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
                      <th scope="col">NUM. DE CITA</th>
                      <th scope="col">FECHA</th>
                      <th scope="col">HORA</th>
                      <th scope="col">NOMBRE DEL DUEÑO</th>
                      <th scope="col">NOMBRE DE LA MASCOTA</th>
                      <th scope="col">TELEFONO</th>
                      <th scope="col" colspan="2">OPCIONES</th>
                    </tr>
                  
                  </thead>
                  <tbody>
                    <?php
                        foreach ($cita as $dato) {
                    ?>
                    <tr>
                      <td scope="row"><?php echo $dato->num_de_cita  ?></td>
                      <td><?php echo $dato->fecha ?></td>
                      <td><?php echo $dato->hora  ?></td>
                      <td><?php echo $dato->nombre_del_dueno  ?></td>
                      <td><?php echo $dato->nombre_de_mascota  ?></td>
                      <td><?php echo $dato->num_telefono  ?></td>
                      <td><a href="editarCita.php?num_de_cita=<?php echo $dato->num_de_cita  ?>" class="text-success"><i class="bi bi-pencil-square"></i></a></td>
                      <td><a href="config/eliminarCita.php?num_de_cita=<?php echo $dato->num_de_cita  ?>" class="text-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table> 
                <div class="text-center">
                  <a href="home.php?mensaje=mostrar-todo" class="btn link-light btn-primary">Mostrar todas las citas</a>
                </div>
              </div>
            </div>
            <!--TABLA DE TODOS LOS REGISTROS DE LA TABLA CITAS-->
            <?php 
              if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'mostrar-todo'){
            ?>
              <div class="card mt-5">
                <div class="card-header">
                  Citas.
                </div>
                <div class="p-4">
                  <table class="table aling-middle table-light table-striped table-hover">
                  <thead>
                  
                    <tr>
                      <th scope="col">NUM. DE CITA</th>
                      <th scope="col">FECHA</th>
                      <th scope="col">HORA</th>
                      <th scope="col">NOMBRE DEL DUEÑO</th>
                      <th scope="col">NOMBRE DE LA MASCOTA</th>
                      <th scope="col">TELEFONO</th>
                      <th scope="col" colspan="2">OPCIONES</th>
                    </tr>
                  
                  </thead>
                  <tbody>
                    <?php
                      foreach ($todas_citas as $dato) {
                    ?>
                    <tr>
                      <td scope="row"><?php echo $dato->num_de_cita  ?></td>
                      <td><?php echo $dato->fecha ?></td>
                      <td><?php echo $dato->hora  ?></td>
                      <td><?php echo $dato->nombre_del_dueno  ?></td>
                      <td><?php echo $dato->nombre_de_mascota  ?></td>
                      <td><?php echo $dato->num_telefono  ?></td>
                      <td><a class="text-success" href="editarCita.php?num_de_cita=<?php echo $dato->num_de_cita  ?>"><i class="bi bi-pencil-square"></i></a></td>
                      <td><a class="text-danger" href="config/eliminarCita.php?num_de_cita=<?php echo $dato->num_de_cita  ?>"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table> 
                <div class="text-center">
                  <a href="home.php" class="btn link-light btn-primary">Cerrar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php
            }
          ?>
        </div>
      </div>
    <!-- FORMULARIO DE REGISTRO DE CITAS-->
      

      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>