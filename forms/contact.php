<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Ambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Konfigurasi email
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'damarakunbyu@gmail.com';
    $mail->Password   = 'fodzftnowuwqpxdt';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    //Penerima email
    $mail->setFrom('damarakunbyu@gmail.com', 'Keroco');
    $mail->addAddress('damarakunbyu@gmail.com', 'Damar');

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "Nama: $name<br>Email: $email<br>Subjek: $subject<br>Pesan: $message";

    $mail->send();
    echo 'Email berhasil terkirim!' ;
} catch (Exception $e) {
    echo 'Email gagal terkirim: ', $mail->ErrorInfo;
}
?>
