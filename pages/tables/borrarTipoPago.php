<?php
// Verificar si se recibió un ID de membresía válido
if (isset($_POST['PagoId'])) {
    // Obtener el ID de membresía desde la solicitud
    $PagoId = $_POST['PagoId'];
    
    // Realizar la eliminación de la membresía en la base de datos
    require 'conn.php'; // Conexión a la base de datos

    $consulta = "DELETE FROM tipo_pago WHERE Id_TipoDePago = :PagoId";
    $statement = $conexion->prepare($consulta);
    $statement->bindParam(':PagoId', $PagoId, PDO::PARAM_INT);
    
    // Ejecutar la consulta
    if ($statement->execute()) {
        // La membresía se eliminó correctamente
        echo "Tipo de pago Eliminado eliminado correctamente";
    } else {
        // Hubo un error al eliminar la membresía
        echo "Error al eliminar Tipo de Pago";
    }
} else {
    // No se recibió un ID de membresía válido
    echo "ID de Tipo de Pago no válido";
}
?>
