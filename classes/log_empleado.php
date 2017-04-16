<?php
session_start();
require_once("../conexion.php");
require_once("../Usuario/usuario.php");

$username = $_POST['nombre'];
$tsql = "SELECT * FROM User WHERE IdentificationNumber='$username' ";
//$tsql="SELECT * FROM Usuario WHERE username=".$_POST["user_name"]."' AND user_password_hash='".$_POST['user_password']."'";

$stmt = sqlsrv_query( $conexion, $tsql);

if($stmt === false){
  die(print_r( sqlsrv_errors(),true));
}
/*if($stmt == true){
    $_SESSION['valid_user'] = true;
    $_SESSION['nombre'] = $username;

    header('Location: ../empleados.php');
    die();
}else{
    header('Location: ../login.php');
    die();
}*/

  if ($row['IdentificationNumber']==$_POST['nombre']) {

    header('Location: ../Administrador/administrador.php');

} else {
    header('Location: ../Administrador/administrador.php');
    die();
}






?>
