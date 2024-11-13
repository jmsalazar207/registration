<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnApproveCareerUpload'])) {
  $CareerUploadID = $_POST['btnApproveCareerUpload'];
  $adminCareerUploadApprove['career_status'] = 1;
  $adminCareerUploadApprove['updated_by'] = $_SESSION['userID'];
  $adminCareerUploadApprove['datetime_updated'] = $today;
  $sqlApproveCareerUpload = $dbConn->update('lib_career', 'id', $CareerUploadID, $adminCareerUploadApprove);
  if($sqlApproveCareerUpload){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Upload Approved!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}