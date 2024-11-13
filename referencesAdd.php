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
    $id = $_SESSION['userID'];
    $references['empno'] = $id;
    $references['ref_name'] =sanitize(strtoupper($_POST['referencesName']));
    $references['ref_address'] =sanitize(strtoupper($_POST['referencesAddress']));
    $references['ref_mobile'] =sanitize(strtoupper($_POST['referencesMobile']));
    $AddReferencesQuery = $dbConn->insert('lib_references',$references);
    if($AddReferencesQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "References Details successfully added";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
