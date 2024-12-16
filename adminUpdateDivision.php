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
    $DivisionID = $_POST['txtUpdateDivID'];
    $adminUpdateDivision['division_name'] = sanitize(strtoupper($_POST['txtUpdateDivName']));
    $adminUpdateDivision['division_name_code'] = sanitize(strtoupper($_POST['txtUpdateDivNameCode']));
    $adminUpdateDivision['cluster_code'] = sanitize(strtoupper($_POST['txtUpdateCluster']));
    $adminUpdateDivision['updated_by'] = $_SESSION['userID'];
    $adminUpdateDivision['datetime_updated'] = $today;

    $adminUpdateDivision = $dbConn->update('lib_division', 'division_code', $DivisionID, $adminUpdateDivision);
    if($adminUpdateDivision){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Division successfully updated.";
        echo json_encode($dataReturn);
    } else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
