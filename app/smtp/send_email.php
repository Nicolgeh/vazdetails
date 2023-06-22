<?php
function Send_Mail($to,$subject,$body)
{
require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';
$from       = "from@yourwebsite.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // активируем SMTP аутентификацию
$mail->Host       = "tls://smtp.yourwebsite.com"; // SMTP хост
$mail->Port       =  465;                    // SMTP порт
$mail->Username   = "SMTP_Username";  // SMTP  имя пользователя
$mail->Password   = "SMTP_Password";  // SMTP пароль
$mail->SetFrom($from, 'From Name');
$mail->AddReplyTo($from,'From Name');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();
}
?>