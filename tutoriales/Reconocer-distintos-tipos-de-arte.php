
                <?php
                include '../dbConfig.php';
                ?>
            
            
                <!DOCTYPE html>
                <html lang='es-pe'>
            
                <head>
                    <?php include '../layouts/head.php' ?>
                    <link rel='stylesheet' type='text/css' href='styles.css' />
                </head>
            
                <body>
                    <?php include '../layouts/header.php' ?>
            
                    <!-- Contenido de la nueva publicación -->
                    <section>
            
                        <?php
                        // Obtener los datos desde la base de datos
                        $sql = "SELECT * FROM `tutoriales` WHERE id = 22"; // Utiliza el ID recién insertado
                        $query = mysqli_query($conn, $sql);
            
                        // Verificar si se encontró la fila
                        if (mysqli_num_rows($query) > 0) {
                            // Obtener la fila del id
                            $row = mysqli_fetch_assoc($query);
            
                            // Obtener los valores de cada columna de la base de datos
                            $titulo = $row['titulo'];
                            $contenido = $row['contenido'];
                            $imagen = $row['imagen'];
                            $tipo = $row['tipo'];
                            $user = $row['user'];
                            $create_on = $row['create_on'];
            
                            // Formato de la entrada de contenido
                            $contenido_html = '
                    <div class="container mt-5">
                        <h1 class="text-center mb-5">Tutorial</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                            <div>
                            <p class="small">Tipo: ' . $tipo . '</p>
                            <div>
                                <div class="video-container">
                                    <img src="/' . $imagen . '" style="width: 100%" class="img-fluid" alt="Imagen del tutorial">
                                </div>
                                <div class="video-info">
                                    <h3>' . $titulo . '</h3>
                                    <div>
                                        <p>Contenido: ' . $contenido . '</p>
                                        <p>Usuario: ' . $user . '</p>
                                        <p>Fecha de creación: ' . $create_on . '</p>
                                    </div>
                                    <h4>Links de descargas</h4>
                                    <a class="btn btn-warning" href="#" role="button">Link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  ';
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
                