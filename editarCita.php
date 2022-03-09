<?php
    if(!isset($_GET['num_de_cita'])){
        header('Location: home.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $num_de_cita = $_GET['num_de_cita'];

    $sentencia = $bd->prepare("select * from citas where num_de_cita = ?;");
    $sentencia->execute([$num_de_cita]);
    $cita= $sentencia->fetch(PDO::FETCH_OBJ);
    
?>
<?php
  include "config/conexion.php";

  $sentencia = $bd ->prepare("SELECT hora FROM citas WHERE fecha = ? ORDER BY hora ASC");
  $sentencia->execute([$cita->fecha]);
  $registro_citas = $sentencia ->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="es">
  <head>
    <title>CATS&DOGS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/editar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: #fdf47f;">
                    Editar Datos:
               </div>
                <!-- FORMULARIO DE EDITAR CITAS-->
            <form action="config/editarCitaProceso.php" class="p-4 form-registro" method="POST">
              <div class="mb-3">
                <label for="" class="form-label">FECHA:</label>
                <input type="date" class="form-control" name="fecha" autofocus require
                value="<?php echo $cita->fecha  ?>">
              </div>
              <!--<div class="mb-3">
                <label for="" class="form-label">HORA:</label>
                <input type="time" class="form-control" name="hora" autofocus require 
                value="<?php echo $cita->hora  ?>">
              </div>-->
               <!--FORMATOS HORA-->
             <?php
                $horas;
                foreach ($registro_citas as $dato) {
                $horas[] = $dato->hora;
                }
                  if (empty($horas)) {
              ?>
            <div class="mb-2">
                <label for="" class="form-label">HORA:</label>
            <select name="hora" class="form'control" autofocus require>
              <option value="08:00">08:00</option>
              <option value="08:30">08:30</option>
              <option value="09:00">09:00</option>
              <option value="09:30">09:30</option>
              <option value="10:00">10:00</option>
              <option value="10:30">10:30</option>
              <option value="11:00">11:00</option>
              <option value="11:30">11:30</option>
              <option value="12:00">12:00</option>
              <option value="12:30">12:30</option>
              <option value="13:00">13:00</option>
              <option value="13:30">13:30</option>
              <option value="14:00">14:00</option>
              <option value="14:30">14:30</option>
              <option value="15:00">15:00</option>
              <option value="15:30">15:30</option>
              <option value="16:00">16:00</option>
              <option value="16:30">16:30</option>
              <option value="17:00">17:00</option>
              <option value="17:30">17:30</option>
              <option value="18:00">18:00</option>
            </select>
            </div>
              
            <?php
            
                 }else{
                  

            ?>
             
             <div class="mb-2">
                <label for="" class="form-label">HORA:</label>
              <select name="hora" class="form'control" autofocus require>
                <?php
                  if(in_array("08:00",$horas)){
                ?>
                  <option value="08:00" disabled>08:00</option>
                <?php
                  }else{
                ?>
                  <option value="08:00">08:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("08:30",$horas)){
                ?>
                  <option value="08:30" disabled>08:30</option>
                <?php
                  }else{
                ?>
                  <option value="08:30">08:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("09:00",$horas)){
                ?>
                  <option value="09:00" disabled>09:00</option>
                <?php
                  }else{
                ?>
                  <option value="09:00">09:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("09:30",$horas)){
                ?>
                  <option value="09:30" disabled>09:30</option>
                <?php
                  }else{
                ?>
                  <option value="09:30">09:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("10:00",$horas)){
                ?>
                  <option value="10:00" disabled>10:00</option>
                <?php
                  }else{
                ?>
                  <option value="10:00">10:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("10:30",$horas)){
                ?>
                  <option value="10:30" disabled>10:30</option>
                <?php
                  }else{
                ?>
                  <option value="10:30">10:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("11:00",$horas)){
                ?>
                  <option value="11:00" disabled>11:00</option>
                <?php
                  }else{
                ?>
                  <option value="11:00">11:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("11:30",$horas)){
                ?>
                  <option value="11:30" disabled>11:30</option>
                <?php
                  }else{
                ?>
                  <option value="11:30">11:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("12:00",$horas)){
                ?>
                  <option value="12:00" disabled>12:00</option>
                <?php
                  }else{
                ?>
                  <option value="12:00">12:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("12:30",$horas)){
                ?>
                  <option value="12:30" disabled>12:30</option>
                <?php
                  }else{
                ?>
                  <option value="12:30">12:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("13:00",$horas)){
                ?>
                  <option value="13:00" disabled>13:00</option>
                <?php
                  }else{
                ?>
                  <option value="13:00">13:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("13:30",$horas)){
                ?>
                  <option value="13:30" disabled>13:30</option>
                <?php
                  }else{
                ?>
                  <option value="13:30">13:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("14:00",$horas)){
                ?>
                  <option value="14:00" disabled>14:00</option>
                <?php
                  }else{
                ?>
                  <option value="14:00">14:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("14:30",$horas)){
                ?>
                  <option value="14:30" disabled>14:30</option>
                <?php
                  }else{
                ?>
                  <option value="14:30">14:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("15:00",$horas)){
                ?>
                  <option value="15:00" disabled>15:00</option>
                <?php
                  }else{
                ?>
                  <option value="15:00">15:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("15:30",$horas)){
                ?>
                  <option value="15:30" disabled>15:30</option>
                <?php
                  }else{
                ?>
                  <option value="15:30">15:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("16:00",$horas)){
                ?>
                  <option value="16:00" disabled>16:00</option>
                <?php
                  }else{
                ?>
                  <option value="16:00">16:00</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("16:30",$horas)){
                ?>
                  <option value="16:30" disabled>16:30</option>
                <?php
                  }else{
                ?>
                  <option value="16:30">16:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("17:30",$horas)){
                ?>
                  <option value="17:30" disabled>17:30</option>
                <?php
                  }else{
                ?>
                  <option value="17:30">17:30</option>
                <?php
                  }
                ?>

                <?php
                  if(in_array("18:00",$horas)){
                ?>
                  <option value="18:00" disabled>18:00</option>
                <?php
                  }else{
                ?>
                  <option value="18:00">18:00</option>
                <?php
                  }
                ?>
              </select>
            </div>
            <?php
                }
              ?> 
              <!--FIN FORMATOS HORA-->


              <div class="mb-3">
                <label for="" class="form-label">NOMBRE DEL DUEÑO:</label>
                <input type="text" class="form-control" name="nombre_dueno" autofocus require 
                value="<?php echo $cita->nombre_del_dueno  ?>">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">NOMBRE DE LA MASCOTA:</label>
                <input type="text" class="form-control" name="nombre_mascota" autofocus require
                value="<?php echo $cita->nombre_de_mascota ?>">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">TELEFONO:</label>
                <input type="text" class="form-control" name="telefono" autofocus require
                value="<?php echo $cita->num_telefono  ?>">
              </div>
              <div class="d-grid">
                <input type="hidden" name="num_de_cita" value="<?php echo $cita->num_de_cita  ?>">
                <input type="submit" class="btn btn-primary" value="Editar">
              </div>
               <div class="text-center d-grid">
                <a href="home.php" class="mt-3 btn link-light btn-primary">Cancelar</a>
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

