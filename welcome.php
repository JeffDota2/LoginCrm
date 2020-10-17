<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="welcome.css">
        <meta charset="UTF-8">
        <title>Hola, Bienvenido</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style type="text/css">
            body{ font: 14px sans-serif; text-align: center; }
        </style>
    </head>
    <body>
        <div class="page-header">
            <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido.</h1>
            
        </div>
        <p>
            <a href="reset-password.php" class="btn btn-warning">Cambia tu contraseña</a>
            <a href="logout.php" class="btn btn-danger">Cierra la sesión</a>
        </p>

        <form method="post" action="guardar.php">

            <select name="material">

                <option>BOTELLAS</option>

                <option>BOTELLAS DE VIDRIO</option>

                <option >PAPEL LIMPIO</option>
                
                <option>REVISTAS</option>

                <option>BATERIAS</option>

                <option selected>BOLSAS DE PLASTICO</option>

            </select>
            <input type="number" placeholder="Numero de Cedula" id="cedula" name="cedula" required>
            <input type="number" placeholder="Cantidad"id="cantidad" name="cantidad" required>
            <input type="text" placeholder="Estado" id="estado" name="estado" required>
            <input type="text" placeholder="Observaciones" id="observacion" name="observacion" required>
            <input type="submit" value="AYUDAR AL PLANETA" />

        </form>
    </body>
</html>