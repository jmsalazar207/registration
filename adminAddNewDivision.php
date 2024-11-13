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
    //proceed to insert new division
    $user['division_name'] = sanitize(strtoupper($_POST['txtDivName']));
    $user['division_name_code'] = sanitize(strtoupper($_POST['txtDivNameCode']));
    $user['cluster_code'] = sanitize(strtoupper($_POST['txtCluster']));
    $user['added_by'] = $_SESSION['userID'];
    $user['datetime_added'] = '';
    $user['updated_by'] = '';
    $user['datetime_updated'] = '';
    $user['deleted_by'] = '';
    $user['datetime_deleted'] = '';
    
    $insertNewDivision = $dbConn->insert('lib_division',$user);
    if($insertNewDivision){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "New division successfully added.";
        echo json_encode($dataReturn);
    } else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
