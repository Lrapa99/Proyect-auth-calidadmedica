<?php

$usuario = $_POST['username'];
$contraseña = $_POST['password'];
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "rol");

$consulta = "SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas !== null && $filas['id_cargo'] == 1) { //administrador
    header("location:admin.php");
   
    
} else
if ($filas !== null && $filas['id_cargo'] == 2) { //cliente
    include("soyAdmin.php");
    ?>
    <?php ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php 
} else {
?>
    <?php
    include("soyAdmin.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
