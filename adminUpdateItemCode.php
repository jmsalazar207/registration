<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];

// Validate session tokens
if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
    $dataReturn = [
        'status' => "failed",
        'msg' => "Session has expired. Please relogin your account."
    ];
    echo json_encode($dataReturn);
    exit;
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

// If CurrentItemCode exists, insert into history table
if (!empty($CurrentItemCode)) {
    $insertHistory = [
        'empno' => $EmployeeNumber,
        'item_code' => $CurrentItemCode,
        'start_of_appointment' => $CurrentDateFilled,
        'end_of_appointment' => $DateUnfilled,
        'reason_for_end_of_appointment' => $ReasonEndAppointment
    ];
    $insertTblHistory = $dbConn->insert('tbl_employee_appointment_history', $insertHistory);

    if (!$insertTblHistory) {
        echo json_encode([
            'status' => "failed",
            'msg' => "Failed to record appointment history."
        ]);
        exit;
    }
}

// **If there is NO CurrentItemCode, update only the new item code and date_filled**
if (empty($CurrentItemCode)) {
    $updateNewUserProfile = [
        'position_id' => $NewItemCode,
        'date_filled' => $NewDateFilled
    ];
    $updateNewUserProfileStatus = $dbConn->update('userprofile', 'empno', $EmployeeNumber, $updateNewUserProfile);

    $updatePositionStatus = ['position_status' => '1'];
    $updateLibPosition = $dbConn->update('lib_position', 'position_id', $NewItemCode, $updatePositionStatus);
    if (!$updateNewUserProfileStatus || !$updateLibPosition) {
        echo json_encode([
            'status' => "failed",
            'msg' => "Failed to update new Item Code."
        ]);
        exit;
    }

    echo json_encode([
        'status' => "success",
        'msg' => "New Item Code and Date Filled Successfully Updated."
    ]);
    exit;
}
// Initialize variables to prevent undefined variable errors
$updateUserprofileStatus = false;
$updateNewLibPosition = false;
$updateCurrentLibPosition = false;
// **Process if the user has a current item code and needs an update**
if (in_array($ReasonEndAppointment, [11, 20])) {
    // Promoted or changed item code
    $updateUserProfile = [
        'position_id' => $NewItemCode,
        'date_filled' => $NewDateFilled
    ];
    $updateUserprofileStatus = $dbConn->update('userprofile', 'empno', $EmployeeNumber, $updateUserProfile);

    $updateNewPositionStatus = ['position_status' => '1'];
    $updateNewLibPosition = $dbConn->update('lib_position', 'position_id', $NewItemCode, $updateNewPositionStatus);

    $updateCurrentPositionStatus = ['position_status' => '0'];
    $updateCurrentLibPosition = $dbConn->update('lib_position', 'position_id', $CurrentPositionID, $updateCurrentPositionStatus);
} else if(!empty($ReasonEndAppointment) && !in_array($ReasonEndAppointment, [11, 20])){
    // Set employee to inactive and lock account
    $updateUserProfile = [
        'emp_status' => $ReasonEndAppointment,
        'account_status' => '4' // locked account
    ];
    $updateUserprofileStatus = $dbConn->update('userprofile', 'empno', $EmployeeNumber, $updateUserProfile);

    $updateCurrentPositionStatus = ['position_status' => '0'];
    $updateCurrentLibPosition = $dbConn->update('lib_position', 'position_id', $CurrentPositionID, $updateCurrentPositionStatus);
}

// **Validate the updates**
if (
    $updateUserprofileStatus &&
    (($ReasonEndAppointment == 11 || $ReasonEndAppointment == 20) ? $updateNewLibPosition : true) &&
    $updateCurrentLibPosition
) {
    echo json_encode([
        'status' => "success",
        'msg' => "Item Code Successfully Updated"
    ]);
} else {
    echo json_encode([
        'status' => "failed",
        'msg' => "Oops! Something went wrong. Please try again later."
    ]);
}
