<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Session has expired. Please relogin your account.";
    echo json_encode($dataReturn);
}else{  
                    $id = $_POST['VerifyTrainingID'];
                    $adminDisapproveTrainingUpload['training_status'] =2;
                    $adminDisapproveTrainingUpload['training_remarks'] =strtoupper(sanitize($_POST['VerifyTrainingRemarks']));
                    $adminDisapproveTrainingUpload['updated_by'] = $_SESSION['userID'];
                    $adminDisapproveTrainingUpload['datetime_updated']= $today;
                    $sqlDisapproveTrainingUpload = $dbConn->update('lib_training','id',$id,$adminDisapproveTrainingUpload);
                    
                    if($sqlDisapproveTrainingUpload){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Upload Disapproved";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
