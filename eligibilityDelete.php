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
    
                    $id = $_POST['DeleteID'];
                    $eligibilityDelete['eligibility_status'] =4;
                    $DeleteEligibilityQuery = $dbConn->update('lib_eligibility','id',$id, $eligibilityDelete);
                    if($DeleteEligibilityQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Eligibility Details successfully deleted";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
