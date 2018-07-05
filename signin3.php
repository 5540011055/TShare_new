<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>T Share</title>
 
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      
      <!-- iCheck -->
      

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <!-- <script src="https://www.welovetaxi.com/app/booking2/files/js/jquery.min.js" type="text/javascript"></script> -->
    <script src="https://www.welovetaxi.com/app/booking2/files/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- <script src="https://www.welovetaxi.com/app/booking2/files/js/material.min.js"></script> -->
    <script src="https://www.welovetaxi.com/app/booking2/files/js/jquery.cookie.js" type="text/javascript"></script>

      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
       <script src="https://apis.google.com/js/platform.js" async defer></script>
       <script src="https://apis.google.com/js/api:client.js"></script>
	  <script>
	  $(document).ready(function(){
	  		console.log('check_browser : <?=$check_lng_browser;?> : <?=$keep;?>');
	  		var check_cook = '<?=$_COOKIE["lng"];?>';

		});	
	  </script>
	  
      <style>
      .btn-lng{
	  	width: 35px !important;
	  	margin-right: 18px;
	  }
	  @media screen and (max-width: 320px) {
		  	.btn-lng{
		  	width: 27px !important;
		  	margin-right: 14px;
		  }
	  }
      .Absolute-Center {
		  /*margin: auto;*/
		  position: absolute;
		  top: 0; left: 0; bottom: 0; right: 0;
		}
       
         .img_logo{
         width: 190px;
         }
         .btn-other{
         width: 250px;
         border-radius : 25px;
         font-size: 20px;
         padding-left: 35px;
         text-align: left;
         }
         }
      </style>
   </head>
   <body >
   
   	
      <table width="100%"  border="0" align="center" cellpadding="2" cellspacing="2" style="max-width:350px; " class="Absolute-Center">
         <tr>
            <td align="center" >
               <div class="login-box" style="margin-top: 15px;">
                  <div class="login-logo"  style="padding:0px; color:#FFFFCC;" >
                    
                     <img src="images/logo.png?v=6" class="img_logo"    style="padding-bottom:0px;margin-top:0px;width: 130px;"      />  


                     <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  

   
 <section >    
    
   
    
        <div class="col-md-12" id="box-left" >
            <div class="box-signup" style="display: none;">
                <div id="section_title" class="section_title">
                    <h3 id="title-regis" class="lng-sign-create"></h3>                
                    <h4 style="font-size: 14px;" class="lng-what-is-your-email"></h4>
                </div>
                <div class="row">
                    <div class="col-sm-6 " style="padding:0;    margin-top: 20px;">
                        <div class="">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <!-- <button class="btn btn-warning btn-sm" id="checkmail" style="position: absolute; right: 0; z-index: 100;  margin-top: 2px; padding: 5px 10px;border-radius: 15px;">
                                    <span class="lng-check"></span>
                                </button> -->
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"> 
                                        <span class="lng-email"></span> 
                               
                                    </label>
                                    <input name="firstname" required="True" type="number" class="form-control" id="username-signup" placeholder="เลขบัตรประจำตัวประชาชน" style="border-radius: 0 25px 25px 0;">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" style="padding-top: 0">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"><span class="lng-password"></span>
                                        <!-- <small>(required)</small> -->
                                    </label>
                                    <input name="lastname" type="password" class="form-control" id="password-signup" placeholder="รหัสผ่าน" style="    border-radius: 0 25px 25px 0;">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="lng_email_have" style="text-align: center;color:red;display: none;"></div>
                            <div class="lng_email_available"  style="text-align: center;color:#2c9930;display: none;"></div>
                            


                            </div>
                           
                            <div class="">
                                <div class="btn-signup" style="" id="registered" ><span class="lng-sign-in">ลงชื่อเข้าใช้</span></div>
                            </div>
                            <div class="col2">
                                <div class="col-sign">
                                    <div class="text-sign" >
                                        <span class="lng-have-member" style="color: #333">มีสมาชิกหรือไม่? </span>
                                        <a class="mtm sign-up" id="sign-in" style="cursor: pointer;color: #9c27b0;" onclick="sign_in()">
                                            <span class="lng-registered-customers">ลูกค้าที่ลงทะเบียน</span>
                                        </a>
                                    </div>
                                    <div id="status"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-signin">
                    <div class="card-header text-center">
                        <h4 class="card-title" style='margin-bottom: 30px;    font-weight: 700;
    font-family: "Roboto Slab","Times New Roman",serif;
    color: #3C4858;
    font-size: 20px;' >
                            <span class="lng-login">  เข้าสู่ระบบ</span>
                        </h4>                                       
                    </div>
                    <form>
                        <div class="row">
                            <!-- <div class="col-sm-8 " style="padding: 0" > -->
                                <div class="">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label"><span class="lng-email"> </span>
                                                
                                            </label>
                                            <input  required="True" type="email"  class="form-control" id="username" size="80" style="    border-radius: 0 25px 25px 0;">
                                        </div>
                                    </div>                                       
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label"><span class="lng-password"></span></label>
                                            <input type="password" class="form-control" id="password" style="    border-radius: 0 25px 25px 0;">
                                        </div>
                                    </div>
                                    <div id="message" style="text-align: center;"></div>
                                </div>
                                <div class="">
                                    <div  type="submit" class=" btn-login " id="login" style="">
                                        <span class="lng-login"> เข้าสู่ระบบ </span>
                                    </div>
                                </div>
                                        
                                <div class="col2">
                                    <div class="text-sign" >
                                        <span class="lng-not-member" style="color: #333">ไม่ใช่สมาชิก?</span>
                                        <a class="sign-up" id="sign-up" style="cursor: pointer; color: #9c27b0;" onclick="sign_up()">
                                            <span class="lng-sign-up-now" >สมัครตอนนี้เลย</span>
                                        </a>
                                    </div>
                                </div>

                            <!-- </div> -->
                         
                
                <div class="log-social box-signin">
                    <div class="unit social-column">
                        <div class="social-inner">
                            <div class="fb-wrapper">
                                <a id="facebook-login-button"  class="fb-auth inner facebook-login-auth" scope="public_profile,email" onclick="loginsss()" return false>
                                    <!-- <i class=" fa fa-facebook-official " style="font-size: 36px; position: absolute; left: 16px;"></i> -->
                                    <div class=" pull-left" style=" position: absolute;  width: 35px; height: 35px; color: #fff; border-radius: 50%; background: #3b5998;">
                                                <i class="fa fa-facebook"> </i>
                                    </div>
                                    <span>Facebook</span>
                                </a>
                            </div>
                           
                            <div class="google-wrapper">
                  <div id="gSignInWrapper">
                    <!--<span class="label">Sign in with:</span>-->
                    <div id="customBtn" class="google-auth inner google-login-auth">
                                    <div class="" style="position: absolute;  width: 35px; height: 35px; color: #fff; border-radius: 50%; background: #dd4b39;">
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
                    </form>
                </div>
            </div>

            <!-- <div class="col-md-6" style="margin-bottom: 62px;">
                
            </div> -->
        

    <div id="foget-password" style="display: none;">
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
                    <!--  <div style="margin-top: 10px; z-index:1;">
                      
                        <button   class="btn btn-repair waves-effect btn-other" style="background-color:#F7941D; color:#FFFFFF;text-transform: capitalize;"   id="btn_login_register"><i class="fa  fa-user-plus" style="padding-right: 5px;"  ></i><span >&nbsp;<?=t_register_member;?></span></button>
                        <button   class="btn btn-repair waves-effect btn-other" style="background-color:#5a78b5; color:#FFFFFF;margin-top:10px;text-transform: capitalize;"   id="btn_login_login">
                        <i class="fa fa-sign-in" style="padding-right:10px;" ></i><span >&nbsp;<?=t_log_in;?></span></button>
                        <button   class="btn btn-repair waves-effect btn-other " style="background-color:#666666; color:#FFFFFF;margin-top:10px;text-transform: capitalize;"   id="btn_login_password"><i class="fa  fa-unlock-alt" style="padding-right:10px;padding-left:2px;" ></i><span ">&nbsp;<?=t_forgot_password;?></span></button>

                        <div style="display: none;">
                         <input type='file' id="imgInp"  />
  <img id="blah" src="#" alt="your image" width="100px" />
  </div>
                     </div> -->
                   </div>
                 </div>

                  
                  <!-- /.login-logo -->
                  <!-- /.login-box-body -->
             
               
               <!-- /.login-box -->
               <!-- iCheck -->
              
            </td>
         </tr>

      </table>
      <? //include "js/control.php" ;	?>

   </body>

