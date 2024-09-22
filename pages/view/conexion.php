<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registro_usuarios";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);
// Chequear conexión
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error); // Registrar el error
    echo "No se pudo conectar a la base de datos. Inténtelo más tarde."; // Mensaje amigable para el usuario
    exit(); // Asegura que el script no continúe ejecutándose
}
