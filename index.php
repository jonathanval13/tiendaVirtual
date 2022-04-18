
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISURU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
  
</head>
<body>
    <header>
        <a class="header-logo" href="index.php"><img  src="./Img/logo.png" alt=""></a>
        <div class="center">
            <input type="text" id="input-buscar" placeholder="Buscar...">
            <nav>
                <ul class="nav__menu">
                    <li><a href="./productos/productos.php?producto=celulares">Celulares</a> </li>
                    <li><a href="./productos/productos.php?producto=computadores">Computadores</a> </li>
                    <li><a href="./productos/productos.php?producto=electrodomesticos">Electrodomésticos</a> </li>
                    <li class="productos"><a href="#">Productos +</a>
                        <ul class="menu-productos">
                            <li><a href="./productos/productos.php?producto=consolas">Consolas</a></li>
                            <li><a href="./productos/productos.php?producto=electrodomesticos">Electrodomésticos</a> </li>
                            <li><a href="./productos/productos.php?producto=computadores">Computadoras</a> </li>
                            <li><a href="./productos/productos.php?producto=articulosbelleza">Articulos de belleza</a> </li>
                            <li><a href="./productos/productos.php?producto=accsesoriosmascotas">Accesorios para mascotas</a> </li>
                            <li><a href="./productos/productos.php?producto=libros">Libros</a> </li>
                            <li><a href="./productos/productos.php?producto=celulares">Celulares</a></li>
                            <li><a href="./productos/productos.php?producto=juguetes">Juguetes</a> </li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>
        </div>
        <div class="left">
            <div>
             <?php
                    require_once "./controlador.php";

                    session_start();

                    if(isset($_SESSION['name'])){

                       ?> 
                       <p class='name_user'><span><img src="./icons/icon-user.png" alt=""></span> <?php print($_SESSION['name']) ?></p>
                        <a class='logout' href='./archivos/logout.php'>Cerrar sesión</a>
                    <?php
                    }else{
                        print("<button><a href=\"login.php\">Ingresar</a></button>
                        <a href='registro.php'>Regístrarse</a>");
                    }
                ?>
            </div>
            <?php 
                if(isset($_SESSION['name'])){
                    print('<a href="carrito.php"><img src="./icons/carrito.png" alt=""></a>');
                    if(isset($_SESSION['admin'])){
                        print('<a href="admin.php">Admin</a>');
                    }
                    
                }else{
                    print('<a href="login.php?error=2"><img src="./icons/carrito.png" alt=""></a>');
                }
            ?>
          
        </div>        
    </header>
    <main>
        <section class="section__categorias">
            <a href="./productos/productos.php?producto=celulares" class="contenedor-categoria">
                <img src="./Img/celulares.jpg" alt="imagen de celulares">
                <p>Celulares</p>
            </a>
            <div class="contenedor-categoria">
                <img src="./Img/consolas.jpg" alt="imagen de consolas">
                <p>Consolas</p>
            </div>
            <div class="contenedor-categoria">
                <img src="./Img/Electrodomesticos.jpg" alt="">
                <p>Electrodomésticos</p>
            </div>
            <a href="./productos/productos.php?producto=computadores" class="contenedor-categoria">
                <img src="./Img/computadoras.jpg" alt="imagen de computadoras">
                <p>Computadoras</p>
            </a>
            <div class="contenedor-categoria">
                <img src="./Img/belleza.jpg" alt="imagen de articulos de belleza">
                <p>Productos de belleza</p>
            </div>
            <div class="contenedor-categoria">
                <img src="./Img/mascotas.jpg" alt="imagen de mascotas">
                <p>Accesorios para mascotas</p>
            </div>
            <div class="contenedor-categoria">
                <img src="./Img/Libros.jpg" alt="imagen de libros">
                <p>Libros</p>
            </div>
       
            <div class="contenedor-categoria">
                <img src="./Img/juguetes.jpg" alt="imagen de juguetes">
                <p>Juguetes</p>
            </div>
        </section>
        <section class="section__carrusel">
            <h2>Tendencias</h2>
            <div class="contenedor-carrusel">
                <div class="carrusel-item">
                    <img src="./Img/tendencias/celular.jpg" alt="">
                </div>
                <div class="carrusel-item">
                    <img src="./Img/tendencias/computador.jpg" alt="">
                </div>
                <div class="carrusel-item">
                    <img src="./Img/tendencias/computador2.jpg" alt="">
                </div>
                <div class="carrusel-item">
                    <img src="./Img/tendencias/nevera.jpg" alt="">
                </div>
                <div class="carrusel-item">
                    <img src="./Img/tendencias/play.jpg" alt="">
                </div>
                <div class="carrusel-item">
                    <img src="./Img/tendencias/tipi.jpg" alt="">
                </div>
            </div>
            
        </section>
        
    </main>
    <footer>
        <a href="#">Términos de usuario</a>
        <a href="#">Declaración  de privacidad</a>
        <a href="#">Centro de ayuda</a>

    </footer>
</body>
</html>