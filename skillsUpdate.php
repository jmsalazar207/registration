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
    
                    $id = $_POST['SkillsID'];
                    $skillsUpdate['skills_title'] =sanitize(strtoupper($_POST['updateskillsTitle']));
                    $skillsUpdate['updated_by'] = $_SESSION['userID']; 
                    $skillsUpdate['datetime_updated'] = $today;

                    $UpdateSkillsQuery = $dbConn->update('lib_skills','id',$id, $skillsUpdate);

                    if($UpdateSkillsQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Special Skills Details successfully updated";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
