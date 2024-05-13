<?php
	require "coon.php";	
	session_start();
	
	if($_POST){
		
		$Id_Usuario = $_POST['Id_Usuario']; //datos para no. de control
		$password = $_POST['password']; //contraseña de usuario	
		$sql = "SELECT Id_Usuario, Nombre, password, Id_Tipo FROM usuario WHERE Id_Usuario='$Id_Usuario'";
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num > 0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];
			
			if($password_bd == $password){ // Comparar sin hashear la contraseña
				$_SESSION['Id_Usuario'] = $row['Id_Usuario'];
				$_SESSION['Nombre'] = $row['Nombre'];
				$_SESSION['Id_Tipo'] = $row['Id_Tipo'];
				header("Location: index.php");
				exit();
			} else {
				echo "La contraseña no coincide";
			}
		} else {
			echo "No existe usuario";
		}
	}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  
      <img src="dist/img/user2-160x160.jpg" alt="GYM" width="250" height="250">
 
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesion</p>

      <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="No. de control" name="Id_Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn-block justify-content-center" style="background-color: #7030A0;">Iniciar Sesion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
