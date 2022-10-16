<?php 

session_start();


session_destroy();


header('location: soyAdmin.php');
exit();


?>