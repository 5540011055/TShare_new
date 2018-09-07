<script>
   $('.text-topic-action-mod').html('<?=t_user_info;?>');
</script>
<style type="text/css">
   .mainpic_index {
   padding:10px;   
   -moz-border-radius:50%;
   -webkit-border-radius:50%;
   border-radius:50%;
   border:1px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 5px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
   }
   .mainpic_dv {
   padding:10px;   
   border:1px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 5px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
   }
   .mainpic {
   border:8px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; 
   height:300px; width:300px;
   border-radius: 50%;
   background:url(../../admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg);
   background-size: 450px ;
   background-repeat: no-repeat; background-position:center;
   }

      .topicname-user { padding-top:10px; padding-left: 0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #333333 ; text-align:left; margin:0px;  
      }
      .form-control { margin-left:0px; padding-left:0px; }
	
	@keyframes blink { 
	   50% { border-color: #ff0000; } 
	}
	.blink-input { /*or other element you want*/
	    animation-name: blink ;
	    animation-duration: .5s ;
	    animation-timing-function: step-end ;
	    animation-iteration-count: infinite ;
	    animation-direction: alternate ;
	}
</style>
<style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
	border-radius: 25px;
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 8px;
    top: 2px;
    width: 9px;
    height: 16px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
<?php
 $coldata="col-md-6";
 if($arr[web_user][password]==''){
 	$pass_blink = "blink-input";
 }
 if($arr[web_user][name]==''){
 	$name_blink = "blink-input";
 } 
 if($arr[web_user][nickname]==''){
 	$nickname_blink = "blink-input";
 } 
 if($arr[web_user][idcard]==''){
 	$idcard_blink = "blink-input";
 }
 if($arr[web_user][iddriving]==''){
 	$iddriving_blink = "blink-input";
 }
 if($arr[web_user][address]==''){
 	$address_blink = "blink-input";
 }
 if($arr[web_user][phone]==''){
 	$phone_blink = "blink-input";
 }
 if($arr[web_user][idcard_finish]==''){
 	$ex_idcard_blink = "blink-input";
 }
 if($arr[web_user][iddriving_finish]==''){
 	$ex_iddriving_blink = "blink-input";
 }
 ?>
<form method="post"  id="edit_form" name="edit_form"  enctype="multipart/form-data">
   <div class="box box-default" style="padding-top:30px;">
      <!-- /.box-header -->
      <div class="box-body" style="padding: 0px 10px;" >
         <div class="row">
            <div class="<?= $coldata?>">
               <?php  $pic_qr = file_exists("../data/pic/driver/small/".$arr[web_user][username].".jpg");  
                  if($pic_qr==1){
                  	$path_file = "../data/pic/driver/small/".$arr[web_user][username].".jpg?v=".time();
                  }else{
                  	$path_file = "../data/pic/driver/small/default-avatar.jpg";
                  }
                  ?>            
               <style>
                  .fileInput {
                  position: absolute;
                  top: 0;
                  right: 0;
                  margin: 0;
                  padding: 0;
                  font-size: 20px;
                  cursor: pointer;
                  opacity: 0;
                  filter: alpha(opacity=0);
                  }
               </style>
				<input type='file' id="imgInp" style="opacity: 0;" />
				<?php 
				if($_GET[check]>0){ ?>
				<div style="padding: 5px 20px;">
					<span class="font-22" style="color: #ff0000;">มีข้อมูลบางอย่างของคุณขาดหาย กรุณากรอกข้อมูลให้ครบทั่ว</span>
				</div>
				<?php }
				?>
				
               <a onclick="ChangeProfile('<?=$arr[web_user][username];?>');">
                  <div align="center" style="margin-top:10px;" >
                     <img src="<?=$path_file;?>" id="img_tag"  alt="Preview Image" style="border: 2px solid #ddd;    border-radius: 4px;    padding: 0px;    margin: 10px;   display: nones;max-width: 250px;"/>
                     <img src="" id="img_tag_new"  alt="Preview Image" style="border: 2px solid #ddd;    border-radius: 4px;    padding: 0px;    margin: 10px;   display: none;max-width: 250px;"/>
                     <input type="file" id="imageUpload_profile" class="fileInput" name="imageUpload_profile" />
                  </div>
                  <div align="center"><span class="font-20">เปลี่ยนรูปโดยการกดที่รูป</span></div>
               </a>
               
               <div id="box_manage_pf" style="width: 100%;display:none;" align="center">
               <div class="progress" style="width: 80%;display: none;">
					      <div class="indeterminate"></div>
					  </div>
               <button type="button" id="upload_profile" class="btn waves-effect waves-light lighten-2 " style="width:80%;background-color:#3b5998;  border-radius: 0px;color: #fff;display: nones;"><span class="font-22">อัพโหลดภาพประจำตัว</span></button>
               <button  type="button"id="cancel_profile" class="btn waves-effect waves-light lighten-2 red" style="width:80%;  border-radius: 0px;color: #fff;display: nones;margin-top:10px;"><span class="font-22">ยกเลิก</span></button>
               </div>
               
               <div class="topicname-user"><?=t_username;?></div>
               <input class="form-control" type="text" name="username" id="username" maxlength="50" required="true" style="width:100%"  value="<?=$arr[web_user][username];?>"  >
            </div>
            <div class="<?= $coldata;?>">
               <div class="topicname-user"><?=t_password;?></div>
               <input class="form-control <?=$pass_blink;?>" type="text" name="password" id="password"  required="true"   value="<?=$arr[web_user][password];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user text-cap"><?=t_name_last_name_thai;?></div>
               <input class="form-control <?=$name_blink;?>" type="text" name="name" id="name"  required="true"  value="<?=$arr[web_user][name];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user text-cap"><?=t_name_last_name_english;?></div>
               <input class="form-control" placeholder="ไม่บังคับ" type="text" name="name_en" id="name_en"  required="true"  value="<?=$arr[web_user][name_en];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_nick_name;?></div>
               <input class="form-control <?=$nickname_blink;?>" type="text" name="nickname" id="nickname"  required="true"  value="<?=$arr[web_user][nickname];?>" >
            </div>
            
            <div class="<?= $coldata?>">
             <div class="topicname-user">เพศ</div>
             <?php 
             	if($arr[web_user][gender]==0){
					$ck_men = "checked";
				}else{
					$ck_girl = "checked";
				}
             ?>
            	<table>
            		<tr>
            			<td>
            				<label class="container" onclick="selectGender(0);">ชาย
							  <input type="checkbox" <?=$ck_men;?> class="rcp" id="checkbox-0">
							  <span class="checkmark"></span>
							</label>
            			</td>
            			<td>
            				<label class="container" onclick="selectGender(1);">หญิง
							  <input type="checkbox" <?=$ck_girl;?> class="rcp" id="checkbox-1">
							  <span class="checkmark"></span>
							</label>
            			</td>
            		</tr>
            	</table>
            	<input type="hidden" value="" id="gender" name="gender"  />
            </div>
            
            <div class="<?= $coldata?>">
                <div class="row">
			      <div><div class="topicname-user"><?=t_identity_card_number;?></div>
               <input class="form-control <?=$idcard_blink;?>" type="text" name="idcard" id="idcard"  required="true"  value="<?=$arr[web_user][idcard];?>" ></div>
			      <div class="col s4"><span>วันหมดอายุบัตรประชาชน</span></div>
			      <div class="col s8"><input class="form-control <?=$ex_idcard_blink;?>" type="text" name="ex_idcard" id="ex_idcard"  required="true" value="<?=$arr[web_user][idcard_finish];?>" ></div>
			    </div>
               
               <div align="center">
               		<button type="button" onclick="$('#idcard_upload').click();" class="btn btn-danger waves-effect waves-light">อัพโหลดภาพบัตรประจำตัวประชาชน</button>
               		<input type="file" id="idcard_upload" style="opacity: 0; position: absolute;left: 0px;" />
               		<img src="" id="idcard_img" style="width: 180px;display:none;margin-top: 20px;" />
               </div>
            </div>
            
            <div class="<?= $coldata?>">
               
               <div class="row">
			      <div class="col s12">
			      	<div class="topicname-user"><?=t_driver_license_number;?></div>
               		<input class="form-control <?=$iddriving_blink;?>" type="text" name="iddriving" id="iddriving"  required="true"  value="<?=$arr[web_user][iddriving];?>" >
			      </div>
			      <div class="col s4"><span>วันหมดอายุใบขับขี่</span></div>
			      <div class="col s8"><input class="form-control <?=$ex_iddriving_blink;?>" type="text" name="ex_iddriving" id="ex_iddriving"  required="true"  value="<?=$arr[web_user][idcard_finish];?>" ></div>
			    </div>
               <div align="center">
               		<button type="button" onclick="$('#iddriving_upload').click();" class="btn btn-danger waves-effect waves-light">อัพโหลดภาพใบขับขี่</button>
               		<input type="file" id="iddriving_upload" style="opacity: 0; position: absolute;left: 0px;" />
               		<img src="" id="iddriving_img" style="width: 180px;display:none;margin-top: 20px;" />
               </div>
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_address;?></div>
               <input class="form-control <?=$address_blink;?>" type="text" name="address" id="address"  required="true" value="<?=$arr[web_user][address];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_phone_number;?></div>
               <input class="form-control <?=$phone_blink;?>" type="number" name="phone" id="phone" pattern="\d*" required="true"  value="<?=$arr[web_user][phone];?>" >
            </div>
            <div class="<?= $coldata?> ">
               <div class="topicname-user"><?=t_emergency_telephone_numbers;?></div>
               <input class="form-control" placeholder="ไม่บังคับ" type="number" pattern="\d*" name="contact" id="contact"  required="true" value="<?=$arr[web_user][contact];?>"  >
            </div>
            
            <div class="<?= $coldata?>">
               <div class="alert alert-success alert-dismissible"  id="save" style="display: none;">
                  <i class="fa fa-check"></i>  <?=t_save_succeed;?> 
               </div>
               <div class="alert alert-error alert-dismissible" id="error" style="display: none;padding:14px;">
                  <i class="fa fa-check"></i>  <?=t_error;?>
               </div>
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user">
                  <table width="100%"  border="0" cellspacing="2" cellpadding="2">
                     <tr>
                       <!-- <td width="50%"><button type="reset"  class="btn waves-effect waves-light lighten-2 " style="width:90%;background-color:#9E9E9E;  border-radius: 0px;color: #fff;"><span class="font-20"><?=t_reset;?></span></button></td>-->
                        <td width="100%"><button id="submit_user_data" type="button" class="btn waves-effect waves-light lighten-2 " style="width:100%;background-color:#3b5998;  border-radius: 0px;color: #fff;"><span class="font-24"><?=t_save_data;?></span></button></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<script>
	  $.ajax({
			url: '../data/pic/driver/id_card/<?=$arr[web_user][id];?>_idcard.jpg',
			type:'HEAD',
			error: function()
			{
			   console.log('Error file');
			   $('#idcard_img').hide();
			},
			success: function()
			{
				 console.log('success file');
				 $('#idcard_img').show();
				 $('#idcard_img').attr('src','../data/pic/driver/id_card/<?=$arr[web_user][id];?>_idcard.jpg');
			}
		});
		
	  $.ajax({
			url: '../data/pic/driver/id_driving/<?=$arr[web_user][id];?>_iddriving.jpg',
			type:'HEAD',
			error: function()
			{
			   console.log('Error file');
			   $('#iddriving_img').hide();
			},
			success: function()
			{
				console.log('success file');
				$('#iddriving_img').show();
				$('#iddriving_img').attr('src','../data/pic/driver/id_driving/<?=$arr[web_user][id];?>_iddriving.jpg');
			}
		});
	
	function ChangeProfile(username){
		console.log(username);
		$('#imgInp').click();
	}

	var check_new_user = '<?=$_GET[check_new_user];?>';
    if(check_new_user!=""){
    	 document.getElementById('password').focus() ;
    }
	
   $('#imageUpload_profile').change(function(){			
   		readImgUrlAndPreview(this);
   		function readImgUrlAndPreview(input){
   			 if (input.files && input.files[0]) {
   		            var reader = new FileReader();
   		            reader.onload = function (e) {			            	
   		                $('#img_tag').attr('src', e.target.result);
   						}
   		          };
   		          reader.readAsDataURL(input.files[0]);
   		     }	
   //			     $('#imagePreview2').show();
   	});
   /// check login
   $("#submit_user_data").click(function(){ 
   if(document.getElementById('password').value=="") {
   swal('<?=t_please_fill_in_password;?>'); 
   document.getElementById('password').focus() ; 
   return false ;
   }
   if(document.getElementById('name').value=="") {
   swal('<?=t_please_fill_with_thai;?>'); 
   document.getElementById('name').focus() ; 
   return false ;
   }

   if(document.getElementById('nickname').value=="") {
   swal('<?=t_please_fill_in_nickname;?>'); 
   document.getElementById('nickname').focus() ; 
   return false ;
   }

   if(document.getElementById('address').value=="") {
   swal('<?=t_please_fill_in_address;?>'); 
   document.getElementById('address').focus() ; 
   return false ;
   }
   if(document.getElementById('phone').value=="") {
   swal('<?=t_please_fill_in_phont_no;?>'); 
   document.getElementById('phone').focus() ; 
   return false ;
   }

    				var data_form = $('#edit_form').serialize();
/*   					data = new FormData($('#edit_form')[0]);
      				data.append('file', $('#imageUpload_profile')[0].files[0]);*/
      				var id = '<?=$arr[web_user][id]?>';
//      				var url = 'mod/user/savedata_sub.php?type=save_user&id='+id;
      				var url = 'mod/material/user/php_user.php?action=edit&id='+id;
   				    $.ajax({
   				                url: url, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
/*   				                cache: false,
   				                contentType: false,
   				                processData: false,*/
   				                data: data_form,                         
   				                type: 'post',
   				                success: function(php_script_response){
								
   								var obj = JSON.parse(php_script_response);
   								   console.log(obj);
   									   if(obj.result==true){
   									   	swal("<?=t_save_succeed;?>", "<?=t_press_button_close;?>", "success");
//   									   	$('#main_load_mod_popup').hide();
//   									   	$('#load_mod_popup').html('');
											openProfile();
   									   }
   									  else{
   									  	swal("<?=t_error;?>", "<?=t_press_button_close;?>", "error");
   									   }
   				                }
   				     });
   });
</script>

<script>
	function readURL(input,type) {
	  $('#pg_upload_bar').show();
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      if(type=="profile"){
		  	$('#img_tag_new').attr('src', e.target.result);
	      	$('#img_tag_new').show();
	      	$('#box_manage_pf').show();
	      	$('#img_tag').hide();
		  }else if(type=="idcard"){
		  	$('#idcard_img').attr('src', e.target.result);
	      	$('#idcard_img').show();
	      	
   				var data = new FormData($('#edit_form')[0]);
      			data.append('fileUpload', $('#idcard_upload')[0].files[0]);
      			var url_upload = "mod/user/upload_img/upload.php?id=<?=$arr[web_user][id];?>&type=id_card";
      			console.log(url_upload);
      			
   				   $.ajax({
   				                url: url_upload, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
   				                   console.log(php_script_response);
   				                   if(php_script_response=="true"){
   				                   	 swal("อัพโหลดสำเร็จ","","success");
								   }
   				                },
   				                error: function(err){
   				                   alert(err);
   				                }
   				 	});
		  }
		  else if(type=="iddriving"){
		  	$('#iddriving_img').attr('src', e.target.result);
	      	$('#iddriving_img').show();
	      	var data = new FormData($('#edit_form')[0]);
      			data.append('fileUpload', $('#idcard_upload')[0].files[0]);
      			var url_upload = "mod/user/upload_img/upload.php?id=<?=$arr[web_user][id];?>&type=id_drving";
      			console.log(url_upload);
   				   $.ajax({
   				                url: url_upload, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
   				                   console.log(php_script_response);
   				                   if(php_script_response=="true"){
   				                   	 swal("อัพโหลดสำเร็จ","","success");
								   }
   				                }
   				 	});
		  }
	      
	    }
		
	    reader.readAsDataURL(input.files[0]);
	  
	
	  }
	  
	}

	$("#imgInp").change(function() {
	  readURL(this,'profile');
	});
	
	$("#idcard_upload").change(function() {
	  readURL(this,'idcard');
	});
	
	$("#iddriving_upload").change(function() {
	  readURL(this,'iddriving');
	});
	
	$("#upload_profile").click(function() {
		 var url = "mod/user/upload_img/upload.php?user=<?=$arr[web_user][username];?>";
	    console.log(url);
		$('.progress').show();
//   				data_form = $('#edit_form').serialize();    
   				data = new FormData($('#edit_form')[0]);
      			data.append('fileUpload', $('#imgInp')[0].files[0]);
   				   $.ajax({
   				                url: url, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
   				                   console.log(php_script_response);
   				                   if(php_script_response=="true"){
								   	 $('#box_manage_pf').hide();
   				                   	 $('.progress').hide();
   				                   	 swal("อัพโหลดสำเร็จ","","success");
								   }
   				                }
   				 	});
	});
	
	$("#cancel_profile").click(function() {
		$('#imgInp').val('');
	 	$('#box_manage_pf').hide();
	 	$('#img_tag_new').hide();
	 	$('#img_tag').show();
	});
	$('#ex_iddriving').pickadate({
              format: 'yyyy-mm-dd',
              formatSubmit: 'yyyy/mm/dd',
              closeOnSelect: true,
              closeOnClear: false,
              "showButtonPanel": false,
              onStart: function() {
              	  var date=$('#ex_iddriving').val();
                  this.set('select', date); // Set to current date on load
         			console.log('open');
//         			$('.toolbar').hide();
              },
      		  onSet: function(context) {
      		  	var date = $('#ex_iddriving').val();
					console.log(date);
					$('.toolbar').show();
					console.log('onSet');
      		  },
      		  onClose: function() {
      		  		console.log('onClose');
					$('.toolbar').show();
      		  },
      		  onOpen: function() {
      		  		console.log('onOpen');
					$('.toolbar').hide();
      		  }
              });
	$('#ex_idcard').pickadate({
              format: 'yyyy-mm-dd',
              formatSubmit: 'yyyy/mm/dd',
              closeOnSelect: true,
              closeOnClear: false,
              "showButtonPanel": false,
              onStart: function() {
              	  var date=$('#ex_idcard').val();
                  this.set('select', date); // Set to current date on load
//         			console.log('open');
//         			$('.toolbar').hide();
              },
      		  onSet: function(context) {
      		  	var date = $('#ex_idcard').val();
					console.log(date);
					$('.toolbar').show();
      		  },
      		  onClose: function() {
      		  	
					$('.toolbar').show();
      		  },
      		  onOpen: function() {
					$('.toolbar').hide();
      		  }
    });
    
    function selectGender(val){
		$('.rcp').prop('checked', false);
		$('#checkbox-'+val).prop('checked', true);
		$('#gender').val(val);
	}
</script>