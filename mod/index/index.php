
<input type="hidden" value="0" id="check_open_shop_id" /> <!-- เช็คเมนูช้อปปิ้ง ว่ากำลังเปิด detail ของ id ไหน -->

<input id="check_open_worktbooking" value="0" type="hidden"/>
<div style="background-color:<?=$main_color;?>; height:120px; width:100%;margin-left:0px; margin-top:0px;display: none;" >
   <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-left:0px;position: absolute; margin-top: 10px;">
      <tbody>
         <tr style="display: none;">
            <td align="center" class="font-24"><font color="#FFFFFF">ยินดีต้อนรับเข้าสู่  <font color="#FFFFF"><B>T Share </B></font></font> </td>
         </tr>
         <tr  style="display:nones">
            <td align="center" class="font-24"><font color="#FFFFFF"><? echo t_today ?>&nbsp;<?=date("Y-m-d");?>&nbsp;<? echo t_time?> <span id="load_data_time"></span>  </font> </td>
         </tr>
         <tr>
            <td align="center" class="font-24">
               <font color="#FFFFFF"><?=t_login_province;?> (<span id="province_text" style="text-transform: capitalize;"></span>)</font>
               <!--  <span style="color: #fff;"><i class="fa fa-refresh" aria-hidden="true"></i></span>-->
            </td>
         </tr>
      </tbody>
   </table>
