<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title>Document</title>
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9bd1f889f0.js" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        function eliminar() {
            var respuesta = confirm("¿Seguro que desea eliminar este registro?");
            return respuesta;
        }
    </script>
    
    <h1 class="text-center p-3">Registro de Personas CRUD</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_persona.php";
    ?>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="post">
            <h3 class="text-center text-secondary">Registro de Persona</h3>
            <?php
            include "controlador/registro_persona.php";
            ?>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento </label>
            <input type="date" class="form-control" name="fechaNac">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" name="mail">
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM persona");
                    while ($datos = $sql->fetch_object()) {
                    ?>
                    <tr>
                        <td><?= $datos->idUsuario ?></td>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos-> apellido ?></td>
                        <td><?= $datos-> dni ?></td>
                        <td><?= $datos-> fechaNac ?></td>
                        <td><?= $datos-> mail ?></td>
                        <td>
                            <a href=modificar_persona.php?id=<?= $datos->idUsuario?> class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return eliminar()" href=index.php?id=<?= $datos->idUsuario?> class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
