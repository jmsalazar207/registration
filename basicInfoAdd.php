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
    $profileUpdate['street'] = sanitize(strtoupper($_POST['AddStreet']));
    $profileUpdate['numAdd'] = sanitize(strtoupper($_POST['AddHouseNumber']));
    $profileUpdate['region'] = sanitize(strtoupper($_POST['AddRegion']));
    $profileUpdate['province'] = sanitize(strtoupper($_POST['AddProvince']));
    $profileUpdate['city'] = sanitize(strtoupper($_POST['AddCity']));
    $profileUpdate['subd'] = sanitize(strtoupper($_POST['AddSubd']));
    $profileUpdate['zip_code'] = sanitize(strtoupper($_POST['AddZipCode']));
    $profileUpdate['mobile'] = sanitize(strtoupper($_POST['AddMobileNo']));
    $profileUpdate['telephone'] = sanitize(strtoupper($_POST['AddTelephoneNo']));
    $profileUpdate['eaddress'] = sanitize($_POST['AddEmail']);
    $profileUpdate['last_update'] = $today;

    $permAdd['empno'] = $id;
    $permAdd['permNumAdd'] = sanitize(strtoupper($_POST['AddPermanentHouseNumber']));
    $permAdd['permStreet'] = sanitize(strtoupper($_POST['AddPermanentStreet']));
    $permAdd['permSubd'] = sanitize(strtoupper($_POST['AddPermanentSubd']));
    $permAdd['permZipCode'] = sanitize(strtoupper($_POST['AddPermanentZipCode']));
    $permAdd['permRegion'] = $_POST['AddPermanentRegion'];
    $permAdd['permProvince'] = $_POST['AddPermanentProvince'];
    $permAdd['permCity'] = $_POST['AddPermanentCity'];
    $permAdd['permBarangay'] = $_POST['AddPermanentBarangay'];

    $profileUpdateQuery = $dbConn->update('userprofile', 'empno', $id, $profileUpdate); //update the existing data
    $permAddQuery = $dbConn->insert('lib_perm_address', $permAdd); //add permanent address 
    if($profileUpdateQuery && $permAddQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Information has been updated successfully.";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
