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
        $secret = "6LeTvywhAAAAAOsiC25iQjSjNYh7v6V1djgnFWtZ";
        $response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $data=json_decode($response);
        if ($data -> success)
        {
            if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {

                $dataReturn['status'] = "failed";
                $dataReturn['msg'] = "System encounters and error, please try again later";
                echo json_encode($dataReturn);
            }else {
                    $target_dir = "uploadedID/";
                    $fileExt = pathinfo($_FILES['AddFile']['name'], PATHINFO_EXTENSION);
                    $UploadFile = '_'.$_POST['EmployeeNumber'].'.'.$fileExt;
                    $target_file = $target_dir.$UploadFile;
                    // $target_file = $target_dir ."_". basename($_FILES["AddFile"]["name"]);
                    // $UploadFile = basename($_FILES["AddFile"]["name"]);
                    // $UploadFile = $_POST['EmployeeNumber'];
                    $uploadOk = 1;
                    

                    $user['sname'] = sanitize(strtoupper($_POST['AddLastName']));
                    $user['fname'] = sanitize(strtoupper($_POST['AddFirstName']));
                    $user['mname'] = sanitize(strtoupper($_POST['AddMiddleName']));
                    $user['ename'] = sanitize(strtoupper($_POST['HiddenAddextName']));
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
                    $user['password'] = password_hash($_POST['ConfirmPassword'], PASSWORD_DEFAULT);
                    $id = $user['empno'] = sanitize($_POST['EmployeeNumber']);
                    $user['uploaded_id'] = sanitize('Hehe');
                    $user['date_registered'] = $today;
                    $user['date_approved'] = '';
                    $user['uploaded_id'] = $UploadFile;
                    $user['user_level'] = 0;
                    $user['isLog'] = 0;
                    $user['account_status'] = 1;
                    
                    if (move_uploaded_file($_FILES["AddFile"]["tmp_name"], $target_file)){
                    $UpdateRegisterQuery = $dbConn->update('userprofile', 'empno', $id, $user);
                    if($UpdateRegisterQuery){
                        $dataReturn['status'] = "success";
                        $dataReturn['msg'] = "Congratulations! You have successfully registered.";
                        echo json_encode($dataReturn);
                    } else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Please try again later.";
                        echo json_encode($dataReturn);
                    }
                    } else {
                        $dataReturn['status'] = "failed";
                        $dataReturn['msg'] = "Oops! Something went wrong. Uploading failed..";
                    }
            }
        }
    }else{
        $dataReturn['status'] = "failed";
        $dataReturn['msg'] = "Invalid Captcha";
        echo json_encode($dataReturn);
    }
}