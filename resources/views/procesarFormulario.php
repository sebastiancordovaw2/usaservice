<?php

require_once '../../config/db.php';
require_once '../controller/VotacionController.php';


if($_POST)
{
    $votacionController = new VotacionController($conexion);
    $votacionController->registrar();
}
else if($_GET["comunas"])
{
    require_once '../controller/ComunaController.php';
    $comunasController = new ComunaController($conexion);
    $comunasController->selectDeComunas($_GET["region"]);

}
else if($_GET["candidatos"])
{

}




?>