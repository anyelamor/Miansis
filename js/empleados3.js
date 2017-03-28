$(document).ready(function(){
  load(1);
});

function load(page){
  var q= $("#q").val();
  $("#loader").fadeIn('slow');
  $.ajax({
    url:'datosGEmp2.php?action=ajax&page='+page+'&q='+q,
     beforeSend: function(objeto){
     $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
    },
    success:function(data){
      $(".outer_div").html(data).fadeIn('slow');
      $('#loader').html('');

    }
  })
}

$( "#editar_empleado" ).submit(function( event ) {
  $('#actualizar_datos1').attr("disabled", true);

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modificar_empleado.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos1').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})
