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
                    $positionHistoryAdd['item_code'] = $_POST['addHistoryItemCode'];
                    $positionHistoryAdd['empno'] = $_POST['addHistoryEmployee'];
                    $positionHistoryAdd['start_of_appointment'] = $_POST['addHistoryDateStart'];
                    $positionHistoryAdd['end_of_appointment'] = $_POST['addHistoryDateEnd'];
                    $positionHistoryAdd['reason_for_end_of_appointment'] = $_POST['addHistorySeperation'];

                    $AddPositionHistoryQuery = $dbConn->insert('tbl_employee_appointment_history',$positionHistoryAdd);
                    if($AddPositionHistoryQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Position History successfully added";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
