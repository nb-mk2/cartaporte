<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos){
		
		//validamos si existe el AFILIADO
		//$stmtValidador = Conexion::conectar()->prepare("select COUNT(*) total from clientes where documento=". $datos["documento"]);
		//$stmtValidador->execute();
	

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fechaemi, cpe, cuittitular, cuitdestinatario, cuittrasportista, codproloc, coddesloc, codgrano, pesocarga, km, codplanta, tarifaflete, codpropro, coddespro)
		 VALUES (:fechaemi, :cpe, :cuittitular, :cuitdestinatario, :cuittrasportista, :codproloc, :coddesloc, :codgrano, :pesocarga, :km, :codplanta, :tarifaflete, :codpropro, :coddespro)");

		$stmt->bindParam(":fechaemi", $datos["fechaemi"], PDO::PARAM_STR);
		$stmt->bindParam(":cpe", $datos["cpe"], PDO::PARAM_INT);
		$stmt->bindParam(":cuittitular", $datos["cuittitular"], PDO::PARAM_STR);
		$stmt->bindParam(":cuitdestinatario", $datos["cuitdestinatario"], PDO::PARAM_STR);
		$stmt->bindParam(":cuittrasportista", $datos["cuittrasportista"], PDO::PARAM_STR);
		$stmt->bindParam(":codproloc", $datos["codproloc"], PDO::PARAM_INT);
		$stmt->bindParam(":codpropro", $datos["codpropro"], PDO::PARAM_INT);
		$stmt->bindParam(":coddesloc", $datos["coddesloc"], PDO::PARAM_INT);
		$stmt->bindParam(":coddespro", $datos["coddespro"], PDO::PARAM_INT);
		$stmt->bindParam(":codgrano", $datos["codgrano"], PDO::PARAM_INT);
		$stmt->bindParam(":pesocarga", $datos["pesocarga"], PDO::PARAM_INT);
		$stmt->bindParam(":km", $datos["km"], PDO::PARAM_INT);
		$stmt->bindParam(":codplanta", $datos["codplanta"], PDO::PARAM_INT);
		$stmt->bindParam(":tarifaflete", $datos["tarifaflete"], PDO::PARAM_INT);
		
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}
			

		$stmt->close();
		$stmt = null;
		$stmtValidador->close(); 
	
	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR CLIENTES PARA CARTAPORTE
	=============================================*/



	static public function mdlMostrarClientesCartaPorte($tabla, $datos){

		
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codplanta = :codplantaa AND fechaemi BETWEEN :fechahasta AND :fechadesde");
			//SELECT * FROM clientes WHERE fechaemi BETWEEN '2022/12/27' AND '2022/12/27';

			$stmt->bindParam(":codplantaa", $datos["codplantaa"], PDO::PARAM_INT);
			$stmt->bindParam(":fechahasta", $datos["fechahasta"], PDO::PARAM_STR);
			$stmt->bindParam(":fechadesde", $datos["fechadesde"], PDO::PARAM_STR);
			

			$stmt -> execute();

			return $stmt -> fetchAll();
			

		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR GRANOS
	=============================================*/

	static public function mdlMostrarGranos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR LOCALIDADES PARA SELECT ANIDADOS 
	=============================================*/

	static public function mdlBuscarLocalidades($tabla, $item, $valor, $comodin){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			if($comodin == 1){ 
			return $stmt -> fetch();} 
			else {return $stmt -> fetchAll();}

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR PROVINCIAS
	=============================================*/

	static public function mdlMostrarProvincias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fechaemi = :fechaemi, cpe = :cpe, cuittitular = :cuittitular, cuitdestinatario = :cuitdestinatario, 
		cuittrasportista = :cuittrasportista, codproloc = :codproloc,  codpropro = :codpropro, coddesloc = :coddesloc, coddespro = :coddespro, codgrano = :codgrano, 
		pesocarga = :pesocarga, km = :km, codplanta = :codplanta, tarifaflete = :tarifaflete  WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaemi", $datos["fechaemi"], PDO::PARAM_STR);
		$stmt->bindParam(":cpe", $datos["cpe"], PDO::PARAM_INT);
		$stmt->bindParam(":cuittitular", $datos["cuittitular"], PDO::PARAM_STR);
		$stmt->bindParam(":cuitdestinatario", $datos["cuitdestinatario"], PDO::PARAM_STR);
		$stmt->bindParam(":cuittrasportista", $datos["cuittrasportista"], PDO::PARAM_STR);
		$stmt->bindParam(":codproloc", $datos["codproloc"], PDO::PARAM_INT);
		$stmt->bindParam(":codpropro", $datos["codpropro"], PDO::PARAM_INT);
		$stmt->bindParam(":coddesloc", $datos["coddesloc"], PDO::PARAM_INT);
		$stmt->bindParam(":coddespro", $datos["coddespro"], PDO::PARAM_INT);
		$stmt->bindParam(":codgrano", $datos["codgrano"], PDO::PARAM_INT);
		$stmt->bindParam(":pesocarga", $datos["pesocarga"], PDO::PARAM_INT);
		$stmt->bindParam(":km", $datos["km"], PDO::PARAM_INT);
		$stmt->bindParam(":codplanta", $datos["codplanta"], PDO::PARAM_INT);
		$stmt->bindParam(":tarifaflete", $datos["tarifaflete"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

		/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarClientes($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

