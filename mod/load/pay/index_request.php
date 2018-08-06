<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css">
<!-- <script src="js/jquery-main.js"></script>  -->
<!-- <script   src="calendar/js/th.js"></script> -->
<?php 
include('../../../includes/class.mysql.php');
 mysql_query("SET NAMES utf8"); 
  mysql_query("SET character_set_results=utf-8");
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$select = "SELECT * FROM web_bank where status = 1  ";
$res[bank] = $db->select_query($select);
// $row_data[];
//$databank =json_decode($arr[bank_tr]);
?>
<!-- <script   src="calendar/js/th.js"></script> -->
<link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
<link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
<script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
<script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>

<div style="font-size: 18px;
    font-weight: 600;
    padding: 0px 10px;
    margin-top: 15px;">
    <? echo t_transferred_account_details?>
</div>
<div style="margin-top: 15px;
    padding: 8px;
    border-radius: 15px;">
    <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td>
                <div>
                    <table>
                        <tr>
                            <td width="80" class="font_18 " style="height:30px;font-size: 14px;  padding-left:5px;">
                                <? echo t_transfer_banks?>
                            </td>
                            <td width="" class="font_16 " style="color:#333;font-size: 14px;">
                                <select class="form-control" name="bank" id="selectbank_tr" style="border-radius: 25px;padding: 0 15px; " onchange="selectbank_tr(this.value)">
                                    <?php while($arr[bank] = $db->fetch($res[bank])){
$row_data[] = $arr[bank]; ?>
                                    <option value="<?php echo $arr[bank][id];?>">
                                        <?php echo $arr[bank][bank_company];?>
                                    </option>
                                    <?php } echo json_encode($row_data); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="80" class="font_18 " style="height:30px;font-size: 14px;  padding-left:5px;">
                                <? echo t_account_name?>
                            </td>
                            <td width="" class="font_16 " style="color:#333;font-size: 14px;">
                                <input class="form-control" name="bank" id="b_acount" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td width="80" class="font_18 " style="height:30px; font-size: 14px; padding-left:5px;">
                                <? echo t_account_number?>
                            </td>
                            <td width="" class="font_16 " style="color:#333;font-size: 14px;">
                                <input class="form-control" name="bank" id="b_number" disabled>
                                <input type="hidden" class="form-control" name="bank" id="b_bank" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td width="80" class="font_18 " style="height:30px;font-size: 14px;  padding-left:5px;">
                                <? echo t_today?>
                            </td>
                            <td>
                                <div class="input-group date" style="padding:0px;width: 100%">
                                    <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>" name="date_request" id="date_request" readonly="true">
                                    <!-- <div class="input-group-addon"  id="btn_calendar2" style="cursor:pointer "> -->
                                    <i class="fa fa-calendar icon_calendar" style="pointer-events: none;
    position: absolute;
    font-size: 22px;
    padding: 8px;
    right: 9px;
    border-left: 1px solid #ddd;margin-top: 8px;"></i>
                                    <!--  </div> -->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="80" class="font_18" style="height:30px; font-size: 14px; padding-left:5px;">
                                <? echo t_minutes?>
                            </td>
                            <td width="" class="font_16" style="color:#FF0000;font-size: 14px;"> <input type="text" placeholder="xx:xx" class="form-control" name="time" id="time">
                            </td>
                        </tr>
                        <tr>
                            <td width="80" class="font_18" style="height:30px; font-size: 14px; padding-left:5px;">
                                <? echo t_amount?>
                            </td>
                            <td width="" class="font_16" style=" color:#FF0000;font-size: 14px;"> <input class="form-control" placeholder="3xxx" type="text" name="amount" id="amount">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div style="
    text-align: center;
    font-size: 19px;
    font-weight: 600;
    margin-top: 20px;">
                                    <? echo "อัพโหลดสลิปโอนเงิน";?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="money_request">
                                </div>
               
               <div style="background-color: #f3f3f3;padding: 10px 5px;border: 1px solid #ddd;margin-top: 10px;" ><!--take_photo-->
                  <center>
                 
                  <div style="padding: 5px 10px;"><?=$txt_photo;?></div>
                  <table class="onlyThisTable" width="100%" border="0" cellspacing="2" cellpadding="2" >
                     <tbody>
                        <tr>
                           
                           <td width="100">
                              <label class="input-group-btn" >
                                 <button class="btn btn-primary" style="width:100px; z-index:0;padding: 6px;border-radius: 15px !important;color: #fff !important;" id="icon_camera_checkin">
                                 	<span class="font-22">
                                    <i class="fa  fa-camera"></i>&nbsp;<?echo t_take_photos?>
                                    </span>
                                 </button>
                              </label>
                           </td>
                           <td><span class="input-group" style="margin-top:5px;">
                              <input type="text"  value="<?echo t_no_photo_available?>" class="photo-no-active" readonly  style="padding-left:5px; margin-top:-5px; padding-right:0px; width:100%; height:35px;" id="url_photo">
                              </span>
                           </td>
                           <td width="30">        
                              <button type="button" class="btn btn-default " data-toggle="modal" style="padding-left:5px; padding-right:5px; width:30px" id="del_photo"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  
                  <div style="padding:5px;display: none;" id="pg_upload_bar">
                     <div class="progress">
					      <div class="indeterminate"></div>
					  </div>
                  </div>
                  
                  <img id="image_slip" name="image_slip"  style="width:100%; padding:5px; margin-top:0px;border-radius:15px;display: none;" />
                  
                  </center>
               </div>
           
                            </td>
                        </tr>
                    </table>
                  <table class="tb-pd-5" width="100%" border="0" style="margin-bottom: 10px;margin-top: 20px;">
				      <tbody>
				         <tr>
				            <td width="50%">
				               <button id="reset_data_slip" type="button" class="btn waves-effect waves-light lighten-2 " style="width:100%;background-color:#9E9E9E;  border-radius: 0px;color: #fff;">
				                  <span class="font-24">
				                     <center>รีเซ็ต</center>
				                  </span>
				               </button>
				            </td>
				            <td width="50%">
				               <button id="btn_save_slip" type="button" class="btn waves-effect waves-light lighten-2 " style="width:100%;background-color:#3b5998;  border-radius: 0px;color: #fff;">
				                  <span class="font-24">
				                     <center>บันทึก</center>
				                  </span>
				               </button>
				            </td>
				         </tr>
				      </tbody>
				   </table>
                </div>
            </td>
        </tr>
    </table>
