<?php
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = $conexion->query("DELETE FROM persona WHERE idUsuario = $id");    
    
    if($sql==1) {
         // Display success message
        echo "<div class='alert alert-success'>Eliminacion exitosa</div>";
        } else {
        // Display error message
        echo "<div class='alert alert-danger'>Error al eliminar:</div>";
    }
}

?>