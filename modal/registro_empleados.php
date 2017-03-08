	<?php
		if (isset($conexion))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_empleado" name="guardar_empleado">
			<div id="resultados_ajax"></div>
			<div class="form-group">
			<label for="identidad" class="col-sm-3 control-label">Id</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" id="codigo" name="codigo" >
			</div>
			</div>

			<div class="form-group">
			<label for="identidad" class="col-sm-3 control-label">Sueldo</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="sueldo" name="sueldo" >
			</div>
			</div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Fecha ingreso</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="fecha_ing" name="fecha_ing" >
				</div>
			  </div>
				<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Observaciones</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="obs" name="obs" >
				</div>
			  </div>
				<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Jefe inmediato</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="jefe" name="jefe" >
				</div>
			  </div>
				<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Estado</label>
				<?php
				require_once("conexion.php");
				$query = "select * from estado";
				$resultado=sqlsrv_query($conexion,$query);
				?>
				<select name="estado">
				<?php
				while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC))
				{
				?>
				<option value="<?php echo $row['idEstado']?>">
				<?php echo $row['estado']; ?>
				</option>
				<?php
				}
				?>
				</select><br>

			  </div>
				<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Tipo Sangre</label>
				<?php
				require_once("conexion.php");
				$query = "select * from tipoSangre";
				$resultado=sqlsrv_query($conexion,$query);
				?>
				<select name="tipoS">
				<?php
				while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC))
				{
				?>
				<option value="<?php echo $row['idTipoS']?>">
				<?php echo $row['tipoS']; ?>
				</option>
				<?php
				}
				?>
				</select><br>

			  </div>
				<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Tipo Empleado</label>
				<?php
				require_once("conexion.php");
				$query = "select * from tipoEmpleado";
				$resultado=sqlsrv_query($conexion,$query);
	      if( $resultado === false) {
	    	die( print_r( sqlsrv_errors(), true) );
				}
				?>
				<select name="tipoE">
				<?php
				while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC))
				{
				?>
				<option value="<?php echo $row['idTipoE']?>">
				<?php echo $row['tipoE']; ?>
				</option>
				<?php
				}
				?>
				</select><br>
			  </div>



		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
			 </div>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
