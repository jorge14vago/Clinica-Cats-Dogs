<?php
    
    if(empty($_POST["oculto"]) || empty($_POST["fecha"]) || empty($_POST["hora"]) || empty($_POST["nombre_dueno"]) || empty($_POST["nombre_mascota"]) || empty($_POST["telefono"])){
        header('Location: home.php?mensaje=falta');
        exit();
    }

    include_once 'conexion.php';
    $fecha = $_POST["fecha"];
    $hora =$_POST["hora"];
    $nombre_dueno = $_POST["nombre_dueno"];
    $nombre_mascota = $_POST["nombre_mascota"];
    $telefono = $_POST["telefono"];
    

    $sentencia = $bd->prepare("INSERT INTO citas(fecha, hora, nombre_del_dueno, nombre_de_mascota, num_telefono) VALUES(?,?,?,?,?) ");
    $resultado = $sentencia->execute([$fecha,$hora,$nombre_dueno,$nombre_mascota,$telefono]);

    if ($resultado === TRUE) {
        header('Location: home.php?mensaje=registrado');
    } else {
        header('Location: home.php?mensaje=error');
        exit();
    }
    
?>