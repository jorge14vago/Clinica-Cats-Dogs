<?php
    
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtTipo"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtPassword"])){
        header('Location: ../usuarios.php?mensaje=falta');
        exit();
    }

    include_once 'conexion.php';
    $nombre = $_POST["txtNombre"];
    $telefono =$_POST["txtTelefono"];
    $direccion = $_POST["txtDireccion"];
    $tipo = $_POST["txtTipo"];
    $correo = $_POST["txtCorreo"];
    $contra = $_POST["txtPassword"];
    

    $sentencia = $bd->prepare("INSERT INTO usuarios(nombre, numero_telefono, direccion, tipo,correo, contra) VALUES(?,?,?,?,?,?) ");
    $resultado = $sentencia->execute([$nombre,$telefono,$direccion,$tipo,$correo,$contra]);

    if ($resultado === TRUE) {
        header('Location: ../usuarios.php?mensaje=registrado');
    } else {
        header('Location: ../usuarios.php?mensaje=error');
        exit();
    }
    
?>