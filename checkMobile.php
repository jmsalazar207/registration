<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");


    $mobileNumber = $_POST['mobile_no'];
    $param['conditions'] = array('mobile' => $mobileNumber); 
    $dbConn->findFirst('userprofile',$param);

    $count = $dbConn->count();
    echo $count;