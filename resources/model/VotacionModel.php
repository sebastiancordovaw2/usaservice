<?php

// Define la clase 'Votacion'.
class Votacion {
    // Propiedad privada para almacenar una conexión a la base de datos.
    private $db;

    // Constructor de la clase que recibe una conexión a la base de datos y la almacena en una propiedad privada.
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Método público para insertar un registro de votación en la base de datos.
    public function insertarVotacion($id_candidato, $id_persona, $web, $tv, $redes_sociales, $amigo) {
        // Prepara una sentencia SQL para insertar el registro de votación, utilizando marcadores de posición '?' para los valores.
        $stmt = $this->db->prepare("INSERT INTO votacion (id_candidato, id_persona, web, tv, redes_sociales, amigo) VALUES (?, ?, ?, ?, ?, ?)");

        // Vincula los valores de los parámetros a los marcadores de posición en la sentencia SQL, especificando que todos son strings ('s').
        $stmt->bind_param("ssssss", $id_candidato, $id_persona, $web, $tv, $redes_sociales, $amigo);

        // Ejecuta la sentencia preparada.
        $stmt->execute();

        // Cierra la sentencia.
        $stmt->close();
    }
}
?>
