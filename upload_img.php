<?php

if (isset($_SESSION['user'])) {
  ?>

  <body>
    <style>
      .file-upload-label {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        background-color: #ffc107;
        color: black;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        padding: 15px 40px;
        cursor: pointer;
        border-radius: 10px;
      }

      .file-upload-label:hover {
        transition: color .15s ease-in-out, background-color .15s ease-in-out;
        background-color: #ffd043;
      }

      .file-upload-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .file-upload-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
      }

      .file-selected-text {
        display: inline-block;
        margin-left: 10px;
        font-size: 14px;
        color: #333;
      }
    </style>
    <div class="container mt-5">
      <div class="contenedor-titulo">
        <h3 style="text-align: center">Crear publicación</h3>
      </div>
      <div class="elemento">
        <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="title" class="form-label">Título:</label>
              <input class="form-control" type="text" id="title" name="title" required><br>

              <!-- Cargar imagen -->
              <div class="mb-3">
                <div class="file-upload-img">
                  <label for="image" class="file-upload-label">
                    <span class="file-upload-text">Cargar imagen</span>
                    <input class="form-control file-upload-input" type="file" id="image" name="image" accept="image/*"
                      required>
                  </label>
                  <span id="selectedImg" class="file-selected-text"></span>
                </div>
              </div>
            </div>

            <div class="mb-3 col-md-6">
              <label for="description" class="form-label">Descripción:</label>
              <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>

          </div>
          <input type="submit" class="btn btn-warning" value="Crear publicación">
        </form>
      </div>
    </div>



    <?php
    include 'dbConfig.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Obtener los valores del título y la descripción del formulario
      $title = $_POST['title'];
      $description = $_POST['description'];

      // Obtener información sobre el archivo de imagen
      $image = $_FILES['image'];
      $imageName = $image['name'];
      $imageTmpPath = $image['tmp_name'];
      $imageError = $image['error'];

      // Directorio de destino para guardar la imagen
      $uploadDirectory = 'uploads/photo/';

      // Generar un nombre único para la imagen
      $uniqueImageName = uniqid() . '_' . str_replace(' ', '-', $imageName);

      // Ruta completa de destino para guardar la imagen
      $uploadFilePath = $uploadDirectory . $uniqueImageName;

      // Mover el archivo de imagen al directorio de destino
      if (move_uploaded_file($imageTmpPath, $uploadFilePath)) {
        // La imagen se ha subido correctamente
  
        // Nombre del usuario actual
        $user = $_SESSION['user'];

        // Preparar la consulta para insertar los datos en la base de datos
        $stmt = $conn->prepare('INSERT INTO photo (user, titulo, descripcion, url) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $user, $title, $description, $uploadFilePath);

        // Ejecutar la consulta
        if ($stmt->execute()) {
          // Los datos se han guardado correctamente en la base de datos
  
          // Ejemplo: Mostrar un mensaje de éxito
          echo '
        <div class="modal" tabindex="-1" id="alertSucces" >
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Nueva publicación</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <p>Tu publicación se ha creado exitosamente.</p>
                  <p><a href="photo.php" >Ver publicación</a><p>
              </div>
              <div class="modal-footer">
                  <a class="btn btn-warning" href="index.php" >Aceptar</a>
              </div>
              </div>
          </div>
        </div>
        ';
        } else {
          // Error al guardar los datos en la base de datos
          echo 'Ocurrió un error al guardar los datos.';
        }


      } else {
        // Error al subir la imagen
        echo 'Ocurrió un error al subir la imagen.';
      }
    }
    ?>


    <script type="application/javascript">
      // Cambiar nombre de archivo selecionado
      function handleFileInputChange(event) {
        const fileInput = event.target;
        const fileName = fileInput.files[0].name;
        const parentWrapper = fileInput.closest('.file-upload-img');
        const selectedLabel = parentWrapper.querySelector('.file-selected-text');

        selectedLabel.textContent = fileName;
      }

      const imageInput = document.getElementById('image');
      imageInput.addEventListener('change', handleFileInputChange);
    </script>

  </body>

  </html>

  <?php
} else {
  echo '
  <div style="width: 90%; margin: 0 auto; margin-top: 5vh; margin-bottom: 5vh;">
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