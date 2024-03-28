<?php
class Comuna {
    private $id_city;
    private $name;
    
    private $db;
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function obtenerRegiones($region) {
        $query = "SELECT id_city, name FROM cities where id_region = $region";
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