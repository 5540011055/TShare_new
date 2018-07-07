
<input type="hidden" value="0" id="check_open_shop_id" /> <!-- เช็คเมนูช้อปปิ้ง ว่ากำลังเปิด detail ของ id ไหน -->
<style>
   .box-shadow-only{
   box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
   }
   .paddling-max{
   padding : 17px 12px !important;
   border-radius: 0px !important;
   border : 0px !important;
   }
   .popup-open {
   overflow: hidden;
   } 
   .css-small-popup {
   /* left: 0px; */
   /* right: 0px; */
   /* bottom: 0px; */
   top: 50px;
   /* margin-top: 95px;
   margin-left: 30px;*/
   /*    margin: 40px;*/
   margin: 15% auto;
   position : relative;
   width: 85%;
   height: auto%;
   z-index: 9999;
   /* padding: 30px; */
   background-color: #fff;
   border: 2px solid #cccccc;
   border-radius: 10px;
   }
   .background-smal-popup{
   width: 100%;
   height: 100%;
   z-index: 9990;
   background-color: rgba(0, 0, 0, 0.45);
   top: 0px;
   left: 0px;
   right: 0px;
   bottom: 0px;
   }
   .close-small-popup{
   /*	position : relative;*/
   /*	right : 50px;
   top : 95px;*/
   z-index : 10000;
   color : #000000;
   width: 100%;
   /*margin-left: -10px;
   margin-top: 5px;*/
   }
   .css-full-popup2{
   position: fixed;
   width: 100%;
   z-index: 9999;
   background-color: #ffff;
   height: 100%;
   /*	margin-top: 48px;*/
   }
   .btn_select{
   width: 100%; 
   border: 1px solid #ddd; 
   padding: 13px; 
   margin-top: 0px; 
   border-radius: 20px;
   background-color: #fff;
   box-shadow: 1px 1px 5px #ddd;
   background-color: #3b5998;
   color: #ffff;
   }
   .icon { padding-top: 20px; } 
   p {
   font-family: Arial, Helvetica, sans-serif; font-size:18px;
   }
   body,td,th {
   font-family: Arial, Helvetica, sans-serif;
   }
   .tool-icon-chat {
   width:100%;border-radius: 20px; 
   }
   .tool-icon-text {
   padding:5px; width:100%;border-radius: 15px; height:60px; background-color:#FFFFFF; font-size:32px; color: <?=$maincolor?>;
   }
   .tool-icon-text:hover{  
   padding:5px; width:100%;border-radius: 15px; height:60px; border:2px solid <?=$maincolor?>;background-color:#FFFFFF; box-shadow: 0px 0px 10px #999999; color:<?=$maincolor?>;
   }
   .tool-td-chat {
   padding:5px;border-radius: 15px; padding-bottom:10px;
   }
   .circle-menu{
   border-radius: 50%; background-color:<?=$main_color?>; display: block;  
   padding: 10px; 
   width: 50px;
   height: 50px; 
   color:#FFFFFF;  font-size:24px;  
   border: solid 2px #FFFFFF;
   text-align: center;
   vertical-align: middle; 
   }
   .btn-default{
   border-radius: 20px;
   box-shadow: 0px  0px 5px #DADADA;  border:none;
   }
   .text-cap{
   text-transform: capitalize !important;
   }
   .text-low{
   text-transform: lowercase !important;
   }
   .btn-repair{
   padding: .84rem 2.14rem;
   font-size: .81rem;
   -webkit-transition: all .2s ease-in-out;
   transition: all .2s ease-in-out;
   margin-top: .375rem;
   border: 0;
   border-radius: .125rem;
   cursor: pointer;
   text-transform: uppercase;
   white-space: normal;
   word-wrap: break-word;
   color: #000000;
   background-color: #ffffff;
   box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
   }
   .waves-effect {
   position: relative;
   cursor: pointer;
   overflow: hidden;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   -webkit-tap-highlight-color: transparent;
   z-index: 1;
   }
