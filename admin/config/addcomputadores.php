<?php
    require_once "../../controlador.php";
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
    <link rel="stylesheet" href="../admin.css">
    <title>Document</title>
    
</head>
<body>
<div class="contenedor">
    <section class="section_left">
        <h2>Hola <?php print($_SESSION['name'])?></h2>
        <nav>
            <ul>
                <li><a href="">Inicio</a></li>
                <li class="productos">Productos <img src="../../icons/flecha-abajo.png" alt="">
                    <ul class="menu_productos">
                        <li><a href="../configuracion.php?producto=celulares">Celulares</a></li>
                        <li><a href="../configuracion.php?producto=computadores">Computadores</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div>
        <a href="../../index.php">Ver pagina</a>
        <a href="../../archivos/logout.php">Cerrar sesión</a>
        </div>
    </section>
    <section class="section_principal">
        <?php print('<form action="../crud/create.php?producto='.$_GET['producto'].'" enctype="multipart/form-data" method="POST">') ?>
        
            <table class="tabla-cel">
                <tr>
                    <td>Modelo</td>
                    <td><input type="text" name="modelo" required></td>
                    <td>Precio</td>
                    <td><input type="number" name="precio" required></td>
                </tr>
                <tr>
                    <td>Tarjeta grafica</td>
                    <td><input type="text" name="tarjetagrafica" required></td>
                    <td>Disco duro</td>
                    <td><input type="text" name="discoduro" required></td>
                </tr>                 
                
                <tr>
                    <td>Sistemas operativo</td>
                    <td><input type="text" name="so" required></td>
                   <td>RAM</td>
                    <td><input type="text" name="ram"required ></td>
                </tr>
                   
                <tr>
                    <td>Procesador</td>
                    <td> <input type="text" name="procesador" required></td>
                    <td>Tamaño pantalla</td>
                    <td><input type="text"name="pantalla" required></td>
               </tr>
    
                <tr>
                
                    <td>Referencia</td>
                    <td><input type="text" name="id" required></td>
                </tr>
                <tr>
                    <td>Imagen</td>
                    <td><input type="file" name="rutaimg" required></td>
                </tr>
                
            </table>
            <input class="b_actualizar" type="submit" value="Agregar" required>      
            <?php 
                if(isset($_GET['exito'])){
                    print('<p class="msn_exito">Producto agregado correctamente</p>');
                }
            ?>      
        </form>
    </section>
</div>
</body>
</html>