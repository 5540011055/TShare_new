<?php
	if($_GET[class_user]=='taxi'){
		$display_none = "display:none;";
		$titel = "ภาพหรือเอกสาร";
		$icon = '<i class="material-icons" style=" font-size:80px; color: #3b5998;"  >image</i>';

	}else{
		$display_none = "";
		$titel = "อัพโหลดภาพหรือเอกสาร";
		$icon = '<i class="material-icons" style=" font-size:80px; color: #3b5998;"  >cloud_upload</i>';
	}
?>
<form action="" method="post" id="photo_form" enctype="multipart/form-data">   	
<input type='file' id="imgInp" style="opacity: 0;" />
</form>
<table class="onlyThisTable" width="300" border="0" align="center" cellpadding="3" cellspacing="5" style="margin-top: 0px;" >
   <tbody>
      <tr>
         <td align="center" class="font-30" style="text-align: center;"><?=$icon;?></td>
      </tr>
      <tr>
         <td align="center" class="font-30"  style="text-align: center;"><b><?=$titel;?></b></td>
      </tr>
      <tr>
         <td align="center" class="font-26"  style="text-align: center;">
            <div class="<?= $coldata?>">
               <div style="background-color: #f3f3f3;padding: 10px 5px;border: 1px solid #ddd;" ><!--take_photo-->
                  <center>
                 
                  <div style="padding: 5px 10px;"><?=$txt_photo;?></div>
                  <table class="onlyThisTable" width="100%" border="0" cellspacing="2" cellpadding="2" style="<?=$display_none;?>" >
                     <tbody>
                        <tr>                         
                           <td width="100">
                              <label class="input-group-btn" >
                                 <button class="btn btn-primary" style="width:100px; z-index:0;padding: 6px;" id="icon_camera_checkin">
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
                              <button type="button" class="btn btn-default " style="padding-left:5px; padding-right:5px; width:30px" id="del_photo"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  
                  <div style="padding:5px;display: none;" id="pg_upload_bar">
                     <div class="progress">
					      <div class="indeterminate"></div>
					  </div>
                  </div>
                  
                  <img id="image_bill" name="image_bill"  style="width:100%; padding:5px; margin-top:0px;border-radius:15px;display: none;" />
                  
                  </center>
               </div>
            </div>
         </td>
      </tr>
      
      <tr>
         <td align="center"><a class="waves-effect waves-light btn red text-white" style="width: 80%;margin: 10px;display: none;" id="close_btn"><span class="font-24">ปิด</span></a></td>
      </tr>
   </tbody>
</table>

<script>
	setTimeout(function() {
			var img_path = '../data/fileupload/doc_bill/<?=$_GET[place];?>/<?=$_GET[place];?>_<?=$_GET[order_id];?>.jpg';
				                                $.ajax({
							                            url: img_path,
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
									                        $('#image_bill').show();
									                        $('#image_bill').attr('src', img_path);
							                            }
							                        });
                            }, 800); 

   $(".text-topic-action-mod-3").html('<?=$type?>');

   $('#btn_close_checkin_popup').click(function(){   
   		$( "#dialog_custom" ).toggle();
   		$( "#body_dialog_custom_load" ).html('');
   	});

 
   $("#icon_camera_checkin").click(function(){  
//   document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
   $("#imgInp").click(); 
   });
   function readURL(input) {
	  $('#pg_upload_bar').show();
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#image_bill').attr('src', e.target.result);
	    }
		
	    reader.readAsDataURL(input.files[0]);
	    
	    var url = "mod/booking/shop_history/load/upload_img/upload_bill.php?place=<?=$_GET[place];?>&order_id=<?=$_GET[order_id];?>";
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
							                            url: '../data/fileupload/doc_bill/<?=$_GET[place];?>/<?=$_GET[place];?>_<?=$_GET[order_id];?>.jpg',
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
									                        $('#image_bill').show();
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
   	var url_del = "mod/booking/shop_history/load/upload_img/del_img.php";
   	$.post( url_del+"?code=<?=$_GET[id]?>&type=<?=$_GET[type]?>", function( data ) {
    		$('#image_bill').attr('src','');
    		$('#image_bill').hide();
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