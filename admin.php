<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin servis</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('Realmente desea eliminar los datos?');
        }
    </script>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sass/crud.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<div class="container-fluid animate__animated animate__fadeInLeft">
<?php 

include('connetion.php');
//seleccionar datos de la base de datos con SELECT * FROM servicios...
$sql= 'SELECT * FROM servicios';
$resul = mysqli_query($connetion, $sql);
?>
<br><br><h1>Administrar Servicios</h1><br><br>
<a href="add.php" title="Agregar Servicio" class="btnAdd"><i class="fa-solid fa-circle-plus text-warning"></i></a><br><br>

<table class="table table-hover table-bordered ">
<thead class="table-primary">
<tr>
  <th scope="col">Id</th>
  <th scope="col">Cups</th>
  <th scope="col">Descripcion</th>
  <th scope="col">Valor</th>
  <th scope="col">Acciones</th>
</tr>
</thead>
<tbody class="table-group-divider">

<?php 
while($rows = mysqli_fetch_assoc($resul)){


?>
<tr>
  <th scope="row"><?php echo $rows['id']?></th>
  <td><?php echo $rows['cups']?></td>
  <td><?php echo $rows['descripcion']?></td>
  <td>$<?php echo number_format($rows['valor'])?></td>
  <td class="acciones"><?php echo "<a class='btnActions' href='edit.php?id=".$rows['id']."' title='Editar'><i class='fa-solid fa-pen-to-square text-info'></i></a>";?><?php echo "<a class='btnActions' href='delete.php?id=".$rows['id']."' title='Eliminar' onclick='return confirmar()'><i class='fa-solid fa-trash text-danger'></i></a>";?> </td>
</tr>


<?php }?>
</tbody>
</table>

<?php 
mysqli_close($connetion);
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/6f4c79b44d.js" crossorigin="anonymous"></script>
</body>
</html>