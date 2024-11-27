<?php
;
include 'dbConfig.php'
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
    <div class="galery-title">

      <div class="container mt-2">
        <h1>
          GALERIA DE FOTOGRAFIAS
        </h1>
        <p>
          Si bien mencionan que una foto vale más que mil palabras, aquí les dejo un apartado especialmente para el arte
          de la fotografía.
        </p>
      </div>
    </div>
  </section>

  <section>
    <div class="container mt-2">
      <div class="row">
        <!-- Inicio de entradas -->

        <?php
        // Obtener los datos desde la base de datos
        $sql = "SELECT * FROM `photo` ORDER BY `photo`.`id` DESC"; // Reemplaza 'nombre_tabla' con el nombre real de tu tabla
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            // Obtener los valores de cada columna de la base de datos
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
            $enlace = $row['url'];
            $createDate = $row['create_on'];

            // Formato de cada entrada de contenido
            echo '<div class="col-md-4">';
            echo '<div class="photo-card">';
            echo '<img src="' . $enlace . '" class="img-fluid rounded" alt="Foto 1" onclick="expandImage(this)" data-title="' . $titulo . '" data-description="' . $descripcion . '" data-create-on="' . $createDate . '">';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo '<p>No hay contenido disponible en este momento.</p>';
        }

        // Cerrar la conexión
        mysqli_close($conn);
        ?>

        <!-- Agregar más columnas para más fotos -->
      </div>
    </div>

    <!-- Modal para la imagen expandida -->
    <!-- Modal -->
    <div id="imageModal" class="modal">
      <div class="modal-content-all" style="max-width: 80%">
        <div id="modalContent">
          <div class="card mb-3" style="max-width: 99vh;">
            <div class="row g-0" style="align-items: center">
              <div class="col-md-4" style="text-align: center;">
                <img id="expandedImage" src="" class="img-fluid rounded-start zoom" alt="..."
                  style="padding: 5%; max-height: 50vh;">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title" id="modalTitle">Titulo</h5>
                  <p class="card-text" id="modalDescription">descripcion</p>
                  <p class="card-text"><small class="text-body-secondary" id="modalDate">create_on</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>

  </script>



  <section>
    <?php include 'layouts/footer.php' ?>
  </section>

  <!-- Resto del contenido de la página -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="required/script.js"></script>
</body>

</html>