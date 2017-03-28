	<?php
		if (isset($conexion))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="ModificarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Empleado</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_empleado" name="editar_empleado">
				<div id="resultados_ajax3"></div>
				<div class="form-group">
				<div class="col-sm-8">
				<input type="hidden" class="form-control" id="codigo3" name="codigo3" >
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-8">
				  <input type="hidden" class="form-control" id="estadMod" name="estadMod" value="<?php echo $estado ?>">
				</div>
			  </div>

				<?php if($row_count3>0){ ?>
	      <div class="form-group">
	        <label for="fechaS" class="col-sm-3 control-label">Fecha Salida</label>
	        <div class="col-sm-8">
	        <input type="text" class="form-control" name="fechaSMod" value="<?php echo $fechaS ?>">
	        </div>

				</div>
				<div class="form-group">
	      <label for="Moti" class="col-sm-3 control-label">Motivo</label>
	      <div class="col-sm-8">
	      <textarea type="text" class="form-control" name="MotiMod"> <?php echo $motiv ?> </textarea>
	      </div>
	      </div>
	      <?php } ?>

	      <?php
	      if($row_count1>0){ ?>
	      <div class="form-group">
	        <label for="TipoEmp" class="col-sm-3 control-label">Tipo Empleado</label>
	        <div class="col-sm-4">
	        <input type="text" class="form-control" name="TipoEmpMod" id='campo1' value="<?php echo $tipoEmpl2 ?>" readonly="readonly">
					</div>
					<div class="col-sm-4">
					<?php
					require_once("conexion.php");
					$query = "select * from tipoEmpleado";
					$resultado=sqlsrv_query($conexion,$query);
		      if( $resultado === false) {
		    	die( print_r( sqlsrv_errors(), true) );
					}
					?>
					<select id='slc'>
						<option value=""></option>
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
					</select>

	<script>
	var element = document.getElementById('slc');
	 element.addEventListener("change", function(){
	    var campo1 = document.getElementById('campo1');
	     campo1.value = this.options[this.selectedIndex].text;
	 });
	</script>
	        </div>
				</div>

				<div class="form-group">
	        <label for="FechaIngr" class="col-sm-3 control-label">Fecha Ingreso</label>
	        <div class="col-sm-8">
	        <input type="text" class="form-control" name="FechaIngrMod" value="<?php echo $fechaIng ?>">
	        </div>
				</div>
				<div class="form-group">
	      <label for="JefeInm" class="col-sm-3 control-label">Jefe Inmediato</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="JefeInmMod" value="<?php echo $jefeI ?>">
				</div>
	      </div>

	      <div class="form-group">
	        <label for="TipoSan" class="col-sm-3 control-label">Tipo Sangre</label>
	  			<div class="col-sm-4">
	  			<input type="text" class="form-control" name="TipoSanMod" id='campo2' value="<?php echo $tipoSan2 ?>" readonly="readonly">
				</div>
				<div class="col-sm-4">
					<?php
					require_once("conexion.php");
					$query = "select * from tipoSangre";
					$resultado=sqlsrv_query($conexion,$query);
					?>
					<select id='slc1'>
						<option value=""></option>
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
					</select>
					<script>
					var element = document.getElementById('slc1');
					 element.addEventListener("change", function(){
					    var campo1 = document.getElementById('campo2');
					     campo1.value = this.options[this.selectedIndex].text;
					 });
					</script>
	  			</div>
				</div>
				<div class="form-group">
	      <label for="obs" class="col-sm-3 control-label">Observaciones</label>
	      <div class="col-sm-8">
	      <textarea type="text" class="form-control" name="obsMod"><?php echo $obser ?></textarea>
	      </div>
	      </div>
	      <?php
	    } ?>

	      <?php if($row_count>0){ ?>
	      <div class="form-group">
	      <label for="Nlic" class="col-sm-3 control-label">Nº Licencia</label>
	      <div class="col-sm-8">
	      <input type="text" class="form-control" name="NlicMod" value="<?php echo $numeLicen ?>" >
	      </div>
				</div>
				<div class="form-group">
	      <label for="FechaVen" class="col-sm-3 control-label">Fecha Venc.</label>
	      <div class="col-sm-8">
	      <input type="text" class="form-control" name="FechaVenMod" value="<?php echo $fechaVenci ?>" >
	      </div>
				</div>
				<div class="form-group">
	      <label for="Descrip" class="col-sm-3 control-label">Descripción</label>
	      <div class="col-sm-8">
	      <input type="text" class="form-control" name="DescripMod" value="<?php echo $descrip ?>">
	      </div>
	      </div>
	      <?php }

				if($row_count3<1 && $row_count1<1 && $row_count<1){
					?>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="actualizar_datos1" disabled>Actualizar datos</button>
				  </div>
					<?php
				}else{
					?>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="actualizar_datos1">Actualizar datos</button>
				  </div>
					<?php
				}
				?>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
