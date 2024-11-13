<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnResetPassword'])) {
  $empno = $_POST['btnResetPassword'];
  $resetPassword['password'] = md5("P@ssw0rd");

  $sqlResetPassword = $dbConn->update('userprofile', 'empno', $empno, $resetPassword);
  if($sqlResetPassword){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "The password has been reset to the default!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}