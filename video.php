<?php
include 'dbConfig.php';
?>


<!DOCTYPE html>
<html lang="es-pe">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>VIDEOS - El blog de Trodi</title>
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
        <!-- Carrusel -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <!-- Imágenes del carrusel -->
            <div class="carousel-inner">
                <?php
                $active = true; // Variable para controlar la clase 'active' en el primer elemento
                
                // Consulta SQL para obtener los datos del carrusel desde la base de datos
                $sql = "SELECT miniatura, url FROM publicaciones ORDER BY `publicaciones`.`id` DESC LIMIT 3"; 
                $resultado = mysqli_query($conn, $sql);

                // Verifica si hay resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Itera sobre los resultados y genera los elementos del carrusel
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $miniatura = $fila['miniatura'];
                        $url = $fila['url'];

                        // Genera el elemento del carrusel con los datos obtenidos de la base de datos
                        echo '
                        <div class="carousel-item ' . ($active ? 'active' : '') . '">
                        <img src="uploads/video/miniatura/' . $miniatura . '" class="d-block w-100" alt="Miniatura">
                        <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-warning" href="' . $url . '">Visualizar</a>
                        </div>
                        </div>
                        ';

                        $active = false; // Desactiva la clase 'active' después del primer elemento
                    }
                }
                ?>
            </div>

            <!-- Controles de navegación -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>



    <section>
        <div class="container mt-5 mb-5">
            <h1 class="mb-4">Ultimos videos</h1>
            <div class="row">


                <!-- Nueva publicación -->


                <?php

                // Obtener los datos desde la base de datos
                $sql = "SELECT * FROM `publicaciones` ORDER BY `id` DESC"; 
                $query = mysqli_query($conn, $sql);

                // Crear un string con el contenido HTML de los datos
                $contenido_html = '';

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        // Obtener los valores de cada columna de la base de datos
                        $titulo = $row['titulo'];
                        $descripcion = $row['contenido'];
                        $imagen = $row['miniatura'];
                        $enlace = $row['url'];


                        // Limitar cantidad de palabras
                        $titulo_corto = (strlen($titulo) > 10) ? substr($titulo, 0, 40) : $titulo;
                        $descripcion_corta = (strlen($descripcion) > 100) ? substr($descripcion, 0, 180) : $descripcion;



                        // Formato de cada entrada de contenido
                        $contenido_html .= '<div class="col-12 col-sm-6 col-md-4 mt-2">';
                        $contenido_html .= '<div class="image-card">';
                        $contenido_html .= '<a href="' . $enlace . '">';
                        $contenido_html .= '<div class="title-img title-img-small" style="background-image: url(uploads/video/miniatura/' . $imagen . ');"></div>';
                        $contenido_html .= '<div class="overlay"><div class="play-icon"></div></div>';
                        $contenido_html .= '</a>';
                        $contenido_html .= '<div class="card-body">';

                        $contenido_html .= '<h3 class="card-title">' . $titulo_corto . '</h3>';
                        $contenido_html .= '<p class="card-text">' . $descripcion_corta . '</p>';
                        $contenido_html .= '</div>';
                        $contenido_html .= '</div>';
                        $contenido_html .= '</div>';
                    }
                } else {
                    $contenido_html = '<p>No hay contenido disponible en este momento.</p>';
                }

                // Cerrar la conexión
                mysqli_close($conn);

                // Imprimir el contenido HTML de las entradas
                echo $contenido_html;
                ?>


                <!-- Final publicacion -->
            </div>
        </div>
    </section>

    <section>
        <?php include 'layouts/footer.php' ?>
    </section>

    <!-- Resto del contenido de la página -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>