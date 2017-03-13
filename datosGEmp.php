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
							</div>
			</div>


		</div>
		<div class="panel-body">
      <form class="form-horizontal" method="post" id="guardar_empleado" name="guardar_empleado">

        <?php
        $ide=$_GET['id'];

        require_once("conexion.php");
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

        if ($row_count === false)
        echo "no cuenta";
        else
        echo $row_count;

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
        <div class="form-group">
  			<label for="Id" class="col-sm-1 control-label">Id</label>
  			<div class="col-sm-2">
  			<input type="text" class="form-control" name="Id" value="<?php echo $ide ?>">
  			</div>
        </div>

      <div class="form-group">

      <label for="Nombre" class="col-sm-1 control-label">Nombre</label>
			<div class="col-sm-5">
			<input type="text" class="form-control" name="Nombre" value="<?php echo $nombre ?>">
			</div>
      <label for="Identidad" class="col-sm-1 control-label">Identidad</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="Identidad" value="<?php echo $identidad ?>">
			</div>
      <label for="TipoSan" class="col-sm-1 control-label">Tipo Sangre</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="TipoSan" value="<?php echo $tipoSan ?>">
			</div>
      </div>

      <div class="form-group">
      <label for="Sexo" class="col-sm-1 control-label">Sexo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Sexo" value="<?php echo $sexo ?>">
      </div>
      <label for="FechaN" class="col-sm-1 control-label">Fecha Nac.</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaN" value="<?php echo date_format ( $cumple , 'd/m/y' ); ?>">
      </div>
      <label for="Telefono" class="col-sm-1 control-label">Teléfono</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Telefono" value="<?php echo $telefono ?>">
      </div>
      <label for="Celular" class="col-sm-1 control-label">Celular</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Celular" value="<?php echo $celular ?>">
      </div>
      </div>


      <div class="form-group">
      <label for="Correo" class="col-sm-1 control-label">Correo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Correo" value="<?php echo $correo ?>">
      </div>
      <label for="Direccion" class="col-sm-1 control-label">Dirección</label>
      <div class="col-sm-8">
      <input type="text" class="form-control" name="Direccion" value="<?php echo $direccion ?>">
      </div>
      </div>

      <div class="form-group">
      <label for="Cargo" class="col-sm-1 control-label">Cargo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Cargo" value="<?php echo $cargo ?>">
      </div>
      <label for="Sueldo" class="col-sm-1 control-label">Sueldo</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Sueldo" value="<?php echo $sueldo ?>">
      </div>
      <label for="FechaIngr" class="col-sm-1 control-label">Fecha Ingreso</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaIngr" value="<?php echo $fechaIng ?>">
      </div>
      <label for="TipoEmp" class="col-sm-1 control-label">Tipo Empleado</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="TipoEmp" value="<?php echo $tipoEmpl ?>">
      </div>
      </div>

      <div class="form-group">
      <label for="JefeInm" class="col-sm-1 control-label">Jefe Inmediato</label>
			<div class="col-sm-5">
			<input type="text" class="form-control" name="JefeInm" >
			</div>
      </div>

      <div class="form-group">
      <label for="Nlic" class="col-sm-1 control-label">Nº Licencia</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="Nlic" value="<?php echo $numeLicen ?>">
      </div>
      <label for="FechaVen" class="col-sm-1 control-label">Fecha Venc.</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" name="FechaVen" value="<?php echo $fechaVenci ?>">
      </div>
      <label for="Descrip" class="col-sm-1 control-label">Descripción</label>
      <div class="col-sm-5">
      <input type="text" class="form-control" name="Descrip" value="<?php echo $descrip ?>">
      </div>
      </div>

		  </form>



			<?php
				include("modal/registro_empleados.php");
				include("modal/editar_clientes.php");
			?>







  </div>
</div>

	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/empleados.js"></script>
  </body>
</html>
