<?php
session_start();
require_once('includes/init.php');
$dataReturn = [];
if (isset($_POST['btnAdminReengage'])) {
  $empno = $_POST['btnAdminReengage'];
  $adminUserReEngage['emp_status'] = 0;
  $adminUserReEngage['account_status'] = 2;
  $adminUserReEngage['position_id'] = '';
  $adminUserReEngage['date_filled'] = '';
  $adminUserReEngage['updated_by'] = $_SESSION['userID'];
  
  
  $sqlReEngage = $dbConn->update('userprofile', 'empno', $empno, $adminUserReEngage);
  if($sqlReEngage){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Action Done!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}