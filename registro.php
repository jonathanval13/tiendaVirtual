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
    <link rel="stylesheet" href="style-registro.css">
    <title>Regístrarse</title>
</head>
<body>
    <header>
         <a class="header-logo" href="index.php"><img  src="./Img/logo.png" alt=""></a>
    </header>
    <section class="registro">
        <section class="registro-container">
            <h2>Crear cuenta</h2>
            <form class="registro-form" action="./archivos/registro.php" method="post">
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error']==1){
                            print("<p class='error'>Correo ya registrado. Intentalo de nuevo</p>");
                        }
                    }
                ?>
                <div class="camp">
                    <input class="input n" name="nombre" type="text" placeholder="Nombre" required>
                    <input class="input n" name="apellido" type="text" placeholder="Apellido" required>
                </div>
                
                <input class="input" name="email" type="email" placeholder="Correo" required>
                <input class="input" name="password" type="password" placeholder="Contraseña" required>
               
                       
                <input type="submit" name="submit" value="Regístrarse" class="button">
            </form>
            <p class="login__container--register">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>
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