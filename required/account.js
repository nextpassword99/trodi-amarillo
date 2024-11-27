
// Obtener el modal
var modal = document.getElementById("myModal");

// Obtener el botón que abre el modal
var btnRedirect = document.getElementById("btnRedirect");

// Obtener el botón que cierra el modal
var closeModal = document.getElementById("closeModal");

// Cuando el usuario haga clic en el botón Ir a Sesión, redirigir a sesion.php
btnRedirect.onclick = function () {
    onclick = mostrarFormulario('form-sesion'); ocultarFormulario('form-registrarse'); ocultarModal()

}



// Función para cerrar el modal
function ocultarModal() {
    modal.style.display = "none";
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




// Cambiar de elemeto de sesion
function mostrarFormulario(id) {
    document.getElementById(id).style.display = "block";
}

function ocultarFormulario(id) {
    document.getElementById(id).style.display = "none";
}


