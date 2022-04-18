<?php
//configuracion
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DBNAME", "tiendavirtual");

class DB extends mysqli{
	protected static $instance;

	public function __construct($host,$user,$pass,$dbname) {
        mysqli_report(MYSQLI_REPORT_OFF);
        @parent::__construct($host,$user,$pass,$dbname);
        if( mysqli_connect_errno() ) {
            throw new exception(mysqli_connect_error(), mysqli_connect_errno()); 
        }

    }

	public static function getDBConnection(){
		if( !self::$instance ) {
            self::$instance = new self(HOST,USER,PASS,DBNAME);
            $consulta = "SET CHARACTER SET UTF8";
			self::$instance->query($consulta);
        }
        return self::$instance;		
	}
	
	function getUser($email,$pass){
		$consulta = "SELECT * FROM usuarios WHERE correo='".$email."' AND pass='".$pass."'";
		return $this->query($consulta);
	}
    function getProductos($tabla){
		$consulta = "SELECT * FROM $tabla LIMIT 9";
		return $this->query($consulta);
	}
	function getProductoEspecifico($tabla,$id){
		$consulta = "SELECT * FROM $tabla WHERE id='".$id."'";
		return $this->query($consulta);
	}
	function setUsuario($nombre,$apellido,$correo,$pass,$tipo,$nventas){
		$consulta ="INSERT INTO `usuarios`(`nombre`, `apellido`, `correo`, `pass`, `tipo`,`nventas`) VALUES ('".$nombre."','".$apellido."','".$correo."','".$pass."','".$tipo."','".$nventas."')";
	

		return $this->query($consulta);
	}
	function obtenerUsuario($email){
		$consulta = "SELECT * FROM usuarios WHERE correo='".$email."'";
		return $this->query($consulta);
	}
	function setComprasUsuario($email,$compras){
		$consulta= "UPDATE usuarios SET nventas=$compras WHERE  correo='".$email."'";
		return $this->query($consulta);
	}
	function addProductoCarrito($email, $id_producto,$categoria,$cantidad){
		$consulta = "INSERT INTO carrito (correo,referencia,categoria,cantidad) VALUES ('".$email."','".$id_producto."','".$categoria."','".$cantidad."')";

		return $this->query($consulta);
	}
	function updateCardCarrito($email, $id_producto,$categoria,$newCantidad){
		$consulta = "UPDATE carrito SET cantidad=$newCantidad WHERE correo = '".$email."' AND referencia = '".$id_producto."' AND categoria = '".$categoria."'";
		return $this->query($consulta);
	}
	function verificarExistenciaCarrito($email, $id_producto,$categoria){
		$consulta = "SELECT * FROM carrito WHERE correo='".$email."' AND referencia = '".$id_producto."' AND categoria = '".$categoria."'";
		return $this->query($consulta);
	}
	function obtenerCarrito($email){
		$consulta = "SELECT * FROM carrito WHERE correo='".$email."'";
		return $this->query($consulta);
	}
	function deleteCarrito($email, $id_producto,$categoria){
		$consulta = "DELETE FROM carrito WHERE correo='".$email."' AND referencia = '".$id_producto."' AND categoria = '".$categoria."'";
		return $this->query($consulta);
	}
	function deleteProducto($tabla,$id){
		$consulta = "DELETE FROM $tabla WHERE id='".$id."'";
		return $this->query($consulta);
	}

	function updateCelular($id, $modelo,$precio,$camp, $camf,$so,$ram, $procesador, $vprocesador,$nucleos,$pantalla, $almacenamiento,$imagen){
		if($imagen!=""){
			$consulta= "UPDATE celulares SET modelo='".$modelo."',precio='".$precio."',camp='".$camp."',so='".$so."',ram='".$ram."',camf='".$camf."',procesador='".$procesador."',vprocesador='".$vprocesador."',nucleos='".$nucleos."',pantalla='".$pantalla."',rutaimg='".$imagen."',almacenamiento='".$almacenamiento."' WHERE  id='".$id."'";
		} else {
			$consulta= "UPDATE celulares SET modelo='".$modelo."',precio='".$precio."',camp='".$camp."',so='".$so."',ram='".$ram."',camf='".$camf."',procesador='".$procesador."',vprocesador='".$vprocesador."',nucleos='".$nucleos."',pantalla='".$pantalla."',almacenamiento='".$almacenamiento."' WHERE  id='".$id."'";
		}
		return $this->query($consulta);
	}

	function createCelular($id, $modelo,$precio,$camp, $camf,$so,$ram, $procesador, $vprocesador,$nucleos,$pantalla, $almacenamiento,$imagen){
		$consulta ="INSERT INTO celulares(`id`, `modelo`, `precio`, `camp`, `so`, `ram`, `camf`, `procesador`, `vprocesador`, `nucleos`, `pantalla`, `rutaimg`, `almacenamiento`) VALUES ('".$id."','".$modelo."','".$precio."','".$camp."','".$so."','".$ram."','".$camf."','".$procesador."','".$vprocesador."','".$nucleos."','".$pantalla."','".$imagen."','".$almacenamiento."')";
		return $this->query($consulta);

	}
	function createComputador($id, $modelo,$procesador, $so,$discoduro,$ram, $pantalla, $tarjetagrafica,$precio,$imagen){
		$consulta ="INSERT INTO `computadores`(`id`, `modelo`, `procesador`, `so`, `discoduro`, `ram`, `pantalla`, `tarjetagrafica`, `precio`, `rutaimg`) VALUES ('".$id."','".$modelo."','".$procesador."','".$so."','".$discoduro."','".$ram."','".$pantalla."','".$tarjetagrafica."','".$precio."','".$imagen."')";
		return $this->query($consulta);

	}
	function updateComputador($id, $modelo,$procesador, $so,$discoduro,$ram, $pantalla, $tarjetagrafica,$precio,$imagen){
		if($imagen!=""){
			$consulta= "UPDATE computadores SET modelo='".$modelo."',procesador='".$procesador."',so='".$so."',discoduro='".$discoduro."',ram='".$ram."',pantalla='".$pantalla."',tarjetagrafica='".$tarjetagrafica."',precio='".$precio."',rutaimg='".$imagen."' WHERE  id='".$id."'";
		} else {
			$consulta= "UPDATE computadores SET modelo='".$modelo."',procesador='".$procesador."',so='".$so."',discoduro='".$discoduro."',ram='".$ram."',pantalla='".$pantalla."',tarjetagrafica='".$tarjetagrafica."',precio='".$precio."' WHERE  id='".$id."'";
		}
		return $this->query($consulta);
	}
	function updateEstadisticas($id,$usuarios,$ventas,$totalventas){
		$consulta= "UPDATE estadisticas SET usuarios='".$usuarios."',ventas='".$ventas."',totalventas='".$totalventas."' WHERE  id='".$id."'";
		return $this->query($consulta);
	}

	function obtenerEstadisticas($id){
		$consulta = "SELECT * FROM estadisticas WHERE id='".$id."'";
		return $this->query($consulta);
	}
}