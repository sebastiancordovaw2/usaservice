<?php
require_once '../model/ComunaModel.php';
class ComunaController {
private $comuna;
public function __construct($dbConnection) {
    $this->comuna = new Comuna($dbConnection);
}

function selectDeComunas($region, $selectedValue = null) 
{
    $options = '';
    $data = $this->comuna->obtenerRegiones($region);
    foreach ($data as $item) {
        $value = $item["id_city"];
        $label = $item["name"];
        $selected = ($selectedValue !== null && $selectedValue == $value) ? 'selected' : '';
        $options .= "<option value='$value' $selected>$label</option>";
    }
    echo $options;
}
}
?>