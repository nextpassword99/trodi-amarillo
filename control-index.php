<?php


    ?>

<!doctype html>
<html lang="es-pe" data-bs-theme="auto">

<head>

    <meta charset="utf-8" />
    <meta name="Verport" content="width=device-width, initial-scale=1" />
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


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            object-fit: cover;
        }


        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>


</head>

<body>
    <header data-bs-theme="dark">
        <div class="container text-center">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <img src="https://cdn.glitch.global/9fa909c3-bb5a-4778-8d16-ef06342fa4db/Logo.png?v=1689436653865"
                            alt="El blog de Trodi" width="30" height="30" />
                        El blog de Trodi
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="index.php">INICIO</a>
                            <a class="nav-link" href="about.php">ACERCA DE</a>
                            <a class="nav-link" href="publication.php">PUBLICACIONES</a>
                            <a class="nav-link" href="video.php">VIDEOS</a>
                            <a class="nav-link active" aria-current="page" href="#"><b>FOTOGRAFIA</b></a>
                            <a class="nav-link" href="tutorial.php">TUTORIALES</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">GALERIA DE FOTOGRAFIAS</h1>
                    <p class="lead text-body-secondary">Si bien mencionan que una foto vale más que mil palabras, aquí
                        les dejo un apartado especialmente para el arte
                        de la fotografía.</p>
                    <p>
                        <a href="#" class="btn btn-warning my-2">Ver fotografias</a>
                        <a href="#" class="btn btn-secondary my-2">Subir fotografia</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <!-- Entradas de fotos -->
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP12346; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP12346) > 10) ? substr($cardTextP12346, 0, 115) . '...' : $cardTextP12346; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP31247; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP31247) > 10) ? substr($cardTextP31247, 0, 115) . '...' : $cardTextP31247; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP79879; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP79879) > 10) ? substr($cardTextP79879, 0, 115) . '...' : $cardTextP79879; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP37561; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP37561) > 10) ? substr($cardTextP37561, 0, 115) . '...' : $cardTextP37561; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP09875; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP09875) > 10) ? substr($cardTextP09875, 0, 115) . '...' : $cardTextP09875; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP86352; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP86352) > 10) ? substr($cardTextP86352, 0, 115) . '...' : $cardTextP86352; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP09767; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP09767) > 10) ? substr($cardTextP09767, 0, 115) . '...' : $cardTextP09767; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP66445; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP66445) > 10) ? substr($cardTextP66445, 0, 115) . '...' : $cardTextP66445; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="<?php echo $imageP13215; ?>">
                            </img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo (strlen($cardTextP13215) > 10) ? substr($cardTextP13215, 0, 115) . '...' : $cardTextP13215; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="bg-dark text-white">
        <div class="container py-4">
            <div class="row">
                <!-- Primera columna para la imagen y el texto -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                    <div class="d-flex align-items-center flex-column mb-4">
                        <img src="https://cdn.glitch.global/9fa909c3-bb5a-4778-8d16-ef06342fa4db/Logo.png?v=1689436653865.png"
                            alt="Logo El blog de Trodi" style="max-height: 100px" class="img-fluid mb-3" />
                        <p class="text-white fs-5">El blog de Trodi</p>
                    </div>
                </div>
                <!-- Segunda columna para los últimos contenidos -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                    <h5 class="mb-4">Últimos Contenidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo $ultimoContenido1; ?>" class="text-white"><?php echo $tituloContenido1; ?></a>
                        </li>
                        <li><a href="<?php echo $ultimoContenido2; ?>" class="text-white"><?php echo $tituloContenido2; ?></a>
                        </li>
                        <li><a href="<?php echo $ultimoContenido3; ?>" class="text-white"><?php echo $tituloContenido3; ?></a>
                        </li>
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
                        <?php echo $direccion; ?>
                    </p>
                    <p class="fs-6">
                        <?php echo $email; ?>
                    </p>
                    <p class="fs-6">
                        <?php echo $telefono; ?>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>

</body>

</html>