<?php
    require_once "./controlador.php";
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
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-carrito.css">
    <title>Carrito de compras</title>
    
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
        <section class="cards_productos">
            <?php 
                
                $db = db::getDBConnection();
                $Respuesta = $db->obtenerCarrito($_SESSION['email']);
                if(mysqli_num_rows($Respuesta)>0){
                    while ($productos = $Respuesta->fetch_assoc()) {
                        $producto= $db-> getProductoEspecifico($productos['categoria'],$productos['referencia']);
                        $producto = mysqli_fetch_array($producto);
                        print('<div class="cards">');
                            print('<img src="./'.$producto['rutaimg'].'" alt="">');
                            print('<div class="cards_center">');
                                print('<p class="nombre_p">'.$producto['modelo'].'</p>');
                                print('<p>$<span class="precio_p">'.$producto['precio'].'</span></p>');
                            print('</div>');
                            print('<div class="cards_left">');
                            print('<input class="cantidad_p" type="number" min="1" step="1" value="'.$productos['cantidad'].'">');    
                            print(' <a href="./productos/detalles/d'.$productos['categoria'].'.php?producto='.$productos['categoria'].'&detalles='.$productos['referencia'].'">Ver producto</a>');
                            print('<a href="./archivos/deletecarrito.php?producto='.$productos['categoria'].'&id='.$productos['referencia'].'">Eliminar</a>');
                               
                            print('</div>');
                        print('</div>');
                    }
                }else{
                    ?>
                    <p class="mensaje_car_vacio">Carrito vacio</p>
                    <?php
                }
                
                   
            ?>
 
        </section>
        <section class="section_comprar">
            <table>
                <tr>
                    <td>Productos</td>
                    <td id="cant_p"></td>
                </tr>
                <tr>
                    <td>Costos de envío</td>
                    <td id="costos_envio"></td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td id="subtotal"></td>
                </tr>
                <tr>
                    <td class="total_p">Total</td>
                    <td id="total"></td>
                </tr>
            </table>
           
            <?php 
                print('<a  href="archivos/comprar.php">Finalizar compra</a>');
        
            if(isset($_GET['exito'])){
                print('<p class="msn_exito">Compra realizada</p>');
            }
                
            ?>

        </section>
    </main>
    <script src="Js/javascript.js"></script>            
</body>
</html>