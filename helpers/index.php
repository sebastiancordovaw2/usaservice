<?php 
function base_url(){
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

    // Obtener el nombre del host (dominio)
    $host = $_SERVER['HTTP_HOST'];

    // Obtener la ruta del directorio principal del proyecto
    $directory = dirname($_SERVER['PHP_SELF']);

    // Combinar todas las partes para formar la base URL
    $base_url = "$protocol://$host$directory/";

    // Imprimir la base URL
    return $base_url;
}

// Función para cargar las variables de entorno desde el archivo .env
function cargarVariablesEnv($rutaArchivoEnv) {
    // Leer el archivo .env línea por línea
    $lineas = file($rutaArchivoEnv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    if ($lineas === false) {
        throw new Exception("No se pudo leer el archivo .env");
    }
    
    // Inicializar un array para almacenar las variables de entorno
    $variablesEnv = array();
    
    foreach ($lineas as $linea) {
        // Separar la línea en el nombre y el valor de la variable
        list($nombre, $valor) = explode('=', $linea, 2);
        // Asignar la variable de entorno
        $variablesEnv[$nombre] = $valor;
    }

    return $variablesEnv;
}


?>