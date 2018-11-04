<?php 

  require 'PHPMailer-6.0.5/src/Exception.php';
  require 'PHPMailer-6.0.5/src/PHPMailer.php';
  require 'PHPMailer-6.0.5/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  include '../conf/emailSeting.php';
 
  $timsp = time();
  $book_gen = "BT".$timsp;
  $is_mailer = new is_mailer; 

   
    
//  try {
  	$userEmail = $_POST[email];
//  	$userEmail = "phanupongninhat@gmail.com";
    $mail = new PHPMailer(true);   
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $is_mailer->host;  // Specify main and backup SMTP servers
    $mail->Port = $is_mailer->port;
    // $mail->SMTPDebug = 2;
    $mail->SMTPAutoTLS = false;    
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $is_mailer->username;                 // SMTP username
    $mail->Password = $is_mailer->password;                           // SMTP password
    $mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
    $mail->CharSet = "utf-8";

    $mail->IsHTML(true);  // TCP port to connect to
    $mail->addAddress( $is_mailer->mail_info, $is_mailer->name);     // Add a recipient
    $mail->setFrom( $is_mailer->mail_info,  $is_mailer->name);
    // $mail->AddCC($userEmail);
    $mail->addAddress($userEmail);               // Name is optional
    $mail->addReplyTo($is_mailer->mail_info);

    $mail->Subject = $is_mailer->subject." #".$book_gen;
    $message .= call_html();
    $mail->Body = $message;
    
    $result = $mail->send();
    
    $data[mail] = $result;
    echo json_encode($data);
//    echo  '1';
    // $_SESSION['captcha'] = simple_php_captcha();
  /*} catch (Exception $e) {
    echo '0';
  }*/
?>