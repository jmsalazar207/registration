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
                    $fileExt = pathinfo($_FILES['careerMOV']['name'], PATHINFO_EXTENSION);
                    $UploadFile = $id.'_Career_'.$_POST['encodedCareerCount'].'.'.$fileExt;
                    $target_file = $target_dir.$UploadFile;
                    $uploadOk = 1;

                    $career['empno'] = $id;
                    $career['career_date_from'] = sanitize($_POST['careerDateFrom']);
                    $career['career_date_to'] = sanitize($_POST['careerDateTo']);
                    $career['career_position_title'] = sanitize(strtoupper($_POST['careerPosition']));
                    $career['career_organization'] = sanitize(strtoupper($_POST['careerOrganization']));
                    $career['career_salary'] = sanitize(strtoupper($_POST['careerSalary']));
                    $career['career_compensention_level'] = sanitize(strtoupper($_POST['careerCompensention']));
                    $career['career_status_appointment'] = sanitize(strtoupper($_POST['careerStatusAppointment']));
                    $career['career_govt_service'] = $_POST['careerGovt'];
                    $career['career_present'] = isset($_POST['careerPresent']) ? $_POST['careerPresent']:'';
                    $career['career_uploaded_mov'] = $UploadFile;
                    $career['career_status'] = 0;
                    if (move_uploaded_file($_FILES["careerMOV"]["tmp_name"], $target_file))
                    {
                        $AddCareerQuery = $dbConn->insert('lib_career',$career);
                        if($AddCareerQuery){
                            $dataReturn['status'] = "success";
                            $dataReturn['msg'] = "Information successfully added";
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
