<?php

// Inclusión de los archivos que definen los modelos 'VotacionModel' y 'PersonaModel'.
require_once '../model/VotacionModel.php';
require_once '../model/PersonaModel.php';

// Definición de la clase 'VotacionController'.
class VotacionController {
    // Propiedades privadas para almacenar instancias de los modelos 'Votacion' y 'Persona'.
    private $votacion;
    private $persona;

    // Constructor de la clase, recibe una conexión a la base de datos.
    public function __construct($dbConnection) {
        // Inicialización de las propiedades con instancias de los modelos, pasando la conexión a la base de datos.
        $this->votacion = new Votacion($dbConnection);
        $this->persona = new Persona($dbConnection);
    }

    // Método público 'registrar' para manejar el registro de votaciones.
    public function registrar() {
        // Recolección de datos enviados mediante POST.
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $alias = $_POST['alias'];
        $rut = $_POST['rut'];
        $email = $_POST['email'];
        $region = $_POST['region'];
        $comuna = $_POST['comuna'];
        $candidato = $_POST['candidato'];

        // Inicialización de variables para almacenar cómo se enteró el votante de la votación.
        $web = false;
        $tv = false;
        $redes_sociales = false;
        $amigo = false;

        // Procesamiento de las vías por las que se enteró el votante.
        foreach ($_POST['via'] as $value) {
            if ($value == "web") {
                $web = true;
            }
            if ($value == "tv") {
                $tv = true;
            }
            if ($value == "redes_sociales") {
                $redes_sociales = true;
            }
            if ($value == "amigo") {
                $amigo = true;
            }
        }

        try {
            // Inserción de la persona en la base de datos y obtención del ID asignado.
            $id_persona = $this->persona->insertarPersona($nombre, $apellido, $alias, $rut, $email, $comuna);
            // Registro de la votación con la información recopilada.
            $this->votacion->insertarVotacion($candidato, $id_persona, $web, $tv, $redes_sociales, $amigo);
        } catch (Exception $e) {
            // En caso de error, se establece el código de respuesta HTTP a 409 y se muestra el mensaje de error.
            http_response_code(409);
            echo "Error: " . $e->getMessage();
            // Aquí se podrían realizar acciones adicionales, como registrar el error en un log.
        }
        
    }
}

?>
