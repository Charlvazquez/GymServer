<?php
// get_ingredients.php

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

// Obtener la lista de ingredientes desde la tabla "ingredients"
$ingredientsQuery = "SELECT Id_Ejercicio,nombre FROM ejercicio_list";
$ingredientsStmt = $db->prepare($ingredientsQuery);
$ingredientsStmt->execute();
$ingredients = $ingredientsStmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver la lista de ingredientes como respuesta JSON
header('Content-Type: application/json');
echo json_encode($ingredients);
?>