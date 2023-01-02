/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto2").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/HEIC"){

  		$(".nuevaFoto2").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 10000000){

  		$(".nuevaFoto2").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 10MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar2").attr("src", rutaImagen);
			  $(".previsualizarEditar2").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
SELECT ANIDADO FILTRAR CIUDADES PRO
=============================================*/
$('.selectProProvincia').on('change', function(){
	// var idCliente = $(this).attr("idCliente");
	$(".selectProLocalidad").find('option').not(':first').remove();
	var idProvincia = $(this).val();
	var idNano = $(this).attr("nano");
	var datos = new FormData();
 	//datos.append("activarId", idCliente);
  	datos.append("provincia", idProvincia);
	datos.append("nano", idNano);
  	$.ajax({

	  url:"ajax/clientes.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
	  dataType:"json",
      success: function(respuesta){
		
		//console.log(respuesta);
		
		var $select = $('.selectProLocalidad');

		//alert(options);
		$.each(respuesta, function(codLoc, descripLoc) {
			var bandera = '';
			if (descripLoc.codLoc == idNano) { bandera = 'selected' }
		  $select.append('<option value="' + descripLoc.codLoc + '"' + bandera + '>(' + descripLoc.codLoc +') - '+ descripLoc.descripLoc + '</option>');
		});

      }

  	})
})

/*=============================================
SELECT ANIDADO FILTRAR CIUDADES DES
=============================================*/

$('.selectDesProvincia').on('change', function(){
	// var idCliente = $(this).attr("idCliente");
	$(".selectDesLocalidad").find('option').not(':first').remove();
	var idProvincia = $(this).val();
	var idNano = $(this).attr("nano");

	var datos = new FormData();
 	//datos.append("activarId", idCliente);
  	datos.append("provincia", idProvincia);
	datos.append("nano", idNano);
  	$.ajax({

	  url:"ajax/clientes.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
	  dataType:"json",
      success: function(respuesta){
		
		var $select = $('.selectDesLocalidad');

		$.each(respuesta, function(codLoc, descripLoc) {
			var bandera = '';
			if (descripLoc.codLoc == idNano) { bandera = 'selected' }
		  $select.append('<option value="' + descripLoc.codLoc + '" ' + bandera + '>(' + descripLoc.codLoc +') - '+ descripLoc.descripLoc + '</option>');
		});

      }

  	})
})


/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto3").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/HEIC"){

  		$(".nuevaFoto3").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 10000000){

  		$(".nuevaFoto3").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar3").attr("src", rutaImagen);
			  $(".previsualizarEditar3").attr("src", rutaImagen);

  		})

  	}
})


/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	var despro;

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idCliente").val(respuesta["id"]);
	     $("#editarFechaEmi").val(respuesta["fechaemi"]);
         $("#editarCpe").val(respuesta["cpe"]);
         $("#editarCuitTitular").val(respuesta["cuittitular"]);
	     $("#editarCuitDestinatario").val(respuesta["cuitdestinatario"]);
	     $("#editarCuitTrasportista").val(respuesta["cuittrasportista"]);
		 
		 $("#editarProProvincia").attr('nano', respuesta["codproloc"]);
		 $('#editarProProvincia').val(respuesta["codpropro"]).trigger('change');

		 $("#editarDesProvincia").attr('nano', respuesta["coddesloc"]);
		 $('#editarDesProvincia').val(respuesta["coddespro"]).trigger('change');
		 //$('#editarDesLocalidad').val(respuesta["coddesloc"]);

		 $("#editarCodGrano").select2().select2('val',respuesta["codgrano"]);
	     $("#editarPesoCarga").val(respuesta["pesocarga"]);
		 $("#editarKm").val(respuesta["km"]);
	     $("#editarCodPlanta").val(respuesta["codplanta"]);
         $("#editarFlete").val(respuesta["tarifaflete"]);
		
		
		}
		
		

  	})

	

})

/*=============================================
ESTADO CLIENTE
=============================================*/
$('.claseSelects').on('change', function(){
	var idCliente = $(this).attr("idCliente");
	var estadoCliente = $(this).val();

	var datos = new FormData();
 	datos.append("activarId", idCliente);
  	datos.append("activarCliente", estadoCliente);

  	$.ajax({

	  url:"ajax/clientes.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El afiliado ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "clientes";

			        }


				});

	      	}

      }

  	})
if(estadoCliente == 1){
	  $(this).removeClass('btn-danger');
	  $(this).removeClass('btn-warning');
  		$(this).addClass('btn-success');
		
  	}
if(estadoCliente == 3){
	  $(this).removeClass('btn-warning');
	  $(this).removeClass('btn-success');
	  $(this).addClass('btn-danger');
		 }
if(estadoCliente == 2){
	$(this).removeClass('btn-success');
	$(this).removeClass('btn-danger');
	$(this).addClass('btn-warning');
		}
if(estadoCliente == 0){
	$(this).removeClass('btn-success');
	$(this).removeClass('btn-danger');
	$(this).removeClass('btn-warning');
				}


})

/*=============================================
ASIGNAR AFILIADOR
=============================================*/
$('.selectsUsuario').on('change', function(){
	var idCliente = $(this).attr("idCliente");
	var asignarAfiliador = $(this).val();

	var datos = new FormData();
 	datos.append("activarId", idCliente);
  	datos.append("afiliador", asignarAfiliador);

  	$.ajax({

	  url:"ajax/clientes.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El afiliado ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "clientes";

			        }


				});

	      	}

      }

  	})
	  
	/*
if(asignarAfiliador == 1){
	  $(this).removeClass('btn-danger');
	  $(this).removeClass('btn-warning');
  		$(this).addClass('btn-success');
		
  	}
if(asignarAfiliador == 3){
	  $(this).removeClass('btn-warning');
	  $(this).removeClass('btn-success');
	  $(this).addClass('btn-danger');
		 }
if(asignarAfiliador == 2){
	$(this).removeClass('btn-success');
	$(this).removeClass('btn-danger');
	$(this).addClass('btn-warning');
		}
if(asignarAfiliador == 0){
	$(this).removeClass('btn-success');
	$(this).removeClass('btn-danger');
	$(this).removeClass('btn-warning');
				}*/


})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})


