<header>
  <div class='container text-center'>
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='/'>
          <img src='/img/Logo.png'
            alt='El blog de Trodi' width='30' height='30' />
          El blog de Trodi
        </a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup'
          aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarNavAltMarkup'>
          <div class='navbar-nav'>
            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>' href='index.php'><b>INICIO</b></a>
            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>' href='about.php'>ACERCA DE</a>
            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'publication.php') ? 'active' : ''; ?>' href='publication.php'>PUBLICACIONES</a>
            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'video.php') ? 'active' : ''; ?>' href='video.php'>VIDEOS</a>
            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'photo.php') ? 'active' : ''; ?>' href='photo.php'>FOTOGRAFIA</a>
            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'tutorial.php') ? 'active' : ''; ?>' href='tutorial.php'>TUTORIALES</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>