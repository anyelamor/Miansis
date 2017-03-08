<!DOCTYPE html>


<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>JCR | Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <!-- CSS  -->
   <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
 <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="post" accept-charset="utf-8" action="classes/log_action.php" name="loginform" autocomplete="off" role="form" class="form-signin">

					      <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" placeholder="Usuario" name="nombre" type="text" autofocus="" required >
                <input class="form-control" placeholder="Contraseña" name="pass" type="password"  autocomplete="off" required >
                <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" >Iniciar Sesión</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->
  </body>
</html>
