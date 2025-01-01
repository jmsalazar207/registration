<?php
session_start();
require_once("../includes/init.php");
require_once("../includes/helper.php");
    $data = [];
    $user = []; 
    if(isset($_POST['resetUsername'])){
        $userName = $_POST['resetUsername'];
    }
    $password = $_POST['ResetTempPassword'];
    $param['conditions'] = array('empno' => $userName);
    $credentials = $dbConn->findFirst('userprofile',$param);
    if($credentials){
        $AccountStatus = $credentials['account_status'];
        if($AccountStatus ==2){ //accout approved 
            if(($credentials['temp_password'] != '') && password_verify($password,$credentials['temp_password'] )){
                $data['credentialsResult'] = '1'; //correct tempcode
                echo json_encode($data);
            } else {
                $data['credentialsResult'] = '2'; //incorrect tempcode
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