</html>


<style>
  .page-header .container {
    padding-top:0;
    color: #000;
    background-color: #fff;
    border-bottom: 1px solid #C8E1F5;
}
.navbar.navbar-transparent{
    background-color: #fff;
    color: #000;
    border-bottom: 1px solid #C8E1F5;
}
.navbar {
    box-shadow: none;
}
.loading-in{
    height: 115px;
    border-radius: 25px;
    background: #fff;
    min-width: 15rem;
    /* height: auto; */
    left: 50vw;
    top: 50vh;
    transform: translate(-50%,-50%);
    position: fixed;
    z-index: 10;
}
.loading-ld{
    font-weight: 500;
    color: #000;
    padding: 35px;
    text-align: center;
}
#loading{
    z-index: 9999;
    position: fixed;
    width: 100vw;
    height: 100vh;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.59);
    display: nones;
}
input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
  color: #333;
}
input:-moz-placeholder,
textarea:-moz-placeholder {
  color: #333;
}
input::-moz-placeholder,
textarea::-moz-placeholder {
  color: #333;
}
input:-ms-input-placeholder,
textarea:-ms-input-placeholder {
  color: #333;
}
.btn-send{
    padding: 12px 20px;
    background: #3b5998;
    color: #fff;
    width: 140px;
    position: absolute;
    text-align: center;
    right: 0px;
    margin-top: 15px;
    border-radius: 25px;   
}
.btn-login-forget{
    text-transform: uppercase;
    text-align: center;
    color: #ffffff;
    border: 1px solid #4BB1C1;
    right: 15px;
    padding: 12px 20px;
    bottom: 15px;
    background: #3b5998;
    display: none;
}
    #sectionsNav {
    position: absolute;
    /* background: rgba(255, 255, 255, 0) !important; */
    margin: auto;
    z-index: 20;
    width: 100%;
    padding-bottom: 0;
    padding-top: 0;
    box-shadow: none;
    background: #3b5998 !important;;
}
#foget-password{
    z-index: 20; 
    position: fixed; 
    /* width: 100vw; 
    height: 100vh;  */
    left: 0px; top: 0px; 
    /* background: rgba(0, 0, 0, 0.59); */
    display:none;
}
.box-in-foget{
    height: 100vh;
        /* border-radius: 4px; */
        background: #fff;
        min-width: 100%;
        /* height: auto; */
        left: 50vw;
        top: 50vh;
        
        transform: translate(-50%,-50%);
        position: fixed;
        z-index: 3;
}
.btn-close {
    position: absolute; 
    right: 15px;
}

