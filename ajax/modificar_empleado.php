<?php
require_once ("../conexion.php");
	 if (!empty($_POST['TipoEmpMod']) and !empty($_POST['TipoSanMod'])){

					$cod1=$_POST["codigo3"];
					$fecha1=$_POST["FechaIngrMod"];
					$obs1=$_POST["obsMod"];
					$jefe1=$_POST["JefeInmMod"];
					$tipoS1=$_POST["TipoSanMod"];
					if($tipoS1=="O-"){
						$tipoS2=1;
					}else if($tipoS1=="O+"){
						$tipoS2=2;
					}else if($tipoS1=="A-"){
						$tipoS2=3;
					}else if($tipoS1=="A+"){
						$tipoS2=4;
					}else if($tipoS1=="B-"){
						$tipoS2=5;
					}else if($tipoS1=="B+"){
						$tipoS2=6;
					}else if($tipoS1=="AB-"){
						$tipoS2=7;
					}else if($tipoS1=="AB+"){
						$tipoS2=8;
					}
					$tipoE1=$_POST["TipoEmpMod"];
					if($tipoE1==="Permanente"){
						$tipoE2=1;
					}else if($tipoE1==="Contrato"){
						$tipoE2=2;
					}

					$sqlActualizar="UPDATE empleado SET fechaIng='$fecha1',observaciones='$obs1',jefeInme='$jefe1',idTipoS='$tipoS2',
					idTipoE='$tipoE2' where IdUser='$cod1'";
						$recurso=sqlsrv_prepare($conexion,$sqlActualizar);

						if( $recurso === false) {
			    	die( print_r( sqlsrv_errors(), true) );
						}

						if(sqlsrv_execute($recurso)){
							echo"Modificado correctamente";
						}
						else
						{
							echo"No se pudo modificar";
						}

		}

			if (!empty($_POST['licen'])) {
					$cod1=$_POST["codigo3"];
					 $numLic1=$_POST["NlicMod"];
					 $fechaVen1=$_POST["FechaVenMod"];
					 $tipoLic1=$_POST["DescripMod"];

					 $sql2Actualizar="UPDATE licencia SET numLicencia='$numLic1',fechaVenc='$fechaVen1',descripcion='$tipoLic1' where codigo='$cod1'";
						$recurso2=sqlsrv_prepare($conexion,$sql2Actualizar);
						if( $recurso2 === false) {
			    	die( print_r( sqlsrv_errors(), true) );
						}


						if(sqlsrv_execute($recurso2)){
							echo"Modificado correctamente";
						}
						else
						{
							echo"No se pudo modificar";
						}

						}

							$estado1=$_POST["estadMod"];
							$codi1=$_POST["codigo3"];
						 if($estado1==0){
							 $estado1="Pasivo";
							 $Motivo1=$_POST["MotiMod"];
							 $FechSalida1=$_POST["fechaSMod"];
							 $sql3Actualizar="UPDATE estado SET estado='$estado1',fechaSal='$FechSalida1',motivo='$Motivo1' where codigo='$codi1'";

								 $recurso3=sqlsrv_prepare($conexion,$sql3Actualizar);

								 if( $recurso3 === false) {
		 			    	die( print_r( sqlsrv_errors(), true) );
		 						}

								 if(sqlsrv_execute($recurso3)){
									 echo"Modificado correctamente";
								 }
								 else
								 {
									 echo"No se pudo modificar";
								 }
						 }
?>
