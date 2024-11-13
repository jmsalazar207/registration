<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnApproveEligibilityUpload'])) {
  $EligibilityUploadID = $_POST['btnApproveEligibilityUpload'];
  $adminEligibilityUploadApprove['eligibility_status'] = 1;
  $adminEligibilityUploadApprove['updated_by'] = $_SESSION['userID'];
  $adminEligibilityUploadApprove['datetime_updated'] = $today;
  $sqlApproveEligibilityUpload = $dbConn->update('lib_eligibility', 'id', $EligibilityUploadID, $adminEligibilityUploadApprove);

  if($sqlApproveEligibilityUpload){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Upload Approved!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}