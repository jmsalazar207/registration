<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
date_default_timezone_set('Asia/Manila');

$today = date('Y-m-d H:i:s');
$dataReturn = [];

if(empty($_POST['g-recaptcha-response']))
{
    $dataReturn['status'] = "failed";
    $dataReturn['msg'] = "Please verify you are not a robot";
    echo json_encode($dataReturn);
}else{
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        $secret = "6Lev7iwhAAAAAO6bDFL_AcOEBv_TiqdhPT40HPQd";
        $response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $data=json_decode($response);
        if ($data -> success)
        {
            if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {

                $dataReturn['status'] = "failed";
                $dataReturn['msg'] = "System encounters and error, please try again later";
                echo json_encode($dataReturn);
            }else {
                $process = $_POST['processType'];
                if($process == 'Register'){
                    $user['sname'] = sanitize(strtoupper($_POST['AddLastName']));
                    $user['fname'] = sanitize(strtoupper($_POST['AddFirstName']));
                    $user['mname'] = sanitize(strtoupper($_POST['AddMiddleName']));
                    $user['ename'] = sanitize(strtoupper($_POST['AddextName']));
                    $user['mobile'] = sanitize($_POST['AddMobileNumber']);
                    $user['sex'] = sanitize($_POST['AddSex']);
                    $user['birthdate'] = sanitize($_POST['AddBirthdate']);
                    $user['eaddress'] = sanitize($_POST['AddEmail']);
    
                    $user['street'] = sanitize(strtoupper($_POST['AddStreet']));
                    $user['numAdd'] = sanitize(strtoupper($_POST['AddHouseNumber']));
                    $user['region'] = sanitize($_POST['AddRegion']);
                    $user['province'] = sanitize($_POST['AddProvince']);
                    $user['city'] = sanitize($_POST['AddCity']);
                    $user['barangay'] = sanitize($_POST['AddBarangay']);
                    $user['position'] = sanitize($_POST['AddPosition']);
                    $user['division'] = sanitize($_POST['AddDivision']);
                    $user['unit'] = sanitize($_POST['AddUnit']);
                    $user['password'] = md5($_POST['ConfirmPassword']);
                    $user['empno'] = sanitize($_POST['EmployeeNumber']);
                    $user['date_registered'] = $today;
                    $user['approved'] = 0;
                    $user['user_level'] = 0;
                    $user['isLog'] = 0;
                    $InsertQuery = $dbConn->insert('userprofile',$user);
                    if($InsertQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Congratulations! You have successfully registered.";
                        echo json_encode($dataReturn);
                    }else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
                }else if($process = 'Update'){                  
                    $id=$_POST['EmployeeNumber'];

                    $userUpdate['sname'] = sanitize(strtoupper($_POST['AddLastName']));
                    $userUpdate['fname'] = sanitize(strtoupper($_POST['AddFirstName']));
                    $userUpdate['mname'] = sanitize(strtoupper($_POST['AddMiddleName']));
                    $userUpdate['ename'] = sanitize(strtoupper($_POST['AddextName']));
                    $userUpdate['mobile'] = sanitize($_POST['AddMobileNumber']);
                    $userUpdate['sex'] = sanitize($_POST['AddSex']);
                    $userUpdate['birthdate'] = sanitize($_POST['AddBirthdate']);
                    $userUpdate['eaddress'] = sanitize($_POST['AddEmail']);
    
                    $userUpdate['street'] = sanitize(strtoupper($_POST['AddStreet']));
                    $userUpdate['numAdd'] = sanitize(strtoupper($_POST['AddHouseNumber']));
                    $userUpdate['region'] = sanitize($_POST['AddRegion']);
                    $userUpdate['province'] = sanitize($_POST['AddProvince']);
                    $userUpdate['city'] = sanitize($_POST['AddCity']);
                    $userUpdate['barangay'] = sanitize($_POST['AddBarangay']);
                    $userUpdate['position'] = sanitize($_POST['AddPosition']);
                    $userUpdate['division'] = sanitize($_POST['AddDivision']);
                    $userUpdate['unit'] = sanitize($_POST['AddUnit']);
                    $userUpdate['password'] = md5($_POST['ConfirmPassword']);
                    $userUpdate['date_registered'] = $today;
                    $userUpdate['approved'] = 0;
                    $userUpdate['user_level'] = 0;
                    $userUpdate['isLog'] = 0;
                    $userUpdate['last_update'] = $today;
    
                    $UpdateQuery = $dbConn->update('userprofile', 'empno', $id, $userUpdate);
                    if($UpdateQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Your information has been updated successfully. Thanks for keeping your details current!";
                        echo json_encode($dataReturn);
                    }else {

                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
                }
            }
        }
    }else{
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Invalid Captcha";
        echo json_encode($dataReturn);
    }
}