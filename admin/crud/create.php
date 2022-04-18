<?php
	require_once "../../controlador.php";

	session_start();

	$origen  = $_FILES['rutaimg']['tmp_name'];
	$destino = "Img/".$_GET['producto']."/".$_FILES['rutaimg']['name'];
	move_uploaded_file($origen, "../../".$destino);

	$db = db::getDBConnection();

	if($_GET['producto']=='celulares'){
		
		$Respuesta = $db->createCelular($_POST['id'], $_POST['modelo'],$_POST['precio'],$_POST['camarap'], $_POST['camaraf'],$_POST['so'],$_POST['ram'], $_POST['procesador'], $_POST['vprocesador'],$_POST['nucleos'],$_POST['pantalla'], $_POST['almacenamiento'],$destino);
	}else if($_GET['producto']=='computadores'){
		$Respuesta = $db->updateComputador($_POST['id'], $_POST['modelo'],$_POST['procesador'],$_POST['so'], $_POST['discoduro'],$_POST['ram'],$_POST['pantalla'], $_POST['tarjetagrafica'], $_POST['precio'],$destino);
	}


	if(!$Respuesta){
		header("Location: ../update.php?card=".$_POST['nombre']."&error=1");
	}else {
		header("Location: ../config/add".$_GET['producto'].".php?producto=".$_GET['producto']."&exito=1");
	}
?>