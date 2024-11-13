<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];

if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Session has expired. Please relogin your account.";
    echo json_encode($dataReturn);
}else{  
    $empno = $_SESSION['userID']; 
    $other_info = $_POST;
    $other_info['empno'] = $empno;
    unset($other_info['token']);
    unset($other_info['submit_other_info']);

    $param['conditions'] = array('empno' => $empno);
    $dbConn->findFirst('other_info', $param);
    
    $message = "";
    if($dbConn->count() > 0){
        $message = "updated";
        $other_info_insert = $dbConn->update('other_info','empno',$empno,$other_info);
    }else{
        $message = "added";
        $other_info_insert = $dbConn->insert('other_info',$other_info);
    }


    if($other_info_insert){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Other Information successfully {$message}.";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
