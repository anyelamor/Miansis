<?php

session_start();
if($_SESSION['valid_user']!=true){
    header('Location: login.php');
    die();
}
	/* Connect To Database*/

	require_once ("conexion.php");//Contiene funcion que conecta a la base de datos
	$title="Empleados| JCR";


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>

    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div>
							<div class="form-group row ">
										<div class="col-md-4">
											<h4>Datos Generales</h4>
								</div>
                <div class="col-md-8">
                  <?php
                  $ide=$_GET['id'];
                  ?>
                  <a href="#" class='btn btn-default'  rel="abrir" title="<?php echo $ide;?>"  data-toggle="modal" data-target="#nuevoEmpleado"><i class="glyphicon glyphicon-plus"></i>Agregar datos</a>
                  <a href="#" class='btn btn-default'  rel="abrir" title="<?php echo $ide;?>"  data-toggle="modal" data-target="#nuevoEmpleado"><i class="glyphicon glyphicon-edit"></i>Modificar</a>
                  <a href="#" class='btn btn-default'  rel="abrir2" title="<?php echo $ide;?>"  data-toggle="modal" data-target="#llamadasAten"><i class="glyphicon glyphicon-list-alt"></i>Llamadas atención</a>

            </div>
							</div>
			</div>


		</div>
		<div class="panel-body">
      <form class="form-horizontal" role="form">
        <input type="hidden" class="form-control" id="q" placeholder="Nombre del empleado" >

        <?php

        $query = "select * from [User] where IdUser='$ide'";
        $resultado=sqlsrv_query($conexion,$query);

        while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC))
        {
          $nombre= $row['Name'];
          $identidad= $row['IdentificationNumber'];
          $sexo=$row['Gender'];
          $cumple=$row['Birthday'];
          $telefono=$row['PhoneNumber'];
          $celular=$row['MobileNumber'];
          $correo=$row['Email'];
          $direccion=$row['Address'];
          $cargo=$row['Position'];
          $sueldo=$row['HourSalary'];
        }

        $query1 = "select * from empleado, tipoSangre, tipoEmpleado where IdUser='$ide'";
        $resultado1=sqlsrv_query($conexion,$query1);

        while ($row1 = sqlsrv_fetch_array($resultado1, SQLSRV_FETCH_ASSOC))
        {
          $tipoSan= $row1['tipoS'];
          $fechaIng= $row1['fechaIng'];
          $tipoEmpl= $row1['tipoE'];
        }

        $query2 = "select * from licencia where codigo='$ide'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $resultado2=sqlsrv_query($conexion,$query2, $params, $options);
        $row_count = sqlsrv_num_rows( $resultado2);

        if($row_count>0){
          while ($row2 = sqlsrv_fetch_array($resultado2, SQLSRV_FETCH_ASSOC))
          {
            $numeLicen= $row2['numLicencia'];
            $fechaVenci= $row2['fechaVenc'];
            $descrip= $row2['descripcion'];
          }
        }else{
          $numeLicen= "";
          $fechaVenci= "";
          $descrip= "";
        }



        ?>
  			<input type="hidden" class="form-control" name="Id" value="<?php echo $ide ?>">

      <div class="form-group">

      <label for="Nombre" class="col-sm-1 control-label">Nombre</label>
			<div class="col-sm-5">
			<input type="text" class="form-control" name="Nombre" value="<?php echo $nombre ?>" readonly="readonly">
			</div>
      <label for="Identidad" class="col-sm-1 control-label">Identidad</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="Identidad" value="<?php echo $identidad ?>" readonly="readonly">
			</div>
      <label for="TipoSan" class="col-sm-1 control-label">Tipo Sangre</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="TipoSan" value="<?php echo $tipoSan ?>" readonly="readonly">
			</div>
      </div>

      <div class="form-group">
      <label for="Sexo" class="col-sm-1 control-label">Sexo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Sexo" value="<?php echo $sexo ?>" readonly="readonly">
      </div>
      <label for="FechaN" class="col-sm-1 control-label">Fecha Nac.</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaN" value="<?php echo date_format ( $cumple , 'd/m/y' ); ?>" readonly="readonly">
      </div>
      <label for="Telefono" class="col-sm-1 control-label">Teléfono</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Telefono" value="<?php echo $telefono ?>" readonly="readonly">
      </div>
      <label for="Celular" class="col-sm-1 control-label">Celular</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Celular" value="<?php echo $celular ?>" readonly="readonly">
      </div>
      </div>


      <div class="form-group">
      <label for="Correo" class="col-sm-1 control-label">Correo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Correo" value="<?php echo $correo ?>" readonly="readonly">
      </div>
      <label for="Direccion" class="col-sm-1 control-label">Dirección</label>
      <div class="col-sm-8">
      <input type="text" class="form-control" name="Direccion" value="<?php echo $direccion ?>" readonly="readonly">
      </div>
      </div>

      <div class="form-group">
      <label for="Cargo" class="col-sm-1 control-label">Cargo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Cargo" value="<?php echo $cargo ?>" readonly="readonly">
      </div>
      <label for="Sueldo" class="col-sm-1 control-label">Sueldo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Sueldo" value="<?php echo $sueldo ?>" readonly="readonly">
      </div>
      <label for="FechaIngr" class="col-sm-1 control-label">Fecha Ingreso</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaIngr" value="<?php echo $fechaIng ?>" readonly="readonly">
      </div>
      <label for="TipoEmp" class="col-sm-1 control-label">Tipo Empleado</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="TipoEmp" value="<?php echo $tipoEmpl ?>" readonly="readonly">
      </div>
      </div>

      <div class="form-group">
      <label for="JefeInm" class="col-sm-1 control-label">Jefe Inmediato</label>
			<div class="col-sm-5">
			<input type="text" class="form-control" name="JefeInm" readonly="readonly">
			</div>
      </div>

      <?php if($row_count>0){ ?>
      <div class="form-group">
      <label for="Nlic" class="col-sm-1 control-label">Nº Licencia</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Nlic" value="<?php echo $numeLicen ?>" readonly="readonly">
      </div>
      <label for="FechaVen" class="col-sm-1 control-label">Fecha Venc.</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaVen" value="<?php echo $fechaVenci ?>" readonly="readonly">
      </div>
      <label for="Descrip" class="col-sm-1 control-label">Descripción</label>
      <div class="col-sm-5">
      <input type="text" class="form-control" name="Descrip" value="<?php echo $descrip ?>" readonly="readonly">
      </div>
      </div>
      <?php } ?>
      <div>
        <h4>Llamadas de atención</h4>
      </div>
      <?php

      $query3 = "select * from llamadasAten where codigo='$ide'";
      $params3 = array();
      $options3 =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
      $resultado3=sqlsrv_query($conexion,$query3, $params3, $options3);
      $row_count3 = sqlsrv_num_rows( $resultado3);

      if ($row_count3>0){

  			?>
  			<div class="table-responsive">
  			  <table class="table">
  				<tr  class="info">
  					<th>Nº</th>
  					<th>Descripción</th>
  					<th>Fecha</th>
  					<th class='text-right'>Acciones</th>

  				</tr>
  				<?php
  				while ($row3=sqlsrv_fetch_array($resultado3, SQLSRV_FETCH_ASSOC)){
  						$idLlam=$row3['idLlam'];
  						$descripcion=$row3['descripcion'];
  						$fecha=$row3['fecha'];
  										?>

  					<input type="hidden" value="<?php echo $descripcion;?>" id="IdUser<?php echo $idLlam;?>">
  					<input type="hidden" value="<?php echo $fecha;?>" id="id<?php echo $idLlam;?>">

  					<tr>

  						<td><?php echo $idLlam; ?></td>
  						<td><?php echo $descripcion; ?></td>
  						<td><?php echo $fecha; ?></td>

  					<td >
  						<span class="pull-right">
  						<a href="datosGEmp.php?id=<?php echo $idLlam; ?>" class='btn btn-default' ><i class="glyphicon glyphicon-eye-open"></i></a>
  					</span></td>
  					</tr>
  					<?php
  				}
  				?>
  			  </table>
  			</div>
  			<?php
  		}
?>




		  </form>
			<?php
				include("modal/registro_empleados.php");
        include("modal/llamadasEmpl.php");
			?>
      <div id="resultados"></div><!-- Carga los datos ajax -->
      <div class='outer_div'></div><!-- Carga los datos ajax -->

  </div>
</div>

	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/empleados2.js"></script>
  </body>
</html>
