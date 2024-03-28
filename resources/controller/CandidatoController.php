<?php
require_once '../model/CandidatoModel.php';
class CandidatoController {
private $candidato;
public function __construct($dbConnection) {
    $this->candidato = new Candidato($dbConnection);
}

function selectDeCandidatos($comuna, $selectedValue = null) 
{
    $options = '';
    $data = $this->candidato->obtenerCandidatos($comuna);
    foreach ($data as $item) {
        $value = $item["id_candidato"];
        $label = $item["nombre"];
        $selected = ($selectedValue !== null && $selectedValue == $value) ? 'selected' : '';
        $options .= "<option value='$value' $selected>$label</option>";
    }
    echo $options;
}
}
?>