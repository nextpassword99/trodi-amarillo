// Funcion para el modal
function expandImage(image) {
  var modal = document.getElementById('imageModal');
  var expandedImage = document.getElementById('expandedImage');
  var modalTitle = document.getElementById('modalTitle');
  var modalDescription = document.getElementById('modalDescription');
  var modalDate = document.getElementById('modalDate');

  var source = image.src;
  var title = image.getAttribute('data-title');
  var description = image.getAttribute('data-description');
  var createDate = image.getAttribute('data-create-on');

  expandedImage.src = source;
  modalTitle.innerHTML = title;
  modalDescription.innerHTML = description;
  modalDate.innerHTML = createDate;
  modal.style.display = 'flex';
  document.body.style.overflow = 'hidden'; // Evitar scroll en el fondo
}

function closeModal() {
  var modal = document.getElementById('imageModal');
  modal.style.display = 'none';
  document.body.style.overflow = 'auto'; // Reactivar el scroll en el fondo
}

// Cerrar el modal cuando se hace clic fuera de él
window.onclick = function(event) {
  var modal = document.getElementById('imageModal');
  if (event.target == modal) {
    closeModal();
  }
};

// Detener la propagación del evento onclick en el div del modal
document.getElementById('modalContent').onclick = function(event) {
  event.stopPropagation();
};






// Funciones para publication.php
function mostrarChat() {
  var chatContainer = document.getElementById('chat-container');
  var publicacionContainer = document.getElementById('publicacion-container');

  chatContainer.style.display = 'block';
  publicacionContainer.style.display = 'none';
}

function mostrarPublicacion() {
  var chatContainer = document.getElementById('chat-container');
  var publicacionContainer = document.getElementById('publicacion-container');

  chatContainer.style.display = 'none';
  publicacionContainer.style.display = 'block';
}
