<?php
session_start();
require_once("../includes/init.php");
require_once("../includes/helper.php");
date_default_timezone_set('Asia/Manila');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
    $dataReturn['status'] = '0';
    $dataReturn['msg'] = "Session has expired. Please relogin your account.";
}else{              
    $id = '03-'.$_POST['resetUsername'];
    $profileResetPassword['password'] = md5($_POST['resetConfirmPassword']);
    $profileResetPassword['last_update'] = $today;
    $profileResetPassword['temp_password'] = '';
    $profileResetPassword['is_reset'] = '0';
    $profileQueryResetPassword = $dbConn->update('userprofile', 'empno', $id, $profileResetPassword);
    if($profileQueryResetPassword){
        $dataReturn['status'] = '1';
        $dataReturn['msg'] = "Password Changed!";
    }else {
        $dataReturn['status'] = '0';
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    }
}
echo json_encode($dataReturn);
