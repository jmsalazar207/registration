<?php
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	include 'conn.php';

	if(!isset($_SESSION['userID']) || trim($_SESSION['userID']) == ''){
		header('location: index.php');
	}
