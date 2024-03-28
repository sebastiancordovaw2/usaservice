<?php
 include_once '../helpers/index.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USASERVICE TEST</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/global.css" rel="stylesheet">

    <!---Se agrega la cdn de jQuery------>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="<?=base_url()?>js/validarFormularioVotacion.js"></script>
</head>
<body>

<?php
 include '../resources/views/formularioVotacion.php';
?>
</body>
</html>