</div>
<script>
   var array_data = [];
   startTimeHome();
   var clock_h ;
   function startTimeHome() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTimeHome(m);
      s = checkTimeHome(s);
      document.getElementById('load_data_time').innerHTML = h + ":" + m + ":" + s;
      clock_h = setTimeout(startTimeHome, 1000);
   }
   function checkTimeHome(i) {
if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
return i;
}
</script>
<?
if($data_user_class=='taxi'){
   $filter="drivername=".$user_id." ";
} else {
   $filter="";
}
/// $_GET[day]='2017-07-20';
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$all_work = $db->num_rows('order_booking',"id","$filter");
?>
<div  style="margin-top:10px; width:100%; padding-right:0px;padding: 0px 0px;">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb-pd-4">
      <tbody>
         <tr>
            <td width="50%" align="center" class="">
               <center>
                  <a class="btn btn-default paddling-max background-airy"  id="index_menu_shopping" style="width:100%;">
                     <center>
                        <div  class="circle-menu" style="background-color:#34A0E7"><i class="icon-new-uniF14D" style="font-size: 22px;"  ></i></div>
                        <span style="padding-bottom:20px;" class="font-22 text-cap"><? echo t_send_to_customer?></span>
                     </center>
                  </a>
               </center>
            </td>
            <td align="center" class="">
               <input id="check_open_workshop" value="0" type="hidden"/>
               <center>
                  <a class="btn btn-default paddling-max background-airy"  id="index_menu_shopping_history" style="width:100%;">
                     <span id="number_shop" class="badge badge-custom font-22 pulse" style="display: none;">0</span>
                     <center>
                        <div  class="circle-menu" style="background-color:#34A0E7" id="circle_icon_shop">
                        	<center><i class="fa fa-history"style="font-size: 22px;margin-top: -2px;"  ></i></center>
                        </div>
                        <span style="padding-bottom:20px;" class="font-22 text-cap"><?=t_customer_history;?></span>
                     </center>
                  </a>
               </center>
               <script>
                  $('#index_menu_shopping_history').click(function(){
                     $('#check_open_workshop').val(1);
                     $( "#main_load_mod_popup" ).toggle();
                     console.log(array_data);
               //                return;
               var url_load = "load_page_mod.php?name=booking&file=all";
               $('#load_mod_popup').html(load_main_mod);
               $.post( url_load,{ book : array_data } ,function( data ) {
                  $('#load_mod_popup').html(data);
               });
               socket.emit('getdatadriver', 'room'); //call getbookinglab
               /* $('#load_mod_popup').html(load_main_mod);
               $('#load_mod_popup').load(url_load); */
            });
         </script>
      </td>
   </tr>
   <tr>
      <td width="50%" align="center" class="">
         <center>
            <a class="btn btn-default paddling-max background-airy"  id="index_menu_transfer"   style="width:100%" onclick="workTbooking();">
               <span id="number_tbooking" class="badge badge-custom font-22 pulse" style="display: none;" >0</span>
               <center>
                  <div  class="circle-menu"  style="background-color: #F7941D ">
                     <i class="icon-new-uniF10A-9" style="font-size:30px; margin-left:-7px;  "  ></i>
                  </div>
                  <span style="padding-bottom:20px;" class="font-22 text-cap"><? echo t_job_received?> </span>
               </center>
            </a>
         </center>
      </td>
      <td width="50%" align="center" class="">
         <center>
            <a class="btn btn-default paddling-max background-airy"  id="index_menu_transfer_his"   style="width:100%" onclick="historyTransfer();">
            <span id="number_tbooking_history" class="badge badge-custom font-22 pulse" style="display: none;">0</span>
               <center>
                  <div  class="circle-menu"  style="background-color: #F7941D ">
                     <center><i class="fa fa-history" style="font-size: 22px;margin-top: -2px; "  ></i></center>
                     </div>
                     <span style="padding-bottom:20px;" class="font-22 text-cap"><?=t_transfer_his;?> </span>
                  </center>
               </a>
            </center>
         </td>
      </tr>
      <tr>
         <td align="center" class="">
            <center>
               <a class="btn btn-default paddling-max background-airy"   onclick="revenue()"  id="index_menu_income"   style="width:100%">
                  <center>
                     <div  class="circle-menu"   > <i class="icon-new-uniF121-10" style="font-size: 22px;margin-top: -2px;margin-left:-2px; "></i></div>
                     <span style="padding-bottom:20px;" class="font-22 text-cap"><? echo t_receipts?></span>
                  </center>
               </a>
            </center>
         </td>
         <td align="center" class="">
            <a class="btn btn-default paddling-max background-airy"  id="index_menu_money" onclick="money_transfer()" style="width:100%">
               <center>
                  <div  class="circle-menu" style="background: #e91e63"><i class="fa fa fa-usd" style="font-size: 22px;margin-top: -2px; " ></i></div>
                  <span style="padding-bottom:20px;" class="font-22 text-cap">กระเป๋าเงิน-ประวัติ</span>
               </center>
            </a>
         </td>
      </tr>    
      <tr>
         <td  width="50%" align="center" class="">
            <a class="btn btn-default paddling-max background-airy"   id="index_menu_tour"   style="width:100%">
               <center>
                  <div  class="circle-menu"  style="background-color:#8DC63F"><i class="fa fa-suitcase" style="font-size: 22px;margin-top: -2px; " ></i></div>
                  <span style="padding-bottom:20px;" class="font-22 text-cap"><? echo t_tour_booking?> </span>
               </center>
            </a>
         </td>
         <td width="50%" align="center" class="">
            <a class="btn btn-default paddling-max background-airy" style="width:100%" id="booking_open">
               <center>
                  <div  class="circle-menu" style="background: #1CC1A4;"><i class="fa fa-taxi" style="font-size: 22px;margin-top: -2px; " ></i></div>
                  <span style="padding-bottom:20px;" class="font-22 text-cap"><? echo t_booking; ?></span>
               </center>
            </a>
         </td>
      </tr>
	<?php 
		if($user_id=='153'){
	?>
         <tr style="display: nones;">
            <td colspan="2" width="50%" align="center" class="" onclick="shoppingTest()">
 
                  <a class="btn btn-default paddling-max background-airy" style="width:100%" >
                     <center>
                        <div  class="circle-menu" style="background: #CDDC39;">
                        <i class="fa fa-map" style="font-size: 22px;margin-top: -2px; " ></i></div>
                        <span style="padding-bottom:20px;" class="font-22 text-cap">test Shop</span>
                     </center>
                  </a>

            </td>
         </tr>
          <tr style="display: nones;">
            <td colspan="2" width="50%" align="center" class="" >
 
                  <a class="btn btn-default paddling-max background-airy" style="width:100%" href="test.php" >
                     <center>
                        <div  class="circle-menu" style="background: #F44336;"><span style="margin-top: -1px; margin-left: -7px;position: absolute;">T</span></div>
                        <span style="padding-bottom:20px;" class="font-22 text-cap">test New Ui</span>
                     </center>
                  </a>

            </td>
         </tr>
	<? } ?>
      </tbody>
   </table>
   <script>
      var ckeckhis = false;
      $('#booking_open').click(function(){
         swal("กำลังจะเปิดให้บริการ");
         return;
         window.location = "https://www.welovetaxi.com/app/booking2/";
      });
      function revenue2(){
         ckeckhis = false;
         $('#main_load_mod_popup').show();
         var url_load= "load_page_mod.php?name=pay&file=pay_job";
         console.log(url_load);
         $('#load_mod_popup').html(load_main_mod);
         $('#load_mod_popup').load(url_load);
      }
      function revenue(){
         $('#main_load_mod_popup').show();
         var url_load= "load_page_mod.php?name=income&file=ic_main";
         console.log(url_load);
         $('#load_mod_popup').html(load_main_mod);
         $('#load_mod_popup').load(url_load);
      }
      function expenses(){
         ckeckhis = false;
   //alert('asasas')
   // $( "#main_load_mod_popup" ).toggle();
   $('#main_load_mod_popup').show();
   var url_load= "load_page_mod.php?name=pay&file=pay_job_expenses"
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
   console.log(url_load);
   $('#load_mod_popup').html(load_main_mod);
   $('#load_mod_popup').load(url_load);
}
function money_transfer(){
   /*swal("กำลังจะเปิดให้บริการ");
   return;*/
   ckeckhis = false;
   //alert('asasas')
   // $( "#main_load_mod_popup" ).toggle();
   $('#main_load_mod_popup').show();
   var url_load= "load_page_mod.php?name=pay&file=money_transfer"
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
   $('#load_mod_popup').load(url_load);
   $('#load_mod_popup').html(url_load);
}
function workTbooking(){
	$('#load_modal_body_alert').html(progress_bar);
	
   /*swal("กำลังจะเปิดให้บริการ");
   return;*/
   ckeckhis = false;
   $.post("mod/user/check_user.php?check=car_driver&user_id=<?=$user_id;?>",function(res){
   		console.log(res);
   		if(res.num<=0){
   			console.log('O')
			$('#material_alert').modal('open');
			
			$('#alertLabel').text('');
			var txt1 = '<p>คุณยังไม่มีรถที่ใช้งาน</p>';
			var txt2 = '<span>หากท่านต้องการรับงาน รถรับส่งจำเป็นต้องมีข้อมูลรถของท่านก่อน กรุณาเพิ่มข้อมูลรถของท่าน</span>';
			var txt3 = '<button class="btn btn-danger waves-effect waves-light" onclick="openNewCarOc(); " >เพิ่มรถ</button>';
			$('#load_modal_body_alert').html(txt1+" "+txt2+"<br/>"+txt3);
			
		}else{
			 $('#main_load_mod_popup').show();
		     var url_load = "load_page_mod.php?name=tbooking&file=all";
		     $('#load_mod_popup').html(load_main_mod);
		     $('#load_mod_popup').load(url_load);
		     $('#check_open_worktbooking').val(1);
		}
   });
  
}
function openNewCarOc(){
	$('#material_alert').modal('close');
	openNewCar();
}
function historyTransfer(){
   /*swal("กำลังจะเปิดให้บริการ");
   return;*/
   $('#main_load_mod_popup').show();
   var url_load= "load_page_mod.php?name=tbooking&file=his";
   $('#load_mod_popup').html(load_main_mod);
   $('#load_mod_popup').load(url_load);
   //        $('#check_open_worktbooking').val(1);
}
</script>
    
   <div class="background-smal-popup " id="load_mod_popup_select_pv" style="position: fixed;  overflow-y: scroll; -webkit-overflow-scrolling: touch;display: none;">
   	   <a style="color: #fff;" onclick="$('#load_mod_popup_select_pv').fadeOut(700);">
   	   <i class="material-icons" style="font-size: 36px;right: 15px; position: absolute; top: 15px;font-weight: bold;">close</i>
   	   </a>
       <div id="body_load_select_pv" style="overflow: auto;margin-top:45px; " >
         </div>
   </div>
   <input type="hidden" value="" id="txt_pv_fr"/>
      <input type="hidden" value="" id="area"/>
      <input type="hidden" value="" id="province_id"/>
      <input type="hidden" value="0" id="lat"/>
      <input type="hidden" value="0" id="lng"/>
      <input  name="now_province"  type="hidden" class="form-control"  id="now_province" value=""   />
   <script>
   		
      $('#close_small_select').click(function(){
         $('#popup_small_select').hide();
      });

      /*$('#index_menu_transfer').click(function(){  
      	  $("#main_load_mod_popup" ).toggle();
      	  var url_load= "load_page_mod.php?name=transfer_order&file=work_list_test&lat="+$('#lat').val()+"&lng="+$('#lng').val()+"&transfer_work=true";
      //	  var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
      	  console.log(url_load);
      	  $('#load_mod_popup').html(load_main_mod);
      	  $('#load_mod_popup').load(url_load); 
       	});*/
       function openMainShop(province,province_name){
       	console.log(province+" : "+province_name);
       	$("#main_load_mod_popup" ).toggle();
       	  var url_load= "load_page_mod.php?name=shop&file=maintype&id=1&type=stop&province="+province+"&province_name="+province_name;
       	  console.log(url_load)
      	  	$('#load_mod_popup').html(load_main_mod);
      	  	$('#load_mod_popup').load(url_load);
       }
        $('.close-small-popup').click(function(){
        		$('#load_mod_popup_select_pv').hide();
        		$('.background-smal-popup').removeClass('zindex-small-popup');
      //     		$('body').css('overflow','auto');
        		$('#show_main_tool_bottom span').removeClass('bottom-popup-icon-new-active');
        		$('#btn_home_bottom_menu').addClass('bottom-popup-icon-new-active');
        });
        
      /***************************** shopping old*******************************/
        function shoppingTest(){
			
        var user_id = "<?=$_SESSION['data_user_id'];?>";
		       $.post("mod/user/check_user.php?check=idcard_idrive&user_id="+user_id,function(res){
		       	console.log(res);
		       /*	if(res.idcard == ""){
		       		swal("คุณยังไม่ได้กรอกข้อมูลบัตรประชาชน");
		       		$( "#main_load_mod_popup" ).toggle();
		                	var url_load = "load_page_mod.php?name=user&file=job";
		               	$('#load_mod_popup').html(load_main_mod);
		                	$('#load_mod_popup').load(url_load); 
		       		return;
		       	}
		       	if(res.iddriving == ""){
		       		swal("คุณยังไม่ได้กรอกข้อมูลใบขับขี่");
		       		$( "#main_load_mod_popup" ).toggle();
		                	var url_load = "load_page_mod.php?name=user&file=job";
		               	$('#load_mod_popup').html(load_main_mod);
		                	$('#load_mod_popup').load(url_load); 
		       		return;
		       	}*/
//		       		$("#load_mod_popup_select_pv" ).fadeIn(700);
					$('#xxx').fadeIn();
		            var url_load= "empty_style.php?name=shop&file=select_province&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
//		             $('#body_load_select_pv').html(load_main_mod);

		             $.post( url_load, function( data ) {
//		             	   $('#body_load_select_pv').html(data);
		             	   $('#test_slide').html(data);
		          	   	   var txt = $('#province_text').text();
		          		   $('#txt_pv_fr').val(txt);
		          		   $('.text-change-province').text(txt);
		          	});
		       });
        }

      /***************************** shopping old*******************************/
       ///// food
       /*$('#index_menu_food').click(function(){  
        $("#load_mod_popup" ).toggle();
        var url_load= "load_page_mod.php?name=shop&file=main&id=2&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load); 
       	});
       $('#index_menu_tour').click(function(){  
        swal('กำลังจะเปิดให้บริการ');
        return;
         // $( "#main_load_mod_popup_4" ).toggle();
         // var url_load= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&lat=0&lng=0&type=stop";
         // $('#load_mod_popup_4').html(load_main_mod);
         // $('#load_mod_popup_4').load(url_load); 
       	});*/
   </script>  

