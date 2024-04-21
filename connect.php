<?php 
	$connection = new mysqli('localhost','root','','dbbienf3');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
	session_start();
		
?>	