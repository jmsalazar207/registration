<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
//include 'modal/registermodal.php';
//if(isset($_POST['btn_search'])){
    $data = [];
    $user = [];
    $user['empno'] = '03-'.$_POST['txtSearch'];
    $param['conditions'] = array('empno' => $user['empno']); 
    $exists = $dbConn->findFirst('userprofile',$param);
    if($exists) {
        $data['empno'] = $user['empno'];
        $data['count'] = 1;
        $account_status = $exists['account_status'];  
        $date_registered = $exists['date_registered'];
        $data['fname'] = $exists['fname'];
        $data['mname'] = $exists['mname'];
        $data['sname'] = $exists['sname'];
        $data['extname'] = $exists['ename'];
        if($account_status!=0) {
            $data['registered'] = 'Yes';  
        }else{
            $data['registered'] = 'No';
        }
        echo json_encode($data);
    } else {
        $data['count'] = 0;
        $data['empno'] = $user['empno'];
        echo json_encode($data);
    }

            
?>