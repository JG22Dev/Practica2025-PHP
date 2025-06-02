
<?php
//Carrito de productos
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PRODUCTOS</h1>
    <!-- links y botones para empezar el carrito -->
    <a href="?alta"><button>Altas Productos</button></a>
    <a href="?mostrar"><button>Mostrar Productos</button></a>
    <!-- <a href="?borrar"><button>Borrar</button></a> -->
    <a href="?modificar"><button>Modificar Productos</button></a>
    <a href="?salir"><button>Salir</button></a>
<?php
    // si existe el boton de alta se trae por get y se carga el productos
    if(isset($_GET['alta'])){
        ?>
        <h2>Alta de Producto</h2>
        <form method="POST">
            <input type="hidden" name="altaP">
            <label for="producto">Nombre del Producto</label>
            <input type="text" name="producto" required maxlength="40" placeholder="Ingrese nombre del producto">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" required max=9999 placeholder="Ingrese la cantidad">
            <label for="precio">Precio</label>
            <input type="number" name="precio" step="0.05" required max=9999 placeholder="Ingrese precio aqui">
            <input type="submit" value="Cargar producto">
        </form>
        <?php
        
    };
    //CREO VARIABLES DE SESSION CON ISSET
    //si existe altap (form anterior) entonces crear variables de sesion
    if(isset($_POST['altaP'])){
        $_SESSION['producto']=$_POST['producto'];
        $_SESSION['cantidad']=$_POST['cantidad'];
        $_SESSION['precio']=$_POST['precio'];
        echo "Tu producto ".$_SESSION['producto']. " ha sido cargado correctamente";
    }
    //si existe a traves de GET mostrar, entonces mostrar los productos.  
    if(isset($_GET['mostrar'])){
        ?>
        <h2>Mostrar Productos</h2>
        <?php
        // y si existe el producto mostrarlo
        if(isset($_SESSION['producto'])){
            echo "<br>Producto: ".$_SESSION['producto'];
            echo "<br>Cantidad: ".$_SESSION['cantidad'];
            echo "<br>Precio: ".$_SESSION['precio'];
        } else{ //sino avisa que no hay nada cargado
            echo "<h4>No hay productos cargados</h4>";
        }
    }
    //si existe por post modificar entonces procedemos a modificar el producto
    if(isset($_GET['modificar'])){
        // y si existe el producto mostrarlo
        if(isset($_SESSION['producto'])){
            ?>
            <h2>Modificar Producto</h2>
            <form method="POST" action="?">
                <input type="hidden" name="modificarP">
                <label for="producto">Nombre del Producto</label>
                <input type="text" name="producto" value="<?php echo $_SESSION['producto'] ?>" required maxlength="40" placeholder="Ingrese nombre del producto">
                <label for="cantidad">Cantidad</label>
                <input type="number" value="<?php echo $_SESSION['cantidad'] ?>" name="cantidad" required max=9999 placeholder="Ingrese la cantidad">
                <label for="precio">Precio</label>
                <input type="number" value="<?php echo $_SESSION['precio'] ?>" name="precio" step="0.05" required max=9999 placeholder="Ingrese precio aqui">
                <input type="submit" value="Cargar producto">
            </form>

            <?php
        } else{ //sino avisa que no hay nada cargado
            echo "<h4>No hay productos para modificar</h4>";
        }
    }
    //
    if(isset($_POST['modificarP'])){
        $_SESSION['producto']=$_POST['producto'];
        $_SESSION['cantidad']=$_POST['cantidad'];
        $_SESSION['precio']=$_POST['precio'];
        echo "Tu producto ".$_SESSION['producto']. "  ha sido modificado correctamente";
    
    }
    //si existe boton Salir entonces procede a eliminar las variables de sesion salir y destruirlas
    if(isset($_GET['salir'])){
        session_unset();
        session_destroy();
        echo "<h4>Ha salido con Exito</h4>";
    }
        ?>
</body>
</html>


