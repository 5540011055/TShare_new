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
		if($_COOKIE[appdriver_remember_user]){
			$hasval_us = "has-val";
		}else{
			$hasval_us = "";
		}
		
		if($_COOKIE[appdriver_remember_pass]){
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
				<form class="login100-form validate-form" id="form_login"  autocomplete="off">
			
					<span class="login100-form-title p-b-30 p-t-20">

						<img src="../../images/logo.png" class="img-logo" />
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100 <?=$hasval_us;?>" type="text" name="real-username" id="real-username" autocomplete="new-password" required value="<?=$_COOKIE[appdriver_remember_user];?>">
						<span class="focus-input100" data-placeholder="ชื่อผู้ใช้งาน"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass" onclick="seePassword();">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100 <?=$hasval_ps;?>" type="password" name="real-password" id="real-password" autocomplete="new-password" required value="<?=$_COOKIE[appdriver_remember_pass];?>">
						<span class="focus-input100" data-placeholder="รหัสผ่าน"></span>
					</div>

					<div class="container-login100-form-btn" style="padding: 0px;">
						<div style="margin-bottom: 10px;width: 100%;">
						<ons-button modifier="large" onclick="login();" class="button-margin button button--large pd-min">เข้าสู่ระบบ</ons-button>
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
	  <div id="body_page_singup"></div>
  </ons-page>
</template>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
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
		$('#real-username').val('<?=$_COOKIE[appdriver_remember_user];?>');
	window.fn = {};
		
	window.fn.pushPage = function (page, anim) {

		console.log(page)
		if (page.id === 'singup.html') {
           $.post("singup.php", function(res) {
                $('#body_page_singup').html(res);
            });
        }
		
	  if (anim) {
	    document.getElementById('myNavigator').pushPage(page.id, { data: { title: page.title }, animation: anim });
	    
	  } else {
	    document.getElementById('myNavigator').pushPage(page.id, { data: { title: page.title } });
	  }
	};
	
	function login(){
		console.log("login action");
	}
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
		$('.checking').hide();
		console.log(val)
		if(val.length>=13){
			var check_corrent = checkID(val);
			if(check_corrent==true){
				$.post("",function(res){
					
				});
			}else{
				$('#incorrent-idc').show();
			}
		}
	}
	
	function checkID(id)
	{
		if(id.length != 13) return false;
		for(i=0, sum=0; i < 12; i++)
		sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		return false; return true;
	}
	
	getLocation();
	
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
	       var url = "mod/shop/select_province_new.php?op=get_id_province_only";
		   $.post( url,{txt_pv  :province} ,function( data ) {
		      var obj = JSON.parse(data);
		      console.log(obj);
		      var province = obj.id;
		      var area = obj.area;
		      
//		      $('#txt_now_pv').text(obj.name_th);
//		      $('#driver_province').val(province);
		   });
	   }
	});
	}

	
	
	</script>
</body>
</html>