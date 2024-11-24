<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['DeleteID'])) {
  $id = $_POST['DeleteID'];
  $DeleteQuery = $dbConn->delete('userprofile','empno',$id,);
  if($DeleteQuery){
      $dataReturn['status'] = "success";
      $dataReturn['msg'] = "User Details successfully deleted";
      echo json_encode($dataReturn);
  }else {
      $dataReturn['status'] = "failed";
      $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
      echo json_encode($dataReturn);
  }
}
