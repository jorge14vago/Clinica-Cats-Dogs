<?php
  if(empty($_POST["num_de_cita"]) || empty($_POST["fecha"]) || empty($_POST["hora"]) || empty($_POST["nombre_dueno"]) || empty($_POST["nombre_mascota"]) || empty($_POST["telefono"])){
          header('Location: ../home.php?mensaje=falta');
          exit();
      }
      print_r($_POST);
      if(!isset($_POST['num_de_cita'])){
          header('Location: ../home.php?mensaje=error');
      }

      include 'conexion.php';
      $num_de_cita = $_POST["num_de_cita"];
      $fecha = $_POST["fecha"];
      $hora =$_POST["hora"];
      $nombre_dueno = $_POST["nombre_dueno"];
      $nombre_mascota = $_POST["nombre_mascota"];
      $telefono = $_POST["telefono"];

      $sentencia = $bd->prepare("UPDATE citas SET fecha = ?, hora = ?, nombre_del_dueno = ?,  nombre_de_mascota = ?, num_telefono = ? where num_de_cita = ?;");
      $resultado = $sentencia->execute([$fecha,$hora,$nombre_dueno,$nombre_mascota,$telefono,$num_de_cita]);

      if ($resultado === TRUE) {
          header('Location: ../home.php?mensaje=editado');
      } else {
          header('Location: ../home.php?mensaje=error');
          exit();
      }
    
?>