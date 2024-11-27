<?php
session_start();
if (isset($_SESSION['user'])) {
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <?php include 'layouts/head.php' ?>
        <link rel="stylesheet" href="required/account.css">
    </head>

    <body>
        <?php include 'layouts/header.php' ?>


        <!-- Mensaje de sesion ya iniciada -->
        <div class="container-mensaje-sesion">
            <div class="container sesion-usuario" id="sesion-iniciada" style="display: block;">
                <div class="title-form-modal">
                    <h2>Estimado usuario<h2>
                </div>
                <div class="contenido-sesion-iniciada">
                    <p>Usted ha logrado iniciar sesión satisfactoriamente, esperamos que su experiencia sea la mejor.<br>Por
                        el momento no es necesario que realize alguna acción en su cuenta. Esperamos que le agrade el
                        sitio.<br><br>
                        También puede <a href="logout.php">Cerrar sesión</a>
                    </p>
                </div>
            </div>
        </div>


        <?php include 'layouts/footer.php' ?>

        <script src="required/account.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>

    <?php
} else {
    header('location:sesion.php');
}
?>