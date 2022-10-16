<?php 

session_start();
$rol = $_SESSION['rol'];

if(!isset($rol)){

    header('location: soyAdmin.php');
}else{
  if($rol != 1){
    header('location: soyAdmin.php');
  }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="sass/crud.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
  </head>
  <body>
  <div class="container-fluid animate__animated animate__fadeInDown">
  <?php 
            if(isset($_POST['enviar'])){
                $cups = $_POST['cups'];
                $descripcion = $_POST['descripcion'];
                $valor = $_POST['valor'];

                if(empty($cups) || empty($descripcion) || empty($valor)){

                  echo "<script language='JavaScript'>alert('Debe llenar todos los campos'); 
                  location.assign('add.php');</script>";
                  
                }else{
                  include('connetion.php');
                //insertamos los datos con INSERT servicios(cups, descripcion, valor)
                //values($cups,$descripcion,$valor)
                $sql = "INSERT INTO servicios(cups,descripcion,valor) VALUES('".$cups."','".$descripcion."','".$valor."')";

                $resul = mysqli_query($connetion,$sql);
                }

                if($resul){
                    //los datos ingresados a la bd 
                    echo "<script language='JavaScript'>alert('Los datos fueron ingresados correctamente a la bd'); 
                    location.assign('admin.php');</script>";
                }else{
                    //los datos No fueron ingresados a la bd 
                    echo "<script language='JavaScript'>alert('Los datos No fueron ingresados a la bd'); 
                    location.assign('admin.php');</script>";
                }

                mysqli_close($connetion);
            }else{

        ?>
    <br><br><h1>Agregar Nuevo Servicio</h1><br><br>
    <a  href="admin.php" title="Regresar"><i class="fa-solid fa-arrow-left"></i></a><br><br>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><img src="./icons/cups.png" alt="cups" title="cups"></span>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Cups" name="cups">
    <label for="floatingInputGroup1">Cups</label>
  </div>
</div>
<div class="input-group">
  <span class="input-group-text"><img src="./icons/servis.png" alt="servicio" title="servicio"></span>
  <div class="form-floating">
  <textarea class="form-control" id="floatingInputGroup1" aria-label="descripcion" placeholder="Servicio" name="descripcion"></textarea>
    <label for="floatingInputGroup1">Servicio</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><img src="./icons/dolar.png" alt="valor" title="valor"></span>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Valor" name="valor">
    <label for="floatingInputGroup1">Valor</label>
  </div>
</div>
<div class="d-grid gap-2 col-6 mx-auto">
<button type="submit" name="enviar" class="btn btn-outline-info btn-lg">Agregar</button>
</div>

    </form>

<?php }?>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6f4c79b44d.js" crossorigin="anonymous"></script>
  </body>
</html>