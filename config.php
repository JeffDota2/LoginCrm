<?php
//defino los paramtros de mi db  
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
// me conecto a la db por medio de mysqli 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// valido si esta conectado
if($link === false){
    die("ERROR: NO ESTA CONECTADO ALA DB. " . mysqli_connect_error());
}
?>