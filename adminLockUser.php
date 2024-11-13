<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnAdminLockEmpno'])) {
  $empno = $_POST['btnAdminLockEmpno'];
  $adminUserLock['account_status'] = 4;
  $adminUserLock['lock_by'] = $_SESSION['userID'];
  $adminUserLock['datetime_lock'] = $today;
  $sqlLock = $dbConn->update('userprofile', 'empno', $empno, $adminUserLock);
  if($sqlLock){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Account Locked!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}