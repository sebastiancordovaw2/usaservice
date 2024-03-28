<?php
    
 
    include_once '../../helpers/index.php';
    $rutaArchivoEnv = '../../.env';
   
    // Cargar las variables de entorno desde el archivo .env
    try {
        $variablesEnv = cargarVariablesEnv($rutaArchivoEnv);
    } catch (Exception $e) {
        //die("Error: " . $e->getMessage());
    }

    // Utilizar las variables de entorno en tu aplicación
    $db_host = $variablesEnv['HOST'];
    $db_user = $variablesEnv['USER'];
    $db_pass = $variablesEnv['PASS'];
    $db_db   = $variablesEnv['DB'];



// Definición de las credenciales de la base de datos
$host = $db_host; // Dirección del servidor de la base de datos
$db = $db_db; // Nombre de la base de datos
$user = $db_user; // Nombre de usuario para acceder a la base de datos
$pass = $db_pass; // Contraseña para acceder a la base de datos

$local = "locaqlhost";
// Creación de una instancia de la clase mysqli para conectarse a la base de datos
$conexion = new mysqli($db_host, $user, $pass, $db);

// Verificación de si la conexión fue exitosa
if ($conexion->connect_error) {
    // En caso de error en la conexión, se muestra un mensaje de error y se termina el script
    die("Connection failed: " . $conexion->connect_error);
}
?>
