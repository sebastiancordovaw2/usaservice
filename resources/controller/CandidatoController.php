<?php
// Incluye el archivo que define el modelo 'CandidatoModel'.
require_once '../model/CandidatoModel.php';


class CandidatoController {
    // Propiedad privada para almacenar una instancia del modelo 'Candidato'.
    private $candidato;

    // Constructor de la clase que recibe una conexión a la base de datos.
    public function __construct($dbConnection) {
        // Inicializa la propiedad 'candidato' con una nueva instancia de 'Candidato', pasando la conexión a la base de datos.
        $this->candidato = new Candidato($dbConnection);
    }

    // Método para generar opciones de un elemento 'select' HTML para los candidatos.
    function selectDeCandidatos($comuna, $selectedValue = null) {
        // Variable para acumular las opciones del 'select'.
        $options = '';
        // Obtiene los datos de los candidatos para una comuna específica usando el método 'obtenerCandidatos' del modelo.
        $data = $this->candidato->obtenerCandidatos($comuna);

        // Itera sobre cada uno de los candidatos obtenidos.
        foreach ($data as $item) {
            // Almacena el ID del candidato en la variable 'value'.
            $value = $item["id_candidato"];
            // Almacena el nombre del candidato en la variable 'label'.
            $label = $item["nombre"];
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
