<div id="register_social" style="    position: fixed;
    padding: 0px;
    margin-top: 0px;
    animation: showSweetAlert 0.3s;
    overflow-y: scroll;
    position: fixed;
    left: 0px;
    top: 0px;
    bottom: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    overflow: auto;
    padding: 0px;
    background-color: #FFFFFF;
    padding: 10px;">
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  

   
 <section style="position: relative; min-height: 100vh;">    
    <div class="header " data-parallax="true" >
        <nav class="navbar  navbar-color-on-scroll" id="sectionsNav">
            <div class="container" >
                <div class="navbar-header">
                   <!-- <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>-->
                    <i class="material-icons" id="iconhome" style="position: absolute; font-size: 30px; right: 20px; margin-top: 8px; color: #fff;">home</i> 
                </div>            
            </div>
        </nav>
        <div class="box-menu-select">
    <table width="100%">
        <tr>
            <td width="20%" style="">
                <div class="btn-realtime" >
                    <table width="100%">
                        <tr>
                            <td align="center">
                                <i class="material-icons" style="font-size: 30px;">room</i>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <span class="lng-now-use" style="font-size: 13px;"></span>
                            </td>
                        </tr>
                    </table>
                   
                </div>
            </td>
            <td width="20%" style="">
                <div class="btn-reservation" >
                <table width="100%">
                        <tr>
                            <td align="center">
                                <i class="material-icons" style="font-size: 30px;" style="">search</i>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <span class="lng-advance-use" style="font-size: 13px;"></span>
                            </td>
                        </tr>
                    </table>
                   
                   
                </div>
            </td>
            <td width="20%" style="">
                <div class="btn-car-service" >
                <table width="100%">
                        <tr>
                            <td align="center">
                            <i class="material-icons" id="car-service" style="font-size: 30px;">directions_car</i>
                         
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                            <span class="lng-car-service" style="font-size: 13px; ">Car service</span>
                            </td>
                        </tr>
                    </table>
                   
                   
                </div>
            </td>
            <td width="20%" >
                <div class="btn-management" >
                    <table width="100%">
                        <tr>
                            <td align="center">
                         
                                
                                <i class="material-icons" style="font-size: 30px;">dvr</i>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <span class="lng-management" style="font-size: 13px; ">Management</span>
                            </td>
                        </tr>
                    </table>
                </div> 
            </td>
        </tr>
    </table>
 </div>
    </div>
   
    <div class="container">
        <div class="col-md-6" id="box-left" >
            <div class="box-signup" style="display: none;">
                <div id="section_title" class="section_title">
                    <h3 id="title-regis" class="lng-sign-create"></h3>                
                    <h4 style="font-size: 14px;" class="lng-what-is-your-email"></h4>
                </div>
                <div class="row">
                    <div class="col-sm-8 " style="padding:0;    margin-top: 20px;">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <!-- <button class="btn btn-warning btn-sm" id="checkmail" style="position: absolute; right: 0; z-index: 100;  margin-top: 2px; padding: 5px 10px;border-radius: 15px;">
                                    <span class="lng-check"></span>
                                </button> -->
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"> 
                                        <span class="lng-email"></span> 
                               
                                    </label>
                                    <input name="firstname" required="True" type="email" class="form-control" id="username-signup">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" style="padding-top: 0">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"><span class="lng-password"></span>
                                        <!-- <small>(required)</small> -->
                                    </label>
                                    <input name="lastname" type="password" class="form-control" id="password-signup">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="lng_email_have" style="text-align: center;color:red;display: none;"></div>
                            <div class="lng_email_available"  style="text-align: center;color:#2c9930;display: none;"></div>
                            


                            </div>
                           
                            <div class="col-md-12">
                                <div class="btn-signup" style="" id="registered" ><span class="lng-sign-in"></span></div>
                            </div>
                            <div class="col2">
                                <div class="col-sign">
                                    <div class="text-sign" >
                                        <span class="lng-have-member"></span>
                                        <a class="mtm sign-up" id="sign-in" style="cursor: pointer;">
                                            <span class="lng-registered-customers"></span>
                                        </a>
                                    </div>
                                    <div id="status"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-signin">
                    <div class="card-header text-center" data-background-color="green">
                        <h4 class="card-title" style="margin-bottom: 20px;" >
                            <span class="lng-login"></span>
                        </h4>                                       
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-sm-8 " style="padding: 0" >
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label"><span class="lng-email"> </span>
                                                
                                            </label>
                                            <input  required="True" type="email"  class="form-control" id="username" size="80">
                                        </div>
                                    </div>                                       
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label"><span class="lng-password"></span></label>
                                            <input type="password" class="form-control" id="password" >
                                        </div>
                                    </div>
                                    <div id="message" style="text-align: center;"></div>
                                </div>
                                <div class="col-md-12">
                                    <div  type="submit" class=" btn-login " id="login" style="">
                                        <span class="lng-login"> </span>
                                    </div>
                                </div>
                                        
                                <div class="col2">
                                    <div class="text-sign" >
                                        <span class="lng-not-member"></span>
                                        <a class="sign-up" id="sign-up" style="cursor: pointer;" >
                                            <span class="lng-sign-up-now"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>

            <div class="col-md-6" style="margin-bottom: 62px;">
                <div class="box-regispro" style="display: none;">
                    <h3 id="title-info" class="lng-why-become"></h3>
                    <div class="special">
                        <div class="box-icon">
                            <i class="fa fa-tags" style="font-size: 30px;"></i>
                        </div>
                        <h4 class="lng-special-product"></h4>
                        <p class="lng_get_lower_price">You'll get lower price for every Product booking, as a member.</p>
                    </div>
                    <div class="exclusive">
                        <div class="box-icon">
                            <i class="fa fa-user-md" aria-hidden="true" style="font-size: 30px;"></i>
                        </div>               
                        <h4 class="lng-exclusive-discount"></h4>
                        <p class="lng_get_latest_promo">You'll get the latest promo info and special member discount.</p>
                    </div>
                    <div class="fast">
                        <div class="box-icon">
                            <i class="fa fa-gavel" aria-hidden="true" id="special" style="font-size: 30px;"></i>
                        </div>              
                        <h4 class="lng-fast-booking"></h4>
                        <p class="lng_member_using">As a member using Go HolidayQuick, your booking is our priority.</p>
                    </div>
                </div>
                
                <div class="log-social box-signin">
                    <div class="unit social-column">
                        <div class="social-inner">
                            <div class="fb-wrapper">
                                <a id="facebook-login-button"  class="fb-auth inner facebook-login-auth" scope="public_profile,email" onclick="login();" return false>
                                    <!-- <i class=" fa fa-facebook-official " style="font-size: 36px; position: absolute; left: 16px;"></i> -->
                                    <div class=" pull-left" style=" position: absolute; left: 20px; width: 35px; height: 35px; color: #fff; border-radius: 50%; background: #3b5998;">
                                                <i class="fa fa-facebook"> </i>
                                    </div>
                                    <span>Facebook</span>
                                </a>
                            </div>
                           
                            <div class="google-wrapper">
								  <div id="gSignInWrapper">
								    <!--<span class="label">Sign in with:</span>-->
								    <div id="customBtn" class="google-auth inner google-login-auth">
                                    <div class="" style="position: absolute; left: 20px; width: 35px; height: 35px; color: #fff; border-radius: 50%; background: #dd4b39;">
                                                <i class="fa fa-google"> </i>
                                    </div>
								      <!-- <i class="fa fa-google-plus-square" style="font-size: 36px; position: absolute; left: 16px;"></i> -->
								      <span >Google</span>
								    </div>
								  </div>
                               <!-- <div>
                                    <a id="google-login-button"  class="google-auth inner google-login-auth" >
                                        <i class="fa fa-google-plus-square" style="font-size: 36px; position: absolute; left: 16px;"></i>
                                        <span>Google</span>
                                    </a>
                                </div>-->
                            </div>
                            <div style="margin-top: 30px;">
                                <div class=" btn-foget-pass " id="foget-pass" style="">
                                    <span class="lng-foget-pass">  ลืมรหัสผ่าน</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div id="foget-password">
            <div class="box-in-foget" >
            <div style="background: #3b5998; color: #fff; padding: 18px; text-align: center; font-size: 19px;   margin-bottom: 10px;">
               
                    <span style="text-align: center;" class="lng-foget-pass">ลืมรหัสผ่าน </span>
                    <i class="material-icons btn-close">close</i>
               
                            
            </div>
                <div style="padding: 12px;">
                   <div class="col-md-12" id="forget"> 
                       
                        <div style="margin-top: 50px; font-size: 15px; color: #333333;margin-bottom: 10px;">
                            <span class="lng-please-input-email">Please input your email </span>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">face</i>
                            </span>   
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"><span class="lng-email"></span></label>
                                <input type="email" class="form-control" id="email-forget" size="80">
                                <span class="material-input"></span>
                                
                                
                            </div>  
                            <div  class="btn-send lng-send" style="padding: 12px 20px;" ></div>   
                        </div>
                    </div>
                    <div id="check-email" style="text-align:center;display:none;margin-top: 50px; font-size: 15px; color: #333333;  margin-bottom: 10px;">
                        <span>Please check your email </span>
                    </div>
                    
                </div>
            </div>
        </div>
