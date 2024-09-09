<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "gestion_de_usuario";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);
// Chequear conexión
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
 echo("conexion establecida");
?>