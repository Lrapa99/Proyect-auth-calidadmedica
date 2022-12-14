<?php
error_reporting(0);
session_start();

if (isset($_SESSION['rol'])) {
  switch ($_SESSION['rol']) {
    case 1:
      header('location: admin.php');
      break;
    case 2:
      header('location: cliente.php');
      break;

    default:
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="sass/crud.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="body__login">
  <div class="container-fluid shadow p-3 bg-body rounded-end animate__animated animate__fadeInDown" id="all_content">
    <div class="logo">
      <h1>Lra<span class="text-primary">pa.</span></h1><a id="btn_admin" class="btn btn-warning" href="soyAdmin.php" role="button">Soy Administrador</a>
    </div>
    <div id="content__login">
      <div class="container-fluid " id="content__img__login">
        <h2 class="bienvenido animate__animated animate__backInLeft">BIENVENIDO!</h2>
        <img src="./IMG/newLogin.svg" alt="img_login" title="img_login" id="img__login">
      </div>
      <div class="container-fluid content__form">
        <form action="validar.php" method="post" id="form__login">
        <div class="alert alert-danger  animate__animated animate__shakeY" role="alert">
        Error de Autenticacion!
        </div>
          <h3 class="animate__animated animate__backInLeft">Iniciar Sesion</h3>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Usuario" name="username">
            <label for="floatingInput">Usuario</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Contrase??a" name="password">
            <label for="floatingPassword">Contrase??a</label>
          </div>
          <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary btn-lg">Ingresar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="area">
    <ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</body>

</html>