</div>
<script>

   var userLang = navigator.language || navigator.userLanguage;
   userLang = userLang.split('-');
   var js_lng = userLang[0];
   console.log('Js Browser lng : '+js_lng);
   
   var id, target, options;
   var first_get_pos = true;
   var current, crd;
   target = {
	  latitude : 0,
	  longitude: 0
	};

	options = {
	  enableHighAccuracy: false,
	  timeout: 5000,
	  maximumAge: 0
	};
function success(pos) {

  if(first_get_pos==true){
  	 current = {
            lat: parseFloat(pos.coords.latitude),
            lng: parseFloat(pos.coords.longitude)
        };
//        console.log(current);
        showPosition(pos);
        first_get_pos = false;
  }
	 crd = {
            lat: parseFloat(pos.coords.latitude),
            lng: parseFloat(pos.coords.longitude)
        };
    	var radlat1 = Math.PI * current.lat / 180
        var radlat2 = Math.PI * crd.lat / 180
        var theta = current.lng - crd.lng;
        var radtheta = Math.PI * theta / 180
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist)
        dist = dist * 180 / Math.PI
        dist = dist * 60 * 1.609344;
        var m = dist * 1000;
//        console.log(m);
        //		if( JSON.stringify(current) != JSON.stringify(start) ){
        if (m > 50) {
        	showPosition(pos)
        	console.log(m);
            current = crd;
        }else{
//			return false;
		}  
}

