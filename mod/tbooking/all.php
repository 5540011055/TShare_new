<script>
 $(".text-topic-action-mod").html('<?=t_job_received;?>');

 $('#load_booking_data').html(load_sub_mod);

</script>

<style>
	.tb-txt-left td{
		text-align: left;
	}
</style>
<div id="main_component" >

 <?
 if($data_user_class=='taxi'){
  $filter="and drivername=".$user_id." ";
} 
else { 
  $filter=""; 
}
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[web_user] = $db->select_query("SELECT id FROM web_driver WHERE username='" . $_SESSION['data_user_name'] . "'    ");
$arr[web_user] = $db->fetch($res[web_user]);
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[deposit] = $db->select_query("SELECT id,deposit,balance FROM deposit WHERE username='" . $_SESSION['data_user_name'] . "'    ");
$arr[deposit] = $db->fetch($res[deposit]);
?>
<input id="driver" value="<?=$arr[web_user][id];?>" type="hidden" />
<div style="
padding: 10px 20px;    border-radius: 25px;margin: 15px 0px;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);" align="center"><span class="font-26 text-cap" ><?=t_u_balance." ".number_format($arr[deposit][balance])." ".t_THB;?></span></div>
<input type="hidden" id="balance" value="<?=$arr[deposit][balance];?>" />

<div class="form-group" style="margin-bottom:5px;">
  <div align="center" style="padding: 5px;"><span class="font-26"><?=thai_date(time());?></span></div>
  <div class="input-group date" style="padding:0px;display: none;">
   <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px;z-index: 0;"  >               
   <div class="input-group-addon"  id="btn_calendar" style="cursor:pointer ">
    <i class="fa fa-calendar" style="font-size:26px; " id="icon_calendar"></i> 
  </div>
</div>
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
      //      			apiServiceBooking();
    }
  });
    }, 500);
  </script>
  <div id="load_booking_data"  style="padding:0px; margin-top:0px;display: nones;" align="center">
    
  </div>

  <table>
    <tr>
     <td colspan="2"></td>
   </tr>
 </table>
</div>
<input type="hidden" value="<?=date();?>" id="current_datetime" />
<script>
 var dataHistoryA;
 var txt_pay_cash = '';
 var txt_pay_trans = '';
 
function openDetailBooking(index, s_pay, s_cost, cost) {
     var dv_cost = $('#balance').val();
     console.log(dv_cost + " : " + s_cost + " type = " + s_pay);
     if (s_pay == 0) {
         if(class_user=="lab"){
		 	 $('#header_clean').text('งานรถรับ-ส่ง')
             var url = "empty_style.php?name=tbooking&file=book_detail";
             var post = res_socket[index];
             $.post(url, post, function(data) {
                 $('#load_mod_popup_clean').html(data);
                 $('#main_load_mod_popup_clean').show();
                 
             });
             return;
		 }
         if (dv_cost < s_cost) {
             //   		$('#material_dialog').show();
             $('#material_dialog').modal('open');
             $('#dialoglLabel').text('ข้อความ');
             var element1 = '<h4>ไม่สามารถรับงานนี้ได้</h4><div class="font-22" style="padding:5px;">ยอดเงินคงเหลือในระบบของคุณไม่สามารถรับงานนี้ได้ กรุณาเติมเงินเข้าระบบหรือติดต่อเจ้าหน้าที่ ขอบคุณค่ะ</div>';
             var element2 = '<a onclick="openMoneytransfer();" class="btn waves-effect waves-light lighten-3" style="border: 1px solid #eee;color: #fff;background-color: #009688 !important;"  >เติมเงินเข้าระบบ</a>';
             $('#load_modal_body').html(element1 + '' + element2);
             //				swal('ไม่สามารถรับงานนี้ได้','ยอดเงินคงเหลือในระบบของคุณไม่สามารถรับงานนี้ได้ กรุณาเติมเงินหรือติดต่อเจ้าหน้าที่ ขอบคุณค่ะ','error');
             return;
         } else {

             $('#header_clean').text('งานรถรับ-ส่ง')
             var url = "empty_style.php?name=tbooking&file=book_detail";
             var post = res_socket[index];
             $.post(url, post, function(data) {
                 $('#load_mod_popup_clean').html(data);
                 $('#main_load_mod_popup_clean').show();
             });
         }
     } 
	 else {
         /*var finalcost = parseInt(cost) - parseInt(s_cost);
         console.log(finalcost)*/
          $('#header_clean').text('งานรถรับ-ส่ง')
                 var url = "empty_style.php?name=tbooking&file=book_detail";
                 var post = res_socket[index];
                 $.post(url, post, function(data) {
                     $('#load_mod_popup_clean').html(data);
                     $('#main_load_mod_popup_clean').show();
            });
     }

 }

