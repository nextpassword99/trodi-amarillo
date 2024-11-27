<?php
session_start();
include 'dbConfig.php';
?>

<!DOCTYPE html>
<html lang="es-pe">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>TUTORIALES - El blog de Trodi</title>
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


  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

</head>

<body>
  <?php include 'layouts/header.php' ?>


  <section>

    <?php
    // Obtener los datos desde la base de datos
    $sql = "SELECT * FROM `tutoriales` ORDER BY `id` DESC LIMIT 1";
    $query = mysqli_query($conn, $sql);

    // Verificar si hay contenido en la base de datos
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        $titulo_des = $row['titulo'];
        $contenido_des = $row['contenido'];
        $url_des = $row['url'];

        // Limitar contenido
        $titulo_corto_des = (strlen($titulo_des) > 10) ? substr($titulo_des, 0, 64) : $titulo_des;
        $contenido_corto_des = (strlen($contenido_des) > 20) ? substr($contenido_des, 0, 200) : $contenido_des;

        echo '
          <div class="container">
            <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary" style="height: 30rem;">
              <div class="col-lg-6 px-0">
                <h1 class="display-4 fst-italic">' . $titulo_corto_des . '</h1>
                <p class="lead my-3">' . $contenido_corto_des . '</p>
                <p class="lead mb-0"><a href="' . $url_des . '" class="text-body-emphasis fw-bold">Sigue leyendo... </a></p>
              </div>
            </div>
          </div>
          ';
      }
    } else {
      echo 'Sin contenido';
    }
    ?>

    <div style="text-align: center">
      <button class="btn btn-warning" onclick="mostrarFormularioTutorial()">Crear publicación</button>
    </div>
    <div id="mostrar_formulario_tutorial" style="display: none;">
      <?php include 'nuevo_tutorial.php'; ?>
    </div>
  </section>


  <section class="container">
    <div class="row mt-5 mb-2">

      <?php


      // Obtener los datos desde la base de datos
      $sql = "SELECT * FROM `tutoriales` ORDER BY `id` DESC";
      $query = mysqli_query($conn, $sql);

      // Verificar si hay contenido en la base de datos
      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $titulo = $row['titulo'];
          $descripcion = $row['contenido'];
          $imagen = $row['imagen'];
          $enlace = $row['url'];
          $tipo = $row['tipo'];
          $create_on = $row['create_on'];

          $titulo_corto = (strlen($titulo) > 10) ? substr($titulo, 0, 30) . '...' : $titulo;
          $descripcion_corta = (strlen($descripcion) > 180) ? substr($descripcion, 0, 100) . '...' : $descripcion;
          ?>

          <div class="col-md-6">
            <div class="row g-0 border overflow-hidden flex-md-row mb-4" style="height: 280px">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">
                  <?= $tipo ?>
                </strong>
                <h2 class="mb-0">
                  <?= $titulo_corto ?>
                </h2>
                <div class="mb-1 text-body-secondary small">
                  <?= $create_on ?>
                </div>
                <p class="mb-auto">
                  <?= $descripcion_corta ?>
                </p>
                <a href="<?= $enlace ?>">Sigue leyendo</a>
              </div>
              <div class="col-auto d-none d-lg-block" style="max-width: 220px;">
                <img src="<?= $imagen ?>" alt="<?= $titulo ?>" style="height: 100%; width: 100%; object-fit: cover;">
              </div>
            </div>
          </div>

          <?php
        }
      } else {
        echo '<p>No hay contenido disponible en este momento.</p>';
      }

      // Cerrar la conexión
      mysqli_close($conn);
      ?>

    </div>
  </section>










  <!--Pie de página-->
  <section>
    <?php include 'layouts/footer.php' ?>
  </section>

  <!-- Resto del contenido de la página -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Mostrar formulario de crear publicacion photo.php
    function mostrarFormularioTutorial() {
      var nuevaPublicacion = document.getElementById('mostrar_formulario_tutorial');

      nuevaPublicacion.style.display = 'block';
    }

  </script>
</body>

</html>