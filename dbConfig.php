<?php
// Archivo: config.php
// Configuración de la base de datos
$dbHost ='localhost'; // Dirección del servidor de la base de datos (por ejemplo, "localhost")
$dbUsername ='root'; // Usuario de la base de datos
$dbPassword ='123456'; // Contraseña de la base de datos
$dbDatabase ='contenido'; // Nombre de la base de datos
$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);

?>