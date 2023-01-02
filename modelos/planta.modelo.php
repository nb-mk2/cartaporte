<?php

require_once "conexion.php";

class ModeloPlantas{

	/*=============================================
	MOSTRAR PlantaS
	=============================================*/

	static public function mdlMostrarPlantas($tabla, $item, $valor){

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
	REGISTRO DE Planta
	=============================================*/

	static public function mdlIngresarPlanta($tabla, $datos){

		$stmtValidador2 = Conexion::conectar()->prepare("select COUNT(*) total from clientes where descrip=". $datos["descrip"]);
		$stmtValidador2->execute();
	
		
		if ($stmtValidador2->fetchColumn() > 0) { 
			return "repetir";
		} else { 

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descrip) VALUES (:descrip)");

		$stmt->bindParam(":descrip", $datos["descrip"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	} }

	/*=============================================
	EDITAR Planta
	=============================================*/

	static public function mdlEditarPlanta($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR Planta
	=============================================*/

	static public function mdlActualizarPlanta($tabla, $item1, $valor1, $item2, $valor2){

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

	/*=============================================
	BORRAR Planta
	=============================================*/

	static public function mdlBorrarPlanta($tabla, $datos){

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

}