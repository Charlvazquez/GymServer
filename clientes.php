<?php
	
	session_start();
	
	if(!isset($_SESSION['Id_Usuario'])){
		header("Location: login.php");
	}
	
  $Id_Usuario = $_SESSION['Id_Usuario'];
	$nombre = $_SESSION['Nombre'];
  $tipo_usuario = $_SESSION['Id_Tipo'];

  require './pages/tables/conn.php';
  $consulta_membresia = "SELECT * FROM membresia WHERE Id_Usuario = $Id_Usuario AND FechaVencimiento = CURDATE()";
  $resultado_membresia = $conexion->query($consulta_membresia);
  if ($resultado_membresia->rowCount() > 0) {
      // La membresía está vencida, muestra un alert sencillo
      echo "<script>
              window.onload = function() {
                alert('¡Alerta! Tu membresía ha expirado. Por favor, renueva tu membresía para continuar disfrutando de nuestros servicios.');
              };
            </script>";
  }
		
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
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
              <button class="col-md-4 col-xs-6 btn btn-danger" target="_blank"  onClick="descargarPDF(<?php echo $Id_Usuario; ?>);">
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF
                    </button> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Ejercicio</th>
                        <th>Repeticiones</th>
                        <th>Zona Corporal</th>
                        <th>Video</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    require './pages/tables/conn.php';
                    $consulta = "SELECT a.Fecha_Rutina, c.nombre,b.repeticiones,d.descripcion,c.video_ejercicio FROM rutina AS a 
                    LEFT JOIN rutina_ejerccio AS b ON a.Id_Rutina = b.id_rutina
                    LEFT JOIN ejercicio_list AS c ON b.id_ejercicio = c.Id_Ejercicio
                    LEFT JOIN categoria_ejercicios AS d ON c.id_categoria = d.id_categoria
                    WHERE a.Id_Usuario =  $Id_Usuario";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    $clientes=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($clientes as $cliente) {
                    ?>
                     <tr>
                              <td><?php echo $cliente['Fecha_Rutina']?> </td>
                              <td><?php echo $cliente['nombre']?> </td>
                              <td><?php echo $cliente['repeticiones']?> </td>
                              <td><?php echo $cliente['descripcion']?> </td>
                              <td><a href="<?php echo $cliente['video_ejercicio']?>" target="_blank"><?php echo $cliente['video_ejercicio']?></a> </td>
                            </tr>
                            <?php
                              }
                            ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
             <!-- DONUT CHART -->
             <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">AVANCES:</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            <div class="row">
              <div class="col-md-12">
                &nbsp;
              </div>
            </div>
  
            <!-- DIRECT CHAT -->
           
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  Imagen Motivacional
                </h3>
              </div>
              <div class="card" >
              <?php
                    require './pages/tables/conn.php';
                    $consulta = "SELECT *
                    FROM img_motivacional
                    WHERE Fecha = (SELECT MAX(Fecha) FROM img_motivacional);";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    $clientes=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($clientes as $cliente) {
                    ?>
                 <img class="card-img-top" src="dist/img/<?php echo $cliente['imagen']?>" alt="Card image cap">
                 <?php
                    }
                  ?>
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <!-- /.card-body
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>         
                </div>
              </div>-->
            </div>
            <!-- /.card -->           
          </section>
  
          <section class="content">
                <div class="container-fluid">
                    <h2 class="text-center display-4">Buscador</h2>
                    <div class="row">
                        <div class="col-md-9 offset-md-3">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg" name="keyword" placeholder="Escribe algo para buscar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default" name="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Display search results here -->
                    <?php
                      // Check if form is submitted
                      if(isset($_POST['submit'])) {
                          // Get search keyword
                          $keyword = $_POST['keyword'];

                          // Your SQL query here
                          // Ejemplo de conexión a la base de datos y consulta
                          require './pages/tables/conn.php';

                          // Sección para buscar ejercicios
                          $sql_ejercicios = "SELECT nombre, video_ejercicio FROM ejercicio_list WHERE nombre LIKE CONCAT('%', :keyword, '%')";
                          $stmt_ejercicios = $conexion->prepare($sql_ejercicios);
                          $stmt_ejercicios->bindValue(':keyword', $keyword);
                          $stmt_ejercicios->execute();
                          $resultados_ejercicios = $stmt_ejercicios->fetchAll(PDO::FETCH_ASSOC);

                          // Sección para buscar máquinas
                          $sql_maquinas = "SELECT a.nombre AS maquina, b.descripcion AS categoria FROM lista_maquina AS a
                                          LEFT JOIN categoria_ejercicios AS b ON a.id_categoria = b.id_categoria
                                          WHERE a.nombre LIKE CONCAT('%', :keyword, '%')";
                          $stmt_maquinas = $conexion->prepare($sql_maquinas);
                          $stmt_maquinas->bindValue(':keyword', $keyword);
                          $stmt_maquinas->execute();
                          $resultados_maquinas = $stmt_maquinas->fetchAll(PDO::FETCH_ASSOC);

                          // Mostrar los resultados para ejercicios si existen
                          if ($stmt_ejercicios->rowCount() > 0) {
                              echo "<h3>Resultados de Ejercicios:</h3>";
                              echo "<table class='table'>";
                              echo "<thead><tr><th>Nombre</th><th>Video</th></tr></thead>";
                              echo "<tbody>";
                              foreach ($resultados_ejercicios as $fila) {
                                  echo "<tr>
                                  <td>".$fila['nombre']."</td>
                                  <td><a href='".$fila['video_ejercicio']."' target='_blank'>".$fila['video_ejercicio']."</a></td>
                                  </tr>";
                              }
                              echo "</tbody>";
                              echo "</table>";
                          } else {
                              echo "<p>No se encontraron resultados de Ejercicios.</p>";
                          }

                          // Mostrar los resultados para máquinas si existen
                          if ($stmt_maquinas->rowCount() > 0) {
                              echo "<h3>Resultados de Máquinas:</h3>";
                              echo "<table class='table'>";
                              echo "<thead><tr><th>Máquina</th><th>Categoría</th></tr></thead>";
                              echo "<tbody>";
                              foreach ($resultados_maquinas as $maquina) {
                                  echo "<tr><td>".$maquina['maquina']."</td><td>".$maquina['categoria']."</td></tr>";
                              }
                              echo "</tbody>";
                              echo "</table>";
                          } else {
                              echo "<p>No se encontraron resultados de Máquinas.</p>";
                          }
                      }
                    ?>

                </div>
            </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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
