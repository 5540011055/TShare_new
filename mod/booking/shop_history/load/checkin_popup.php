<?  //include ("mod/booking/shop_history/load/checkin/photo/upload_checkin_pic.php");

   $arr[project][id]=$_GET[id];
    if($_GET[type]=='driver_topoint'){		
      $type= t_place_of_delivery;		
      $icon = 'icon-new-uniF12D-1';
      $action = 'check_driver_topoint';
      $txt_photo = t_please_take_photo_drop_place;
    }
    else if($_GET[type]=='guest_receive'){		
      $type= t_reception;
      $icon = 'icon-new-uniF159-5';	
      $action = 'check_guest_receive';
      $txt_photo = t_please_take_recep_photo;
    } 
    else if($_GET[type]=='guest_register'){		
      $type= t_guest_registration;	
      $icon = 'icon-new-uniF116-6';	
      $action = 'check_guest_register';
      $txt_photo = t_please_take_guest_regis;
    } 
    else if($_GET[type]=='driver_pay_report'){		
     $type= t_income_statement;		
     $icon = 'icon-new-uniF121-10';
     $action = 'check_driver_pay_report';
     $txt_photo = t_take_photo_income_slip;
    }
    
   	?>
<form action="" method="post" id="photo_form" enctype="multipart/form-data">   	
<input type='file' id="imgInp" style="opacity: 0;" />
</form>
<table class="onlyThisTable" width="300" border="0" align="center" cellpadding="3" cellspacing="5" style="margin-top: 0px;" >
   <tbody>
      <tr>
         <td align="center" class="font-30" style="text-align: center;"><i class="<?=$icon;?>" style=" font-size:80px; color: #3b5998;"  ></i></td>
      </tr>
      <tr>
         <td align="center" class="font-30"  style="text-align: center;"><b><?=t_are_you_sure;?></b></td>
      </tr>
      <tr>
         <td align="center" class="font-26"  style="text-align: center;"><?=$type?></td>
      </tr>
      <tr>
         <td align="center" class="font-26"  style="text-align: center;">
            <div class="<?= $coldata?>">
               <div style="background-color: #f3f3f3;padding: 10px 5px;border: 1px solid #ddd;" ><!--take_photo-->
                  <center>
                 
                  <div style="padding: 5px 10px;"><?=$txt_photo;?></div>
                  <table class="onlyThisTable" width="100%" border="0" cellspacing="2" cellpadding="2" >
                     <tbody>
                        <tr>
                           
                           <td width="100">
                              <label class="input-group-btn" >
                                 <button class="btn btn-primary" style="width:100px; z-index:0;padding: 6px;color: #fff;" id="icon_camera_checkin" onclick="$('#imgInp').click(); ">
                                 	<span class="font-22">
                                    <i class="fa  fa-camera"></i>&nbsp;<?echo t_take_photos?>
                                    </span>
                                    <!--<input type="text" class="form-control" name="icon_camera_<?=$i?>" id="icon_camera_<?=$i?>"   style="display: none;"/>-->
                                 </button>
                              </label>
                           </td>
                           <td><span class="input-group" style="margin-top:5px;">
                              <input type="text"  value="<?echo t_no_photo_available?>" class="photo-no-active" readonly  style="padding-left:5px; margin-top:-5px; padding-right:0px; width:100%; height:35px;" id="url_photo">
                              </span>
                           </td>
                           <td width="30">        
                              <button onclick="deletedPhoto('<?=$_GET[id]?>','<?=$_GET[type]?>');" type="button" class="btn btn-default " data-toggle="modal" style="padding-left:5px; padding-right:5px; width:30px" id="del_photo"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  
                  <div style="padding:5px;display: none;" id="pg_upload_bar">
                     <div class="progress">
					      <div class="indeterminate"></div>
					  </div>
                  </div>
                  
                  <img id="image_<?=$_GET[type]?>" name="image_<?=$_GET[type]?>"  style="width:100%; padding:5px; margin-top:0px;border-radius:15px;display: none;" />
                  
                  </center>
               </div>
            </div>
         </td>
      </tr>
      <tr>
         <td align="center">
            <table class="onlyThisTable" width="100%" border="0" cellspacing="2" cellpadding="2">
               <tbody>
                  <tr>
                     <td width="50%">
                        <button  id="btn_close_checkin_popup" onclick="$( '#dialog_custom' ).toggle();$( '#body_dialog_custom_load' ).html('');"  type="button" class="btn waves-effect waves-light lighten-2 " 
                         style="width:100%;background-color:#9E9E9E;  border-radius: 0px;color: #fff;">
                           <span class="font-26">
                           <center>
                           <? echo t_no; ?>
                           </center>
                           </span>
                        </button>
                     </td>
                     <td width="50%">
                        <button  id="btn_checkin_popup_<?=$_GET[id]?>" onclick="sendCheckIn();"  type="button" class="btn waves-effect waves-light lighten-2 "  style="width:100%;background-color:#3b5998;  border-radius: 0px;color: #fff;">
                           <span class="font-26">
                           <center>
                           <? echo t_yes; ?>
                           </center>
                           </span>
                        </button>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td align="center">&nbsp;</td>
      </tr>
   </tbody>
