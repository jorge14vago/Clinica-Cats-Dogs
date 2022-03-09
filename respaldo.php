<?php
session_start();

$correo = $_SESSION['correo'];

if(!isset($correo)){
  header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
   <link rel="stylesheet" href="css/normalize.css">
  <title>CATS&DOGS</title>
</head>
<body>
  <div>
     <ul class="menu">
  <li><a href=""> <b>Agendar Citas</b></a></li>
  <li><a href=""><b>Usuarios</b></a></li>
  <li><a href="salir.php"><b>Salir</b></a></li>
 </ul>
  </div>
<form action="conexion.php" class="formulario-agendar-citas" method="post">
  <label for="fecha"> FECHA:</label>
  <input type="date" id="fecha" name="fecha">
  <label for="">HORA:</label>
  <input type="text" name='hora' id="hora" placeholder="hh:mm:ss">
  <input type="text" name="nombre_dueno" id="nombre_dueno" placeholder="NOMBRE DEL DUEÑO">
  <input type="text" name="nombre_mascota" id="nombre_mascota" placeholder="NOMBRE DE LA MASCOTA">
  <input type="text" name="telefono" id="telefono" placeholder="TELEFONO">
  <input type="submit">


  <!--<input type="radio" name="hora" id="ocho" value="08:00:00">
  <label for="ocho">08:00</label>
  <input type="radio" name="hora" id="nueve" value="09:00:00">
  <label for="nueve">09:00</label>
  <input type="radio" name="hora" id="diez" value="10:00:00">
  <label for="ocho">10:00</label>
  <input type="radio" name="hora" id="once" value="11:00:00">
  <label for="ocho">11:00</label>
  <input type="radio" name="hora" id="doce" value="12:00:00">
  <label for="ocho">12:00</label>
  <input type="radio" name="hora" id="trece" value="13:00:00">
  <label for="ocho">13:00</label>
  <input type="radio" name="hora" id="catorce" value="14:00:00">
  <label for="ocho">14:00</label>
  <input type="radio" name="hora" id="quince" value="15:00:00">
  <label for="ocho">15:00</label>
  <input type="radio" name="hora" id="dieciseis" value="16:00:00">
  <label for="ocho">16:00</label>
  <input type="radio" name="hora" id="diecisiete" value="17:00:00">
  <label for="ocho">17:00</label>
  <input type="radio" name="hora" id="dieciocho" value="18:00:00">
  <label for="ocho">18:00</label>-->
  
</form>
  
  
</body>
</html>

