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
    //proceed to insert new user
    $user['empno'] = '03-'.sanitize($_POST['txtAddEmpno']);
    $user['sname'] = sanitize(strtoupper($_POST['txtAddLName']));
    $user['fname'] = sanitize(strtoupper($_POST['txtAddFName']));
    $user['mname'] = sanitize(strtoupper($_POST['txtAddMName']));
    $user['ename'] = sanitize(strtoupper($_POST['txtAddExtName']));
    $user['password'] = '';
    $user['mobile'] = '';
    $user['birthdate'] = '';
    $user['eaddress'] = '';
    $user['street'] = '';
    $user['region'] = '';
    $user['numAdd'] = '';
    $user['barangay'] = '';
    $user['city'] = '';
    $user['province'] = '';
    $user['position'] = '';
    $user['division'] = '';
    $user['unit'] = '';
    $user['date_registered'] = '';
    $user['date_approved'] = '';
    $user['uploaded_id'] = '';
    $user['user_level'] = '';
    $user['isLog'] = '';
    $user['last_update'] = '';
    $user['date_deleted'] = '';
    $insertNewUser = $dbConn->insert('userprofile',$user);
    if($insertNewUser){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "New user successfully added.";
        echo json_encode($dataReturn);
    } else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
