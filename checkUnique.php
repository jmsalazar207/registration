<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");


    $emailAdd = $_POST['email'];
    $empno = $_POST['empno'];
    $sql_email = "SELECT * FROM userprofile WHERE eaddress = '$emailAdd' AND empno != '$empno'";
    $dbConn->findFirstQuery($sql_email);
    $count['email'] = $dbConn->count();


    $mobileNumber = $_POST['mobile_no'];
    $sql_mobile = "SELECT * FROM userprofile WHERE mobile = '$mobileNumber' AND empno != '$empno'";
    $dbConn->findFirstQuery($sql_mobile);
    $count["mobile"] = $dbConn->count();


    echo json_encode($count);
