<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (isset($_POST['DeleteID'])) {
    $id = $_POST['DeleteID'];
    $trainingDelete['training_status'] =4;
    $DeleteTrainingQuery = $dbConn->update('lib_training','id',$id, $trainingDelete);
    if($DeleteTrainingQuery){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Training Details successfully deleted";
        echo json_encode($dataReturn);
    }else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}




