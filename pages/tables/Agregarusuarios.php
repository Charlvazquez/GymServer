<?php
	
	session_start();
	
	if(!isset($_SESSION['Id_Usuario'])){
		header("Location: login.php");
	}
	
  $Id_Usuario = $_SESSION['Id_Usuario'];
	$nombre = $_SESSION['Nombre'];
  $tipo_usuario = $_SESSION['Id_Tipo'];
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php  echo $nombre;?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

    
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php switch($_SESSION['Id_Tipo']) {
				case 3:
          /*$tipo_usuario = $_SESSION['tipo_usuario']; 
          if($tipo_usuario == 1) { */?>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Menu Administrador
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Agregarusuarios.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="membresias.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Membresias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Agregar_TipoPago.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Tipo de Pago</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Agregar_ImMov.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Imagen Motivacional</p>
                </a>
              </li>    
              <li class="nav-item">
                <a href="clientesAdmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="entrenadoresList.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entrenadores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ver_membresias.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Membresias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="membresiasVencidas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Membresias Vencidas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipo_pagos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipos de Pago</p>
                </a>
              </li>
            </ul>
          </li>
          <?php break;
				case 2:/*}*/ ?> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Menu de Entranador
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="clientes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes Asignados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="avances.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Avances semanal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Agregar_ImMov.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Imagen Motivacional</p>
                </a>
              </li> 
            </ul>
          </li>
          <?php break;
				case 1:/*}*/ ?> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Menu de Cliente
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../clientes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <?php break;
			  } ?>  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Cerrar Sesion
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salir</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registrar Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Registro de usuarios</a></li>
              <li class="breadcrumb-item active">Formulario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro de Usuarios</h3>
              </div>
              <!-- form start -->
              <form action="usuariosPos.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Escribe un nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" id="exampleInputEmail1" placeholder="Escribe un apellidos">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Sexo</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="sexo">
                            <option value="Masculino" selected="selected">Masculino</option>
                            <option value="Femenino">Femenino</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <input type="text" name="correo" class="form-control" id="exampleInputEmail1" placeholder="Escribe un correo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <input type="text" name="contrasena" class="form-control" id="exampleInputEmail1" placeholder="Escribe una contraseña">
                  </div>

                  <div class="form-group">
                        <label for="exampleInputEmail1">Horario</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="horario">
                            <option value="Mañana" selected="selected">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche">Noche</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu telefono">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipo/Rol</label>
                        <select class="form-control select2" style="width: 100%;" name="tipo">
                            <?php
                            require 'conn.php';
                            // Realizar la consulta a la base de datos
                            $query = "SELECT * FROM tipo_usuario";

                            $stmt = $conexion->query($query);

                            // Iterar sobre los resultados y generar las opciones del select
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $row['Id_Tipo'] . '">' . $row['Descripcion'] . '</option>';
                            }
                            ?>
                        </select>
                  </div>   
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
