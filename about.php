<?php

?>

<!DOCTYPE html>
<html lang="es-pe">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ACERCA DE - El blog de Trodi</title>
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

  <!--Presentación Parte 1-->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">
          <h2 class="display-4">Acerca de Mí</h2>
          <div style="margin: 0 auto; margin-top: 2rem; margin-bottom: 2rem; width: 10em">
            <img src="img/Retrato.jpg" alt="Desarrollador de la página web" style="width: 100%; border-radius: 100px">
          </div>
          <p class="lead">
            ¡Hola! Mi nombre es Edison, soy un autodidacta que busca aprender de
            todo, tengo 17 años y vivo en la ciudad de Cusco. Me gusta la programación, 
            e intento aprender más ello, así que ¡Adelante!
          </p>
          <p>
            Soy un apasionado de la informática,
            un desarrollador independiente y un hacker en mis tiempos libres.
            Además, disfruto jugando voleibol y básquetbol, practico capoeira
            y soy un entusiasta de la fotografía. Entre otros pasatiempos, me
            agrada la música, el arte y el cine. También tengo otro canal en
            el que solía compartir videografía, pero debido al tiempo que
            requería, decidí crear un nuevo canal para mostrar todo lo que
            hago y encontrar personas que compartan mis intereses.
          </p>
          <p>
            Me encanta escribir y me considero un poeta apasionado. Disfruto
            especialmente leyendo el género policiaco y las historias con
            giros inesperados. Por otra parte, la ciencia y la filosofía son
            temas que me fascinan y que me hacen cuestionar constantemente la
            existencia.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!--Presentación Parte 2-->
  <section class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">
          <h2 class="display-4">Acerca del Blog</h2>
          <p>
            Este blog fue creado como un proyecto personal desde cero para
            demostrar mis habilidades como desarrollador web y como una fuente
            de inspiración para nuevos proyectos. Aquí publicaré todo el
            contenido que vaya creando. A partir de ahora, esta será mi página
            web oficial donde compartiré diversos tipos de contenido,
            especialmente mi parte favorita: el hacking. Espero que no me
            bloqueen.
          </p>
          <p>
            Actualmente, mantengo esta página en un servidor Apache con Linux.
            Estoy emocionado por todas las cosas increíbles que estaré
            compartiendo en este blog y espero que lo disfrutes tanto como yo
            al crearlo.
          </p>
        </div>
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