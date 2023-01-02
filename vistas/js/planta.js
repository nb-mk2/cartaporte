


/*=============================================
EDITAR PLANTA
=============================================*/
$(".tablas").on("click", ".btnEditarPlanta", function(){

	var idPlanta = $(this).attr("idPlanta");
	
	var datos = new FormData();
	datos.append("idPlanta", idPlanta);

	$.ajax({

		url:"ajax/planta.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombre").val(respuesta["descrip"]);

		}

	});

})


/*=============================================
REVISAR SI EL Planta YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoNombre").change(function(){

	$(".alert").remove();

	var planta = $(this).val();

	var datos = new FormData();
	datos.append("validarPlanta", planta);

	 $.ajax({
	    url:"ajax/planta.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoNombre").parent().after('<div class="alert alert-warning"> La planta ya existe en la base de datos</div>');

	    		$("#nuevoNombre").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR Planta
=============================================*/
$(".tablas").on("click", ".btnEliminarPlanta", function(){

  var idPlanta = $(this).attr("idPlanta");
  var planta = $(this).attr("planta");

  swal({
    title: '¿Está seguro de borrar la Planta?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar planta!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=planta&idPlanta="+idPlanta;

    }

  })

})




