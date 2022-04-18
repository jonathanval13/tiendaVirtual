<?php
    require_once "../controlador.php";
    session_start();
    if(!isset($_SESSION['admin'])){
        header('location: ../login.php?error=2');
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
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
</head>
<body>
<div class="contenedor">
    <section class="section_left">
        <h2>Hola <?php print($_SESSION['name'])?></h2>
        <nav>
            <ul>
                <li><a href="../admin.php">Inicio</a></li>
                <li class="productos">Productos <img src="../icons/flecha-abajo.png" alt="">
                    <ul class="menu_productos">
                        <li><a href="configuracion.php?producto=celulares">Celulares</a></li>
                        <li><a href="configuracion.php?producto=computadores">Computadores</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <div>
        <a href="../index.php">Ver pagina</a>
        <a href="../archivos/logout.php">Cerrar sesión</a>
        </div>
        
    </section>
    <section class="section_principal">
        <div class="botones">
            <?php 
                print('<a href="./config/add'.$_GET['producto'].'.php?producto='.$_GET['producto'].'">Agregar</a>');
            ?>
            
        </div>

        <?php 
            $db = db::getDBConnection();
            $respuesta = $db->getProductos( $_GET['producto']);
            while ($producto = $respuesta->fetch_assoc()) {
                print('<div class="cards">');
                    print('<img src="../'.$producto['rutaimg'].'" alt="">');
                    print('<div class="datos">');
                        print('<p>Referencia: '.$producto['id'].'</p>');
                        print('<p>'.$producto['modelo'].'</p>');
                        print('<p>$<span>'.$producto['precio'].'</span></p>');
                    print('</div>');
                    print('<div class="b-crud">');
                        print('<a href="./config/config'.$_GET['producto'].'.php?producto='.$_GET['producto'].'&id='.$producto['id'].'">Modificar</a>');
                        print('<a href="./crud/delete.php?producto='.$_GET['producto'].'&id='.$producto['id'].'">Eliminar</a>');
                        
                    print('</div>');
                print('</div>');

            }
        ?>
        
    </section>
</div>
</body>
</html>