.btn-login{
    font-weight: 500;
    display: block;
    padding: 10px;
    text-decoration: none;
    cursor: pointer;
    min-width: 120px;
    border-radius: 25px;
    text-align: center;
    color: #ffffff;
    background-color: #3b5998;


}
#checkmail{
    background-color: #FF5722;
}
/* .btn-login:hover{
     border: 1px solid #3b5998;
     background-color: #3b5998;
     color: #ffffff;
} */
.btn-signup{
    color: #3b5998;
    border: 1px solid #3b5998;
    background-color: #3b5998;
    font-weight: 500;
    display: block;
    line-height: 36px;
    padding: 0 10px 0 0;
    text-decoration: none;
    cursor: pointer;
    min-width: 120px;
    border-radius: 25px;
    text-align: center;
     color: #ffffff;

}
.btn-signup:hover{
     border: 1px solid #3b5998;
     background-color: #3b5998;
     color: #ffffff;
}
.col-sign{
    /*margin-top: 20px;*/
    font-size: 13px;

}
.btn-foget-pass {
    color: #ffffff;
    background: #333333;
    text-align: center;
    padding: 12px;
    border-radius: 25px;
    font-weight: 500;
}

.social-column .fb-wrapper .inner {
    color: #3b5998;
    border: 1px solid #3b5998;
    font-weight: 700;
    display: block;
    line-height: 36px;
    /* padding: 0 10px 0 0; */
    padding: 3px;
    text-decoration: none;
    cursor: pointer;
    min-width: 120px;
    border-radius: 25px;
}
.social-column .google-wrapper .inner {
    color: #ea4335;
    border: 1px solid #ea4335;
    
    font-weight: 700;
    display: block;
    line-height: 36px;
    /* padding: 0 10px 0 0; */
    padding: 3px;
    text-decoration: none;
    cursor: pointer;
    min-width: 120px;
    border-radius: 25px;
}
.social-column .fb-wrapper {
    text-align: center;
}
 .notification {
    position: absolute;
    top: 2px;
    border: 1px solid #FFF;
        left: 22px;
    font-size: 9px;
    background: #f44336;
    color: #FFFFFF;
    min-width: 20px;
    padding: 0px 5px;
    height: 20px;
    border-radius: 10px;
    text-align: center;
    line-height: 19px;
    vertical-align: middle;
    display: block;
}
.social-column .fa-google-plus-square, .social-column .fa-facebook-official {
    display: inline-block;
    vertical-align: text-top;
    padding: 0;
    /*background-image: url(/images/2014/sprites/icons-header-336d99fe71.png);*/
    width: 37px;
    height: 38px;
    padding-left: 0;
    float: left;
}
.social-column .google-wrapper {
    text-align: center;
    margin-top: 20px;
/*    display: none;*/
}
.social-column .social-inner {
    display: table-cell;
    vertical-align: middle;
}
.social-column{
    padding: 100px 120px;
}
.dropdown-menu.dropdown-with-icons li>a:hover {
    /*padding: 12px 20px 12px 12px;*/
    background: #F44336 !important;
}
.dropdown-menu:after, .dropdown-menu-container:after {
    border-bottom: 11px solid #FFFFFF;
    border-left: 11px solid rgba(0,0,0,0);
    border-right: 11px solid rgba(0,0,0,0);
    content: "";
    display: inline-block;
    position: absolute;
    right: 30px;
    top: -10px;
}
.index-page .page-header, .presentation-page .page-header {
    height: 12vh !important;
    overflow: hidden;
}
.box-regispro {
    /*letter-spacing: 1px;*/
    color: #555555;
    padding: 2px 10px;
}
#special {
    display: inline-block;
    position: absolute;
}
#exclusive {
    display: inline-block;
    position: absolute;
}
#fast {
    display: inline-block;
    position: absolute;
}
.special {
    font-size: 14px;
    /*margin-left: 5%;*/
    margin-bottom: 20px;
}
.exclusive {
    font-size: 14px;
    /*margin-left: 5%;*/
    margin-bottom: 20px;
}
.fast {
    font-size: 14px;
    /*margin-left: 5%;*/
}
.section_title{
     /*font-size: 20px;*/

        position: relative;
    /*font-size: 170%;*/
    font-weight: normal;
    /*margin-left: 0px;*/
    
}
.special p {
    display: inline-block;
    margin-left: 70px;
        font-size: 13px;


}
.special h4 {
    display: inline-block;
    margin-left: 70px;
        font-size: 16px;
}
.exclusive p {
    display: inline-block;
    margin-left: 70px;
        font-size: 13px;

}
.exclusive h4 {
    display: inline-block;
    margin-left: 70px;
        font-size: 16px;
}
.fast p {
    display: inline-block;
    margin-left: 70px;
        font-size: 13px;
}
.fast h4 {
    display: inline-block;
    margin-left: 70px;
        font-size: 16px;
}
#box-left{
    /*border-right: 1px solid #ccc;*/
    /*margin-top:75px;*/
}
.box-icon{
    width: 50px;
    border-radius: 50%;
    padding: 10px;
    height: 50px;
    border: 1px solid #555;
    position: absolute;
}
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    
   
    color: #FFF;
    box-shadow: none;
}
.wizard-card{
    margin-bottom: 0;
   
}

