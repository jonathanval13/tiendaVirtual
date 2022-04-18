<?php
require_once "../controlador.php";

$db = db::getDBConnection();
$Respuesta = $db->getUser($_POST['email'],$_POST['pass']);

if (mysqli_num_rows($Respuesta)>0){
	session_start();
    while($consulta = mysqli_fetch_array($Respuesta)){

        $_SESSION['name']= ucfirst($consulta['nombre']);
        $_SESSION['email']=$consulta['correo'];
        $_SESSION['auth'] = true;
        if($consulta['tipo'] == 1){
            $_SESSION['admin']=true;
            header("Location: ../admin.php");
        }
        else{
            header("Location: ../index.php");
        }

        
    }
}else{
	print("Error<br>");
	header("Location: ../login.php?error=1");
}
$db->close();

?>