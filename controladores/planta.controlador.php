<?php

class ControladorPlantas{

	
	/*=============================================
	REGISTRO DE PLANTA
	=============================================*/

	static public function ctrCrearPlanta(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

			  
				$tabla = "planta";


				$datos = array("descrip" => $_POST["nuevoNombre"]);

				$respuesta = ModeloPlantas::mdlIngresarPlanta($tabla, $datos);

				if($respuesta == "repetir"){

					echo '<script>

					swal({

						type: "success",
						title: "El nombre ya existe!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "planta";

						}

					});
				

					</script>';


				}	
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "La Planta ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "planta";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La planta no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "planta";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR Planta
	=============================================*/

	static public function ctrMostrarPlantas($item, $valor){

		$tabla = "planta";

		$respuesta = ModeloPlantas::MdlMostrarPlantas($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR Planta
	=============================================*/

	static public function ctrEditarPlanta(){

		if(isset($_POST["editarPlanta"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				
				$tabla = "planta";

				$datos = array("nombre" => $_POST["editarNombre"]);

				$respuesta = ModeloPlantas::mdlEditarPlanta($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La planta ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "planta";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "planta";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR Planta
	=============================================*/

	static public function ctrBorrarPlanta(){

		if(isset($_GET["idPlanta"])){

			$tabla ="planta";
			$datos = $_GET["idPlanta"];

			

			$respuesta = ModeloPlantas::mdlBorrarPlanta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La planta ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "planta";

								}
							})

				</script>';

			}		

		}

	}


}
	


