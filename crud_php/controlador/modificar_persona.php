<?php

if(!empty($_POST['btnmodificar']) ) {
if(!empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['dni']) and !empty($_POST['fechaNac']) and !empty($_POST['mail'])) {
        $id = $_POST['idUsuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fechaNac = $_POST['fechaNac'];
        $mail = $_POST['mail'];

        $sql = $conexion->query("UPDATE persona SET nombre='$nombre', apellido='$apellido', dni=$dni, fechaNac='$fechaNac', mail='$mail' WHERE idUsuario = $id");
        
        if($sql==1) {
            header("Location:index.php");
            /* echo "<div class='alert alert-success'>Modificacion exitosa</div>";
         */} else {
            // Display error message        
            echo "<div class='alert alert-danger'>Error al modificar: " . $conexion->error . "</div>";
        }
    } else {
        echo "<div class= 'alert alert-warning'>Debe completar los campos vacios</div>";
        
    }
}
?>