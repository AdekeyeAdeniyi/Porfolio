<?php

    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load composer autoload
    require '../../vendor/autoload.php';

    // Initailizing PHPMailer class
    $mail = new PHPMailer(true);



        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $comments = htmlspecialchars($_POST['comments']);


        try {
            // //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            // $mail->isSMTP();                                            // Send using SMTP
            // $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            // $mail->Username   = 'securesally@gmail.com';                     // SMTP username
            // $mail->Password   = 'zxjbhozuadnrdacv';                               // SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            // $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('adekeyeimmanuel@gmail.com', 'Adeniyi Emmanuel');            // Name is optional
            $mail->addReplyTo('adekeyeimmanuel@gmail.com', 'Adeniyi Emmanuel');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $comments;
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        

  
?>