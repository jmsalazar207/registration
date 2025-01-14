<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];

// Validate session tokens
if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Session has expired. Please relogin your account.";
    echo json_encode($dataReturn);
    exit; // Exit script to prevent further execution
}

// Sanitize input data
$EmployeeNumber = $_POST['UpdateEmpNo'] ?? null;
$CurrentItemCode = $_POST['UpdateItemCode'] ?? null;
$CurrentPositionID = $_POST['UpdatePosID'] ?? null;
$CurrentDateFilled = $_POST['UpdateDateFilled'] ?? null;
$DateUnfilled = $_POST['UpdateDateUnfilled'] ?? null;
$ReasonEndAppointment = $_POST['UpdateReasonVacancy'] ?? null;
$NewItemCode = $_POST['UpdateNewItemCode'] ?? null;
$NewDateFilled = $_POST['UpdateNewDatefilled'] ?? null;

// Insert into employee appointment history if CurrentItemCode exists
if (!empty($CurrentItemCode)) {
    $insertHistory = [
        'empno' => $EmployeeNumber,
        'item_code' => $CurrentItemCode,
        'start_of_appointment' => $CurrentDateFilled,
        'end_of_appointment' => $DateUnfilled,
        'reason_for_end_of_appointment' => $ReasonEndAppointment
    ];
    $insertTblHistory = $dbConn->insert('tbl_employee_appointment_history', $insertHistory);
}

// Update based on reason for end of appointment
if (in_array($ReasonEndAppointment, [11, 20])) {
    // Promoted or change item code
    $updateUserprofileItemCode = [
        'position_id' => $NewItemCode,
        'date_filled' => $NewDateFilled
    ];
    $updateUserprofile = $dbConn->update('userprofile', 'empno', $EmployeeNumber, $updateUserprofileItemCode);

    $updateNewPositionItemCode = ['position_status' => '1'];
    $updateNewLibPosition = $dbConn->update('lib_position', 'position_id', $NewItemCode, $updateNewPositionItemCode);

    $updateCurrentPositionItemCode = ['position_status' => '0'];
    $updateCurrentLibPosition = $dbConn->update('lib_position', 'position_id', $CurrentPositionID, $updateCurrentPositionItemCode);
} else {
    // Set employee to inactive
    $updateUserprofileItemCode = ['emp_status' => $ReasonEndAppointment];
    $updateUserprofile = $dbConn->update('userprofile', 'empno', $EmployeeNumber, $updateUserprofileItemCode);

    $updateCurrentPositionItemCode = ['position_status' => '0'];
    $updateCurrentLibPosition = $dbConn->update('lib_position', 'position_id', $CurrentPositionID, $updateCurrentPositionItemCode);
}

// Validate the updates
if ($updateUserprofile && (!empty($updateNewLibPosition) || $ReasonEndAppointment != 11 && $ReasonEndAppointment != 20) && $updateCurrentLibPosition) {
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "Item Code Successfully Updated";
} else {
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
}
echo json_encode($dataReturn);
