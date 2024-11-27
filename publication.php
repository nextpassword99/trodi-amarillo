<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es-pe">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PUBLICACIONES - El blog de Trodi</title>
  <link rel="icon" type="image/png"
    href="https://cdn.glitch.global/9fa909c3-bb5a-4778-8d16-ef06342fa4db/Logo.png?v=1689436653865.png" />
  <link rel="stylesheet" type="text/css" href="required/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Victor+Mono:wght@100&display=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans&display=swap" rel="stylesheet" />
</head>

<body>
  <?php include 'layouts/header.php' ?>
  <style>
    .iframe-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 105vh;
      /* Ajusta la altura según tus necesidades */
    }

    .iframe-container iframe {
      width: 100%;
      height: 100%;
    }

    @media (min-width: 911px) {
      .iframe-container {
        height: 90vh;
      }
    }
  </style>

  <section>
    <!--Bienvenida-->
    <div class="container publication-title" style="margin-top: 3rem;">
      <h1>PUBLICACIONES</h1>
      <p>
        Este es un apartado para que puedas públicar tu propio contenido. Ten en cuenta que debes ser respetuoso
        y
        amable con los demas.
      </p>
    </div>
  </section>




  <!--Formulario de publicación-->
  <section>


    <?php

    if (isset($_SESSION['user'])) {
      ?>


      <div class="iframe-container">
        <iframe src="nueva_publicacion.php"></iframe>
      </div>

      <?php
    } else {
      echo '
  <div style="width: 90%; margin: 0 auto; margin-top: 5vh; margin-bottom: 5vh; font-family: cursive;">
    <div class="container" style="display: block; padding: 0px; max-width: 320px; border: 1px solid #ffca2c; border-radius: 10px; box-shadow: 3px 4px 4px rgba(0, 0, 0, 0.2);">
        <div style="padding: 10px; background-color: #ffca2c; border-top-left-radius: 6px; border-top-right-radius: 6px;">
            <h2>Estimado usuario<h2>
        </div>
        <div style="padding: 10px;">
            <p>
            Lo sentimos, pero para poder realizar publicaciones, es necesario iniciar sesión en su cuenta. 
            Por favor, <a href="sesion.php">inicie sesión</a> o <a href="registro.php">regístrese</a> para poder compartir su contenido. 
            ¡Gracias por su comprensión!
            </p>
        </div>
    </div>
  </div>
    ';
    }
    ?>

  </section>




  <!--Parte 2 practica-->



  <!--Pie de página-->
  <section>
    <?php include 'layouts/footer.php' ?>
  </section>

  <!-- Resto del contenido de la página -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>