<div class="div-all-checkin">
<table width="100%" border="0" cellspacing="2" cellpadding="0" class=" border-alert" id="box_driver_topoint">
   <tbody>
      <tr>
         <td width="60" rowspan="2">
            <div class="step-booking"  id="number_driver_topoint">1</div>
            <div  style="position:absolute; margin-top:-40px; margin-left: -5px;">
               <img src="images/no.png"  align="absmiddle" id="iconchk_driver_topoint"    />
            </div>
         </td>
         <td colspan="2">
         <button  id="btn_driver_topoint" onclick="btn_driver_topoint()" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-26 text-cap" ><i class="icon-new-uniF12D-1" style="width:10px;"  ></i> <?=t_place_of_delivery;?></span></button></td>
      </tr>
      <tr>
         <td style="height:30px;">
            <div  id="status_driver_topoint" ><div class="font-20">
            <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></div>
         </td>
         <td width="30">
         	<table width="100%">
         		<tr>
         			<td>
	         			<i id="driver_topoint_locat_off"  class="material-icons" 
	         			style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: none;" >location_on</i>
         			
         				<i id="driver_topoint_locat_on" onclick="openPointMaps('driver_topoint','<?=$arr[book][id]?>');" class="material-icons" 
         				style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: nones;" >location_on</i>
         			
         			</td>
         			<td>
         				<!--<i id="photo_driver_topoint_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>-->
            <!-- <i id="photo_driver_topoint_yes" class="fa fa-camera" style="color:#3b5998; font-size:16px; border-radius: 50%; padding:5px;display: none; border: solid 2px #3b5998 ; " onclick="ViewPhoto('<?=$arr[book][id];?>','driver_topoint','<?=$arr[book][driver_topoint_date]?>');"></i>-->
	            <i id="photo_driver_topoint_no" class="material-icons" style="color:#3b59987a; font-size:22px; border-radius: 50%; padding:2px; border: 1px solid #3b59987a;display: none;" >photo_camera</i>
	            <i id="photo_driver_topoint_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;"  onclick="ViewPhoto('<?=$arr[book][id];?>','driver_topoint','<?=$arr[book][driver_topoint_date]?>');" >photo_camera</i>
         			</td>
         		</tr>
         	</table>
            
         </td>
      </tr>
   </tbody>
</table>
<input type="hidden" value="<?=$arr[book][check_driver_topoint];?>" id="driver_topoint_check_click"/>
<input type="hidden" id="check_code" value="<?=$arr[book][id];?>" />
</div>
<script>
	
	if($('#driver_topoint_check_click').val()==1){
		 $('#driver_topoint_locat_off').hide();
		 $('#driver_topoint_locat_on').show();
		 console.log($('#driver_topoint_check_click').val());
	}else{
		 $('#driver_topoint_locat_off').show();
		 $('#driver_topoint_locat_on').hide();
	}
	
	$.ajax({
			url: '../data/fileupload/store/driver_topoint_<?=$arr[book][id];?>.jpg',
			type:'HEAD',
			error: function()
			{
				console.log('Error file');

			   $('#photo_driver_topoint_yes').hide();
			   $('#photo_driver_topoint_no').show();
			   
//			   $('#driver_topoint_locat_off').show();
//			   $('#driver_topoint_locat_on').hide();
			},
			success: function()
			{
				//file exists
				console.log('success file');
				 $('#photo_driver_topoint_yes').show();
			     $('#photo_driver_topoint_no').hide();
			     
//			     $('#driver_topoint_locat_off').hide();
//			     $('#driver_topoint_locat_on').show();
				
			}
		});

 function btn_driver_topoint(){ 
   if($('#driver_topoint_check_click').val()!=1){
   		$('#body_dialog_custom_load').html(load_sub_mod);
    $( "#dialog_custom" ).show();
//   	var url_load= "load_page_mod_3.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=driver_topoint";
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=driver_topoint";
   	console.log(url_load);
//   	$('#body_dialog_custom_load').html(load_main_mod);
//   	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  	$('#body_dialog_custom_load').load(url_load); 
   }
   else{
   }
   	 }
</script>