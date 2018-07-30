<?  //include ("mod/booking/shop_history/load/checkin/photo/upload_checkin_pic.php");

   $arr[project][id]=$_GET[id];
    if($_GET[type]=='driver_topoint'){		
      $type= t_place_of_delivery;		
      $icon = 'icon-new-uniF12D-1';
      $txt_photo = t_please_take_photo_drop_place;
      $next_step = "driver_pickup";
    }
    else if($_GET[type]=='driver_pickup'){		
      $type = t_check_customer_name;
      $icon = 'icon-new-uniF159-5';	
      $txt_photo = t_take_pic_guest;
       $next_step = "driver_complete";
    } 
    else if($_GET[type]=='driver_complete'){		
      $type= t_check_vehicle;	
      $icon = 'icon-new-uniF116-6';	
      $txt_photo = t_please_take_photo_drop_place;
      $next_step = "driver_checkcar";
    } 
    else if($_GET[type]=='driver_checkcar'){		
     $type= t_check_luggage;		
     $icon = 'icon-new-uniF121-10';
     $txt_photo = t_take_picture_inside_car;
     $last_step = 'driver_checkcar';
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
                                 <button class="btn btn-primary" style="width:100px; z-index:0;padding: 6px;color: #fff;" id="icon_camera_checkin">
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
                              <button type="button" class="btn btn-default " data-toggle="modal" style="padding-left:5px; padding-right:5px; width:30px" id="del_photo"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
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
                        <button  id="btn_close_checkin_popup"  type="button" class="btn waves-effect waves-light lighten-2 " 
                         style="width:100%;background-color:#9E9E9E;  border-radius: 0px;color: #fff;">
                           <span class="font-26">
                           <center>
                           <? echo t_no; ?>
                           </center>
                           </span>
                        </button>
                     </td>
                     <td width="50%">
                        <button  id="btn_checkin_popup_<?=$_GET[id]?>"  type="button" class="btn waves-effect waves-light lighten-2 "  style="width:100%;background-color:#3b5998;  border-radius: 0px;color: #fff;">
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

   $('#btn_close_checkin_popup').click(function(){   
   		$( "#dialog_custom" ).toggle();
   		$( "#body_dialog_custom_load" ).html('');
   	});

   ///
   $('#btn_checkin_popup_<?=$_GET[id]?>').click(function(){   
//   	afterAction();
//   	return;
		 var lat = $('#lat').val();
	    var lng = $('#lng').val();
	    var idorder = '<?=$_GET[id];?>';
	    var url = "mod/tbooking/curl_connect_api.php?type=checkin_approve&step=<?=$_GET[type];?>&oi="+idorder;
	    console.log(url);
			$.post(url,{ idorder:idorder,lat:lat, lng:lng  },function(res){
				console.log(res)
				if(res.status=="ok"){
					if(res.data.status=="200"){
						$( "#close_dialog_custom" ).click();
						afterAction();
					}else{
						swal("Error");
					}
				}
				$('#btn_manage').click();
				callApiLog();
			});
    });
    	
    function afterAction(){
    	if('<?=$_GET[type];?>'=='driver_pickup'){
			$("#btn_pickup_not_tr").hide();
		}
	var url_status = "mod/tbooking/load/component.php?request=check_status_checkin&status=1&time=<?=time();?>";
	$('#status_<?=$_GET[type]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
	$('#status_<?=$_GET[type]?>').load(url_status); 
	$('#iconchk_<?=$_GET[type]?>').attr("src", "images/yes.png");  
	$("#number_<?=$_GET[type]?>").removeClass('step-booking');
	$("#number_<?=$_GET[type]?>").addClass('step-booking-active');
	$("#btn_<?=$_GET[type]?>").css("background-color","rgb(102, 102, 102)");
	$('#<?=$_GET[type]?>_check_click').val(1);
	$("#box_<?=$_GET[type]?>").removeClass('border-alert');
	var lat = $('#lat').val();
    var lng = $('#lng').val();
	$('#<?=$_GET[type]?>_locat_on').attr("onclick","openPointMapsTransfer('<?=$_GET[type]?>','"+lat+"','"+lng+"')");
	$('#<?=$_GET[type]?>_locat_on').show();
	$('#<?=$_GET[type]?>_locat_off').hide();
	console.log('++++++++++++');
	
	if("<?=$last_step;?>"=="driver_checkcar"){
		var driver = $('#driver').val();
		callApiManage();
		callApiLog();
		return;
	}
	$("#step_<?=$next_step;?>").show();
	
	}		
</script>

<script>
 
   $("#icon_camera_checkin").click(function(){  
//   document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
   $("#imgInp").click(); 
   });
   function readURL(input) {
	  $('#pg_upload_bar').show();
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#image_<?=$_GET[type]?>').attr('src', e.target.result);
	    }
		
	    reader.readAsDataURL(input.files[0]);
	    
	    var url = "mod/tbooking/load/upload_img/upload.php" + "?type=" + document.getElementById('upload_pic_type').value+"&code=" + $('#check_code').val();
	    console.log(url);
//	    return;
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
							                            url: '../data/fileupload/store/tbooking/' + document.getElementById('upload_pic_type').value + '_<?=$_GET[id];?>.jpg',
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
															
															$('#photo_<?=$_GET[type];?>_yes').show();
			     											$('#photo_<?=$_GET[type];?>_no').hide();
															
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
	
   $('#del_photo').click(function(){
//   	var url_del = "mod/booking/shop_history/load/upload_img/del_img.php";
   	var url_del = "mod/tbooking/load/upload_img/del_img.php";
   	$.post( url_del+"?code=<?=$_GET[id]?>&type=<?=$_GET[type]?>", function( data ) {
    		$('#image_<?=$_GET[type]?>').attr('src','');
    		$('#image_<?=$_GET[type]?>').hide();
    		$('#area_image_album_load_driver_topoint').css('width','0%');
    		$('#icon_camera_checkin').removeClass('btn-success');
    		$('#icon_camera_checkin').addClass('btn-primary');
    		$('#del_photo').removeClass('btn-danger');
    		$('#del_photo').addClass('btn-default');
    		$('#url_photo').val('<?echo t_no_photo_available?>');
    		$('#photo_<?=$_GET[type]?>').css('color','#3b59987a');
   	$('#photo_<?=$_GET[type]?>').css('border','1px solid #3b59987a');
   });
   });
</script>