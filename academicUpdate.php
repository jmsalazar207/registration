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
    $EducLevelValue = $_POST['UpdateacadEducLevelValue'];
    if(($EducLevelValue ==1)||($EducLevelValue ==2)){
        $id = $_POST['acadsId'];
        $sessionID = $_SESSION['userID'];
        $acadsUpdate['acad_school'] = sanitize(strtoupper($_POST['txtUpdateID']));
        $acadsUpdate['acad_degree'] = sanitize(strtoupper($_POST['UpdateacadDegree']));
        $acadsUpdate['acad_from'] = sanitize($_POST['UpdateacadPeriodFrom']);
        $acadsUpdate['acad_to'] = sanitize($_POST['UpdateacadPeriodTo']);
        $acadsUpdate['acad_highest_level'] = sanitize(strtoupper($_POST['UpdateacadHighestLevel']));
        $acadsUpdate['acad_year_graduated'] = sanitize($_POST['UpdateacadYearGraduated']);
        $acadsUpdate['acad_honors'] = sanitize(strtoupper($_POST['UpdateacadHonors']));
        $acadsUpdate['acad_status'] = 5;
        $acadsUpdate['acad_remarks'] = '';
        $acadsUpdate['updated_by'] = $sessionID;
        $acadsUpdate['datetime_updated'] = $today;
        $UpdateAcadQuery = $dbConn->update('lib_academic', 'id', $id, $acadsUpdate);
        if($UpdateAcadQuery){
            $dataReturn['status'] = "success";
            $dataReturn['msg'] = "Academic Details successfully updated";
            echo json_encode($dataReturn);
        }else {
            $dataReturn['status'] = "failed";
            $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
            echo json_encode($dataReturn);
        }
    }else{
        if(empty($_FILES['UpdateacadMOV']['tmp_name'])){
            $id = $_POST['acadsId'];
            $sessionID = $_SESSION['userID'];
            $acadsUpdate['acad_school'] = sanitize(strtoupper($_POST['UpdateacadNameSchool']));
            $acadsUpdate['acad_degree'] = sanitize(strtoupper($_POST['UpdateacadDegree']));
            $acadsUpdate['acad_from'] = sanitize($_POST['UpdateacadPeriodFrom']);
            $acadsUpdate['acad_to'] = sanitize($_POST['UpdateacadPeriodTo']);
            $acadsUpdate['acad_highest_level'] = sanitize(strtoupper($_POST['UpdateacadHighestLevel']));
            $acadsUpdate['acad_year_graduated'] = sanitize($_POST['UpdateacadYearGraduated']);
            $acadsUpdate['acad_honors'] = sanitize(strtoupper($_POST['UpdateacadHonors']));
            $acadsUpdate['acad_status'] = 0;
            $acadsUpdate['acad_remarks'] = '';
            $acadsUpdate['updated_by'] = $sessionID;
            $acadsUpdate['datetime_updated'] = $today;
            $UpdateAcadQuery = $dbConn->update('lib_academic', 'id', $id, $acadsUpdate);
                
            if($UpdateAcadQuery){
                $dataReturn['status'] = "success";
                $dataReturn['msg'] = "Academic Details successfully updated";
                echo json_encode($dataReturn);
            }else {
                $dataReturn['status'] = "failed";
                $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                echo json_encode($dataReturn);
            }
        }else{
            $sessionID = $_SESSION['userID'];
            $currentFileName  = $_POST['currentAcadsFileName'];
            $FileName = explode(".",$currentFileName,2);
            $newFileName = $FileName[0];
            $empid = $_SESSION['userID'];  
            $target_dir = "uploadedMOV/";
            $fileExt = pathinfo($_FILES['UpdateacadMOV']['name'], PATHINFO_EXTENSION);
            $UploadFile = $newFileName.'.'.$fileExt;
            $target_file = $target_dir.$UploadFile;
            $uploadOk = 1;
            unlink("uploadedMOV/".$currentFileName);
            $id = $_POST['acadsId'];
            $acadsUpdate['acad_school'] = sanitize(strtoupper($_POST['UpdateacadNameSchool']));
            $acadsUpdate['acad_degree'] = sanitize(strtoupper($_POST['UpdateacadDegree']));
            $acadsUpdate['acad_from'] = sanitize($_POST['UpdateacadPeriodFrom']);
            $acadsUpdate['acad_to'] = sanitize($_POST['UpdateacadPeriodTo']);
            $acadsUpdate['acad_highest_level'] = sanitize(strtoupper($_POST['UpdateacadHighestLevel']));
            $acadsUpdate['acad_year_graduated'] = sanitize($_POST['UpdateacadYearGraduated']);
            $acadsUpdate['acad_honors'] = sanitize(strtoupper($_POST['UpdateacadHonors']));
            $acadsUpdate['acad_status'] = 0;
            $acadsUpdate['acad_remarks'] = '';
            $acadsUpdate['acad_uploaded_mov'] = $UploadFile;
            $acadsUpdate['updated_by'] = $sessionID;
            $acadsUpdate['datetime_updated'] = $today;
            
            if (move_uploaded_file($_FILES["UpdateacadMOV"]["tmp_name"], $target_file))
            {
            $UpdateAcadQuery = $dbConn->update('lib_academic', 'id', $id, $acadsUpdate);
                
            if($UpdateAcadQuery){
                $dataReturn['status'] = "success";
                $dataReturn['msg'] = "Academic Details successfully updated";
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
}