.wizard-card{
    box-shadow: none;
}
#title-regis{
    color: #E47911;
     font-size: 20px;

    /*margin-top: 50px;*/

}
#title-info{
     font-size: 20px;

     margin-top: 20px;
}
.loginReg__or{
    right: 0;
    margin: 10px 0;
    position: absolute;
    font-size: 10px;
    width: 2em;
    height: 2em;
    text-align: center;
    /* line-height: 2.2; */
    background: #dcdcdc;
    border-radius: 50%;
    color: #666;
    margin-right: -10px;
    margin-top: -172px;
}
 @media screen and (max-width: 767px){
    #title-regis{
        color: #E47911;
        margin-top: 0;

} 
#title-info{
        margin-top: 30px;
    font-size: 18px;
} 
#box-left{
    border-right: none;
} 


                

}
.index-page .header-filter:after, .presentation-page .header-filter:after {
    background: rgba(132,13,121,.88);
    background: linear-gradient(45deg,rgba(132,13,121,.88) 0,rgba(208,44,180,.31) 100%);
    background: -moz-linear-gradient(135deg,rgba(132,13,121,.88) 0,rgba(208,44,180,.31) 100%);
    /* background: -webkit-linear-gradient(135deg,rgba(132,13,121,.88) 0,rgba(208,44,180,.31) 100%); */
    /* background: linear-gradient(0deg, rgba(44, 44, 44, 0.2), rgb(16, 15, 204)); */
    background: linear-gradient(0deg, rgba(44, 44, 44, 0.2), rgba(224, 23, 3, 0.6));
}
.index-page .page-header, .presentation-page .page-header {
    height: 50vh;
    overflow: hidden;
}
.main-raised {
    margin: -60px 30px 0;
    border-radius: 6px;
    box-shadow: 0 16px 24px 2px rgba(0,0,0,.14), 0 6px 30px 5px rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);
    margin-bottom: 50px;
}
#imgcountry{
    width: 25px;
    margin-right: 15px;
}
.modal .modal-dialog {
    margin-top: 20px !important;
}
.box-country ul{
                        padding-left: 0;

                    }
                    .box-country ul li{
                            list-style: none;
    padding: 8px 20px;
                    }
                    #span-phonecode{
                        padding-right: 10px;
                    }
                    .box-country ul li:hover{
                        background-color: #ffd000;
                        color: #000;
                    }
                    #textcountry{
                        text-align: center;
                    }
                    #code{
                        text-align: center;
                    }
                    label.form-control
                    {
                        margin-top: 20px;
                    }
                    #calen{
                       margin-top: -15px;
                        margin-right: 2px;
                        position: absolute;
                        font-size: 20px;
                        color: #9E9E9E; 
                    }