<!-- Page specific script -->
<script>
  $(function () {
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
    // Execute SQL query to get data from database
    <?php
    require './pages/tables/conn.php';
    $consulta = "SELECT AVG(IMC) AS IMC,AVG(PesoActual) as PesoActual,AVG(PorcentajeGrasa) as PorcentajeGrasa,AVG(PesoDeCarga) as PesoDeCarga FROM avances
    WHERE Id_Usuario =  $Id_Usuario";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $avances = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $labels = array('IMC', 'Peso Actual', 'Porcentaje de Grasa', 'Peso de Carga');
    $data = array();
    foreach ($avances as $avance) {
        $data[] = $avance['IMC'];
        $data[] = $avance['PesoActual'];
        $data[] = $avance['PorcentajeGrasa'];
        $data[] = $avance['PesoDeCarga'];
    }
    ?>
    var donutData = {
      labels: <?php echo json_encode($labels); ?>,
      datasets: [
        {
          data: <?php echo json_encode($data); ?>,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    };
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    });
  });
</script>
<script>
function descargarPDF(Id_Usuario) {
    // Redireccionar a reg_rutina.php con los parámetros necesarios
    window.location.href = 'fpdf/clienteRutinaPDF.php?id=' + Id_Usuario;
}

</script>
</body>
</html>
