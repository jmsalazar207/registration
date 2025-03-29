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
} else {
    if (!isset($_POST["selectedAccess"]) || empty($_POST["selectedAccess"])) {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "No access permissions selected.";
    } elseif (!isset($_POST["userID"]) || empty($_POST["userID"])) {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "User ID is missing.";
    } else {
        $selectedAccess = $_POST["selectedAccess"];
        $userID = sanitize($_POST["userID"]); // Get userID from request

        // Remove old permissions first (if needed)
        $dbConn->delete("tbl_access_level", "access_level_empno", $userID);

        // Insert new access permissions
        foreach ($selectedAccess as $access) {
            $accessData = [
                "access_level_empno" => $userID,
                "page_access_code" => sanitize($access),
                "page_access_granted_by" => $_SESSION['userID'], // The admin granting access
                "datetime_granted" => $today
            ];
            $dbConn->insert("tbl_access_level", $accessData);
        }

        $dataReturn['status'] = "success";
        $dataReturn['msg'] = "Access permissions updated successfully.";
    }
}

echo json_encode($dataReturn);
?>

