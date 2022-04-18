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
        <?php print('<form action="../crud/update.php?producto='.$_GET['producto'].'&id='.$_GET['id'].'" enctype="multipart/form-data" method="POST">') ?>
        
            <?php 
               
                $db = db::getDBConnection();
                $respuesta = $db->getProductoEspecifico($_GET['producto'], $_GET['id']);
                $producto=mysqli_fetch_array($respuesta);            

            ?>
            <table class="tabla-cel">
                <tr>
                    <td>Modelo</td>
                    <td><input type="text" name="modelo" value="<?php print($producto['modelo']) ?>"></td>
                    <td>Precio</td>
                    <td><input type="number" name="precio" value="<?php print($producto['precio']) ?>"></td>
                </tr>
                <tr>
                    <td>Camara principal</td>
                    <td><input type="text" name="camarap" value="<?php print($producto['camp']) ?>"></td>
                    <td>Camara frontal</td>
                    <td><input type="text" name="camaraf" value="<?php print($producto['camf']) ?>"></td>
                </tr>                 
                
                <tr>
                    <td>Sistemas operativo</td>
                    <td><input type="text" name="so" value="<?php print($producto['so']) ?>"></td>
                   <td>RAM</td>
                    <td><input type="number" name="ram" value="<?php print($producto['ram']) ?>"></td>
                </tr>
                   
                <tr>
                    <td>Procesador</td>
                    <td> <input type="text" name="procesador" value="<?php print($producto['procesador']) ?>"></td>
                    <td>Velocidad procesador</td>
                    <td><input type="text" name="vprocesador" value="<?php print($producto['vprocesador']) ?>"></td>
               </tr>
        
                <tr> 
                    <td>Nucleos</td>
                    <td><input type="text" name="nucleos" value="<?php print($producto['nucleos']) ?>"></td>
                    <td>Tamaño pantalla</td>
                    <td><input type="text" name="pantalla" value="<?php print($producto['pantalla']) ?>"></td>
                
                </tr>
    
                <tr>
                    <td>Almacenamiento</td>
                    <td><input type="text" name="almacenamiento" value="<?php print($producto['almacenamiento']) ?>"></td>
                </tr>
                <tr>
                    <td>Imagen</td>
                    <td><input type="file" name="rutaimg"></td>
                </tr>
                
            </table>
            <input class="b_actualizar" type="submit" value="Actualizar">      
            <?php 
                if(isset($_GET['exito'])){
                    print('<p class="msn_exito">Datos actualizados correctamente</p>');
                }
            ?>      
        </form>
    </section>
</div>
</body>
</html>