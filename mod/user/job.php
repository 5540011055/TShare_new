<!--<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css" />
<script src="js/jquery-main.js"></script> 
<script   src="calendar/js/th.js"></script>-->
<link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
<link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
<script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
<script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>
<script>
   $('.text-topic-action-mod').html('<?=t_important_data_file;?>');
</script>
<style type="text/css">
   <!--
      .topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
      }
      -->
   .ui-datepicker {
   width: 90%; max-width:400px; z-index:99;
   padding: 0; left:0px;
   }
   .ui-widget {
   font-size: 16px;  
   }
   .ui-datepicker table {
   font-size:18px; 
   }
   .date{
   z-index : 0;
   }
   /*  .picker__holder{
   height : unset !important;
   }*/
</style>
<?php 

if($arr[web_user][idcard]==""){
	$bd_al_idcard = "border-alert"; 
}
if($arr[web_user][iddriving]==""){
	$bd_al_iddriving = "border-alert"; 
}
?>
<form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >
   <div class="box box-default" style="margin-top:50px;">
      <div class="box-body" >
         <div class="row">
            <div class="col-md-12">
               <div>
                  <div class="topicname"><i class="fa  fa-credit-card"></i>&nbsp;<?=t_identity_card;?> </div>
                  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                     <tr>
                        <td width="70%" style="padding-right:5px; ">
                           <input name="idcard" type="text" class="form-control <?=$bd_al_idcard;?>" id="idcard"   value="<?=$arr[web_user][idcard];?>"  required="true"  >
                        </td>
                        <td id="pic_idcard"></td>
                     </tr>
                     <tr>
                        <td colspan="2" style="padding-right:5px; padding-top:10px; ">
                           <div class="input-group date" style="position:unset;">
                              <input id="idcard_finish"   class="datepicker"  name="idcard_finish" type="text" value="<?=$arr[web_user][idcard_finish];?>" style="font-size: 20px;  border: 1px solid #eeeeee;width:80%;margin-top: -7px;" /> 
                              <div class="input-group-addon pull-left"  id="btn_idcard_finish" style="cursor:pointer ; width:40px; margin-right:5px;">
                                 <i class="fa fa-calendar" style="font-size:24px; height:20px;"></i> 
                              </div>
                           </div>
                        </td>
                     </tr>
                  </table>
                  <div align="center" >
                     <img src="" id="imagePreview" class="idcard_showimg" alt="Preview Image" width="200px" style="border: 1px solid #ddd;    border-radius: 4px;    padding: 0px;    margin: 10px;   display: none;"/>
                  </div>
               </div>
               <div>
                  <br>
                  <div class="topicname"><i class="fa fa-credit-card"></i>&nbsp;<?=t_driver_license;?></div>
                  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                     <tr>
                        <td width="70%" style="padding-right:5px; ">
                           <input class="form-control <?=$bd_al_iddriving;?>" type="text" name="iddriving" id="iddriving"  required="true"    value="<?=$arr[web_user][iddriving];?>" >
                        </td>
                        <td id="pic_iddriving"></td>
                     </tr>
                     <tr>
                        <td colspan="2" style="padding-right:5px; padding-top:10px; ">
                           <div class="input-group date" style="position:unset">
                              <!--  <input type="text" class="form-control pull-right" value="<?=$arr[web_user][iddriving_finish];?>"  name="iddriving_finish" id="iddriving_finish"  readonly="true" style="background-color:#FFFFFF; height:35px; font-size:24px; ">             --> 
                              <input id="iddriving_finish"   class="datepicker"  name="iddriving_finish" type="text" value="<?=$arr[web_user][iddriving_finish];?>" style=" font-size: 20px;   border: 1px solid #eeeeee;width:80%;margin-top: -7px;" />  
                              <div class="input-group-addon pull-left"  id="btn_iddriving_finish" style="cursor:pointer ; width:40px; margin-right:5px;">
                                 <i class="fa fa-calendar" style="font-size:24px; height:20px;"></i> 
                              </div>
                           </div>
                        </td>
                     </tr>
                  </table>
                  <div align="center" >
                     <img src="" id="imagePreview2" class="iddriving_showimg" alt="Preview Image2" width="200px" style="border: 1px solid #ddd;    border-radius: 4px;    padding: 0px;    margin: 10px;   display: none;"/>
                  </div>
               </div>
               <!----- ปิด col--> 
            </div>
            <!---->
            <!----- ปิด col--> 
         </div>
         <!---->
       
         <div style="margin-top:10px;"  >
            <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
               <tr> 
                  <td width="100%">
                  <button id="submit_user_network" type="button" class="btn btn-block btn-primary" style="width:100%;padding: 8px;background-color:#3b5998;margin: 15px 0px;font-size: 18px;"><?=t_save_data;?></button>
                  </td>
               </tr>
            </table>
         </div>
      </div>
      <!----- ปิด row-->
   </div>
   <div id="popup_idcard"></div>
   <div id="popup_iddriving"></div>
   <script>
      var url_idcard= "empty_style.php?name=load/card&file=button&userid=<?=$arr[web_user][id];?>&type=idcard";
      $('#pic_idcard').load(url_idcard);
      var url_popup_idcard = "empty_style.php?name=load/card&file=pic&userid=<?=$arr[web_user][id];?>&type=idcard&title=บัตรประชาชน";
      $('#popup_idcard').load(url_popup_idcard);
      var url_iddriving= "empty_style.php?name=load/card&file=button&userid=<?=$arr[web_user][id];?>&type=iddriving";
      $('#pic_iddriving').load(url_iddriving);
      var url_popup_iddriving = "empty_style.php?name=load/card&file=pic&userid=<?=$arr[web_user][id];?>&type=iddriving&title=ใบอนุญาตขับขี่";
      $('#popup_iddriving').load(url_popup_iddriving);

      /// check login
      $("#submit_user_network").click(function(){ 
			/*var url = "popup.php?name=user&file=savedata&type=test&id=<?=$arr[web_user][id]?>";*/
	  if($('input[name="idcard"]').val()==""){
	  		swal("กรุณากรอกเลขบัตรประชาชน");
	  		return;
	  }		
	  if($('input[name="iddriving"]').val()==""){
	  		swal("กรุณากรอกใบอนุญาตขับขี่");
	  		return;
	  }		
      data_form = $('#edit_form').serialize();
      data = new FormData($('#edit_form')[0]);
      //					alert(url); mod/user/savedata.php?type=555
      	data.append('file_idcard', $('#imageUpload_idcard')[0].files[0]);
      	data.append('file_iddriving', $('#imageUpload_iddriving')[0].files[0]);
      	var id = '<?=$arr[web_user][id]?>';
       $.ajax({
                    url: 'mod/user/savedata_sub.php?type=save_maindoc&id='+id, // point to server-side PHP script 
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,                         
                    type: 'post',
                    success: function(php_script_response){
      //					                   alert(php_script_response);
      		var obj = JSON.parse(php_script_response);
      		   console.log(obj);
      		     if(obj.update_db==true){
      			   	/*$('#save').show();
      			   	 setTimeout(function(){ 
      				 $('#save').fadeOut(3000);
      				 }, 1000);*/
      				 	swal("<?=t_save_succeed;?>", "<?=t_press_button_close;?>", "success");
      			   }
      			  else{
      				/* $('#error').show();
      			   	 setTimeout(function(){ 
      				 $('#error').fadeOut(3000);
      				 }, 1000);*/
      				 	swal("<?=t_error;?>", "<?=t_press_button_close;?>", "error");
      			   }
                    }
         });
      });
   </script> 
