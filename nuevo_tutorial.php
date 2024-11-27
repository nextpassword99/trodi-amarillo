<?php

if (isset($_SESSION['user'])) {
    ?>

    <!DOCTYPE html>
    <html lang="es-pe">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

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
            <h1>Crear Tutorial</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="tutorialForm"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>

                        <div class="mb-3">
                            <label for="contenido" class="form-label">Contenido</label>
                            <textarea class="form-control" id="contenido" name="contenido" rows="5" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo de Tutorial</label>
                            <select id="tipo" name="tipo" class="form-control" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="Programación">Programación</option>
                                <option value="Diseño web">Diseño web</option>
                                <option value="Diseño gráfico">Diseño gráfico</option>
                                <option value="Marketing digital">Marketing digital</option>
                                <option value="Redes sociales">Redes sociales</option>
                                <option value="Fotografía">Fotografía</option>
                                <option value="Videografía">Videografía</option>
                                <option value="Edición de video">Edición de video</option>
                                <option value="SEO">SEO</option>
                                <option value="Cocina">Cocina</option>
                                <option value="Manualidades">Mmanualidades</option>
                                <option value="Música">Música</option>
                                <option value="Idiomas">Idiomas</option>
                                <option value="Salud y bienestar">Salud y bienestar</option>
                                <option value="Deportes">Deportes</option>
                                <option value="Viajes">Viajes</option>
                                <option value="Moda">Moda</option>
                                <option value="Belleza">Belleza</option>
                                <option value="Finanzas personales">Finanzas personales</option>
                                <option value="Negocios">Negocios</option>
                                <option value="Desarrollo personal">Desarrollo personal</option>
                                <option value="Ciencia y tecnología">Ciencia y tecnología</option>
                                <option value="Historia">Historia</option>
                                <option value="Literatura">Literatura</option>
                                <option value="Filosofía">Filosofía</option>
                                <option value="Política">Política</option>
                                <option value="Arte">Arte</option>
                                <option value="Medio ambiente">Medio ambiente</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="file-upload-img">
                                <label for="image" class="file-upload-label">
                                    <span class="file-upload-text">Cargar imagen</span>
                                    <input class="form-control file-upload-input" type="file" id="image" name="image"
                                        accept="image/*" required>
                                </label>
                                <span id="selectedImg" class="file-selected-text"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-warning" value="Crear tutorial">
            </form>
        </div>




        <?php
        include 'dbConfig.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los valores del título y la descripción del formulario
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $tipo = $_POST['tipo'];

            // Obtener información sobre el archivo de imagen
            $image = $_FILES['image'];
            $imageName = $image['name'];
            $imageTmpPath = $image['tmp_name'];
            $imageError = $image['error'];

            // Directorio de destino para guardar la imagen
            $uploadDirectory = 'uploads/tutorial/';

            // Generar un nombre único para la imagen
            $uniqueImageName = uniqid() . '_' . str_replace(' ', '-', $imageName);

            // Ruta completa de destino para guardar la imagen
            $uploadFilePath = $uploadDirectory . $uniqueImageName;

            // Mover el archivo de imagen al directorio de destino
            if (move_uploaded_file($imageTmpPath, $uploadFilePath)) {
                // La imagen se ha subido correctamente
    
                // Nombre del usuario actual
                $user = $_SESSION['user'];

                // Dirección del archivo
                $direcion = 'tutoriales/' . preg_replace('/[^a-zA-Z0-9]+/', '-', $titulo) . '.php';

                // Preparar la consulta para insertar los datos en la base de datos
                $stmt = $conn->prepare('INSERT INTO tutoriales (user, titulo, contenido, imagen, tipo, url) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt->bind_param('ssssss', $user, $titulo, $contenido, $uploadFilePath, $tipo, $direcion);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    // Los datos se han guardado correctamente en la base de datos
    
                    // Crear un archivo PHP en la carpeta "tutoriales"
                    $phpFileName = 'tutoriales/' . preg_replace('/[^a-zA-Z0-9]+/', '-', $titulo) . '.php';
                    $phpContent = '
                <?php
                include \'../dbConfig.php\';
                ?>
            
            
                <!DOCTYPE html>
                <html lang=\'es-pe\'>
            
                <head>
                    <?php include \'../layouts/head.php\' ?>
                    <link rel=\'stylesheet\' type=\'text/css\' href=\'styles.css\' />
                </head>
            
                <body>
                    <?php include \'../layouts/header.php\' ?>
            
                    <!-- Contenido de la nueva publicación -->
                    <section>
            
                        <?php
                        // Obtener los datos desde la base de datos
                        $sql = "SELECT * FROM `tutoriales` WHERE id = ' . $stmt->insert_id . '"; // Utiliza el ID recién insertado
                        $query = mysqli_query($conn, $sql);
            
                        // Verificar si se encontró la fila
                        if (mysqli_num_rows($query) > 0) {
                            // Obtener la fila del id
                            $row = mysqli_fetch_assoc($query);
            
                            // Obtener los valores de cada columna de la base de datos
                            $titulo = $row[\'titulo\'];
                            $contenido = $row[\'contenido\'];
                            $imagen = $row[\'imagen\'];
                            $tipo = $row[\'tipo\'];
                            $user = $row[\'user\'];
                            $create_on = $row[\'create_on\'];
            
                            // Formato de la entrada de contenido
                            $contenido_html = \'
                    <div class="container mt-5">
                        <h1 class="text-center mb-5">Tutorial</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                            <div>
                            <p class="small">Tipo: \' . $tipo . \'</p>
                            <div>
                                <div class="video-container">
                                    <img src="/\' . $imagen . \'" style="width: 100%" class="img-fluid" alt="Imagen del tutorial">
                                </div>
                                <div class="video-info">
                                    <h3>\' . $titulo . \'</h3>
                                    <div>
                                        <p>Contenido: \' . $contenido . \'</p>
                                        <p>Usuario: \' . $user . \'</p>
                                        <p>Fecha de creación: \' . $create_on . \'</p>
                                    </div>
                                    <h4>Links de descargas</h4>
                                    <a class="btn btn-warning" href="#" role="button">Link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  \';
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

                    </html>
                ';
                    file_put_contents($phpFileName, $phpContent);

                    // Mostrar el mensaje de éxito
                    echo '
                    <div class="modal" tabindex="-1" id="alertSuccess">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <P>
                                Archivo subido exitosamente:' . $titulo . '
                            </p>
                            </div>
                        </div>
                    </div>
                ';
                    // Los datos se han guardado correctamente en la base de datos
    
                    // Ejemplo: Mostrar un mensaje de éxito
                    echo '
        Gracias por participar
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