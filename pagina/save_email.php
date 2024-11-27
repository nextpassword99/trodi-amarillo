<?php
if (isset($_POST['email'])) {
  $email = $_POST['email'];

  // Escapamos el correo electrónico para evitar problemas de seguridad
  $email = htmlspecialchars($email);

  // Establecemos la conexión con la base de datos
include 'dbConfig.php';

  // Creamos y ejecutamos la consulta SQL para insertar el correo electrónico en la base de datos
  $sql = "INSERT INTO emails (email) VALUES ('$email')";

  if (mysqli_query($conn, $sql)) {
    // Respondemos con un mensaje de éxito para que el script JavaScript lo interprete
    echo "success";
  } else {
    // Respondemos con un mensaje de error en caso de que haya un problema al guardar en la base de datos
    echo "Error al guardar el correo electrónico: " . mysqli_error($conn);
  }

  // Cerramos la conexión con la base de datos
  mysqli_close($conn);
}
?>