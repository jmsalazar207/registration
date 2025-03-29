<?php
session_start();
require_once('includes/init.php');
$dataReturn = [];
if (isset($_POST['removeUserAccess'])) {
  $empno = $_POST['removeUserAccess'];
  $sqlRemoveAccess = $dbConn->delete("tbl_access_level", "access_level_empno", $empno);
 
  if($sqlRemoveAccess){
    $dataReturn['status'] = "success";
    $dataReturn['msg'] = "User's access has been successfully revoked!";
    echo json_encode($dataReturn);
  }else{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
    echo json_encode($dataReturn);
  }
}