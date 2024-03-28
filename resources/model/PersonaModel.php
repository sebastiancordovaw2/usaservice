<?php

class Persona {
    private $db;
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function insertarPersona($nombre, $apellido, $alias, $rut, $email, $comuna) {
        $stmt = $this->db->prepare("INSERT INTO personas ( nombre, apellido, alias, rut, email, id_city) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nombre, $apellido, $alias, $rut, $email, $comuna);
        if ($stmt->execute()) {
            $stmt->close();
            // Devuelve el ID del último usuario insertado
            return $this->db->insert_id;
        } else {
            $stmt->close();
            // Devuelve false si la inserción falla
            return false;
        }
    }
}
?>