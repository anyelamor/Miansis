<?php
require_once ("../conexion.php");
  if(isset($_GET['id'])){
  $cod=$_GET['id'];
  echo $cod;
  $ideEmpleado=$_GET['idE'];

    $delete1=sqlsrv_query($conexion,"DELETE FROM llamadasAten WHERE idLlam='".$cod."'");

    if($delete1){
        ?>
         <script type="text/javascript">
                alert("Datos eliminados");
                window.location="../datosGEmp.php?id=<?php echo $ideEmpleado;?>";
        </script>
    <?php
    }else{
        ?>
         <script type="text/javascript">
                alert("Datos no eliminados");
                window.location="../datosGEmp.php";
        </script>
    <?php
    }
}
