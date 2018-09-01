<style>
   label{
   margin-left: -10px;
   }
   .select-dropdown{
   padding-left: 10px;
   border: 1px solid #ddd;
   }
   .initialized{
   display: none;
   }
   .select-wrapper input.select-dropdown{
   margin : 0px;
   }
</style>
<?php 
    $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
    $res[project] = $db->select_query("SELECT * FROM  web_carall  where id= '".$_GET[id]."' ");
	$arr[web_car] = $db->fetch($res[project]);   
    
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
    $res[pro] = $db->select_query("SELECT area FROM  web_province where name_th like '%".$arr[web_car][province]."%' ");
    $arr[pro] = $db->fetch($res[pro]);                
    $path_car = '../data/pic/car/';
   ?>
<div style="margin-top: 40px;padding:10px;">
   <form name="myform_data" id="myform_data"   enctype="multipart/form-data" >
   	  <div style="padding: 10px;">
      <table class="tb-pd-5" width="100%">
         <tr>
            <td colspan="2">
               <div class="input-field col s12">
                  <select  id="car_type2" name="car_type">
                     <option value="" disabled selected ><?=t_select_a_vehicle_type;?></option>
                     <?
                        $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                     	$res[ct] = $db->select_query("SELECT * FROM  web_car_use_type");
                        while ($arr[ct] = $db->fetch($res[ct])){
                        	if($arr[ct][id]==$arr[web_car][car_type]){
								$selected_type = "selected";
							}else{
								$selected_type = "";
							}
                        ?>
                         <option value="<?=$arr[ct][id];?>" <?=$selected_type;?>><?=$arr[ct][name_th];?></option>
                        <? }
                        $db->closedb ();
                        ?>
                  </select>
                  <label class="font-22"><?=t_type_of_vehicle;?></label>
               </div>
            </td>
         </tr>
         <tr>
            <td colspan="2">
               <div class="input-field col s12">
                    <select id="car_brand" name="car_brand" onchange="changeSelect('car_brand');">
                     <option value="" disabled selected><?=t_select_car_brand;?></option>
                     <?php 
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                     $res[brand] = $db->select_query("SELECT * FROM  web_car_brand");
         			 while($arr[brand] = $db->fetch($res[brand])){ 
         			 	if($arr[brand][id]==$arr[web_car][i_car_brand]){
							$select_brand = "selected";
						}else{
							$select_brand = "";
						}
         			 ?>
					 	<option value="<?=$arr[brand][id];?>" <?=$select_brand;?> ><?=$arr[brand][name_en];?></option>
					 <?php }
                     ?>
                  </select>
                  <input type="hidden" value="" id="txt_car_brand" name="txt_car_brand" />
                  <label class="font-22" style="margin-top: -25px;"><?=t_car_brand;?></label>
               </div>
            </td>
         </tr>
         <tr>
            <td colspan="2">
               <div class="input-field col s12">
                   <select class="icons" id="car_color" name="car_color" onchange="changeSelect('car_color');">
                     <option value="" disabled selected><?=t_choose_color;?></option>
                      <?php 
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                     $res[color] = $db->select_query("SELECT * FROM  web_car_color where status = 1");
         			 while($arr[color] = $db->fetch($res[color])){ 
         			 	if($arr[color][id]==$arr[web_car][i_car_color]){
							$select_carcolor = "selected";
						}else{
							$select_carcolor = "";
						}
         			 ?>
					 	<option  data-icon="material/img/<?=$arr[color][img];?>" value="<?=$arr[color][id];?>" <?=$select_carcolor;?> ><?=$arr[color][name_th];?></option>
					 <?php }
                     ?>
                     <!--<option data-icon="material/img/silver.png" value="Silver Bronze" <? if($arr[web_car][car_color]=='Silver Bronze'){ echo 'selected=selected';} ?>><?=t_silver;?></option>-->
                  </select>
                  <label class="font-22"><?=t_car_coloring;?></label>
                  <input type="hidden" value="" id="txt_car_color" name="txt_car_color" />
               </div>
            </td>
         </tr>
         <tr>
            <td width="100%">
               <div class="input-field col s12">
                  <!--<i class="material-icons prefix">assignment</i>-->
                  <input type="text" value="<?=$arr[web_car][plate_num];?>"  name="plate_num" id="plate_num" class="autocomplete font-22" style="margin: 0 0 0px 0;margin-left: 0px;" >
                  <label class="font-22 active" for="autocomplete-input"><?=t_car_registration_number;?></label>
               </div>
            </td>
         </tr>
         <tr>   
            <td width="100%">
               <div class="input-field col s12">
                   <select class="icons" id="plate_color" name="plate_color" onchange="changeSelect('plate_color');">
                     <option value="" disabled selected><?=t_choose_license_plate_color;?></option>
                     <?php 
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                     $res[color] = $db->select_query("SELECT * FROM  web_car_color where status = 1 and plate = 1");
         			 while($arr[color] = $db->fetch($res[color])){ ?>
					 	<option  data-icon="material/img/<?=$arr[color][img];?>" value="<?=$arr[color][id];?>" ><?=$arr[color][name_th];?></option>
					 <?php }
                     ?>
                  </select>
                   <input type="hidden" value="" id="txt_plate_color" name="txt_plate_color" />
                  <label class="font-22" style="margin-top: -25px;"><?=t_license_plate_color;?></label>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="input-field col s12">
                  <select class="icons"  id="region" name="region">
                     <option value="" disabled selected><?=t_select_region;?></option>
                     <?php 
                        $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                  $res[region] = $db->select_query("SELECT * FROM web_region order by ".$place_shopping."  ");
                                    while($arr[region] = $db->fetch($res[region])) { 
                                	if($arr[pro][area]==$arr[region][id]){
                                		$selected_area = "selected";
                                	}else{
										$selected_area = "";
									}
                                    ?>
                     <option value="<?=$arr[region][id];?>" <?=$selected_area;?> ><?=$arr[region][$place_shopping];?></option>
                     <? } ?>
                  </select>
                  <label class="font-22"><?=t_region;?></label>
               </div>
            </td>
            <td>
               <div class="input-field col s12" id="element_pv">
                  <select class="icons" id="province" name="province">
                     <option value="" disabled selected><?=t_select_province;?></option>
                     <?php 
                        $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                   $res[pv] = $db->select_query("SELECT * FROM web_province  ORDER BY ".$province." asc ");
                                    while($arr[pv] = $db->fetch($res[pv])) { 
                                    $txt = explode("/",$arr[pv][$province]);
                                    if($arr[web_car][province]==$txt[0]){
                                    	$selected_pv = 'selected';
                                    }else{
                                    	$selected_pv = '';
                                    }
                                    ?>
                     <option value="<?=$txt[0];?>" class="<?=$arr[pv][area];?>" <?=$selected_pv;?>><?=$txt[0];?></option>
                     <? } ?>
                  </select>
                  <label class="font-22"><?=t_province;?></label>
               </div>
            </td>
         </tr>
      </table>
	  </div>
      <table width="100%" class="tb-pd-5" style="margin-top: 10px;">
         <tr>
            <td>
               <div align="center" style="padding: 10px 0px;" >
                  <div class="take_photo"  id="icon_camera_id_car_1" style="padding: 10px;background-color: #e6e6e6;" role="1" >
                     <i class="material-icons" style="font-size:40px;">add_a_photo</i>
                     <br>
                     <span class="font-24"><?=t_please_take_pictures_front_car;?></span>
                     <div style="padding:5px;display: none;" id="pg_upload_bar_1">
                        <div class="progress">
                           <div class="indeterminate"></div>
                        </div>
                     </div>
                     <img id="image_1" name="image_1" src="<?=$path_car.$arr[web_car][id];?>_1.jpg?v=<?=time();?>"  style="width:100%; padding:5px; margin-top:0px;border-radius:15px;display: nones;" />
                  </div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div align="center"  style="padding: 10px 0px;" >
                  <div class="take_photo"  id="icon_camera_id_car_2" style="padding: 10px;background-color: #e6e6e6;" role="2" >
                     <i class="material-icons" style="font-size:40px;">add_a_photo</i>
                     <br>
                     <span class="font-24"><?=t_please_take_pictures_car_side;?></span>
                     <div style="padding:5px;display: none;" id="pg_upload_bar_2">
                        <div class="progress">
                           <div class="indeterminate"></div>
                        </div>
                     </div>
                     <img id="image_2" name="image_2" src="<?=$path_car.$arr[web_car][id];?>_2.jpg?v=<?=time();?>"  style="width:100%; padding:5px; margin-top:0px;border-radius:15px;display: nones;" />
                  </div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div align="center"  style="padding: 10px 0px;" >
                  <div class="take_photo"  id="icon_camera_id_car_3" style="padding: 10px;background-color: #e6e6e6;" role="3" >
                     <i class="material-icons" style="font-size:40px;">add_a_photo</i>
                     <br>
                     <span class="font-24"><?=t_take_picture_inside_car;?></span>
                     <div style="padding:5px;display: none;" id="pg_upload_bar_3">
                        <div class="progress">
                           <div class="indeterminate"></div>
                        </div>
                     </div>
                     <img id="image_3" name="image_3" src="<?=$path_car.$arr[web_car][id];?>_3.jpg?v=<?=time();?>" style="width:100%; padding:5px; margin-top:0px;border-radius:15px;display: nones;" />
                  </div>
               </div>
            </td>
         </tr>
      </table>
       <?
         $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
         ?>
      <input class="form-control" type="hidden" name="check_code" id="check_code"   value="<?=$rand ?>" >   
      <input type='file' id="imgInp_1" style="opacity: 0;display: none;" />
      <input type='file' id="imgInp_2" style="opacity: 0;display: none;" />
      <input type='file' id="imgInp_3" style="opacity: 0;display: none;" />
   </form>
   
   <table class="tb-pd-5" width="100%" border="0" style="margin-bottom: 10px;">
      <tbody>
         <tr>
            <td width="50%">
               <button id="reset_data_car" type="button" class="btn waves-effect waves-light lighten-2 " style="width:100%;background-color:#9E9E9E;  border-radius: 0px;color: #fff;">
                  <span class="font-24">
                     <center>รีเซ็ต</center>
                  </span>
               </button>
            </td>
            <td width="50%">
               <button id="save_data_car" type="button" class="btn waves-effect waves-light lighten-2 " style="width:100%;background-color:#3b5998;  border-radius: 0px;color: #fff;">
                  <span class="font-24">
                     <center>บันทึก</center>
                  </span>
               </button>
            </td>
         </tr>
      </tbody>
   </table>
