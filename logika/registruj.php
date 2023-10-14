<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require_once __DIR__ . '/Mejler.php';
require_once __DIR__ . '/../tabele/Korisnik.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/Exception.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/PHPMailer.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/SMTP.php';

try{
Korisnik::registracija(
	$_POST['ime'],
	$_POST['prezime'],
	$_POST['korisnickoIme'],
	$_POST['mejl'],
	$_POST['lozinka'],
	$_POST['telefon'],
	$_POST['adresa'],
	$_POST['grad']);
} catch(Exception $e){}

$korisnik = Korisnik::getByKorisnickoIme($_POST['korisnickoIme']);
$naslov = 'Account Confirmation';
$telo = '<p>Click link to confirm Account</p><a href ="http://localhost/finalPraksa/logika/mejlAktivacija.php?id='.$korisnik->id.'">Potvrdi Nalog</a>';
$mejl = $_POST['mejl'];

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

// $ime,$prezime,$korisnickoIme,$mejl,$lozinka,$telefon,$adresa,$grad*/