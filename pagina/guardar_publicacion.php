<?php
include 'dbConfig.php';

$urlMini = $_POST["urlMini"];
$urlVideo = $_POST["urlVideo"];
$tituloVideo = $_POST["tituloVideo"];
$descripcionVideo = $_POST["descripcionVideo"];
$linkDescarga = $_POST["linkDescarga1"];



// Crear y ejecutar la consulta SQL
$sql = "INSERT INTO publicaciones (miniatura, urlvideo, titulo, contenido) 
        VALUES ('$urlMini', '$urlVideo', '$tituloVideo', '$descripcionVideo')";

if (mysqli_query($conn, $sql)) {
    echo "La publicación se ha guardado correctamente.";
} else {
    echo "Error al guardar la publicación: " . mysqli_error($conn);
}

// Cerrar la conexión con la base de datos
mysqli_close($conn);
?>