<?php 
    include('connetion.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="sass/crud.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
  </head>
  <body>
  
  <div class="container-fluid animate__animated animate__fadeInDown">
  <?php 
        if(isset($_POST['enviar'])){
            //si se presiona el boton actualizar
            $id=$_POST['id'];
            $cups=$_POST['cups'];
            $descripcion=$_POST['descripcion'];
            $valor=$_POST['valor'];


            //actualizamos los datos con UPDATE servicios SET cups=$cups,descripcion=$descripcion,valor=$valor WHERE id=$id

            $sql="UPDATE servicios SET cups='".$cups."', descripcion='".$descripcion."', valor='".$valor."' WHERE id='".$id."'";

            $resul =mysqli_query($connetion,$sql);
            
            
            if($resul){
                echo "<script language='JavaScript'>alert('Los datos fueron actualizados correctamente en la bd'); 
                location.assign('admin.php');</script>";
            }else{
                echo "<script language='JavaScript'>alert('Los datos No se actualizaron'); 
                location.assign('admin.php');</script>";
            }

            mysqli_close($connetion);


        }else{
            //si no se ha presionado el boton actualizar
            $id=$_GET['id'];
            $sql="SELECT * FROM servicios WHERE id='".$id."'";
            $resul = mysqli_query($connetion, $sql);

            $row = mysqli_fetch_assoc($resul);
            $cups = $row['cups'];
            $descripcion = $row['descripcion'];
            $valor = $row['valor'];

            mysqli_close($connetion);

    ?>
    <br><br><h1>Editar Servicio</h1><br><br>
    <a href="admin.php" title="Regresar"><i class="fa-solid fa-arrow-left"></i></a><br><br>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">

  <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><img src="./icons/cups.png" alt="cups" title="cups"></span>
  <div class="form-floating">
    <input type="text" class="form-control" value="<?php echo $cups; ?>" id="floatingInputGroup1" placeholder="Cups" name="cups">
    <label for="floatingInputGroup1">Cups</label>
  </div>
</div>
<div class="input-group">
  <span class="input-group-text"><img src="./icons/servis.png" alt="servicio" title="servicio"></span>
  <div class="form-floating">
  <textarea class="form-control" id="floatingInputGroup1" aria-label="descripcion" placeholder="Servicio" name="descripcion"><?php echo $descripcion; ?></textarea>
    <label for="floatingInputGroup1">Servicio</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><img src="./icons/dolar.png" alt="valor" title="valor"></span>
  <div class="form-floating">
    <input type="text" class="form-control" value="<?php echo $valor; ?>" id="floatingInputGroup1" placeholder="Valor" name="valor">
    <label for="floatingInputGroup1">Valor</label>
  </div>
</div>
<div class="d-grid gap-2 col-6 mx-auto">
<button type="submit" name="enviar" class="btn btn-outline-info  btn-lg">Actualizar</button>
</div>

    </form>
<?php 
        }
?>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6f4c79b44d.js" crossorigin="anonymous"></script>
  </body>
</html>