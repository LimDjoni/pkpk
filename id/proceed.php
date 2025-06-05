<?php
// require ReCaptcha class
require('../assets/recaptcha/recaptcha-master/src/autoload.php'); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

// configure
// an email address that will be in the From field of the email.
$from = $_POST['email'];

// an email address that will receive the email with the output of the form
$sendTo = 'corsec@pkpk-tbk.co.id';

// subject of the email
$subject = $_POST['subject'];

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('fullname' => 'fullname', 'phonenumber' => 'phonenumber', 'email' => 'email', 'subject' => 'subject', 'message' => 'message');

// message that will be displayed when everything is OK :)
$okMessage = 'Formulir berhasil dikirim. Terima kasih, Kami akan segera menghubungi Anda!';

// If something goes wrong, we will display this message.
$errorMessage = 'Ada kesalahan saat mengirimkan formulir. Silakan coba lagi nanti';

// ReCaptch Secret
$recaptchaSecret = '6LcInT8aAAAAAL7ysZ0mrUiPm6ZlhwFMeivaE9DN';

// let's do the sending

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE); 

$mail = new PHPMailer(true);

try {
    if (!empty($_POST)) {

        // validate the ReCaptcha, if something is wrong, we throw an Exception,
        // i.e. code stops executing and goes to catch() block
        
        if (!isset($_POST['g-recaptcha-response'])) {
            throw new \Exception('ReCaptcha tidak disetel.');
        }

        // do not forget to enter your secret key from https://www.google.com/recaptcha/admin
        
        $recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());
        
        // we validate the ReCaptcha field together with the user's IP address
        
        $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if (!$response->isSuccess()) {
            throw new \Exception('ReCaptcha tidak divalidasi.');
        }
        
        // everything went well, we can compose the message, as usually
        
        $emailText = "Kamu mendapatkan pesan dari\n=============================\n";

        foreach ($_POST as $key => $value) {
            // If the field exists in the $fields array, include it in the email
            if (isset($fields[$key])) {
                $emailText .= "$fields[$key]: $value\n";
            }
        }
    
        // All the neccessary headers for the email.
        $headers = array('Content-Type: text/plain; charset="UTF-8";',
            'From: ' . $from,
            'Reply-To: ' . $from,
            'Return-Path: ' . $from,
        );
        
         //Server settings
        //$mail->isSMTP();              
        $mail->SMTPSecure = 'ssl/tls';   
        $mail->Host       = 'smtp.gmail.com';     
        $mail->SMTPAuth   = true;   
        $mail->Port       = 465;  

        $mail->Username   = 'webadmin@pkpk-tbk.co.id'; 
        $mail->Password   = '4aTHV*52';    
        
        //Recipients
        $mail->setFrom($from);
        $mail->addAddress($sendTo);     //Add a recipient    

        //Content  
        $mail->Subject = $subject;
        $mail->Body    = $emailText;  

        $mail->send(); 
        $responseArray = array('type' => 'success', 'message' => $okMessage);  
    }
} catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');
    echo $encoded;
} else {
    echo $responseArray['message']; 
}

?>
