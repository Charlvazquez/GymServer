<?php
// Verificar si se recibió un ID de membresía válido
if (isset($_POST['ejercicioId'])) {
    // Obtener el ID de membresía desde la solicitud
    $ejercicioId = $_POST['ejercicioId'];
    
    // Realizar la eliminación de la membresía en la base de datos
    require 'conn.php'; // Conexión a la base de datos

    $consulta = "DELETE FROM ejercicio_list WHERE Id_Ejercicio = :ejercicioId";
    $statement = $conexion->prepare($consulta);
    $statement->bindParam(':ejercicioId', $ejercicioId, PDO::PARAM_INT);
    
    // Ejecutar la consulta
    if ($statement->execute()) {
        // La membresía se eliminó correctamente
        echo "Ejercicio eliminado correctamente";
    } else {
        // Hubo un error al eliminar la membresía
        echo "Error al eliminar Ejercicio";
    }
} else {
    // No se recibió un ID de membresía válido
    echo "ID de Ejercicio no válido";
}
?>
