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
    $id = $_POST['ReferencesID'];
    $ReferencesUpdate['ref_name'] =sanitize(strtoupper($_POST['updateReferencesName']));
    $ReferencesUpdate['ref_address'] =sanitize(strtoupper($_POST['updateReferencesAddress']));
    $ReferencesUpdate['ref_mobile'] =sanitize(strtoupper($_POST['updateReferencesMobile']));
    $ReferencesUpdate['updated_by'] = $_SESSION['userID']; 
    $ReferencesUpdate['datetime_updated'] = $today;

    $UpdateReferencesQuery = $dbConn->update('lib_references','id',$id, $ReferencesUpdate);
    if($UpdateReferencesQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Reference Details successfully updated";
        echo json_encode($dataReturn);
    }else{
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
