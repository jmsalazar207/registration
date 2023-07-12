<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
//include 'modal/registermodal.php';
if(isset($_POST['btn_search'])){
$user = [];
            $user['empno'] = $_POST['txtSearch'];
            $param['conditions'] = array('empno' => $user['empno']); 
            $exists = $dbConn->findFirst('userprofile',$param);
            if($dbConn->count() > 0)
            {
                // echo"meron";
                $_SESSION['search'] = 'old';
                header('Location: index.php');
            }
            else
            {
                // echo"wala";
                $_SESSION['search'] = 'new';
                header('Location: index.php');  
            }
}




?>