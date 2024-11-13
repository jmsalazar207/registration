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
    $GovernID['empno'] = $id;
    $GovernID['govern_id_title'] =sanitize(strtoupper($_POST['GovernIDTitle']));
    $GovernID['govern_id_no'] =sanitize(strtoupper($_POST['GovernIDNo']));
    $GovernID['govern_id_date'] =sanitize(strtoupper($_POST['GovernIDDateIssue']));
    $GovernID['govern_id_place'] =sanitize(strtoupper($_POST['GovernIDPlaceIssue']));
    $AddGovernIDQuery = $dbConn->insert('lib_govern_id',$GovernID);
    if($AddGovernIDQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Government ID Details successfully added";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
