<?php 
	$connection = new mysqli('localhost', 'root');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
	session_start();
		
?>	