function error(err) {
  console.warn('ERROR(' + err.code + '): ' + err.message);
}
id = navigator.geolocation.watchPosition(success, error, options);


function showPosition(position) {
      var cook_lng = getCookie("lng");
      if (cook_lng == 'th') {
         lng = "th";
      }
      else if (cook_lng == 'cn') {
         lng = "zh-CN";
      }
      else if (cook_lng == 'en') {
         lng = "en";
      }else{
         lng = "<?=$keep;?>";
      }
      console.log('Php Browser lng : '+lng);
      var url = 'https://maps.google.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=false&language='+lng+'&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';

$('#lat').val(position.coords.latitude);
$('#lng').val(position.coords.longitude);
//console.log(position.coords.latitude+" : "+position.coords.longitude);
$.post( url, function( data ) {
//   console.log(data);
   if(data.status=="OVER_QUERY_LIMIT"){
      console.log('OVER_QUERY_LIMIT');
   }else{
      /*console.log(data.results);
      console.log(data.results.length-2);
      console.log(data.results[data.results.length-2].address_components[0].long_name);*/
      var province = data.results[data.results.length-2].address_components[0].long_name;
      $('#province_text').text(province);
      $('#now_province').val(province);
      updatePlaceNum(province);
   }
});
}
function updatePlaceNum(province){
   var url = "mod/shop/select_province_new.php?op=get_id_province_only";
   $.post( url,{txt_pv  :province} ,function( data ) {
      var obj = JSON.parse(data);
//      console.log(obj);
      var province = obj.id;
      var area = obj.area;
      var url2 = "mod/shop/update_num_place.php?op=update_all&province="+province+'&area='+area;
      $.post( url2, function( data2 ) {
//             console.log(data2);
});
   });
}
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
</script>

