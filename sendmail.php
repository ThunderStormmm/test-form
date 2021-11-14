<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTNL(true);

$mail->setFrom('dsfsdf', 'ропор');
$mail->addAddress('gaida777777@gmail.com');
$mail->Subject = 'Привет';


$body = '<html>
                <head>
                    <title>'.$Subject.'</title>
                </head>
                <body>'; //Текст нащего сообщения можно использовать HTML теги

if(trim(!empty($_POST['name']))){
    $body.='<p>Имя: '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['phone']))){
    $body.='<p>Телефон: '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p>Почта: '.$_POST['email'].'</p>';
}

$mail->Body = $body;
if(!$email->send()) {
    $message = 'we have error';
}else{
    $message = 'letter has been sent!';
}

$response = ['message' => $message];
header('Content-type: application/json');
echo json_encode($response);

?>