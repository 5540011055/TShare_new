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
<link rel="stylesheet" href="../onsenui/css/onsenui.css">
<link rel="stylesheet" href="../onsenui/css/onsen-css-components.min.css">
<script src="../onsenui/js/onsenui.min.js"></script>
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
		position: absolute;
	    bottom: 20px;
	    width: 100%;
	    left: 0;
	}
	.link-txt{
		color: #0076ff;
		font-weight: 800;
	}
	 @media screen and (max-width: 320px) {
	 	.img-logo{
			width: 100px !important;
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
	?>
<ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>
	
	<template id="page1.html">
	<ons-page id="page1">
	<div class="limiter">
		<div class="container-login100" style="padding: 0; margin: 0px; min-height: 100%;">
			<div class="wrap-login100" style="border-radius: 0px;">
				<form id="form_login" method="post" enctype="multipart/form-data">
			
					<span class="login100-form-title p-b-30 p-t-20">

						<img src="../../images/logo.png" class="img-logo" />
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
						<ons-button modifier="large" class="button-margin button button--large pd-min" onclick="$('#form_login').submit();">เข้าสู่ระบบ</ons-button>
						</div>
						<div style="width: 100%;">
						<ons-button modifier="large" onclick="fn.pushPage({'id': 'singup.html', 'title': 'singup'})" class="button-margin button button--large pd-min" style="background-color: #F7941D;">สมัครสมาชิก</ons-button>
						</div>
					</div>
					<div class="text-center bottom-txt">
						<span class="txt1">
							ลืมรหัสผ่านหรือไม่?
						</span>

						<a class="txt2 link-txt" href="#">
							กู้รหัส
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</ons-page>
	</template>
	
	<template id="singup.html">
  	<ons-page id="singup">
    <ons-toolbar>
      <div class="left"><ons-back-button>กลับ</ons-back-button></div>
      <div class="center" id="page_singup">สมัครสมาชิก</div>
    </ons-toolbar>
	  <div id="body_page_singup">
	  	<? include("singup.php"); ?>
	  </div>
  	</ons-page>
	</template>

	
	<template id="submit-alert-dialog.html">
	  <ons-alert-dialog id="submit-my-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="submit-dialog-title">Alert</div>
	    <div class="alert-dialog-content">
	      This dialog was created from a template
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="hideAlertDialog()">Cancel</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="submitSingUp()">OK</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
	
	<template id="success-alert.html">
	  <ons-alert-dialog id="success-alert-my-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="success-alert-dialog-title">สำเร็จ</div>
	    <div class="alert-dialog-content">
	      This dialog was created from a template
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="hideAlertDialog()" style="display: none;">Cancel</ons-alert-dialog-button>
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

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
	
	<script>
		function showModal() {
		  hideAlertDialog();
		  var modal = document.querySelector('ons-modal');
		  modal.show();
		  setTimeout(function() {
		  	ons.notification.alert('This dialog was created with ons.notification');
			
		    modal.hide();
		  }, 2000);
		}

		  var createAlertDialog = function() {
		  	if($('input[name="name_th"]').val()==""){
				ons.notification.alert({message: 'กรุณาใส่ชื่อจริง (ภาษาไทย)',title:"ผิดพลาด"});
				return false;
			}
			if($('input[name="nickname"]').val()==""){
				ons.notification.alert({message: 'กรุณาใส่ชื่อเล่น',title:"ผิดพลาด"});
				return false;
			}
			if($('input[name="idcard"]').val()==""){
				ons.notification.alert({message: 'กรุณากรอกเลขบัตรประจำตัวประชาชน',title:"ผิดพลาด"});
				return false;
			}else{
				if($('#valid_type_idc').val()==1){
					ons.notification.alert({message: 'เลขบัตรประชาชนของคุณไม่ถูกต้อง',title:"ผิดพลาด"});
					return false;
				}
				else if($('#valid_type_idc').val()==2){

					ons.notification.alert({message: 'เลขบัตรประชาชนของคุณถูกใช้แล้ว กรุณาติดต่อเจ้าหน้าที่ค่ะ',title:"ผิดพลาด"});
					return false;
				}
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
	</script>
	<script>
	var modal = document.querySelector('ons-modal');	
	window.fn = {};
		
	window.fn.pushPage = function (page, anim) {

		console.log(page)
		if(page.id=="singup.html"){
			randerSingUp();
		}
	  if (anim) {
	    document.getElementById('myNavigator').pushPage(page.id, { data: { title: page.title }, animation: anim });
	    
	  } else {
	    document.getElementById('myNavigator').pushPage(page.id, { data: { title: page.title } });
	  }
	};
	$(document).ready(function(){
	
	$( "#form_login" ).submit(function( event ) {
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
	            success: function(php_script_response) {
	               console.log(php_script_response);
	             	if(php_script_response.check==1){
						modal.show();
						 var url = "index.php?check_new_user=<?= $_POST[check_new_user]; ?>";
						 console.log(url);
// 						 window.location.href = url; 
					}
	            }
	        });
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
		      
		      $('#txt-province').text(data.name_th);
		      $('#choose-province select').val(province);
		   });
	   }
	});
	}
	
	function randerSingUp(){
		
		getLocation();
		$.post("../../mod/material/php_center.php?query=data_province",function(data){

			$.each(data, function( index, value ) {
//				console.log(value);
				var option = '<option value="'+value.id+'">'+value.name_th+'</option>';
				$('#choose-province select').append(option);
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

	function readURL(input) {
	  $('#pg_upload_bar').show();
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	    	
	      $('#image_id_driver').attr('src', e.target.result);
	      $('.focus').hide();
	      $('#image_id_driver').fadeIn(500);

	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}

	function submitSingUp(){	
		hideAlertDialog();	

		modal.show();
		var data = new FormData($('#form_singin')[0]);
		 data.append('fileUpload', $('#imgInp')[0].files[0]);
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
               if(php_script_response.result==true){

               		ons
					  .notification.alert({message: 'สมัครสมาชิกสำเร็จแล้ว',title:"สำเร็จ",buttonLabel:"กดเพื่อเข้าสู่ระบบ"})
					  .then(function() {
					    	modal.show();
					  });
		    		modal.hide();
			   }else{
			   		notification.alert({message: 'ไม่สามารถบันทึกข้อมูลได้ กรุณาติดต่อเจ้าหน้าที่ค่ะ',title:"ผิดพลาด",buttonLabel:"ปิด"})
			   }
            }
        });
	}
	
	</script>
</body>
</html>