.btn-login{
   margin-left: 40px;
    margin-top: 30px;
}
.btn-signup{
        margin-left: 40px;
    margin-top: 30px;
}
.text-sign{
    margin-left: 55px;
}

                     @media screen and (max-width: 767px){
                    


                #textcountry{
                        text-align: left;
                    }
                     #code{
                        text-align: left;
                    }
                    #tphone{
                        padding: 0;
                    }
                    .btn-login{
    margin-left:0;
    margin-top: 30px;
}

.text-sign{
        margin-left: 0;
    text-align: center;
}
.loginReg__or{
    display: none !important;
}
.social-column .social-inner{
    display: block;
}
.social-column {
    padding: 30px 0;
}
.btn-signup {
    margin-left: 0;
    margin-top: 30px;
}

                }

</style>
<style>
    .navbar-right{
    /* background: #000; */
}
.textmenu{
    margin-left: 10px;
}
.imgmem-log{
    
}
.imgmemu{
    width: 35px;  
    height: 35px; 
    border-radius: 50px;  
}
.user {
    background: #07c284;
    text-align: center;
    padding-bottom: 20px;
    /* margin: 25px auto 0; */
    position: relative;
    height: 160px;
    display:none;
}
.user .photo {
    width: 100%;
    /* height: 110px; */
    overflow: hidden;
    border-radius: 4px;
    /* margin: 0 auto; */
    /* margin-top: 50px; */
    /* box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2); */
}
.user .photo img {
    width: 50px;
    height: 50px;
    margin-top: 30px;
    border-radius: 50px;                       
}

