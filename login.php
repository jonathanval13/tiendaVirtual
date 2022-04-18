<?php
	require_once "./controlador.php";

	session_start();
	if(isset($_SESSION['auth'])){
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-login.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <header>
        <a class="header-logo" href="index.php"><img  src="./Img/logo.png" alt=""> </a>
    </header>
    <section class="login">
        <section class="login-container">
            <h2>Iniciar sesión</h2>
            <form action="./archivos/login.php"  method="POST" class="login-form">
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error']==1){
                            print("<p class='error'>Datos incorrectos. Vuelve a intentarlo</p>");
                        }else if($_GET['error']==2){
                            print("<p class='error'>Debe iniciar sesion</p>");
                        }
                    }
                ?>
                <input class="input" type="text" name="email" placeholder="Correo">
                <input class="input" type="password" name="pass" placeholder="Contraseña">
                <input class="button" type="submit" value="Iniciar sesión" name="login">
                <div class="login-remember-me">
                    <label >
                        <input type="checkbox" id="cbox1" value="checkbox">
                        Recuérdame
                    </label>
                    <a href="#">Olvidé mi Contraseña</a>
                </div>
            </form>
            <section class="login-social-media">
                    <img src="./icons/icon-google.png" alt="icono google">
                    <p>Inicia sesión con Google</p>  
            </section>
            <p class="login__container--register">¿No tienes ninguna cuenta? <a href="registro.php">Regístrate</a>
            </p>
        </section>
        
    </section>
    <footer>
        <a href="#">Términos de usuario</a>
        <a href="#">Declaración  de privacidad</a>
        <a href="#">Centro de ayuda</a>

    </footer>
</body>
</html>