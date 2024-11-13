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
    
                    $id = $_SESSION['userID'];
                    $familyMember['empno'] = $id;
                    $familyMember['relation'] = sanitize(strtoupper($_POST['relation']));
                    $familyMember['surname'] = sanitize(strtoupper($_POST['FBSname']));
                    $familyMember['firstname'] = sanitize(strtoupper($_POST['FBFname']));
                    $familyMember['middlename'] = sanitize(strtoupper($_POST['FBMname']));
                    $familyMember['extname'] = $_POST['FBExtName'];
                    $familyMember['birthday'] = $_POST['FBDOB'];
                    $familyMember['occupation'] = isset($_POST['FBoccupation']) ? sanitize(strtoupper($_POST['FBoccupation'])): '';
                    $familyMember['businessName'] = isset($_POST['FBBusinessName']) ? sanitize(strtoupper($_POST['FBBusinessName'])): '';
                    $familyMember['businessAddress'] = isset($_POST['FBBusinessAddress']) ? sanitize(strtoupper($_POST['FBBusinessAddress'])): '';
                    $familyMember['telephoneNo'] = isset($_POST['FBTelephoneNo']) ? sanitize($_POST['FBTelephoneNo']): '';
                    $AddFBQuery = $dbConn->insert('lib_family_background',$familyMember);
                    // echo $adminUpdateQuery;

                    if($AddFBQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Family member successfully added";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
}