function openMoneytransfer(){
	$('#material_dialog').modal('close');
	money_transfer();
}


function readDataBooking(){
	console.log("Read Booking+++++++++++++++");
	console.log(res_socket);
      var num = 0;
   //	 	$('#load_booking_data .box_book').remove();
   $('#load_booking_data div').remove();
   $('#number_book').text(res_socket.length);
   if(res_socket.length<=0){
   	$('#load_booking_data').append('<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong><?=t_no_job;?></strong></div>');
   	return;
   }
	   $.each(res_socket,function(index,res){

	var d_db = timestampToDate(res.post_date);
	var d_cr = js_yyyy_mm_dd_hh_mm_ss();

	    if(d_cr>d_db){
		var time_post = CheckTime(d_db,d_cr);
		}else{
			var time_post = CheckTime(d_cr,d_db);
		}

       var program = res.program.topic_en;
       var pickup_place = res.pickup_place.topic;
       var to_place = res.to_place.topic;
       var outdate = res.outdate;
       var type = res.program.area;
       var time = res.airout_time;
       var id = 'id_list_'+num;
       var s_pay = res.s_status_pay;
       var cost = res.cost;
       var s_cost = res.s_cost;
       var pax = res.pax;
       var remark = res.remark;
       var car_type;
       if($.cookie("lng")=='en'){
         var car_type = res.car_type.topic_en;
       }else if($.cookie("lng")=='cn'){
         var car_type = res.car_type.topic_cn;
       }else if($.cookie("lng")=='th'){
         var car_type = res.car_type.topic_th;
       }else{

         var car_type = res.car_type.topic_<?=$keep;?>;
       }
       if(s_pay==0){
        var type_pay = '<?=t_get_cash;?>';
      }else{
        var type_pay = '<?=t_transfer_to_account;?>';
      }
      var component2 = 
      '<div class="box_book">'
      +'<span class="font-20 time-post">'+time_post+'</span>'
      +'<button class="mof ripple" id="id_list_'+num+'" onclick="openDetailBooking('+num+','+s_pay+','+s_cost+','+cost+');" style="padding: 0px;background:#fbfbfb;">'
      +'<div class="bar-item">'
      +'<table width="100%">'
      +'<tbody>'
               +'<tr>'
               +'<td>'
               +'<table width="100%" class="tb-txt-left" >'
               +'<tr style="line-height: 1.5;" >'
               +'<td width="100%"><span class="font-24" colspan="2">'+pickup_place+'</span></td>'
               +'</tr>'
               +'<tr style="line-height: 1.5;">'
               +'<td width="100%"><span class="font-24" colspan="2">'+to_place+'</span></td>'
               +'</tr>'
               +'<tr>'
               +'<td><strong><span class="font-22 ">'+type_pay+'</span>&nbsp;&nbsp;<span class="font-22" style="position: absolute;right: 15px;margin-top: 7px;">'+addCommas(cost)+'(-'+s_cost+')'+ '<?=t_THB;?></span></strong></td>'
               +'</tr>'
               +'<tr>'
               +'<td><span class="font-20 ">'+outdate+'&nbsp;&nbsp;'+time+'</span></td>'					              
               +'</tr>'
               +'<tr>'
               +'<td><span class="font-20">'+car_type+'</span><button class="btn-approve-job" ><span class="font-20"><?=t_accept_order;?></span></button></td>'	
               +'</tr>'
               +'<tr>'
               +'<td><span class="font-20 ">จำนวนแขก&nbsp;&nbsp;'+pax+' คน</span></td>'					              
               +'</tr>'
               +'<tr>'
               +'<td><span class="font-20 " style="color:red">Remark&nbsp;&nbsp;'+remark+'</span></td>'                       
               +'</tr>'
               +'</table>'
               +'</td>'
               +'</tr>'
               +'</tbody>'
               +'</table>'
               +'</div>'
               +'</button>'
               +'</div>';
              
               $('#load_booking_data').append(component2);
               num++;
             });
}

