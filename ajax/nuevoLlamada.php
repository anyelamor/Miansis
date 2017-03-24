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

		}

?>
