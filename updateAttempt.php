<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['attemptEmpNO'])) {  //Tries
  $empno = $_POST['attemptEmpNO'];
  $attempCount['password_attempt'] = $_POST['attemptCount'];

  $sqlUpdateAttempt = $dbConn->update('userprofile', 'empno', $empno, $attempCount);

  if($sqlUpdateAttempt){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Oops! It seems there's an issue with your login credentials. Please try again.!"; //success update then notif for error password
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}else if(isset($_POST['LockEmpNo'])){ //3 attempt
  $empno = $_POST['LockEmpNo'];
  $lockAccount['account_status'] = 4;

  $sqlLockAccount = $dbConn->update('userprofile', 'empno', $empno, $lockAccount);

  if($sqlLockAccount){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Oops! Your account has been locked due to multiple incorrect attempts!"; //success update then notif for error password
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}