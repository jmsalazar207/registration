<?php
session_start();
require_once('includes/init.php');
$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['btnApproveEducUpload'])) {
  $EducUploadID = $_POST['btnApproveEducUpload'];
  $adminEducUploadApprove['acad_status'] = 1;
  $adminEducUploadApprove['updated_by'] = $_SESSION['userID'];
  $adminEducUploadApprove['datetime_updated'] = $today;
  $sqlApproveEducUpload = $dbConn->update('lib_academic', 'id', $EducUploadID, $adminEducUploadApprove);
  if($sqlApproveEducUpload){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Upload Approved!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}