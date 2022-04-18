<?php
  require_once "../controlador.php";

  session_start();

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
    <link rel="stylesheet" href="./productos.css">
    <title><?php print($_GET['producto'])?></title>
</head>
<body>
    <header>
        <a class="header-logo" href="../index.php"><img  src="../Img/logo.png" alt=""></a>
        <div class="center">
            <input type="text" id="input-buscar" placeholder="Buscar...">
            <nav>
                <ul class="nav__menu">
                    <li><a href="productos.php?producto=celulares">Celulares</a> </li>
                    <li><a href="productos.php?producto=computadores">Computadores</a> </li>
                    <li><a href="productos.php?producto=electrodomesticos">Electrodomésticos</a> </li>
                    <li class="productos"><a href="#">Productos +</a>
                        <ul class="menu-productos">
                            <li><a href="productos.php?producto=consolas">Consolas</a></li>
                            <li><a href="productos.php?producto=electrodomesticos">Electrodomésticos</a> </li>
                            <li><a href="productos.php?producto=computadores">Computadoras</a> </li>
                            <li><a href="productos.php?producto=articulosbelleza">Articulos de belleza</a> </li>
                            <li><a href="productos.php?producto=accsesoriosmascotas">Accesorios para mascotas</a> </li>
                            <li><a href="productos.php?producto=libros">Libros</a> </li>
                            <li><a href="productos.php?producto=celulares">Celulares</a></li>
                            <li><a href="productos.php?producto=juguetes">Juguetes</a> </li>
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
                       <p class='name_user'><span><img src="../icons/icon-user.png" alt=""></span><?php print($_SESSION['name']) ?></p>
                        <a class='logout' href='../archivos/logout.php'>Cerrar sesión</a>
                    <?php
                    }else{
                    
                        print("<button><a href=\"../login.php\">Ingresar</a></button>
                        <a href='../registro.php'>Regístrarse</a>");
                    }
                ?>
            </div>
            <?php 
                if(isset($_SESSION['name'])){
                    print('<a href="../carrito.php"><img src="../icons/carrito.png" alt=""></a>');
                    if(isset($_SESSION['admin'])){
                        print('<a href="../admin.php">Admin</a>');
                    }
                }else{
                    print('<a href="../login.php?error=2"><img src="../icons/carrito.png" alt=""></a>');
                }
            ?>
        </div>        
    </header>
    <main>
        <!--        
        <section class="section__opciones">
            <nav>
                <ul class="lateral">
                    <li>
                        <ul>
                            <li> <input type="checkbox"> Apple</li>
                            <li> <input type="checkbox"> Motorola</li>
                            <li> <input type="checkbox"> Samsumg</li>
                            <li> <input type="checkbox"> Xiaomi</li>
                        </ul>
                    </li>
                    <li>                     
                        <ul>
                            <li> <input type="checkbox"> 32 GB</li>
                            <li> <input type="checkbox"> 64 GB</li>
                            <li> <input type="checkbox"> 128 GB</li>
                            <li> <input type="checkbox"> 256 GB</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li> <input type="checkbox"> Android</li>
                            <li> <input type="checkbox"> IOS</li>
                        </ul>
                    </li>
     
                </ul>
            </nav>
        </section>
            -->
        <section class="section__productos">
             <?php
					$db = db::getDBConnection();
					$Respuesta = $db->getProductos( $_GET['producto']);
					while ($producto = $Respuesta->fetch_assoc()) {

                        print('<div class="contenedor-producto">');
						print('<a href="detalles/d'.$_GET['producto'].'.php?producto='.$_GET['producto'].'&detalles='.$producto['id'].'"><img src="../'.$producto['rutaimg'].'" alt=""></a>');
							print('<div class="detalles-producto">');
                                print("<p>".$producto['modelo']."</p>");
                                print("<h3>$ ".$producto['precio']."</h3>");
                                print('<button><a href="detalles/d'.$_GET['producto'].'.php?producto='.$_GET['producto'].'&detalles='.$producto['id'].'"> Ver producto</a></button>');
                            print('</div>');
                        print('</div>') ;   
					}
				?>  
       
    
        
             <!-- 
    
            <div class="contenedor-producto">
                <img src="../../Img/celulares/celular6.jfif" alt="">
                <div class="detalles-producto">
                    <p>Xiaomi Poco X3 Pro 256GB</p>
                    <h3>$ 1.149.900</h3>
                    <button><a href=""> Ver producto</a></button>
                </div>

                -->
        </section>
    </main>
    <footer>
        <a href="#">Términos de usuario</a>
        <a href="#">Declaración  de privacidad</a>
        <a href="#">Centro de ayuda</a>

    </footer>
</body>
</html>