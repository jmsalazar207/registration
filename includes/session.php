<?php
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	if(!isset($_SESSION['userID']) || trim($_SESSION['userID']) == ''){
		header('location: index.php');
	}


