<!doctype html>
<html lang="en">
  <head>
    <title>CATS&DOGS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="conteiner mt-5">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="background-color: #fdf47f;">
              Registrar Usuario.
            </div>
            <!--FORMULARIO DE REGISTRO DE USUARIOS-->
              <form class="p-4" method="POST" action="registrarUsuarios.php">
                <div class="mb-3">
                <label class="form-label">Nombre: </label>
                <input type="text" class="form-control" name="txtNombre" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Numero de telefono: </label>
                  <input type="text" class="form-control" name="txtTelefono" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Direccion: </label>
                  <input type="text" class="form-control" name="txtDireccion" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tipo :</label>
                  <input type="text" class="form-control" name="txtTipo" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Correo: </label>
                  <input type="email" class="form-control" name="txtCorreo" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Contraseña: </label>
                  <input type="password" class="form-control" name="txtPassword" autofocus required>
                  <div id="passwordHelpBlock" class="form-text">
                    Su contraseña debe tener al menos 8 caracteres, letras, numeros, mayusculas y minusculas.
                  </div>
                </div>
                <div class="d-grid">
                  <input type="hidden" name="oculto" value="1">
                  <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
                <div class="text-center">
                  <a href="usuarios.php" class="mt-3 btn link-light btn-primary stretched-link">Cancelar</a>
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