<?php
	//$conn = new mysqli('localhost', 'root', '', 'ctris');
	$conn_ctris_local = new mysqli('localhost', 'root', '', 'ctris');
	if ($conn_ctris_local->connect_error) {
	    die("Connection failed: " . $conn_ctris_local->connect_error);
	}
	
?>