<?php
  require_once "../../controlador.php";

  session_start();


  $db = db::getDBConnection();
  $Respuesta = $db->getProductoEspecifico( $_GET['producto'], $_GET['detalles']);
  while ($producto = $Respuesta->fetch_assoc()) {
      $id =$producto['id'];
      $modelo = $producto['modelo'];
      $imagen = $producto['rutaimg'];
      $precio = $producto['precio'];
      $camarap = $producto['camp'];
      $so = $producto['so'];
      $ram = $producto['ram'];
      $camaraf = $producto['camf'];
      $procesador = $producto['procesador'];
      $vprocesador = $producto['vprocesador'];
      $nucleos = $producto['nucleos'];
      $pantalla = $producto['pantalla'];
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
    <link rel="stylesheet" href="../detalles.css    ">
    <title><?php print($modelo)?></title>
</head>
<body>
    <header>
        <a class="header-logo" href="../../index.php"><img  src="../../Img/logo.png" alt=""></a>
        <div class="center">
            <input type="text" id="input-buscar" placeholder="Buscar...">
            <nav>
                <ul class="nav__menu">
                    <li><a href="../productos.php?producto=celulares">Celulares</a> </li>
                    <li><a href="../productos.php?producto=computadores">Computadores</a> </li>
                    <li><a href=".,/productos.php?producto=electrodomesticos">Electrodomésticos</a> </li>
                    <li class="productos"><a href="#">Productos +</a>
                        <ul class="menu-productos">
                            <li><a href="../productos.php?producto=consolas">Consolas</a></li>
                            <li><a href="../productos.php?producto=electrodomesticos">Electrodomésticos</a> </li>
                            <li><a href="../productos.php?producto=computadores">Computadoras</a> </li>
                            <li><a href="../productos.php?producto=articulosbelleza">Articulos de belleza</a> </li>
                            <li><a href="../productos.php?producto=accsesoriosmascotas">Accesorios para mascotas</a> </li>
                            <li><a href="../productos.php?producto=libros">Libros</a> </li>
                            <li><a href="../productos.php?producto=celulares">Celulares</a></li>
                            <li><a href="../productos.php?producto=juguetes">Juguetes</a> </li>
                        </ul>
                    </li>
            
                </ul>
            </nav>
        </div>
        <div class="left">
        <div>
            <?php
                    if(isset($_SESSION['name'])){
                       ?> 
                       <p class='name_user'><span><img src="../../icons/icon-user.png" alt=""></span><?php print($_SESSION['name']) ?></p>
                        <a class='logout' href='../../archivos/logout.php'>Cerrar sesión</a>
                    <?php
                    }else{
                    
                        print("<button><a href=\"../../login.php\">Ingresar</a></button>
                        <a href='../../registro.php'>Regístrarse</a>");
                    }
                ?>
            </div>
            <?php 
                if(isset($_SESSION['name'])){
                    print('<a href="../../carrito.php"><img src="../../icons/carrito.png" alt=""></a>');
                    if(isset($_SESSION['admin'])){
                        print('<a href="../../admin.php">Admin</a>');
                    }
                }else{
                    print('<a href="../../login.php?error=2"><img src="../../icons/carrito.png" alt=""></a>');
                }
            ?>
        </div>        
    </header>
    <main>          
        <h1>Celular <?php print($modelo)?></h1>
        <div class="contenedor">
            <section class="section__imagenes">
                <?php print('<img src="../../'.$imagen.'" alt="">')?>                
            </section>
            <section class="section__detalles">
                <h2>$ <?php print($precio)?></h2>
                
               
                    <?php 
                        if(isset($_SESSION['email'])){
                            print('<a href="../../carrito.php" class="button">Comprar ahora</a>');
                        }else{
                            print('<a href="../../login.php?error=2" class="button">Comprar ahora</a>');
                        }
                       
                        print('<form class="add_car" action="../../archivos/addcarrito.php?producto='. $_GET['producto'].'&id='.$id.'"   method="POST">');

                        print('<input class="cantidad" name="cantidad" type="number" min="1" step="1" value="1">');
                        print('<input class="button" type="submit" value="Agregar al carrito" >');
                        print('</form>'); 
                        if(isset($_GET['exito'])){
                            if($_GET['exito']==1){
                                print('<p class="mensaje_exito">Agregado exitosamente</p>');
                            }
                        }
                       
                    ?>
                   
                
                <h3>Especificaciones</h3>
                <section class="detalles-esp">
                    <div>
                        <h3>
                            Cámara Principal
                        </h3>
                        <p><?php print($camarap)?></p>
                    </div>
                    <div>
                        <h3>Sistema Operativo</h3>
                        <p><?php print($so)?></p>
                    </div>
                    <div>
                        <h3>Memoria RAM</h3>
                        <p><?php print($ram)?> GB</p>
                    </div>
                    <div>
                        <h3>Camara Frontal</h3>
                        <p><?php print($camaraf)?></p>
                    </div>
                    <div>
                        <h3>Procesador</h3>
                        <p><?php print($procesador)?></p>
                    </div>
                    <div>
                        <h3>Velocidad del Procesador</h3>
                        <p><?php print($vprocesador)?></p>
                    </div>
                    <div>
                        <h3>Cantidad de Núcleo</h3>
                        <p><?php print($nucleos)?></p>
                    </div>
                    <div>
                        <h3>Tamaño de Pantalla</h3>
                        <p><?php print($pantalla)?> pulgadas </p>
                    </div>
                </section>
            </section>
            
        </div>
        
    </main>
    <footer>
        <a href="#">Términos de usuario</a>
        <a href="#">Declaración  de privacidad</a>
        <a href="#">Centro de ayuda</a>

    </footer>
</body>
</html>