<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
//include 'modal/registermodal.php';
//if(isset($_POST['btn_search'])){
    // 1 registered ok password match
    // 0 registered wrong password
    // 2 not yet registered hihi
    // 3 no data in the database call personnel
    // 4 registered ok password match but not approved
    $data = [];
    $user = []; 
    $userName = '03-'.$_POST['username'];
    $password = md5($_POST['password']);
    $param['conditions'] = array('empno' => $userName);
    $credentials = $dbConn->findFirst('userprofile',$param);
    if($credentials) {
        if(($credentials['password'] != '') && $credentials['password'] ==$password) {
            $isApproved = $credentials['date_approved'];
            if(($isApproved=='')||($isApproved=='0000-00-00 00:00:00')) {
                $data['credentialsMatch'] = 4;
            }else{
                $data['credentialsMatch'] = 1;
                $_SESSION['userID'] = $credentials['empno'];
            }
        }else if(($credentials['password'] != '') && $credentials['password'] !=$password) {
            $data['credentialsMatch'] = 0;
        }else if($credentials['password'] == '') {
            $data['credentialsMatch'] = 2;
        }
        $data['empno'] = $credentials['empno'];
        $data['password'] = $credentials['password'];
        $data['date_registered'] = $credentials['date_registered'];
        echo json_encode($data);
    }else{
        $data['credentialsMatch'] = 3;
        echo json_encode($data);
    }
