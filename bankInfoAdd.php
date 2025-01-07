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
    $empno = $_SESSION['userID']; 
    $target_dir = "uploadedBankMOV/";
    $fileExt = pathinfo($_FILES['addBankAccountMOV']['name'], PATHINFO_EXTENSION);
    $UploadFile = $empno.'.'.$fileExt;
    $target_file = $target_dir.$UploadFile;
    $uploadOk = 1;
    $bank_info['bank_account_number']= $_POST['addBankAccount'];
    $bank_info['bank_account_mov']= $UploadFile;
    $bank_info['bank_account_status']= 0;
    $bank_info['empno'] = $empno;
    unset($bank_info['token']);
    unset($bank_info['btnSaveAccountNumber']);

    $param['conditions'] = array('empno' => $empno);
    $output = $dbConn->findFirst('lib_bank_details', $param);
    
    $message = "";
    if (move_uploaded_file($_FILES["addBankAccountMOV"]["tmp_name"], $target_file)){
        if($dbConn->count() > 0 && isset($output['bank_account_status']) && $output['bank_account_status'] > 0){ //Verified
            $dataReturn['status'] = "failed";
            $dataReturn['msg'] = "Oops! Bank details already verified.";
        }else if($dbConn->count() > 0){
            $message = "updated";
            $bank_info_insert = $dbConn->update('lib_bank_details','empno',$empno,$bank_info);
        }else{
            $message = "added";
            $bank_info_insert = $dbConn->insert('lib_bank_details',$bank_info);
        }
        if($bank_info_insert){
            $dataReturn['status'] = "success";
            $dataReturn['msg'] = "Bank Information successfully {$message}.";
            echo json_encode($dataReturn);
        }else {
            $dataReturn['status'] = "failed";
            $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
            echo json_encode($dataReturn);
        }
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Uploading failed..";
    }

}
