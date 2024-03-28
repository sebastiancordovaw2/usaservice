<?php
// Define la clase 'Comuna'.
class Comuna {
    // Propiedades privadas para almacenar el ID de la ciudad, el nombre de la ciudad y una conexión a la base de datos.
    private $id_city;
    private $name;
    
    private $db;

    // Constructor de la clase. Recibe una conexión a la base de datos y la almacena en una propiedad privada.
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Método público para obtener comunas (ciudades) basado en la región especificada.
    public function obtenerComunas($region) {
        // Consulta SQL para seleccionar el ID y el nombre de las ciudades donde la región coincide con el parámetro dado.
        $query = "SELECT id_city, name FROM cities where id_region = $region";
        // Ejecuta la consulta en la base de datos.
        $result = $this->db->query($query);

        // Prepara un arreglo vacío para almacenar las comunas obtenidas.
        $comunas = array();
        // Verifica si el resultado contiene filas.
        if ($result && $result->num_rows > 0) {
            // Itera sobre cada fila del resultado.
            while ($row = $result->fetch_assoc()) {
                // Añade cada fila (comuna) al arreglo de comunas.
                $comunas[] = $row;
            }
        }

        // Retorna el arreglo de comunas.
        return $comunas;
    }
}
?>
