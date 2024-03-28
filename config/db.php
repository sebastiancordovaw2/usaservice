<?php
// Definición de las credenciales de la base de datos
$host = 'localhost'; // Dirección del servidor de la base de datos
$db = 'usaservice'; // Nombre de la base de datos
$user = 'root'; // Nombre de usuario para acceder a la base de datos
$pass = ''; // Contraseña para acceder a la base de datos

// Creación de una instancia de la clase mysqli para conectarse a la base de datos
$conexion = new mysqli($host, $user, $pass, $db);

// Verificación de si la conexión fue exitosa
if ($conexion->connect_error) {
    // En caso de error en la conexión, se muestra un mensaje de error y se termina el script
    die("Connection failed: " . $conexion->connect_error);
}
?>
