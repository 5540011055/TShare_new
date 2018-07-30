<script>
   var url_driver_checkcar = "mod/tbooking/load/component.php?id=<? echo $_POST[id];?>&request=check_status_checkin&type=driver_checkcar&time=<?=$_POST[driver_checkcar_date]?>&status=<?=$_POST[driver_checkcar]?>";
   $('#status_driver_checkcar').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
   $('#status_driver_checkcar').load(url_driver_checkcar);
</script>
<? 
   if($_POST[driver_checkcar]==1 ){ 
   ?>
<script> 
   $("#step_driver_checkcar").show();
      $('#iconchk_driver_checkcar').attr("src", "images/yes.png");  
     $("#number_driver_checkcar").removeClass('step-booking');
      $("#number_driver_checkcar").addClass('step-booking-active');
    ///  $("#btn_driver_checkcar_<?=$_POST[id]?>").addClass('disabledbutton-checkin');
     $("#btn_driver_checkcar").css('background-color','#666666');
</script>
<? } ?>
<div class="div-all-checkin">
   <table width="100%" border="0" cellspacing="2" cellpadding="0" >
      <tbody>
         <tr>
            <td width="60" rowspan="2">
               <div class="step-booking"  id="number_driver_checkcar">4</div>
               <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_checkcar"    /></div>
            </td>
            <td colspan="2"><button  id="btn_driver_checkcar" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-26 text-cap"><i class="fa fa-car" style="width:10px;    margin-right: 15px;"  ></i> <?=t_check_luggage;?></span></button></td>
         </tr>
         <tr>
            <input type="hidden" value="<?=$_POST[driver_checkcar];?>" id="driver_checkcar_check_click"/>
            <td style="height:30px;">
               <div  id="status_driver_checkcar"></div>
            </td>
            <td  width="30">
              <table width="100%">
         		<tr>
         			<td>
	         			<!--<i id="driver_checkcar_locat_off"  class="material-icons" 
	         			style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: none;" >location_on</i>	
         				<i id="driver_checkcar_locat_on" onclick="openPointMapsTransfer('driver_checkcar','<?=$_POST[driver_checkcar_lat]?>','<?=$_POST[driver_checkcar_lng]?>');" class="material-icons" 
         				style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: nones;" >location_on</i>-->
         			</td>
         			<td>
	            <i id="photo_driver_checkcar_no" class="material-icons" style="color:#3b59987a; font-size:22px; border-radius: 50%; padding:2px; border: 1px solid #3b59987a;display: none;" >photo_camera</i>
	            <i id="photo_driver_checkcar_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;"  onclick="ViewPhoto('<?=$_POST[id];?>','driver_checkcar','<?=$_POST[driver_checkcar_date]?>');" >photo_camera</i>
         			</td>
         		</tr>
         	</table>
            </td>
         </tr>
      </tbody>
   </table>
  
   
   <?  ///  include ("mod/booking/load/form/price.php");?>
</div>
<script>
	$.ajax({
			url: "../data/fileupload/store/tbooking/driver_checkcar_<?=$_POST[id];?>.jpg",
			type:'HEAD',
			error: function()
			{
				console.log('Error file');

			   $('#photo_driver_checkcar_yes').hide();
			   $('#photo_driver_checkcar_no').show();
			   
//			   $('#driver_topoint_locat_off').show();
//			   $('#driver_topoint_locat_on').hide();
			},
			success: function()
			{
				//file exists
				console.log('success file');
				 $('#photo_driver_checkcar_yes').show();
			     $('#photo_driver_checkcar_no').hide();
			     
//			     $('#driver_topoint_locat_off').hide();
//			     $('#driver_topoint_locat_on').show();
				
			}
		});

      $("#btn_driver_checkcar").click(function(){
      	$('#body_dialog_custom_load').html(load_sub_mod);
      	if($('#driver_checkcar_check_click').val()==0){

          $( "#dialog_custom" ).show();
   	var url_load= "empty_style.php?name=tbooking/load&file=checkin_popup&id=<?=$_POST[idorder]?>&type=driver_checkcar";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
      }else{
      }
      });
   </script>      