<?php 
    if(!isset($_GET['numero_empleado'])){
        header('Location: home.php?mensaje=error');
        exit();
    }

    include 'conexion.php';
    $numero_empleado = $_GET['numero_empleado'];

    $sentencia = $bd->prepare("DELETE FROM usuarios where numero_empleado = ?;");
    $resultado = $sentencia->execute([$numero_empleado]);

    if ($resultado === TRUE) {
        header('Location: usuarios.php?mensaje=eliminado');
    } else {
        header('Location: usuarios.php?mensaje=error');
    }
?>