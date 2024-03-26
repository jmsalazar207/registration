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
        $isApproved = $credentials['account_status'];
        if($isApproved==0) {
            $data['credentialsMatch'] = 0; //Unregistered
        }else if($isApproved == 1) {
            $data['credentialsMatch'] = 1; //Pending Approval
        }else if($isApproved== 2) {
            if(($credentials['password'] != '') && $credentials['password'] ==$password) {
                $data['credentialsMatch'] = 2; //Approved
                $data['AccountUserLevel'] = $credentials['user_level'];
                if($data['AccountUserLevel'] != 0){
                    $_SESSION['userID'] = $credentials['empno'];
                    $_SESSION['userLevel'] = $credentials['user_level'];
                }
            }else{
                $data['credentialsMatch'] = 5; //wrong password
            }
        }else if ($isApproved==3) {
            $data['credentialsMatch'] = 3; //Disapproved
        }else if ($isApproved==4) {
            $data['credentialsMatch'] = 4; //Account Locked
        }
        $data['empno'] = $credentials['empno'];
        $data['password'] = $credentials['password'];
        $data['date_registered'] = $credentials['date_registered'];
        echo json_encode($data);
    }else{
        $data['credentialsMatch'] = 6; //No record found
        echo json_encode($data);
    }
