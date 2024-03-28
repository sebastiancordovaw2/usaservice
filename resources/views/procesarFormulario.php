<?php

require_once '../../config/db.php';
require_once '../controller/VotacionController.php';


if(isset($_POST["enviarFormulario"]))
{
    $votacionController = new VotacionController($conexion);
    $votacionController->registrar();
}
else if(isset($_GET["comunas"]))
{
    require_once '../controller/ComunaController.php';
    $comunasController = new ComunaController($conexion);
    $comunasController->selectDeComunas($_GET["region"]);

}
else if(isset($_GET["candidatos"]))
{
    require_once '../controller/CandidatoController.php';
    $candidatoController = new CandidatoController($conexion);
    $candidatoController->selectDeCandidatos($_GET["comuna"]);
}




?>