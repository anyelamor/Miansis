<?php

session_start();
if($_SESSION['valid_user']!=true){
    header('Location: login.php');
    die();
}
	/* Connect To Database*/

	require_once ("conexion.php");//Contiene funcion que conecta a la base de datos


	$title="Empleados| JCR";


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>

    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="btn-group pull-right">
			<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoEmpleado"><span class="glyphicon glyphicon-plus" ></span> Nuevo Empleado</button>
			</div>
			<div>
				<form class="form-horizontal" role="form" id="datos_cotizacion">

							<div class="form-group row ">
										<div class="col-md-4">
											<h4><i class='glyphicon glyphicon-search'></i> Buscar Empleados</h4>
									<input type="text" class="form-control" id="q" placeholder="Nombre del empleado" onkeyup='load(1);'>
								</div>
								<div class="col-md-5">
									<button type="button" class="btn btn-default" onclick='load(1);'>
										<span class="glyphicon glyphicon-search" ></span> Buscar</button>
									<span id="loader"></span>
								</div>
							</div>




				</form>
			</div>


		</div>
		<div class="panel-body">



			<?php
				include("modal/registro_empleados.php");
				include("modal/editar_clientes.php");
			?>

				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->






  </div>
</div>

	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/empleados.js"></script>
  </body>
</html>
