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
                    $id = $_POST['VerifyacadsId'];
                    $adminDisapproveEducUpload['acad_status'] =2;
                    $adminDisapproveEducUpload['acad_remarks'] =strtoupper(sanitize($_POST['VerifyacadRemarks']));
                    $adminDisapproveEducUpload['updated_by'] = $_SESSION['userID'];
                    $adminDisapproveEducUpload['datetime_updated']= $today;
                    $sqlDisapproveEducUpload = $dbConn->update('lib_academic','id',$id,$adminDisapproveEducUpload);
                    
                    if($sqlDisapproveEducUpload){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Upload Disapproved";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
