<?php
	require_once "../../controlador.php";

	session_start();

	$db = db::getDBConnection();

	if (isset($_GET['id'])) {
		$respuesta = $db->deleteProducto($_GET['producto'],$_GET['id']);
	}
	
	header("Location: ../configuracion.php?producto=".$_GET['producto']."");

?>
