<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  

  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>

<script>
 
 /// check login
 


  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>


 

<script>
 $("#head_full_popup" ).html("เริ่มใช้รถเวลา <?   echo date("H:i:s");  ?>");
  $("#head_full_popup_icon" ).html("<i class='fa  fa-clock-o'></i>");
</script>


<br />
<br />
<form id="user_car_form"  name="user_car_form"  method="post"   >

 <!-- iCheck -->
 
 <div class="topicname"><i class="fa  fa-automobile"></i>&nbsp;หมายเลขรถที่ขับ</div>
		          <table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><select name="check_car_number" id="check_car_number"  class="form-control"  style="font-size:18px;  height:45px;" onchange="return find_transfer_status_check();" >
		  <option value="" selected="selected">-- กรุณาเลือก --</option>
 
            <?
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[category] = $db->select_query("SELECT * FROM " . TB_carall . "  where company=276 or company=283 or company=284 order by company,car_num asc");
        ;
        while ($arr[category] = $db->fetch($res[category])) {
            $res[aum]   = $db->select_query("SELECT * FROM " . TB_carall_type . " WHERE id='" . $arr[category][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
            $res[aum]   = $db->select_query("SELECT * FROM " . TB_carall_type . " WHERE id='" . $arr[category][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
			
			if($arr[aum][topic_en]=='Car'){
			$arr[aum][topic_en]='รถเก๋ง';
			}
			if($arr[aum][topic_en]=='Van'){
			$arr[aum][topic_en]='รถตู้';
			}
			
			
            //$res[cartype] = $db->select_query("SELECT * FROM ".TB_carall." WHERE id='".$arr[category][car_type]."' ");
            //$arr[cartype] = $db->fetch($res[cartype);
            $res[admin] = $db->select_query("SELECT * FROM " . TB_admin . " WHERE id='" . $arr[category][company] . "' ");
            $arr[admin] = $db->fetch($res[admin]);
            echo "<option value=\"" . $arr[category][id] . "\"";
            if ($arr[category][id] == $arr[web_user][car_num]) {
                echo " Selected";
            }
            echo ">" . $arr[category][car_num] . "  ( " . $arr[aum][topic_en] . " )  -  " . $arr[admin][company] . "</option>";
        }
        $db->closedb();
?>
          </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table> 
 
 
 
                    <div class="topicname"><i class="fa  fa-tachometer"></i>&nbsp;เลขกิโลเมตรเริ่มต้นออกรถ</div>
                     
       
                    <input name="check_mile" type="number"  class="form-control" id="check_mile"  style="font-size:30px" onKeyPress="if(this.value.length==6) return false;"/>
		 
 <br />

					
					
                    <div class="topicname"><i class="fa  fa-wrench"></i>&nbsp;รายการตรวจเช็คสภาพรถ</div>
                    <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
                      <tr>
					   <td style="width:30px; height:40px; "> 
  
<input name="check_water"  type="checkbox" id="check_water" onclick="check_use_car();" value="1"   data-off-text="ชำรุด" data-on-text="สมบูรณ์"  >
 
			 
			 </td>
			 
                        <td valign="middle" style="padding-bottom:2px; font-size:18px;  padding-left:10px; ">หม้อน้ำ</td>
					  </tr>
						 
						  <tr>
                   <td style="width:30px; height:40px; "> 
						<input name="check_oil"  type="checkbox" id="check_oil"  onclick="check_use_car();" value="1"   data-off-text="ชำรุด" data-on-text="สมบูรณ์"  ></td>
						
                        <td valign="middle" style="padding-bottom:2px; font-size:18px; padding-left:10px;">น้ำมันเครื่อง</td>
                      
						</tr>
						
						<tr>
						<td style="width:30px; height:40px; "> 
						 
						 <input name="check_rubber"  type="checkbox" id="check_rubber"  onclick="check_use_car();" value="1"   data-off-text="ชำรุด" data-on-text="สมบูรณ์"  ></td>
                        <td valign="middle" style="padding-bottom:2px; font-size:18px;  padding-left:10px; ">ลมยาง</td>
						</tr>
						<tr>
						
 	
						
                      <td style="width:30px; height:40px; "> 
					  
					  <input name="check_rain"  type="checkbox" id="check_rain" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"  onclick="check_use_car();"  ></td>
						  <td valign="middle" style="padding-bottom:2px; font-size:18px;  padding-left:10px; ">น้ำที่ปัดน้ำฝน</td>
                        
                      </tr>
  </table>
              
			  
			  
		<div id="photo_usecar" style="display:none">  
			  
 
  
			  
			                      <div class="topicname"><i class="fa  fa-automobile"></i>&nbsp;ภาพถ่ายรถ</div>
                                  <div class="input-group">
                                    <label class="input-group-btn"> <span class="btn btn-primary"> <i class="fa  fa-camera"></i>&nbsp;ถ่ายภาพ
                                      <input type="file" class="form-control" name="photo_checkguest_<?=$arr[project][id];?>_1" id="photo_checkguest_<?=$arr[project][id];?>_1" accept="image/*"  capture="camera"  style="display: none;"/>
                                    </span> </label>
                                    <input name="text" type="text" class="form-control" id="url_photo_checkguest_<?=$arr[project][id];?>_1"  style="padding-left:5px; padding-right:5px; width:160px" value="ยังไม่มีภาพถ่าย" readonly="readonly" />
                                    &nbsp;
                                    <button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px" id="del_photo_checkguest_<?=$arr[project][id];?>_1"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
                                    <script>
 
$('#del_photo_checkguest_<?=$arr[project][id];?>_1').click(function(){  
document.getElementById('photo_checkguest_<?=$arr[project][id];?>_1').value='';
document.getElementById('url_photo_checkguest_<?=$arr[project][id];?>_1').value='ยังไม่มีภาพถ่าย';
$('#url_photo_checkguest_<?=$arr[project][id];?>_1').css({"background": "#fa1431","color": "#333333", });

     	});
					
					              </script>
                                  </div>
                                  <div class="input-group" style="margin-top:10px; ">
                                    <label class="input-group-btn"> <span class="btn btn-primary"> <i class="fa  fa-camera"></i>&nbsp;ถ่ายภาพ
                                      <input type="file" class="form-control" name="photo_checkguest_<?=$arr[project][id];?>_2" id="photo_checkguest_<?=$arr[project][id];?>_2" accept="image/*"  capture="camera"  style="display: none;"/>
                                    </span> </label>
                                    <input name="text" type="text" class="form-control" id="url_photo_checkguest_<?=$arr[project][id];?>_2"  style="padding-left:5px; padding-right:5px; width:160px" value="ยังไม่มีภาพถ่าย" readonly="readonly" />
                                    &nbsp;
                                    <button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px" id="del_photo_checkguest_<?=$arr[project][id];?>_2"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
                                    <script>
 
$('#del_photo_checkguest_<?=$arr[project][id];?>_2').click(function(){  
document.getElementById('photo_checkguest_<?=$arr[project][id];?>_2').value='';
document.getElementById('url_photo_checkguest_<?=$arr[project][id];?>_2').value='ยังไม่มีภาพถ่าย';
$('#url_photo_checkguest_<?=$arr[project][id];?>_2').css({"background": "#fa1431","color": "#333333", });
     	});
					
					              </script>
                                  </div>
								  
								  
								  
								  
		</div>						  
								  
								  
								  
								  
								  
                                  <div class="topicname"><i class="fa  fa-pencil-square"></i></div>

				  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
 

 

     <div id="send_data_car">send data</div>
  
  
  
  <div style="margin-top:10px; display:nones"  id="check_status_use_car" >
 <table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr>
    <td width="50%" style="padding:5 px;"><button id="submit_use_car" type="button" class="btn btn-block btn-primary" style="width:100% ">บันทึกข้อมูล</button></td>
    <td width="50%" style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:100% ">รีเซ็ต</button>
	<input name="file_upload_submit"  id="file_upload_submit" type="submit" style="display:none">
	
	
	</td>
  </tr>
</table>
 

  </div>
        
  </div>
  
    <!----- ปิด row-->
   
  </div>
     </div>  
  	
 
  <script>
       
 
  
 /// check login

$("#submit_use_car").click(function(){  
//$('#file_upload_line').click();


 //alert(document.getElementById('check_water').value);
 
 
if(document.getElementById('check_water').checked) {
   document.getElementById('check_water').value=1;
} else {

document.getElementById('check_water').value=0;
}



 
if(document.getElementById('check_rain').checked) {
   document.getElementById('check_rain').value=1;
} else {

document.getElementById('check_rain').value=0;
}
 
 
  
if(document.getElementById('check_oil').checked) {
   document.getElementById('check_oil').value=1;
} else {

document.getElementById('check_oil').value=0;
}
 
 
  
if(document.getElementById('check_rubber').checked) {
   document.getElementById('check_rubber').value=1;
} else {

document.getElementById('check_rubber').value=0;
}
 
 
 var checkcar =parseInt (document.getElementById('check_water').value) + parseInt (document.getElementById('check_oil').value) + parseInt (document.getElementById('check_rain').value) + parseInt (document.getElementById('check_rubber').value);
 
 
 
 
 ///alert(checkcar);
 
 
 if(checkcar<5 && document.getElementById('check_mile').value==''){
 
 alert('กรุณากรอกข้อมูลให้ครบ');
 
 
 }
  
  
  
  else {
 
 
  var url_car = "popup.php?name=checkcar&file=savedata&type=usecar&drivername=<?=$user_id;?>&usecar=start";
  
  url_car=url_car+"&car="+document.getElementById('check_car_number').value;
  
   	url_car=url_car+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	url_car=url_car+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
	
	
	 url_car=url_car+"&check_water="+document.getElementById('check_water').value;
	 url_car=url_car+"&check_oil="+document.getElementById('check_oil').value;
	 url_car=url_car+"&check_rain="+document.getElementById('check_rain').value;
	 url_car=url_car+"&check_rubber="+document.getElementById('check_rubber').value;
	 
	  url_car=url_car+"&check_mile="+document.getElementById('check_mile').value;

 
 

 $.post(url_car,$('#user_car_form').serialize(),function(response){
   $('#send_data_car').html(response);
   
 
  });
  
 
  
  }
  

 });
 </script> 
 
 
</form> 
 <script>
 // alert(0);
 
 

 
 
 

 </script>
 <br />
  <br />
  <br />
  

  
  
<script>
 
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
 
</script>


  