<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $myPersonalEmail = "testtest01@mail.com";
    
    $externalMailHost = "smtp.mail.com";
    $externalMailAddress = "testtest01@mail.com";
    $externalMailSMTPAuth = true;
    $externalMailUsername = "testtest01@mail.com";
    $externalMailPassword = "ForExample888";
    $externalMailSMTPSecure = "tls";
    $externalMailPort = 587;
    
testtest01@mail.com
    require './src/Exception.php';
    require './src/PHPMailer.php';
    require './src/SMTP.php';

    if(isset($_POST['submit'])) {

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;
        $mail->isSMTP();

        $mail->Host = $externalMailHost;
        $mail->SMTPAuth = $externalMailSMTPAuth;
        $mail->Username = $externalMailUsername;
        $mail->Password = $externalMailPassword;
        $mail->SMTPSecure = $externalMailSMTPSecure;
        $mail->Port = $externalMailPort;
        
        $mail->setFrom($externalMailAddress, 'Mailer');
        $mail->addAddress($myPersonalEmail);
        $mail->addReplyTo($_POST['email'], $_POST['name']);

        $mail->isHTML(true);    
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];

        try {
            $mail->send();
            echo 'Your message was sent successfully!';
        } catch (Exception $e) {
            echo "Your message could not be sent! PHPMailer Error: {$mail->ErrorInfo}";
        }
        
    } else {
        echo "There is a problem with the contact.html document!";
    }
    
?>