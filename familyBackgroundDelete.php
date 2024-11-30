<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['DeleteID'])) {
    $id = $_POST['DeleteID'];
    $FBDelete['status'] =4;
    $DeleteFBQuery = $dbConn->update('lib_family_background','id',$id, $FBDelete);
    if($DeleteFBQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Family Background Details successfully deleted";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}

