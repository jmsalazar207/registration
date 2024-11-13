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
                    if(empty($_FILES['UpdateTrainingMOV']['tmp_name'])){
                        $id = $_POST['TrainingID'];;
                        $trainingUpdate['training_title'] =sanitize(strtoupper($_POST['updatetrainingTitle']));
                        $trainingUpdate['training_date_from'] = $_POST['updatetrainingDateFrom'];
                        $trainingUpdate['training_date_to'] = $_POST['updatetrainingDateTo'];
                        $trainingUpdate['training_hours'] = sanitize(strtoupper($_POST['updatetrainingHours']));
                        $trainingUpdate['training_type'] = $_POST['updatetrainingType'];
                        $trainingUpdate['training_conducted_by'] = sanitize(strtoupper($_POST['updatetrainingConductedBy']));
                        
                        $UpdateTrainingQuery = $dbConn->update('lib_training','id',$id,$trainingUpdate);
                        // echo $adminUpdateQuery;
    
                        if($UpdateTrainingQuery){
                            $dataReturn['status'] = "success";
                            $dataReturn['msg'] = "Training Details successfully updated";
                            echo json_encode($dataReturn);
                        }else {
                            $dataReturn['status'] = "failed";
                            $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                            echo json_encode($dataReturn);
                        }
                    }else{
                        $currentFileName  = $_POST['currentTrainingFileName'];
                        $FileName = explode(".",$currentFileName,2);
                        $newFileName = $FileName[0];
                        $empid = $_SESSION['userID'];  
                        $target_dir = "uploadedMOV/";
                        $fileExt = pathinfo($_FILES['UpdateTrainingMOV']['name'], PATHINFO_EXTENSION);
                        $UploadFile = $newFileName.'.'.$fileExt;
                        $target_file = $target_dir.$UploadFile;
                        $uploadOk = 1;
                        unlink("uploadedMOV/".$currentFileName); 

                        $id = $_POST['TrainingID'];;
                        $trainingUpdate['training_title'] =sanitize(strtoupper($_POST['updatetrainingTitle']));
                        $trainingUpdate['training_date_from'] = $_POST['updatetrainingDateFrom'];
                        $trainingUpdate['training_date_to'] = $_POST['updatetrainingDateTo'];
                        $trainingUpdate['training_hours'] = sanitize(strtoupper($_POST['updatetrainingHours']));
                        $trainingUpdate['training_type'] = $_POST['updatetrainingType'];
                        $trainingUpdate['training_conducted_by'] = sanitize(strtoupper($_POST['updatetrainingConductedBy']));
                        $trainingUpdate['training_status'] = 0;
                        $trainingUpdate['training_remarks'] = '';
                        $trainingUpdate['training_uploaded_mov'] = $UploadFile;
                        $trainingUpdate['updated_by'] = $empid;
                        $trainingUpdate['datetime_updated'] = $today;

                        if (move_uploaded_file($_FILES["UpdateTrainingMOV"]["tmp_name"], $target_file))
                        {
                            $UpdateTrainingQuery = $dbConn->update('lib_training','id',$id,$trainingUpdate);
                            if($UpdateTrainingQuery){
                                $dataReturn['status'] = "success";
                                $dataReturn['msg'] = "Training Details successfully updated";
                                echo json_encode($dataReturn);
                            }else {
                                $dataReturn['status'] = "failed";
                                $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                                echo json_encode($dataReturn);
                            }
                        }
                    }
                    
}
