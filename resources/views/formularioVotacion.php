
<?php
require_once '../config/db.php';
require_once '../resources/controller/RegionController.php';

$Regiones = new RegionController($conexion);
$selectOptions = $Regiones->selectDeRegiones();
?>

<form id="votacion" method="post" class="max-w-md mx-auto bg-white p-8 mt-10 rounded shadow-md">
    <label for="nombre" class="block mt-2 mb-1">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required class="w-full px-3 py-2 mb-2 leading-tight border rounded appearance-none focus:outline-none focus:shadow-outline">

    <label for="apellido" class="block mt-2 mb-1">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required class="w-full px-3 py-2 mb-2 leading-tight border rounded appearance-none focus:outline-none focus:shadow-outline">

    <label for="alias" class="block mt-2 mb-1">Alias:</label>
    <input type="text" id="alias" name="alias" class="w-full px-3 py-2 mb-2 leading-tight border rounded appearance-none focus:outline-none focus:shadow-outline">

    <label for="rut" class="block mt-2 mb-1">RUT:</label>
    <input type="text" id="rut" name="rut" required pattern="\d{3,8}-[\d|kK]{1}" placeholder="Debe ingresar un RUT válido. Ej: 12.345.678-9" class="w-full px-3 py-2 mb-2 leading-tight border rounded appearance-none focus:outline-none focus:shadow-outline">

    <label for="email" class="block mt-2 mb-1">Email:</label>
    <input type="email" id="email" name="email" required class="w-full px-3 py-2 mb-2 leading-tight border rounded appearance-none focus:outline-none focus:shadow-outline">

    <label for="region" class="block mt-2 mb-1">Región:</label>
    <select id="region" name="region" class="w-full px-3 py-2 mb-2 leading-tight border rounded appearance-none focus:outline-none focus:shadow-outline">
        <option value="">Seleccione una Región</option>
        <?php echo $selectOptions; ?>
        <!-- Opciones de regiones -->
    </select>

    <label for="comuna" class="block mt-2 mb-1">Comuna:</label>
    <select id="comuna" name="comuna" class="w-full px-3 py-2 mb-2 leading-tight border rounded appearance-none focus:outline-none focus:shadow-outline">
        <option value="">Seleccione una Comuna</option>

        <!-- Opciones de comunas -->
    </select>

    <label for="candidato" class="block mt-2 mb-1">Candidato:</label>
    <select id="candidato" name="candidato" class="w-full px-3 py-2 mb-2 leading-tight border rounded appearance-none focus:outline-none focus:shadow-outline">
        <option value="">Seleccione un Candidato</option>

        <!-- Opciones de candidatos -->
    </select>

    <fieldset class="mb-4">
        <legend class="block mt-2 mb-1">¿Cómo se enteró de Nosotros?</legend>
        <label class="inline-flex items-center">
            <input type="checkbox" name="via[]" value="web" class="mr-2">
            Web
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="via[]" value="tv" class="mr-2">
            TV
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="via[]" value="redes_sociales" class="mr-2">
            Redes Sociales
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="via[]" value="amigo" class="mr-2">
            Amigo
        </label>
    </fieldset>

    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Enviar</button>
</form>

