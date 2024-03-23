<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnApproveEmpno'])) {
  $empno = $_POST['btnApproveEmpno'];
  $adminUserApprove['account_status'] = 2;
  $adminUserApprove['approved_by'] = $_SESSION['userID'];
  $adminUserApprove['date_approved'] = $today;
  $sqlApprove = $dbConn->update('userprofile', 'empno', $empno, $adminUserApprove);
  if($sqlApprove){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Account Approved!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}