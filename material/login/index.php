<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="../../bootstrap/font_all/ultimate/flaticon.css?v=<?=time()?>">
      <link rel="stylesheet" href="../../bootstrap/font_all/airport/flaticon.css?v=<?=time()?>">
      <link rel="stylesheet" href="../../bootstrap/font_all/payment/css/fontello.css?v=<?=time()?>">
      <link rel="stylesheet" href="../../bootstrap/font_all/icomoon/demo-files/demo.css?v=<?=time()?>">
      <link rel="stylesheet" href="../../bootstrap/font_all/app-new/css/app-icon.css?v=<?=time()?>">
      <link rel="stylesheet" href="../../bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="../../bootstrap/css/ionicons.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="../onsenui/css/onsenui.css">
<link rel="stylesheet" href="../onsenui/css/onsen-css-components.min.css?v=1.0">
<script src="../onsenui/js/onsenui.min.js"></script>

<!--===============================================================================================-->


<style>
.txt-important{
	color: #FF1313;
	font-weight: bold;
	position: absolute;
    margin-left: 25px;
}
.brand-small {
    background-image: url(../../images/sprite--brandsP.png);
    background-size: 28px auto;
    background-position: 0 0;
    background-repeat: no-repeat;
    height: 28px;
    width: 28px;
}
.txt-upload-profile{
	background-color: #f4f4f4;
    padding: 0px 10px;
	position: absolute;
    /* bottom: 22px; */
/*    width: 160px;*/
    margin-left: -20px;
    margin-top: -23px;
    border-top-left-radius: 5px;
}
.txt-upload{
/*	border: 1px solid #eee;*/
    background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
/*    right: 57px;*/
	margin-left: 85px;
    margin-top: -24px;
    border-top-left-radius: 5px;
}
.img-preview-show{
	margin-top: 3px;
	max-height: 150px;
	width: 240px;
}
.box-preview-img{
	 border: 1px solid #fff;
	 border-radius: 3px;
	 margin: 7px;
	 display: nones;
	 width: 240px;
	 height: 150px;
	 background-color: #dedede;
	 box-shadow: 1px 1px 1px #d4d4d4;
}
.intro{
	text-align: center;
	margin: 10px;
	padding: 0px 15px;
}
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn-ip {
  border: 1px solid #0076ff;
  color: #3a94fe;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 16px;
/*  font-weight: bold;*/
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 150px !important;
        height: 170 !important;
/*        max-height: 450px;*/
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        display: block;
      }

      button {
        margin-top: 10px;
      }
    </style>
<style>
.camera {
    width: 100%;
/*    height: 100%;*/
/*    height: 240px;*/
    background-color: #d3d3d3;
    vertical-align: middle;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
/*    margin: 10px;*/
}
.focus {
    width: 100px;
    height: 100px;
    border: 12px solid #f5f5f5;
    border-radius: 100%;
}
	.bottom-txt{
		position: fixed;
	    bottom: 5px;
	    width: 100%;
	    left: 0;
	}
	.link-txt{
		color: #0076ff !important;
		font-weight: 800;
	}
	 @media screen and (max-width: 320px) {
	 	.img-logo{
			width: 100px !important;
			margin-top: -25px;
		}
		.pd-min{
			padding: 3px;
			border-radius: 25px;
		}
		.bottom-txt {
		    bottom: 10px;
		}
	 }
	.img-logo{
		width: 150px;
	}
	.pd-min{
			
			border-radius: 25px;
	 }
	 .btn-show-pass i{
	 	font-size: 20px;
	 }
	 .p-l-0{
	 	padding-left: 0px;
	 }
	 .pass{
	 	position: absolute;
    	right: 10px;
    	margin-top: 5px;
    	color: #4CAF50;
	 }
	 .no-pass{
	 	position: absolute;
    	right: 10px;
    	margin-top: 5px;
    	color: #ff0000;
	 }
