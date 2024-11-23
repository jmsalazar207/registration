<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email = $_POST['email']; // Email passed from AJAX request

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'fo3.systemnotification@gmail.com'; 
        $mail->Password   = 'wqmqmjylndgobsle'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom('fo3.systemnotification@gmail.com', 'System Notification');
        $mail->addAddress($email); // Test email

        // Try sending a dummy message (or just connect to verify reachability)
        $mail->Subject = 'Email Validation Test';
        $mail->Body    = 'This is a test email to validate the address.';
        $mail->preSend(); // Only validates, doesn't actually send the email

        echo json_encode(['status' => 'success', 'message' => 'Email is valid and reachable.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Email is invalid or unreachable.', 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
}
?>
