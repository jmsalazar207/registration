<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['DeleteID'])) {
    $id = $_POST['DeleteID'];
    $UnitDelete['unit_status'] = 3;
    $DeleteUnitQuery = $dbConn->update('lib_unit','unit_code ',$id, $UnitDelete);
    if($DeleteUnitQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Unit Details successfully deleted";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}