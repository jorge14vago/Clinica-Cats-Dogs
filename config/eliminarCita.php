<?php 
    if(!isset($_GET['num_de_cita'])){
        header('Location: ../home.php?mensaje=error');
        exit();
    }

    include 'conexion.php';
    $num_de_cita = $_GET['num_de_cita'];

    $sentencia = $bd->prepare("DELETE FROM citas where num_de_cita = ?;");
    $resultado = $sentencia->execute([$num_de_cita]);

    if ($resultado === TRUE) {
        header('Location: ../home.php?mensaje=eliminado');
    } else {
        header('Location: ../home.php?mensaje=error');
    }
    
?>