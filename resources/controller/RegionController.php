<?php
require_once '../resources/model/RegionModel.php';
class RegionController {
private $region;
    public function __construct($dbConnection) {
        $this->region = new Region($dbConnection);
    }

    function selectDeRegiones($selectedValue = null) {
        $options = '';
        $data = $this->region->obtenerRegiones();
        foreach ($data as $item) {
            $value = $item["id_region"];
            $label = $item["name"];
            $selected = ($selectedValue !== null && $selectedValue == $value) ? 'selected' : '';
            $options .= "<option value='$value' $selected>$label</option>";
        }
        return $options;
    }
}
?>