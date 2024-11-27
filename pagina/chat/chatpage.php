<?php
session_start();
if (isset($_SESSION['name'])) {
	include "header2.php";
	include "config.php";

	$sql = "SELECT * FROM `messages`";

	$query = mysqli_query($conn, $sql);
	?>
	<script>
		$(document).ready(function () {
			function loadMessages() {
				$.ajax({
					url: "get_messages.php", // Archivo PHP que obtiene los mensajes de la base de datos
					method: "GET",
					dataType: "html",
					success: function (data) {
						$("#chatbox").html(data); // Actualizar el contenido del div #chatbox con los mensajes obtenidos
						scrollToBottom(); // Desplazarse al fondo del chat para ver los mensajes más recientes
					}

				});
			}

			function scrollToBottom() {
				$("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
			}


			// Cargar mensajes al cargar la página y luego cada 0.5 segundos
			loadMessages();
			setInterval(loadMessages, 500); // Actualizar cada 0.5 segundos

			// Enviar mensaje usando AJAX
			$("#submitmsg").click(function (e) {
				e.preventDefault(); // Detener el comportamiento predeterminado del formulario

				var usermsg = $("#usermsg").val();

				$.ajax({
					url: "sendMessage.php", // Archivo PHP que envía el mensaje a la base de datos
					method: "POST",
					data: { msg: usermsg }, // Datos a enviar
					success: function () {
						$("#usermsg").val(""); // Limpiar el campo del mensaje después de enviarlo
						loadMessages(); // Cargar los mensajes nuevamente después de enviar el mensaje
					}
				});
			});
		});
	</script>



	<div id="wrapper">
		<div id="menu">
			<h2 style="flex: 1;">Bienvenido <span style="color:black;">
					<?php echo $_SESSION['name']; ?> !
				</span>
			</h2>

			<p class="logout">
				<a id="exit" href="logout.php">Salir del Chat</a>
			</p>
		</div>
		</br>
		<center>
			<p class="description">No censura, no registros, anonimo y privado</p>
		</center>



		<div id="chatbox">
			<?php
			$lastDate = ""; // Variable para almacenar la fecha del mensaje anterior
			if (mysqli_num_rows($query) > 0) {
				while ($row = mysqli_fetch_assoc($query)) {
					$messageTime = date("H:i", strtotime($row['create_on'])); // Obtener la hora del mensaje
		
					// Mostrar la fecha como un mensaje único antes de los mensajes del día actual
					$messageDate = date("Y-m-d", strtotime($row['create_on']));
					if ($lastDate !== $messageDate) {
						echo '<div class="date-message">Fecha: ' . $messageDate . '</div>';
						$lastDate = $messageDate;
					}
					?>
					<div class="message">
						<p>
							<span class="message-time">
								<?php echo $messageTime; ?> -
							</span>
							<span class="message-sender">
								<?php echo $row['name']; ?>:
							</span>
							<?php echo $row['message']; ?>
						</p>
					</div>
					<?php
				}
			} else {
				?>
				<div class="message">
					<p>
						No hay ninguna conversación previa.
					</p>
				</div>
				<?php
			}
			?>
		</div>
		<div>
			<form name="message" method="post" action="sendMessage.php">
				<input name="msg" class="form-control" id="usermsg" placeholder="Ingresa tu mensaje aquí..."
					required></input>
				<button type="submit" class="btn btn-warning" id="submitmsg">Enviar</button>
			</form>
		</div>
	</div>

	<audio id="messageSound">
		<source src="doc/mensaje.mp3">
	</audio>
	<script>
		$(document).ready(function() {
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
	header('location:index.php');
}
?>