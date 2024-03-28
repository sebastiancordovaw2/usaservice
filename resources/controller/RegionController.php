<?php
// Incluye el archivo que define el modelo 'RegionModel'.
require_once '../resources/model/RegionModel.php';

// Define la clase 'RegionController'.
class RegionController {
    // Propiedad privada que almacenará una instancia del modelo 'Region'.
    private $region;

    // Constructor de la clase, que recibe una conexión a la base de datos.
    public function __construct($dbConnection) {
        // Inicializa la propiedad 'region' con una nueva instancia de 'Region', pasando la conexión a la base de datos.
        $this->region = new Region($dbConnection);
    }

    // Método para generar opciones de un elemento 'select' HTML para las regiones.
    function selectDeRegiones($selectedValue = null) {
        // Variable para acumular las opciones del 'select'.
        $options = '';
        // Obtiene los datos de las regiones usando el método 'obtenerRegiones' del modelo.
        $data = $this->region->obtenerRegiones();

        // Itera sobre cada una de las regiones obtenidas.
        foreach ($data as $item) {
            // Almacena el ID de la región en 'value'.
            $value = $item["id_region"];
            // Almacena el nombre de la región en 'label'.
            $label = $item["name"];
            // Determina si el valor actual debe estar seleccionado en base a 'selectedValue' proporcionado.
            $selected = ($selectedValue !== null && $selectedValue == $value) ? 'selected' : '';
            // Concatena la opción actual al string 'options', incluyendo los atributos 'value' y 'selected' según corresponda.
            $options .= "<option value='$value' $selected>$label</option>";
        }

        // Retorna las opciones generadas para ser incluidas en un elemento 'select' HTML.
        return $options;
    }
}
?>
