<?php
$serverName = "MICHELL-PC\sqlexpress, 1433";

$connectionInfo = array( "Database"=>"BDBioAdminSQL");
$conexion = sqlsrv_connect( $serverName, $connectionInfo);

if( $conexion ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>
