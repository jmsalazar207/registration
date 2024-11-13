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
    $otherInfoAdd['empno'] = $id;
    $otherInfoAdd['pob'] = $_POST['PlaceOfBirth'];
    $otherInfoAdd['citizenship'] = $_POST['chkFilipino'];
    $otherInfoAdd['byBirth'] = isset($_POST['chkByBirth']) ? $_POST['chkByBirth']: '';
    $otherInfoAdd['byNaturalization'] = isset($_POST['chkByNaturalization']) ? $_POST['chkByNaturalization']: '';
    $otherInfoAdd['country_citizenship'] = isset($_POST['DualCitizenCountry'])? $_POST['DualCitizenCountry']: '';
    $otherInfoAdd['civil_status'] = $_POST['CivilStatus'];
    $otherInfoAdd['civil_status_other'] = isset($_POST['OthersCivilStatus']) ? sanitize(strtoupper($_POST['OthersCivilStatus'])): '';
    $otherInfoAdd['height'] = sanitize(strtoupper($_POST['Height']));
    $otherInfoAdd['weight'] = sanitize(strtoupper($_POST['Weight']));
    $otherInfoAdd['blood_type'] = sanitize(strtoupper($_POST['BloodType']));
    $otherInfoAdd['gsis_no'] = sanitize(strtoupper($_POST['gsisNo']));
    $otherInfoAdd['pagibig_no'] = sanitize(strtoupper($_POST['pagibigNo']));
    $otherInfoAdd['philhealth_no'] = sanitize(strtoupper($_POST['philhealthNo']));
    $otherInfoAdd['sss_no'] = sanitize(strtoupper($_POST['sssNo']));
    $otherInfoAdd['tin_no'] = sanitize(strtoupper($_POST['tinNo']));
    $otherInfoAddQuery = $dbConn->insert('lib_personal_info', $otherInfoAdd);
    if($otherInfoAddQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Information has been successfully added.";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