</form>
<script>
   var date=$('#idcard_finish22').val();
     $('#idcard_finish22').pickadate({
         format: 'yyyy-mm-dd',
         formatSubmit: 'yyyy/mm/dd',
         closeOnSelect: true,
         closeOnClear: false,
         "showButtonPanel": false,
         onStart: function() {
             this.set('select', date); // Set to current date on load
         }
         });
</script>
<script>
   var date=$('#idcard_finish').val();
       $('#idcard_finish').pickadate({
           format: 'yyyy-mm-dd',
           formatSubmit: 'yyyy/mm/dd',
           closeOnSelect: true,
           closeOnClear: false,
           "showButtonPanel": false,
           onStart: function() {
               this.set('select', date); // Set to current date on load
           }
           });
</script> 
<script>
   var date=$('#iddriving_finish').val();
       $('#iddriving_finish').pickadate({
           format: 'yyyy-mm-dd',
           formatSubmit: 'yyyy/mm/dd',
           closeOnSelect: true,
           closeOnClear: false,
           "showButtonPanel": false,
           onStart: function() {
               this.set('select', date); // Set to current date on load
           }
           });
</script>
<script>
   $('#btn_idcard_finish').click(function(){
   // 		alert();
   var input1 = $('#idcard_finish').pickadate(); 
      var picker = input1.pickadate('picker');
    setTimeout(function(){ picker.open(true); }, 500);
   });
   	$('#btn_iddriving_finish').click(function(){
   // 		alert();
   var input1 = $('#iddriving_finish').pickadate(); 
      var picker = input1.pickadate('picker');
    setTimeout(function(){ picker.open(true); }, 500);
   });	
</script>