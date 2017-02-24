<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{

	$fetch = mysqli_query($con,"SELECT * FROM empleado where codEmpleado like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50");

	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$cod=$row['codEmpleado'];
		$row_array['value'] = $row['idEmpleado'];
		$row_array['codEmpleado']=$cod;
		$row_array['idEmpleado']=$row['idEmpleado'];
		$row_array['nomEmpleado']=$row['nomEmpleado'];
		$row_array['fotoEmpleado']=$row['fotoEmpleado'];
		array_push($return_arr,$row_array);
    }

}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>
