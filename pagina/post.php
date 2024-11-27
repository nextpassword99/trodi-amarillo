<?php
session_start();
if (isset($_SESSION['name'])) {
    $text = $_POST['text'];

    // Establecer la zona horaria a Lima, Perú
    date_default_timezone_set('America/Lima');

    // Obtener la hora actual en el formato deseado
    $horaLima = date("g:i A");

    $text_message = "<div class='msgln'><span class='chat-time'>" . $horaLima . "</span> <b class='user-name'>" . $_SESSION['name'] . "</b> " . stripslashes(htmlspecialchars($text)) . "<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>
