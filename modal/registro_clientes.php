	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
			<div id="resultados_ajax"></div>
			<div class="form-group">
			<label for="codigo" class="col-sm-3 control-label">Codigo</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="codigo" name="codigo" required>
			</div>
			</div>
			<div class="form-group">
			<label for="identidad" class="col-sm-3 control-label">Identidad</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="identidad" name="identidad" required>
			</div>
			</div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" required>
				</div>
			  </div>
				<div class="form-group">
				<label for="foto" class="col-sm-3 control-label">Foto</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="foto" name="foto" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telefono" name="telefono" >
				</div>
			  </div>

			  <div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="direccion" name="direccion"   maxlength="255" ></textarea>

				</div>
			  </div>
				<div class="form-group">
				<label for="puesto" class="col-sm-3 control-label">Puesto</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="puesto" name="puesto" >
				</div>
			  </div>
				<div class="form-group">
 			 <label for="ingreso" class="col-sm-3 control-label">Ingreso</label>
 			 <div class="col-sm-8">
 				 <input type="text" class="form-control" id="ingreso" name="ingreso" >
 			 </div>
 			 </div>
			 <div class="form-group">
			<label for="jefe" class="col-sm-3 control-label">Jefe Inmediato</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="jefe" name="jefe" >
			</div>
			</div>

			   <div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="estado" name="estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
				<div class="form-group">
				<label for="lla_atencion" class="col-sm-3 control-label">Llamadas Atención</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="lla_atencion" name="lla_atencion"   maxlength="255" ></textarea>

				</div>
				</div>
				<div class="form-group">
				<label for="observaciones" class="col-sm-3 control-label">Observaciones</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="observaciones" name="observaciones"   maxlength="255" ></textarea>

				</div>
				</div>
				<div class="form-group">
				<label for="cursos" class="col-sm-3 control-label">Cursos</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="cursos" name="cursos"   maxlength="255" ></textarea>

				</div>
				</div>
				<div class="form-group">
				<label for="conduce" class="col-sm-3 control-label">¿Conduce Vehículo?</label>
				<div class="col-sm-8">
				 <select class="form-control" id="conduce" name="conduce" required>
					<option value="">-- Seleccione su respuesta --</option>
					<option value="si" selected>Si</option>
					<option value="no">No</option>
				  </select>
				</div>
			  </div>
				<div class="form-group">
				<label for="licencia" class="col-sm-3 control-label">Licencia</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="licencia" name="licencia" >
				</div>
			  </div>
				<div class="form-group">
				<label for="venc_licencia" class="col-sm-3 control-label">Vencimiento de Licencia</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="venc_licencia" name="venc_licencia" >
				</div>
			  </div>





		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
