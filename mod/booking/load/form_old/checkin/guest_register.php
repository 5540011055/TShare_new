<?
$arr[project][check_guest_register]=2;

?>
  <script>
 var url_guest_register_<? echo $arr[project][id];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_guest_register&time=<?=$arr[project][date_guest_register]?>&status=<?=$arr[project][check_guest_register]?>";
 $('#status_guest_register_<?=$arr[project][id]?>').load(url_guest_register_<? echo $arr[project][id];?>);
</script>
      <? 
    if($arr[project][check_guest_register]==1 ){ ?>
      <script> 
 

$("#step_driver_pay_report_<? echo $arr[project][id];?>").show();

 
 
   $('#iconchk_guest_register_<?=$arr[project][id];?>').attr("src", "images/yes.png");  
 
  $("#number_guest_register_<?=$arr[project][id];?>").removeClass('step-booking');
  
   $("#number_guest_register_<?=$arr[project][id];?>").addClass('step-booking-active');
   
 ///  $("#btn_guest_register_<?=$arr[project][id]?>").addClass('disabledbutton-checkin');
   $("#box_guest_register_<?=$arr[project][id];?>").removeClass('border-alert');
	  
   </script>
      <? } ?>

 
  
 
 
  
  <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_guest_register_<?=$arr[project][id];?>">
        <tbody>
          <tr>
            <td width="60" rowspan="2"><div class="step-booking"  id="number_guest_register_<?=$arr[project][id];?>">3</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_register_<?=$arr[project][id];?>"    /></div></td>
            <td><button  id="btn_guest_register_<?=$arr[project][id]?>"  type="button" class="btns  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#666666;  border-radius: 20px; border:none "><span class="font-26"><i class="icon-new-uniF116-6" style="width:10px;"  ></i>แขกลงทะเบียน</button></td>
          </tr>
          <tr>
            <td style="height:30px;"><div  id="status_guest_register_<?=$arr[project][id]?>" ></div></td>
          </tr>
        </tbody>
    </table>
 
       
            <script>
 
 
  $("#btn_guest_register_<?=$arr[project][id]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าพนักงานรับแขกแล้ว",
	type: "info",
		showCancelButton: true,
		confirmButtonColor: '<?=$main_color?>',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
 
 var url_<?=$arr[project][id]?> = "popup.php?name=booking/load/form&file=savedata&action=check_guest_register&type=guest_register&id=<?=$arr[project][id]?>";
  
 $('#status_guest_register_<?=$arr[project][id]?>').load(url_<?=$arr[project][id]?>);
 


$("#step_driver_pay_report_<? echo $arr[project][id];?>").show();


$("#box_guest_register_<?=$arr[project][id];?>").removeClass('border-alert');


//// แสดงราคา


 var url_price_<?=$arr[project][id]?> = "popup.php?name=booking/load/form&file=price&id=<?=$arr[project][id]?>";
  
 $('#main_price_booking_div_<?=$arr[project][id]?>').load(url_price_<?=$arr[project][id]?>);

 $("#main_price_booking_div_<?=$arr[project][id]?>").show();




///  $('#step_register').show();
    
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
  
 
  
    }
	
	
	
 
	
	
	});
	   
  
 
  
  
  
 

		 });
		 
 

		 
		 
		 </script>      
            
    
    
    
    
    
    