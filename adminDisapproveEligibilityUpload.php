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
                    $id = $_POST['VerifyEligibilityid'];
                    $adminDisapproveEligibilityUpload['eligibility_status'] =2;
                    $adminDisapproveEligibilityUpload['eligibility_remarks'] =strtoupper(sanitize($_POST['VerifyEligibilityRemarks']));
                    $adminDisapproveEligibilityUpload['updated_by'] = $_SESSION['userID'];
                    $adminDisapproveEligibilityUpload['datetime_updated']= $today;
                    $sqlDisapproveEligibilityUpload = $dbConn->update('lib_eligibility','id',$id,$adminDisapproveEligibilityUpload);
                    
                    if($sqlDisapproveEligibilityUpload){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Upload Disapproved";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
