<?php
class Region {
    private $id_region;
    private $name;
    
    private $db;
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function obtenerRegiones() {
        $query = "SELECT id_region, name FROM regions";
        $result = $this->db->query($query);

        $regiones = array();
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $regiones[] = $row;
            }
        }

        return $regiones;
    }
}
?>