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
                    $fileExt = pathinfo($_FILES['trainingUploadMOV']['name'], PATHINFO_EXTENSION);
                    $UploadFile = $id.'_Training_'.$_POST['encodedTrainingCount'].'.'.$fileExt;
                    $target_file = $target_dir.$UploadFile;
                    $uploadOk = 1;
                    $training['empno'] = $id;
                    $training['training_title'] =sanitize(strtoupper($_POST['trainingTitle']));
                    $training['training_date_from'] = $_POST['trainingDateFrom'];
                    $training['training_date_to'] = $_POST['trainingDateTo'];
                    $training['training_hours'] = sanitize(strtoupper($_POST['trainingHours']));
                    $training['training_type'] = $_POST['trainingType'];
                    $training['training_conducted_by'] = sanitize(strtoupper($_POST['trainingConductedBy']));
                    $training['training_status'] = 0;
                    $training['training_uploaded_mov'] = $UploadFile;

                    if (move_uploaded_file($_FILES["trainingUploadMOV"]["tmp_name"], $target_file))
                    {
                        $AddTrainingQuery = $dbConn->insert('lib_training',$training);
                        // echo $adminUpdateQuery;
    
                        if($AddTrainingQuery){
                            $dataReturn['status'] = "success";
                            $dataReturn['msg'] = "Training Details successfully added";
                            echo json_encode($dataReturn);
                        }else {
                            $dataReturn['status'] = "failed";
                            $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                            echo json_encode($dataReturn);
                        }
                    }
                   
}
