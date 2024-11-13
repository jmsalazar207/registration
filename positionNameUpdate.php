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
                    $id = $_POST['posNameID'];
                    $positionNameUpdate['position_name'] = sanitize(strtoupper($_POST['updateLPNPositionName']));
                    $positionNameUpdate['position_initial'] = sanitize(strtoupper($_POST['updateLPNPositionInitial']));
                    $positionNameUpdate['updated_by'] = $_SESSION['userID'];
                    $positionNameUpdate['datetime_updated']= $today;
                    $UpdatePositionNameQuery = $dbConn->update('lib_position_name','position_name_id',$id,$positionNameUpdate);
                    if($UpdatePositionNameQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Position Name successfully updated";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
