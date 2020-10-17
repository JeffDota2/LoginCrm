<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
    <form method="post">
    	<h1>Registar Usuario</h1>
    	<input type="text" name="name" placeholder="Nombre completo">
		<input type="email" name="email" placeholder="Email">
		<input type="text" name="cedula" placeholder="cedula">
		<input type="text" name="direccion" placeholder="direccion">
		<input type="text" name="telefono" placeholder="telefono">
		<input type="submit"  name="register"><br>
		<figure>
          <a href="../inicio.html">
            <figcaption>
              <p>Atras</p>
						</figcaption>
				</figure>
		
	</form>

        <?php 
		include("registrar.php");
		
        ?>
</body>
</html>