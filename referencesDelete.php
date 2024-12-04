<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['DeleteID'])) {
    $id = $_POST['DeleteID'];
    $referencesDelete['ref_status'] =4;
    $DeleteReferencesQuery = $dbConn->update('lib_references','id',$id, $referencesDelete);
    if($DeleteReferencesQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "References Details successfully deleted";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}






