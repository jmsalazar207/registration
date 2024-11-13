<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;
// Required files
require "vendor/phpmailer/phpmailer/src/Exception.php";
require "vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "vendor/phpmailer/phpmailer/src/SMTP.php";

class Mail {

    public function SendMail(array $emailAddresses, string $subject, string $body, string $filename = '') {
        $data = [];
        $mail = new PHPMailer(true);

        try {
            // Server settings

            $mail->isSMTP();                      // Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth   = true;             // Enable SMTP authentication
            $mail->Username   = 'fo3.systemnotification@gmail.com'; // SMTP email (retrieve from environment)
            $mail->Password   = 'wqmqmjylndgobsle';    // SMTP password (retrieve from environment)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587;              // TCP port to connect to

            // Recipients
            foreach ($emailAddresses as $email) {
                $mail->addAddress($email);
            }

            // Attachments (Optional)
            if (!empty($filename)) {
                $documentPath = "../payroll_docs/";
                $mail->addAttachment($documentPath . $filename);
            }

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject; // Email subject
            $mail->Body    = $body;    // HTML message
            $mail->AltBody = strip_tags($body); // Plain text message for non-HTML mail clients

            // Send email
            $mail->send(); 
            $data['success'] = true;

        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = $mail->ErrorInfo; // Capture detailed error message
        }

        return $data;
    }
}
