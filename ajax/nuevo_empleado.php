<?php
	if (empty($_POST['codigo'])) {
           $errors[] = "Nombre vacío";
        } else if (!empty($_POST['codigo'])){
					/* Connect To Database*/
					require_once ("../conexion.php");

					$cod=$_POST["codigo"];
					$sueldo=$_POST["sueldo"];
					$fecha=$_POST["fecha_ing"];
					$obs=$_POST["obs"];

					$estado=$_POST["estado"];
					$tipoS=$_POST["tipoS"];
					$tipoE=$_POST["tipoE"];

					if (empty($_POST['jefe'])) {
				          $jefe=1;
				        } else{
									$jefe=$_POST["jefe"];
								}


					$sql="INSERT INTO empleado(IdUser,sueldo,fechaIng,observaciones,jefeInme,idEstado,idTipoS,idTipoE)
						VALUES ('$cod','$sueldo','$fecha','$obs','$jefe','$estado','$tipoS','$tipoE')";
						$recurso=sqlsrv_prepare($conexion,$sql);


						if( $recurso === false) {
			    	die( print_r( sqlsrv_errors(), true) );
						}


						if(sqlsrv_execute($recurso)){
							echo"Agregado correctamente";
						}
						else
						{
							echo"Empleado ya existe";
							die( print_r( sqlsrv_errors(), true) );
						}

		} else {
			$errors []= "Error desconocido.";
		}

		if (isset($errors)){

			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong>
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){

				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>
