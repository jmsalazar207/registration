<?php
session_start();
require_once("includes/init.php");
require_once("includes/helper.php");
//include 'modal/registermodal.php';

$today = date('d-m-y h:i:s');

if(isset($_POST['btn_sign_up'])){

    if(empty($_POST['g-recaptcha-response']))
    {
        $_SESSION['error'] = 'Please verify you are not a robot';
        header('Location: index.php');
    }
    else
    {
      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
      {
        $secret = "6Lev7iwhAAAAAO6bDFL_AcOEBv_TiqdhPT40HPQd";
        $response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
      
        $data=json_decode($response);
        if ($data -> success)
        {
            if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) 
            {
                $_SESSION['error'] = 'System encounters and error, please try again later';
                header('Location: index.php');
            }else
            {
                // $user = [];
                // $user['empno'] = $_POST['EmployeeNumber'];
                // $param['conditions'] = array('empno' => $user['empno']); 
                // $exists = $dbConn->findFirst('userprofile',$param);
                // if($dbConn->count() > 0)
                // {
                    // echo "
                    //     <script type='text/javascript'>
                    //     $(document).ready(function(){
                    //     $('#AlreadyExist').modal('show');
                    //     });
                    //     </script>
                    //     ";
                //     $_SESSION['insert'] = 'exists';
                //     header('Location: index.php');
                // }
                // else
                // {
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
                    $user['date_registered'] = $today;
                    $user['approved'] = 0;
                    $user['user_level'] = 0;
                    $user['isLog'] = 0;

                    $InsertQuery = $dbConn->insert('userprofile',$user);
                    if($InsertQuery){
                        $_SESSION['insert'] = 'success';
                        header('Location: index.php');
                    }
                    else 
                    {
                        $_SESSION['insert'] = 'error';
                        header('Location: index.php');
                    }
                // }  
            }              

        }
      }
      else
        {
          $_SESSION['error'] = 'Invalid Captcha';
        }

    }
}



?>