</table>
<input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" value="<?=$_GET[type]?>" />
<script>
	var lat = $('#lat').val();
    var lng = $('#lng').val();
    
    if(lat<=0 || lng<=0){
		geolocatCall();
	}
	
   $(".text-topic-action-mod-3").html('<?=$type?>');
    	
    function sendCheckIn(){
		var url = "mod/booking/shop_history/php_shop.php?action=<?=$action;?>&type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>&lat="+lat+"&lng="+lng;
    console.log(url);
/*alert(url);
return;*/
		$.post(url,function(res){
			console.log(res);
			
			if(res.result==true){
				 changeHtml("<?=$_GET[type]?>","<?=$arr[project][id]?>","<?=time();?>")
				 console.log(array_data);
   				 $('#json_shop').val(JSON.stringify(array_data));
				/*var message = "";
				socket.emit('sendchat', message);*/
				sendSocket('<?=$arr[project][id]?>');
				$( "#close_dialog_custom" ).click();
				
		      	 $.post('send_messages/send_checkin.php?type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>',function(data){
   					console.log(data);
   				});
		      	
		      	
		      	
			}else{
				swal("Error");
			}
		});
	}
    	
</script>

<script>
 
   /*$("#icon_camera_checkin").click(function(){  
   alert(3);
//   document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
   $("#imgInp").click(); 
   });*/
   function readURL(input) {
//   	  alert(123);
	  $('#pg_upload_bar').show();
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#image_'+$('#upload_pic_type').val()).attr('src', e.target.result);
	    }
		
	    reader.readAsDataURL(input.files[0]);
	    
	    var url = "mod/booking/shop_history/load/upload_img/upload.php" + "?type=" + $('#upload_pic_type').val()+"&code=" + $('#check_code').val();
   				data_form = $('#photo_form').serialize();    
   				data = new FormData($('#photo_form')[0]);
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
   				                   setTimeout(function() {
				                                $.ajax({
							                            url: '../data/fileupload/store/' + document.getElementById('upload_pic_type').value + '_<?=$_GET[id];?>.jpg',
							                            type: 'HEAD',
							                            error: function() {
							                                console.log('Error file');
							                            },
							                            success: function() {
							                                //file exists
							                                console.log('success file');
							                                $('#url_photo').val('มีภาพถ่ายแล้ว');
							                                $('#icon_camera_checkin').removeClass('btn-primary');
							                                $('#icon_camera_checkin').addClass('green white-text');
							                                $('#del_photo').removeClass('btn-default');
							                                $('#del_photo').addClass('btn-danger');

//									                        $("#image_" + pictype).fadeIn(3000);
									                        $('#pg_upload_bar').hide();
									                        $('#image_<?=$_GET[type]?>').show();
							                            }
							                        });
                            }, 1500); 
   				                   
   				                }
   				     });
	    
	  }
	  
	}

	$("#imgInp").change(function() {
	  readURL(this);
	});
	
   
   function deletedPhoto(id,type){
   	var url_del = "mod/booking/shop_history/load/upload_img/del_img.php";
	   	$.post( url_del+"?code="+id+"&type="+type, function( data ) {
	    		$('#image_'+type).attr('src','');
	    		$('#image_'+type).hide();
	    		$('#area_image_album_load_driver_topoint').css('width','0%');
	    		$('#icon_camera_checkin').removeClass('btn-success');
	    		$('#icon_camera_checkin').addClass('btn-primary');
	    		$('#del_photo').removeClass('btn-danger');
	    		$('#del_photo').addClass('btn-default');
	    		$('#url_photo').val('<?echo t_no_photo_available?>');
	    		$('#photo_'+type).css('color','#3b59987a');
	   	$('#photo_'+type).css('border','1px solid #3b59987a');
	   });
   }
</script>