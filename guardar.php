<?php
$servername = 'localhost';
$database = 'demo';
$username = 'root';
$password = '';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
//recuperar las variables
$cedula=$_POST['cedula'];
$cantidad=$_POST['cantidad'];
$estado=$_POST['estado'];
$observacion=$_POST['observacion'];
$material=$_POST['material'];

    $sql = "INSERT INTO guardar (cedula, cantidad, estado, observacion, material) VALUES ('$cedula', '$cantidad', '$estado', '$observacion', '$material')";
if (mysqli_query($conn, $sql)) {
      echo "Tu contribucion a sido ingresada con exito gracias!!!";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