</div>
<script>
   $(document).ready(function() {
   	
       $('select').material_select();
       
       $('#text_mod_topic_action_1').html('แก้ไขรถ');
       
       $('#region').change(function(){
       	var region = $(this).val();
       	console.log(region);
       	var query_url = "mod/material/car/php_car.php?ele=select_province";
       	$.post(query_url,{ region:region },function(data){
   //    		console.log(data);
       		$('#element_pv').html(data);
   
       	});
       	
       });
       
       $("#save_data_car").click(function(){ 
         swal({
		   	title: "<?=t_are_you_sure;?>",
		   	text: "<?=t_correct_information;?>",
		   	type: "warning",
		   	showCancelButton: true,
		   	confirmButtonClass: "btn-danger waves-effect waves-light",
		  	cancelButtonClass: "btn-cus waves-effect waves-light",
		   	confirmButtonText: '<?=t_yes;?>',
		   	cancelButtonText: "<?=t_no;?>",
		   	closeOnConfirm: false,
		   	closeOnCancel: true,
		   	html: true
		   },
		   function(isConfirm){
		      if (isConfirm){
		      	var url = "mod/material/car/php_car.php?action=edit&id=<?=$_GET[id];?>";
		    	$.post(url,$('#myform_data').serialize(),function(response){
		    		console.log(response);
		    		if(response.result==true){
						swal('แก้ไขสำเร็จ','','success');
						$('#main_load_mod_popup_1').hide();
						openAllCar();
					}
		    	});
		      } 
		   });
   });

});
</script>
<script>
   $('.take_photo').click(function(){
   	var number = $(this).attr('role');
   	console.log(number);
//   	return;
   	$("#imgInp_"+number).click();
   });
   function readURL(input,id) {
     $('#pg_upload_bar_'+id).show();
     $('#image_'+id).hide();
     if (input.files && input.files[0]) {
       var reader = new FileReader();
   
       reader.onload = function(e) {
         $('#image_'+id).attr('src', e.target.result);
       }
   	
       reader.readAsDataURL(input.files[0]);
//       $('#image_'+id).show();
       var url = "mod/material/car/upload_pic.php?type=edit&id=<?=$_GET[id];?>&point="+id ;
       console.log(url);
//       return;
     				data_form = $('#photo_form').serialize();    
     				data = new FormData($('#photo_form')[0]);
        			data.append('fileUpload', $('#imgInp_'+id)[0].files[0]);
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
   						                            url: '../data/pic/car/<?=$_GET[id];?>_'+id+'.jpg',
   						                            type: 'HEAD',
   						                            error: function() {
   						                                console.log('Error file');
   						                            },
   						                            success: function() {
   						                                //file exists
   						                                console.log('success file');
   						                               $('#pg_upload_bar_'+id).hide();
   						                               $('#image_'+id).show();
   						                            }
   						                        });
                              }, 1500); 
     				                   
     				                }
     				     });
       
     }
     
   }
   
   $("#imgInp_1").change(function() {
     readURL(this,1);
   });
   $("#imgInp_2").change(function() {
     readURL(this,2);
   });
   $("#imgInp_3").change(function() {
     readURL(this,3);
   });
</script>