function selectjob(orderid, idorder, invoice, code, program, p_place, to_place, agent, airout_time, airin_time, cost, s_cost, outdate, ondate, s_status_pay, idbookcar, a, b, c, d) {
    var carid = $('#carid').val();
    var cartype = $('#cartype').val();
    console.log("Type Pay : " + s_status_pay)
    console.log(idbookcar + '**************************************' + cartype)
    if (parseInt(idbookcar) != parseInt(cartype)) {
        swal('ไม่สามารถรับงานได้', 'งานนี้ใช้' + a + b + ' ' + 'คุณใช้' + c + d, 'error');
        return;
    }
    if (cartype == '') {
        swal('กรุณาเลือกรถที่จะใช้งาน', '', 'error');
        return;
    }

    var driver = $('#driver').val();
    var finalcost = parseInt(cost) - parseInt(s_cost);
    console.log(finalcost)
    var txt_warning;
    txt_pay_cash = 'งานนี้เป็นงานที่ลูกค้าจ่ายเงินสด จำเป็นต้องหักเงินจากบัญชีในระบบ จำนวน ' + addCommas(s_cost) + ' บาท';
    txt_pay_trans = 'งานนี้แขกจ่ายเงินเข้าในระบบแล้ว' + "ยอดเงินทั้งหมดจะทำการโอนเงินทั้งหมดเข้าในกระเป๋าเงินของคุณ " + finalcost + " " + "บาท";
    if (s_status_pay == 0) {
        txt_warning = txt_pay_cash;
    } else {
        txt_warning = txt_pay_trans;
    }

    swal({
            title: "<?=t_job_confirmation;?>",
            text: txt_warning,
            type: "warning",
            confirmButtonClass: "btn-danger waves-effect waves-light",
            cancelButtonClass: "btn-cus waves-effect waves-light",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "<?=t_confirm;?>",
            cancelButtonText: "<?=t_cancelled;?>",
            closeOnConfirm: false
        },
        function() {
            var url_cja = "mod/tbooking/curl_connect_api.php?type=detect_driver_approve";
            /* check job approve */
            $.post(url_cja, {
                idorder: idorder
            }, function(res_check) {
                console.log(res_check.data.result.length);
                if (res_check.data.result.length > 0) { // check this job have driver approve ?
                    var data = {
                        "idorder": idorder,
                        "orderid": orderid,
                        "invoice": invoice,
                        "code": code,
                        "program": program,
                        "driver": driver,
                        "carid": carid,
                        "cartype": cartype,
                        "pickup_place": p_place,
                        "to_place": to_place,
                        "agent": agent,
                        "airout_time": airout_time,
                        "airin_time": airin_time,
                        "cost": cost,
                        "s_cost": s_cost,
                        "outdate": outdate,
                        "ondate": ondate
                    };
                    var url = "mod/tbooking/curl_connect_api.php?type=getjob_booking";
                    var bank_account = "Goldenbeach Tour";
                    var deposit_bank = "กสิกรไทย";
                    var bank_number = "909-609-6699";
                    var deposit_date = "<?=date('Y-m-d');?>";
                    var deposit_time = "<?=date('H:m');?>";
                    var username = '<?=$_SESSION["data_user_name"];?>';
                    var deposit = s_cost;
                    var his_ap = {
                        driver: driver,
                        idorder: idorder,
                        username: username,
                        deposit: deposit,
                        deposit_date: deposit_time,
                        type: "APPROVEJOB",
                        deposit_bank: deposit_bank,
                        bank_account: bank_account,
                        bank_number: bank_number,
                        deposit_date: deposit_date,
                        deposit_time: deposit_time,
                        post_date: '<?=time();?>',
                        post_date_f: deposit_date
                    };
                    console.log(data);
                  
                    $.post(url, data, function(res) {
                        console.log(res);
                        
                        if (res.status == "200") {
                            if (s_status_pay == 0) { // Pay Cash
                                $.post("mod/tbooking/curl_connect_api.php?type=php_approve_job", his_ap, function(logdata) {
                                    swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
                                    hideDetail();
                                    historyTransfer();
                                    console.log(logdata);
                                    getTansferJobNumber("<?=$user_id;?>","<?=date('Y-m-d');?>")
                                });
                            } else {

                                // Pay Transfer bank


                                hideDetail();
                                historyTransfer();
                                swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
                                //});
                            }
                        } else {
                            swal("<?=t_error;?>!", "<?=t_press_button_close;?>", "error");
                        }
                    });
                } else {
                    swal('ไม่สามารถรับงานได้', 'งานนี้มีคนขับคนอื่นรับงานแล้ว', 'error');
                    hideDetail();
                }
            });
        });
}

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
// $('#load_mod_popup_clean').css('animation','unset'); 
 console.log('hideDetail');
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

