
 
  <script>
 var url_driver_pay_report_<? echo $arr[project][id];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_driver_pay_report&time=<?=$arr[project][driver_pay_report_date]?>&status=<?=$arr[project][check_driver_pay_report]?>";
 
 $('#status_driver_pay_report_<?=$arr[project][id]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
 $('#status_driver_pay_report_<?=$arr[project][id]?>').load(url_driver_pay_report_<? echo $arr[project][id];?>);
</script>
      <? 
    if($arr[project][check_driver_pay_report]==1 ){ 

    ?>
      <script> 


$("#step_driver_pay_report_<? echo $arr[project][id];?>").show();

 
   $('#iconchk_driver_pay_report_<?=$arr[project][id];?>').attr("src", "images/yes.png");  
 
  $("#number_driver_pay_report_<?=$arr[project][id];?>").removeClass('step-booking');
  
   $("#number_driver_pay_report_<?=$arr[project][id];?>").addClass('step-booking-active');
   
 ///  $("#btn_driver_pay_report_<?=$arr[project][id]?>").addClass('disabledbutton-checkin');
  $("#btn_driver_pay_report_<?=$arr[project][id]?>").css('background-color','#666666');
	  
   </script>
      <? } ?>
 
  
  
  <div class="div-all-checkin">
  
  <table width="100%" border="0" cellspacing="2" cellpadding="0" >
        <tbody>
          <tr>
            <td width="60" rowspan="2"><div class="step-booking"  id="number_driver_pay_report_<?=$arr[project][id];?>">4</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_pay_report_<?=$arr[project][id];?>"    /></div></td>
            <td colspan="2"><button  id="btn_driver_pay_report_<?=$arr[project][id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius:  20px; border:none "><span class="font-26"><i class="icon-new-uniF121-10" style="width:10px;"  ></i> แจ้งยอดรายได้</button></td>
          </tr>
          <tr>
           <input type="hidden" value="<?=$arr[project][check_driver_pay_report];?>" id="driver_pay_report_check_click"/>
            <td style="height:30px;"><div  id="status_driver_pay_report_<?=$arr[project][id]?>"></div></td>
            <td  width="30">
            	<i  id="photo_driver_pay_report_<?=$arr[project][id];?>" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[project][id];?>','driver_pay_report','<?=$arr[project][driver_pay_report_date]?>');" ></i>
            </td>
          </tr>
        </tbody>
    </table>
    
     <?php 
  	if(file_exists("../data/fileupload/store/driver_pay_report_".$arr[project][id].".jpg")==0){ ?>
		<script>
			$('#photo_driver_pay_report_<?=$arr[project][id]?>').css('color','#3b59987a');
			$('#photo_driver_pay_report_<?=$arr[project][id]?>').css('border','1px solid #3b59987a');
			$('#photo_driver_pay_report_<?=$arr[project][id]?>').attr('onclick',' ');
		</script>
	<? } ?>
    
       
            <script>
		 
   $("#btn_driver_pay_report_<?=$arr[project][id]?>").click(function(){
   	
   	if($('#driver_pay_report_check_click').val()==0){
	   		$( "#main_load_mod_popup_3" ).toggle();
		 
		    var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$arr[project][id]?>&type=driver_pay_report";
		  
		    $('#load_mod_popup_3').html(load_main_mod);
		 
		    $('#load_mod_popup_3').load(url_load); 
		}else{
			
		}
   });
 	 
		 </script>      
            
     <?  ///  include ("mod/booking/load/form/price.php");?>
    
    
    
    </div>
    