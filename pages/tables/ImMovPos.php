<?php
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
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $Imagen = $_FILES['imagen']['name']; // Nombre original del archivo
    $tempName = $_FILES['imagen']['tmp_name']; // Nombre temporal del archivo
    // Generar un nombre único para la imagen
    $imagenNombreUnico = uniqid('', true) . '_' . $Imagen;
    // Ruta donde se guardará la imagen en el servidor (ajusta esta ruta según tu configuración)
    $rutaImagen = '../../dist/img/' . $imagenNombreUnico;
    // Mover la imagen al directorio deseado
    move_uploaded_file($tempName, $rutaImagen);
    // Insertar la ruta de la imagen en la base de datos
    $insertRecipeQuery = "INSERT INTO img_motivacional (imagen, activo, Fecha) VALUES (:imagen, 1, NOW())";
    $recipeStmt = $db->prepare($insertRecipeQuery);
    $recipeStmt->execute([
        ':imagen' => $imagenNombreUnico // Guardar el nombre único de la imagen en la base de datos
    ]);
    // Redireccionar a la página de visualización de recetas (opcional)
    echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            jQuery(function(){
                swal({
                    title: "¡LA IMAGEN SE AGREGÓ EXITOSAMENTE!",
                    text: "La Imagen Motivacional que seleccionaste se agregó correctamente",
                    type: "success",        
                }, 
                function(){
                    window.location.href = "Agregar_ImMov.php";
                })
            });
        </script>';
} else {
    echo "Error al subir la imagen.";
}
?>
