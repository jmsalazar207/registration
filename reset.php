<?php
session_start();
require_once('includes/init.php');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['empno'])){
  $empno = $_POST['empno'];
  $default_password = md5("dswd12345");
  $update =  $dbConn->update('userprofile','empno',$empno,["password" => $default_password]);
  if($update){
    echo true;
  }else{
    echo false;
  }
}