#usernamess{
    display: inline-block;
    text-transform: initial;
}


.box-menu-select {
position: fixed;
width: 100%;
bottom: 0;
z-index: 1;
background: #fff;
/* box-shadow: 0px 10px 5px #888, 0px 0px 5px rgba(136, 136, 136, 0.52); */
box-shadow: 0px 0px 0.9px #888, 0px 0px 0px rgba(136, 136, 136, 0.52);

/* height: 90px; */
}
.btn-reservation {
    line-height: 0.8;
    padding: 8px 0;
font-size: 16px;
/* font-weight: 400; */
/* position: absolute; */
width: 100%;
/* border-radius: 4px; */
/* padding: 12px; */
color: #333;
text-align: center;
/* display: inline-block; */
/* background-color: #2196f3; */
z-index: 1;
}

.btn-realtime {
    line-height: 0.8;
    padding: 8px 0;
font-size: 16px;
/* font-weight: 400; */
/* position: absolute; */
width: 100%;
/* border-radius: 4px; */
/* padding: 12px; */
color: #333;
text-align: center;
/* display: inline-block; */
/* background-color: #2196f3; */
z-index: 1;
}

.btn-home {
padding: 8px 0;
font-size: 16px;
/* font-weight: 400; */
/* position: absolute; */
width: 100%;
/* border-radius: 4px; */
/* padding: 12px; */
color: #3b5998;
text-align: center;
/* display: inline-block; */
/* background-color: #2196f3; */
z-index: 1;
}

.btn-management {
    line-height: 0.8;
    padding: 8px 0;
font-size: 16px;
/* font-weight: 400; */
/* position: absolute; */
width: 100%;
/* border-radius: 4px; */
/* padding: 12px; */
color: #333;
text-align: center;
/* display: inline-block; */
/* background-color: #2196f3; */
z-index: 1;
}

.btn-management a {
color: #999999;
}
.btn-car-service {
    line-height: 0.8;
    padding: 8px 0;
font-size: 16px;
/* font-weight: 400; */
/* position: absolute; */
width: 100%;
/* border-radius: 4px; */
/* padding: 12px; */
color: #333;
text-align: center;
/* display: inline-block; */
/* background-color: #2196f3; */
z-index: 1;
}


/*.btn-reservation:hover{
   background-color: #FFC107;
}*/

