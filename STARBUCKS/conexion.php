<?php
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "Starbucks";

$conexion = new mysqli($host, $usuario, $password, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error . 
        "<br><b>Consejo:</b> Revisa que MySQL esté encendido en XAMPP y que la base de datos 'starbuks' exista.");
}
?>
