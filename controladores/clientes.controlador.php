<?php

class ControladorClientes{

	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCuitTitular"])){	

			$token = $_POST['token'];

			   	$tabla = "clientes";				
			   	$datos = array("fechaemi"=>$_POST["nuevoFechaEmi"],
				   			    "cpe"=>$_POST["nuevoCpe"],
								"cuittitular"=>$_POST["nuevoCuitTitular"],
					           "cuitdestinatario"=>$_POST["nuevoCuitDestinatario"],
					           "cuittrasportista"=>$_POST["nuevoCuitTrasportista"],
					           "codproloc"=>$_POST["nuevoProLocalidad"],
							   "codpropro"=>$_POST["nuevoProProvincia"],
							   "coddesloc"=>$_POST["nuevoDesLocalidad"],
							   "coddespro"=>$_POST["nuevoDesProvincia"],
					           "codgrano"=>$_POST["nuevoCodGrano"],
					           "pesocarga"=>$_POST["nuevoPesoCarga"],
							   "km"=>$_POST["nuevoKm"],
							   "codplanta"=>$_POST["nuevoCodPlanta"],
							   "tarifaflete"=>$_POST["nuevoFlete"]);

			  

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La carta porte se ha guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				

				} else {

						echo'<script>

						swal({
							  type: "error",
							  title: "ERROR al guardar cartaporte!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "clientes";
	
										}
									})
	
						</script>';
					
				}
		

	
	}

	}


	/*=============================================
	CREAR CARTAPORTE
	=============================================*/

	static public function ctrCrearCartaPorte(){

		
			if(isset($_POST["nuevoFechaDesde"])){	

			

			   	$tabla = "clientes";
						
			   	$datos = array(	"codplantaa"=>$_POST["nuevoCodPlanta"],
				   			    "fechadesde"=>$_POST["nuevoFechaDesde"],
								"fechahasta"=>$_POST["nuevoFechaHasta"]);

			   	$respuesta = ModeloClientes::mdlMostrarClientesCartaPorte($tabla, $datos);

				  
					
					$doc = new DOMDocument('1.0' ,'ISO-8859-1'); 

						$doc->formatOutput = true;

						$ddjj = $doc->createElement("DDJJ");
						$ddjj = $doc->appendChild($ddjj);

						$programa = $doc->createElement("Programa");
						$programa = $ddjj->appendChild($programa);
						$textPrograma = $doc->createTextNode(2);
						$textPrograma = $programa->appendChild($textPrograma);

						$TipoCta = $doc->createElement("TipoCta");
						$TipoCta = $ddjj->appendChild($TipoCta);
						$textTipoCta = $doc->createTextNode(61);
						$textTipoCta = $TipoCta->appendChild($textTipoCta);

						$Version = $doc->createElement("Version");
						$Version = $ddjj->appendChild($Version);
						$textVersion = $doc->createTextNode(1.00);
						$textVersion = $Version->appendChild($textVersion);

						$Fecha = $doc->createElement("Fecha");
						$Fecha = $ddjj->appendChild($Fecha);
						$textFecha = $doc->createTextNode("21/12/2022");
						$textFecha = $Fecha->appendChild($textFecha);

						$NroAgente = $doc->createElement("NroAgente");
						$NroAgente = $ddjj->appendChild($NroAgente);
						$textNroAgente = $doc->createTextNode("21/12/2022");
						$textNroAgente = $NroAgente->appendChild($textNroAgente);

						$Periodo = $doc->createElement("Periodo");
						$Periodo = $ddjj->appendChild($Periodo);
						$textPeriodo = $doc->createTextNode("202211");
						$textPeriodo = $Periodo->appendChild($textPeriodo);

						$NroRec = $doc->createElement("NroRec");
						$NroRec = $ddjj->appendChild($NroRec);
						$textNroRec = $doc->createTextNode("202211");
						$textNroRec = $NroRec->appendChild($textNroRec);

						$RegInformados = $doc->createElement("RegInformados");
						$RegInformados = $ddjj->appendChild($RegInformados);
						$textRegInformados = $doc->createTextNode("4");
						$textRegInformados = $RegInformados->appendChild($textRegInformados);

						$Operaciones = $doc->createElement("Operaciones");
						$Operaciones = $ddjj->appendChild($Operaciones);

						$Detalle = $doc->createElement("Detalle");
						$Detalle = $Operaciones->appendChild($Detalle);

						$FechaOperacion = $doc->createElement("FechaOperacion");
						$FechaOperacion = $Detalle->appendChild($FechaOperacion);
						$textFechaOperacion = $doc->createTextNode("04/11/2022");
						$textFechaOperacion = $FechaOperacion->appendChild($textFechaOperacion);

						$NroCartaPorte = $doc->createElement("NroCartaPorte");
						$NroCartaPorte = $Detalle->appendChild($NroCartaPorte);
						$textNroCartaPorte = $doc->createTextNode("10207187140");
						$textNroCartaPorte = $NroCartaPorte->appendChild($textNroCartaPorte);

						$CuitTitular = $doc->createElement("CuitTitular");
						$CuitTitular = $Detalle->appendChild($CuitTitular);
						$textCuitTitular = $doc->createTextNode("30500120882");
						$textCuitTitular = $CuitTitular->appendChild($textCuitTitular);

						$CuitDestinatario = $doc->createElement("CuitDestinatario");
						$CuitDestinatario = $Detalle->appendChild($CuitDestinatario);
						$textCuitDestinatario = $doc->createTextNode("33503769269");
						$textCuitDestinatario = $CuitDestinatario->appendChild($textCuitDestinatario);

						$CuitTransportista = $doc->createElement("CuitTransportista");
						$CuitTransportista = $Detalle->appendChild($CuitTransportista);
						$textCuitTransportista = $doc->createTextNode("33503769269");
						$textCuitTransportista = $CuitTransportista->appendChild($textCuitTransportista);
						
						$Procedencia = $doc->createElement("Procedencia");
						$Procedencia = $Detalle->appendChild($Procedencia);
						$textProcedencia = $doc->createTextNode("6419");
						$textProcedencia = $Procedencia->appendChild($textProcedencia);

						$Destino = $doc->createElement("Destino");
						$Destino = $Detalle->appendChild($Destino);
						$textDestino = $doc->createTextNode("19051");
						$textDestino = $Destino->appendChild($textDestino);

						$Grano = $doc->createElement("Grano");
						$Grano = $Detalle->appendChild($Grano);
						$textGrano = $doc->createTextNode("19051");
						$textGrano = $Grano->appendChild($textGrano);

						$KgTransportados = $doc->createElement("KgTransportados");
						$KgTransportados = $Detalle->appendChild($KgTransportados);
						$textKgTransportados = $doc->createTextNode("28340");
						$textKgTransportados = $KgTransportados->appendChild($textKgTransportados);

						$KmaRecorrer = $doc->createElement("KmaRecorrer");
						$KmaRecorrer = $Detalle->appendChild($KmaRecorrer);
						$textKmaRecorrer = $doc->createTextNode("28340");
						$textKmaRecorrer = $KmaRecorrer->appendChild($textKmaRecorrer);

						$Tarifa = $doc->createElement("Tarifa");
						$Tarifa = $Detalle->appendChild($Tarifa);
						$textTarifa = $doc->createTextNode("28340");
						$textTarifa = $Tarifa->appendChild($textTarifa);

						$NroContrato = $doc->createElement("NroContrato");
						$NroContrato = $Detalle->appendChild($NroContrato);

						$NroOblea = $doc->createElement("NroOblea");
						$NroOblea = $Detalle->appendChild($NroOblea);

						$NroGuia = $doc->createElement("NroGuia");
						$NroGuia = $Detalle->appendChild($NroGuia);

						$NroVagones = $doc->createElement("NroVagones");
						$NroVagones = $Detalle->appendChild($NroVagones);
						$textNroVagones = $doc->createTextNode("0");
						$textNroVagones = $NroVagones->appendChild($textNroVagones);

						$Vagones = $doc->createElement("Vagones");
						$Vagones = $Detalle->appendChild($Vagones);

						$Vagon = $doc->createElement("Vagon");
						$Vagon = $Vagones->appendChild($Vagon);

						$KgTransportadosVagon = $doc->createElement("KgTransportadosVagon");
						$KgTransportadosVagon = $Vagones->appendChild($KgTransportadosVagon);

						$NroGuiaVagon = $doc->createElement("NroGuiaVagon");
						$NroGuiaVagon = $Vagones->appendChild($NroGuiaVagon);

						$fileName = '/xampp/htdocs/carta-porte/cartaporte.xml';

						//echo 'Escrito: ' . $doc->save($fileName). 'bytes <br><br>';
						
						if (file_exists($fileName)){

							ob_clean();
							header('Content-Description: File Transfer');
							header('Content-Type: text/xml');
							header('Content-Disposition: attachment; filename=cartaporte.xml');
							header('Content-Transfer-Encoding: binary');
							header('Expires: 0');
							header('Cache-Control: must-revalidate');
							header('Pragma: public');
							header('Content-Length:'. (filesize($fileName)));
							ob_end_clean();
							flush();
							readfile($fileName);
							return true;
							}else{
							
							return false;
							}		
						

						
	
			}
		
	}
	
	

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR GRANOS
	=============================================*/

	static public function ctrMostrarGranos($item, $valor){

		$tabla = "granos";

		$respuesta = ModeloClientes::mdlMostrarGranos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR LOCALIDADES
	=============================================*/

	static public function ctrMostrarLocalidades($item, $valor, $comodin){

		$tabla = "localidades";

		$respuesta = ModeloClientes::mdlBuscarLocalidades($tabla, $item, $valor, $comodin);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR PROVINCIAS
	=============================================*/

	static public function ctrMostrarProvincias($item, $valor){

		$tabla = "provincia";

		$respuesta = ModeloClientes::mdlMostrarProvincias($tabla, $item, $valor);

		return $respuesta;

	}

	

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCuitTitular"])){

				$tabla = "clientes";

				$datos = array("fechaemi"=>$_POST["editarFechaEmi"], 
								"cpe"=>$_POST["editarCpe"],
								"id"=>$_POST["idCliente"],
								"cuittitular"=>$_POST["editarCuitTitular"],
								"cuitdestinatario"=>$_POST["editarCuitDestinatario"],
								"cuittrasportista"=>$_POST["editarCuitTrasportista"],
								"codproloc"=>$_POST["editarProLocalidad"],
								"codpropro"=>$_POST["editarProProvincia"],
								"coddesloc"=>$_POST["editarDesLocalidad"],
								"coddespro"=>$_POST["editarDesProvincia"],
								"codgrano"=>$_POST["editarCodGrano"],
								"pesocarga"=>$_POST["editarPesoCarga"],
								"km"=>$_POST["editarKm"],
								"codplanta"=>$_POST["editarCodPlanta"],
								"tarifaflete"=>$_POST["editarFlete"]);

				
							   
			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Afiliado ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

		

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Afiliado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}

}

