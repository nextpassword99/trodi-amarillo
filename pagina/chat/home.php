<?php
session_start();
if (isset($_SESSION['name'])) {
	include "header2.php";
	include "config.php";

	$sql = "SELECT * FROM `messages`";

	$query = mysqli_query($conn, $sql);
	?>
	<style>
		.containerHome {
			padding-top: 15px;
			text-align: center;
			padding-bottom: 25px;
			background: white;
			width: 80%;
			border-radius: 10px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
		}
	</style>

	<div>
		<center>
			<div class="containerHome">
				<h1>Hola <span style="color:#ffae00;">
						<?php echo $_SESSION['name']; ?> !
					</span></h1>
				<br><br>
				<label>Bienvenido al Chat de Trodi, recuerda ser respuetuoso con los demas</label><br>
				<br><br>
				<a href="chatpage.php" id="enter">Abrir el chat</a>

			</div>
		</center>
	</div>

	</body>

	</html>
	<?php
} else {
	header('location:index.php');
}
?>