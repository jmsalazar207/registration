<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");

    $empno = '03-'.$_POST['addEmpNo'];
    $oldempno = '03-'.$_POST['adminOldEmpno'];
    $sql_empno = "SELECT * FROM userprofile WHERE empno = '$empno' AND empno != '$oldempno'";
    $dbConn->findFirstQuery($sql_empno);
    $count['empNO'] = $dbConn->count();

    echo json_encode($count);