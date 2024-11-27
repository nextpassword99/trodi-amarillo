<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>El blog de Trodi</title>
  <link rel="icon" type="image/png"
    href="https://cdn.glitch.global/9fa909c3-bb5a-4778-8d16-ef06342fa4db/Logo.png?v=1689436653865.png" />

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
  <link rel="stylesheet" href="required/upload.css">
</head>

<body>

  <div class="container mt-5">
    <div class="contenedor-titulo">
      <h3 style="text-align: center">Crear publicación</h3>
    </div>
    <div class="elemento">
      <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="title" class="form-label">Título:</label>
          <input class="form-control" type="text" id="title" name="title" required><br><br>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Descripción:</label>
          <textarea class="form-control" id="description" name="description" required></textarea><br><br>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Añadir imagen</label>
          <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
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
    $uploadDirectory = 'uploads/';

    // Generar un nombre único para la imagen
    $uniqueImageName = uniqid() . '_' . $imageName;

    // Ruta completa de destino para guardar la imagen
    $uploadFilePath = $uploadDirectory . $uniqueImageName;

    // Mover el archivo de imagen al directorio de destino
    if (move_uploaded_file($imageTmpPath, $uploadFilePath)) {
      // La imagen se ha subido correctamente
  
  
      // Verificar si hay errores de conexión
      if ($conn->connect_error) {
        die('Error al conectar a la base de datos: ' . $conn->connect_error);
      }

      // Preparar la consulta para insertar los datos en la base de datos
      $stmt = $conn->prepare('INSERT INTO photo (titulo, descripcion, url) VALUES (?, ?, ?)');
      $stmt->bind_param('sss', $title, $description, $uploadFilePath);

      // Ejecutar la consulta
      if ($stmt->execute()) {
        // Los datos se han guardado correctamente en la base de datos
  
        // Ejemplo: Mostrar un mensaje de éxito
        echo 'Los datos se han guardado correctamente.';
      } else {
        // Error al guardar los datos en la base de datos
        echo 'Ocurrió un error al guardar los datos.';
      }

      // Cerrar la conexión y liberar recursos
      $stmt->close();
      $conn->close();
    } else {
      // Error al subir la imagen
      echo 'Ocurrió un error al subir la imagen.';
    }
  }
  ?>

</body>

</html>