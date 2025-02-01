<?php
session_start();
require_once('includes/init.php');
$dataReturn = [];
$today = date('Y-m-d H:i:s');
if (isset($_POST['DeleteID'])) {
    $id = $_POST['DeleteID'];
    $positionNameDelete['updated_by'] = $_SESSION['userID'];
    $positionNameDelete['datetime_updated']= $today;
    $positionNameDelete['status']= 3;
    $DeletePositionNameQuery = $dbConn->update('lib_position_name','position_name_id',$id,$positionNameDelete);
    if($DeletePositionNameQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Position Name successfully deleted";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}

