<?php
require_once ("conexion.php");
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
?>
		  <script>

            $('a[rel="abrir"]').click(function(e) {
                    e.preventDefault();

        var temp = $(this).attr('title');// aca capturo en la variable temp lo que estaba en title
        //y si queres podes enviarla de vuelta a la pagina, fuera de la ventana modal:
        document.getElementById('codigo').value = temp; //aca le envio el valor de la variable temp al input de html con id org.
      })
        </script>

				<script>

							$('a[rel="abrir2"]').click(function(e) {
											e.preventDefault();

					var temp = $(this).attr('title');// aca capturo en la variable temp lo que estaba en title
					//y si queres podes enviarla de vuelta a la pagina, fuera de la ventana modal:
					document.getElementById('codigo2').value = temp; //aca le envio el valor de la variable temp al input de html con id org.
				})
					</script>
