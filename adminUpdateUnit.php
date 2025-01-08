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
    $UnitID = $_POST['txtUpdateUnitID'];
    $AdminUpdateUnit['unit_name'] = sanitize(strtoupper($_POST['txtUpdateUnitName']));
    $AdminUpdateUnit['unit_name_code'] = sanitize(strtoupper($_POST['txtUpdateUnitNameCode']));
    $AdminUpdateUnit['division_code'] = sanitize(strtoupper($_POST['txtUpdateUnitDiv']));
    // $AdminUpdateUnit['station_code'] = sanitize(strtoupper($_POST['txtUpdateUnitOfficialStation']));
    $AdminUpdateUnit['updated_by'] = $_SESSION['userID'];
    $AdminUpdateUnit['datetime_updated'] = $today;

    
    $adminUpdate = $dbConn->update('lib_unit', 'unit_code', $UnitID, $AdminUpdateUnit);
    if($adminUpdate){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Unit details successfully updated.";
        echo json_encode($dataReturn);
    } else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
