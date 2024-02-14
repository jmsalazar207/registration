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
        $date_registered = $exists['date_registered'];
        $data['fname'] = $exists['fname'];
        $data['mname'] = $exists['mname'];
        $data['sname'] = $exists['sname'];
        $data['extname'] = $exists['ename'];
        if($date_registered==null || $date_registered =='0000-00-00 00:00:00') {
            $data['registered'] = 'No';  
        }else{
            $data['registered'] = 'Yes';
        }
        echo json_encode($data);
    } else {
        $data['count'] = 0;
        $data['empno'] = $user['empno'];
        echo json_encode($data);
    }

            
?>