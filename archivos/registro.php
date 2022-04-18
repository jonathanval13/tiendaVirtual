<?php
require_once "../controlador.php";

$db = db::getDBConnection();
$Respuesta = $db->setUsuario($_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['password'],0,0);


if ($Respuesta){
	session_start();
    $_SESSION['name']= ucfirst($_POST['nombre']);
    $_SESSION['email']=$_POST['email'];
    $_SESSION['auth'] = true;
    $Respuesta2 = $db->obtenerEstadisticas(1);
    $usuario=mysqli_fetch_array($Respuesta2);
    $usuarios = intval($usuario['usuarios'])+ 1;
    $con=   $db->updateEstadisticas(1, $usuarios,$usuario['ventas'],$usuario['totalventas']);
    header("Location: ../index.php");
    
}else{
	header("Location: ../registro.php?error=1");
}
$db->close();

?>