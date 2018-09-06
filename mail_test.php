<?php
//ob_end_flush();
//$output = $_POST[message];
//$message = $_POST[message];
$message = "555555";
//echo $message;
	require_once('phpmail/class.phpmailer.php');
        $webmail_port        = 465;                    // port
        $webmail_host        = "smtp.zoho.com"; // SMTP server
        $webmail_username    = "systeminfo-transfer@t-booking.com";     // SMTP server username
        $webmail_password    = "khamenaja1";            // SMTP server password 

        $mail             = new PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();                   // 启用SMTP
        $mail->SMTPAuth    = true;         // 启用SMTP认证
        $mail->SMTPSecure = "ssl";         // sets the prefix to the servier
        $mail->Host        = $webmail_host; // SMTP server
        $mail->Port        = $webmail_port;    // set the SMTP port for the GMAIL 
        $mail->Username    = $webmail_username;    // SMTP server username
        $mail->Password    = $webmail_password ;      // SMTP server password 
        $msg_body = $message;
        $mail->MsgHTML($msg_body);
        $mail->SetFrom($webmail_username, 'Golden Beach Tour');
        $mail->AddReplyTo($webmail_username,"Golden Beach Tour");
        $mail->Subject    = "T Share : ".$title;
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
//        $address = "system.goldenbeachgroup@gmail.com"; ///// E-mail send to
        
//        $address3 = $_POST[email]; ///// E-mail send to
        $address3 = "izudsuarez@gmail.com"; ///// E-mail send to
        $mail->AddAddress($address3, "E-mail");
        echo $mail->Send();
//        echo json_encode($message);
?>
