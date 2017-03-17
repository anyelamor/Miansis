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
		if (confirm("Realmente deseas eliminar el empleado")){
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



$( "#guardar_empleado" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_empleado.php",
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
			url: "ajax/editar_empleado.php",
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
      var idEmpleado = $("#identidad"+id).val();
			var nomEmpleado = $("#nombre"+id).val();
			var fotoEmpleado = $("#foto"+id).val();
			var tel = $("#telefono"+id).val();
			var direccion = $("#direccion"+id).val();
			var puesto = $("#puesto"+id).val();
			var fechaIngreso = $("#ingreso"+id).val();
			var estado = $("#estado"+id).val();
			var llamadasAtencion = $("#lla_atencion"+id).val();
			var observaciones = $("#observaciones"+id).val();
			var cursos = $("#cursos"+id).val();
			var conduce = $("#conduce"+id).val();
			var licencia = $("#licencia"+id).val();
			var venc_licencia = $("#venc_licencia"+id).val();
			var jefeInmediato = $("#jefe"+id).val();


       $("#mod_identidadE").val(idEmpleado);
			$("#mod_nombreE").val(nomEmpleado);
			$("#mod_fotoE").val(fotoEmpleado);
			$("#mod_telefonoE").val(tel);
			$("#mod_direccionE").val(direccion);
			$("#mod_puestoE").val(puesto);
			$("#mod_ingreoE").val(fechaIngreso);
			$("#mod_estadoE").val(estado);
			$("#mod_lla_atencionE").val(llamadasAtencion);
			$("#mod_observacionesE").val(observaciones);
			$("#mod_cursosE").val(cursos);
			$("#mod_conduceE").val(conduce);
			$("#mod_licenciaE").val(licencia);
			$("#mod_ven_licenciaE").val(venc_licencia);
			$("#mod_jefeE").val(jefeInmediato);
			$("#mod_id").val(id);

		}
