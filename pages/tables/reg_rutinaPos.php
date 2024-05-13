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
$ClienteId = $_POST['cliente_id'];
//$repeticiones = $_POST['repeticiones'];
$Fecha = $_POST['fecha'];
$Ejercicios = $_POST['Id_Ejercicio'];
$Repeticiones = $_POST['quantity'];




// Insertar la nueva receta en la tabla "recetas"
$insertRecipeQuery = "INSERT INTO rutina (Id_Usuario, Fecha_Rutina) VALUES (:Id_Usuario, :Fecha_Rutina)";
$recipeStmt = $db->prepare($insertRecipeQuery);
$recipeStmt->execute([
  ':Id_Usuario' => $ClienteId,
  ':Fecha_Rutina' => $Fecha
]);


// Obtener el ID de la receta recién insertada
$recipeId = $db->lastInsertId();

// Insertar los ingredientes y sus cantidades en la tabla "recipe_ingredients"
$insertIngredientQuery = "INSERT INTO rutina_ejerccio (id_rutina, id_ejercicio, repeticiones) VALUES (:id_rutina, :id_ejercicio, :repeticiones)";
$ingredientStmt = $db->prepare($insertIngredientQuery);

for ($i = 0; $i < count($Ejercicios); $i++) {
  $Ejercicio = $Ejercicios[$i];
  $Repeticion = $Repeticiones[$i];

  $ingredientStmt->execute([
    ':id_rutina' => $recipeId,
    ':id_ejercicio' => $Ejercicio,
    ':repeticiones' => $Repeticion
  ]);
}




// Redireccionar a la página de visualización de recetas (opcional)
echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
          jQuery(function(){
            swal({
         title: "¡RUTINA AGREGADA EXITOSAMENTE!",
         text: "la rutina se agrego con exito",
         type: "success",        
    }, 
    function(){
         window.location.href = "clientes.php";
    })
          });
       </script>';
?>
