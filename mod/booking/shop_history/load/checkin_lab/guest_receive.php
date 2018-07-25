<div class="div-all-checkin">
   <table width="100%" border="0" cellspacing="2" cellpadding="0" class=" " id="box_guest_receive">
      <tbody>
         <tr>
            <td width="60" rowspan="2" >
               <div class="step-booking"  id="number_guest_receive">2</div>
               <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_receive" /></div>
            </td>
            <td colspan="2">
               <button  id="btn_guest_receive"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none;color: #fff; "><span class="font-26 text-cap"><i class="icon-new-uniF159-5" style="width:10px;"  ></i> <?=t_reception;?></span></button>
               <input type="hidden" value="<?=$arr[book][check_guest_receive];?>" id="guest_receive_check_click"/>
            </td>
         </tr>
         <tr>
            <td style="height:30px;">
               <div  id="status_guest_receive" ><div class="font-20"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></div>
            </td>
            <td  width="30">
               
              <!-- <i id="photo_guest_receive_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>
             <i id="photo_guest_receive_yes" class="fa fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px;display: none; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[book][id];?>','guest_receive','<?=$arr[book][guest_receive_date]?>');"></i>-->
             <table width="100%">
         		<tr>
         			<td>
         				<i id="guest_receive_locat_off"  class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;" >location_on</i>
         				<i id="guest_receive_locat_on" onclick="openPointMaps('guest_receive','<?=$arr[book][id]?>');" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" >location_on</i>
         			</td>
         			<td>
         				<i id="photo_guest_receive_no" class="material-icons" style="color:#3b59987a; font-size:22px; border-radius: 50%; padding:2px; border: 1px solid #3b59987a;display: none;"  >photo_camera</i>
            <i id="photo_guest_receive_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;"  onclick="ViewPhoto('<?=$arr[book][id];?>','guest_receive','<?=$arr[book][guest_receive_date]?>');" >photo_camera</i>
         			</td>
         		</tr>
         	</table>
            </td>
         </tr>
      </tbody>
   </table>
</div>

<script>
if($('#guest_receive_check_click').val()==1){
		 $('#guest_receive_locat_off').hide();
		 $('#guest_receive_locat_on').show();
	}else{
		 $('#guest_receive_locat_off').show();
		 $('#guest_receive_locat_on').hide();
	}
$.ajax({
			url: '../data/fileupload/store/guest_receive_<?=$arr[book][id];?>.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
			   /*$('#photo_guest_receive').css('color','#3b59987a');
			   $('#photo_guest_receive').css('border','1px solid #3b59987a');
			   $('#photo_guest_receive').attr('onclick',' ');*/
			   $('#photo_guest_receive_no').show();
			   $('#photo_guest_receive_yes').hide();

//				$('#guest_receive_locat_on').hide();
//			   $('#guest_receive_locat_off').show();
			},
			success: function()
			{
				//file exists
				/*console.log('success file');
				$('#photo_guest_receive').css('color','#3b5998');
				$('#photo_guest_receive').css('border','2px solid #3b5998');
				$('#photo_guest_receive').attr('onclick','ViewPhoto("'+id+'","photo_guest_receive","<?=TIMESTAMP;?>");');*/
				$('#photo_guest_receive_no').hide();
			   $('#photo_guest_receive_yes').show();
			   
//			    $('#guest_receive_locat_on').show();
//			   $('#guest_receive_locat_off').hide();
			}
		});
   $("#btn_guest_receive").click(function(){ 
   	
    if($('#guest_receive_check_click').val()==0){
    		$('#body_dialog_custom_load').html(load_sub_mod);
    	$( "#dialog_custom" ).show();
//   	 var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$arr[book][id]?>&type=guest_receive";
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=guest_receive";
//    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
    }else{
    }
   });
</script>