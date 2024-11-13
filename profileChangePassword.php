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
}else{              $id = $_SESSION['userID'];
                    $profileUpdatePassword['password'] = md5($_POST['ConfirmPassword']);
                    $profileUpdatePassword['last_update'] = $today;
    
                    $profileUpdatePasswordQuery = $dbConn->update('userprofile', 'empno', $id, $profileUpdatePassword);
                    // echo $adminUpdateQuery;

                    if($profileUpdatePasswordQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Password Changed!";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
