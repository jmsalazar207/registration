<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['DeleteID'])) {
    $id = $_POST['DeleteID'];
    $AreaAssignDelete['area_assignment_status'] = 3;
    $DeleteAreaAssignQuery = $dbConn->update('lib_area_assignment','area_assignment_code ',$id, $AreaAssignDelete);
    if($DeleteAreaAssignQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Area Assignment Details successfully deleted";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}