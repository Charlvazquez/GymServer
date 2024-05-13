<?php
// Verificar si se recibió un ID de membresía válido
if (isset($_POST['membresiaId'])) {
    // Obtener el ID de membresía desde la solicitud
    $membresiaId = $_POST['membresiaId'];
    
    // Realizar la eliminación de la membresía en la base de datos
    require 'conn.php'; // Conexión a la base de datos

    $consulta = "DELETE FROM Membresia WHERE Id_Membresia = :membresiaId";
    $statement = $conexion->prepare($consulta);
    $statement->bindParam(':membresiaId', $membresiaId, PDO::PARAM_INT);
    
    // Ejecutar la consulta
    if ($statement->execute()) {
        // La membresía se eliminó correctamente
        echo "Membresía eliminada correctamente";
    } else {
        // Hubo un error al eliminar la membresía
        echo "Error al eliminar la membresía";
    }
} else {
    // No se recibió un ID de membresía válido
    echo "ID de membresía no válido";
}
?>
