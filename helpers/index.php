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
?>