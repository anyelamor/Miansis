<?php
session_start();
require_once("../conexion.php");


$username = $_POST['nombre'];
$tsql = "SELECT * FROM [User] WHERE IdentificationNumber='$username' ";
//$tsql="SELECT * FROM Usuario WHERE username=".$_POST["user_name"]."' AND user_password_hash='".$_POST['user_password']."'";
$params1= array();
$options1=array("Scrollable"=> SQLSRV_CURSOR_KEYSET);

$stmt = sqlsrv_query( $conexion, $tsql, $params1,$options1);
$row_count1= sqlsrv_num_rows ($stmt);

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

$emple = $_POST['nombre'];



  if ($row_count1 >0){
    ?>
<script type="text/javascript">
window.location="../Usuario/opciones_empleado.php?id=<?php echo $emple ?>";

</script>
<?php
  // header('Location: ../Usuario/opciones_empleado.php?id="$emple"');
    die();
  } else {
    header('Location: ../Usuario/usuario.php');
    die();
}






?>
