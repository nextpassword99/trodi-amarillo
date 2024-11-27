<?php

include "dbConfig.php";
session_start();
if($_POST)
{
	
	$user=$_SESSION['user'];
    $msg=$_POST['msg'];
    
	$sql="INSERT INTO `chat_messages`(`user`, `message`) VALUES ('".$user."', '".$msg."')";

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		header('Location: chat.php');
	}
	else
	{
		echo "Algo salió mal";
	}
	
	}
?>