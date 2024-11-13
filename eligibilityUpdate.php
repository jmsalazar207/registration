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
                    if(empty($_FILES['UpdateEligibilityMOV']['tmp_name'])){
                        $sessionID = $_SESSION['userID'];
                        $id = $_POST['Eligibilityid'];
                        //$Updateeligibilty['eligibility_credentials'] =sanitize(strtoupper($_POST['UpdateeligibilityCredentials']));
                        $Updateeligibilty['eligibility_rating'] = sanitize(strtoupper($_POST['UpdateeligibilityRating']));
                        $Updateeligibilty['eligibility_exam_date'] = $_POST['UpdateeligibilityExamDate'];
                        $Updateeligibilty['eligibility_exam_place'] = sanitize(strtoupper($_POST['UpdateeligibilityPlaceExamination']));
                        $Updateeligibilty['eligibility_license'] = sanitize($_POST['UpdateeligibilityNumber']);
                        $Updateeligibilty['eligibility_validity_date'] = $_POST['UpdateeligibilityValidityDate'];
                        $Updateeligibilty['updated_by'] = $sessionID;
                        $Updateeligibilty['datetime_updated'] = $today;
                        
                        $UpdateEligibiltyQuery = $dbConn->update('lib_eligibility','id',$id,$Updateeligibilty);
                        // echo $adminUpdateQuery;

                        if($UpdateEligibiltyQuery){
                            $dataReturn['status'] = "success";
                            $dataReturn['msg'] = "Eligibility Details successfully updated";
                            echo json_encode($dataReturn);
                        }else {
                            $dataReturn['status'] = "failed";
                            $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                            echo json_encode($dataReturn);
                        }
                    }else{
                        $sessionID = $_SESSION['userID'];
                        $currentFileName  = $_POST['currentEligibilityFileName'];
                        $FileName = explode(".",$currentFileName,2);
                        $newFileName = $FileName[0];
                        $empid = $_SESSION['userID'];  
                        $target_dir = "uploadedMOV/";
                        $fileExt = pathinfo($_FILES['UpdateEligibilityMOV']['name'], PATHINFO_EXTENSION);
                        $UploadFile = $newFileName.'.'.$fileExt;
                        $target_file = $target_dir.$UploadFile;
                        $uploadOk = 1;
                        unlink("uploadedMOV/".$currentFileName);    

                        $id = $_POST['Eligibilityid'];
                        //$Updateeligibilty['eligibility_credentials'] =sanitize(strtoupper($_POST['UpdateeligibilityCredentials']));
                        $Updateeligibilty['eligibility_rating'] = sanitize(strtoupper($_POST['UpdateeligibilityRating']));
                        $Updateeligibilty['eligibility_exam_date'] = $_POST['UpdateeligibilityExamDate'];
                        $Updateeligibilty['eligibility_exam_place'] = sanitize(strtoupper($_POST['UpdateeligibilityPlaceExamination']));
                        $Updateeligibilty['eligibility_license'] = sanitize($_POST['UpdateeligibilityNumber']);
                        $Updateeligibilty['eligibility_validity_date'] = $_POST['UpdateeligibilityValidityDate'];
                        $Updateeligibilty['eligibility_status'] = 0;
                        $Updateeligibilty['eligibility_remarks'] = '';
                        $Updateeligibilty['eligibility_uploaded_mov'] = $UploadFile;
                        $Updateeligibilty['updated_by'] = $sessionID;
                        $Updateeligibilty['datetime_updated'] = $today;

                        if (move_uploaded_file($_FILES["UpdateEligibilityMOV"]["tmp_name"], $target_file))
                        {
                            $UpdateEligibiltyQuery = $dbConn->update('lib_eligibility','id',$id,$Updateeligibilty);
                            if($UpdateEligibiltyQuery){
                                $dataReturn['status'] = "success";
                                $dataReturn['msg'] = "Eligibility Details successfully updated";
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
