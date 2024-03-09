<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");

    $data = [];
    $user = []; 
    $empNumber = $_POST['employeeNumber'];
    $param['conditions'] = array('empno' => $userName);
    $sql = "SELECT up.*, d.division_name, u.unit_name, pos.position_name
            FROM userprofile up 
            JOIN lib_division d on d.division_code = up.division
            JOIN lib_unit u on u.unit_code = up.unit
            JOIN lib_position pos on pos.position_code = up.position
            WHERE up.empno = '$empNumber'";
    $sessionInfo = $dbConn->findFirstQuery($sql);
        if($sessionInfo) {
            $_SESSION['FullName'] = $sessionInfo['fname']. ' '.$sessionInfo['lname'];
        }
    echo json_encode($sessionInfo);