.btn-real-res {
position: absolute;
margin-top: 50px;
width: 100%;
z-index: 5;
text-align: center;
}
#getcapa{
    background-color: #ddd;
    height: 35px;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
    border-top: none;
}
#table1{
    margin-top: 10px !important;
}
.footer a{
    color: #000;
    font-weight:normal;
}
.input-group-addon {
    
        border-radius: 25px 0 0 25px !important;
}
@media screen and (max-width: 767px){
    .user {        
        display:block;
    }
}
</style>
<script>
$(document).ready(function(){
  
    var username, password , username_signup ,password_signup,text_check,forget = '';
    // var base_url = "https://www.welovetaxi.com/app/booking2/";
   
// $.ajax({
//         type: 'POST',
//         url: //'<?php //echo base_url(); ?>getuserlog_control/process',
//        // data: {'from': getParameterByName('from'),'to': getParameterByName('to')},
//         //contentType: "application/json",
//         dataType: 'json',
//         success: function(data) { 
//         //   console.log(data)
//         }
//     });
    $('#username').on('change', function() {
        username = this.value ;
        console.log(username)
    })
    $('#password').on('change', function() {
        password = this.value ;
        console.log(password)
    })
        
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
//      alert(type_login);
       console.log(password+username);
        $.ajax({
        type: 'POST',
        url: 'https://www.welovetaxi.com/app/demo_new2/curl/loginsocial.php',
        data: {'username': password,'password':password,'type':'nomal'},
        contentType: "application/json; application/x-www-form-urlencoded; charset=UTF-8",
        dataType: 'json',
        success: function(res) { 
          console.log(res)
          if(res[0].status == 1)
              {
                  var url = "https://www.welovetaxi.com/app/demo_new2/index.php?check_new_user="+res[0].username;
                  console.log(url);
                  window.location.href = url; 
                   
              }
              else 
              {    
                  $('#message').html('เข้าระบบไม่สำเร็จ').css('color', 'red');
              }
        }
    });
//    alert('<?php //echo base_url(); ?>login_control/process');
//         $.ajax({
//         type: 'POST',
//         url: '<?php //echo base_url(); ?>login_control/process',
//         data: {'username': username,'password':password},
//         //contentType: "application/json",
//         dataType: 'json',
//         success: function(res) { 
//           console.log(res)
//           if(res.status == 0)
//               {
//                  console.log('login status 0');
//                  $.cookie("login",res.username);
//                  console.log('<?php //echo base_url(); ?>');
//                  if(type_login=='dasboard'){
//           window.location.href = "<?php //echo base_url(); ?>dashboard/view_user";
//          }else if(type_login=='book'){
// //            alert(param_data+" "+param_from+" "+param_to);
//           window.location.href = "<?php //echo base_url(); ?>book?data="+param_data+"&from="+param_from+"&to="+param_to+"&lat_f="+lat_f+"&lng_f="+lng_f+"&lat_t="+lat_t+"&lng_t="+lng_t+"&book="+book;
          
//          }else{
//           window.location.href = "<?php //echo base_url(); ?>";
//          }
//               }
//               else if(res.status==1)
//               {
//                 console.log('status==1')
//                $('#message').html('Username is Invalid').css('color', 'red');
//               }
//               else if(res.status==2)
//               {
//                   console.log('status==2')
//                 $('#message').html('Password is Invalid').css('color', 'red');
//               }
//         }
//     });
       
    //alert( this.value );
    })
    
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
        url: 'login_control/checkmail',
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
            url: 'login_control/signup',
            data: {'username': username_signup,'password':password_signup},
            //contentType: "application/json",
            dataType: 'json',
            success: function(res) { 
                console.log(res)
                if(res.status == 0){
                    $.cookie("login",res.username);
                    $('.lng_email_available').show()
                    $('.lng_email_have').hide()
                    window.location.href = "<?php //echo base_url(); ?>home";
                }
                else{
                    $('.lng_email_available').hide()                    
                    $('.lng_email_have').show()
                }                
            }
        });
    
    });
});//END
</script>
<script >
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
          console.log('ID: ' + profile.getId());
          console.log('Name: ' + profile.getName());
          console.log('Image URL: ' + profile.getImageUrl());
          console.log('Email: ' + profile.getEmail()); 
          console.log(profile); 
          var url = 'login_control/processsocial';
