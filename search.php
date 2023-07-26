<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
//include 'modal/registermodal.php';
//if(isset($_POST['btn_search'])){
    $data = [];
    $user = [];
    $user['empno'] = $_POST['txtSearch'];
    $param['conditions'] = array('empno' => $user['empno']); 
    $exists = $dbConn->findFirst('userprofile',$param);

    $data['count'] = $dbConn->count();
    $data['empno'] = $user['empno'];
    echo json_encode($data);

//}
?>