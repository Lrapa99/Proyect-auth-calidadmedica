<?php

$usuario = $_POST['username'];
$contraseña = $_POST['password'];

session_start();

$conexion = mysqli_connect("localhost", "root", "", "rol");

$consulta = "SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas !== null && $filas['id_cargo'] == 1) { //administrador
    include("index.php");
    echo "<script language='JavaScript'>; $('.alert').css('display','block');</script>";
    ?>
    <?php 
} else
if ($filas !== null && $filas['id_cargo'] == 2) { //cliente
    $_SESSION['usuario'] = $usuario;
    $rol = $filas['id_cargo'];
    $_SESSION['rol'] = $rol;
    header("location:cliente.php");  

} else {
?>
    <?php
    include("index.php");
    echo "<script language='JavaScript'>; $('.alert').css('display','block');</script>";
    ?>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);