<?php
$id = $_GET['id'];

include('connetion.php');

session_start();
$rol = $_SESSION['rol'];

if(!isset($rol)){

    header('location: soyAdmin.php');
}else{
  if($rol != 1){
    header('location: soyAdmin.php');
  }
}


if ($id !== null) {
    //eliminando registros de la base de datos con DELETE FROM servicios WHERE id=$id

    $sql = "DELETE FROM servicios WHERE id='" . $id . "'";
    $resul = mysqli_query($connetion, $sql);


    if ($resul) {
        echo "<script language='JavaScript'>alert('Los datos fueron eliminados correctamente de la bd'); 
            location.assign('admin.php');</script>";
    } else {
        echo "<script language='JavaScript'>alert('Los datos No se eliminaron de la bd'); 
            location.assign('admin.php');</script>";
    }
}else{

    header('location: admin.php');
}


?>