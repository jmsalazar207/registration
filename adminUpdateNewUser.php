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
                    $id=$_POST['txtEmpno'];
                    $adminUserUpdate['sname'] = sanitize(strtoupper($_POST['txtLName']));
                    $adminUserUpdate['fname'] = sanitize(strtoupper($_POST['txtFName']));
                    $adminUserUpdate['mname'] = sanitize(strtoupper($_POST['txtMName']));
                    $adminUserUpdate['ename'] = sanitize(strtoupper($_POST['txtExtName']));
                    $adminUserUpdate['last_update'] = $today;
    
                    $UpdateQuery = $dbConn->update('userprofile', 'empno', $id, $adminUserUpdate);
                    if($UpdateQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Information has been updated successfully.";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
