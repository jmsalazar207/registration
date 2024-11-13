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
    
                    $id = $_POST['NonAcademicID'];
                    $NonAcademicUpdate['non_academic_title'] =sanitize(strtoupper($_POST['updateNonAcademicTitle']));
                    $NonAcademicUpdate['updated_by'] = $_SESSION['userID']; 
                    $NonAcademicUpdate['datetime_updated'] = $today;
                    
                    $UpdateNonAcademicQuery = $dbConn->update('lib_non_academic','id',$id, $NonAcademicUpdate);
                    if($UpdateNonAcademicQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Non Academic Details successfully updated";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
