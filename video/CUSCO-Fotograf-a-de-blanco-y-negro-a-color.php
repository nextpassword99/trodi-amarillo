<?php

include '../dbConfig.php';
  ?>


<!DOCTYPE html>
<html lang='es-pe'>

<head>
  <meta charset='utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1' />
  <title>El blog de Trodi</title>
  <link rel='icon' type='image/png'
    href='https://cdn.glitch.global/9fa909c3-bb5a-4778-8d16-ef06342fa4db/Logo.png?v=1689436653865.png' />
  <link rel='stylesheet' type='text/css' href='styles.css' />
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' />
  <link rel='preconnect' href='https://fonts.googleapis.com' />
  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
  <link href='https://fonts.googleapis.com/css2?family=Victor+Mono:wght@100&display=swap' rel='stylesheet' />
  <link rel='preconnect' href='https://fonts.googleapis.com' />
  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
  <link href='https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans&display=swap' rel='stylesheet' />
</head>

<body>
  <?php include '../layouts/header.php'?>

  <!-- Contenido de la nueva publicación -->
  <section>

    <?php

    // Obtener los datos desde la base de datos
    $sql = "SELECT * FROM `publicaciones` WHERE id = 1"; // Remplazar el 'id' con la columna que identifica las filas
    $query = mysqli_query($conn, $sql);

    // Verificar si se encontró la fila
    if (mysqli_num_rows($query) > 0) {
      // Obtener la fila del id
      $row = mysqli_fetch_assoc($query);

      // Obtener los valores de cada columna de la base de datos
      $titulo = $row['titulo'];
      $descripcion = $row['contenido'];
      $urlvideo = $row['urlvideo'];

      // Formato de la entrada de contenido
      $contenido_html = '<div class="container mt-5">';
      $contenido_html .= '<h1 class="text-center mb-5">Video de YouTube</h1>';
      $contenido_html .= '<div class="row justify-content-center">';
      $contenido_html .= '<div class="col-md-8">';
      $contenido_html .= '<div class="video-container">';
      $contenido_html .= '<iframe src="' . $urlvideo . '" allowfullscreen></iframe>';
      $contenido_html .= '</div>';
      $contenido_html .= '<div class="video-info">';
      $contenido_html .= '<h3>' . $titulo . '</h3>';
      $contenido_html .= '<p>' . $descripcion . '</p>';
      $contenido_html .= '<h4>Links de descargas</h4>';
      $contenido_html .= '<a class="btn btn-warning" href="#" role="button">Link</a>';
      $contenido_html .= '</div>';
      $contenido_html .= '</div>';
      $contenido_html .= '</div>';
      $contenido_html .= '</div>';
    } else {
      $contenido_html = '<p>No se encontró la fila especificada.</p>';
    }

    // Cerrar la conexión
    mysqli_close($conn);

    // Imprimir el contenido HTML de la entrada
    echo $contenido_html;
    ?>



  </section>

  <!-- ... (El contenido del pie de página aquí) ... -->

  <?php include '../layouts/footer.php' ?>

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>