<script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time();?>"></script>
<!-- <script src="socket.io/socket.io.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-latest.min.js?v=<?=time();?>"></script> -->
<script>
   
   
   var array_rooms;
   var res_socket ;
   var socket = io.connect('https://www.welovetaxi.com:3443');

          //on message received we print all the data inside the #container div
    socket.on('notification', function (data) {
//          console.log("Start Socket");
			
					 res_socket = data.transfer[0];
				  if(data.transfer[0].length>0){
				  	$('#number_tbooking').show();
				  }	 else{
				  	$('#number_tbooking').hide();
				  }
				  
		          $('#number_tbooking').text(data.transfer[0].length);
		           if($('#check_open_worktbooking').val()==1){
		           console.log(data.transfer);
		   //        console.log('now open popup');
		   		readDataBooking();
			
   		}
   });
   var shop_frist_run = 0;
   var user_class = "<?=$data_user_class;?>";
   var frist_socket = true;
   	socket.on('getbookinglab', function (data) { 
   //console.log(data.booking)
   	 array_data = [];
   	 var done = [];       
   	 var none = [];       
          $.each(data.booking,function(index,value){
          	var current = formatDate(new Date());
           var db = formatDate(value.transfer_date);
          	if(value.driver_complete == 0 ){
          		if(user_class=="lab"){
   				if(db == current){
   					done.push(value);
   				}
   			}
   			else {
   				if(db == current && value.drivername == "<?=$user_id;?>"){
   					done.push(value);
   				}
   			}
   		}
   		
          });
          array_data = {
   		manage : done,
   		history : none
   	};
   //        console.log(array_data);
   		if(done.length>0){
			$('#number_shop').show();
//			$('#circle_icon_shop').addClass("pulse");
		}else{
			$('#number_shop').hide();
//			$('#circle_icon_shop').removeClass("btn-floating pulse pd-5");
		}
      	$('#number_shop').text(done.length);
      	if($('#check_open_workshop').val()==1){
      		if(shop_frist_run==0){
   			shop_frist_run = done.length;
   		}
   		if(done.length!=shop_frist_run){
   			filterMenu('manage');
   			shop_frist_run = done.length;
   		}
   	}
      	/* check open order id auto */
      	if(frist_socket==true){
   		var get_order_id = "<?=$_GET['order_id'];?>";
   		var status = "<?=$_GET['status'];?>";
   		var open_ic = "<?=$_GET['open_ic'];?>";
   		if(get_order_id!=""){
   			if(status=="his"){
				openOrderFromAndroidHistory(get_order_id,status,open_ic);

			}else{
				console.log("order id : "+get_order_id);
   				console.log(array_data);
   				$.each(array_data.manage,function(index,value){
   			 	if(value.id==get_order_id){
   			 	
   			 	console.log(value.id+" : "+index);
   		      	$('#check_open_num_detail').val(index)
				$('#check_open_shop_id').val(value.id);
			   	var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
			      	$.post(url,value,function(data){
			      		$('#load_mod_popup_clean').html(data);
			      		$('#main_load_mod_popup_clean').fadeIn();

			      	});
			      	
//			      	$('#check_open_shop_id').val();	
   			 		
   				/*$('#main_load_mod_popup_6').show();
   		      	var url_load= "load_page_mod_6.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
   		       	console.log(url_load);
   		       	$('#text_mod_topic_action_6').html("เลขที่ "+value.invoice);
   		       	$('#load_mod_popup_6').html(load_main_mod);
   		       	$.post(url_load,value,function(data){
   		      		 $('#load_mod_popup_6').html(data); 
   					 $('#btn_cancel_book_'+value.id).css('top','60px');
   					 $('.assas_'+value.id).css('margin-top','30px');
   		      	});*/
        				
        		/*var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>&ios=<?=$_GET[ios];?>";
        		console.log(url);
   		      	$.post(url,value,function(data){
   		      		$('#load_mod_popup_clean').html(data);
   		      		$('#main_load_mod_popup_clean').show();
   		      		if('<?=$_GET[ios];?>'=="1"){
						$('#btn_cancel_book_'+value.id).css('top','unset');
   					 	$('.assas_'+value.id).css('margin-top','0px');
   					 	$("#load_material").fadeOut();
					}
   		      	});*/
   		      	
   		      	/*var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
        		console.log(url);
   		      	$.post(url,value,function(data){
   		      		$('#load_mod_popup_clean').html(data);
   		      		$('#main_load_mod_popup_clean').show();
   		      	});*/
   		      	
   				}
   			 });
			}
   			
   		}
      	frist_socket = false;
   	}
        });
   var id = '<?=$user_id?>';
     var dataorder={  
      order : parseInt(id),  
      };
      socket.emit('sendchat', '');
   // socket.on('connect', function(){  
      socket.emit('adduser', dataorder);
      //console.log(dataorder);
   // });
   socket.on('updaterooms', function(rooms, current_room) {
    $('#rooms').empty();
    console.log(rooms)
    array_rooms = rooms;
    console.log(current_room)
 });
   // socket.on("disconnect", function(){
   //    socket.disconnect();
   //      console.log("client disconnected from server");
   //  });
   var class_user = "<?=$_SESSION['data_user_class'];?>";
   // if(class_user=="lab"){

   socket.on('datalab', function (username, data) {
      console.log('***********************datalab***************************')
      console.log(username)
      console.log(data)
//console.log(data[0].id);
var check_open = $('#check_open_shop_id').val();
if(check_open!=0){
   $.each(data, function( index, value ) {
      if(value.id==check_open){
         console.log(value);
         if(value.check_driver_topoint==1){
            console.log("driver_topoint");
            changeHtml("driver_topoint",value.id,value.driver_topoint_date)
         }
         if(value.check_guest_receive==1){
            console.log("guest_receive");
            changeHtml("guest_receive",value.id,value.guest_receive_date)
         }
         if(value.check_guest_register==1){
            console.log("guest_register");
            changeHtml("guest_register",value.id,value.guest_register_date)
         }
         if(value.check_driver_pay_report==1){
            console.log("driver_pay_report");
            changeHtml("driver_pay_report",value.id,value.driver_pay_report_date)
         }
         var check_open_incom = $('#check_id_income_lab').val();
         if (typeof check_open_incom != 'undefined'){
            if(check_open_incom == check_open){
               console.log("Refresh Incom = "+check_open_incom+" | "+check_open);
               openViewPrice()
            }
         }
      }
   });
}
});
// }
// else{
   socket.on('updatedriver', function (username, data) {
      console.log("++++++++++++++++++++++datadriver++++++++++++++++++++++++++++++++")
      console.log(username)
      console.log(data)
      var check_open = $('#check_open_shop_id').val();
      if(check_open!=0){
         if(data.id==check_open){
            console.log(data)
            console.log(data.id);
            if(data.check_driver_topoint==1){
               console.log("driver_topoint");
               changeHtml("driver_topoint",data.id,data.driver_topoint_date)
            }
            if(data.check_guest_receive==1){
               console.log("guest_receive");
               changeHtml("guest_receive",data.id,data.guest_receive_date)
               $('#step_guest_register').show();
            }
            if(data.check_guest_register==1){
               console.log("guest_register");
               changeHtml("guest_register",data.id,data.guest_register_date)
               $('#step_driver_pay_report').show();
            }
            if(data.check_driver_pay_report==1){
               console.log("driver_pay_report");
               changeHtml("driver_pay_report",data.id,data.driver_pay_report_date)
            }
/*var check_open_incom = $('#check_id_income_lab').val();
if (typeof check_open_incom != 'undefined'){
console.log(check_open_incom);
//             alert(check_open_incom);
openViewPrice()
}*/
}
}
});
// }
/*socket.on('getbookinglabhis', function (data) {
console.log(data.booking)
});  */
function formatDate(date) {
   var d = new Date(date),
   month = '' + (d.getMonth() + 1),
   day = '' + d.getDate(),
   year = d.getFullYear();
   if (month.length < 2) month = '0' + month;
   if (day.length < 2) day = '0' + day;
   return [year, month, day].join('-');
}
function formatTime(date) {
   var d = new Date(date),
   hour = '' + d.getHours(),
   minutes = d.getMinutes();
   if(hour<10){
      hour = "0" + hour ;
   }
   if(minutes<10){
      minutes = "0" + minutes ;
   }
   return [hour, minutes].join(':');
}
function openOrderFromAndroid(id,status,open_ic){
//    alert("id = " + id+" status = "+status+" open_ic = "+open_ic);
if(status=="his"){
   openOrderFromAndroidHistory(id,status,open_ic)
}else{
   var check_open_shop_id = $('#check_open_shop_id').val();
   if(check_open_shop_id<=0){
      $.each(array_data.manage,function(index,value){
         if(value.id==id)                                                          {
/*$('#main_load_mod_popup_6').show();
var url_load= "load_page_mod_6.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
console.log(url_load);
$('#text_mod_topic_action_6').html("เลขที่ "+value.invoice);
$('#load_mod_popup_6').html(load_main_mod);
$.post(url_load,value,function(data){
$('#load_mod_popup_6').html(data);
$('#btn_cancel_book_'+value.id).css('top','60px');
$('.assas_'+value.id).css('margin-top','30px');
});*/
console.log(value.id+" : "+index);
$('#check_open_num_detail').val(index)
var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
$.post(url,value,function(data){
   $('#load_mod_popup_clean').html(data);
   $('#main_load_mod_popup_clean').show();
   if(open_ic=='1'){
      openViewPrice();
      console.log('Open Income')
   }
});
$('#check_open_shop_id').val(value.id);
}
});
   }
}
}

