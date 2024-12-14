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
    if(empty($_FILES['acadMOV']['tmp_name'])){ //Elementary and High School
        $id = $_SESSION['userID'];  
        $acads['empno'] = $id;
        $acads['ifGraduated'] = $_POST['ifGraduated'];
        $acads['acad_level'] =$_POST['acadEducLevel'];
        $acads['acad_school'] = sanitize(strtoupper($_POST['txtID']));
        $acads['acad_degree'] = sanitize(strtoupper($_POST['acadDegree']));
        $acads['acad_from'] = sanitize($_POST['acadPeriodFrom']);
        $acads['acad_to'] = sanitize($_POST['acadPeriodTo']);
        $acads['acad_highest_level'] = sanitize(strtoupper($_POST['acadHighestLevel']));
        $acads['acad_year_graduated'] = sanitize($_POST['acadYearGraduated']);
        $acads['acad_honors'] = sanitize(strtoupper($_POST['acadHonors']));
        $acads['acad_uploaded_mov'] = '';
        $acads['acad_status'] = 5; // not required to be verified
        $AddAcadQuery = $dbConn->insert('lib_academic',$acads);
            if($AddAcadQuery){
                $dataReturn['status'] = "success";
                $dataReturn['msg'] = "Academic Details successfully added";
                echo json_encode($dataReturn);
            }else{
                $dataReturn['status'] = "failed";
                $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                echo json_encode($dataReturn);
            }
    }else{  //College and other
        $id = $_SESSION['userID'];  
        $target_dir = "uploadedMOV/";
        $fileExt = pathinfo($_FILES['acadMOV']['name'], PATHINFO_EXTENSION);
        $UploadFile = $id.'_Acad_'.$_POST['encodedCount'].'.'.$fileExt;
        $target_file = $target_dir.$UploadFile;
        $uploadOk = 1;
        $acads['empno'] = $id;
        $acads['ifGraduated'] = $_POST['ifGraduated'];
        $acads['acad_level'] =$_POST['acadEducLevel'];
        $acads['acad_school'] = sanitize(strtoupper($_POST['acadNameSchool']));
        $acads['acad_degree'] = sanitize(strtoupper($_POST['acadDegree']));
        $acads['acad_from'] = sanitize($_POST['acadPeriodFrom']);
        $acads['acad_to'] = sanitize($_POST['acadPeriodTo']);
        $acads['acad_highest_level'] = sanitize(strtoupper($_POST['acadHighestLevel']));
        $acads['acad_year_graduated'] = sanitize($_POST['acadYearGraduated']);
        $acads['acad_honors'] = sanitize(strtoupper($_POST['acadHonors']));
        $acads['acad_uploaded_mov'] = $UploadFile;
        $acads['acad_status'] = 0;
        if (move_uploaded_file($_FILES["acadMOV"]["tmp_name"], $target_file))
        {
            $AddAcadQuery = $dbConn->insert('lib_academic',$acads);
            if($AddAcadQuery){
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
}
