<?php
// Incluye el archivo que define el modelo 'ComunaModel'.
require_once '../model/ComunaModel.php';

// Define la clase 'ComunaController'.
class ComunaController {
    // Propiedad privada para almacenar una instancia del modelo 'Comuna'.
    private $comuna;

    // Constructor de la clase que recibe una conexión a la base de datos.
    public function __construct($dbConnection) {
        // Inicializa la propiedad 'comuna' con una nueva instancia de 'Comuna', pasando la conexión a la base de datos.
        $this->comuna = new Comuna($dbConnection);
    }

    // Método para generar opciones de un elemento 'select' HTML para las comunas.
    function selectDeComunas($region, $selectedValue = null) {
        // Variable para acumular las opciones del 'select'.
        $options = '';
        // Obtiene los datos de las comunas para una región específica usando el método 'obtenerComunas' del modelo.
        $data = $this->comuna->obtenerComunas($region);

        // Itera sobre cada una de las comunas obtenidas.
        foreach ($data as $item) {
            // Almacena el ID de la comuna en la variable 'value'.
            $value = $item["id_city"];
            // Almacena el nombre de la comuna en la variable 'label'.
            $label = $item["name"];
            // Determina si el valor actual debe estar seleccionado en base al 'selectedValue' proporcionado.
            $selected = ($selectedValue !== null && $selectedValue == $value) ? 'selected' : '';
            // Concatena la opción actual al string 'options', incluyendo los atributos 'value' y 'selected' según corresponda.
            $options .= "<option value='$value' $selected>$label</option>";
        }

        // Imprime las opciones generadas para ser incluidas en un elemento 'select' HTML.
        echo $options;
    }
}
?>
