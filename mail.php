
<?php
require_once("includes/class.mysql.php");
$db = New DB();
	define("DB_NAME_APP","admin_app");
	define("DB_USERNAME","admin_MANbooking");
	define("DB_PASSWORD","252631MANbooking");
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
header('Content-Type: text/html; charset=utf-8');
if($_GET[key]=="new_shop"){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 	$res[place_shop] = $db->select_query("SELECT topic_th,id FROM shopping_product  WHERE id='".$_POST[program]."' ");
 	$arr[place_shop] = $db->fetch($res[place_shop]);
 
		$txt_short = 'ทะเบียน '.$_POST[car_plate]; 
        $txt_short .=' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ';
   		$title = "ทำรายการใหม่";
   		$time_post = date('Y-m-d h:i:s');
   		
   		$mm = $_POST[time_num];
		if($_POST[time_num]<10){
			$mm = "0".$_POST[time_num];
		}
		if($_POST[adult]<1){
			$_POST[adult] = 0;
		}
   		
   		$txt_short2 = 'สถานที่ '. $arr[place_shop][topic_th].' ';
   		$txt_short2 .= 'ทำรายการเวลา '.$time_post.'  น. ';
   		$txt_short2 .= 'จะถึงสถานที่ในอีก '.$mm.' นาที ';
   		$txt_short2 .= 'จำนวนแขก '.$_POST[adult].' คน';
}

else if($_GET[key]=="new_driver"){
        $txt_short = 'มีคนขับรถสมัครสมาชิกเข้ามาใหม่';
   		$title = "สมาชิกใหม่";
   		$txt_short2 = 'ชื่อ '.$_POST[name]."<br>";
   		$txt_short2 .= 'User : '.$_POST[username].' ';
   		$txt_short2 .= 'Password : '.$_POST[password].' ';
   		$txt_short2 .= 'สมัครเวลา : '.date('Y-m-d h:i:s',$_POST[post_date]).' ';
}
	
ob_start();
?>
<html>
	<body>
	<head>
		<meta charset="UTF-8">
		
	</head>
	<div class="row">
		<div align="center">
			<img src="images/app/iconv5.png" width="150px" />
		</div>
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
	          font-size: 24px;
    		  font-weight: 300;color : #fff !important;" ><?=$title;?></span>
	          <p style="color : #fff !important;"><?=$txt_short;?></p>
	          <p style="color : #fff !important;"><?=$txt_short2;?></p>
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
//ob_end_flush();
$message .= $output;
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
        $address = "chokdee@welovetaxi.com"; ///// E-mail send to
        $mail->AddAddress($address, "E-mail");
        echo $mail->Send();
        
        $address2 = "chokdee25222525@gmail.com"; ///// E-mail send to
        $mail->AddAddress($address2, "E-mail");
        echo $mail->Send();
        
        $address3 = "system.goldenbeachgroup@gmail.com"; ///// E-mail send to
        $mail->AddAddress($address3, "E-mail");
        echo $mail->Send();
        
?>
