<?php
header('Content-Type: text/html; charset=utf-8');
/*if($_GET[key]=="new_shop"){
		
		$txt_short = 'ทะเบียน '.$_POST[car_plate]; 
        $txt_short.' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ';
   		 $title = "ทำรายการใหม่";
	}

else if($_GET[key]=="new_driver"){
		
        $txt_short = 'มีคนขับรถสมัครสมาชิกเข้ามาใหม่';
   		 $title = "สมาชิกใหม่";
	}
	
	$strTo = "system.goldenbeachgroup@gmail.com";
//	$strTo = "chokdee@welovetaxi.com";
	$strSubject = "TShare Application : ".$title;
//	$strHeader = "From: system.goldenbeachgroup@gmail.com";
	$strHeader = "From: izudsuarez@gmail.com";
	$strMessage = "".$txt_short;
	$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	if($flgSend)
	{
		echo "Email Sending.".$flgSend."<br/>";
		echo $strMessage;
	}
	else
	{
		echo "Email Can Not Send."."<br/>";
		echo $strMessage;
	}
	*/
	
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
        $mail->MsgHTML($msg_body);
        $mail->SetFrom($webmail_username, 'Golden Beach Tour');
        $mail->AddReplyTo($webmail_username,"Golden Beach Tour");
        $mail->Subject    = "Subject";
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
        $address = "system@goldenbeachgroup.com"; ///// E-mail send to
        $mail->AddAddress($address, "E-mail");
        $mail->Send();
?>
