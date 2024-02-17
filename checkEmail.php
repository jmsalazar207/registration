<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");


    $emailAdd = $_POST['email'];
    $param['conditions'] = array('eaddress' => $emailAdd); 
    $dbConn->findFirst('userprofile',$param);

    $count = $dbConn->count();
    echo $count;
