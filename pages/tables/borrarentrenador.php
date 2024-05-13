<?php
// Verificar si se recibió un ID de membresía válido
if (isset($_POST['entrenadorId'])) {
    // Obtener el ID de membresía desde la solicitud
    $entrenadorId = $_POST['entrenadorId'];    
    // Realizar la eliminación de la membresía en la base de datos
    require 'conn.php'; // Conexión a la base de datos
    $consulta = "DELETE FROM usuario WHERE Id_Usuario = :entrenadorId";
    $statement = $conexion->prepare($consulta);
    $statement->bindParam(':entrenadorId', $entrenadorId, PDO::PARAM_INT);  
    // Ejecutar la consulta
    if ($statement->execute()) {
        // La membresía se eliminó correctamente
        echo "Entrenador eliminado correctamente";
    } else {
        // Hubo un error al eliminar la membresía
        echo "Error al eliminar Entrenador";
    }
} else {
    // No se recibió un ID de membresía válido
    echo "ID de Entrenador no válido";
}
?>
