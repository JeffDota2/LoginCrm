<?php
// Inicio la seccion
session_start();
 
// Comprobar si el user inicio ya esta logueado si es asi ingresa 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}
 
//  Llamo al archivo config.php
require_once "config.php";
 
// Defino variables para usuario y password e inicio en 0
$username = $password = "";
$username_err = $password_err = "";
 
// obtengo la informacion de formulario y lo obtengo por metodo POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Compruebo que el campo usuario no este vacio
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Compruebo que el campo password no este vacio
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Valido los dos campos y los concateno 
    if(empty($username_err) && empty($password_err)){
        // armo un sql con id y usuario donde el user ahora sea el username
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vinculo las variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Establecer un parametro
            $param_username = $username;
            
            // ejecuto el parametro que cree
            if(mysqli_stmt_execute($stmt)){
                // obtengo el resultado y lo guardo en una variable
                mysqli_stmt_store_result($stmt);
                
                // verifico que el username y password existan 
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // vinculo las variables y navego en el objeto stmat
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Si las variables de usur y password son correctas inicia la secion 
                            session_start();
                            
                            //  Alamaceno los datos en variables de secion 
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // redirijo a la pagina de inicio
                            header("location: welcome.php");
                        } else{
                            // caso contrario si el password es incorrecto
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    //Caso contrario si el usuario es incorrecto
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // cierro la conexion ala db
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>FIT LOGIN</title>
    <lunk rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style type="text/css">
        body{ font-weight:normal;
	                            font-size:15pt; }
        .wrapper{ width: 300px; padding: 20px; }
    
            body{
                background-image: url(img/fondo.jpg);
                background-repeat: no-repeat;
                background-size:100% 100%;
                background-attachment:fixed ;

            }
            .wrapper{ 
                text-align:center;
            }
        }

    </style>
</head>
<form>
<body>

    



    <div class="wrapper">
<CENTER>
        <h2>FYT LOGIN</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><br><br>
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"><br><br>
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group"><br><br>
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>}
            </CENTER>
        </form>
    </div> 
    </form>   
</body>
</html>