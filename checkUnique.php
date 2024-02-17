<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");


    $emailAdd = $_POST['email'];
    $param['conditions'] = array('eaddress' => $emailAdd); 
    $dbConn->findFirst('userprofile',$param);
    $count['email'] = $dbConn->count();


    $mobileNumber = $_POST['mobile_no'];
    $param['conditions'] = array('mobile' => $mobileNumber); 
    $dbConn->findFirst('userprofile',$param);
    $count["mobile"] = $dbConn->count();


    echo json_encode($count);