function openOrderFromAndroidHistory(id,status,open_ic){
//    alert(id);
$.post("mod/booking/shop_history/php_shop.php?query=history_by_order&order_id="+id,function(data){
   console.log(data);
   var value = data.data[0];
   var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
   console.log(url);
   $.post(url,value,function(data){
      $('#load_mod_popup_clean').html(data);
      $('#main_load_mod_popup_clean').show();
      $('#btn_cancel_book_'+value.id).css('top','unset');
//                   $('.assas_'+value.id).css('margin-top','0px');
$("#load_material").fadeOut();
if(open_ic=='1'){
   openViewPrice();
   console.log('Open Income')
}
});
});
}

getTansferJobNumber("<?=$user_id;?>","<?=date('Y-m-d');?>")
function getTansferJobNumber(driver,date){
	$.post("mod/tbooking/curl_connect_api.php?type=get_my_transfer_job",{ driver:driver, date:date },function(res){
		var num = res.data.result;
		console.log(num+" +++")
		
		if(num>0){
			$('#number_tbooking_history').show();
//			alert(32);
		}else{
			$('#number_tbooking_history').hide();
		}
//		$('#number_tbooking_history').show();
		$('#number_tbooking_history').text(num);
	});
}
</script>
<script>

  $('#index_menu_shopping').click(function(){
   	console.log('Shop');

      $(".text-topic-action-mod").text('ส่งแขก (ภูเก็ต)')
      var url = "mod/shop/update_num_place.php?id=1&province=1&op=update";
      $.post( url, function( data ) {
// console.log(data);
});
      var num = 1;
      if(num<=0){
         alert('ไม่มีสินค้า');
      }
      else{
         if(num==1){
            var id_place_one = 1;
            $("#main_load_mod_popup" ).toggle();
            var url_load = "load_page_mod.php?name=shop/shop_new&file=shop&driver=<?=$user_id?>&type="+id_place_one+"&province=1&detail=1";
            console.log(url_load);
            $('#load_mod_popup').html(load_main_mod);
            $.post( url_load, function( data ) {
               $('#load_mod_popup').html(data);
            });
         }else{
            console.log('1');
            $("#main_load_mod_popup" ).show();
            var url_load= "load_page_mod.php?name=shop/shop_new&file=main&id=11&type=stop&province=1";
            $('#load_mod_popup').html(load_main_mod);
            $('#load_mod_popup').load(url_load);
         }
      }
   });
   function sendSocket(id){
      console.log('Click');
//   var message = "";
var dataorder={
   order : parseInt(id),
};
socket.emit('sendchat', dataorder);
}
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
  