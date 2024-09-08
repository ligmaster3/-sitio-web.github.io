<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "elecciones";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);
// Chequear conexión
if ($conn->connect_error) {
 echo("Connection failed: " . $conn->connect_error);
}
 echo("conexion establecida");
?>