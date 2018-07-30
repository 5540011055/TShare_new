

<script>
   $(".text-topic-action-mod").html('<?=t_job_received;?>');
  
</script>

<!--<link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
   <link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
   <script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
   <script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script> -->

<div class="box " style="margin-top:50px;border-top: 0px;" id="main_component" >

   <?
      if($data_user_class=='taxi'){
      $filter="and drivername=".$user_id." ";
      } 
      else { 
      $filter=""; 
      }
     
      ?>
<input id="driver" value="<?=$_SESSION['data_user_id'];?>" type="hidden" />
   <div style="padding:0px 0px; margin: auto;margin-bottom: 5px">
		<table width="100%">
			<tbody>
			<tr>
				<td width="50%"><div id="btn_manage" class="btn_filter tocheck" align="center" onclick="FilterType('manage');" ><span class="font-22"><?=t_process;?></span></div>
				<span id="number_manage" class="badge font-20" style="position: absolute;top: -3px;left:120px;font-size: 14px;background-color: #F44336;">0</span>
				</td>
				
				<td width="50%">
				<div id="btn_history" class="btn_filter tocheck" align="center" onclick="FilterType('history');" ><span class="font-22"><?=t_history;?></span></div>
				<!--<span id="number_history" class="badge font-20" style="position: absolute;top: -5px;right: 5px;font-size: 14px;background-color: #F44336;">0</span>-->
				</td>
				
			</tr>
		</tbody>
		</table>
	</div>   
   <div class="form-group" style="margin-bottom:75px;display: none;">

      <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" 
      style=" z-index: 0;font-size: 20px;    text-align: center;"  >
      <!-- /.input group -->
   </div>
   <script>
      $('#btn_calendar').click(function(){
      // 		alert();
      var input1 = $('#date_report').pickadate(); 
         var picker = input1.pickadate('picker');
         setTimeout(function(){ picker.open(true); }, 500);
      });
   </script>
   <script>
      setTimeout(function(){ 
      var date=$('#date_report').val();
          $('#date_report').pickadate({
              format: 'yyyy-mm-dd',
              formatSubmit: 'yyyy/mm/dd',
              closeOnSelect: true,
              closeOnClear: false,
              "showButtonPanel": false,
              onStart: function() {
                  this.set('select', date); // Set to current date on load
         			console.log('open');
              },
      		  onSet: function(context) {
      			callApiLog();
      		  }
              });
       }, 500);
   </script>
   
  
   <div id="load_manage_data"  style="padding:0px; margin: 12px 0;display: nones;" class=""  align="center">
     	
   </div>
   <div id="load_history_data"  style="padding:0px; margin: 12px 0;display: none;" class=""  align="center">
     	
   </div>
	<button onclick="callApiLog();" style="display: none;">TEST</button>
</div>


