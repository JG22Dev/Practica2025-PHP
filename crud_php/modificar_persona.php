<?php
include "modelo/conexion.php";
$id=$_GET['id'];
    $sql = $conexion->query("SELECT * FROM persona WHERE idUsuario = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Persona</title>
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9bd1f889f0.js" crossorigin="anonymous"></script>
</head>
<body>
    <form class="col-4 p-3 m-auto" method="post">
            <h3 class="text-center alert alert-secondary">Modificar Persona</h3>
            <input type="hidden" name="idUsuario" value="<?= $_GET['id']?>" 
            <?php 
            include "controlador/modificar_persona.php";
            while($datos=$sql->fetch_object()) {
                ?>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value='<?php echo $datos->nombre ?>'>
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" value='<?php echo $datos->apellido ?>'>
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" value='<?php echo $datos->dni ?>'>
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento </label>
            <input type="date" class="form-control" name="fechaNac" value='<?php echo $datos->fechaNac ?>'>
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" name="mail" value='<?php echo $datos->mail ?>'>
            </div>
            <?php    
            }
            ?>
            <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
        </form>    

</body>
</html>