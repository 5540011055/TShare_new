
 <?  include ("mod/booking/load/form/checkin/photo/upload_checkin_pic.php");?>
   
 
    <?
$arr[project][id]=$_GET[id];
	
$type='แขกลงทะเบียน';		

	
	?>
	<script>
  $(".text-topic-action-mod-3").html('<?=$type?>');
  
  </script>
  
    <script>
    	
  $('#btn_close_gr_popup').click(function(){   
  $( "#main_load_mod_popup_3" ).toggle();
 $( "#load_mod_popup_3" ).html('');
	
  	});
	  </script>
      
      
      
  <script>
	///
	
 $('#btn_gr_popup_<?=$_GET[id]?>').click(function(){   
  $( "#main_load_mod_popup_3" ).toggle();
  var lat = $('#lat').val();
  var lng = $('#lng').val();
//  var url_<?=$arr[project][id]?> = "popup.php?name=booking/load/form&file=savedata&action=check_driver_topoint&type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>&lat="+lat+"&lng="+lng;
 var url_<?=$arr[project][id]?> = "popup.php?name=booking/load/form&file=savedata&action=check_guest_register&type=guest_register&id=<?=$arr[project][id]?>";
  
  console.log(url_<?=$arr[project][id]?>);
//  return;

 	$('#status_guest_register_<?=$arr[project][id]?>').load(url_<?=$arr[project][id]?>);
 
	$("#step_driver_pay_report_<? echo $arr[project][id];?>").show();

	$("#box_guest_register_<?=$arr[project][id];?>").removeClass('border-alert');




  	});
	
	
	
	
	
	
  </script>
  

<br/>
<table width="300" border="0" align="center" cellpadding="5" cellspacing="5">
  <tbody>
    <tr>
      <td align="center" class="font-30"><i class="icon-new-uniF116-6" style=" font-size:80px; color:<?=$main_color?>"  ></i></td>
    </tr>
    <tr>
      <td align="center" class="font-30"><b>คุณแน่ใจหรือไม่ว่า</td>
    </tr>
    <tr>
      <td align="center" class="font-26"><?=$type?>แล้ว</td>
    </tr>
    <tr>
      <td align="center" class="font-26"><div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
<i class="icon-new-uniF197-2 take-photo-icon"  id="icon_camera_checkin"></i><br>

ถ่ายภาพ<?=$type;?>

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_<?=$_GET[type]?>" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
 
    </div>
 
 
 
 

 <img
 
   <? if($_GET[ids]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_car_1.jpg" 

<? }  ?>
  id="image_<?=$_GET[type]?>" name="image_<?=$_GET[type]?>"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
  
    </div></td>
    </tr>
    <tr>
      <td align="center"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
            <td width="50%"><button  id="btn_close_gr_popup"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:8px; background-color:#FF0000;  border-radius: 20px; border:none "><span class="font-30"><center>ไม่ใช่</button></td>
            <td width="50%"><button  id="btn_gr_popup_<?=$_GET[id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:8px; background-color:<?=$main_color?>;  border-radius: 20px; border:none "><span class="font-30"><center>ใช่</button></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>



   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" />

 
 <script>
 
  
  /////////  id driving
 $("#icon_camera_checkin").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
   
  </script>