<?php 

include("con_db.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1) {
	    $name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$cedula = trim($_POST['cedula']);
		$direccion = trim($_POST['direccion']);
		$telefono = trim($_POST['telefono']);
	    $fechareg = date("d/m/y");
	    $consulta = "INSERT INTO datos(nombre, email,cedula,direccion,telefono, fecha_reg) VALUES ('$name','$email','$cedula','$direccion','$telefono','$fechareg')";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

?>