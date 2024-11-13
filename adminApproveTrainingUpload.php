<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnApproveTrainingUpload'])) {
  $TrainingUploadID = $_POST['btnApproveTrainingUpload'];
  $adminTrainingUploadApprove['training_status'] = 1;
  $adminTrainingUploadApprove['updated_by'] = $_SESSION['userID'];
  $adminTrainingUploadApprove['datetime_updated'] = $today;
  $sqlApproveTrainingUpload = $dbConn->update('lib_training', 'id', $TrainingUploadID, $adminTrainingUploadApprove);
  if($sqlApproveTrainingUpload){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Upload Approved!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}