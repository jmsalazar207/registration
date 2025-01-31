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
    $id = $_SESSION['userID'];
    $profileUpdatePassword['password'] = password_hash($_POST['ConfirmPassword'], PASSWORD_DEFAULT);
    $profileUpdatePasswor['password_md5'] = '';
    $profileUpdatePassword['isLog'] = '0';
    $profileUpdatePassword['last_update'] = $today;

    $profileUpdatePasswordQuery = $dbConn->update('userprofile', 'empno', $id, $profileUpdatePassword);

    if($profileUpdatePasswordQuery){
        $dataReturn['status'] = "1";
        $dataReturn['msg'] = "Your password has been successfully updated. Would you like to stay logged in or log out and sign in again with your new password?";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "0";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
