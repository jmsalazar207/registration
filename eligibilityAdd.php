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
                    $target_dir = "uploadedMOV/";
                    $fileExt = pathinfo($_FILES['eligibilityMOV']['name'], PATHINFO_EXTENSION);
                    $UploadFile = $id.'_Eligibility_'.$_POST['encodedEligibilityCount'].'.'.$fileExt;
                    $target_file = $target_dir.$UploadFile;
                    $uploadOk = 1;
                    $eligibilty['empno'] = $id;
                    $eligibilty['eligibility_credentials'] =sanitize(strtoupper($_POST['eligibilityCredentials']));
                    $eligibilty['eligibility_rating'] = sanitize(strtoupper($_POST['eligibilityRating']));
                    $eligibilty['eligibility_exam_date'] = $_POST['eligibilityExamDate'];
                    $eligibilty['eligibility_exam_place'] = sanitize(strtoupper($_POST['eligibilityPlaceExamination']));
                    $eligibilty['eligibility_license'] = sanitize($_POST['eligibilityNumber']);
                    $eligibilty['eligibility_validity_date'] = $_POST['eligibilityValidityDate'];
                    $eligibilty['eligibility_status'] = 0;
                    $eligibilty['eligibility_uploaded_mov'] = $UploadFile;
                    
                    if (move_uploaded_file($_FILES["eligibilityMOV"]["tmp_name"], $target_file))
                    {
                        $AddEligibiltyQuery = $dbConn->insert('lib_eligibility',$eligibilty);
    
                        if($AddEligibiltyQuery){
                            $dataReturn['status'] = "success";
                            $dataReturn['msg'] = "Academic Details successfully added";
                            echo json_encode($dataReturn);
                        }else {
                            $dataReturn['status'] = "failed";
                            $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                            echo json_encode($dataReturn);
                        }
                    }else{
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Uploading failed..";
                    }
                   
}
