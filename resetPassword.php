<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnResetPassword'])) {
  $empno = $_POST['btnResetPassword'];
  $resetPassword['password'] = password_hash("P@ssw0rd", PASSWORD_DEFAULT);
  $resetPassword['password_md5'] = '';
  $resetPassword['isLog'] = 0;

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