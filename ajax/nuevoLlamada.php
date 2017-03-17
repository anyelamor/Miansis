<?php
	if (empty($_POST['codigo2'])) {
           $errors[] = "Nombre vacío";
        } else if (!empty($_POST['codigo2'])){
					/* Connect To Database*/
					require_once ("../conexion.php");

					$cod=$_POST["codigo2"];
					$descri=$_POST["desc"];
					$fecha=$_POST["fecha"];


					$sql="INSERT INTO llamadasAten(descripcion,fecha,codigo)
						VALUES ('$descri','$fecha','$cod')";
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
