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
  <?php include 'layouts/header.php'?>




  <main class="container" >
    <!-- Utiliza Bootstrap para el estilo -->
    <div class="container mt-5">
      <h3>Este es un tutorial rápido de como crear una publicación</h3>

      <p>
        En este tutorial, aprenderás paso a paso cómo crear una publicación en el blog de Trodi. Sigue las instrucciones
        a continuación para comenzar.
      </p>

      <h4>Paso 1: Agregar una miniatura</h4>
      <p style="margin-bottom: 0px;">
        Para agregar una miniatura a tu publicación, sigue estos pasos:
      <ol class="container list-group list-group-numbered">
        <li class="list-group-item" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
          <div class="ms-2 me-auto">
            Haz clic derecho en cualquier imagen que desees utilizar como miniatura.
          </div>
          <div class="container">
            <img src="img/1.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);">
          </div>
        </li>
        <li class="list-group-item" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
          <div class="ms-2 me-auto">
            Selecciona "Copiar dirección de la imagen" en el menú desplegable.
          </div>
          <div class="container">
            <img src="img/2.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);">
          </div>
        </li>
        <li class="list-group-item" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
          <div class="ms-2 me-auto">
            Pega la dirección de la imagen en el campo correspondiente en la página de creación de publicaciones.
          </div>
        </li>
      </ol>
      </p>

      <h4 class="mb-4">Paso 2: Añadir un video</h4>
      <p style="margin-bottom: 0px;">Para añadir un video a tu publicación, sigue estos pasos:</p>
      <ol class="container list-group list-group-numbered">
        <li class="list-group-item" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
          <div class="ms-2 me-auto">
            Encuentra un video en YouTube o en cualquier plataforma de videos según tu conveniencia.
          </div>
        </li>
        <li class="list-group-item" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
          <div class="ms-2 me-auto">
            Copia la url del video.
          </div>
          <div class="container">
            <label for="img" class="mb-0">Para YouTube</label>
            <img src="img/3.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);">
          </div>
          <div class="container">
            <label for="img" class="mb-0">Para otras páginas</label>
            <img src="img/4.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
              alt="Otra página">
          </div>
        </li>
        <li class="list-group-item" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
          <div class="ms-2 me-auto">
            (Solo para YouTube) Modifica la url cambiando "watch" por "embed"
          </div>
          <div class="container">
            <img src="img/5.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
              alt="Modificar watch">
          </div>
          <div class="container">
            <img src="img/6.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
              alt="Cambiar a embed">
          </div>
        </li>
        <li class="list-group-item" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
          <div class="ms-2 me-auto">
            (Solo para YouTube) Si deseas que se vea bien el video añade "?controls=0"
          </div>
          <div class="container">
            <img src="img/7.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
              alt="Añadir ?controls=0">
          </div>
        </li>
        <li class="list-group-item" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
          <div class="ms-2 me-auto">
            La URL del video debe de estar aquí
          </div>
          <div class="container">
            <img src="img/8.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
              alt="Pegar la url">
          </div>
        </li>
      </ol>

      <h4 class="mb-4">Paso 3: Título y descripción</h4>
      <p>
        Para el título de tu publicación, elige un título descriptivo y atractivo. Recuerda que en la página principal
        del
        blog de Trodi, solo se mostrarán los primeros 40 caracteres del título.
      </p>
      <div class="container">
        <img src="img/9.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
          alt="Título del video">
      </div>
      <p>
        En cuanto a la descripción del video, puedes utilizar tantas palabras como desees. Sin embargo, ten en cuenta
        que solo se mostrarán las primeras 180 palabras en la página principal. La página completa de la publicación
        mostrará todo el contenido. Si deseas resaltar ciertas partes del texto, puedes utilizar etiquetas HTML básicas 
        como &lt;b&gt; <b>para negrita</b>, &lt;i&gt; <i>para cursiva</i>, &lt;br&gt; para pasar a la siguiente línea y &lt;p&gt; para
        separar párrafos.
      </p>
      <div class="container">
        <img src="img/10.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
          alt="Descripción del video">
      </div>

      <h4 class="mb-4">Paso 4: Enlaces de descarga</h4>
      <p>
        El apartado de enlaces de descarga es opcional y se utiliza para agregar URLs de contenido relacionado. Si no
        tienes
        enlaces de descarga adicionales, simplemente puedes añadir el enlace del video que has agregado anteriormente en
        <b>Título del Video</b>.
      </p>
      <div class="container">
        <img src="img/11.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
          alt="Link de descarga">
      </div>

      <h4 class="mb-4">Paso 5: Guardar publicación</h4>
      <p>
        Una vez que hayas completado todos los pasos anteriores, asegúrate de hacer clic en el botón "Guardar
        publicación"
        para que tu nuevo contenido se muestre en la página principal del blog de Trodi.
      </p>
      <div class="container">
        <img src="img/12.png" class="img-fluid rounded" style="box-shadow: 10px 9px 6px 0px rgba(0,0,0,0.5);"
          alt="Botón de guardar publicación">
      </div>

      <p>
        Si encuentras algún problema durante el proceso, no dudes en contactarnos enviando un correo electrónico a
        inderscop@gmail.com. Estaremos encantados de ayudarte.
      </p>
    </div>
  </main>







  <!--Pie de página-->
  <section>
  <?php include 'layouts/footer.php' ?>
  </section>

  <!-- Resto del contenido de la página -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="required/script.js"></script>
</body>

</html>