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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar mas datos</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_empleado" name="guardar_empleado">
			<div id="resultados_ajax"></div>
			<div class="form-group">
			<div class="col-sm-8">
			<input type="hidden" class="form-control" id="codigo" name="codigo" >
			</div>
			</div>
				<div class="form-group">
				<div class="col-sm-8">
				  <input type="hidden" class="form-control" id="estad" name="estad" value="<?php echo $estado ?>">
				</div>
			  </div>

				<?php
				$query5 = "select * from [User] where IdUser='$ide'";
				$params5 = array();
				$options5 =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				$resultado5=sqlsrv_query($conexion,$query5, $params5, $options5);
				$row_count5 = sqlsrv_num_rows( $resultado5);

				if($row_count5>0){
					while ($row5 = sqlsrv_fetch_array($resultado2, SQLSRV_FETCH_ASSOC))
					{
						$estado=$row5['Active'];
					}
				}

				if($estado==0 && $row_count5==0){
					?>
					<div class="form-group">
					<label id="MotivoL" for="nombre" class="col-sm-3 control-label">Motivo Salida</label>
					<div class="col-sm-8">
					  <textarea type="text" class="form-control" id="motivo" name="motivo" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label id="FechSalidaL" for="nombre" class="col-sm-3 control-label">Fecha Salida</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="FechSalida" name="FechSalida" >
					</div>
				  </div>
					<?php
				}else if($estado==1){
					?>
					<?php
		      if($row_count1<1){ ?>
					<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Fecha ingreso</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="fecha_ing" name="fecha_ing" >
					</div>
				  </div>
					<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Jefe inmediato</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="jefe" name="jefe" >
					</div>
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

					<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Observaciones</label>
					<div class="col-sm-8">
					  <textarea type="text" class="form-control" id="obs" name="obs" ></textarea>
					</div>
				  </div>
					<?php
				}
				if($row_count<1){ ?>
					<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Nº Licencia</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="licen" name="licen" >
					</div>
				  </div>
					<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Fecha Vencimiento</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="fechaVenc" name="fechaVenc" >
					</div>
				  </div>
					<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Tipo Licencia</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="des" name="des" >
					</div>
				  </div>
					<?php } ?>
					<?php
				}

				if($row_count5>0 && $row_count1>0 && $row_count>0){
					?>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="guardar_datos" disabled>Guardar datos</button>
				  </div>
					<?php
				}else{
					?>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
				  </div>
					<?php
				}
				?>
		  </form>
			 </div>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
