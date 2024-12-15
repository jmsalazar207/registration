<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];
if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Session has expired. Please relogin your account.";
    echo json_encode($dataReturn);
}else{  
                    $id = $_POST['voluntaryID'];
                    $Updatevoluntary['vw_name_address'] =sanitize(strtoupper($_POST['UpdatevoluntaryNAO']));
                    $Updatevoluntary['vw_date_from'] = $_POST['UpdatevoluntaryDateFrom'];
                    $Updatevoluntary['vw_date_to'] = $_POST['UpdatevoluntaryDateTo'];
                    $Updatevoluntary['vw_no_hrs'] = sanitize(strtoupper($_POST['UpdatevoluntaryTotalHrs']));
                    $Updatevoluntary['vw_position'] = sanitize(strtoupper($_POST['UpdatevoluntaryPosition']));
                    
                    $UpdatevoluntaryQuery = $dbConn->update('lib_voluntary','id',$id,$Updatevoluntary);
                    // echo $adminUpdateQuery;

                    if($UpdatevoluntaryQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Voluntary Work Details successfully updated";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
