		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_clientes.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');

				}
			})
		}



			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el cliente")){
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_clientes.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}



$( "#guardar_cliente" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_cliente" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){
			var idEmpleado = $("#idEmpleado"+id).val();
			var nomEmpleado = $("#nomEmpleado"+id).val();
			var fotoEmpleado = $("#fotoEmpleado"+id).val();
			var tel = $("#tel"+id).val();
			var direccion = $("#direccion"+id).val();
			var puesto = $("#puesto"+id).val();
			var fechaIngreso = $("#fechaIngreso"+id).val();
			var llamadasAtencion = $("#llamadasAtencion"+id).val();
			var observaciones = $("#observaciones"+id).val();
			var cursos = $("#cursos"+id).val();
			var conduce = $("#conduce"+id).val();
			var licencia = $("#licencia"+id).val();
			var venc_licencia = $("#venc_licencia"+id).val();
			var jefeInmediato = $("#jefeInmediato"+id).val();


			$("#mod_identidad").val(idEmpleado);
			$("#mod_nombre").val(nomEmpleado);
			$("#mod_foto").val(fotoEmpleado);
			$("#mod_telefono").val(tel);
			$("#mod_direccion").val(direccion);
			$("#mod_puesto").val(puesto);
			$("#mod_ingreo").val(fechaIngreso);
			$("#mod_lla_atencion").val(llamadasAtencion);
			$("#mod_observaciones").val(observaciones);
			$("#mod_cursos").val(cursos);
			$("#mod_conduce").val(conduce);
			$("#mod_licencia").val(licencia);
			$("#mod_ven_licencia").val(venc_licencia);
			$("#mod_jefe").val(jefeInmediato);
			$("#mod_id").val(id);

		}
