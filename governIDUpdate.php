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
    $id = $_POST['GovernID'];
    $GovernIDUpdate['govern_id_title'] =sanitize(strtoupper($_POST['GovernIDTitle']));
    $GovernIDUpdate['govern_id_no'] =sanitize(strtoupper($_POST['GovernIDNo']));
    $GovernIDUpdate['govern_id_date'] =sanitize(strtoupper($_POST['GovernIDDateIssue']));
    $GovernIDUpdate['govern_id_place'] =sanitize(strtoupper($_POST['GovernIDPlaceIssue']));
    $GovernIDUpdate['updated_by'] = $_SESSION['userID']; 
    $GovernIDUpdate['datetime_updated'] = $today;
    $UpdateGovernIDQuery = $dbConn->update('lib_govern_id','id',$id, $GovernIDUpdate);
    if($UpdateGovernIDQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Issued Governement ID Details successfully updated";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
