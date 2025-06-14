<?php

if(!empty($_POST['btnregistrar'])) {
    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['fechaNac']) && !empty($_POST['mail'])) {   
        /* echo '<div class="alert alert-success">Registro exitoso</div>'; */
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fechaNac = $_POST['fechaNac'];
        $mail = $_POST['mail'];

        $sql= $conexion->query("INSERT INTO persona (nombre, apellido, dni, fechaNac, mail) VALUES ('$nombre', '$apellido', '$dni', '$fechaNac', '$mail')");

        if($sql==1) {
            echo '<div class="alert alert-success">Registro exitoso</div>';
        } else {
            echo '<div class="alert alert-danger">Error al Registar</div>' . $conexion->error;
        }

    }else {
        echo '<div class="alert alert-warning">Algunos de los campos estan vacios</div>';
    }
}


?>