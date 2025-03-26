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
    $id = $_POST['txtUpdateAreaAssignmentCode'];
    $AreaAssignUpdate['area_assignment_name'] = sanitize(strtoupper($_POST['txtUpdateAreaAssignmentName']));
    $AreaAssignUpdate['unit_code'] = sanitize(strtoupper($_POST['txtUpdateAreaAssignmentUnit']));
    $AreaAssignUpdate['office_location_code'] = sanitize(strtoupper($_POST['txtUpdateAreaAssignmentOfficeLocation']));
    $AreaAssignUpdate['updated_by'] = $_SESSION['userID'];
    $AreaAssignUpdate['datetime_updated']= $today;

    $UpdateAreaAssignQuery = $dbConn->update('lib_area_assignment','area_assignment_code',$id,$AreaAssignUpdate);
    if($UpdateAreaAssignQuery){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Area Assignment successfully updated";
    echo json_encode($dataReturn);
    }else {
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
    }
}
