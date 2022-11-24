<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);
$email = $_GET['email'];
try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dat0961555152@gmail.com';                     //SMTP username
    $mail->Password   = 'hbqyxpzbuutbkmaa';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Email gửi tin nhắn
    $mail->setFrom('dat0961555152@gmail.com', 'WEB CHO BON TAU');
    // Người nhận
    $mail->addAddress($email, $email);     //Add a recipient
    // $mail->addAddress('ellen@example.com');     

    // $mail->addReplyTo('info@example.com', 'Information');
    // Gửi một bạn coppy của email cho một người khác
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // File gửi đính kèm
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test Mail';
    $mail->Body    = '<b>Email chỉ mang tính chất minh họa!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo json_encode([
        'status' => 'success',
        'title' => 'Message has been sent']);
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "title" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
    ]);
}


?>
