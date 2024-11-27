<?php
// get_messages.php

// Iniciar la sesión
session_start();

// Incluir la configuración de la base de datos
include "dbConfig.php";

// Establecer conexión a la base de datos
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener mensajes desde la base de datos
$sql = "SELECT * FROM `chat_messages` ORDER BY create_on ASC";
$query = mysqli_query($conn, $sql);

// Crear un string con el contenido HTML de los mensajes
$messages_html = '';
$lastDate = "";




if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $messageTime = date("g:i A", strtotime($row['create_on'])); // Obtener la hora del mensaje

        // Mostrar la fecha como un mensaje único antes de los mensajes del día actual
        $messageDate = date("j F Y", strtotime($row['create_on']));
        if ($lastDate !== $messageDate) {
            $messages_html .= '<center><div class="date-message">' . $messageDate . '</div></center>';
            $lastDate = $messageDate;
        }


        // Escapar los caracteres especiales en el mensaje antes de mostrarlo
        $escapedMessage = htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8');


        // Obtener el nombre del usuario actual desde la sesión
        $nombre_usuario_actual = $_SESSION['user'];

        // Formato de mensajes
        $messages_html .= '<div class="container-msg">';


        // Agregar imagen predeterminada
        $image_url = ($row['user'] === $nombre_usuario_actual) ? 'img/imagen-usuario.png' : 'img/imagen-otro-usuario.png';
        $messages_html .= '<div class="' . ($row['user'] === $nombre_usuario_actual ? 'image-user' : 'image-other') . '">';
        $messages_html .= '<img src="' . $image_url . '" alt="Imagen de usuario" class="user-image">';
        $messages_html .= '</div>';


        $messages_html .= '<div class="container-name">';
        $messages_html .= '<div class="' . ($row['user'] === $nombre_usuario_actual ? 'user-name hidden' : 'other-name') . '">' . ($row['user'] !== $nombre_usuario_actual ? $row['user'] : '') . '</div>';
        $messages_html .= '</div>';

        $messages_html .= '<div class="' . ($row['user'] === $nombre_usuario_actual ? 'msg-user' : 'msg-other') . '">';
        $messages_html .= '<div class="' . ($row['user'] === $nombre_usuario_actual ? 'text-msg-user' : 'text-msg-other') . '">';
        $messages_html .= '<p class="msg-p">' . $escapedMessage . '</p>';
        $messages_html .= '</div>';
        $messages_html .= '<span class="message-time">' . $messageTime . '</span>';
        $messages_html .= '</div>';
        $messages_html .= '</div>';
    }
} else {
    $messages_html = '<div class="message"><p>No hay ninguna conversación previa.</p></div>';
}

// Cerrar la conexión
mysqli_close($conn);

// Devolver el contenido HTML de los mensajes
echo $messages_html;
?>