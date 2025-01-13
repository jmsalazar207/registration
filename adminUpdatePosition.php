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
    $id = $_POST['position_id'];
    $positionUpdate['area_assignment'] =$_POST['UpdatePositionAreaAssign'];
    $positionUpdate['updated_by'] = $_SESSION['userID'];
    $positionUpdate['datetime_updated']= $today;
    $UpdatePositionQuery = $dbConn->update('lib_position','position_id',$id,$positionUpdate);
    if($UpdatePositionQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Position successfully updated";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
