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
    $check = $_POST['sameAddressCheckbox'];
    if($check ==1) {
        $id = $_SESSION['userID'];
        $profileUpdate['street'] = sanitize(strtoupper($_POST['AddStreet']));
        $profileUpdate['numAdd'] = sanitize(strtoupper($_POST['AddHouseNumber']));
        $profileUpdate['region'] = sanitize(strtoupper($_POST['AddRegion']));
        $profileUpdate['province'] = sanitize(strtoupper($_POST['AddProvince']));
        $profileUpdate['city'] = sanitize(strtoupper($_POST['AddCity']));
        $profileUpdate['barangay'] = sanitize(strtoupper($_POST['AddBarangay']));
        $profileUpdate['subd'] = sanitize(strtoupper($_POST['AddSubd']));
        $profileUpdate['zip_code'] = sanitize(strtoupper($_POST['AddZipCode']));

        $profileUpdate['mobile'] = sanitize(strtoupper($_POST['AddMobileNo']));
        $profileUpdate['telephone'] = sanitize(strtoupper($_POST['AddTelephoneNo']));
        $profileUpdate['eaddress'] = sanitize($_POST['AddEmail']);
        $profileUpdate['last_update'] = $today;

        $permUpdate['sameAddress'] = sanitize(strtoupper($check));
        $permUpdate['permNumAdd'] = sanitize(strtoupper($_POST['AddHouseNumber']));
        $permUpdate['permStreet'] = sanitize(strtoupper($_POST['AddStreet']));
        $permUpdate['permSubd'] = sanitize(strtoupper($_POST['AddSubd']));
        $permUpdate['permZipCode'] = sanitize(strtoupper($_POST['AddZipCode']));

        $permUpdate['permRegion'] = sanitize(strtoupper($_POST['AddRegion']));
        $permUpdate['permProvince'] = sanitize(strtoupper($_POST['AddProvince']));
        $permUpdate['permCity'] = sanitize(strtoupper($_POST['AddCity']));
        $permUpdate['permBarangay'] = sanitize(strtoupper($_POST['AddBarangay']));

        $profileUpdateQuery = $dbConn->update('userprofile', 'empno', $id, $profileUpdate);
        $permUpdateQuery = $dbConn->update('lib_perm_address', 'empno', $id, $permUpdate);
        // echo $adminUpdateQuery;

        if($profileUpdateQuery && $permUpdateQuery){
            $dataReturn['status'] = "success";
            $dataReturn['msg'] = "Information has been updated successfully.";
            echo json_encode($dataReturn);
        }else {
            $dataReturn['status'] = "failed";
            $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
            echo json_encode($dataReturn);
        }
    } else {
        $check = $_POST['sameAddressCheckbox'];
        $id = $_SESSION['userID'];
        $profileUpdate['street'] = sanitize(strtoupper($_POST['AddStreet']));
        $profileUpdate['numAdd'] = sanitize(strtoupper($_POST['AddHouseNumber']));
        $profileUpdate['region'] = sanitize(strtoupper($_POST['AddRegion']));
        $profileUpdate['province'] = sanitize(strtoupper($_POST['AddProvince']));
        $profileUpdate['city'] = sanitize(strtoupper($_POST['AddCity']));
        $profileUpdate['barangay'] = sanitize(strtoupper($_POST['AddBarangay']));
        $profileUpdate['subd'] = sanitize(strtoupper($_POST['AddSubd']));
        $profileUpdate['zip_code'] = sanitize(strtoupper($_POST['AddZipCode']));

        $profileUpdate['mobile'] = sanitize(strtoupper($_POST['AddMobileNo']));
        $profileUpdate['telephone'] = sanitize(strtoupper($_POST['AddTelephoneNo']));
        $profileUpdate['eaddress'] = sanitize($_POST['AddEmail']);
        $profileUpdate['last_update'] = $today;

        $permUpdate['sameAddress'] = sanitize(strtoupper($check));
        $permUpdate['permNumAdd'] = sanitize(strtoupper($_POST['AddPermanentHouseNumber']));
        $permUpdate['permStreet'] = sanitize(strtoupper($_POST['AddPermanentStreet']));
        $permUpdate['permSubd'] = sanitize(strtoupper($_POST['AddPermanentSubd']));
        $permUpdate['permZipCode'] = sanitize(strtoupper($_POST['AddPermanentZipCode']));
        $permUpdate['permRegion'] = $_POST['AddPermanentRegion'];
        $permUpdate['permProvince'] = $_POST['AddPermanentProvince'];
        $permUpdate['permCity'] = $_POST['AddPermanentCity'];
        $permUpdate['permBarangay'] = $_POST['AddPermanentBarangay'];

        $profileUpdateQuery = $dbConn->update('userprofile', 'empno', $id, $profileUpdate);
        $permUpdateQuery = $dbConn->update('lib_perm_address', 'empno', $id, $permUpdate);
        // echo $adminUpdateQuery;

            if($profileUpdateQuery && $permUpdateQuery){
                $dataReturn['status'] = "success";
                $dataReturn['msg'] = "Information has been updated successfully.";
                echo json_encode($dataReturn);
            }else {
                $dataReturn['status'] = "failed";
                $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                echo json_encode($dataReturn);
            }
        }  
}
