<?php 
require_once "vendor/autoload.php";



/**
 * This example shows making an SMTP connection with authentication.
 */
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
//require '../vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'mail.costacandido.com.br';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 465;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'sistemas@costacandido.com.br';
//Password to use for SMTP authentication
//sistemas@270910
$mail->Password = 'sistemas@270910';
//Set who the message is to be sent from
$mail->setFrom('sistemas@costacandido.com.br', 'Felipe Silva');
//Set an alternative reply-to address
$mail->addReplyTo('felipe@costacandido.com.br', 'Felipe Silva');
//Set who the message is to be sent to
$mail->addAddress('felipe.candido8@gmail.com', 'Felipe Cândido');
$mail->addAddress('vanessa@artesdaceci.com.br', 'Vanessa Silva');
//Set the subject line
$mail->Subject = 'Testando envio de email do novo sistema da Artes da celi';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = 'Seu email não aceita HTML, por isso a mensagem não aparece!';
//Anexos
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo 'Houve um erro ao enviar o email: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada!';
}

 ?>