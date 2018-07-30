<script>
   var url_driver_pickup = "mod/tbooking/load/component.php?id=<? echo $_POST[id];?>&request=check_status_checkin&type=driver_pickup&time=<?=$_POST[driver_pickup_date]?>&status=<?=$_POST[driver_pickup]?>";
   console.log(url_driver_pickup);
   $('#status_driver_pickup').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?=t_load_data;?>');
   $('#status_driver_pickup').load(url_driver_pickup);
</script>
<? 
   if($_POST[driver_pickup]==1 ){ ?>
<script> 
   $("#step_driver_complete").show();
   $("#btn_pickup_not_tr").hide();
      $('#iconchk_driver_pickup').attr("src", "images/yes.png");  
     $("#number_driver_pickup").removeClass('step-booking');
      $("#number_driver_pickup").addClass('step-booking-active');
      $("#box_driver_pickup").removeClass('border-alert');
   	   $("#btn_driver_pickup").css('background-color','#666666');
   	    $('#driver_pickup_locat_on').show()
      $('#driver_pickup_locat_off').hide()
   	   
</script>
<? } ?>

<div class="div-all-checkin">
<table width="100%" border="0" cellspacing="2" cellpadding="0" class=" border-alert" id="box_driver_pickup">
   <tbody>
      <tr>
         <td width="60" rowspan="2">
            <div class="step-booking"  id="number_driver_pickup">2</div>
            <div  style="position:absolute; margin-top:-40px; margin-left: -5px;">
               <img src="images/no.png"  align="absmiddle" id="iconchk_driver_pickup"    />
            </div>
         </td>
         <td colspan="2">
         <table width="100%">
         	<tr>
         		<td>
         			<button  id="btn_driver_pickup" onclick="btn_driver_pickup()" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-26 text-cap" ><i class="icon-new-uniF159-5" style="width:10px;"  ></i> <?=t_check_customer_name;?></span></button>
         		</td>
         	</tr>
         	 <tr id="btn_pickup_not_tr" >
         	 	<td>
                    <!--<td style="padding-top:5px"><button style="text-transform: capitalize;width:100%;text-align:center;padding:5px; background-color:#ff0000;  border-radius: 20px; border:none;" class="btn  btn-info"  id="btn_pickup_not_check" ><?=t_no_guests;?></button>-->
                    <button  id="btn_driver_pickup_no_meet" onclick="btn_driver_pickup_no_meet()" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#ff0000;  border-radius: 20px; border:none;color: #fff; "><span class="font-26 text-cap" ><i class="icon-new-uniF159-5" style="width:10px;"  ></i> <?=t_no_guests;?></span></button>
                    </td>
                  </tr>
         </table>
         </td>
      </tr>
      <tr>
         <td style="height:30px;">
            <div  id="status_driver_pickup" ><div class="font-22">
            <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></div>
         </td>
         <td width="30">
         	<table width="100%">
         		<tr>
         			<td>
	         			<i id="driver_pickup_locat_off"  class="material-icons" 
	         			style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;" >location_on</i>	
         				<i id="driver_pickup_locat_on" onclick="openPointMapsTransfer('driver_pickup','<?=$_POST[driver_pickup_lat]?>','<?=$_POST[driver_pickup_lng]?>');" class="material-icons" 
         				style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" >location_on</i>
         			</td>
         			<td>
	            <i id="photo_driver_pickup_no" class="material-icons" style="color:#3b59987a; font-size:22px; border-radius: 50%; padding:2px; border: 1px solid #3b59987a;display: none;" >photo_camera</i>
	            <i id="photo_driver_pickup_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;"  onclick="ViewPhoto('<?=$_POST[id];?>','driver_pickup','<?=$_POST[driver_pickup_date]?>');" >photo_camera</i>
         			</td>
         		</tr>
         	</table>
            
         </td>
      </tr>
   </tbody>
</table>
<input type="hidden" value="<?=$arr[book][driver_pickup];?>" id="driver_pickup"/>

</div>

<script>
$.ajax({
			url: "../data/fileupload/store/tbooking/driver_pickup_<?=$_POST[id];?>.jpg",
			type:'HEAD',
			error: function()
			{
				console.log('Error file');

			   $('#photo_driver_pickup_yes').hide();
			   $('#photo_driver_pickup_no').show();
			   
//			   $('#driver_topoint_locat_off').show();
//			   $('#driver_topoint_locat_on').hide();
			},
			success: function()
			{
				//file exists
				console.log('success file');
				 $('#photo_driver_pickup_yes').show();
			     $('#photo_driver_pickup_no').hide();
			     
//			     $('#driver_topoint_locat_off').hide();
//			     $('#driver_topoint_locat_on').show();
				
			}
		});
   function btn_driver_pickup(){
	   	 $('#body_dialog_custom_load').html(load_sub_mod);
	     if($('#driver_pickup').val()==0){

	    $( "#dialog_custom" ).show();
	   	var url_load= "empty_style.php?name=tbooking/load&file=checkin_popup&id=<?=$_POST[id]?>&type=driver_pickup";
	    	console.log(url_load);
	  		$('#body_dialog_custom_load').load(url_load); 
	    
	   }
   }
   
   function btn_driver_pickup_no_meet(){
			swal({
				  title: "คุณแน่ใจหรือไม่ ",
				  text: "ว่าคุณไม่เจอแขก (หากมีปัญหาภายหลัง ท่านต้องติดต่อรับเงินกับทางลูกค้าเอง)",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonClass: "btn-danger waves-effect waves-light",
				  cancelButtonClass: "btn-cus waves-effect waves-light",
				  confirmButtonText: "<?=t_yes;?>",
				  cancelButtonText: "<?=t_no;?>",
				  closeOnConfirm: false
				},
				function(){
				   $.post('mod/tbooking/curl_connect_api.php?type=no_meet_guest',function(){
				   	 
		      		 swal("<?=t_sign_out_successfully;?>","", "success");
		      		 	
		      		});
				  }); 
   }
</script>