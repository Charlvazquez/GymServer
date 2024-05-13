<?php
// create_recipe.php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
// Establecer la conexión a la base de datos (ajusta los valores según tu configuración)
$host = 'localhost';
$dbname = 'gym';
$username = 'root';
$password = '';

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Error al conectar a la base de datos: ' . $e->getMessage());
}
$Id_Usuario = $_POST['id_cliente'];
$Id_Plan = $_POST['idplan'];
$Estado = $_POST['estado'];

// Actualizar la membresia en la base de datos
$updateQuery = "UPDATE membresia SET Estado = :Estado,Id_Plan = :Id_Plan WHERE Id_Usuario = :Id_Usuario";
$updateStmt = $db->prepare($updateQuery);
$updateStmt->execute([
  ':Id_Usuario' => $Id_Usuario,
  ':Id_Plan' => $Id_Plan,
  ':Estado' => $Estado
]);

// Redireccionar a la página de visualización de recetas (opcional)
echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
          jQuery(function(){
            swal({
         title: "¡MEMBRESIA ACTUALIZADA!",
         text: "La membresia del usuario se actualizo correctamente",
         type: "success",        
    }, 
    function(){
         window.location.href = "ver_membresias.php";
    })
          });
       </script>';
?>
