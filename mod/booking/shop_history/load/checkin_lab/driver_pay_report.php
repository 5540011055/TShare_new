
<div class="div-all-checkin">
   <table width="100%" border="0" cellspacing="2" cellpadding="0" >
      <tbody>
         <tr>
            <td width="60" rowspan="2">
               <div class="step-booking"  id="number_driver_pay_report">4</div>
               <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_pay_report"    /></div>
            </td>
            <td colspan="2"><button  id="btn_driver_pay_report" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius:  20px; border:none;color: #fff; "><span class="font-26 text-cap"><i class="icon-new-uniF121-10" style="width:10px;"  ></i> <?=t_income_statement;?></button></td>
         </tr>
         <tr>
            <input type="hidden" value="<?=$arr[book][check_driver_pay_report];?>" id="driver_pay_report_check_click"/>
            <td style="height:30px;">
               <div  id="status_driver_pay_report"><div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></div>
            </td>
            <td  width="30">
              <!-- <i  id="photo_driver_pay_report" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[book][id];?>','driver_pay_report','<?=$arr[book][driver_pay_report_date]?>');" ></i>-->
              
              <!--<i id="photo_driver_pay_report_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>
             <i id="photo_driver_pay_report_yes" class="fa fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px;display: none; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[book][id];?>','driver_pay_report','<?=$arr[book][driver_pay_report_date]?>');"></i>-->
              <table width="100%">
         		<tr>
         			<td>
         				<!--<i id="driver_pay_report_locat_off"  class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;" >location_on</i>
         				<i id="driver_pay_report_locat_on" onclick="openPointMaps();" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" >location_on</i>-->
         			</td>
         			<td>
         				<i id="photo_driver_pay_report_no" class="material-icons" style="color:#3b59987a; font-size:22px; border-radius: 50%; padding:2px; border: 1px solid #3b59987a;display: none;"  >photo_camera</i>
            <i id="photo_driver_pay_report_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;"  onclick="ViewPhoto('<?=$arr[book][id];?>','driver_pay_report','<?=$arr[book][driver_pay_report_date]?>');">photo_camera</i>
         			</td>
         		</tr>
         	</table>
              
            </td>
         </tr>
      </tbody>
   </table>

   <script>
   $.ajax({
			url: '../data/fileupload/store/driver_pay_report_<?=$arr[book][id];?>.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
			  /* $('#photo_driver_pay_report').css('color','#3b59987a');
			   $('#photo_driver_pay_report').css('border','1px solid #3b59987a');
			   $('#photo_driver_pay_report').attr('onclick',' ');*/
			    $('#photo_driver_pay_report_no').show();
			    $('#photo_driver_pay_report_yes').hide();
			   
			   /* $('#driver_pay_report_locat_on').hide();
			    $('#driver_pay_report_locat_off').show();*/
			},
			success: function()
			{
				//file exists
				console.log('success file');
				/*$('#photo_driver_pay_report').css('color','#3b5998');
				$('#photo_driver_pay_report').css('border','2px solid #3b5998');
				$('#photo_driver_pay_report').attr('onclick','ViewPhoto("'+id+'","driver_pay_report","<?=TIMESTAMP;?>");');*/
				
				$('#photo_driver_pay_report_no').hide();
			    $('#photo_driver_pay_report_yes').show();
			   
			   /* $('#driver_pay_report_locat_on').show();
			    $('#driver_pay_report_locat_off').hide();*/
			}
		});
      $("#btn_driver_pay_report").click(function(){
      	if($('#driver_pay_report_check_click').val()==0){
       			$('#body_dialog_custom_load').html(load_sub_mod);
          $( "#dialog_custom" ).show();
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=driver_pay_report";
//    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
      }else{
      }
      });
   </script>      
   <?  ///  include ("mod/booking/load/form/price.php");?>
</div>