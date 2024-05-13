<?php
// Verificar si se recibió un ID de membresía válido
if (isset($_POST['categoriaId'])) {
    // Obtener el ID de membresía desde la solicitud
    $categoriaId = $_POST['categoriaId'];
    
    // Realizar la eliminación de la membresía en la base de datos
    require 'conn.php'; // Conexión a la base de datos

    $consulta = "DELETE FROM categoria_ejercicios WHERE id_categoria = :categoriaId";
    $statement = $conexion->prepare($consulta);
    $statement->bindParam(':categoriaId', $categoriaId, PDO::PARAM_INT);
    
    // Ejecutar la consulta
    if ($statement->execute()) {
        // La membresía se eliminó correctamente
        echo "Categoria eliminada correctamente";
    } else {
        // Hubo un error al eliminar la membresía
        echo "Error al eliminar Categoria";
    }
} else {
    // No se recibió un ID de membresía válido
    echo "ID de Categoria no válido";
}
?>