</section>
       
    </div>
                

    <!--   Core JS Files   -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.min.js" type="text/javascript"></script> -->
    

<script>
$(document).ready(function(){
	
/*	<?php
	session_start();
	?>
	var data = '<?=$_SESSION["data"];?>';
	var from = '<?=$_SESSION["from"];?>';
	var to = '<?=$_SESSION["to"];?>';
	var lat_f = '<?=$_SESSION["lat_f"];?>';
	var lng_f = '<?=$_SESSION["lng_fto"];?>';
	var lat_t = '<?=$_SESSION["lat_t"];?>';
	var lng_t = '<?=$_SESSION["lng_t"];?>';
	var book = '<?=$_SESSION["book"];?>';
	
	console.log('ValueSession : '+data+' '+from+' '+to);*/
	
    var username, password , username_signup ,password_signup,text_check,forget = '';
    var base_url = "https://www.welovetaxi.com/app/booking2/";
   
$.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>getuserlog_control/process',
       // data: {'from': getParameterByName('from'),'to': getParameterByName('to')},
        //contentType: "application/json",
        dataType: 'json',
        success: function(data) { 
        //   console.log(data)
        }
    });
    $('#username').on('change', function() {
        username = this.value ;
        console.log(username)
    })
    $('#password').on('change', function() {
        password = this.value ;
        console.log(password)
    })
    $('.btn-foget-pass').on('click', function() {
        $('#foget-password').fadeIn(500)
    });
    $('.btn-close').on('click', function() {
        $('#foget-password').fadeOut(500)
    });
    $('.btn-realtime').click(function() {
        $('#loading').css('display', 'block');
        setTimeout(function() {
            console.log("aaaaa")
            $('#loading').css('display', 'none');
            window.location.href = base_url + "?section=realtime";
        }, 3000);
    })
    $('.btn-reservation').click(function() {
        $('#loading').css('display', 'block');
        setTimeout(function() {
            console.log("aaaaa")
            $('#loading').css('display', 'none');
            window.location.href = base_url + "?section=reservation";
        }, 3000);
    })
    $('.btn-car-service').click(function() {
        $('#loading').css('display', 'block');
        setTimeout(function() {
            console.log("aaaaa")
            $('#loading').css('display', 'none');
            window.location.href = base_url + "?section=service";
        }, 3000);
    })
    $('.btn-management').click(function() {
        $('#loading').css('display', 'block');
        setTimeout(function() {
            console.log("aaaaa")
            $('#loading').css('display', 'none');
            window.location.href = base_url + "dashboard/view_user";
        }, 3000);
    })
    $('.btn-send').on('click', function() {
       forget = $('#email-forget').val();
        console.log(forget)
        
        if(forget != ''){
            $.ajax({
            type: 'POST',
            url: base_url+'fogetpassword.php',
            data: { 'mail': forget },
            //contentType: "application/json",
            //dataType: 'json',
            success: function(data) {
            console.log(data);
            //console.log(s_email);
            $('#forget').hide();
            $('.btn-close').hide();
            $('.btn-login-forget').show();
            $('#check-email').show();
            }
        });
        }
    });
    $('.btn-login-forget').on('click', function() {
       // $('#foget-password').fadeOut(500)
        window.location.reload();
    });    	
    $('#login').on('click', function() {
        var type_login = $('#by').val();
    	var param_data = $('#data').val();
    	var param_from = $('#from').val();
    	var param_to = $('#to').val();
    	var lat_f = $('#lat_f').val();
    	var lng_f = $('#lng_f').val();
    	var lat_t = $('#lat_t').val();
    	var lng_t = $('#lng_t').val();
    	var book = $('#book').val();
//    	alert(type_login);
       console.log(password+username);
//    alert('<?php echo base_url(); ?>login_control/process');
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>login_control/process',
        data: {'username': username,'password':password},
        //contentType: "application/json",
        dataType: 'json',
        success: function(res) { 
          console.log(res)
          if(res.status == 0)
              {
                 console.log('login status 0');
                 $.cookie("login",res.username);
                 console.log('<?php echo base_url(); ?>');
                 if(type_login=='dasboard'){
				 	window.location.href = "<?php echo base_url(); ?>dashboard/view_user";
				 }else if(type_login=='book'){
//						alert(param_data+" "+param_from+" "+param_to);
				 	window.location.href = "<?php echo base_url(); ?>book?data="+param_data+"&from="+param_from+"&to="+param_to+"&lat_f="+lat_f+"&lng_f="+lng_f+"&lat_t="+lat_t+"&lng_t="+lng_t+"&book="+book;
					
				 }else{
				 	window.location.href = "<?php echo base_url(); ?>";
				 }
              }
              else if(res.status==1)
              {
                console.log('status==1')
               $('#message').html('Username is Invalid').css('color', 'red');
              }
              else if(res.status==2)
              {
                  console.log('status==2')
                $('#message').html('Password is Invalid').css('color', 'red');
              }
        }
    });
       
    //alert( this.value );
    })
    $('#iconhome').click(function() {
        $('#loading').css('display', 'block');
        setTimeout(function() {
            $('.btn-management').css('color', '#07c284');
            $('.btn-home').css('color', '#999999');
            $('.btn-reservation').css('color', '#999999');
            $('.btn-realtime').css('color', '#999999');
           // $('#loading').css('display', 'none');
            window.location.href = base_url+"";
        }, 2000);
    });
    $('.iconhome').click(function() {
        $('#loading').css('display', 'block');
        setTimeout(function() {
            $('.btn-management').css('color', '#07c284');
            $('.btn-home').css('color', '#999999');
            $('.btn-reservation').css('color', '#999999');
            $('.btn-realtime').css('color', '#999999');
            $('#loading').css('display', 'none');
            window.location.href = base_url+"";
        }, 2000);
    });
    $('#username-signup').on('change', function() {
        username_signup = this.value ;
        console.log(username_signup) 
    })
    $('#password-signup').on('change', function() {
        password_signup = this.value ;
        console.log(password_signup)
    })
    $('#checkmail').on('click', function() {
        console.log('in case')
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>login_control/checkmail',
        data: {'username': username_signup,'password':password_signup},
        //contentType: "application/json",
        dataType: 'json',
        success: function(res) { 
          console.log(res)
          if(res.status == 0)
              { //have mail
                text_check = 0; 
               $('#messagecheck').html('Have this mail in system').css('color', 'red');
              }
              else if(res.status==1)
              {
                text_check = 1; 
                $('#messagecheck').html('This mail is available.').css('color', '#2c9930');
                console.log('status==1')
              }
        }
        });
    
    });
    
     $('#registered').on('click', function() {
        console.log('in case signup')
        console.log(text_check)
        //if (text_check == 1) {
            $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>login_control/signup',
            data: {'username': username_signup,'password':password_signup},
            //contentType: "application/json",
            dataType: 'json',
            success: function(res) { 
                console.log(res)
                if(res.status == 0){
                    $.cookie("login",res.username);
                    $('.lng_email_available').show()
                    $('.lng_email_have').hide()
                    window.location.href = "<?php echo base_url(); ?>home";
                }
                else{
                    $('.lng_email_available').hide()                    
                    $('.lng_email_have').show()
                }                
            }
        });
    
    });
});//END
function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
window.fbAsyncInit = function() {
    FB.init({
      appId      : '1865903040340223',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();   
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
    function login(){        
   FB.login(function (response) { statusChangeCallback(response); }, { scope: 'email,public_profile', return_scopes: true });
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      checkLoginState();
    } else {
    }
  }
  function checkLoginState() {
  	var type_login = $('#by').val();
    	var param_data = $('#data').val();
    	var param_from = $('#from').val();
        var param_to = $('#to').val();
        var lat_f = $('#lat_f').val();
    	var lng_f = $('#lng_f').val();
    	var lat_t = $('#lat_t').val();
    	var lng_t = $('#lng_t').val();
    	var book = $('#book').val();
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me',{fields:'name,email,picture'}, function(response) {
        console.log(response)
        console.log(response.picture.data.url)
        //console.log(response.getImageUrl())
        // $.cookie("idface", response.id);
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>login_control/processsocial',
        data: {'username': response.email,'name':response.name,'password':response.id,'type':'facebook','img':response.picture.data.url},
        //contentType: "application/json; application/x-www-form-urlencoded; charset=UTF-8",
        dataType: 'json',
        success: function(res) { 
          console.log(res)
          console.log(res.status)
          if(res.status == 0)
              {
                 $.cookie("login",res.username);
                   /*window.location.href = "<?php echo base_url(); ?>home";   */   
                   if(type_login=='dasboard'){
				 	window.location.href = "<?php echo base_url(); ?>dashboard/view_user";
				 }else if(type_login=='book'){
//						alert(param_data+" "+param_from+" "+param_to);
				 	window.location.href = "<?php echo base_url(); ?>book?data="+param_data+"&from="+param_from+"&to="+param_to + "&lat_f=" + getParameterByName('lat_f')+ "&lng_f=" + getParameterByName('lng_f')+ "&lat_t=" + getParameterByName('lat_t')+ "&lng_t=" + getParameterByName('lng_t') + "&book=" + getParameterByName('book');
					
				 }else{
				 	window.location.href = "<?php echo base_url(); ?>";
				 }   
              }
              else 
              {    
               $('#message').html('Login not complete').css('color', 'red');
              }
        }
    });
    });
  }
    }
  
    $('#sign-up').click(function() {
       $('.box-signup').css('display','block');
       $('.box-regispro').css('display','block');

       $('.box-signin').css('display','none');
       $('.loginReg__or').css('display','none');

    })
    $('#sign-in').click(function() {
       $('.box-signup').css('display','none');
       $('.box-regispro').css('display','none');
       $('.loginReg__or').css('display','block');

       $('.box-signin').css('display','block');
    })
