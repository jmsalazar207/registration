<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");


if (isset($_POST["addEmpNo"])) {
    $empno = '03-'.$_POST['addEmpNo'];
    $param['conditions'] = array('empno' => $empno);
    $dbConn->findFirst('userprofile', $param);
    $count['empNO'] = $dbConn->count();
    echo json_encode($count);
}
if (isset($_POST["updateEmpNo"])) {
    $empno = '03-'.$_POST['updateEmpNo'];
    $oldempno = '03-'.$_POST['adminOldEmpno'];
    $sql_empno = "SELECT * FROM userprofile WHERE empno = '$empno' AND empno != '$oldempno'";
    $dbConn->findFirstQuery($sql_empno);
    $count['updateEmpNO'] = $dbConn->count();
    echo json_encode($count);
}
if (isset($_POST["adminDivision"])) {
    $divName = $_POST['adminDivision'];
    $param['conditions'] = array('division_name' => $divName);
    $dbConn->findFirst('lib_division', $param);
    $count['divName'] = $dbConn->count();
    echo json_encode($count);
}
    