<!doctype html>

<head>
    <?php include 'layouts/head.php' ?>
    <link rel="stylesheet" type="text/css" href="./required/search.css" />
</head>

<body>
    <?php include 'layouts/header.php' ?>

    <section>
        <div class="container">
            <form class="form-search d-flex justify-content-center" role="search" method="GET" action="./search.php">
                <div class="input-group">
                    <input class="form-control input-form-search" name="search" type="search" placeholder="Buscar"
                        aria-label="Buscar" autocomplete="off"
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
            <p class="text-center mt-3">Resultados de búsqueda</p>
        </div>
    </section>


    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <?php
                include 'dbConfig.php';

                // Verificar si se ha enviado el formulario de búsqueda
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    // Obtener el término de búsqueda ingresado por el usuario
                    $searchTerm = $_GET["search"];

                    // Consulta SQL para buscar en la base de datos en la tabla "publicaciones"
                    $sqlPublicaciones = "SELECT id, titulo, contenido, url, create_on FROM publicaciones WHERE contenido LIKE '%$searchTerm%' OR titulo LIKE '%$searchTerm%'";
                    $resultPublicaciones = mysqli_query($conn, $sqlPublicaciones);

                    // Consulta SQL para buscar en la base de datos en la tabla "photo"
                    $sqlPhoto = "SELECT id, titulo, descripcion AS contenido, url, create_on FROM photo WHERE titulo LIKE '%$searchTerm%' OR descripcion LIKE '%$searchTerm%'";
                    $resultPhoto = mysqli_query($conn, $sqlPhoto);

                    // Verificar si hay resultados en la tabla "publicaciones"
                    if (mysqli_num_rows($resultPublicaciones) > 0) {
                        echo '<div class="col-md-8 contenedor-resultados-publicaciones">';
                        // Iterar sobre los resultados y mostrarlos
                        while ($row = mysqli_fetch_assoc($resultPublicaciones)) {

                            // Llamar a todas las columnas de la base de datos
                            $titulo = $row['titulo'];
                            $contenido = $row['contenido'];
                            $create_on = $row['create_on'];
                            $url = $row['url'];


                            // Dar formato a la hora
                            $fecha_creacion = strtotime($create_on);
                            $fecha_actual = time();
                            $diferencia = $fecha_actual - $fecha_creacion;

                            if ($diferencia <= 60) {
                                $mensaje = "Hace " . $diferencia . " segundos";
                              } elseif ($diferencia <= 60 * 60) {
                                $mensaje = "Hace " . floor($diferencia / 60) . " minutos";
                              } elseif ($diferencia <= 24 * 60 * 60) {
                                $mensaje = "Hace " . floor($diferencia / (60 * 60)) . " horas";
                              } elseif ($diferencia <= 7 * 24 * 60 * 60) {
                                $mensaje = "Hace " . floor($diferencia / (24 * 60 * 60)) . " días";
                              } elseif ($diferencia <= 4 * 7 * 24 * 60 * 60) {
                                $mensaje = "Hace " . floor($diferencia / (7 * 24 * 60 * 60)) . " semanas";
                              } elseif ($diferencia <= 12 * 4 * 7 * 24 * 60 * 60) {
                                $mensaje = "Hace " . floor($diferencia / (30 * 24 * 60 * 60)) . " meses";
                              } else {
                                $mensaje = "Hace " . floor($diferencia / (365 * 24 * 60 * 60)) . " años";
                              }

                            $contenido_cortado = substr($contenido, 0, 200) . '... Ver más';

                            // Encontrar la posición de la palabra clave en el contenido original
                            $posicion = stripos($contenido, $searchTerm);

                            // Si se encontró la palabra clave, mostrar la parte cercana de la cadena
                            if ($posicion !== false) {
                                $inicio = max(0, $posicion - 100); // Mostrar 50 caracteres antes de la palabra clave
                                $final = min(strlen($contenido), $posicion + 100 + strlen($searchTerm)); // Mostrar 50 caracteres después de la palabra clave
                                $contenido_destacado = substr($contenido, $inicio, $final - $inicio);

                                // Resaltar y poner en negrita las palabras clave
                                $contenido_destacado = str_ireplace($searchTerm, '<strong>' . $searchTerm . '</strong>', $contenido_destacado);
                            } else {
                                $contenido_destacado = $contenido_cortado; // Mostrar el contenido cortado por defecto
                            }

                            echo '<div class="resultado">';
                            echo '<h5><a class="resultados-titulo" href="' . $url . '">' . $titulo . '</a></h5>';
                            echo '<p> <span style="color: #ffc107">' . $mensaje . ' — </span>' . $contenido_destacado . '</p>';
                            echo '</div><br>';
                        }
                        echo '</div>';
                    } else {
                        echo '
                        <div class="col-md-8 contenedor-resultados-publicaciones">
                        <div class="no-resultados alert alert-danger">No se encontraron resultados en Publicaciones.</div>
                        </div>
                        ';
                    }

                    // Verificar si hay resultados en la tabla "photo"
                    if (mysqli_num_rows($resultPhoto) > 0) {
                        echo '<div class="col-md-4 contenedor-resultados-photo">';
                        // Iterar sobre los resultados y mostrarlos
                        while ($row = mysqli_fetch_assoc($resultPhoto)) {

                            $titulo = $row['titulo'];
                            $url = $row['url'];
                            $contenido = $row['contenido'];
                            $create_on = $row['create_on'];


                            // Dar formato a la hora
                            $fecha_creacion = strtotime($create_on);
                            $fecha_actual = time();
                            $diferencia = $fecha_actual - $fecha_creacion;

                            if ($diferencia <= 7 * 24 * 60 * 60) {
                                $mensaje = "Hace " . floor($diferencia / (24 * 60 * 60)) . " días";
                            } elseif ($diferencia <= 4 * 7 * 24 * 60 * 60) {
                                $mensaje = "Hace " . floor($diferencia / (7 * 24 * 60 * 60)) . " semanas";
                            } elseif ($diferencia <= 12 * 4 * 7 * 24 * 60 * 60) {
                                $mensaje = "Hace " . floor($diferencia / (30 * 24 * 60 * 60)) . " meses";
                            } else {
                                $mensaje = "Hace " . floor($diferencia / (365 * 24 * 60 * 60)) . " años";
                            }



                            echo '<div class="resultado">';
                            echo '<h5>' . $titulo . '</h5>';

                            if (!empty($url)) {
                                echo '
                                <div class="result-photo">
                                    <img src="' . $url . '" alt="Imagen" style="width: 100%">
                                </div>
                                ';
                            }

                            echo '<p>' . $contenido . '</p>';
                            echo '<p>Publicado: ' . $mensaje . '</p>';
                            echo '</div><br>';
                        }
                        echo '</div>';
                    } else {
                        echo '
                        <div class="col-md-4 contenedor-resultados-photo">
                        <div class="no-resultados alert alert-danger">No se encontraron resultados en Fotografía.</div>
                        </div>
                        ';
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <?php include './layouts/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>