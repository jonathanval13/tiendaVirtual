<?php
    require_once "./controlador.php";
    session_start();
    if(!isset($_SESSION['admin'])){
        header('location: ./login.php?error=2');
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
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./admin/admin.css">
    <title>Admin</title>
</head>
<body>
<div class="contenedor">
    <section class="section_left">
        <h2>Hola <?php print($_SESSION['name'])?></h2>
        <nav>
            <ul>
                <li><a href="">Inicio</a></li>
                <li class="productos">Productos <img src="./icons/flecha-abajo.png" alt="">
                    <ul class="menu_productos">
                        <li><a href="./admin/configuracion.php?producto=celulares">Celulares</a></li>
                        <li><a href="./admin/configuracion.php?producto=computadores">Computadores</a></li>
                    </ul>
                </li>

            </ul>
           
        </nav>
        <div>
        <a href="./index.php">Ver pagina</a>
        <a href="./archivos/logout.php">Cerrar sesión</a>
        </div>
        
       
    </section>

    <section class="section_principal--inicio">
        
        <?php 
            $db = db::getDBConnection();
            $Respuesta = $db->obtenerEstadisticas(1);
            $estadisticas = mysqli_fetch_array($Respuesta);
            $usuarios = $estadisticas['usuarios'];
            $ventas = $estadisticas['ventas'];
            $totalventas = $estadisticas['totalventas'];

        ?>

        <h1>Estadísticas</h1>
        <div>
            <div class="caja">
                <h2>Número de usuarios</h2> 
                <p><?php print($usuarios)?></p>
            </div>
            <div class="caja">
                <h2>Número de ventas</h2>
                <p><?php print($ventas)?></p>
            </div>
            <div class="caja">
                <h2>Total ventas</h2>
                <p>$<?php print($totalventas)?></p>
            </div>
        </div>
       
    </section>
</div>
</body>
</html>