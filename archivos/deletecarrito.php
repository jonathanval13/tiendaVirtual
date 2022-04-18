<?php 
require_once "../controlador.php";
session_start();
$db = db::getDBConnection();
$delete = $db -> deleteCarrito($_SESSION['email'],$_GET['id'],$_GET['producto']);
if($delete){
    header('location: ../carrito.php');
}
$db->close();
?>