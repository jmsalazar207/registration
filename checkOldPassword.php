<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
    $data = [];
    $user = []; 
    if(isset($_POST['MandatoryUpdateUsername'])){
        $userName = $_POST['MandatoryUpdateUsername'];
    }
    $password = md5($_POST['MandatoryUpdateOldPassword']);
    $param['conditions'] = array('empno' => $userName);
    $credentials = $dbConn->findFirst('userprofile',$param);
    if($credentials){
        $AccountStatus = $credentials['account_status'];
        if($AccountStatus ==2){ //accout approved 
            if(($credentials['password_md5'] != '') && ($credentials['password_md5'] == $password)){
                $data['credentialsResult'] = '1'; //correct old password
                echo json_encode($data);
            } else {
                $data['credentialsResult'] = '2'; //incorrect oldpassword
                echo json_encode($data);
            }
        } else { //not approved status
            $data['credentialsResult'] = '3';
            echo json_encode($data);
        }
    } else {
        $data['credentialsResult'] = '4'; //No record found
        echo json_encode($data);
    }
