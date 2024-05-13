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

$Nombre = $_POST['nombre'];
$Apellidos = $_POST['apellidos'];
$Tipo = $_POST['tipo'];
$Sexo = $_POST['sexo'];
$Correo = $_POST['correo'];
$Contrasena = $_POST['contrasena'];
$Horario = $_POST['horario'];
$Telefono = $_POST['telefono'];




// Insertar la nueva receta en la tabla "usuario_list"
$insertRecipeQuery = "INSERT INTO usuario (Nombre, Apellido, Sexo,password, Correo,Telefono, Horario, Id_Tipo) VALUES (:Nombre, :Apellido, :Sexo,:password, :Correo,:Telefono, :Horario, :Id_Tipo)";
$recipeStmt = $db->prepare($insertRecipeQuery);
$recipeStmt->execute([
  ':Nombre' => $Nombre,
  'Apellido' => $Apellidos,
  'Sexo' => $Sexo,
  'password' => $Contrasena,
  'Correo' => $Correo,
  'Telefono' => $Telefono,
  'Horario' => $Horario,
  'Id_Tipo' => $Tipo 
]);







// Redireccionar a la página de visualización de recetas (opcional)
echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
          jQuery(function(){
            swal({
         title: "¡EL USUARIO FUE AGREGADO EXITOSAMENTE!",
         text: "El usuario fue agregado con exito",
         type: "success",        
    }, 
    function(){
         window.location.href = "Agregarusuarios.php";
    })
          });
       </script>';
?>
