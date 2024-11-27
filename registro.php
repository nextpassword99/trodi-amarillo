<?php
session_start();
include "dbConfig.php";

$modalVisible = false;

if ($_POST) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Verificar si el nombre de usuario ya existe
    $sql_check = "SELECT * FROM `account` WHERE `user` = '$user'";
    $query_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        // El nombre de usuario ya existe, mostrar el modal
        $modalVisible = true;
    } else {
        $sql = "INSERT INTO `account` (`user`, `password`) VALUES ('$user', '$password')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION['user'] = $user;
            header('Location: index.php');
            exit;
        } else {
            echo "Algo salió mal";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="es-pe">

<head>
    <?php include 'layouts/head.php' ?>
    <link rel="stylesheet" type="text/css" href="required/chatpage.css" />
</head>

<body>

    <?php include 'layouts/header.php' ?>

    <div class="container-registro">
            <div class="container" id="form-sesion">
                <div class="title-sesion">
                    <h2>Registrarse</h2>
                </div>
                <div class="form-sesion">
                    <form class="form-registro" method="post">
                        <div class="mb-3">
                            <label for="user" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="user" name="user" required>
                        </div>

                        <div class="mb-3">
                            <label for="pwd" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="pwd" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-warning" style="margin-top: 1rem;">Registrarse</button>

                    </form>
                </div>

                <div style="margin: 10px;">
                    <p style="font-size: 14px;">Actualmente no tenemos terminos y condiciones dentro de la página, solo
                        ser
                        respetuoso y no dañar contenido ajeno.</p>
                    <p style="font-size: 14px;">¿Ya tienes una cuenta? <a href="sesion.php">Iniciar sesión</a>
                </div>
                <br>
            </div>
    </div>

    <!-- Modal de error de registro -->
    <div id="myModal" class="modal" style="<?= $modalVisible ? 'display: block;' : '' ?>">
        <!-- Modal content -->
        <div class="modal-content" style="max-width: 250px;">
            <h3 class="title-modal">¡Error de registro!
                <svg id="closeModal" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-square"
                    viewBox="0 0 16 16" style="color: red; float: right; font-size: 2rem; width: 30px; height: 30px;">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </h3>
            <br>
            <p>El nombre de usuario ya existe. Por favor, intente con otro nombre o inicie sesión.</p>
            <br>
            <center>
                <button class="btn-enter" id="btnRedirect">Iniciar sesión</button>
            </center>
        </div>
    </div>

    <?php include 'layouts/footer.php' ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



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
            window.location.href = "account.php";
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