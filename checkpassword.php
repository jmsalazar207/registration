<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
    $data = [];
    $user = []; 
    if(isset($_POST['username'])){
        $userName = '03-'.$_POST['username'];
    }else{
        $userName = $_SESSION['userID'];
    }
    $password = $_POST['password'];
    $param['conditions'] = array('empno' => $userName);
    $credentials = $dbConn->findFirst('userprofile',$param);
    if($credentials) {
        $isApproved = $credentials['account_status'];
        if($isApproved==0) {
            $data['credentialsMatch'] = 0; //Unregistered
        }else if($isApproved == 1) {
            $data['credentialsMatch'] = 1; //Pending Approval
        }else if($isApproved== 2) {
            if($credentials['isLog'] == 0){ //Goods
                if(($credentials['password'] != '') && password_verify($password,$credentials['password'] )){ //correct password
                    $data['credentialsMatch'] = 2; //Approved and passed
                    $data['AccountUserLevel'] = $credentials['user_level']; //passdata
                    $data['empno'] = $credentials['empno']; //passdata
                    $data['password'] = $credentials['password']; //passdata
                    $data['date_registered'] = $credentials['date_registered']; //passdata
                    $_SESSION['userID'] = $credentials['empno']; //passdata
                    $_SESSION['userLevel'] = $credentials['user_level']; //passdata
                }else{
                    $data['credentialsMatch'] = 5; //wrong password
                    $data['empno'] = $credentials['empno'];
                }
            }else{
                $data['credentialsMatch'] = 7; // Password must be change
            }
        }else if ($isApproved==3) {
            $data['credentialsMatch'] = 3; //Disapproved
        }else if ($isApproved==4) {
            $data['credentialsMatch'] = 4; //Account Locked
        }
        echo json_encode($data);
    }else{
        $data['credentialsMatch'] = 6; //No record found
        echo json_encode($data);
    }
