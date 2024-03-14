<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendadb";

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

if($conexion-> connect_error){
    die("Error de conexion" . $conexion->connect_error);
}
?>