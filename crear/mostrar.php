<?php 
$inc = include("con_db.php");
if ($inc) {
	$consulta = "SELECT * FROM datos";
	$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id = $row['id'];
	    $nombre = $row['nombre'];
        $email = $row['email'];
        $cedula = $row['cedula'];
        $direccion = $row['direccion'];
        $telefono = $row['telefono'];
	    $fechareg = $row['fecha_reg'];
	    ?>
        <div>
        	<h2><?php echo $nombre; ?></h2>
        	<div>
        		<p>
        			<b>ID: </b> <?php $id ?><br>
                    <b>Email: </b> <?php $email ?><br>
                    <b>cedula: </b> <?php $cedula ?><br>
                    <b>direccion: </b> <?php $direccion ?><br>
                    <b>telefono: </b> <?php $telefono ?><br>
        		    <b>Fecha Registro: </b> <?php $fechareg ?><br>
        		</p>
        	</div>
        </div> 
	    <?php
	    }
	}
}
?>