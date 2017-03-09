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
			<div>
							<div class="form-group row ">
										<div class="col-md-4">
											<h4>Datos Generales</h4>
								</div>
							</div>
			</div>


		</div>
		<div class="panel-body">
      <form class="form-horizontal" method="post" id="guardar_empleado" name="guardar_empleado">

        <div class="form-group">
  			<label for="Id" class="col-sm-1 control-label">Id</label>
  			<div class="col-sm-2">
  			<input type="text" class="form-control" name="Id" >
  			</div>
        </div>

      <div class="form-group">
      <label for="Nombre" class="col-sm-1 control-label">Nombre</label>
			<div class="col-sm-5">
			<input type="text" class="form-control" name="Nombre" >
			</div>
      <label for="Identidad" class="col-sm-1 control-label">Identidad</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="Identidad" >
			</div>
      <label for="TipoSan" class="col-sm-1 control-label">Tipo Sangre</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="TipoSan" >
			</div>
      </div>

      <div class="form-group">
      <label for="Sexo" class="col-sm-1 control-label">Sexo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Sexo" >
      </div>
      <label for="FechaN" class="col-sm-1 control-label">Fecha Nac.</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaN" >
      </div>
      <label for="Telefono" class="col-sm-1 control-label">Teléfono</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Telefono" >
      </div>
      <label for="Celular" class="col-sm-1 control-label">Celular</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Celular" >
      </div>
      </div>


      <div class="form-group">
      <label for="Correo" class="col-sm-1 control-label">Correo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Correo" >
      </div>
      <label for="Direccion" class="col-sm-1 control-label">Dirección</label>
      <div class="col-sm-8">
      <input type="text" class="form-control" name="Direccion" >
      </div>
      </div>

      <div class="form-group">
      <label for="Cargo" class="col-sm-1 control-label">Cargo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Sexo" >
      </div>
      <label for="Sueldo" class="col-sm-1 control-label">Sueldo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaN" >
      </div>
      <label for="FechaIngr" class="col-sm-1 control-label">Fecha Ingreso</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaIngr" >
      </div>
      <label for="TipoEmp" class="col-sm-1 control-label">Tipo Empleado</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="TipoEmp" >
      </div>
      </div>

      <div class="form-group">
      <label for="JefeInm" class="col-sm-1 control-label">Jefe Inmediato</label>
			<div class="col-sm-5">
			<input type="text" class="form-control" name="JefeInm" >
			</div>
      <label for="Identidad" class="col-sm-1 control-label">Identidad</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="Identidad" >
			</div>
      <label for="TipoSan" class="col-sm-1 control-label">Tipo Sangre</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="TipoSan" >
			</div>
      </div>

		  </form>



			<?php
				include("modal/registro_empleados.php");
				include("modal/editar_clientes.php");
			?>







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