<script>

 	var dataHistoryA;
 	var historyObj = [];
 	var manageObj = [];
	var driver = $('#driver').val();
	$('#btn_manage').click();
	callApiLog();
    function callApiLog(){
    	var date = $('#date_report').val();
    	var driver = $('#driver').val();
		$.post("mod/tbooking/curl_connect_api.php?type=history_booking",{driver:driver,date:date},function(res_api_hit){
	   		console.log(res_api_hit);
	   		var h = [];
	   		if(res_api_hit.status=="200"){
	   				historyObj = res_api_hit.data.result;
	   				console.log("his : "+historyObj.length)
//		   			if(historyObj.length>0){
//						$('#number_history').text(historyObj.length);
//					}
					eachObjHistory();
	   			}
	});
	}
	
	function callApiManage(){
    	var date = $('#date_report').val();
    	var driver = $('#driver').val();
    	console.log(date+" "+driver);
		$.post("mod/tbooking/curl_connect_api.php?type=manage_booking",{driver:driver, date:date},function(res_api_hit){
	   		console.log(res_api_hit);
	   		var m = [];
	   		if(res_api_hit.status=="200"){
	   				manageObj = res_api_hit.data.result;
	   				console.log("manage : "+manageObj.length)
//		   			if(manageObj.length>0){
						$('#number_manage').text(manageObj.length);
						
//					}
					eachObjManage();
	   			}
	});
	}
	
   function eachObjManage(){
//   	$('#load_manage_data .box_his').remove();
   	$('#load_manage_data div').remove();
    console.log(manageObj.length+"++++++++++");
   	if(manageObj.length<=0){
			$('#load_manage_data').append('<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong><?=t_no_job;?></strong></div>');
			return;
		}
		console.log(manageObj.length)
   	$.each(manageObj, function( index, value ) {
   			console.log(value);
   			var program = value.program.topic_en;
		  	var pickup_place = value.pickup_place.topic;
		  	var to_place = value.to_place.topic;
		  	var outdate = value.outdate;
		  	 
          	var type = value.program.area;
          	var time = value.airout_time;
   			var id = "btn_"+index;
   			var s_pay = value.s_status_pay;
		  	var cost = value.cost - value.s_cost;
		  	var s_cost = value.s_cost;
		  	if(s_pay==0){
		  		var type_pay = '<?=t_get_cash;?>';
		  	}else{
		  		var type_pay = '<?=t_transfer_to_account;?>';
		  	}
		      var component2 = 
		      '<div class="box_his">'
		      +'<span class="font-20 time-post">'+"รับเมื่อ "+formatDate(value.post_date)+' '+formatTime(value.post_date)+" น."+'</span>'
		      +'<a class="mof ripple" id="btn_'+index+'" onclick="openSheetHandle('+index+',1);rippleClick(\'' + id + '\');" style="padding: 0px; background: #fbfbfb;">'
   			  +'<div class="bar-item">'
		      +'<table width="100%">'
		         +'<tbody>'
		         	+'<tr>'
		         		
		         		+'<td>'
		         			+'<table width="100%"  >'
		         				+'<tr style="line-height: 1.5;" >'
					              +'<td width="100%"><span class="font-24" colspan="2">'+pickup_place+'</span></td>'
					            +'</tr>'
					            +'<tr style="line-height: 1.5;">'
					               +'<td width="100%"><span class="font-24" colspan="2">'+to_place+'</span></td>'
					            +'</tr>'
					             +'<tr>'
					               +'<td><strong><span class="font-22 ">'+type_pay+'</span>&nbsp;&nbsp;<span class="font-22" style="position: fixed;right: 25px;">'+addCommas(cost)+' <?=t_THB;?>'+'</span></strong></td>'
					               
					            +'</tr>'
					            +'<tr>'
					               +'<td><span class="font-20 ">'+outdate+'&nbsp;&nbsp;'+time+'</span></td>'
					               +'<td></td>'
					            +'</tr>'
		         			+'</table>'
		         		+'</td>'
		         	+'</tr>'
		         +'</tbody>'
		      +'</table>'
		      +'</div>'
		      +'</a>'
		      +'</a>'
		      +'</div>';
		      $('#load_manage_data').append(component2);
					});
   }	
  
   function eachObjHistory(){
//   	$('#load_history_data .box_his').remove();
   	$('#load_history_data div').remove();
   		console.log(historyObj);
   		if(historyObj.length<=0){
			$('#load_history_data').append('<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong><?=t_no_job;?></strong></div>');
			return;
		}
   	$.each(historyObj, function( index, value ) {
   			 console.log(value);
   			var program = value.program.topic_en;
		  	var pickup_place = value.pickup_place.topic;
		  	var to_place = value.to_place.topic;
		  	var ondate = value.ondate;
          	var type = value.program.area;
          	var time = value.airout_time;
   			var id = "btn_"+index;
   			var s_pay = value.s_status_pay;
//		  	var cost = value.s_cost;
		  	var cost = value.cost - value.s_cost;
		  	if(s_pay==0){
		  		var type_pay = '<?=t_get_cash;?>';
		  	}else{
		  		var type_pay = '<?=t_transfer_to_account;?>';
		  	}
		      var component2 = 
		      '<div class="box_his">'
		      +'<button class="mof ripple" id="btn_'+index+'" onclick="openSheetHandle('+index+',2);rippleClick(\'' + id + '\');" style="padding: 0px;">'
   			  +'<div class="w3-bar-item">'
		      +'<table width="100%">'
		         +'<tbody>'
		         	+'<tr>'
		         		+'<td width="30">'
		         			+'<div style="margin-top: -38px;margin-left: 5px;">'
							  +' <div style="background-color:  #795548;width: 10px;height: 10px; margin-left: 7px;"></div>'
							   +'<div style="width: 2px;background: #999;margin-left: 11px;height: 20px;" class="line-center"></div>'
							  +'<div style="background-color:  #3b5998;width: 10px;height: 10px; margin-left: 7px;"></div>'
							+'</div>'
		         		+'</td>'
		         		+'<td>'
		         			+'<table width="100%"  >'
		         				+'<tr style="line-height: 1.5;" >'
					              +'<td width="100%"><span class="font-24" colspan="2">'+pickup_place+'</span></td>'
					            +'</tr>'
					            +'<tr style="line-height: 1.5;">'
					               +'<td width="100%"><span class="font-24" colspan="2">'+to_place+'</span></td>'
					            +'</tr>'
					             +'<tr>'
					               +'<td><strong><span class="font-22 ">'+type_pay+'</span>&nbsp;&nbsp;<span class="font-22" style="position: absolute;right: 15px;">'+addCommas(cost)+' <?=t_THB;?></span></strong></td>'
					               
					            +'</tr>'
					            +'<tr>'
					               +'<td><span class="font-20 ">'+ondate+'&nbsp;&nbsp;'+time+'</span></td>'
					               +'<td></td>'
					            +'</tr>'
		         			+'</table>'
		         		+'</td>'
		         	+'</tr>'
		         +'</tbody>'
		      +'</table>'
		      +'</div>'
		      +'</button>'
		      +'</div>';
		      $('#load_history_data').append(component2);
					});
   }

   function FilterType(type){
//	console.log(type);
	$('.tocheck').removeClass('btn_filter_active');
	$('.tocheck').addClass('btn_filter');
	$('#btn_'+type).removeClass('btn_filter');
	$('#btn_'+type).addClass('btn_filter_active');
	
	if(type=="history"){
		$('.form-group').show();
		var driver = $('#driver').val();
			callApiLog();
//			eachObjHistory();
		$('#load_booking_data').hide();
		$('#load_manage_data').hide();
		$('#load_history_data').show();
		console.log(driver+" : ");
	}
	else if(type=="manage"){
		$('.form-group').hide();
		var driver = $('#driver').val();
			callApiManage();
//			eachObjManage();	   
		$('#load_booking_data').hide();
		$('#load_history_data').hide();
		$('#load_manage_data').show();
		console.log(driver+" : ");
	}
}

   function openDetailBooking(index){

	   	setTimeout(function(){ 
   			var url = "empty_style.php?name=tbooking&file=book_detail";
			var post = res_socket[index];

	   	$.post(url,post,function(data){
	   		$('#load_mod_popup_clean').html(data);
	   		$('#main_load_mod_popup_clean').show();
   			$('#main_component').removeClass('w3-animate-left');
	   	});
	   	 }, 0);
   }
   
   function openSheetHandle(index,type){
		$('#header_clean').text('จัดการงาน')
		if(type==1){
			var post = manageObj[index];
		}else if(type==2){
			var post = historyObj[index];
		}
   		setTimeout(function(){ 
   		
   		
   			var url = "empty_style.php?name=tbooking&file=sheet_handle";
			

	   	$.post(url,post,function(data){
	   		$('#load_mod_popup_clean').html(data);
	   		$('#main_load_mod_popup_clean').show();
   			$('#main_component').removeClass('w3-animate-left');
	   	});
	   	 }, 0);
   }

  /* function backMain(){
   	console.log('back');
   	$('#main_load_mod_popup .back-full-popup').fadeIn(500);
   	$('#show_main_tool_bottom').fadeIn(500);
     		$('#sub_component').hide();
     		$('#main_component').addClass('w3-animate-left');
     		$('#main_component').show();
   }*/
	
	function mapsSelector(lat,lng) {
	  if /* if we're on iOS, open in Apple Maps */
	    ((navigator.platform.indexOf("iPhone") != -1) || 
	     (navigator.platform.indexOf("iPad") != -1) || 
	     (navigator.platform.indexOf("iPod") != -1))
	    window.open("maps://maps.google.com/maps?daddr="+lat+","+lng+"&amp;ll=");
	else /* else use Google */
	    window.open("https://maps.google.com/maps?daddr="+lat+","+lng+"&amp;ll=");
	}
	
	function hideDetail(){
		$('#main_load_mod_popup_clean').hide(); 
		$('#show_main_tool_bottom').fadeIn(500); 
//		$('#main_component').addClass('w3-animate-left');
	}

 	function ViewPhoto(id,type,date){
		var url = 'load_page_photo.php?name=tbooking/load&file=iframe_photo&id='+id+'&type='+type+'&date='+date;
		console.log(url);
		$( "#load_mod_popup_photo" ).toggle();
		
		$('#load_mod_popup_photo').html(load_main_mod);
  		
  		
 	 $('#load_mod_popup_photo').load(url); 
 	 
// 	 $('#text_mod_topic_action_photo-txt').text('crfdfdsdsf'); 

	}		
	
	function openPointMapsTransfer(type,lat,lng){
		var data = {
			type : type,
			lat : lat,
			lng : lng
		}
		console.log(data);
		 $("#main_load_mod_popup_map" ).show();
	     $('#load_mod_popup_map').html(load_main_mod);
	     var url_load = "load_page_map.php?name=map_api&file=map_point_transfer&type="+type+"&lat="+lat+"&lng="+lng;
	     console.log(url_load);
	     $('#load_mod_popup_map').load(url_load); 
	}
	
 </script>
