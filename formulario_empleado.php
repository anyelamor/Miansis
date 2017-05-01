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
<!Doctype html>
<meta http-equiv="Content-type" content="text/html" charset="utf-8"/>
<html>

<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Empleados</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
  <body data-image="assets/img/sidebar-1.jpg">
		<div class="wrapper">

<div class="main-panel">
	<div class="content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-11">
	                <div class="card">
	                    <div class="card-header" data-background-color="blue">
	                        <h4 class="title">Datos Generales</h4>
	                    </div>

	                    <div class="card-content">
												<form class="">
													<div class="row">
														<div class="col-md-11">
						<div class="form-group label-floating">
							<label class="control-label">Aspecto a evaluar</label>
							<input type="text" class="form-control" name="aspecto" required>
						</div>
						</div>
						</div>
												</form>
	            </div>
	        </div>
	    </div>
	</div>
	</div>
</div>
</div>
</div>
  </body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
