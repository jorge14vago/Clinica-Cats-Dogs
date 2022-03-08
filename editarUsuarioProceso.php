<?php
  if(empty($_POST["numero_empleado"]) || empty($_POST["txtNombre"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtTipo"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtPassword"])){
        header('Location: usuarios.php?mensaje=falta');
        exit();
    }
    print_r($_POST);
    if(!isset($_POST['numero_empleado'])){
        header('Location: usuarios.php?mensaje=error');
    }

    include 'conexion.php';
    $numero_empleado = $_POST["numero_empleado"];
    $nombre = $_POST["txtNombre"];
    $telefono =$_POST["txtTelefono"];
    $direccion = $_POST["txtDireccion"];
    $tipo = $_POST["txtTipo"];
    $correo = $_POST["txtCorreo"];
    $contra = $_POST["txtPassword"];

    $sentencia = $bd->prepare("UPDATE usuarios SET nombre = ?, numero_telefono= ?, direccion = ?,  tipo = ?, correo= ?, contra = ? where numero_empleado = ?;");
    $resultado = $sentencia->execute([$nombre,$telefono,$direccion,$tipo,$correo,$contra,$numero_empleado]);

    if ($resultado === TRUE) {
        header('Location: usuarios.php?mensaje=editado');
    } else {
        header('Location: usuarios.php?mensaje=error');
        exit();
    }
    
?>