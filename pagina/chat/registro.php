<?php
session_start();
include "config.php";

$modalVisible = false;

if ($_POST) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Verificar si el nombre de usuario ya existe
    $sql_check = "SELECT * FROM `register` WHERE `name` = '$name'";
    $query_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        // El nombre de usuario ya existe, mostrar el modal
        $modalVisible = true;
    } else {
        $sql = "INSERT INTO `register` (`name`, `password`) VALUES ('$name', '$password')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION['name'] = $name;
            header('Location: home.php');
        } else {
            echo "Algo salió mal";
        }
    }
}

include "header2.php";
?>

<div id="loginform">
    <div class="container">
        <h1>Formularío de registro</h1>
        <p>¡Por favor, cree una cuenta para continuar!</p>
        <form class="form-registro" method="post">

            <input type="text" id="name" placeholder="Ingresa un nombre" name="name" required>

            <div class="password-field">
                <input type="password" id="pwd" placeholder="Ingresa una contraseña" name="password" required>
                <button type="button" id="togglePasswordBtn" onclick="togglePasswordVisibility()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                        viewBox="0 0 16 16">
                        <path
                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path
                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>
                </button>
            </div>


            <!-- Botón para ver la contraseña -->

            <input type="submit" id="enter" value="Registrar">

        </form>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal" style="<?= $modalVisible ? 'display: block;' : '' ?>">
    <!-- Modal content -->
    <div class="modal-content">
        <h3 class="title-modal">¡Error de registro!
            <svg id="closeModal" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-square"
                viewBox="0 0 16 16" style="color: red; float: right; font-size: 2rem; width: 30px; height: 30px;">
                <path
                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path
                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
            <!-- <span class="close" id="closeModal">&times;</span> -->
        </h3>
        <br>
        <hr><br>
        <p>El nombre de usuario ya existe. Por favor, intente con otro nombre o inicie sesión.</p>
        <br>
        <hr>
        <center><button class="btn-enter" id="btnRedirect">Iniciar sesión</button></center>
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

<!-- script para el Modal de registro -->
<script>
    // Obtener el modal
    var modal = document.getElementById("myModal");

    // Obtener el botón que abre el modal
    var btnRedirect = document.getElementById("btnRedirect");

    // Obtener el botón que cierra el modal
    var closeModal = document.getElementById("closeModal");

    // Cuando el usuario haga clic en el botón Ir a Sesión, redirigir a sesion.php
    btnRedirect.onclick = function () {
        window.location.href = "sesion.php";
    }

    // Cuando el usuario haga clic en la X para cerrar el modal, ocultar el modal
    closeModal.onclick = function () {
        modal.style.display = "none";
    }

    // Cuando el usuario haga clic fuera del modal, cerrar el modal
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>

</html>