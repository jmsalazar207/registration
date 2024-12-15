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
                    if(empty($_FILES['UpdatecareerMOV']['tmp_name'])){
                        $sessionID = $_SESSION['userID'];
                        $id = $_POST['careerID'];
                        $Updatecareer['career_date_from'] = sanitize($_POST['UpdatecareerDateFrom']);
                        $Updatecareer['career_date_to'] = sanitize($_POST['UpdatecareerDateTo']);
                        $Updatecareer['career_position_title'] = sanitize(strtoupper($_POST['UpdatecareerPosition']));
                        $Updatecareer['career_organization'] = sanitize(strtoupper($_POST['UpdatecareerOrganization']));
                        $Updatecareer['career_salary'] = sanitize(strtoupper($_POST['UpdatecareerSalary']));
                        $Updatecareer['career_compensention_level'] = sanitize(strtoupper($_POST['UpdatecareerCompensention']));
                        $Updatecareer['career_status_appointment'] = sanitize(strtoupper($_POST['UpdatecareerStatusAppointment']));
                        $Updatecareer['career_govt_service'] = $_POST['UpdatecareerGovtService'];
                        $Updatecareer['career_present'] = isset($_POST['UpdatecareerPresent']) ? $_POST['UpdatecareerPresent']:'';
                        $Updatecareer['career_status'] = 0;
                        $Updatecareer['updated_by'] = $sessionID;
                        $Updatecareer['datetime_updated'] = $today;
                        
                        $UpdateCareerQuery = $dbConn->update('lib_career','id',$id,$Updatecareer);
    
                        if($UpdateCareerQuery){
                            $dataReturn['status'] = "success";
                            $dataReturn['msg'] = "Information successfully updated";
                            echo json_encode($dataReturn);
                        }else {
                            $dataReturn['status'] = "failed";
                            $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                            echo json_encode($dataReturn);
                        }
                    }else{
                        $sessionID = $_SESSION['userID'];
                        $currentFileName  = $_POST['currentCareerFileName'];
                        $FileName = explode(".",$currentFileName,2);
                        $newFileName = $FileName[0];
                        $empid = $_SESSION['userID'];  
                        $target_dir = "uploadedMOV/";
                        $fileExt = pathinfo($_FILES['UpdatecareerMOV']['name'], PATHINFO_EXTENSION);
                        $UploadFile = $newFileName.'.'.$fileExt;
                        $target_file = $target_dir.$UploadFile;
                        $uploadOk = 1;
                        unlink("uploadedMOV/".$currentFileName);

                        $id = $_POST['careerID'];
                        $Updatecareer['career_date_from'] = sanitize($_POST['UpdatecareerDateFrom']);
                        $Updatecareer['career_date_to'] = sanitize($_POST['UpdatecareerDateTo']);
                        $Updatecareer['career_position_title'] = sanitize(strtoupper($_POST['UpdatecareerPosition']));
                        $Updatecareer['career_organization'] = sanitize(strtoupper($_POST['UpdatecareerOrganization']));
                        $Updatecareer['career_salary'] = sanitize(strtoupper($_POST['UpdatecareerSalary']));
                        $Updatecareer['career_compensention_level'] = sanitize(strtoupper($_POST['UpdatecareerCompensention']));
                        $Updatecareer['career_status_appointment'] = sanitize(strtoupper($_POST['UpdatecareerStatusAppointment']));
                        $Updatecareer['career_govt_service'] = $_POST['UpdatecareerGovtService'];
                        $Updatecareer['career_status'] = 0;
                        $Updatecareer['career_remarks'] = '';
                        $Updatecareer['career_uploaded_mov'] = $UploadFile;
                        $Updatecareer['updated_by'] = $sessionID;
                        $Updatecareer['datetime_updated'] = $today;
                        
                        if (move_uploaded_file($_FILES["UpdatecareerMOV"]["tmp_name"], $target_file))
                        {
                            $UpdateCareerQuery = $dbConn->update('lib_career','id',$id,$Updatecareer);
                            if($UpdateCareerQuery){
                                $dataReturn['status'] = "success";
                                $dataReturn['msg'] = "Information successfully updated";
                                echo json_encode($dataReturn);
                            }else {
                                $dataReturn['status'] = "failed";
                                $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                                echo json_encode($dataReturn);
                            }
                        }else{
                            $dataReturn['status'] = "failed";
                            $dataReturn['msg'] = "Oops! Something went wrong. Re-uploading failed..";
                        }
                    }
                    
}
