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
    
                    $id = $_SESSION['userID'];
                    $nonAcademicAdd['empno'] = $id;
                    $nonAcademicAdd['non_academic_title'] =sanitize(strtoupper($_POST['nonAcademicTitle']));
                    $AddNonAcademicQuery = $dbConn->insert('lib_non_academic',$nonAcademicAdd);

                    if($AddNonAcademicQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Special Skills Details successfully added";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
