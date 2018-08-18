<link rel="stylesheet" href="bootstrap/css/font-awesome.min.css" />
<link rel="stylesheet" href="bootstrap/css/ionicons.min.css" />

<? 
   $main_color="#000000";
   ?>
<? 
   require_once("js/control.php");
//   $coldata = "col-md-6 col-fix";
   ?>
<style>
   .topicname { font-size:20px; font-weight:bold;
   }
   .btn-lg{
   	padding: 8px 12px !important;
   	font-size: 18px !important;
   }
   .confirm {
   	font-size: 18px !important;
   }
   #box_detail_pv{
   	padding: 10px;
    margin: 10px;
    box-shadow: 1px 1px 3px #9E9E9E;
    font-size: 16px;
   }
</style>
<div style="left:0; margin-left:-0px;margin-top:30px; " >
   <div class="box-body "  >
  
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <div class="topicname "><span class="font-24"><?=t_first_name." - ".t_last_name;?></span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input class="form-control" type="text" name="name" id="name"   required="true"   value="<?=$arr[web_driver_edit][name];?>" >
            </div>
         </div>
      </div>
    
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <!-- start box --> 
            <div class="topicname" ><span class="font-24"><?=t_nick_name;?></span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input class="form-control" type="text" name="nickname" id="nickname"  required="true"   value="<?=$arr[web_driver_edit][nickname];?>"   >
            </div>
         </div>
         <!-- end box -->
      </div>
      <!-- end col -->
      
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <!-- start box --> 
            <div class="topicname" ><span class="font-24">เลขบัตรประชาชน</span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true"></i></span>
               <input class="form-control" type="number" name="idcard" id="idcard"  required="true"   value="" pattern="\d*" / >
            </div>
         </div>
         <!-- end box -->
      </div>
      <!-- end col -->
   
      <div class="<?= $coldata?>"  style="padding:0px;" >
         <div>
            <!-- start box --> 
            <div class="topicname" ><span class="font-24"><?=t_current_address;?> </span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-home"></i></span>
               <input class="form-control" type="text" name="address" id="address"  required="true"   value="<?=$arr[web_driver_edit][address];?>" >
            </div>
         </div>
         <!-- end box -->
      </div>
      <!-- end col -->
  
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <!-- start box -->
            <div class="topicname" ><span class="font-24"><?=t_phone_number;?></span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-phone"></i></span>
               <input class="form-control" type="number" name="phone" id="phone"  required="true"  pattern="\d*"  value="<?=$arr[web_driver_edit][phone];?>" >
            </div>
         </div>
         <!-- end box -->
      </div>
      <!-- end col -->
    
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <!-- start box -->
            <div class="topicname" ><span class="font-24"><?=t_province."ที่คุณอยู่ประจำ";?></span></div>
            <div id="box_detail_pv">
            	จังหวัดที่คุณอยู่ตอนนี้ <span id="txt_now_pv" style="color: #f10;font-weight: 800;">ไม่สามารถจับจังหวัดของคุณได้</span>
            </div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
               <select name="driver_province" id="driver_province" style="width:100%; padding:5px; height:40px;background-color: #fff;" class="font-24" >
                  <option value="" >- <?=t_select_province;?> -</option>
                  <?
                     $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                     $res[category] = $db->select_query("SELECT ".$province.",id,name FROM web_province   ORDER BY id ");
                     while($arr[category] = $db->fetch($res[category])) {
                       ?>
                       <option value="<?=$arr[category][id];?>"><?=$arr[category][$province];?></option>
                       <?
                     }
                     $db->closedb ();
                     ?>
               </select>
            
            </div>


         </div>
         <!-- end box -->
      </div>
      <!-- end box -->
      
      <div class="col-md-6" style="padding:0px;">
         <div>
            <div class="topicname"><span class="font-24"><?=t_email;?>  <font color="#FF0000">( <?=t_not_mandatory;?> )</span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span>
               <input class="form-control" type="text" name="email" id="email"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[web_driver_edit][email];?>"    >
            </div>
         </div>
         <div>
            <div class="topicname" ></div>
         </div>

      </div>
      <!---->

   </div>
   <!---->
   <?
      $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
      ?>
   <input class="form-control" type="hidden" name="check_code" id="check_code"      value="<?=$rand ?>" >
   <div class="<?= $coldata?>" style="margin-top: 30px;" >
      <div class="take_photo"  style=" padding-top: 20px; background-color: #dddddd42;">
         <center>
         <i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_driver" style="font-size:60px;color: #666666;"></i><br>
         <span class="font-24"><?=t_take_photo;?></span>
         <div style="padding:0px;  ">
            <div class="progress" style="width:100%;border-radius:8px; margin-top: 10px; border:none; height:20px;opacity:0; " id="area_image_album_load_main">
               <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_driver" style="width:0%;border-radius:5px;border:none; height:">
               </div>
            </div>
         </div>
         <img 
            <? if($_GET[id]){ ?>
            src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_driver.jpg?v=<?=$arr[web_driver_edit][update_date];?>" 
            <? }  ?>
            name="image_id_driver" id="image_id_driver"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
            
            <input type='file' id="imgInp" style="opacity: 0;" />
      </div>
   </div>
