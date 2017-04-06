<?php
session_start();
require_once("../conexion.php");
require_once("../Usuario/usuario.php");
if( $conexion == false){
    echo "Error in connection.\n";
    die( print_r( sqlsrv_errors(), true));
}
$username = $_POST['nombre'];


$tsql = "SELECT * FROM User WHERE IdentificationNumber='$username'";
//$tsql="SELECT * FROM Usuario WHERE username=".$_POST["user_name"]."' AND user_password_hash='".$_POST['user_password']."'";

$stmt = sqlsrv_query( $conexion, $tsql);

/*if($stmt == true){
    $_SESSION['valid_user'] = true;
    $_SESSION['nombre'] = $username;

    header('Location: ../empleados.php');
    die();
}else{
    header('Location: ../login.php');
    die();
}*/
$row=sqlsrv_fetch_array($stmt);

  if ($row['IdentificationNumber']==$_POST['nombre']) {
    $_SESSION['valid_user'] = true;
    $_SESSION['nombre_usuario'] = $username;
    header('Location: ../Usuario/opciones_empleado.php');

} else {
    header('Location: ../Usuario/usuario.php');
    die();
}



?>
