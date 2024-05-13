<?php
// Datos de conexión
$host = 'localhost';
$dbname = 'gym';
$username = 'root';
$password = '';

try {
    // Crear una nueva instancia de PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configurar el modo de error de PDO para que lance excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Mensaje de conexión exitosa
 
} catch(PDOException $e) {
    // En caso de error, imprimir el mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
?>
