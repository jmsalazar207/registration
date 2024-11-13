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
    $EmployeeNumber = $_POST['UpdateEmpNo'];
    $CurrentItemCode = $_POST['UpdateItemCode'];
    $CurrentPositionID = $_POST['UpdatePosID'];
    $CurrentDateFilled = $_POST['UpdateDateFilled'];
    $DateUnfilled = $_POST['UpdateDateUnfilled'];
    $ReasonEndAppointment = $_POST['UpdateReasonVacancy'];
    $NewItemCode = $_POST['UpdateNewItemCode']; //value is position_id
    $NewDateFilled = $_POST['UpdateNewDatefilled'];

    if($CurrentItemCode !=''){
        $insertHistory['empno'] = $EmployeeNumber;
        $insertHistory['item_code'] = $CurrentItemCode;
        $insertHistory['start_of_appointment'] = $CurrentDateFilled;
        $insertHistory['end_of_appointment'] = $DateUnfilled;
        $insertHistory['reason_for_end_of_appointment'] = $ReasonEndAppointment;
        $insertTblHistory = $dbConn->insert('tbl_employee_appointment_history',$insertHistory); // Insert history
    }
    $updateUserprofileItemCode['position_id'] = $NewItemCode; 
    $updateUserprofileItemCode['date_filled'] = $NewDateFilled;
    $updateUserprofile = $dbConn->update('userprofile','empno',$EmployeeNumber,$updateUserprofileItemCode); //set new item code and date filled to userprofile

    $updateNewPositionItemCode['position_status'] = '1'; 
    $updateNewLibPosition = $dbConn->update('lib_position','position_id',$NewItemCode,$updateNewPositionItemCode); //set new position to filled 

    $updateCurrentPositionItemCode['position_status'] = '2'; 
    $updateCurrentLibPosition = $dbConn->update('lib_position','position_id',$CurrentPositionID,$updateCurrentPositionItemCode); //set current position to unfilled

    if($updateUserprofile && $updateNewLibPosition && $updateCurrentLibPosition){
        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Item Code Successfully Updated";
        echo json_encode($dataReturn);
    } else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
