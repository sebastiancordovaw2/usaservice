<?php
$host = 'localhost';
$db = 'usaservice';
$user = 'root';
$pass = '';
$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>