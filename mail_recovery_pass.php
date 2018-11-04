<?php
//ob_end_flush();
//$output = $_POST[message];
//$_POST[message] = 'test';
//$_POST[email] = 'izudsuarez@gmail.com';
$address3 = $_POST[email]; 
$message = $_POST[message];
$user = $_POST[username];
$pass = $_POST[pass];
$subject = "กู้หรัสผ่าน T-Share";
//echo $message;
ob_start();
?>
<html>
	<body>
	<head>
		<meta charset="UTF-8">
		
	</head>
	<div class="row">
	    <div class="col s12 m12 col-md-offset-1" style="padding-left: 20%;padding-right: 20%;">
	      <div class="card blue-grey darken-1" style="
	position: relative;
    margin: .5rem 0 1rem 0;
    background-color: #fff;
    -webkit-transition: -webkit-box-shadow .25s;
    transition: -webkit-box-shadow .25s;
    transition: box-shadow .25s;
    transition: box-shadow .25s, -webkit-box-shadow .25s;
    border-radius: 2px;
    background-color: #546e7a !important;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
	        <div class="card-content white-text" style="
	        padding: 24px;color: #fff;
    		border-radius: 0 0 2px 2px;">
	          <span class="card-title" style="
	          font-size: 22px;
    		  font-weight: 300;color : #fff !important;" >กู้รหัสผ่านทาง Email</span><br/>
	          <span style="color : #fff !important;font-size: 18px;">ชื่อผู้ใช้ : <?=$user;?></span><br/>
	          <span style="color : #fff !important;font-size: 18px;">รหัสผ่าน : <a style="text-decoration: underline;cursor: pointer;color : #fff;"><?=$pass;?></a></span>
	        </div>
	        <!--<div class="card-action">
	          <a href="#">This is a link</a>
	          <a href="#">This is a link</a>
	        </div>-->
	      </div>
	    </div>
	 </div>
	 </body>
</html>

<?
$output = ob_get_contents();
ob_end_clean();
//		echo $output;
//		exit;
		require_once('phpmail/class.phpmailer.php');
		$mail             = new PHPMailer();
		$webmail_host        = "smtp.gmail.com"; // SMTP server
        $webmail_username    = "system.goldenbeachgroup@gmail.com";     // SMTP server username
        $webmail_password    = "system2016";     
		$mail->SMTPDebug = 2;
		$mail->Host = $webmail_host;
		$mail->SMTPAuth = true;

		// But you can comment from here
		$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->CharSet = "UTF-8";
		// To here. 'cause default secure is TLS.
		
		$mail->setFrom($webmail_username, "T-Share");
		$mail->Username = $webmail_username;
		$mail->Password = $webmail_password;

		$mail->Subject = $subject;
		$mail->msgHTML($output);
		$mail->addAddress($address3, "User");

		if (!$mail->send()) {
		$mail->ErrorInfo;
		} else {
		echo true;
		}
		exit();
		
        /*$webmail_port        = 465;                    // port
        $webmail_host        = 'smtp.gmail.com'; // SMTP server
        $webmail_username    = 'system.goldenbeachgroup@gmail.com';     // SMTP server username
        $webmail_password    = "system2016";            // SMTP server password 

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
        
        $address3 = $_POST[email]; ///// E-mail send to
        $mail->AddAddress($address3, "E-mail");
        echo $mail->Send();*/
//        echo json_encode($message);
?>
