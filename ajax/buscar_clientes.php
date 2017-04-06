<?php

	require_once("../conexion.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

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
					<th>Foto</th>
					<th>Identidad</th>
					<th>Nombre</th>
					<th>Cargo</th>
					<th>Estado</th>
					<th class='text-right'>Acciones</th>

				</tr>
				<?php
				while ($row=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
						$cod=$row['IdUser'];
						$id=$row['IdentificationNumber'];
						$identidad=$row['Name'];
						$nombre=$row['Position'];
						$puesto=$row['Active'];
						if($puesto==1){
							$puesto1="Activo";
						}else{
							$puesto1="Pasivo";
						}
						$Picture=$row['Picture'];
										?>

					<input type="hidden" value="<?php echo $cod;?>" id="IdUser<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $id;?>" id="id<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $identidad;?>" id="sueldo<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $nombre;?>" id="fechaIng<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $puesto1;?>" id="observaciones<?php echo $cod;?>">
					<input type="hidden" value="<?php echo $Picture;?>" id="jefeInme<?php echo $cod;?>">

					<tr>
						<td><?php echo $cod; ?></td>
						<td><?php echo $Picture;?></td>
						<td><?php echo $id; ?></td>
						<td><?php echo $identidad; ?></td>
						<td><?php echo $nombre;?></td>
						<td><?php echo $puesto1;?></td>

					<td >
						<span class="pull-right">
						<a title="VER DATOS" href="datosGEmp.php?id=<?php echo $cod; ?>" class='btn btn-default' ><i class="glyphicon glyphicon-eye-open"></i></a>
					</span></td>
					</tr>
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
