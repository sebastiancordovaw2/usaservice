<?php

// Define la clase 'Persona'.
class Persona {
    // Propiedad privada para almacenar una conexión a la base de datos.
    private $db;

    // Constructor de la clase. Recibe una conexión a la base de datos y la almacena en una propiedad privada.
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Método público para insertar una nueva persona en la base de datos.
    public function insertarPersona($nombre, $apellido, $alias, $rut, $email, $comuna) {
        // Prepara una sentencia SQL para insertar una nueva persona. Utiliza marcadores de posición '?' para los valores que serán vinculados más adelante.
        $stmt = $this->db->prepare("INSERT INTO personas (nombre, apellido, alias, rut, email, id_city) VALUES (?, ?, ?, ?, ?, ?)");

        // Vincula las variables a los marcadores de posición de la sentencia SQL preparada. 'ssssss' especifica el tipo de las variables (s para string).
        $stmt->bind_param("ssssss", $nombre, $apellido, $alias, $rut, $email, $comuna);

        // Ejecuta la sentencia preparada. Si la ejecución es exitosa, cierra la sentencia.
        if ($stmt->execute()) {
            $stmt->close();
            // Devuelve el ID asignado al nuevo registro insertado.
            return $this->db->insert_id;
        } else {
            // Es una buena práctica cerrar la sentencia si no se hubiese hecho.
            $stmt->close();
            // En caso de fallo en la inserción, lanza una excepción con el mensaje de error y cierra la sentencia.
            throw new Exception("Error al insertar datos: " . $stmt->error);

            
        }
    }
}
?>
