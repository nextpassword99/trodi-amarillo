<!DOCTYPE html>
<html lang="es-pe">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear nueva publicación</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Victor+Mono:wght@100&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="required/nueva_publicacion.css">
</head>

<body>
    <div class="container mt-5">
        <div class="elemento">
            <div class="contenedor-titulo">
                <h3 class="text-center">Crear nueva publicación</h3>
            </div>
            <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="file-upload-wrapper">
                                    <label for="urlMini" class="file-upload-label">
                                        <span class="file-upload-text">Cargar Miniatura</span>
                                        <input class="form-control file-upload-input" type="file" id="urlMini"
                                            name="urlMini" accept="image/*" required>
                                    </label>
                                    <span id="selectedMini" class="file-selected-text"></span>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="file-upload-wrapper">
                                    <label for="urlVideo" class="file-upload-label">
                                        <span class="file-upload-text">Cargar Video</span>
                                        <input class="form-control file-upload-input" type="file" id="urlVideo"
                                            name="urlVideo" accept="video/*" required>
                                    </label>
                                    <span id="selectedVideo" class="file-selected-text"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="mb-3">
                                    <label for="tituloVideo" class="form-label">Título del Video</label>
                                    <input type="text" class="form-control" id="tituloVideo" name="tituloVideo"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="linkDescarga1" class="form-label">Link de recurso (opcional)</label>
                                    <input type="text" class="form-control" id="linkDescarga1" name="linkDescarga1">
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="mb-3">
                                    <label for="descripcionVideo" class="form-label">Descripción del Video</label>
                                    <textarea class="form-control" id="descripcionVideo" name="descripcionVideo"
                                        rows="8" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-warning">Guardar publicación</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    include 'dbConfig.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tituloVideo = $_POST["tituloVideo"];
        $descripcionVideo = $_POST["descripcionVideo"];
        $linkDescarga = $_POST["linkDescarga1"];
        $rutaVideo = "video/" . preg_replace('/[^a-zA-Z0-9]+/', '-', $tituloVideo) . ".php";

        // Directorio de destino para guardar la imagen
        $uploadDirectory = 'uploads/video/miniatura/';

        // Obtener información sobre el archivo de imagen
        $image = $_FILES['urlMini'];
        $imageName = $image['name'];
        $imageTmpPath = $image['tmp_name'];
        $imageError = $image['error'];

        // Generar un nombre único para la imagen
        $uniqueImageName = uniqid() . '_' . str_replace(' ', '-', $imageName);

        // Ruta completa de destino para guardar la imagen
        $uploadFilePath = $uploadDirectory . $uniqueImageName;

        // Mover el archivo de imagen al directorio de destino
        if (move_uploaded_file($imageTmpPath, $uploadFilePath)) {
            // La imagen se ha subido correctamente, ahora podemos guardar la información en la base de datos
    
            // Directorio de destino para guardar el video
            $uploadDirectory = 'uploads/video/';

            // Obtener información sobre el archivo de video
            $video = $_FILES['urlVideo'];
            $videoName = $video['name'];
            $videoTmpPath = $video['tmp_name'];
            $videoError = $video['error'];

            // La sesion de usuario
            $user = $_SESSION['user'];

            // Generar un nombre único para el video
            $uniqueVideoName = uniqid() . '_' . $videoName;

            // Ruta completa de destino para guardar el video
            $uploadFilePath = $uploadDirectory . $uniqueVideoName;

            // Mover el archivo de video al directorio de destino
            if (move_uploaded_file($videoTmpPath, $uploadFilePath)) {
                // El video se ha subido correctamente, ahora podemos guardar la información en la base de datos
    
                // Insertar la información en la base de datos
                $sql = "INSERT INTO publicaciones (titulo, contenido, miniatura, urlvideo, url, link_descarga, user) VALUES ('$tituloVideo', '$descripcionVideo', '$uniqueImageName', '$uniqueVideoName', '$rutaVideo', '$linkDescarga', '$user')";
                if (mysqli_query($conn, $sql)) {
                    // Crear el archivo PHP en la carpeta "video" con el nombre del título del video
                    $fileTitle = preg_replace('/[^a-zA-Z0-9]+/', '-', $tituloVideo) . ".php";
                    $filePath = 'video/' . $fileTitle;
                    $fileContent = '<?php

                    include \'../dbConfig.php\';
                    ?>

                    <!DOCTYPE html>
                    <html lang=\'es-pe\'>

                    <head>
                    <?php include "../layouts/head.php" ?>
                    <link rel="stylesheet" type="text/css" href="styles.css" />
                    </head>

                    <body>
                    <?php include \'../layouts/header.php\' ?>

                    <!-- Contenido de la nueva publicación -->
                    <section>
                        <?php
                        // Obtener los datos desde la base de datos
                        $sql = "SELECT * FROM `publicaciones` WHERE id = ' . mysqli_insert_id($conn) . '";
                        $query = mysqli_query($conn, $sql);

                        // Verificar si se encontró la fila
                        if (mysqli_num_rows($query) > 0) {
                        // Obtener la fila del id
                        $row = mysqli_fetch_assoc($query);

                        // Obtener los valores de cada columna de la base de datos
                        $titulo = $row[\'titulo\'];
                        $descripcion = $row[\'contenido\'];
                        $urlvideo = $row[\'urlvideo\'];

                        // Formato de la entrada de contenido
                        $contenido_html = \'<div class="container mt-5">\';
                        $contenido_html .= \'<h1 class="text-center mb-5">Video de YouTube</h1>\';
                        $contenido_html .= \'<div class="row justify-content-center">\';
                        $contenido_html .= \'<div class="col-md-8">\';
                        $contenido_html .= \'<div class="video-container">\';
                        $contenido_html .= \'<iframe src="../uploads/video/\' . $urlvideo . \'" allowfullscreen></iframe>\';
                        $contenido_html .= \'</div>\';
                        $contenido_html .= \'<div class="video-info">\';
                        $contenido_html .= \'<h3>\' . $titulo . \'</h3>\';
                        $contenido_html .= \'<p>\' . $descripcion . \'</p>\';
                        $contenido_html .= \'<h4>Links de descargas</h4>\';
                        $contenido_html .= \'<a class="btn btn-warning" href="#" role="button">Link</a>\';
                        $contenido_html .= \'</div>\';
                        $contenido_html .= \'</div>\';
                        $contenido_html .= \'</div>\';
                        $contenido_html .= \'</div>\';
                        } else {
                        $contenido_html = \'<p>No se encontró la fila especificada.</p>\';
                        }

                        // Cerrar la conexión
                        mysqli_close($conn);

                        // Imprimir el contenido HTML de la entrada
                        echo $contenido_html;
                        ?>
                    </section>

                    <!-- ... (El contenido del pie de página aquí) ... -->

                    <?php include \'../layouts/footer.php\' ?>

                    <script src=\'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\'></script>
                    </body>

                    </html>';

                    // Crear el archivo PHP en la carpeta "video" con el nombre del título del video
                    $file = fopen($filePath, 'w');
                    fwrite($file, $fileContent);
                    fclose($file);


                    // Imprimir el modal
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
                                <p><a href="' . $rutaVideo . '" >Ver publicación</a><p>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-warning" href="index.php" >Aceptar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    ';


                    // Imprimir el scrip para ver modal
                    echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var modal = new bootstrap.Modal(document.getElementById("alertSucces"));
                        modal.show();
                    });
                  </script>';



                } else {
                    echo '<div class="alert alert-danger" role="alert">
                            Error al crear la publicación: ' . mysqli_error($conn) . '
                          </div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
                        Error al subir el video: ' . $videoError . '
                      </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Error al subir la imagen: ' . $imageError . '
                  </div>';
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="application/javascript">
        // Cambiar nombre de archivo selecionado
        function handleFileInputChange(event) {
            const fileInput = event.target;
            const fileName = fileInput.files[0].name;
            const parentWrapper = fileInput.closest('.file-upload-wrapper');
            const selectedLabel = parentWrapper.querySelector('.file-selected-text');

            selectedLabel.textContent = fileName;
        }

        const urlMiniInput = document.getElementById('urlMini');
        const urlVideoInput = document.getElementById('urlVideo');

        urlMiniInput.addEventListener('change', handleFileInputChange);
        urlVideoInput.addEventListener('change', handleFileInputChange);
    </script>
</body>

</html>