<?php
    if(!isset($_GET['numero_empleado'])){
        header('Location: usuarios.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $numero_empleado = $_GET['numero_empleado'];

    $sentencia = $bd->prepare("select * from usuarios where numero_empleado= ?;");
    $sentencia->execute([$numero_empleado]);
    $usuario= $sentencia->fetch(PDO::FETCH_OBJ);
    
?>

<!doctype html>
<html lang="es">
  <head>
    <title>CATS&DOGS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/editarUsuario.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
                <!-- FORMULARIO DE EDITAR Usuario-->
    <div class="mt-5">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="background-color: #fdf47f;">
                Editar Usuario.
              </div>
            <form class="p-4 form-registro" method="POST" action="config/editarUsuarioProceso.php">
              <div class="mb-3">
                <label class="form-label">Nombre: </label>
                <input type="text" class="form-control" name="txtNombre" value="<?php echo $usuario->nombre?>" autofocus required>
              </div>
              <div class="mb-3">
                <label class="form-label">Numero de telefono: </label>
                <input type="text" class="form-control" name="txtTelefono" value="<?php echo $usuario->numero_telefono?>"  autofocus required>
              </div>
              <div class="mb-3">
                <label class="form-label">Direccion: </label>
                <input type="text" class="form-control" name="txtDireccion" value="<?php echo $usuario->direccion?>"  autofocus required>
              </div>
              <div class="mb-3">
                <label class="form-label">Tipo :</label>
                  <select name="  txtTipo" class="form-control" autofocus require>
                    <?php
                      if ($usuario->tipo == "Doctor") {
                    ?>
                      <option value="Doctor" selected>Doctor</option>
                      <option value="Enfermero">Enfermero</option>
                    <?php
                      }else{
                      ?>
                      <option value="Doctor">Doctor</option>
                      <option value="Enfermero" selected>Enfermero</option>
                    <?php
                      }
                      ?>
                  </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Correo: </label>
                <input type="email" class="form-control" name="txtCorreo" value="<?php echo $usuario->correo?>"  autofocus required>
              </div>
              <div class="mb-2">
                <label class="form-label">Contrase??a: </label>
                <input type="password" class="form-control" name="txtPassword" value="<?php echo $usuario->contra?>"  autofocus required>
              </div>
               <div id="passwordHelpBlock" class="form-text py-1">
                    Su contrase??a debe tener al menos 8 caracteres, letras, numeros, mayusculas y minusculas.
                  </div>
              <div class="d-grid">
                <input type="hidden" name="numero_empleado" value="<?php echo $usuario->numero_empleado?>">
                <input type="submit" class="btn btn-primary" value="Editar">
              </div>
              <div class="text-center d-grid">
                  <a href="usuarios.php" class="mt-3 btn link-light btn-primary">Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>

