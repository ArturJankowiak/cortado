<?php
require_once('PHPMailerAutoload.php'); # patch where is PHPMailer / ścieżka do PHPMailera

$mail = new PHPMailer;
$mail->CharSet = "UTF-8";

$mail->IsSMTP();
$mail->Host = 'smtp.pl'; #SMTP
$mail->Port = 465; # Gmail SMTP port
$mail->SMTPAuth = true; # Enable SMTP authentication / Autoryzacja SMTP
$mail->Username = "mail"; # Gmail username (e-mail) / Nazwa użytkownika
$mail->Password = "haslo"; # Gmail password / Hasło użytkownika
$mail->SMTPSecure = 'ssl';

$mail->FromName = 'Formularz kontaktowy'; # Sender name
$mail->AddAddress('odbiorca@gmail.com', 'Formularz kontaktowy'); # # Recipient (e-mail address + name) / Odbiorca (adres e-mail i nazwa)

$mail->IsHTML(true); # Email @ HTML

    $name = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $mail->From = $email; # REM: Gmail put Your e-mail here


    $mail->Subject = 'Zapytanie: ' . $name . ' ' . $email;
    $mail->Body = "<html>
                    <body>
                        <p><strong>Imie i nazwisko:</strong>  {$name} {$surname}</p>
                        <p><strong>Email:</strong><a href='mailto: {$email}'> {$email}</a></p>
                        <p><strong>Wiadomość:</strong> {$msg}</p>";
    if(!$mail->Send()) {
    echo 'Some error...';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
    }
header("Location:zapytanie-wyslane.html")
?>
