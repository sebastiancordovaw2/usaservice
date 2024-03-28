<?php
class Candidato {
    private $id;
    private $name;
    
    private $db;
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function obtenerCandidatos($comuna) {
        $query = "SELECT id_candidato, nombre, partido_politico, fecha_de_nacimiento, cargo_postulado, biografia, email, telefono FROM candidato where id_city = $comuna";
        $result = $this->db->query($query);

        $comunas = array();
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comunas[] = $row;
            }
        }

        return $comunas;
    }
}
?>