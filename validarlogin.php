<?php
include_once 'conexion2.php';
session_start();

$correo = $_POST['correo'];
$password = $_POST['password'];

$consulta = "SELECT COUNT(*) as contar FROM usuarios WHERE correo = '$correo' && contra = '$password'";
$resultado = mysqli_query($conexion,$consulta);
$array = mysqli_fetch_array($resultado);

if($array['contar'] > 0) {
  $_SESSION['correo'] = $correo;
  header("location: home.php");
}else{
 header("location: index.php?mensaje=error");
}
?>