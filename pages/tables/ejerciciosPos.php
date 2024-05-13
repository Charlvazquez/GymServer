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

// Obtener los datos del formulario
$Ejercicio = $_POST['ejercico'];
$Categoria = $_POST['categoria'];
$Video = $_POST['video'];



// Insertar la nueva receta en la tabla "recetas"
$insertRecipeQuery = "INSERT INTO ejercicio_list (nombre,id_categoria,video_ejercicio) VALUES (:nombre, :id_categoria,:video_ejercicio)";
$recipeStmt = $db->prepare($insertRecipeQuery);
$recipeStmt->execute([
  ':nombre' => $Ejercicio,
  ':id_categoria' => $Categoria,
  ':video_ejercicio' => $Video
]);




// Redireccionar a la página de visualización de recetas (opcional)
echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
          jQuery(function(){
            swal({
         title: "¡SE AGREGO EJERCICIO EXITOSAMENTE!",
         text: "La Ejercicio se agrego con exito",
         type: "success",        
    }, 
    function(){
         window.location.href = "AgregarEjercicios.php";
    })
          });
       </script>';
?>
