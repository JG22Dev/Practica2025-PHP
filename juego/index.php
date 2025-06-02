<?php
/*Crear un programa que permita el ingreso de un numero, el cual,
debamos adivinar en menos de tres intentos, tener en cuenta que
es un numero random del 1 al 10, sino se adivina el programa debe tirar
un mensale de "PERDISTE", sino (si se adivino en menos de tres intentos) 
"GANASTE"*/


//inicia la sesion o continuarla
session_start();

if(!isset($_SESSION['numero'])){
    $_SESSION['numero']=rand(1,10);
    $_SESSION['intentos']=3;
}

    echo  $_SESSION['numero'];
    echo "<br>". $_SESSION['intentos'];
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" href="style.css">
    <title>Juego en PHP</title>
</head>
<body>
    <h1>Adivina el numero</h1>
    <p>Ingrese su numero del 1 al 10</p>

    <form method="POST">
        <input type="number" id="num" name="num" placeholder="Ingrese el número aquí" required min=1 max=10>
        <input type="submit" value="adivinar">
    </form>
    
    
    <?php

    if(isset($_POST['num'])){
        
        $num = $_POST['num'];
        /* echo $num; */
        if($_SESSION['intentos']>0){
            if($num == $_SESSION['numero']){
                echo "<h3>Ganaste adivinaste el numero capo</h3>";
                session_destroy();
            } else{
                $_SESSION['intentos'] -=1;

                echo $_SESSION['intentos'];

                if($_SESSION['intentos']== 0){
                    echo "<h3>Perdiste flaco</h3>";
                    session_destroy();
                } else{
                    echo "<h3>no adivinaste segui intentando</h3>";
                }
            }
        }


    } 
    
    ?>

</body>
</html>


