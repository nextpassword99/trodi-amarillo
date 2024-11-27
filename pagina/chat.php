<?php
session_start();

if (isset($_GET['logout'])) {
    // Mensaje simple de salida
    $logout_message = "<div class='msgln'><span class='left-info'>El usuario <b class='user-name-left'>" . $_SESSION['name'] . "</b> ha abandonado la sesión de chat.</span><br></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
    session_destroy();
    header("Location: chat.php"); // Redireccionar al usuario
    exit;
}

if (isset($_POST['enter'])) {
    if ($_POST['name'] != "") {
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    } else {
        echo '<span class="error">Por favor, ingresa un nombre</span>';
    }
}

function loginForm()
{
    echo '
    <div id="loginform"> 
        <p>¡Por favor, ingresa un apodo para continuar!</p> 
        <form action="chat.php" method="post"> 
            <input type="text" name="name" id="name" /> 
            <input type="submit" name="enter" id="enter" value="Ingresar" /> 
        </form> 
    </div>';
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Aplicación de Chat</title>
    <meta name="description" content="Chat Trodi" />
    <link rel="stylesheet" href="chat.css" />
</head>

<body>
    <?php
    if (!isset($_SESSION['name'])) {
        loginForm();
    } else {
        ?>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Bienvenido, <b>
                        <?php echo $_SESSION['name']; ?>
                    </b></p>
                <p class="logout"><a id="exit" href="#">Salir del Chat</a></p>
            </div>
            <div id="chatbox">
                <?php
                if (file_exists("log.html") && filesize("log.html") > 0) {
                    $contents = file_get_contents("log.html");
                    echo $contents;
                }
                ?>
            </div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Enviar" />
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="chat.js"></script> <!-- Incluye el archivo chat.js -->
    </body>

    </html>
    <?php
    }
    ?>