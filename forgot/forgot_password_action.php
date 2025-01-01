<?php

session_start();
require_once('../includes/init.php');
require_once('mail_forgot.php');

$Mail = new Mail();

$return = ['success' => false, 'message' => '']; // Initialize the return array

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['empno']) && isset($_POST['email'])) {
        // Handle Password Reset Request
        $empno = trim($_POST['empno']);
        $emailAdd = trim($_POST['email']);
        
        $param['conditions'] = ['empno' => $empno, 'eaddress' => $emailAdd];
        $user = $dbConn->findFirst('userprofile', $param);

        if ($user) {
            $fullname = $user['sname'] . " " . $user['fname'];  
            $emailAddress = $user['eaddress'];

            // Generate temporary password
            $temp_password = bin2hex(random_bytes(4)); // Generates an 8-character temporary password
            $hashed_password = password_hash($temp_password, PASSWORD_DEFAULT);

            // Update user password
            $update_result = $dbConn->update('userprofile', 'empno', $user['empno'], ['temp_password' => $hashed_password]);

            if ($update_result) {
                $subject = "Your Access Code";
                $body = "Dear $fullname,
                        <br>
                        Here is your access code:
                        <br>
                        Code: $temp_password
                        <br>
                        <em>*** This is a system-generated message. Please do not reply. ***</em><br><br>
                        For further clarification or inquiries, you may send your email to ictms.fo3@dswd.gov.ph.
                        <br>
                        Thank you."; 
                $send_email = $Mail->SendMail([$emailAddress], $subject, $body);

                if ($send_email['success']) {
                    $dataReturn['status'] = '1';
                $dataReturn['msg'] ="You will receive an email regarding your request within the next 24 hours. Please check your inbox and spam folder for further instructions.";
                } else {
                    $dataReturn['status'] = '0';
                $dataReturn['msg'] ="The system encountered an error while trying to send the email.";
                }
            } else {
                $dataReturn['status'] = '0';
                $dataReturn['msg'] ="Failed to update the password. Please try again later..";
                
            }
        } else {$dataReturn['status'] = '0';
            $dataReturn['msg'] ="Employee number or email address not found.";
        }
    } else {$dataReturn['status'] = '0';
        $dataReturn['msg'] ="Invalid request.";
    }
} else {$dataReturn['status'] = '0';
    $dataReturn['msg'] ="Invalid request method.";
}

// Return response
header('Content-Type: application/json');
echo json_encode($dataReturn);
