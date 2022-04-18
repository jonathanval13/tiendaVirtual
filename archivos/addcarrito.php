<?php 

require_once "../controlador.php";
session_start();
if(isset($_SESSION['email'])){
    $db = db::getDBConnection();
    $verificacion = $db -> verificarExistenciaCarrito($_SESSION['email'],$_GET['id'],$_GET['producto']);
    if(mysqli_num_rows($verificacion)>0){
        $consulta = mysqli_fetch_array($verificacion);
        $cantidad1= intval($consulta['cantidad']);
        $cantidad2 = intval($_POST['cantidad']);
        $newCantidad= $cantidad1 + $cantidad2;
        $update = $db -> updateCardCarrito($_SESSION['email'],$_GET['id'],$_GET['producto'],$newCantidad);
        if($update){
            header("Location: ../productos/detalles/d".$_GET['producto'].".php?producto=".$_GET['producto']."&detalles=".$_GET['id']."&exito=1");
        }else{
            header("Location: ../productos/detalles/d".$_GET['producto'].".php?producto=".$_GET['producto']."&detalles=".$_GET['id']."&error=1");
        }

    }else{
        $respuesta =$db->addProductoCarrito($_SESSION['email'],$_GET['id'],$_GET['producto'],$_POST['cantidad']);
        if($respuesta){
            header("Location: ../productos/detalles/d".$_GET['producto'].".php?producto=".$_GET['producto']."&detalles=".$_GET['id']."&exito=1");
        }else{
            header("Location: ../productos/detalles/d".$_GET['producto'].".php?producto=".$_GET['producto']."&detalles=".$_GET['id']."&error=2");
        }
    }
    
    
    
}else{
   /* header("Location: ../productos/detalles/d".$_GET['producto'].".php?producto=".$_GET['producto']."&detalles=".$_GET['id']."&error=1");*/
   header("location: ../login.php?error=2");
}
$db->close();




?>