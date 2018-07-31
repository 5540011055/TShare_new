<script>
   var url = "mod/tbooking/load/component.php?request=check_status_checkin&status=<?=$_POST[driver_topoint]?>&time=<?=$_POST[driver_topoint_date];?>";
   $('#status_driver_topoint').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
   $('#status_driver_topoint').load(url);
</script>
<? 
   if($_POST[driver_topoint]== 1 ){ ?>
<script> 
   $("#step_driver_pickup").show();
      $('#iconchk_driver_topoint').attr("src", "images/yes.png");  
     $("#number_driver_topoint").removeClass('step-booking');
      $("#number_driver_topoint").addClass('step-booking-active');
       $("#box_driver_topoint").removeClass('border-alert');
      $("#btn_driver_topoint").css('background-color','#666666');
      $('#driver_topoint_locat_on').show()
      $('#driver_topoint_locat_off').hide()
</script>
<? } ?>
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
         <button  id="btn_driver_topoint" onclick="btn_driver_topoint()" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-26 text-cap" ><i class="icon-new-uniF12D-1" style="width:10px;"  ></i>ถึงสถานที่รับแขก</span></button></td>
      </tr>
      <tr>
         <td style="height:30px;">
            <div  id="status_driver_topoint" ><div class="font-22">
            <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></div>
         </td>
         <td width="30">
         	<table width="100%">
         		<tr>
         			<td>
	         			<i id="driver_topoint_locat_off"  class="material-icons" 
	         			style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;" >location_on</i>	
         				<i id="driver_topoint_locat_on" onclick="openPointMapsTransfer('driver_topoint','<?=$_POST[driver_topoint_lat]?>','<?=$_POST[driver_topoint_lng]?>');" class="material-icons" 
         				style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" >location_on</i>
         			</td>
         			<td>
	            <i id="photo_driver_topoint_no" class="material-icons" style="color:#3b59987a; font-size:22px; border-radius: 50%; padding:2px; border: 1px solid #3b59987a;display: none;" >photo_camera</i>
	            <i id="photo_driver_topoint_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;"  onclick="ViewPhoto('<?=$_POST[id];?>','driver_topoint','<?=$_POST[driver_topoint_date]?>');" >photo_camera</i>
         			</td>
         		</tr>
         	</table>
            
         </td>
      </tr>
   </tbody>
</table>
<input type="hidden" value="<?=$arr[book][driver_topoint];?>" id="driver_topoint_check_click"/>

</div>

<script>
	$.ajax({
			url: "../data/fileupload/store/tbooking/driver_topoint_<?=$_POST[id];?>.jpg",
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
	   $('#body_dialog_custom_load').html(load_sub_mod);
	   if($('#driver_topoint_check_click').val()!=1){
	    $( "#dialog_custom" ).show();

	   	var url_load= "empty_style.php?name=tbooking/load&file=checkin_popup&id=<?=$_POST[id]?>&type=driver_topoint";
	   	console.log(url_load);

	   	
	  	$('#body_dialog_custom_load').load(url_load); 
	   }
	   else{
	   }
   }
</script>