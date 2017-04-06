<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Usuarios Admin</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<style>
body{
  background-image: url('../img/controlEmpleados.png');

	background-size: 65% 45%;
	background-repeat: no-repeat;
	background-position: center top;
	background-attachment: fixed;
}
.bot {

transition: all 0.3s ease;

text-align: center;
 position: absolute;
 left:110px; /*A la derecha deje un espacio de 0px*/
 right:0px; /*A la izquierda deje un espacio de 0px*/
 bottom:300px; /*Abajo deje un espacio de 0px*/
 height:50px;
}
.bot a:hover{
margin-top: 2px;
}
.grow:hover {
  -webkit-transform: scale(1.1); -ms-transform: scale(1.1); transform: scale(1.1);
 }
 a{
   background-colo:  #ffffff;
   border: 5px solid #E0F2F7;
   float: left;
   margin: 15px;
   -webkit-transition: margin 0.5s ease-out;
   -moz-transition: margin 0.5s ease-out;
   -ms-transition: margin 0.5s ease-out;
   transition: margin 0.5s ease-out;
 }

</style>

</head>
<body>
  <div  class="bot">

    <a href="../empleados.php"><img src="../img/datosGenerales.png" height="180px" width="550px" ></a> &nbsp;
    <a href="control_usuario.php"><img src="../img/datosReloj.png" height="180px" width="550px" ></a>
      </div>

</body>
</html>
