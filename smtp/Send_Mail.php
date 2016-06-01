<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "no-reply@booksiders.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://host3.dnsfornet.com"; // SMTP host
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "no-reply@booksiders.com";  // SMTP  username
$mail->Password   = "BookSiders.PA";  // SMTP password
$mail->SetFrom($from, 'BookSiders');
$mail->AddReplyTo($from,'BookSiders');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();
}
?>