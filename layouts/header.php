<header>
  <div class='container text-center' style="padding: 0; margin: 0; max-width: 100%">
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='./'>
          <img src='./img/Logo.png' alt='El blog de Trodi' width='30' height='30' />
          El blog de Trodi
        </a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarNavAltMarkup'>
          <div class='navbar-nav'>
            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>' href='./index.php'><b>INICIO</b></a>


            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'video.php') ? 'active' : ''; ?>' href='./video.php'>VIDEOS</a>

            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'photo.php') ? 'active' : ''; ?>' href='./photo.php'>FOTOGRAFIA</a>

            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'chat.php') ? 'active' : ''; ?>' href='./chat.php'>CHAT</a>


            <!-- Desplegable del navar -->
            <li class="nav-item dropdown" data-bs-theme="dark">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MÁS
              </a>
              <ul class="dropdown-menu" style="margin: 0 auto; width: 30%;">
                <li><a class='dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'tutorial.php') ? 'active' : ''; ?>' href='./tutorial.php'>TUTORIALES</a></li>
                <li><a class='dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'publication.php') ? 'active' : ''; ?>' href='./publication.php'>PUBLICACIONES</a></li>
                <li><a class='dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>' href='./about.php'>ACERCA DE</a></li>
                <li>
              </ul>
            </li>

            <div class="container-fluid" style="z-index: 0; display: flex; align-items: center;">
              <form class="form-search" role="search" method="GET" action="./search.php" style="width: 30vh; margin: 0 auto;">
                <div class="input-group">
                  <input class="form-control input-form-search" name="search" type="search" placeholder="Search" aria-label="Search" autocomplete="off" style="background: unset; color: white; max-height: 30px; border-color: rgba(255, 255, 255, 0.55)">
                  <div class="input-group-append">
                    <button class="btn btn-warning" type="submit" style="background-color: unset;
                      color: white; max-height: 30px; padding-top: 1px; padding-bottom:
                      1px; border-radius: 50px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                      </svg></button>
                  </div>
                </div>
              </form>
            </div>


            <a class='nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'account.php') ? 'active' : ''; ?>' href='./account.php'><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
              </svg></a>


          </div>
        </div>
      </div>
    </nav>
  </div>
</header>