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
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
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
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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

      <!-- Sidebar Menu -->
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
                <a href="pages/tables/Agregarusuarios.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/membresias.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Memebresia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/Agregar_TipoPago.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Tipo de Pago</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/Agregar_ImMov.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Imagen Motivacional</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/clientesAdmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/entrenadoresList.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entrenadores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/ver_membresias.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Membresias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/membresiasVencidas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Membresias Vencidas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/tipo_pagos.php" class="nav-link">
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
                Menu de Entrenador
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/tables/AgregarCatEj.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Categoria Ejercicios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/AgregarEjercicios.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Ejercicios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/clientes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes Asignados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/avances.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Avances semanal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/Agregar_ImMov.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Imagen Motivacional</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="pages/tables/ListaCategorias.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/ListaEjercicios.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Ejercicios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/lista_maquinas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Maquina</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/lista_avances.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Avances</p>
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
                <a href="clientes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pagoscliente.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Imprimir Pago Membresia</p>
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
                <a href="logout.php" class="nav-link">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Bienvenido <?php  echo $nombre;?></b></h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <p>Bienvenido al Sistema de administracion de GymSystem. 
            </p>
            <strong>Entre las tareas que el sistema puede realizar son:</strong>
            <div>
              <b><i class="fas fa-chart-pie"></i> Dar Altas y Bajas de usuarios.</b><br>
              <b><i class="fas fa-user"></i> Creacion de ejercicios y rutinas para cada cliente</b><br>
              <b><i class="fas fa-download"></i> Administracion de Membresias</b><br>
            </div>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
