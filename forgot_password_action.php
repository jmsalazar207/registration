<?php
header('Content-Type: application/json');
session_start();
require_once('includes/init.php');
// $folder = 'app/';
// $redirectURL = 'forgot_password';
$activity = "forgot";
require_once('mail_forgot.php');
// 1 success
// 0 failed
$Mail = new Mail(); 
$dataReturn = ['status' => '1', 'msg' => '']; // Initialize the return array
    if (isset($_POST['empno']) && isset($_POST['email'])) {
        // Handle Password Reset Request
        $empno = trim($_POST['empno']);
        $emailAdd = trim($_POST['email']);
        
        $param['conditions'] = ['empno' => $empno, 'eaddress' => $emailAdd];
        $user = $dbConn->findFirst('userprofile', $param);
        if ($user) {
            $fullname = $user['sname'] . " " . $user['fname'];  
            $emailAddress = [$user['eaddress']];

            // Generate temporary password
            $temp_password = bin2hex(random_bytes(4)); // Generates an 8-character temporary password
            $hashed_password = md5($temp_password);

            // Update user password
            $update_result = $dbConn->update('userprofile', 'empno', $user['empno'], ['temp_password' => $hashed_password, 'is_reset' => 1]);

            if ($update_result) {
                $subject = "Password Reset Request";
                $reset_link = "https://172.31.32.64/registration/reset.php";
                $body = "Good day!<br><br>
                        We received a request to reset your account password. If you made this request, please follow the instructions in the email to complete the process.<br><br> 
                        Please use the temporary password below to log in and reset your password.<br><br>
                        Temporary Password: $temp_password<br><br>
                        Reset your password using the following link: <a href='$reset_link'>$reset_link</a><br><br>
                        If you did not request a password reset, please ignore this email. For your security, we recommend reviewing your account activity and ensuring your account is secure.<br><br>
                        <em>*** This is a system-generated message. Please do not reply. ***</em><br><br>
                        For further clarification or inquiries, you may send your email to ictms.fo3@dswd.gov.ph.<br><br>
                        Thank you,<br><br>
                        RICTMS";

                $send_email = $Mail->SendMail($emailAddress, $subject, $body);
                if ($send_email['success']) {
                    $dataReturn['status'] = '1';
                    $dataReturn['msg'] = "You will receive an email with a temporary password within the next 24 hours. Please check your inbox for further instructions.";
                    // echo json_encode($dataReturn);
                } else {
                    $dataReturn['status'] = '0';
                    $dataReturn['msg'] = "The system encountered an error while trying to send the email. " . $send_email['message'];
                    // echo json_encode($dataReturn);
                }
            } else {
                $dataReturn['status'] = '0';
                $dataReturn['msg'] = "Failed to update the password. Please try again later.";
                //echo json_encode($dataReturn);
            }
        } else {
            $dataReturn['status'] = '0';
            $dataReturn['msg'] = "Employee number or email address not found.";
            //echo json_encode($dataReturn);
        }
    } else {
        $dataReturn['status'] = '0';
        $dataReturn['msg'] = "Invalid Request";
        //echo json_encode($dataReturn);
    }


// Return response
echo json_encode($dataReturn);

//unset($_SESSION["token"]);
//unset($_SESSION["token-expire"]);
// Helper::redirect($redirectURL, $folder);
