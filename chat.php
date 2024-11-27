<?php
session_start();
if (isset($_SESSION['user'])) {
    ?>



    <!DOCTYPE html>
    <html lang="es-pe">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>CHAT - El blog de Trodi</title>
        <link rel="icon" type="image/png"
            href="https://cdn.glitch.global/9fa909c3-bb5a-4778-8d16-ef06342fa4db/Logo.png?v=1689436653865.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Victor+Mono:wght@100&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="required/chatpage.css" />
    </head>

    <body>
        <?php include 'layouts/header.php' ?>

        <?php
        include "dbConfig.php";

        $sql = "SELECT * FROM `chat_messages`";

        $query = mysqli_query($conn, $sql);
        ?>
        <script>
            $(document).ready(function () {
                function loadMessages() {
                    $.ajax({
                        url: "get_messages.php",
                        method: "GET",
                        dataType: "html",
                        success: function (data) {
                            $("#chatbox").html(data);
                            scrollToBottom();
                        }
                    });
                }

                function scrollToBottom() {
                    $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
                }

                loadMessages();
                setInterval(loadMessages, 500); // Actualizar cada 5 segundos

                $("#submitmsg").click(function (e) {
                    e.preventDefault();
                    var usermsg = $("#usermsg").val();

                    $.ajax({
                        url: "sendMessage.php",
                        method: "POST",
                        data: { msg: usermsg },
                        success: function () {
                            $("#usermsg").val("");
                            loadMessages();
                        }
                    });
                });
            });
        </script>



        <div class="container-element-all" id="wrapper">
            <div id="menu" class="menu">
                <h2 style="flex: 1;">Bienvenido <span style="color:black;">
                        <?php echo $_SESSION['user']; ?> !
                    </span>
                </h2>

                <p class="logout">
                    <a id="exit" class="exit-menu" href="logout.php">Salir del Chat</a>
                </p>
            </div>
            </br>
            <center>
                <p class="description">No censura, no registros, anonimo y privado</p>
            </center>

            <div id="chatbox" class="container-element-chat">
                <!-- Contenido del chat -->
            </div>

            <div>
                <form name="message" class="send-form" method="post" action="sendMessage.php">
                    <input name="msg" class="submit-msg form-control" id="usermsg" placeholder="Ingresa tu mensaje aquí..."
                        autocomplete="off" required>
                    <button type="submit" class="button-send btn btn-warning" id="submitmsg">Enviar</button>
                </form>
            </div>
        </div>

        <audio id="messageSound">
            <source src="doc/mensaje.mp3">
        </audio>


        <?php include 'layouts/footer.php' ?>

        <script>
            $(document).ready(function () {
                function playSoundIfMessageIncreases() {
                    var mensaje_anterior = 0;

                    // Función que cuenta los elementos con clase 'container-msg'
                    function countMessages() {
                        return $('.container-msg').length;
                    }

                    // Función que reproduce el audio si el número de mensajes aumenta
                    function playAudioIfMessageIncreases() {
                        var mensaje_actual = countMessages();
                        if (mensaje_actual > mensaje_anterior) {
                            var audio = document.getElementById('messageSound');
                            audio.play();
                        }
                        mensaje_anterior = mensaje_actual;
                    }

                    // Ejecutar la función para reproducir audio cada 5 segundos
                    setInterval(playAudioIfMessageIncreases, 1000);
                }

                // Llamar a la función para contar mensajes y reproducir audio
                playSoundIfMessageIncreases();
            });
        </script>


    </body>

    </html>
    <?php
} else {
    header('location:sesion.php');
}
?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>