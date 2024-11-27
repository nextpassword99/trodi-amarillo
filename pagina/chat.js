// Documento jQuery
$(document).ready(function () {
    $("#submitmsg").click(function () {
        var clientmsg = $("#usermsg").val();
        $.post("post.php", { text: clientmsg });
        $("#usermsg").val("");
        return false;
    });
    
    function loadLog() {
        var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; // Altura de desplazamiento antes de la solicitud
        $.ajax({
            url: "log.html",
            cache: false,
            success: function (html) {
                $("#chatbox").html(html); // Insertar registro de chat en el div #chatbox
                // Desplazamiento automático
                var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; // Altura de desplazamiento después de la solicitud
                if (newscrollHeight > oldscrollHeight) {
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); // Desplazarse automáticamente hacia el fondo del div
                }	
            }
        });
    }

    setInterval(loadLog, 2500);

    $("#exit").click(function () {
        var exit = confirm("¿Estás seguro/a de que quieres finalizar la sesión?");
        if (exit) {
            window.location = "publication.php?logout=true";
        }
    });
});

