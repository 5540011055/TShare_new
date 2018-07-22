<?php
header('Content-Type: text/html; charset=utf-8');
if($_GET[key]=="new_shop"){
		
		$txt_short = 'ทะเบียน '.$_POST[car_plate]; 
        $txt_short.' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ';
   		 $title = "ทำรายการใหม่";
	}else if($_GET[key]=="new_driver"){
		
        $txt_short = 'มีคนขับรถสมัครสมาชิกเข้ามาใหม่';
   		 $title = "สมาชิกใหม่";
	}
	
//	$strTo = "system.goldenbeachgroup@gmail.com";
	$strTo = "chokdee@welovetaxi.com";
	$strSubject = "TShare Application : ".$title;
	$strHeader = "From: system.goldenbeachgroup@gmail.com";
	$strMessage = "".$txt_short;
//	$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
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
?>
