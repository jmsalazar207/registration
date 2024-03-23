<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnDisapproveEmpno'])) {
  $empno = $_POST['btnDisapproveEmpno'];
  $adminUserDisapprove['account_status'] = 3;
  $adminUserDisapprove['deny_by'] = $_SESSION['userID'];
  $adminUserDisapprove['datetime_deny'] = $today;
  $sqlDisapprove = $dbConn->update('userprofile', 'empno', $empno, $adminUserDisapprove);
  if($sqlDisapprove){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Account Disapproved!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}