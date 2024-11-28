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
    //proceed to insert new user
    $id='03-'.$_POST['txtOldEmpno'];
    $adminUserUpdate['empno'] = sanitize('03-'.$_POST['txtEmpno']);
    $adminUserUpdate['sname'] = sanitize(strtoupper($_POST['txtLName']));
    $adminUserUpdate['fname'] = sanitize(strtoupper($_POST['txtFName']));
    $adminUserUpdate['mname'] = sanitize(strtoupper($_POST['txtMName']));
    $adminUserUpdate['ename'] = sanitize($_POST['txtExtName']);
    $adminUserUpdate['last_update'] = $today;
    $adminUserUpdate['sex'] = isset($_POST['txtSex']) ? $_POST['txtSex']:'';
    $adminUserUpdate['eaddress'] = isset($_POST['txtEmailAddress']) ? sanitize($_POST['txtEmailAddress']): '';
    $adminUserUpdate['birthdate'] = isset($_POST['txtBirthdate']) ? $_POST['txtBirthdate']: '';
    $adminUserUpdate['region'] = isset($_POST['txtRegion']) ? $_POST['txtRegion']: '';
    $adminUserUpdate['province'] = isset($_POST['txtProvince']) ? $_POST['txtProvince']:'';
    $adminUserUpdate['city'] = isset($_POST['txtCity']) ? $_POST['txtCity']: '';
    $adminUserUpdate['mobile'] = isset($_POST['txtMobileNumber']) ? sanitize($_POST['txtMobileNumber']):'';
    $adminUserUpdate['barangay'] = isset($_POST['txtBrgy']) ? $_POST['txtBrgy']: '';

    $adminUserUpdatePersonal_info['empno'] = sanitize('03-'.$_POST['txtEmpno']);
    $adminUserUpdatePerm_Address['empno'] = sanitize('03-'.$_POST['txtEmpno']);

    $adminUpdatePersonalInfoQuery = $dbConn->update('lib_personal_info', 'empno', $id, $adminUserUpdatePersonal_info);
    $adminUpdatePermAddressQuery = $dbConn->update('lib_perm_address', 'empno', $id, $adminUserUpdatePerm_Address);
    $adminUpdateQuery = $dbConn->update('userprofile', 'empno', $id, $adminUserUpdate);

    if($adminUpdateQuery && $adminUpdatePersonalInfoQuery && $adminUpdatePermAddressQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Information has been updated successfully.";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
