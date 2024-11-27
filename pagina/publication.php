<?php

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

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Victor+Mono:wght@100&display=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans&display=swap" rel="stylesheet" />
</head>

<body>
  <?php include 'layouts/header.php' ?>

  <section>
    <!--Bienvenida-->
    <div class="publication-title">
      <h1>PUBLICACIONES</h1>
      <p>
        Este es un apartado para que puedas públicar tu propio contenido. Ten en cuenta que debes ser respetuoso
        y
        amable con los demas.
      </p>
    </div>
  </section>



  <div class="botones-container">
    <!-- Botones para mostrar/ocultar los includes -->
    <button class="btn btn-warning" onclick="mostrarChat()">Ver Chat</button>
    <button class="btn btn-warning" onclick="mostrarPublicacion()">Crear Publicación</button>
  </div>

  <!--Formulario de publicación-->
  <section>
    <div class="chat-container" id="chat-container">
      <?php include 'chat.php'; ?>
    </div>
    <div class="nueva_publicacion-container" id="publicacion-container">
      <?php include 'nueva_publicacion.php'; ?>
    </div>
  </section>




  <!--Parte 2 practica-->



  <!--Pie de página-->
  <section>
    <?php include 'layouts/footer.php' ?>
  </section>

  <!-- Resto del contenido de la página -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="required/script.js"></script>
</body>

</html>