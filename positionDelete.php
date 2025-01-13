<?php
session_start();
require_once('includes/init.php');
$dataReturn = [];
$today = date('Y-m-d H:i:s');
if (isset($_POST['deletePositionID'])) {
  $id = $_POST['deletePositionID'];
  $positionDelete['updated_by'] = $_SESSION['userID'];
  $positionDelete['datetime_updated']= $today;
  $positionDelete['position_status']= 3;
  
  $DeletePositionQuery = $dbConn->update('lib_position','position_id',$id,$positionDelete);
  if($DeletePositionQuery){
      $dataReturn['status'] = "success";
      $dataReturn['msg'] = "Position Name successfully deleted";
      echo json_encode($dataReturn);
  }else {
      $dataReturn['status'] = "failed";
      $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
      echo json_encode($dataReturn);
  }
}
