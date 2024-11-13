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
                    $id = $_POST['VerifycareerID'];
                    $adminDisapproveCareerUpload['career_status'] =2;
                    $adminDisapproveCareerUpload['career_remarks'] =strtoupper(sanitize($_POST['VerifyCareerRemarks']));
                    $adminDisapproveCareerUpload['updated_by'] = $_SESSION['userID'];
                    $adminDisapproveCareerUpload['datetime_updated']= $today;
                    $sqlDisapproveCareerUpload = $dbConn->update('lib_career','id',$id,$adminDisapproveCareerUpload);
                    
                    if($sqlDisapproveCareerUpload){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Upload Disapproved";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
