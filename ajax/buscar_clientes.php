<?php

	require_once("../conexion.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['codigo'])){
		$id_cliente=intval($_GET['codigo']);
		$query=mysqli_query($con, "select * from empleado where codEmpleado='".$cod."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM empleado WHERE codEmpleado='".$cod."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php

		}

		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar éste  cliente. Existen facturas vinculadas a éste producto.
			</div>
			<?php
		}



	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = $_REQUEST['q'];
		 $aColumns = array('Name');//Columnas de busqueda
		 $sTable = "[User]";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = sqlsrv_query($conexion, "SELECT distinct count(*) AS numrows FROM $sTable  $sWhere");
		$row= sqlsrv_fetch_array($count_query, SQLSRV_FETCH_ASSOC);
		$numrows = $row['numrows'];
		echo $numrows;
		$total_pages = ceil($numrows/$per_page);
		$reload = './empleados.php';
		//main query to fetch the data
		$sql="SELECT distinct TOP $per_page * FROM  $sTable $sWhere";
		$query=sqlsrv_query($conexion,$sql);
		if( $query === false) {
		die( print_r( sqlsrv_errors(), true) );
		}
		//loop through fetched data
		if ($numrows>0){

			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Nº</th>
					<th>Identidad</th>
					<th>Nombre</th>
					<th>Cargo</th>
					<th>Tarjeta de proximidad</th>
					<th>Salario*H</th>
					<th class='text-right'>Acciones</th>

				</tr>
				<?php
				while ($row=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
						$cod=$row['IdUser'];
						$id=$row['IdentificationNumber'];
						$identidad=$row['Name'];
						$nombre=$row['Position'];
						$puesto=$row['ProximityCard'];
						$telefono=$row['HourSalary'];
										?>

					<input type="hidden" value="<?php echo $cod;?>" id="IdUser<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $id;?>" id="id<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $identidad;?>" id="sueldo<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $nombre;?>" id="fechaIng<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $puesto;?>" id="observaciones<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $telefono;?>" id="jefeInme<?php echo $cod;?>">

					<tr>

						<td><?php echo $cod; ?></td>
						<td><?php echo $id; ?></td>
						<td><?php echo $identidad; ?></td>
						<td><?php echo $nombre;?></td>
						<td><?php echo $puesto;?></td>
						<td><?php echo $telefono;?></td>

					<td ><span class="pull-right">
					<a href="#" class='btn btn-default'  rel="abrir" title="<?php echo $cod;?>"  data-toggle="modal" data-target="#nuevoEmpleado"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="#" class='btn btn-default' title='Borrar cliente' onclick="eliminar('<?php echo $cod; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>

					</tr>
					<script>

							$('a[rel="abrir"]').click(function(e) {
					            e.preventDefault();

					var temp = $(this).attr('title');// aca capturo en la variable temp lo que estaba en title
					//y si queres podes enviarla de vuelta a la pagina, fuera de la ventana modal:
					document.getElementById("codigo").value = temp; //aca le envio el valor de la variable temp al input de html con id org.
				})
					</script>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>
