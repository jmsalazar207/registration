<?php
session_start();
require_once('includes/init.php');
$dataReturn = [];
if (isset($_POST['btnAdminTagInactiveEmpno'])) {
  $empno = $_POST['btnAdminTagInactiveEmpno'];
  $adminUserInactive['emp_status'] = 1;
  $adminUserInactive['updated_by'] = $_SESSION['userID'];
  
  
  $sqlInactive = $dbConn->update('userprofile', 'empno', $empno, $adminUserInactive);
  if($sqlInactive){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Account Inactive!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}