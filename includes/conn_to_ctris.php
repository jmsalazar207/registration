<?php
	//$conn = new mysqli('localhost', 'root', '', 'ctris');
	$conn_ctris = new mysqli('172.31.32.251', 'remote_user', 'P@ssw0rd1.', 'ctris');
	if ($conn_ctris->connect_error) {
	    die("Connection failed: " . $conn_ctris->connect_error);
	}
	
?>