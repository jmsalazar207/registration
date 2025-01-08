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
    //proceed to insert new division
    $user['unit_name'] = sanitize(strtoupper($_POST['txtUnitName']));
    $user['unit_name_code'] = sanitize(strtoupper($_POST['txtUnitNameCode']));
    $user['division_code'] = sanitize(strtoupper($_POST['txtUnitDiv']));
    // $user['station_code'] = sanitize(strtoupper($_POST['txtUnitOfficialStation']));
    $user['added_by'] = $_SESSION['userID'];
    $user['datetime_added'] = $today;
    $user['updated_by'] = '';
    $user['datetime_updated'] = '';
    $user['delete_by'] = '';
    $user['datetime_deleted'] = '';
    
    $insertNewUnit = $dbConn->insert('lib_unit',$user);
    if($insertNewUnit){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "New Unit successfully added.";
        echo json_encode($dataReturn);
    } else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
