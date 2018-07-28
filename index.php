<?php
   @ob_start();
   @session_start();
   header('Content-type: text/html; charset=utf-8');
   require_once("mainfile.php");
   $PHP_SELF = "popup.php";
   GETMODULE($_GET[name], $_GET[file]);
   //   require_once("css/maincss.php");
   $db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);
   ?>
<script>
   var detect_mb = "<?=$detectname;?>";
   var class_user = "<?=$data_user_class;?>";
   var username = "<?=$_SESSION['data_user_name'];?>";
   console.log(detect_mb+" : "+class_user+" : "+username);
   if(detect_mb == "Android"){
   	 sendTagOs(class_user,username);
   }
   
   function sendTagOs(txt,username) {
   				if (typeof Android !== 'undefined') {
   				Android.sendTag(txt,username);
   			}
   } 
   function deleteTagOs(txt) {
   				if (typeof Android !== 'undefined') {
   				Android.deleteTag(txt);
   			}
   } 

</script>
<?if ($_SESSION['data_user_id'] == '') {   ?> 
<script>
 window.location = "signin.php";
</script> 
<? }   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>T-Share</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta name="format-detection" content="telephone=no">
      <meta name="theme-color" content="<?= $main_color ?>" />
      <link rel="stylesheet" href="front_bank/css/thbanklogos.min.css" id="stylesheet">
      <script src="js/sweet_origin/sweetalert.js"></script>
      <link rel="stylesheet" href="js/sweet_origin/sweetalert.css">
      <!-- materialize -->
      <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">-->
      <link rel="stylesheet" href="material/materialize.min.css?v=<?=time();?>">
      <!--<link rel="stylesheet" href="material/nav.css?v=<?=time();?>">-->
      <link rel="stylesheet" href="material/extra.css?v=<?=time();?>">
      <link rel="stylesheet" href="material/material.indigo-pink.min.css">
    
   
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="bootstrap/font_all/ultimate/flaticon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/airport/flaticon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/payment/css/fontello.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/icomoon/demo-files/demo.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/app/css/app-icon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/font_all/app-new/css/app-icon.css?v=<?=time()?>">
      <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
   </head>
   <script>
      //      var load_main_mod='<div class="outer-loading-mod"   id="main_index_load_page_mod"><div class="inner-loading"><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px;   margin-top:10px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;  margin-top:10px " ><center><span id="navload_topic"> โหลดข้อมูล</span></center></div></div></div>';
      	  var load_main_mod = '<div class="outer-loading-mod">'
      	  +'<div class="inner-loading">'
      	  +'<div class="preloader-wrapper medium active">'
          +'<div class="spinner-layer spinner-blue-only">'
            +'<div class="circle-clipper left">'
              +'<div class="circle"></div>'
            +'</div><div class="gap-patch">'
              +'<div class="circle"></div>'
            +'</div><div class="circle-clipper right">'
             +'<div class="circle"></div>'
            +'</div>'
          +'</div>'
        +'</div>'
        +'</div>'
        +'</div>';
        
    var load_sub_mod =  '<div class="sub-loader">'
    +'<div class="preloader-wrapper active">'
    +'<div class="spinner-layer spinner-blue-only">'
      +'<div class="circle-clipper left">'
       +'<div class="circle"></div>'
      +'</div><div class="gap-patch">'
        +'<div class="circle"></div>'
      +'</div><div class="circle-clipper right">'
        +'<div class="circle"></div>'
      +'</div>'
    +'</div>'
  +'</div>';
  +'</div>';
            var load_main_mod_table='<br><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px;   margin-top:10px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;  margin-top:10px " ><center><span id="navload_topic"> โหลดข้อมูล</span></center></div';
            
            var progress_bar = '<div class="progress">'+
      '<div class="indeterminate"></div>'+
  '</div>';
   </script>
	<!-- Scripts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="material/materialize.min.js?v=<?=time();?>"></script>
      <script src="material/startup-all-min.js?v=<?=time();?>" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
      <script src="js/jquery.touchSwipe.min.js"></script>
      
       <link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
   	   <link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
       <script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
       <script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script> 
       
   <body style="    background-position: 0% 100%;
    background-image: linear-gradient(to right,rgba(59, 89, 152, 0) 0%,#ff98003d 100%),url(pic/b1.jpg);
    background-blend-mode: screen;
    background-repeat-x: no-repeat;
    background-repeat-y: no-repeat;
    background-size: cover;" >
      <div style="
         display: block; 
         position: fixed;
         margin-left: 0px;
         margin-top: 0px;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: 999999999999;
         background: #FFF;" id="load_material">
         <div class="row" align="center" style="
            top: 40%;
            position:  absolute;
            left:  0;
            bottom: 60%;
            right: 0;">
            <div class="preloader-wrapper big active">
               <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
       
      <script>
      if('<?=$_GET[status];?>'!="his"){ //เช็คว่าสเตตัสที่ส่งมาเป็น ประวัติ หรือ กำลังจัดการ
         $(window).load(function() {
         	$("#load_material").fadeOut();
         });
		}  
      </script>
      <div>
        <!-- style="background-color:<?=$main_color;?> -->
         <nav class="n bi fj" >
            <div class="nav-wrapper">
               <!--<a class="brand-logo">
                  <img src="images/app/iconv5.png" style="width: 50px;margin-top:12px;" />
                  </a>-->
               <ul id="nav-mobile" class="ag hide-on-med-and-down">
                  <!-- <li class="active">
                     <a class="dropdown-button" href="#!" data-activates="pages" data-constrainwidth="false" data-beloworigin="true">Pages<i class="material-icons ag">arrow_drop_down</i></a>
                     <ul id="pages" class="dropdown-content">
                        <li><a class="g" href="startup-horizontal-half.html">Horizontal Halves</a></li>
                        <li><a href="startup-zoom-out.html">Zoom Out</a></li>
                        <li><a href="startup-circle-reveal.html">Circle Reveal</a></li>
                        <li><a href="startup-phone-wall.html">Phone Wall</a></li>
                        <li><a href="startup-element-transitions.html">Element Transitions</a></li>
                        <li><a href="startup-basic-elements.html">Basic Elements</a></li>
                        <li><a href="startup-shuffle.html">Shuffle</a></li>
                        <li><a href="startup-postcard.html">Postcards</a></li>
                     </ul>
                     </li>
                     <li><a href="startup-blog.html">Blog</a></li>
                     <li><a href="startup-team.html">Team</a></li>
                     <li><a href="http://themes.materializecss.com/cart/34339663873:1">Buy Now!</a></li> -->
               </ul>
               <a data-activates="slide-out" class="button-collapse ag"><i class="material-icons white-text" style="font-size: 30px;">menu</i></a>
               <a style="right: 0px;position: absolute;margin: -2px 18px;margin-top: 12px;" onclick="GohomePage()"><i class="fa fa-home"></i></a>
               <!-- <i class="fa fa-home" style="font-size:30px; padding-left: 2px; color:#FFFFFF" id="btn_home_head_menu"></i>-->
            </div>
         </nav>
         <?php 
            if($data_user_class=="lab"){
            	include("material/menu/lab.php");
            }else if($data_user_class=="taxi"){
            	include("material/menu/taxi.php");
            }
            ?>
         <script>
         	function logOut(){
				swal({
				  title: "<?=t_sign_out;?>",
				  text: "<?=t_confirm_signout;?>",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonClass: "btn-danger waves-effect waves-light",
				  cancelButtonClass: "btn-cus waves-effect waves-light",
				  confirmButtonText: "<?=t_yes;?>",
				  cancelButtonText: "<?=t_no;?>",
				  closeOnConfirm: false
				},
				function(){
				   $.post('signout.php?type=logout',function(){
		      		 swal("<?=t_sign_out_successfully;?>","", "success");
		      		 	setTimeout(function(){ 		
			      		 	deleteTagOs("Test Text");
						    deleteTagIOS(class_user,username);
						    window.location.href = "signin.php";
		      		 	}, 1000);
		      		});
				  }); 
			}
         </script>   
         <div style="width:100%;" id="myelement">
            <?  include ("".$MODPATHFILE."");?>  
         </div>
      </div>
      <?PHP include "load/popup/action/all.php";
      include "load/popup/action/1.php"; 
      include "load/popup/action/2.php"; 
      include "load/popup/action/map_popup.php"; 
      include "load/popup/action/3.php"; 
      include "load/popup/action/4.php"; 
      include "load/popup/action/5.php"; 
      include "load/popup/action/6.php"; 
      include "load/popup/action/photo_popup.php"; 
      include "load/popup/action/clean_popup.php"; ?>
      <!-- End Content -->
      <div style="width: 100%;height: 100%;position: fixed;top: 0px; display: none; background-color: #0000008f;z-index: 99999;opacity: 1;padding: 15px 10px; overflow-y: scroll; /* has to be scroll, not auto */
  -webkit-overflow-scrolling: touch;" id="dialog_custom">
         <div class="w3-animate-bottom" style="background-color: #fff;margin-top: 10px;border-radius: 10px;box-shadow: 1px 1px 7px #3a3939;">
            <i class="fa fa-times" aria-hidden="true" style="position: absolute;
               color: #5a5858;
               right: 25px;
               font-size: 40px;
               z-index: 9000;
               margin-top : 5px;" id="close_dialog_custom" onclick="$('#dialog_custom').hide();"></i>
            <div id="body_dialog_custom_load" >
            </div>
         </div>
      </div>
      <!-- Modal Trigger -->
      <a class="waves-effect waves-light btn modal-trigger" id="click" style="display: none;">Modal</a>
      <script>
         $('#click').click(function(){
//         	$('#material_dialog_lg').modal('open');
         	$('#material_dialog').modal('open');
         	console.log(1);
         });

      </script>
      <!-- Modal Structure 1 -->
      <div id="material_dialog" class="modal ">
         <div class="modal-content">
            <h4 id="dialoglLabel">Modal Header</h4>
            <div id="load_modal_body" style="-webkit-overflow-scrolling: touch;">
            	
            </div>
         </div>
         <div class="modal-footer">
            <!-- <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Disagree</a>-->
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">ปิด</a>
         </div>
      </div>
      <!-- Modal Structure 2 -->
      <div id="material_alert" class="modal">
         <div class="modal-content">
            <h4 id="alertLabel">Modal Header</h4>
            <div id="load_modal_body_alert" style="-webkit-overflow-scrolling: touch;"></div>
         </div>
         <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">ปิด</a>
         </div>
      </div>
      <!-- Modal Structure 3 lg -->
      <div id="material_dialog_lg" class="modal modal-fixed-footer" style="height: 90% !important; 
         max-height: 90% !important;margin-top: -30px;">
         <div class="modal-content">
            <h4 id="dialoglLabel_lg">Modal Header</h4>
            <div id="load_modal_body_lg"></div>
         </div>
         <div class="modal-footer">
            <!-- <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Disagree</a>-->
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">ปิด</a>
         </div>
      </div>
      <input type="hidden" name="" id="set_lng_cookies" value="<?=$_COOKIE[lng];?>">
      
		<style>
			#xxx {

    width: 100%;
    padding: 15px;
    background-color: #ddd;
    position: fixed;
    top: 0px;
    bottom: 0px;
    left: 450px;
    display: none;
    z-index: 1;
}
		</style>
		<div id="xxx"> 
			<div style="    color: #333;
				    position: absolute;
				    z-index: 999999;
				    top: 7px;
				    right: 20px;"><i class="fa fa-close" style="font-size:36px;" onclick="hideDialogSlide();"></i>
		</div>
		<div id="test_slide">5555</div>
		</div>

   </body>
