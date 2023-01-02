<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);


	}

		/*=============================================
	ACTIVAR AFILIADO
	=============================================*/	

	public $activarCliente;
	public $activarId;


	public function ajaxActivarClientes(){

		$tabla = "clientes";

		$item1 = "asigestado";
		$valor1 = $this->activarCliente;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloClientes::mdlActualizarClientes($tabla, $item1, $valor1, $item2, $valor2);

	}

			/*=============================================
	ASIGNAR AFILIADO
	=============================================*/	

	public $afiliador;
	


	public function ajaxAfiliador(){

		$tabla = "clientes";

		$item1 = "asigusuario";
		$valor1 = $this->afiliador;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloClientes::mdlActualizarClientes($tabla, $item1, $valor1, $item2, $valor2);

	}

			/*=============================================
	MOSTRAR LOCALIDADES SEGUN ID
	=============================================*/	

	public $provincia;
	
	public function ajaxLocaliades(){

		//$tabla = "clientes";

		//$item1 = "asigusuario";
		//$valor1 = $this->afiliador;

		$item = "codProv";

		$valor = $this->provincia;
		$comodin = 0;

		$respuesta = ControladorClientes::ctrMostrarLocalidades($item, $valor, $comodin);
		echo json_encode($respuesta);

	}

}



/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();

}

/*=============================================
ACTIVAR CLIENTE
=============================================*/	

if(isset($_POST["activarCliente"])){

	$activarCliente = new AjaxClientes();
	$activarCliente -> activarCliente = $_POST["activarCliente"];
	$activarCliente -> activarId = $_POST["activarId"];
	$activarCliente -> ajaxActivarClientes();
	$activarCliente -> activarId;
}

/*=============================================
ASIGNAR  AFILIADOR
=============================================*/	

if(isset($_POST["afiliador"])){

	$afiliador = new AjaxClientes();
	$afiliador -> afiliador = $_POST["afiliador"];
	$afiliador -> activarId = $_POST["activarId"];
	$afiliador -> ajaxAfiliador();
	$afiliador -> activarId;
}

/*=============================================
BUSCAR  LOCALIDADES 
=============================================*/	

if(isset($_POST["provincia"])){

	$provincia = new AjaxClientes();
	$provincia -> provincia = $_POST["provincia"];
	//$afiliador -> activarId = $_POST["activarId"];
	$provincia -> ajaxLocaliades();
	//$afiliador -> activarId;
}