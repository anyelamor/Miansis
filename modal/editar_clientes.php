	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Empleado</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
			<div id="resultados_ajax2"></div>
			 <div class="form-group">
			 <label for="mod_identidadE" class="col-sm-3 control-label">Identidad</label>
			 <div class="col-sm-8">
				 <input type="text" class="form-control" id="mod_identidadE" name="mod_identidadE"  required>
				 <input type="hidden" name="mod_id" id="mod_id">
				  </div>
			 </div>
			 <div class="form-group">
			 <label for="mod_nombreE" class="col-sm-3 control-label">Nombre</label>
			 <div class="col-sm-8">
				 <input type="text" class="form-control" id="mod_nombreE" name="mod_nombreE"  required>
			 </div>
			 </div>

			   <div class="form-group">
				<label for="mod_fotoE" class="col-sm-3 control-label">Foto</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_fotoE" name="mod_fotoE">
				</div>
			  </div>

				<div class="form-group">
			 <label for="mod_telefonoE" class="col-sm-3 control-label">Teléfono</label>
			 <div class="col-sm-8">
				 <input type="text" class="form-control" id="mod_telefonoE" name="mod_telefonoE">
			 </div>
			 </div>

			 <div class="form-group">
		  <label for="mod_direccionE" class="col-sm-3 control-label">Dirección</label>
		  <div class="col-sm-8">
		 	 <input type="text" class="form-control" id="mod_direccionE" name="mod_direccionE">
		  </div>
		  </div>

			<div class="form-group">
		 <label for="mod_puestoE" class="col-sm-3 control-label">Puesto</label>
		 <div class="col-sm-8">
			<input type="text" class="form-control" id="mod_puestoE" name="mod_puestoE">
		 </div>
		 </div>

		 <div class="form-group">
		 <label for="mod_ingresoE" class="col-sm-3 control-label">Fecha de Ingreso</label>
		 <div class="col-sm-8">
		 <input type="text" class="form-control" id="mod_ingresoE" name="mod_ingresoE">
		 </div>
		 </div>

			   <div class="form-group">
				<label for="mod_estadoE" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_estadoE" name="mod_estadoE" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
				<div class="form-group">
			  <label for="mod_lla_atencionE" class="col-sm-3 control-label">Llamadas de Atención</label>
			  <div class="col-sm-8">
			  <input type="text" class="form-control" id="mod_lla_atencionE" name="mod_lla_atencionE">
			  </div>
			  </div>
				<div class="form-group">
				<label for="mod_observacionesE" class="col-sm-3 control-label">Observaciones</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="mod_observacionesE" name="mod_observacionesE">
				</div>
				</div>
				<div class="form-group">
				<label for="mod_cursosE" class="col-sm-3 control-label">Cursos</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="mod_cursosE" name="mod_cursosE">
				</div>
				</div>
				<div class="form-group">
			 <label for="mod_conduceE" class="col-sm-3 control-label">Conduce?</label>
			 <div class="col-sm-8">
				<select class="form-control" id="mod_conduceE" name="mod_conduceE" required>
				 <option value="">-- Selecciona tu respuesta --</option>
				 <option value="Si" selected>Si</option>
				 <option value="No">No</option>
				 </select>
			 </div>
			 </div>
			 <div class="form-group">
			 <label for="mod_licenciaE" class="col-sm-3 control-label">Licencia</label>
			 <div class="col-sm-8">
			 <input type="text" class="form-control" id="mod_licenciaE" name="mod_licenciaE">
			 </div>
			 </div>
			 <div class="form-group">
			 <label for="mod_ven_licenciaE" class="col-sm-3 control-label">Vencimiento de Licencia</label>
			 <div class="col-sm-8">
			 <input type="text" class="form-control" id="mod_ven_licenciaE" name="mod_ven_licenciaE">
			 </div>
			 </div>

			 		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
