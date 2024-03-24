<?php
session_start();
require_once('includes/init.php');
$dataReturn = [];
if (isset($_POST['btnAdminUnLockEmpno'])) {
  $empno = $_POST['btnAdminUnLockEmpno'];
  $adminUserUnLock['account_status'] = 2;
  $adminUserUnLock['lock_by'] = '';
  $adminUserUnLock['datetime_lock'] = '';
  
  $sqlUnLock = $dbConn->update('userprofile', 'empno', $empno, $adminUserUnLock);
  if($sqlUnLock){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Account UnLocked!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}