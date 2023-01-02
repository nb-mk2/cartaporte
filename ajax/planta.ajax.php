<?php

require_once "../controladores/planta.controlador.php";
require_once "../modelos/planta.modelo.php";

class AjaxPlantas{

	/*=============================================
	EDITAR Planta
	=============================================*/	

	public $idPlanta;

	public function ajaxEditarPlanta(){

		$item = "id";
		$valor = $this->idPlanta;

		$respuesta = ControladorPlantas::ctrMostrarPlantas($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	VALIDAR NO REPETIR Planta
	=============================================*/	

	public $validarPlanta;

	public function ajaxValidarPlanta(){

		$item = "descrip";
		$valor = $this->validarPlanta;

		$respuesta = ControladorPlantas::ctrMostrarPlantas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR Planta
=============================================*/
if(isset($_POST["idPlanta"])){

	$editar = new AjaxPlantas();
	$editar -> idPlanta = $_POST["idPlanta"];
	$editar -> ajaxEditarPlanta();

}



/*=============================================
VALIDAR NO REPETIR Planta
=============================================*/

if(isset( $_POST["validarPlanta"])){

	$valPlanta = new AjaxPlantas();
	$valPlanta -> validarPlanta = $_POST["validarPlanta"];
	$valPlanta -> ajaxValidarPlanta();

}