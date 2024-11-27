<footer class="bg-dark text-white">
    <div class="container py-4">
        <div class="row">
            <!-- Primera columna para la imagen y el texto -->
            <div class="col-12 col-md-6 col-lg-3 text-center">
                <div class="d-flex align-items-center flex-column mb-4">
                    <img src="/img/Logo.png" alt="Logo El blog de Trodi" style="max-height: 100px"
                        class="img-fluid mb-3" />
                    <p class="text-white fs-5">El blog de Trodi</p>
                </div>
            </div>
            <!-- Segunda columna para los últimos contenidos -->
            <div class="col-12 col-md-6 col-lg-3 text-center">
                <h5 class="mb-4">Últimos Contenidos</h5>
                <ul class="list-unstyled">
                    <?php
                    // Incluir el archivo de configuración de la base de datos
                    include 'dbConfig.php';


                    // Verificar si la conexión fue exitosa
                    if (!$conn) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }

                    // Realizar la consulta para obtener los enlaces y títulos de contenido
                    $query = "SELECT * FROM `publicaciones` ORDER BY `id` DESC LIMIT 3";
                    $resultado = mysqli_query($conn, $query);

                    // Verificar si la consulta fue exitosa
                    if (mysqli_num_rows($resultado) > 0) {
                        // Iterar sobre los resultados y generar los enlaces y títulos de contenido dinámicamente
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            $enlace = $fila['url'];
                            $titulo = $fila['titulo'];
                            echo '<li><a href="' . $enlace . '" class="text-white">' . $titulo . '</a></li>';
                        }
                    } else {
                        echo 'No se encontraron resultados.';
                    }

                    ?>
                    <!-- Agrega más enlaces a tus últimos contenidos -->
                </ul>
            </div>
            <!-- Tercera columna para las redes sociales -->
            <div class="col-12 col-md-6 col-lg-3 text-center">
                <h5 class="mb-4">Redes Sociales</h5>
                <ul class="list-inline d-flex justify-content-center">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/ElblogdeTrodi" class="text-white" target="_blank">
                            <img src="https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/facebook.png?v=1689534078544"
                                alt="Facebook" class="d-block" style="max-height: 30px" />
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-white">
                            <img src="https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/twiter.png?v=1689534086876"
                                alt="Twitter" class="d-block" style="max-height: 30px" />
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-white">
                            <img src="https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/instagram.png?v=1689534083427"
                                alt="Instagram" class="d-block" style="max-height: 30px" />
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/@elblogdetrodi597" class="text-white" target="_blank">
                            <img src="https://cdn.glitch.global/733d51da-7139-43b1-8bde-4ad3f2ea6bc2/youtube.png?v=1689534084809"
                                alt="YouTube" class="d-block" style="max-height: 30px" />
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Cuarta columna para la información de contacto -->
            <div class="col-12 col-md-6 col-lg-3 text-center">
                <h5 class="mb-4">Contacto</h5>
                <p class="fs-6">
                    Dirección: Avenida la Torre 321, Cusco
                </p>
                <p class="fs-6">
                    Email: inderscop@gmail.com
                </p>
                <p class="fs-6">
                    Teléfono: +51 917 138 548
                </p>
            </div>
        </div>
    </div>
    <div class="bg-secondary text-center py-2">
        <p class="m-0">
            ©
            <?php echo date('Y'); ?> El blog de Trodi. Todos los derechos reservados.
        </p>
    </div>
</footer>