</html>

<script >
	function showDialogSlide(){
		console.log(1);
		 $("#xxx").css('display','block');
	    $("#xxx").animate({left: '0px'},200);
	}
	function hideDialogSlide(){
		console.log(1);
		
	    $("#xxx").animate({left: '500px'},200);
	    setTimeout(function(){ $("#xxx").css('display','none'); }, 250);
	     
	}
   function language(lng) {
       console.log(lng);
       setCookie("lng", lng, 1);
       window.location.reload();
   }
   function GohomePage() {
   //       hidepopup();
       console.log('GohomePage Run');
       $('#load_mod_data').html(load_main_mod);
   //       return;
       window.location = "index.php";
   }
   function addCommas(nStr){
       nStr += '';
       x = nStr.split('.');
       x1 = x[0];
       x2 = x.length > 1 ? '.' + x[1] : '';
       var rgx = /(\d+)(\d{3})/;
       while (rgx.test(x1)) {
           x1 = x1.replace(rgx, '$1' + ',' + '$2');
       }
       return x1 + x2;
   }
   var check_new_user = '<?=$_GET[check_new_user];?>';
   var regis_linenoti = '<?=$_GET[regis];?>';
   
   console.log(regis_linenoti)
   console.log('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
   //                                                alert(check_new_user);
   if(check_new_user!=""){
   $( "#main_load_mod_popup" ).toggle();
   var url_load = "load_page_mod.php?name=user&file=index&check_new_user="+check_new_user;
   $('#load_mod_popup').html(load_main_mod);
   $('#load_mod_popup').load(url_load); 
   }
   if(regis_linenoti!=""){
   $( "#main_load_mod_popup" ).toggle();
   var url_load = "load_page_mod.php?name=user&file=notiline&regis=linenoti&state=one";
   $('#load_mod_popup').html(load_main_mod);
   $('#load_mod_popup').load(url_load); 
   }
</script>
<style>
 .btn-primary{
     background-color: <?=$main_color;?> !important;
     color: #fff !important;
}
	.sub-loader{
		padding: 50px;
    	width: 100%;
    	text-align: center;
	}
   .outer-loading-mod {
   position: fixed;
   margin-left: 0px;
   margin-top: 0px;
   display: table;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   z-index: 9999;
   background: #FFF;
   }
   .inner-loading {
   display: table-cell;
   vertical-align: middle;
   text-align: center;
   width: 100%;
   height: 100%;
   background: none;
   }
   @keyframes load {
   100% {
   opacity: 0;
   transform: scale(1);
   }
   }
   @keyframes load {
   100% {
   opacity: 0;
   transform: scale(1);
   }
   }
   .css-full-popup {
   position: fixed;
   left: 0px;
   top: 0px; 
   bottom:0;
   width: 100%;
   height: 100%;
   z-index: 99; 
   overflow-y:hidden ; padding:0px; background-color:#FFFFFF;
   }
   .back-full-popup
   { 
   border-bottom: dashed 1px #3b5998 !important;
   font-size: 22px !important;
   padding: 10px !important;
   color: #333333 !important;
   width: 100% !important;
   border-top: 0px solid #000000 !important;
   margin-bottom: 0px!important;
   top: 0 !important;
   position: fixed !important;
   background: #e8e8e8 !important;
   z-index: 100;
   }
   .close-small-popup{
   font-size:22px;
   color:#333 !important;
   }
   .text_small_popup{
   color:#333 !important;
   }
   /*pop up*/
   .main_load_mod_popup{
   color: #333;
   }
   .main_load_mod_popup_1{
   color: #333;
   }
   .main_load_mod_popup_2{
   color: #333;
   }
   .main_load_mod_popup_3{
   color: #333;
   }
   .main_load_mod_popup_4{
   color: #333;
   }
   .main_load_mod_popup_5{
   color: #333;
   }
   .button-close-popup-mod-1{
   color: #333333;
   }
   .button-close-popup-mod-2{
   color: #333333;
   }
   .button-close-popup-mod-3{
   color: #333333;
   }
   .button-close-popup-mod-4{
   color: #333333;
   }
   .button-close-popup-mod-5{
   color: #333333;
   }
   .button-close-popup-mod{
   color: #333333;
   }
   .text_mod_topic_action_1{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_2{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_3{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_4{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_5{
   font-size:22px;
   color: #333333;
   }
   .text_mod_topic_action_6{
   font-size:22px;
   color: #333333;
   }
   .fa-home{
   font-size: 28px;
   }
   /*****END*****/
</style>
<div class="container" style="display: none;">
   <div class="row">
      <div id="loader">
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="lading"></div>
      </div>
   </div>
</div>
<!-- Pricing Tables -->
<div class="hiddendiv common"></div>
<div class="drag-target" data-sidenav="slide-out" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 10px; left: 0px;"></div>
<?php   $lng_map = $google_map_api_lng;?>
<script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?= $lng_map; ?>&v=<?= time(); ?>"></script>
<script>
   setTimeout(function(){ 
      	  sendTagIOS(class_user,username);
    }, 1500);	
    
    function sendTagIOS(classname,username){
    	var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
   		if(iOS==true){
       		var url_xcode = "send://ios?class="+classname+"&username="+username+"&test=0";
       		console.log(url_xcode);
            window.location = url_xcode;
		}
   	}
   	
   	function deleteTagIOS(classname,username){
   		var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
   		if(iOS==true){
       		var url_xcode = "delete://ios?class="+classname+"&username="+username+"&test=0";
       		console.log(url_xcode);
            window.location = url_xcode;
		}
   	}
</script>

