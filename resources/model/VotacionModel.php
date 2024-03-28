<?php

class Votacion {
    private $db;
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function insertarVotacion($id_candidato, $id_persona, $web, $tv, $redes_sociales, $amigo) {
        $stmt = $this->db->prepare("INSERT INTO votacion ( id_candidato, id_persona, web, tv, redes_sociales, amigo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $id_candidato, $id_persona, $web, $tv, $redes_sociales, $amigo);
        $stmt->execute();
        $stmt->close();
    }
}
?>