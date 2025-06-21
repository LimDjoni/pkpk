<?php
include_once '../Controller/config.php';
require('../assets/recaptcha/recaptcha-master/src/autoload.php');
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use ReCaptcha\ReCaptcha;

// CONFIGURATION
$recaptchaSecret = '6LcInT8aAAAAAL7ysZ0mrUiPm6ZlhwFMeivaE9DN'; // ✅ Use your own secret
$sendTo = 'corsec@pkpk-tbk.co.id';
$subject = $_POST['subject'] ?? 'Contact Form Submission';
$fields = [
    'fullname' => 'Full Name',
    'phonenumber' => 'Phone Number',
    'email' => 'Email',
    'subject' => 'Subject',
    'message' => 'Message'
];
$okMessage = 'Contact form successfully submitted. Thank you, we will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later.';

$responseArray = ['type' => 'danger', 'message' => $errorMessage];

// BEGIN PROCESS
try {
    // Check form submission
    if (empty($_POST)) throw new Exception('Form is empty.');

    // Check reCAPTCHA
    if (!isset($_POST['g-recaptcha-response'])) throw new Exception('reCAPTCHA not submitted.');

    $recaptcha = new ReCaptcha($recaptchaSecret);
    $recaptchaResp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
    if (!$recaptchaResp->isSuccess()) throw new Exception('reCAPTCHA verification failed.');

    // Create email message
    $emailText = "New message from contact form:\n\n";
    foreach ($_POST as $key => $value) {
        if (isset($fields[$key])) {
            $emailText .= "{$fields[$key]}: " . strip_tags($value) . "\n";
        }
    }

    // PHPMailer setup
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->Username = 'webadmin@pkpk-tbk.co.id';
    $mail->Password = PASSWORD_EMAIL;

    $mail->setFrom('webadmin@pkpk-tbk.co.id', 'PKPK Website');
    $mail->addReplyTo($_POST['email'], $_POST['fullname']);
    $mail->addAddress($sendTo);

    $mail->Subject = $subject;
    $mail->Body = $emailText;

    $mail->send();
    $responseArray = ['type' => 'success', 'message' => $okMessage];
} catch (Exception $e) {
    $responseArray = ['type' => 'danger', 'message' => $e->getMessage()];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($responseArray); 