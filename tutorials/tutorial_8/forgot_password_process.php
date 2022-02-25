<?php

    const reset_link = "http://localhost/tutorials/tutorial_8/change_password.php";

    include "connect.php";
    if(isset($_POST['reset'])) {
        $email = $_POST['email'];
    }
    else {
        exit();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'mail/Exception.php';
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'your_email@gmail.com';                     // SMTP username
        $mail->Password   = 'your_email';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('your_email@gmail.com', 'Admin');
        $mail->addAddress($email);     // Add a recipient

        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
    
        // Content
        $mail->isHTML(true); 
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'To reset your password click <a href="'.reset_link.'?code='.$code.'">here </a>. </br>Reset your password in a day.';

        if($db->connect_error) {
            die('Could not connect to the database.');
        }

        $verifyQuery = $db->query("SELECT * FROM users WHERE email = '$email'");

        $updated_at = date('Y-m-d H:m:s');

        if($verifyQuery->num_rows) {
            $codeQuery = $db->query("UPDATE users SET code = '$code', updated_at = '$updated_at' WHERE email = '$email'");
                
            $mail->send();
            echo 'Message has been sent, check your email';
        }
        $db->close();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
