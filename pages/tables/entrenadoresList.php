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
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                <a href="Agregar_Maquinas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Maquina</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Agregar_ImMov.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar Imagen Motivacional</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="lista_maquinas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Maquina</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="lista_avances.php" class="nav-link">
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
            <h1>Lista de Entrenadores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Entrenadores</a></li>
              <li class="breadcrumb-item active">Entradores del GYM</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Entrenador</th>
                        <th>Sexo</th>
                        <th>Horario</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    require 'conn.php';
                    $consulta = "SELECT a.Id_Usuario, CONCAT(a.Nombre, ' ', a.Apellido) AS nombre_completo,a.Sexo, a.Horario
                    FROM Usuario AS a
                    LEFT JOIN Tipo_Usuario AS b ON a.Id_Tipo = b.Id_Tipo
                    WHERE a.Id_Tipo = 2 ;";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    $clientes=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($clientes as $cliente) {
                    ?>
                     <tr>
                              <td><?php echo $cliente['Id_Usuario']?> </td>
                              <td><?php echo $cliente['nombre_completo']?> </td>
                              <td><?php echo $cliente['Sexo']?> </td>
                              <td><?php echo $cliente['Horario']?> </td>
                              <td> 
                                <button title="Visualizar Perfil" class="btn btn-info success-icon-notika" onclick="redirectMain(<?php echo $cliente['Id_Usuario']; ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button title="Eliminar Entrenador" class="btn btn-danger delete-icon" data-membresia="<?php echo $cliente['Id_Usuario']; ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                                </td>
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
      </div>
      <!-- /.container-fluid -->
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
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script>
function redirectMain(recetaId) {
    // Redireccionar a reg_rutina.php con los parámetros necesarios
    window.location.href = 'perfilcoach.php?id=' + recetaId;
}

// Eliminar entrenador
$(document).on('click', '.delete-icon', function() {
    var entrenadorId = $(this).data('membresia');
    if(confirm("¿Estás seguro de que deseas eliminar este Entrenador?")) {
        $.ajax({
            url: 'borrarentrenador.php',
            method: 'POST',
            data: { entrenadorId: entrenadorId },
            success: function(response) {
                // Recargar la página después de eliminar la membresía
                location.reload();
            }
        });
    }
});

</script>
<!-- Page specific script -->
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
