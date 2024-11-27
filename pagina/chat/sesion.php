<?php include "header2.php"; ?>

<?php
include "config.php";
if ($_POST) {
  $name = $_POST['name'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `register` where name = '" . $name . "' and password = '" . $password . "' ";
  $query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    session_start();
    $_SESSION['name'] = $row['name'];
    header('Location: home.php');
  } else {
    echo "
  <!-- Modal -->
  <div id='myModal' class='modal' style='display: block;'>
      <!-- Modal content -->
      <div class='modal-content'>
          <h3 class='title-modal'>¡Error de sesión!
              <svg id='closeModal' xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-x-square'
                  viewBox='0 0 16 16' style='color: red; float: right; font-size: 2rem; width: 30px; height: 30px;'>
                  <path
                      d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z' />
                  <path
                      d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z' />
              </svg>
              <!-- <span class='close' id='closeModal'>&times;</span> -->
          </h3>
          <br>
          <hr><br>
          <p>Nombre o contraseña incorrectos. Por favor, intente nuevamente o cree una cuenta.</p>
          <br>
          <hr>
          <center><button class='btn-enter' id='btnRedirect'>Crear cuenta</button></center>
      </div>
  </div>

  <script>
      // Obtener el modal
      var modal = document.getElementById('myModal');

      // Obtener el botón que abre el modal
      var btnRedirect = document.getElementById('btnRedirect');

      // Obtener el botón que cierra el modal
      var closeModal = document.getElementById('closeModal');

      // Cuando el usuario haga clic en el botón Ir a Sesión, redirigir a sesion.php
      btnRedirect.onclick = function () {
          window.location.href = 'registro.php';
      }

      // Cuando el usuario haga clic en la X para cerrar el modal, ocultar el modal
      closeModal.onclick = function () {
          modal.style.display = 'none';
      }

      // Cuando el usuario haga clic fuera del modal, cerrar el modal
      window.onclick = function (event) {
          if (event.target == modal) {
              modal.style.display = 'none';
          }
      }
  </script>
    ";
  }
}
?>
<div id="loginform">
  <div class="container">
    <center>
      <h1>Formularío de sesión</h1>
    </center>
    <p>Iniciar sesión para continuar</p>
    <form class="form-registro" style="align-items: center;" method="post" action="">

      <div>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="name" placeholder="Ingresa un nombre" name="name" required>
        </div>
      </div>

      <div class="password-field">
        <input type="password" id="pwd" placeholder="Ingresa una contraseña" name="password" required>
        <button type="button" id="togglePasswordBtn" onclick="togglePasswordVisibility()">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
            viewBox="0 0 16 16">
            <path
              d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
          </svg>
        </button>
      </div>

      <div>
        <div class="col-sm-offset-2 col-sm-10">
          <center>
            <button id="enter" type="submit">Ingresar</button>
          </center>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- script para ver la contraseña -->
<script>
  function togglePasswordVisibility() {

    var passwordInput = document.getElementById("pwd");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  }
</script>

</body>

</html>