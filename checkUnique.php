<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");

if($_POST['type'] == 1){
    echo $_POST['type'];
    $emailAdd = $_POST['email'];
    $empno = $_POST['empno'];
    $sql_email = "SELECT * FROM userprofile WHERE eaddress = '$emailAdd' AND empno != '$empno' AND eaddress !=''";
    $dbConn->findFirstQuery($sql_email);
    $count['email'] = $dbConn->count();


    $mobileNumber = $_POST['mobile_no'];
    $sql_mobile = "SELECT * FROM userprofile WHERE mobile = '$mobileNumber' AND empno != '$empno' AND mobile !=''";
    $dbConn->findFirstQuery($sql_mobile);
    $count["mobile"] = $dbConn->count();


    echo json_encode($count);
}else{
    $oldEmpno = $_POST['adminOldEmpno'];
    $emailAdd = $_POST['email'];
    $empno = $_POST['empno'];
    $sql_email = "SELECT * FROM userprofile WHERE eaddress = '$emailAdd' AND empno != '$empno' AND eaddress !='' AND empno != '$oldEmpno'";
    $dbConn->findFirstQuery($sql_email);
    $count['email'] = $dbConn->count();


    $mobileNumber = $_POST['mobile_no'];
    $sql_mobile = "SELECT * FROM userprofile WHERE mobile = '$mobileNumber' AND empno != '$empno' AND mobile !='' AND empno != '$oldEmpno'";
    $dbConn->findFirstQuery($sql_mobile);
    $count["mobile"] = $dbConn->count();


    echo json_encode($count);
}