function CheckTime(d1,d2){
//      console.log(d1+" = "+d2);
          datetime1 = d1; 
          datetime2 = d2;
          //Set date time format
          var startDate = new Date(datetime1);
          var endDate   = new Date(datetime2);
          var seconds = (endDate.getTime() - startDate.getTime()) / 1000;
          //Calculate time
          var days = Math.floor(seconds / (3600*24));
          var hrs_d   = Math.floor((seconds - (days * (3600*24))) / 3600);
          var hrs   = Math.floor(seconds / 3600);
          var mnts = Math.floor((seconds - (hrs * 3600)) / 60);
          var secs = seconds - (hrs * 3600) - (mnts * 60);
          //old
          var hrs_d_bc = hrs_d;
          var mnts_bc = mnts;
          var secs_bc = secs;
          //Add 0 if one digit
          if(hrs_d<10) hrs_d = "0" + hrs_d;
          if(mnts<10) mnts = "0" + mnts;
          if(secs<10) secs = "0" + secs;
          var final_txt, day_txt, h_txy, m_txt, old_txt;
          if(days==0){
      day_txt = '';
    }else{
      day_txt = days+' วัน';
    }
    if(hrs_d_bc==0){
      h_txy = '';
    }else{
      h_txy = ' '+hrs_d_bc+' ชม.';
    }
    if(mnts_bc==0){
      m_txt = '';
    }else{
      m_txt = ' '+mnts_bc+' นาที';
    }
    final_txt = day_txt + h_txy + m_txt
    old_txt = days + ' ' + hrs_d + ':' + mnts + ':' + secs;
    if(days<=0 && hrs_d_bc<=0 && mnts_bc<=0){
    return "ไม่กี่วินาทีที่ผ่านมา";
  }
          return  final_txt+"ที่ผ่านมา";
      }
      function js_yyyy_mm_dd_hh_mm_ss () {
         now = new Date();
         year = "" + now.getFullYear();
         month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
         day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
         hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
         minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
         second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
         return year + "/" + month + "/" + day + " " + hour + ":" + minute + ":" + second;
       }

      function timestampToDate(unix_timestamp){
		var date = new Date(unix_timestamp*1000);
		var day = date.getDate();
		var month = date.getMonth()+1;
		if(month<=10){
			month = "0"+month;
		}
		if(day<=10){
			day = "0"+day
		}
		var year = date.getFullYear();
		var txt_date = year+"/"+month+"/"+day;

		var hours = date.getHours();
		var minutes = "0" + date.getMinutes();
		var seconds = "0" + date.getSeconds();
		var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
		//return formattedTime;
		return txt_date+" "+formattedTime;
	  }
    </script>