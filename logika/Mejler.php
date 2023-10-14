<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/Exception.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/PHPMailer.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/SMTP.php';


class Mejler{

    public static function sendMejl($naslov,$telo,$mejl){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPAuth = true;
        $mail->Host = HOST_MAIL;
        $mail->Port = PORT;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->setFrom(SENDING_ADDRESS);
        $mail->addAddress($mejl);
        $mail->Subject = $naslov;
        $mail->msgHTML($telo);
        $mail->AltBody = 'This is a plain-text message body';


        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
        $mail->smtpClose();
    }
}