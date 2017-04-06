<?php
require_once ("../conexion.php");
	if (empty($_POST['fecha_ing'])) {
           $errors[] = "Nombre vacío";
        } else if (!empty($_POST['fecha_ing'])){

					$cod=$_POST["codigo"];
					$fecha=$_POST["fecha_ing"];
					$obs=$_POST["obs"];
					$jefe=$_POST["jefe"];
					$tipoS=$_POST["tipoS"];
					$tipoE=$_POST["tipoE"];


					$sql="INSERT INTO empleado(IdUser,fechaIng,observaciones,jefeInme,idTipoS,idTipoE)
						VALUES ('$cod','$fecha','$obs','$jefe','$tipoS','$tipoE')";
						$recurso=sqlsrv_prepare($conexion,$sql);


						if( $recurso === false) {
			    	die( print_r( sqlsrv_errors(), true) );
						}


						if(sqlsrv_execute($recurso)){
							echo"Agregado correctamente";
						}
						else
						{
							echo"Datos ya existen";
						}

		}

			if (!empty($_POST['licen'])) {
					$cod=$_POST["codigo"];
					 $numLic=$_POST["licen"];
					 $fechaVen=$_POST["fechaVenc"];
					 $tipoLic=$_POST["des"];

					 $sql2	="INSERT INTO licencia(numLicencia,fechaVenc,descripcion,codigo)
						VALUES ('$numLic','$fechaVen','$tipoLic','$cod')";
						$recurso2=sqlsrv_prepare($conexion,$sql2);
						if( $recurso2 === false) {
			    	die( print_r( sqlsrv_errors(), true) );
						}


						if(sqlsrv_execute($recurso2)){
							echo"Agregado correctamente";
						}
						else
						{
							echo"Datos ya existen";
						}

						}

							$estado=$_POST["estad"];
							$codi=$_POST["codigo"];
						 if($estado==0){
							 $estado1="Pasivo";
							 $Motivo=$_POST["motivo"];
							 $FechSalida=$_POST["FechSalida"];
							 $sql3	="INSERT INTO estado(estado,fechaSal,motivo,codigo)
								 VALUES ('$estado1','$FechSalida','$Motivo','$codi')";
								 $recurso3=sqlsrv_prepare($conexion,$sql3);

								 if( $recurso3 === false) {
		 			    	die( print_r( sqlsrv_errors(), true) );
		 						}

								 if(sqlsrv_execute($recurso3)){
									 echo"Agregado correctamente";
								 }
								 else
								 {
									 echo"Datos ya existen";
									 die( print_r( sqlsrv_errors(), true) );
								 }
						 }




?>