</div>
<!-- end box -->       
<div class="<?= $coldata?>">
   <div>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
         <tr>
            <td id="tr_btn_change" align="center" ><button id="submit_step_1" type="button" class="btn btn-repair waves-effect" style="width:100%; background-color:#3b5998; border-radius:25px;text-transform: capitalize; " ><span class="font-24"><?=t_save_data;?></span></button> </td>
         </tr>
          
      </table>
      <br>
	
   </div>
   <input class="form-control" type="hidden" name="check_photo_id_driver" id="check_photo_id_driver"      value="" >
   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true"    value="" >
   <script>
	  $("#imgInp").change(function() {
	  readURL(this);
	});
	
	function readURL(input) {
	  $('#pg_upload_bar').show();
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	    	
	      $('#image_id_driver').attr('src', e.target.result);

	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}
	  
      $("#icon_camera_id_driver").click(function(){  
//        document.getElementById('upload_pic_type').value='id_driver';
//       $("#load_chat_camera").click(); 
			$('#imgInp').click();
       });

      $("#submit_step_1").click(function(){ 

      if(document.getElementById('name').value=="") {
//      alert('กรุณากรอกชื่อ - นามสกุล (ภาษาไทย)'); 
      swal('กรุณากรอกชื่อ - นามสกุล (ภาษาไทย)');
      document.getElementById('name').focus() ; 
      return false ;
      }

      if(document.getElementById('nickname').value=="") {
      swal('กรุณากรอกชื่อเล่น'); 
      document.getElementById('nickname').focus() ; 
      return false ;
      }

      if(document.getElementById('address').value=="") {
      swal('กรุณากรอกที่อยู่'); 
      document.getElementById('address').focus() ; 
      return false ;
      }
      if(document.getElementById('phone').value=="") {
      swal('กรุณากรอกเบอร์โทรศัพท์'); 
      document.getElementById('phone').focus() ; 
      return false ;
      }
      if($('#driver_province').val()==""){
	  	swal('กรุณาเลือกที่อยู่');
	  	 document.getElementById('driver_province').focus() ; 
	  }

      if(document.getElementById('imgInp').value=="") {
      swal('กรุณาถ่ายภาพคุณ'); 
      document.getElementById('imgInp').focus() ; 
      return false ;
      }


      
      swal({
		  title: "คุณแน่ใจหรือไม่",
		  text: "ว่าข้อมูลถูกต้อง",
		  type: "info",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  confirmButtonText: 'ยืนยัน',
      	  cancelButtonText: "ยกเลิก",
		  showLoaderOnConfirm: true
		}, function () {
			

			var url_new ="mod/register/savedata_edit.php?type=user&action=add2";

	      $.post(url_new,$('#myform_regiter').serialize(),function(response){
	      	console.log(response);

	        $('#send_profile_data').html(response);
	        	if(response.result==true){
					var upload = "mod/user/upload_img/upload.php?user="+response.update.username;
			    console.log(upload);
					data_form = $('#myform_regiter').serialize();    
   				data = new FormData($('#myform_regiter')[0]);
      			data.append('fileUpload', $('#imgInp')[0].files[0]);
   				   $.ajax({
   				                url: upload, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
   				                   console.log(php_script_response);
   				                }
   				     });
//   				     return;
					$.post('mail.php?key=new_driver',response,function(data){
   						console.log(data);
   					});
//   					return;
   					swal('สำเร็จ','สมัครสมาชิกเสร็จสมบูรณ์ เลือกเมนูข้อมูลส่วนตัวเพื่อตรวจสอบข้อมูลของคุณ','success');
					setTimeout(function () {
		    			window.location.href = "signin.php?autologin=1&user="+response.update.username+"&pass="+response.password;
		  			}, 1500);
				}
				else{
					swal('ไม่สำเร็จ','กรุณาตรวจสอบข้อมูลของท่านและสมัครใหม่อีกครั้ง','error');
				}
	       });
	       

		});
      
      
      });
   </script>  
</div>
<div  id="send_profile_data" style="display: none;"></div>
<div style="display:none">
   <?  include ("mod/register/photo/upload_main.php");?><br>
</div>

<script>
getLocation();
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
       console.log("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude; 
    console.log(lat+" "+lng);
     var url = 'https://maps.google.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=false&language='+lng+'&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
console.log(url);

$.post( url, function( data ) {

   if(data.status=="OVER_QUERY_LIMIT"){
      console.log('OVER_QUERY_LIMIT');
   }else{
      var province = data.results[data.results.length-2].address_components[0].long_name;
      console.log(province);
       var url = "mod/shop/select_province_new.php?op=get_id_province_only";
	   $.post( url,{txt_pv  :province} ,function( data ) {
	      var obj = JSON.parse(data);
	      console.log(obj);
	      var province = obj.id;
	      var area = obj.area;
	      
	      $('#txt_now_pv').text(obj.name_th);
	      $('#driver_province').val(province);
	   });
   }
});
}

function check_id_card(){
    chID = false;
    if(!checkID(document.form1.username_signup_idcard.value)){
      swal("รหัสประชาชน !", "ไม่ถูกต้อง", "warning");
    }

else{ 
  chID = true;
console.log(document.form1.username_signup_idcard.value)
$.ajax({
            type: 'POST',
            url: 'https://www.welovetaxi.com/app/demo_new2/curl/checkcard.php',
            data: {'icard': document.form1.username_signup_idcard.value},
            //contentType: "application/json",
            dataType: 'json',
            success: function(res){ 
                console.log(res)
                if(res[0].status == 1)
              {
                  swal("รหัสประชาชนนี้ !", "ลงทะเบียนแล้วกรุณาเข้าสูระบบ", "warning");
                   
              }
              else 
              {    
                  swal("รหัสประชาชนนี้ !", "หมายเลขบัตรนี้ลงทะเบียนได้", "warning");
              }
                // if(res.status == 0){
                //     $.cookie("login",res.username);
                //     $('.lng_email_available').show()
                //     $('.lng_email_have').hide()
                //     window.location.href = "<?php //echo base_url(); ?>home";
                // }
                // else{
                //     $('.lng_email_available').hide()                    
                //     $('.lng_email_have').show()
                // }                
            }
        });
  
  
}

}
</script>