</style>
<style>
   .back_main{
   padding: 5px 0px;
   margin-top: 0px;
   padding-left: 10px;
   position: fixed;
   background-color: #fff;
   width: 100%;
   /*	    border-bottom: 1px solid #ddd;*/
   box-shadow: 1px 1px 10px #ddd;
   z-index: 2;
   }
   @media screen and (max-width: 320px) {
   .font-22{
   font-size : 14px;
   font-family: 'Arial', sans-serif;
   }
   .line-center{
   /*   		height: 59px;*/
   height: 50px;
   }
   #date_transfer_work{
   height: 35px !important;
   font-size: 20px !important;
   }
   .icon_calendar{
   font-size: 20px !important;
   }
   }
   .btn_filter_active{
   padding: 8px; 
   border: 1px solid <?=$main_color;?>;
   border-radius: 25px;
   /*	width: 100px;*/
   background-color: <?=$main_color;?>;
   color: #fff;
   box-shadow: 1px 1px 1px #333;
   cursor: pointer;
   }
   .btn_filter{
   padding: 8px; 
   border: 1px solid <?=$main_color;?>; 
   border-radius: 25px;
   /*	width: 100px;*/
   cursor: pointer;
   }
   @media screen and (max-width: 320px) {
   .font-22{
   font-size : 14px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-24{
   font-size : 16px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-26{
   font-size : 18px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-28{
   font-size : 20px !important;
   font-family: 'Arial', sans-serif;
   }
   #date_report{
   font-size : 20px !important ; 
   height: 35px !important;
   }
   #icon_calendar{
   font-size : 20px !important ; 
   }
   /*.form-group{
   margin-bottom: 0px !important;
   }*/
   }
   .payment-menu{
   border-radius: 50%; background-color:#59AA47; display: block;  
   padding: 12px; 
   width: 50px;
   height: 50px; 
   color:#FFFFFF;  font-size:10px;  
   border: solid 2px #FFFFFF;
   text-align: center;
   vertical-align: middle;  box-shadow: 0px  0px 10px #DADADA  ; margin-left: -5px;  
   }
   .div-all-price{
   /* padding:3px;   
   border-radius: 8px; 
   border:  1px solid #ddd;*/
   background-color:#FFFFFF;  
   /*margin-bottom: 10px; */
   margin-top:0px; 
   /*	 box-shadow: 0px  0px 0px #DADADA  ;*/
   }
   .div-all-zello{
   padding:5px;
   border-radius: 0px;
   border: 1px solid #ddd;
   background-color:#FFF;
   margin-bottom: 5px;
   box-shadow: 0px 0px 0px #DADADA ;
   }
   .list-container{
   font-size: 16px;
   padding: 5px 0px;
   transform: 0.3s;
   /*   padding: 0px;*/
   }
   .w3-ul li{
   padding: 0px 5px;
   border-bottom: 1px solid #ddd;
   }
   .ico-pos{
   position: absolute;
   right: 0px;
   margin: 20px 10px;
   }
   .cancel-work-shop{
   box-shadow: 1px 2px 2px #35353575;
   width: 90px;
   border: 1px solid #a9a9a9;
   background: #FF5722;
   color: #fff;
   position: absolute;
   top: 50px;
   right: 15px;
   /*     margin: 50px 15px;*/
   text-align: center;
   border-radius: 10px;
   }
   .div-all-checkin{
   padding:5px;
   border-radius: 15px;
   border: 1px solid #ddd;
   background-color:#F6F6F6;
   margin-bottom: 5px;
   margin-top:5px;
   box-shadow: 0px 0px 10px #DADADA ;
   }
   .disabledbutton-checkin {
   pointer-events: none;
   background-color:#FFF;
   color:#FFF;
   border: 1px solid #88B34D;
   }
   .step-booking-small {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color:#FFFFFF;
   font-size:20px;
   font-weight:bold;
   margin-top:-10px;
   text-align:center;
   border: solid 4px #FFFFFF;
   background: #f39c12 !important;
   color: #fff;
   }
   .step-booking-small-no {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color:#FFFFFF;
   font-size:20px;
   font-weight:bold;
   margin-top:-10px;
   text-align:center;
   border: solid 4px #FFFFFF;
   background: #999999 !important;
   color: #fff;
   }
   .step-booking {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color:#FFFFFF;
   font-size:30px;
   font-weight:bold;
   text-align:center;
   margin-left:-5px;
   border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;
   background: #FF0000 !important;
   color: #fff;
   }
   .step-booking-active {
   border-radius: 50%;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color:#FFFFFF;
   font-size:30px;
   font-weight:bold;
   text-align:center;
   margin-left:-5px;
   border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;
   background: #59AA47 !important;
   color: #fff;
   }
   .form-group { background:none;
   }
   .box_his,.box_book{
   padding: 5px 0px;
   border: 1px solid #3b5998;
   margin-bottom: 10px;
   border-radius: 25px;
   box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
   }
   .mof{
   width: 100%;	
   position: relative;
   border: none;
   outline:none;
   cursor: pointer;
   background: #FFFFFF;
   color: #333;
   padding: 13px;
   border-radius: 2px;
   font-size: 22px;
   }
   .fab{
   border-radius: 50%;
   margin:0;
   padding: 20px;
   }
   .material{
   position:relative;
   color:white;
   margin: 20px auto;
   height:400px;
   width:500px;
   background:#f45673;
   }
   .ripple{
   overflow:hidden;
   }
   .ripple-effect{
   position: absolute;
   border-radius: 50%;
   width: 50px;
   height: 50px;
   background: white;
   animation: ripple-animation 2s;
   }
   @keyframes ripple-animation {
   from {
   transform: scale(1);
   opacity: 0.4;
   }
   to {
   transform: scale(100);
   opacity: 0;
   }
   }
   .text-white{
   color: #ffffff;
   }
</style>
<input id="check_open_worktbooking" value="0" type="hidden"/>
<input id="check_open_workshop" value="0" type="hidden"/>


<input  name="now_province"  type="hidden" class="form-control"  id="now_province" value=""   />

<script>
	$.post("mod/booking/shop_history/php_shop.php?query=history_by_order&order_id=<?=$_GET[order_id];?>",function(data){
		console.log(data);
//		return;
		var value = data.data[0];
		var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>&ios=<?=$_GET[ios];?>";
        		console.log(url);
   		      	$.post(url,value,function(data){
   		      		$('#load_mod_popup_clean').html(data);
   		      		$('#main_load_mod_popup_clean').show();

					$('#btn_cancel_book_'+value.id).css('top','unset');
   					$('.assas_'+value.id).css('margin-top','0px');
   					$("#load_material").fadeOut();

   		      	});
		
	});
	
</script>

<script>
   var load_main_icon_big="<div class='overlay' style='background-color:#FFFFFF; padding:15px;border: solid 1px #DADADA '><center> <i class='fa fa-circle-o-notch fa-spin 4x' style='font-size:100px; color:<?= $main_color_sorf ?>; ' ></i> </center><br><font style='font-size:14px; color:#333333 ' ><center><?
      echo t_load_data;
      ?></center></font></div>";
   var load_main_icon_big='<center><div class="inner-loading"><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px; color:<?= $main_color ?>; margin-top:20px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;; margin-top:10px "><center> <?
      echo t_load_data;
      ?></center></div></div>';
   var load_main_icon_big='<center><div class="inner-loading"><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px; color:<?= $main_color ?>; margin-top:10px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;; margin-top:10px "><center> <?
      echo t_load_data;
      ?></center></div></div>';
   var load_main_icon_mini="<div style='top:0; left:0'><table width='100%'  border='0' cellspacing='0' cellpadding='0'><tr><td style='width:24px; '><i class='fa fa-refresh fa-spin 2x' style='font-size:22px; color:<?= $main_color_sorf ?>; ' ></i> </td><td><font style='font-size:14px; color:#333333 ' ><?
      echo t_load_data;
      ?></center></font></td></tr></table></div> ";
   var load_main_icon_mod="<div style='top:0; left:0'><br><br><table width='100%'  border='0' cellspacing='0' cellpadding='0'><tr><td align='center' style='width:24px; '><i class='fa fa-refresh fa-spin 2x' style='font-size:60px; color:<?= $main_color_sorf ?>; ' ></i> <br><font style='font-size:14px; color:#333333 ' ><?
      echo t_load_data;
      ?></center></font></td></tr></table></div> ";
</script>