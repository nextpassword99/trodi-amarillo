<?php
;
include 'dbConfig.php';
?>

<!DOCTYPE html>
<html lang="es-pe">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>El blog de Trodi</title>
  <link rel="icon" type="image/png"
    href="https://cdn.glitch.global/9fa909c3-bb5a-4778-8d16-ef06342fa4db/Logo.png?v=1689436653865.png" />
  <link rel="stylesheet" type="text/css" href="required/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Victor+Mono:wght@100&display=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans&display=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
</head>

<body>
<?php include 'layouts/header.php'?>
<section>
    <!--Bienvenida-->
    <div class="title-img d-flex justify-content-center align-items-center flex-column">
      <h1 style="font-family: 'Bungee Spice', cursive; font-size: 60px !important ">
        <center>EL BLOG DE TRODI</center>
      </h1>
      <center>
        <p>
          Se bienvenido a mi página web. Sé libre de ver el contenido que
          deseas.
        </p>
      </center>
      <a href="publication.php" class="btn btn-warning">Publicar</a>
    </div>
</section>

  <section>
    <hgroup>
      <div class="section1">
        <div class="text-title">
          <h1>Una búsqueda a lo inexplorado</h1>
        </div>
        <div class="text-texto">
          <p>
            El Blog Trodi es un proyecto personal creado con la finalidad de
            compartir contenido que encuentro interesante y agradable para mí.
            En esta página, compartiré diversas facetas de mi vida y experiencias.
          </p>
          <p>
            Acompáñame en este emocionante viaje en línea mientras exploramos
            juntos un universo de conocimiento y creatividad. Desde reseñas de
            libros hasta tutoriales de desarrollo web, encontrarás una amplia
            gama de contenido que espero que disfrutes tanto como yo al
            crearlo.
          </p>
        </div>
      </div>
    </hgroup>
  </section>

  <section>
    <div class="container mt-5 mb-5">
      <div class="container">
        <h2 class="display-4 fw-bold text-center mb-4">Últimas entradas</h2>
      </div>
      <div class="row">

        <!-- Nuevas entradas -->

        <?php

        // Obtener los datos desde la base de datos
        $sql = "SELECT * FROM `publicaciones` ORDER BY `id` DESC"; // Reemplaza 'nombre_tabla' con el nombre real de tu tabla
        $query = mysqli_query($conn, $sql);

        // Crear un string con el contenido HTML de los datos
        $contenido_html = '';

        if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            // Obtener los valores de cada columna de la base de datos
            $titulo = $row['titulo'];
            $descripcion = $row['contenido'];
            $imagen = $row['miniatura'];
            $enlace = $row['url'];


            // Limitar cantidad de palabras
            $titulo_corto = (strlen($titulo) > 10) ? substr($titulo, 0, 40) : $titulo;
            $descripcion_corta = (strlen($descripcion) > 100) ? substr($descripcion, 0, 180) : $descripcion;



            // Formato de cada entrada de contenido
            $contenido_html .= '<div class="col-12 col-sm-6 col-md-4 mt-2">';
            $contenido_html .= '<div class="card">';
            $contenido_html .= '<div class="title-img title-img-small" style="background-image: url(uploads/video/miniatura/' . $imagen . ');"></div>';
            $contenido_html .= '<div class="card-body">';
            $contenido_html .= '<h5 class="card-title">' . $titulo_corto . '</h5>';
            $contenido_html .= '<p class="card-text">' . $descripcion_corta . '</p>';
            $contenido_html .= '<a href="' . $enlace . '" class="btn btn-primary">Visitar</a>';
            $contenido_html .= '</div>';
            $contenido_html .= '</div>';
            $contenido_html .= '</div>';
          }
        } else {
          $contenido_html = '<p>No hay contenido disponible en este momento.</p>';
        }

        // Cerrar la conexión
        mysqli_close($conn);

        // Imprimir el contenido HTML de las entradas
        echo $contenido_html;
        ?>




        <!-- Fin entradas -->
      </div>
    </div>
  </section>

  <section class="mt-5 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-5">
          <img
            src="https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/undraw_blog_post_re_fy5x.svg?v=1689505808559"
            alt="Vector de hombre revisando un blog" class="img-fluid d-block" />
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
          <h3 class="mb-3">¡Visualiza nuestro contenido variado!</h3>
          <p>O puedes publicar tu mismo.</p>
          <a href="publication.php" class="btn btn-warning">
            Crear publicación
            <i class="bi bi-box-arrow-in-up-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container mt-5 mb-5">
      <form id="notificationForm">
        <label for="email" class="form-label">Notificar últimas actualizaciones</label>
        <div class="d-flex">
          <div class="flex-fill" style="margin-right: 8px">
            <input type="email" class="form-control" id="email" required />
          </div>
          <div>
            <button type="submit" class="btn btn-warning">Enviar</button>
          </div>
        </div>
      </form>
      <div id="notificationMessage" class="mt-3"></div>
    </div>
  </section>


  <!-- Carrusel -->
  <section>
    <div class="container mt-5 mb-5">
      <div class="carrusel">
        <div class="container">
          <h2 class="display-4 fw-bold text-center mb-4">Ultimas fotografías</h2>
        </div>
        <div class="carrusel-container">
          <div class="card">
            <div class="title-img title-img-small" style="
                  background-image: url(https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/Peru.jpg?v=1689529180689);
                "></div>
            <div class="card-body">
              <h5 class="card-title">Fotografía: Perú</h5>
              <span class="badge text-bg-info">Info</span>
            </div>
          </div>

          <div class="card">
            <div class="title-img title-img-small" style="
                  background-image: url(https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/Paloma.jpg?v=1689529143503);
                "></div>
            <div class="card-body">
              <h5 class="card-title">Piped Redirects</h5>
              <span class="badge text-bg-info">Info</span>
            </div>
          </div>

          <div class="card">
            <div class="title-img title-img-small" style="
                  background-image: url(https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/Ajedrez.jpg?v=1689529163035);
                "></div>
            <div class="card-body">
              <h5 class="card-title">Piped Redirects</h5>
              <span class="badge text-bg-info">Info</span>
            </div>
          </div>

          <div class="card">
            <div class="title-img title-img-small" style="
                  background-image: url(https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/Gato.jpg?v=1689529131668);
                "></div>
            <div class="card-body">
              <h5 class="card-title">Piped Redirects</h5>
              <span class="badge text-bg-info">Info</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
  <?php include 'layouts/footer.php' ?>
  </section>

  <!-- Resto del contenido de la página -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#notificationForm").submit(function (event) {
        event.preventDefault();
        var email = $("#email").val();

        $.ajax({
          type: "POST",
          url: "save_email.php",
          data: {
            email: email
          },
          success: function (response) {
            $("#notificationMessage").html(
              '<div class="alert alert-success">¡Gracias por registrarse! Hemos recibido su correo electrónico y pronto le enviaremos un mensaje de confirmación. Esté atento a su bandeja de entrada para verificar su dirección y comenzar a recibir nuestras últimas actualizaciones.</div>'
            );
            $("#email").val(
              ""); // Limpiar el campo de correo después del envío exitoso
          },
          error: function () {
            $("#notificationMessage").html(
              '<div class="alert alert-danger">Ha ocurrido un error. Inténtalo nuevamente más tarde.</div>'
            );
          }
        });
      });
    });
  </script>
</body>

</html>