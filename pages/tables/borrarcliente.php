<?php
// Verificar si se recibió un ID de membresía válido
if (isset($_POST['clienteId'])) {
    // Obtener el ID de membresía desde la solicitud
    $clienteId = $_POST['clienteId'];
    
    // Realizar la eliminación de la membresía en la base de datos
    require 'conn.php'; // Conexión a la base de datos

    $consulta = "DELETE FROM usuario WHERE Id_Usuario = :clienteId";
    $statement = $conexion->prepare($consulta);
    $statement->bindParam(':clienteId', $clienteId, PDO::PARAM_INT);
    
    // Ejecutar la consulta
    if ($statement->execute()) {
        // La membresía se eliminó correctamente
        echo "Cliente eliminado correctamente";
    } else {
        // Hubo un error al eliminar la membresía
        echo "Error al eliminar cliente";
    }
} else {
    // No se recibió un ID de membresía válido
    echo "ID de cliente no válido";
}
?>
