<?php 
	$connection = new mysqli('localhost', 'root','','dbBienf3');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
	session_start();
		
?>	