</div>
<form action="" method="post" id="photo_form" enctype="multipart/form-data">   	
<input type='file' id="imgInp" style="opacity: 0;" />
</form>
<script>
	$("#icon_camera_checkin").click(function(){  
//   document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
   $("#imgInp").click(); 
   });
   function readURL(input) {
	  $('#pg_upload_bar').show();
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      	$('#image_slip').attr('src', e.target.result);
	      
		    $('#url_photo').val('มีภาพถ่ายแล้ว');
			$('#icon_camera_checkin').removeClass('btn-primary');
			$('#icon_camera_checkin').addClass('green');
			$('#del_photo').removeClass('btn-default');
			$('#del_photo').addClass('btn-danger');
			$('#pg_upload_bar').hide();
			$('#image_slip').show();
	      
	    }
		
	    reader.readAsDataURL(input.files[0]);
	    
	  }
	  
	}

	$("#imgInp").change(function() {
	  readURL(this);
	});
</script>
<script>
    $('.text-topic-action-mod').html('แจ้งโอน');


    $('#date_request').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy/mm/dd',
        closeOnSelect: true,
        closeOnClear: false,
        "showButtonPanel": false,
        onStart: function() {
        	var date = "<?=date('Y-m-d');?>";
            console.log(date)
            this.set('select', date); // Set to current date on load
            var url_place_th = "go.php?name=load/pay&file=index_job&server=th&driver=<?=$_COOKIE["
            app_remember_user "];?>&date=" + date;
            $('#load_th').show();
            //$('#load_th').load('load/page/loading.php');
            $('#load_th').load(url_place_th);
        },
        onSet: function(context) {
            var date = $('#date_request').val();
            var url_place_th = "go.php?name=load/pay&file=index_job&server=th&driver=<?=$_COOKIE["
            app_remember_user "];?>&date=" + date;
            $('#load_th').show();
            //$('#load_th').load('load/page/loading.php');
            $('#load_th').load(url_place_th);
            //QueryData();
        }
    });
    $('.text-topic-action-mod').html('<?echo t_transfer_notice?>');
    selectbank_tr(1)
    function selectbank_tr(x) {
        var databank = <?=json_encode($row_data);?>
        // for (var i = 0; i < databank.length; i++;) {
        //   console.log(databank[i]);
        // }
        databank.forEach(function(data) {
            if (x == data.id) {
                console.log(data);
                $('#b_acount').val(data.bank_acount)
                $('#b_number').val(data.bank_number)
                $('#b_bank').val(data.bank_company)
            }
        });
        // var x = document.getElementById("fname");
        // x.value = x.value.toUpperCase();
        console.log(databank)
        console.log(databank.length)
        console.log(x)
    }
    
    
     $('#btn_save_slip').click(function(){   

  var lat = $('#lat').val();
  var lng = $('#lng').val();
  var time = $('#time').val();
  var amount = $('#amount').val();
  var bank = $('#bank').val();
  var b_acount = $('#b_acount').val();
  var b_number = $('#b_number').val();
  var b_bank = $('#b_bank').val();
  console.log(time)
  console.log(amount)
  console.log(bank)
  console.log(date)
  var data = {'bank_name':b_acount,'bank_number':b_number,'time':time,'amount':amount,'bank':b_bank,'driver':'<?=$_COOKIE["app_remember_user"];?>','action':'money_request','date':date };
  console.log(data)
//  return;
   $.ajax({
            type: 'POST',
            url: 'mod/booking/load/form/savedata_request.php',
            data: {'bank_name':b_acount,'bank_number':b_number,'time':time,'amount':amount,'bank':b_bank,'driver':'<?=$_COOKIE["app_remember_user"];?>','action':'money_request','date':date },
            success: function(data) {
                console.log(data)
                uploadSlip(data.last_id);
                  swal('รอยืนยันการตรวจสอบการโอนเงิน')
                  $('#main_load_mod_popup').toggle();
                   $('#main_load_mod_popup').show(500);
   var url_load= "load_page_mod.php?name=pay&file=money_transfer"
//    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
    
    
    $('#load_mod_popup').html(load_main_mod);
   
    $('#load_mod_popup').load(url_load); 
               }
             });
  


  	});

 $('#del_photo').click(function(){
 	$('#imgInp').val("");
 	$('#icon_camera_checkin').addClass('btn-primary');
	$('#icon_camera_checkin').removeClass('green');
 	$('#url_photo').val('ไม่มีภาพถ่าย');
 	$('#image_slip').hide();
 	$('#del_photo').removeClass('btn-danger');
	$('#del_photo').addClass('btn-default');
 });
 
 function uploadSlip(id){
 	var url = "mod/load/pay/upload.php?id="+id;
   				data_form = $('#photo_form').serialize();    
   				data = new FormData($('#photo_form')[0]);
      			data.append('fileUpload', $('#imgInp')[0].files[0]);
   				   $.ajax({
   				                url: url, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
   				                   console.log(php_script_response);
   				                   setTimeout(function() {
				                                $.ajax({
							                            url: '../data/fileupload/pay/slip_trans_'+id+'.jpg',
							                            type: 'HEAD',
							                            error: function() {
							                                console.log('Error file');
							                            },
							                            success: function() {
							                                //file exists
							                                console.log('success file');
							                                
							                            }
							                        });
                            }, 1500); 
   				                   
   				                }
   				     });
 }
</script>