</script>
<script>
/**
* Login with Google Account *
*/
  var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '1057940740113-3suf1lugga5kceuqg3jed67edke0l1dg.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('customBtn'));
    });
  };

  function attachSignin(element) {
    // console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
        /*  document.getElementById('name').innerText = "Signed in: " +
              googleUser.getBasicProfile().getName();*/
               var profile = googleUser.getBasicProfile();
				 /* console.log('ID: ' + profile.getId());
				  console.log('Name: ' + profile.getName());
				  console.log('Image URL: ' + profile.getImageUrl());
				  console.log('Email: ' + profile.getEmail()); */
				  console.log(profile); 
				  var url = '<?php echo base_url(); ?>login_control/processsocial';
//				  alert(url);
				  var type_login = $('#by').val();
                var param_data = $('#data').val();
                var param_from = $('#from').val();
                var param_to = $('#to').val();
                var lat_f = $('#lat_f').val();
                var lng_f = $('#lng_f').val();
                var lat_t = $('#lat_t').val();
                var lng_t = $('#lng_t').val();
                var book = $('#book').val();
				  $.post( url, {'username': profile.getEmail(),'name':profile.getName(),'password':profile.getId(),'type':'google','img':profile.getImageUrl() } ,function( data ) {
//					 	console.log(data);
					 	var obj_c = JSON.parse(data);
					 	console.log(obj_c.status);
					 	console.log(obj_c);
					 	 if(obj_c.status == 0)
				              {
				                 $.cookie("login",obj_c.username);
//				                 $.cookie("logby",'google');
//				                   window.location.href = "<?php echo base_url(); ?>home";    
if(type_login=='dasboard'){
				 	window.location.href = "<?php echo base_url(); ?>dashboard/view_user";
				 }else if(type_login=='book'){
//						alert(param_data+" "+param_from+" "+param_to);
				 	window.location.href = "<?php echo base_url(); ?>book?data="+param_data+"&from="+param_from+"&to="+param_to + "&lat_f=" + getParameterByName('lat_f')+ "&lng_f=" + getParameterByName('lng_f')+ "&lat_t=" + getParameterByName('lat_t')+ "&lng_t=" + getParameterByName('lng_t') + "&book=" + getParameterByName('book');
					
				 }else{
				 	window.location.href = "<?php echo base_url(); ?>";
				 }     
				              }
				              else 
				              {    
                               $('#message').html('Login not complete').css('color', 'red');
                               
				              }
					});      
        }, function(error) {
          		   console.log(JSON.stringify(error, undefined, 2));
        });
  }
  </script>
<script>startApp();</script>
</html>
<style type="text/css">
    


  
</style>