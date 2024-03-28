<?php

// Define la clase 'Region'.
class Region {
    // Propiedades privadas para almacenar el ID y el nombre de la región, y una conexión a la base de datos.
    private $id_region;
    private $name;
    
    private $db;

    // Constructor de la clase que recibe una conexión a la base de datos y la almacena en una propiedad privada.
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Método público para obtener todas las regiones de la base de datos.
    public function obtenerRegiones() {
        // Consulta SQL para seleccionar el ID y el nombre de todas las regiones.
        $query = "SELECT id_region, name FROM regions";
        // Ejecuta la consulta en la base de datos.
        $result = $this->db->query($query);

        // Prepara un arreglo vacío para almacenar las regiones obtenidas.
        $regiones = array();
        // Verifica si el resultado contiene filas.
        if ($result && $result->num_rows > 0) {
            // Itera sobre cada fila del resultado.
            while ($row = $result->fetch_assoc()) {
                // Añade cada fila (región) al arreglo de regiones.
                $regiones[] = $row;
            }
        }

        // Retorna el arreglo de regiones.
        return $regiones;
    }
}
?>
