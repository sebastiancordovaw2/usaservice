<?php

require_once '../model/VotacionModel.php';
require_once '../model/PersonaModel.php';

class VotacionController {
    private $votacion;
    private $persona;
    public function __construct($dbConnection) {
        $this->votacion = new Votacion($dbConnection);
        $this->persona = new Persona($dbConnection);
    }

    public function registrar() {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $alias = $_POST['alias'];
        $rut = $_POST['rut'];
        $email = $_POST['email'];
        $region = $_POST['region'];
        $comuna = 13; //$_POST['comuna']
        $candidato = $_POST['candidato'];
        
        $web = false;
        $tv = false;
        $redes_sociales = false;
        $amigo = false;

        foreach ($_POST['via'] as $value) {
           if($value == "web")
           {
            $web = true;
           }
           if($value == "tv")
           {
            $tv = true;
           }
           if($value == "redes_sociales")
           {
            $redes_sociales = true;
           }
           if($value == "amigo")
           {
            $amigo = true;
           }
        }

        $id_persona = $this->persona->insertarPersona($nombre, $apellido, $alias, $rut, $email, $comuna);
        $this->modelo->insertarVotacion($candidato, $id_persona, $web, $tv, $redes_sociales, $amigo);
    }
}

?>