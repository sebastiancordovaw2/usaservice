<?php

// Incluir el archivo de configuración de la base de datos, que establece la conexión y la guarda en $conexion.
require_once '../../config/db.php';
// Incluir el controlador de votación para manejar las acciones relacionadas con las votaciones.
require_once '../controller/VotacionController.php';

// Comprobar si el formulario ha sido enviado.
if(isset($_POST["enviarFormulario"])) {
    // Instanciar el controlador de votación pasando la conexión a la base de datos.
    $votacionController = new VotacionController($conexion);
    // Llamar al método registrar() del controlador de votación para procesar la votación.
    $votacionController->registrar();
}
// Comprobar si la solicitud GET incluye la clave "comunas" para listar comunas basadas en una región específica.
else if(isset($_GET["comunas"])) {
    // Incluir el controlador de comunas.
    require_once '../controller/ComunaController.php';
    // Instanciar el controlador de comunas pasando la conexión a la base de datos.
    $comunasController = new ComunaController($conexion);
    // Llamar al método selectDeComunas() del controlador, pasando la región especificada en la solicitud GET.
    $comunasController->selectDeComunas($_GET["region"]);
}
// Comprobar si la solicitud GET incluye la clave "candidatos" para listar candidatos basados en una comuna específica.
else if(isset($_GET["candidatos"])) {
    // Incluir el controlador de candidatos.
    require_once '../controller/CandidatoController.php';
    // Instanciar el controlador de candidatos pasando la conexión a la base de datos.
    $candidatoController = new CandidatoController($conexion);
    // Llamar al método selectDeCandidatos() del controlador, pasando la comuna especificada en la solicitud GET.
    $candidatoController->selectDeCandidatos($_GET["comuna"]);
}
?>
