<?php
session_start();
require_once("../conexion.php");
require_once("../login.php");
if( $conexion == false){
    echo "Error in connection.\n";
    die( print_r( sqlsrv_errors(), true));
}
$username = $_POST['nombre'];
$password  = $_POST['pass'];

$tsql = "SELECT * FROM Usuario WHERE username='$username' AND user_password_hash='$password'";
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

  if ($row['username']==$_POST['nombre'] && $row['user_password_hash']==$_POST['pass']) {
    $_SESSION['valid_user'] = true;
    $_SESSION['nombre_usuario'] = $username;
    header('Location: ../empleados.php');

} else {
    header('Location: ../login.php');
    die();
}



?>
