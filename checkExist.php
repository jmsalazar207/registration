<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");


    $empno = '03-'.$_POST['addEmpNo'];
    $sql_empno = "SELECT * FROM userprofile WHERE empno = '$empno'  AND empno != '$empno'";
    $dbConn->findFirstQuery($sql_empno);
    $count['empNO'] = $dbConn->count();

    echo json_encode($count);