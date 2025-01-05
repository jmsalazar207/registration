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
                    $SG = $_POST['addPositionSalaryGrade'];
                    if($SG<11){
                        $SG = 1;
                    }else if($SG>10 && $SG<25){
                        $SG = 2;
                    }else{
                        $SG = 3;
                    }
                    $positionAdd['position_name_id'] = sanitize(strtoupper($_POST['addPositionName']));
                    $positionAdd['item_code'] =sanitize(strtoupper($_POST['addPositionItemCode']));
                    $positionAdd['salary_history_id'] = $_POST['addPositionSalaryGrade'];
                    $positionAdd['unit_code'] = $_POST['addPositionUnit'];
                    $positionAdd['area_assignment'] = $_POST['addPositionAreaAssignment'];
                    $positionAdd['position_status'] = 0;
                    $positionAdd['position_classification_id'] = $_POST['addPositionClassification'];
                    $positionAdd['date_creation_position'] = $_POST['addPositionDateCreated'];
                    $positionAdd['fund_source_code'] = $_POST['addPositionFundSource'];
                    $positionAdd['position_level'] = $SG;
                    $positionAdd['added_by'] = $id;
                    $positionAdd['item_code_format'] = $_POST['addPositionItemCodeFormat'];
                    
                    $AddPositionQuery = $dbConn->insert('lib_position',$positionAdd);
                    if($AddPositionQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Position details successfully added";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
