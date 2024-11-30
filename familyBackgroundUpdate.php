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
    $id = $_POST['FBid'];
    $updateFamilyMember['surname'] = sanitize(strtoupper($_POST['updateFBSname']));
    $updateFamilyMember['firstname'] = sanitize(strtoupper($_POST['updateFBFname']));
    $updateFamilyMember['middlename'] = sanitize(strtoupper($_POST['updateFBMname']));
    $updateFamilyMember['extname'] = $_POST['updateFBExtName'];
    $updateFamilyMember['birthday'] = $_POST['updateFBDOB'];
    $updateFamilyMember['occupation'] = isset($_POST['updateFBoccupation']) ? sanitize(strtoupper($_POST['updateFBoccupation'])): '';
    $updateFamilyMember['businessName'] = isset($_POST['updateFBBusinessName']) ? sanitize(strtoupper($_POST['updateFBBusinessName'])): '';
    $updateFamilyMember['businessAddress'] = isset($_POST['updateFBBusinessAddress']) ? sanitize(strtoupper($_POST['updateFBBusinessAddress'])): '';
    $updateFamilyMember['telephoneNo'] = isset($_POST['updateFBTelephoneNo']) ? sanitize($_POST['updateFBTelephoneNo']): '';

    $familyBackgroundUpdateQuery = $dbConn->update('lib_family_background', 'id', $id, $updateFamilyMember);
    // echo $adminUpdateQuery;

    if($familyBackgroundUpdateQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Information has been updated successfully.";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
