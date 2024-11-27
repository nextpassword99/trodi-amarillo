<?php

                    include '../dbConfig.php';
                    ?>

                    <!DOCTYPE html>
                    <html lang='es-pe'>

                    <head>
                    <?php include "../layouts/head.php" ?>
                    <link rel="stylesheet" type="text/css" href="styles.css" />
                    </head>

                    <body>
                    <?php include '../layouts/header.php' ?>

                    <!-- Contenido de la nueva publicación -->
                    <section>
                        <?php
                        // Obtener los datos desde la base de datos
                        $sql = "SELECT * FROM `publicaciones` WHERE id = 8";
                        $query = mysqli_query($conn, $sql);

                        // Verificar si se encontró la fila
                        if (mysqli_num_rows($query) > 0) {
                        // Obtener la fila del id
                        $row = mysqli_fetch_assoc($query);

                        // Obtener los valores de cada columna de la base de datos
                        $titulo = $row['titulo'];
                        $descripcion = $row['contenido'];
                        $urlvideo = $row['urlvideo'];

                        // Formato de la entrada de contenido
                        $contenido_html = '<div class="container mt-5">';
                        $contenido_html .= '<h1 class="text-center mb-5">Video de YouTube</h1>';
                        $contenido_html .= '<div class="row justify-content-center">';
                        $contenido_html .= '<div class="col-md-8">';
                        $contenido_html .= '<div class="video-container">';
                        $contenido_html .= '<iframe src="../uploads/video/' . $urlvideo . '" allowfullscreen></iframe>';
                        $contenido_html .= '</div>';
                        $contenido_html .= '<div class="video-info">';
                        $contenido_html .= '<h3>' . $titulo . '</h3>';
                        $contenido_html .= '<p>' . $descripcion . '</p>';
                        $contenido_html .= '<h4>Links de descargas</h4>';
                        $contenido_html .= '<a class="btn btn-warning" href="#" role="button">Link</a>';
                        $contenido_html .= '</div>';
                        $contenido_html .= '</div>';
                        $contenido_html .= '</div>';
                        $contenido_html .= '</div>';
                        } else {
                        $contenido_html = '<p>No se encontró la fila especificada.</p>';
                        }

                        // Cerrar la conexión
                        mysqli_close($conn);

                        // Imprimir el contenido HTML de la entrada
                        echo $contenido_html;
                        ?>
                    </section>

                    <!-- ... (El contenido del pie de página aquí) ... -->

                    <?php include '../layouts/footer.php' ?>

                    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
                    </body>

                    </html>