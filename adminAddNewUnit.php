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
    $UnitName = sanitize(value: strtoupper($_POST['txtUnitName']));
    $user['unit_name'] = $UnitName;
    $user['unit_name_code'] = sanitize(strtoupper($_POST['txtUnitNameCode']));
    $user['division_code'] = sanitize(strtoupper($_POST['txtUnitDiv']));
    $user['added_by'] = $_SESSION['userID'];
    $user['datetime_added'] = $today;
    $user['updated_by'] = '';
    $user['datetime_updated'] = '';
    $user['delete_by'] = '';
    $user['datetime_deleted'] = '';
    
    $insertNewUnit = $dbConn->insert('lib_unit',fields: $user);
    if($insertNewUnit){
        $param['conditions'] = array('unit_name' => $UnitName);
        $result = $dbConn->findFirst('lib_unit', $param);
        $unitName = $result['unit_name'];
        $unitCode = $result['unit_code'];

        $AreaAssignment['area_assignment_name'] = $unitName;
        $AreaAssignment['unit_code'] = $unitCode;

        $insertNewAreaAssignment = $dbConn->insert('lib_area_assignment',fields: $AreaAssignment);
            if($insertNewAreaAssignment){
                $dataReturn['status'] = "success";
                $dataReturn['msg'] = "New Unit successfully added.";
                echo json_encode($dataReturn);
            } else {
                $dataReturn['status'] = "failed";
                $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                echo json_encode($dataReturn);
            }
    } else {
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
        echo json_encode($dataReturn);
    }
}
