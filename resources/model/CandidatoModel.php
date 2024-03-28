<?php
// Define la clase 'Candidato'.
class Candidato {
    // Propiedades privadas para almacenar el ID, el nombre del candidato y una conexión a la base de datos.
    private $id;
    private $name;
    
    private $db;

    // Constructor de la clase. Recibe una conexión a la base de datos y la almacena en una propiedad privada.
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Método público para obtener candidatos basado en la comuna especificada.
    public function obtenerCandidatos($comuna) {
        // Consulta SQL para seleccionar información relevante de los candidatos donde la comuna coincide con el parámetro dado.
        $query = "SELECT id_candidato, nombre, partido_politico, fecha_de_nacimiento, cargo_postulado, biografia, email, telefono FROM candidato where id_city = $comuna";
        // Ejecuta la consulta en la base de datos.
        $result = $this->db->query($query);

        // Prepara un arreglo vacío para almacenar los candidatos obtenidos.
        $candidatos = array();
        // Verifica si el resultado contiene filas.
        if ($result && $result->num_rows > 0) {
            // Itera sobre cada fila del resultado.
            while ($row = $result->fetch_assoc()) {
                // Añade cada fila (candidato) al arreglo de candidatos.
                $candidatos[] = $row;
            }
        }

        // Retorna el arreglo de candidatos.
        return $candidatos;
    }
}
?>
