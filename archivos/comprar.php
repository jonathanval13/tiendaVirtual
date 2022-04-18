<?php
require_once "../controlador.php";
session_start();

if(isset($_SESSION['email'])){

    $db = db::getDBConnection();
    $Respuesta1 = $db->obtenerCarrito($_SESSION['email']);
    $Respuesta2 = $db->obtenerUsuario($_SESSION['email']);
    $Respuesta3 = $db->obtenerEstadisticas(1);
    $cantidad_actual=0;
    $total_actual=0;
    $filas = mysqli_num_rows($Respuesta1);
    if($filas > 0){
        while($i=mysqli_fetch_array($Respuesta1)){
            $producto=$db->getProductoEspecifico($i['categoria'],$i['referencia']);
            $producto=mysqli_fetch_array($producto);
            $total_actual+=intval($i['cantidad'])*intval($producto['precio']);
            $cantidad_actual += intval($i['cantidad']);
        }        
       
    }
    $usuario=mysqli_fetch_array($Respuesta2);
    $cantidad_comprar_nueva= $cantidad_actual + intval($usuario['nventas']);
    $usuario1=$db->setComprasUsuario($_SESSION['email'],$cantidad_comprar_nueva);
    
    $estadisticas=mysqli_fetch_array($Respuesta3);
    $ventas = intval($estadisticas['ventas'])+$cantidad_actual;
    $totalventas = intval($estadisticas['totalventas'])+ $total_actual;
    $con=   $db->updateEstadisticas(1, $estadisticas['usuarios'],$ventas,$totalventas);
    if($con){
        header("location: ../carrito.php?exito=1");
    }
   
    $db->close();
}else{
    header("location: ../login.php?error=2");
}





?>