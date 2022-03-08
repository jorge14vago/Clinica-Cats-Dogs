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
              Agendar Cita.
            </div>
            <!--FORMULARIO DE REGISTRO DE USUARIOS-->
            <form action="registrar.php" class="p-4 form-registro" method="POST">
              <div class="mb-2">
                <label for="" class="form-label">FECHA:</label>
                <input type="date" class="form-control" name="fecha" autofocus require>
              </div>
              <div class="mb-2">
                <label for="" class="form-label">HORA:</label>
                <input type="time" class="form-control" name="hora" autofocus require>
              </div>
              <div class="mb-2">
                <label for="" class="form-label">NOMBRE DEL DUEÑO:</label>
                <input type="text" class="form-control" name="nombre_dueno" autofocus require>
              </div>
              <div class="mb-2">
                <label for="" class="form-label">NOMBRE DE LA MASCOTA:</label>
                <input type="text" class="form-control" name="nombre_mascota" autofocus require>
              </div>
              <div class="mb-2">
                <label for="" class="form-label">TELEFONO:</label>
                <input type="text" class="form-control" name="telefono" autofocus require>
              </div>
              <div class="d-grid">
                <input type="hidden" name="oculto" value="1">
                <input type="submit" class="btn btn-primary" value="Registrar">
              </div>
              <div class="text-center">
                <a href="home.php" class="mt-3 btn link-light btn-primary stretched-link">Cancelar</a>
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