//          alert(url);
          var type_login = $('#by').val();
                // var param_data = $('#data').val();
                // var param_from = $('#from').val();
                // var param_to = $('#to').val();
                // var lat_f = $('#lat_f').val();
                // var lng_f = $('#lng_f').val();
                // var lat_t = $('#lat_t').val();
                // var lng_t = $('#lng_t').val();
                // var book = $('#book').val();
                   $.ajax({
        type: 'POST',
        url: 'https://www.welovetaxi.com/app/demo_new2/curl/loginsocial.php',
        data: {'username': profile.getId(),'name':profile.getName(),'password':profile.getId(),'type':'google','img':profile.getImageUrl(),'email':profile.getEmail()},
        contentType: "application/json; application/x-www-form-urlencoded; charset=UTF-8",
        dataType: 'json',
        success: function(res) { 
          console.log(res)
          if(res[0].status == 1)
              {
                  var url = "https://www.welovetaxi.com/app/demo_new2/index.php?check_new_user="+res[0].username;
                  console.log(url);
                  window.location.href = url; 
                   
              }
              else 
              {    
                  $('#message').html('เข้าระบบไม่สำเร็จ').css('color', 'red');
              }
        }
    });
                 });
  }
//           $.post( url, {'username': profile.getEmail(),'name':profile.getName(),'password':profile.getId(),'type':'google','img':profile.getImageUrl() } ,function( data ) {
// //            console.log(data);
//             var obj_c = JSON.parse(data);
//             console.log(obj_c.status);
//             console.log(obj_c);
//              if(obj_c.status == 0)
//                       {
//                          $.cookie("login",obj_c.username);
// //                         $.cookie("logby",'google');
// //                           window.location.href = "<?php //echo base_url(); ?>home";    
// if(type_login=='dasboard'){
//           window.location.href = "<?php //echo base_url(); ?>dashboard/view_user";
//          }else if(type_login=='book'){
// //            alert(param_data+" "+param_from+" "+param_to);
//           window.location.href = "<?php //echo base_url(); ?>book?data="+param_data+"&from="+param_from+"&to="+param_to + "&lat_f=" + getParameterByName('lat_f')+ "&lng_f=" + getParameterByName('lng_f')+ "&lat_t=" + getParameterByName('lat_t')+ "&lng_t=" + getParameterByName('lng_t') + "&book=" + getParameterByName('book');
          
//          }else{
//           window.location.href = "<?php //echo base_url(); ?>";
//          }     
//                       }
//                       else 
//                       {    
//                                $('#message').html('Login not complete').css('color', 'red');
                               
//                       }
//           });      
//         }, function(error) {
//                  console.log(JSON.stringify(error, undefined, 2));
//         });
  // }
  </script>
<script>startApp();</script>
<script>
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
    // alert('wwww')
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  function sign_up(){
    $('.box-signup').show()
    $('.box-signin').hide()

  }
  function loginsss(){

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
    // var type_login = $('#by').val();
    //   var param_data = $('#data').val();
    //   var param_from = $('#from').val();
    //     var param_to = $('#to').val();
    //     var lat_f = $('#lat_f').val();
    //   var lng_f = $('#lng_f').val();
    //   var lat_t = $('#lat_t').val();
    //   var lng_t = $('#lng_t').val();
    //   var book = $('#book').val();
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me',{fields:'name,email,picture'}, function(response) {
        console.log(response)
        console.log(response.picture.data.url)
        //console.log(response.getImageUrl())
        // $.cookie("idface", response.id);
        $.ajax({
        type: 'POST',
        url: 'https://www.welovetaxi.com/app/demo_new2/curl/loginsocial.php',
        data: {'username': response.id,'name':response.name,'password':response.id,'type':'facebook','img':response.picture.data.url,'email':response.email},
        //contentType: "application/json; application/x-www-form-urlencoded; charset=UTF-8",
        dataType: 'json',
        success: function(res) { 
          console.log(res)
          // console.log(res)
          if(res[0].status == 1)
              {
                  var url = "https://www.welovetaxi.com/app/demo_new2/index.php?check_new_user="+res[0].username;
                  console.log(url);
                  window.location.href = url; 
                   
              }
              else 
              {    
                  $('#message').html('เข้าระบบไม่สำเร็จ').css('color', 'red');
              }
        }
    });
    });
  }
}

  function sign_in(){
    $('.box-signup').hide()
    $('.box-signin').show()
  }
  


                       
                     </script>