</style>
</head>
<body>
	<?php 
		if($_COOKIE[app_remember_user]){
			$hasval_us = "has-val";
		}else{
			$hasval_us = "";
		}
		
		if($_COOKIE[app_remember_pass]){
			$hasval_ps = "has-val";
		}else{
			$hasval_ps = "";
		}

    	$rand = time().generateRandomString();    	
    	function generateRandomString($length = 10) {
		    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
//    	exit();
	?>
<ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>
	
	<template id="page1.html">
	<ons-page id="page1">
	<div class="limiter">
		<div class="container-login100" style="padding: 0; margin: 0px; min-height: 100%;">
			<div class="wrap-login100" style="border-radius: 0px;">
			
				<form id="form_login" method="post" enctype="multipart/form-data">
			
					<span class="login100-form-title p-b-30 p-t-20">

						<img src="../../images/logo.png" class="img-logo" onclick="location.reload();" />
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100 <?=$hasval_us;?>" type="text" name="real_username" id="real-username" autocomplete="new-password" required value="<?=$_COOKIE[app_remember_user];?>">
						<span class="focus-input100" data-placeholder="ชื่อผู้ใช้งาน"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass" onclick="seePassword();">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100 <?=$hasval_ps;?>" type="password" name="real_password" id="real-password" autocomplete="new-password" required value="<?=$_COOKIE[app_remember_pass];?>">
						<span class="focus-input100" data-placeholder="รหัสผ่าน"></span>
					</div>

					<div class="container-login100-form-btn" style="padding: 0px;">
						<div style="margin-bottom: 10px;width: 100%;">
						<button type="submit" style="display: none;">submit</button>
						<!--<ons-button modifier="large" class="button-margin button button--large pd-min" onclick="$('#form_login').submit();">เข้าสู่ระบบss</ons-button>-->
						<ons-button modifier="large" class="button-margin button button--large pd-min" onclick="submitLogin();">เข้าสู่ระบบ</ons-button>
						</div>
						<div style="width: 100%;">
						<ons-button modifier="large" onclick="fn.pushPage({'id': 'singup.html', 'title': 'สมัครสมาชิก'});" class="button-margin button button--large pd-min" style="background-color: #F7941D;">สมัครสมาชิก</ons-button>
						</div>
					</div>
					
					<div class="text-center bottom-txt">
						<span class="txt1">
							ลืมรหัสผ่านหรือไม่?
						</span>

						<a class="txt2 link-txt" onclick="fn.pushPage({'id': 'recovery.html', 'title': 'กู้หรัสผ่าน'}, 'lift-ios')">
							กู้รหัส
						</a>
						<!--<a class="txt2 link-txt" onclick="ons.notification.alert({message: 'ยังไม่เปิดให้บริการ',title:'ขออภัย',buttonLabel:'ปิด'});">
							กู้รหัส
						</a>-->
					</div>
				</form>
			</div>
		</div>
	</div>
	</ons-page>
	</template>
	
	<template id="singup.html">
  	<ons-page id="singup" style="overflow-x: hidden;">
    <ons-toolbar>
      <div class="left"><ons-back-button>กลับ</ons-back-button></div>
      <div class="center" id="page_singup">สมัครสมาชิก</div>
    </ons-toolbar>
	  <div id="body_page_singup">
	  	<?php include("singup.php"); ?>
	  </div>
  	</ons-page>
	</template>

	
	<template id="submit-alert-dialog.html">
	  <ons-alert-dialog id="submit-my-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="submit-dialog-title">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการยืนยันการสมัคร
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="hideAlertDialog()">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="submitSingUp()">บันทึก</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
	
	<template id="recovery-dialog.html">
	  <ons-alert-dialog id="submit-recovery-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="submit-dialog-title-rcv">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการส่งข้อมูลนี้
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="$('#submit-recovery-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="submitRecovery()">บันทึก</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
		
	<ons-modal direction="up">
	  <div style="text-align: center">
	    <p style="color: #fff;">
	      <ons-icon icon="md-spinner" size="28px" spin></ons-icon> Loading...
	    </p>
	  </div>
	</ons-modal>

	<template id="recovery.html">
	  <ons-page>
	    <ons-toolbar>
	      <div class="left">
	        <ons-back-button>กลับ</ons-back-button>
	      </div>
	      <div class="center"></div>
	    </ons-toolbar>
	    <div>
	      	<? include("recovery.php"); ?>
	    </div>
	    <script>
	      ons.getScriptPage().onInit = function () {
	        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
	      }
	    </script>
	  </ons-page>
</template>

<template id="option.html">
	  <ons-page>
	    <ons-toolbar>
	      <div class="left">
	        <ons-back-button class="option-back">กลับ</ons-back-button>
	      </div>
	      <div class="center"></div>
	    </ons-toolbar>
	    <div id="body_option">
	    	
	    </div>
	    <script>
	      ons.getScriptPage().onInit = function () {
	        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
	      }
	    </script>
	  </ons-page>
</template>
	
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="../plugin/cropit/dist/jquery.cropit.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../../pickerdate/classic.css?v=<?=time();?>" />
<link rel="stylesheet" type="text/css" href="../../pickerdate/classic.date.css?v=<?=time();?>" />
<script src="../../pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
<script src="../../pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script> 
	<script>
		function showModal() {
//		  hideAlertDialog();
		  var modal = document.querySelector('ons-modal');
		  modal.show();
		  setTimeout(function() {
		  	ons.notification.alert('This dialog was created with ons.notification');
			
		    modal.hide();
		  }, 2000);
		}

		var createAlertDialog = function() {
			var imageData = $('.image-editor').cropit('export');
			$('.hidden-image-data').val(imageData);
		  	if($('input[name="name_th"]').val()==""){

				 ons.notification.alert({message: 'กรุณากรอกชื่อจริง',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				    $('input[name="name_th"]').focus();
				  });
				
				return false;
			}
			if($('input[name="nickname"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกชื่อเล่น',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				    $('input[name="nickname"]').focus();
				  });
				return false;
			}
			if($('input[name="address"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกที่อยู่ของคุณ',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				    $('input[name="address"]').focus();
				  });
				return false;
			}
			if($('input[name="phone"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกเบอร์โทรศัพท์',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				    $('input[name="phone"]').focus();
				  });
				return false;
			}
			if($('#valid_type_plate').val()==1){

				ons.notification.alert({message: 'ทะเบียนรถนี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				    $('input[name="plate_num"]').focus();
				  });
				return false;
			}
			if($('#valid_type_phone').val()==1){

				ons.notification.alert({message: 'เบอร์โทรนี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				    $('input[name="plate_num"]').focus();
				  });
				return false;
			}
			if($('#phone_em').val()==""){

				ons.notification.alert({message: 'กรุณากรอกเบอร์โทรศัพท์ฉุกเฉิน',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				    $('input[name="plate_num"]').focus();
				  });
				return false;
			}
			if($('input[name="image-data"]').val()==""){

				ons.notification.alert({message: 'กรุณาเลือกรูปประจำตัวของคุณ',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				    $('input[name="image-data"]').focus();
				  });
				return false;
			}
			/*if($('input[name="idcard"]').val()==""){
				ons.notification.alert({message: 'กรุณากรอกเลขบัตรประจำตัวประชาชน',title:"ผิดพลาด"});
				return false;
			}else{
				
			}	*/
			if($('#valid_type_idc').val()==1){
					ons.notification.alert({message: 'เลขบัตรประชาชนของคุณไม่ถูกต้อง',title:"ผิดพลาด",buttonLabel:"ปิด"});
					return false;
				}
			else if($('#valid_type_idc').val()==2){

					ons.notification.alert({message: 'เลขบัตรประชาชนของคุณถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ผิดพลาด",buttonLabel:"ปิด"});
					return false;
				}
		  var dialog = document.getElementById('submit-my-alert-dialog');

		  if (dialog) {
		    dialog.show();
		  } else {
		    ons.createElement('submit-alert-dialog.html', { append: true })
		      .then(function(dialog) {
		        dialog.show();
		      });
		  }
		};

		var hideAlertDialog = function() {
		  document
		    .getElementById('submit-my-alert-dialog')
		    .hide();
		};
		
		/*var hideRecoveryDialog = function() {
			console.log("close recovery dialog")
		  document
		    .getElementById('submit-recovery-dialog')
		    .hide();
		};*/
		
		var submitRecoveryPassword = function(){
			  var dialog_rcv = document.getElementById('submit-recovery-dialog');
			  if($('#check_type_rcp').val()<0){
			  	 ons.notification.alert({message: 'กรุณาเลือกช่องทางการรับรหัสผ่าน',title:"ข้อมูลไม่ครบ",buttonLabel:"ปิด"})
				  .then(function() {
				   
				  });
				  return;
			  }
			  if (dialog_rcv) {
			    dialog_rcv.show();
			  } else {
			    ons.createElement('recovery-dialog.html', { append: true })
			      .then(function(dialog_rcv) {
			        dialog_rcv.show();
			      });
			  }
		};

		function submitRecovery(){
			modal.show();
			$('#submit-recovery-dialog').hide();
			var check_type_rcv = $('#check_type_rcp').val();
			var username = $('#username_for_rcv').val();
			var us_phone = $('#us_phone').val();
			console.log(check_type_rcv);
			var pos = { username:username };
			$.ajax({
	            url: "../../mod/material/php_center.php?query=user_data", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            data: pos,
	            type: 'post',
	            success: function(php_script_response) {
//	               console.log(php_script_response);
					var message = "รหัสผ่านของคุณคือ "+php_script_response.password;
				    if(check_type_rcv==0){
						var param = {
							username : "0954293062",
							password : "758837",
							msisdn : us_phone,
							message : message,
							sender : "TShare(ทีแชร์)",
							ScheduledDelivery : "",
							force : "standard"
						};
						console.log(param);
						$.ajax({
					            url: "../../../sms/send_sms.php", // point to server-side PHP script 
					            dataType: 'json', // what to expect back from the PHP script, if anything
					            data: param,
					            type: 'post',
					            success: function(response) {
					            	console.log(response);
					            	modal.hide();
					            	ons.notification.alert({message: 'ส่ง SMS รหัสผ่านไปยังเบอร์โทรของคุณแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
									  .then(function() {
									   
									  });
					            }
					        });
					}else if(check_type_rcv==1){
						var us_email = $('#us_email').val();
						var param = {
							email : us_email,
							message : message
						};
						console.log(param);
						/*$.ajax({
					            url: "../../mail_recovery_pass.php", // point to server-side PHP script 
					            dataType: 'json', // what to expect back from the PHP script, if anything
					            data: param,
					            type: 'post',
					            success: function(response) {
					            	console.log(response);
					            	modal.hide();
					            	ons.notification.alert({message: 'ส่งรหัสผ่านไปยังที่อยุ่ Email ของคุณแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
									  .then(function() {
									   		
									  });
					            }
					        });*/
					        
					     $.post("../../mail_recovery_pass.php",param,function(res){
					     		console.log(res);
					     		modal.hide();
					            	ons.notification.alert({message: 'ส่งรหัสผ่านไปยังที่อยุ่ Email ของคุณแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
									  .then(function() {
									   		
									  });
					     });   
					}
	            },
		        error: function(err){
		        	console.log(err);
		                //your code here
		        }
	        });
			console.log(username);
		}
		
		function getPhoneByUser(val){
			var pos = { username:val };
			$.ajax({
					url: "../../mod/material/php_center.php?query=user_data_recovery", // point to server-side PHP script 
					dataType: 'json', // what to expect back from the PHP script, if anything
					data: pos,
					type: 'post',
					success: function(response) {
					         console.log(response);
					         if(response!=false){
							 	$('#corrent-user').show();
							 }else{
							 	$('#corrent-user').hide();
							 }
					         $('#us_phone').val(response.phone);
					         $('#txt_phone_show').text(response.phone);
					         
					         $('#us_email').val(response.email);
					         $('#txt_email_show').text(response.email);
						}
					});
		}
	</script>
	
	<script>
	var modal = document.querySelector('ons-modal');	
	window.fn = {};
		
	window.fn.pushPage = function (page, anim) {

		console.log(page)
		if(page.id=="singup.html"){
			randerSingUp();
		}else if(page.id=="option.html"){
			console.log("option");
			if(page.open=="car_brand"){
				
				$.ajax({
	            url: "../../mod/material/php_center.php?query=car_brand", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {
	            	var d1 = [],d2 = [];
	            	$.each(res, function( index, value ) {
					  	if(value.popular>0){
							d1.push(value);
						}else{
							d2.push(value);
						}
					});
					var param = { data2 : d2, data1 : d1};
					console.log(param);
	                $.post("car_brand.php",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
				
			}else if(page.open=="car_type"){
				
				$.ajax({
	            url: "../../mod/material/php_center.php?query=car_type", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("car_type.php",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
				
			}else if(page.open=="car_color"){
				$.ajax({
	            url: "../../mod/material/php_center.php?query=car_color", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("car_color.php?plate=0",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}else if(page.open=="plate_color"){
				$.ajax({
	            url: "../../mod/material/php_center.php?query=car_plate", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("car_plate.php",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}else if(page.open=="car_province"){
				$.ajax({
	            url: "../../mod/material/php_center.php?query=data_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("province.php?type=car",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}else if(page.open=="user_province"){
				$.ajax({
	            url: "../../mod/material/php_center.php?query=data_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("province.php?type=user",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
		}
		else if(page.id=="recovery.html"){
			getPhoneByUser($('#username_for_rcv').val());
		}
	  if (anim) {
	    document.getElementById('myNavigator').pushPage(page.id, { data: { title: page.title }, animation: anim });
	    
	  } else {
	    document.getElementById('myNavigator').pushPage(page.id, { data: { title: page.title } });
	  }
	};

	function submitLogin(){
		modal.show();
		console.log("login action");
		var data = new FormData($('#form_login')[0]);
		 console.log(data);
		  var url_login = "../../mod/material/php_center.php?checking=login";
			  $.ajax({
	            url: url_login, // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            cache: false,
	            contentType: false,
	            processData: false,
	            data: data,
	            type: 'post',
	            success: function(res) {
	               console.log(res);
	             	if(res.check==1){
						 var url = "../../index.php?check_new_user";
						 console.log(url);
						 setCookie("detect_username" ,res.data.user, 10);
						 setCookie("detect_user" ,res.data.id, 10);
						 setCookie("detect_userclass", res.data.class_user, 10);
						 setCookie("app_remember_user", res.data.user, 10);
						 setCookie("app_remember_pass", res.data.pass, 10);
 						 window.location.href = url; 
					}else{
						modal.hide();
						ons
					   		.notification.alert({message: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',title:"ไม่สามารถเข้าสู่ระบบได้",buttonLabel:"ปิด"});
					    modal.hide();
					}
	            }
	        });
	}
	
	$(document).ready(function(){
	
	$( "#form_login" ).submit(function( event ) {
//		alert(123);
		  submitLogin();
		  event.preventDefault();
		});
		
	});
	
	var ck_see_pass = false;
	
	function seePassword(){
		if(ck_see_pass==false){
			$('#real-password').attr('type','text');
			$('.zmdi').removeClass('zmdi-eye');
			$('.zmdi').addClass('zmdi-eye-off');
			ck_see_pass = true;
		}else{
			$('#real-password').attr('type','password');
			$('.zmdi').addClass('zmdi-eye');
			$('.zmdi').removeClass('zmdi-eye-off');
			ck_see_pass = false;
		}
	}
	
	function checkIdCard(val){
		if(val.length==0){
			$('#valid_type_idc').val(0);
		}
		if(val.length>13){
			$('#idcard').val(val.slice(0,-1));
			return;
		}
		$('.checking').hide();
		console.log(val.length)
		if(val.length>=13){
			var check_corrent = checkID(val);
//			console.log(check_corrent);
			if(check_corrent==true){
				$.post("../../mod/material/php_center.php?checking=idcard_overlap",{ txt:val  },function(res){
					console.log(res);
					if(res.check == 1){
//						alert(res)
						$('#incorrent-idc').show();
						$('#corrent-idc').hide();
						$('#valid_type_idc').val(2);
					}else{
						
						$('#corrent-idc').show();
						$('#incorrent-idc').hide();
						$('#valid_type_idc').val(0);
					}
				});
			}else{
				$('#incorrent-idc').show();
				$('#corrent-idc').hide();
				$('#valid_type_idc').val(1);
			}
		}
	}
	
	function checkID(id){
		if(id.length != 13) return false;
		for(i=0, sum=0; i < 12; i++)
		sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		return false; return true;
	}

	function getLocation() {
	    if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } else {
	       console.log("Geolocation is not supported by this browser.");
	    }
	}
	
	function showPosition(position) {
	    var lat = position.coords.latitude;
	    var lng = position.coords.longitude; 
	    console.log(lat+" "+lng);
	     var url = 'https://maps.google.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=false&language='+lng+'&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
	console.log(url);

	$.post( url, function( data ) {

	   if(data.status=="OVER_QUERY_LIMIT"){
	      console.log('OVER_QUERY_LIMIT');
	   }else{
	      var province = data.results[data.results.length-2].address_components[0].long_name;
	      console.log(province);
	       var url = "../../mod/material/php_center.php?query=get_id_province_only";
		   $.post( url,{txt_pv  :province} ,function( data ) {
				console.log(data);
		      var province = data.id;
		      var area = data.area;
		      var code = data.code;
		      
		      $('#txt-province').text(data.name_th);
		      $('#txt_user_province').text(data.name_th);
		      $('#txt_user_province').css("color","#000");
		      $('#province').val(province);
		      $('#code_privince').val(code);
		   });
	   }
	});
	}
	
	function randerSingUp(){
		
		getLocation();
		/*$.post("../../mod/material/php_center.php?query=data_province",function(data){

			$.each(data, function( index, value ) {
//				console.log(value);
				var option = '<option value="'+value.id+'">'+value.name_th+'</option>';
				$('#choose-province select').append(option);
			});
			
		});*/
		
		$.post("../../mod/material/php_center.php?query=em_person",function(data){

			$.each(data, function( index, value ) {
				
				var option = '<option value="'+value.id+'">'+value.name_th+'</option>';
				$('select[name="em_person"]').append(option);
			});
			
		});
		
	}

	function validEmail(email){
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  console.log(regex.test(email));
	  if(regex.test(email)==true){
	  	$('#incorrent-email').hide();
	  	$('#corrent-email').show();
	  }else{
	  	$('#incorrent-email').show();
	  	$('#corrent-email').hide();
	  }
	}
	
	function testUpload(){
		var imageData = $('.image-editor').cropit('export');
		console.log(imageData);
		$('.hidden-image-data').val(imageData);
		/*var data = new FormData($('#form_singin')[0]);
		data.append('fileUpload', $('#imgInp')[0].files[0]);
		 var url = "../../mod/material/user/php_user.php?action=upload";
		$.ajax({
            url: url, // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(php_script_response) {
               console.log(php_script_response);

            },
	        error: function(err){
	        	console.log(err);
	                //your code here
	        }
        });*/
        $.post("../../mod/material/user/php_user.php?action=upload",$('#form_singin').serialize(),function(res){
        	console.log(res);
        });
        
	}
	
	function submitSingUp(){	
		hideAlertDialog();	
		modal.show();
		
		var data = new FormData($('#form_singin')[0]);
		 data.append('fileUpload', $('#img_profile')[0].files[0]);
		var url = "../../mod/material/user/php_user.php?action=register";
		
		$.ajax({
            url: url, // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(php_script_response) {
               console.log(php_script_response);
               if(php_script_response.add.result==true){

               		ons
					  .notification.alert({message: 'สมัครสมาชิกสำเร็จแล้ว',title:"สำเร็จ",buttonLabel:"กดเพื่อเข้าสู่ระบบ"})
					  .then(function() {
					    	modal.show();
					    	var data_login = {
								real_username : php_script_response.update.username,
								real_password : php_script_response.update.password
							};
					    	var url_login = "../../mod/material/php_center.php?checking=login";
					    	
					    	$.post('../../mail.php?key=new_driver&driver='+php_script_response.last_id,function(data){
		   						console.log(data);
		   					
					    	setTimeout(function(){ 
							  $.ajax({
					            url: url_login, // point to server-side PHP script 
					            dataType: 'json', // what to expect back from the PHP script, if anything
					            data: data_login,
					            type: 'post',
					            success: function(res) {
					               console.log(res);
					             	if(res.check==1){
										modal.show();
										 var url = "../../index.php?check_new_user="+php_script_response.last_id;
										 console.log(url);
										 setCookie("detect_username" ,res.data.user, 10);
										 setCookie("detect_user" ,res.data.id, 10);
										 setCookie("detect_userclass", res.data.class_user, 10);
										 setCookie("app_remember_user", res.data.user, 10);
										 setCookie("app_remember_pass", res.data.pass, 10);
				 						 window.location.href = url; 
										}
					            	}
					        	});
					        }, 500);
							
							});
					  });
		    		modal.hide();
			   }else{
			   		ons
					  .notification.alert({message: 'ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง',title:"ผิดพลาด",buttonLabel:"ปิด"});
					  modal.hide();
			   }
            },
	        error: function(err){
	        	console.log(err);
	                //your code here
	        }
        });
	}
	
</script>
	<script>
	function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
       user = prompt("Please enter your name:","");
       if (user != "" && user != null) {
           setCookie("username", user, 30);
       }
    }
}

function validPlate(value){
		console.log(value)
		$.post("../../mod/material/php_center.php?checking=car_plate_overlap",{ txt:value  },function(res){
					console.log(res);
				 if(res.check == 1){
						$('#incorrent-plate').show();
						$('#corrent-plate').hide();
					}else{
						
						$('#corrent-plate').show();
						$('#incorrent-plate').hide();
					}
					$('#valid_type_plate').val(res.check); // 0=ไม่ซ้ำ , 1=ซ้ำ
				});
			
}

function validPhoneNum(value){
		console.log(value)
		$.post("../../mod/material/php_center.php?checking=phone_overlap",{ txt:value  },function(res){
					console.log(res);
				 if(res.check == 1){
						$('#incorrent-phone').show();
						$('#corrent-phone').hide();
					}else{
						
						$('#corrent-phone').show();
						$('#incorrent-phone').hide();
					}
					$('#valid_type_phone').val(res.check); // 0=ไม่ซ้ำ , 1=ซ้ำ
				});
			
}

function selectCarBrand(id,ps){
	var name = $('#item_car_brand_'+id).data('name');
	console.log(name+" "+id);

	$('#car_brand').val(id);
	$('#car_brand_txt').val(name);
	$('#txt_car_brand').text(name);
	$('ons-back-button').click();
	$('#img_car_brand_show').show();
	$('#img_car_brand_show').css('background-position',ps);

}

function selectCarType(id){
	var name = $('#item_car_type_'+id).data('name');
	console.log(name+" "+id);

	$('#car_type').val(id);
	$('#txt_car_type').text(name);
	$('ons-back-button').click();
}

function selectCarProvince(id){
	var name = $('#item_car_province_'+id).data('name');
	console.log(name+" "+id);
	
	$('#car_province').val(id);
	$('#txt_car_province').text(name);
	$('ons-back-button').click();
}

function selectUserProvince(id,code){
	var name = $('#item_user_province_'+id).data('name');
	console.log(name+" "+id+" || "+code);
	
	$('#province').val(id);
	$('#txt_user_province').text(name);
	$('#code_privince').val(code);
	$('ons-back-button').click();
}

function selectCarColor(id,val){
	console.log(id+" "+val);
	var img = $('#item_car_color_'+id).data('img');
	$('#img_car_color_show').attr('src',"../img/"+img);
	
	$('#car_color').val(id);
	$('#car_color_txt').val(val);
	$('#txt_car_color').text(val);
	$('#img_car_color_show').show();
	$('ons-back-button').click();
}

function selectPlateColor(id,val){
	console.log(id+" "+val);
	var img = $('#item_car_plate_'+id).data('img');
	$('#img_plate_color_show').attr('src',"../img/plate/"+img);
	
	$('#plate_color').val(id);
	$('#i_plate_color').val(val);
	$('#txt_plate_color').text(val);
	$('#img_plate_color_show').show();
	$('ons-back-button').click();
}

function performClick(elemId) {
	console.log(elemId);
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
      var evt = document.createEvent("MouseEvents");
      evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
   }
}

/*document.querySelector('ons-back-button').onClick = function(event) {
  // Reset the whole stack instead of popping 1 page
  document.querySelector('ons-navigator').resetToPage('home.html');
};*/

</script>
</body>
</html>