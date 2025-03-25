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
    $AreaAssignmentAdd['area_assignment_name'] = sanitize(strtoupper($_POST['addLPNPositionName']));
    $AreaAssignmentAdd['unit_code'] = sanitize(strtoupper($_POST['addLPNPositionInitial']));
    $AreaAssignmentAdd['added_by'] = $_SESSION['userID'];
    $AreaAssignmentAdd['datetime_added']= $today;
    $AddPositionNameQuery = $dbConn->insert('lib_position_name',$positionNameAdd);
    if($AddPositionNameQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Position Name successfully added";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
