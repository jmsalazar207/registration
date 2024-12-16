<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['DeleteID'])) {
    $id = $_POST['DeleteID'];
    $DivisionDelete['division_status'] = 3;
    $DeleteDivisionQuery = $dbConn->update('lib_division','division_code ',$id, $DivisionDelete);
    if($DeleteDivisionQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Division Details successfully deleted";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}