<?php 
			$name_th = "ชื่อ - นามสกุล";
			$name_en = "ชื่อ - นามสกุล (อังกฤษ)";
			$nickname = "ชื่อเล่น";
			$idcard = "เลขบัตรประชาชน";
			$address = "ที่อยู่ปัจจุบัน";
			$phone = "เบอร์โทรศัพท์";
			$phone2 = "เบอร์โทรศัพท์ที่สอง (ไม่บังคับ)";
			$phone_em = "เบอร์โทรศัพท์ฉุกเฉิน";
			$province = "จังหวัดที่คุณอยู่ประจำ";
			$email = "อีเมล์";
			$plate = "เลขทะเบียนรถ";
			$card_dv = "เลขใบขับขี่";
			$txt_ex_idcard = "วันหมดอายุบัตรประชาชน";
			$txt_ex_iddriving = "วันหมดอายุใบขับขี่";
		?>

<div style="padding: 1px 0 0 0;">
	<p class="intro" >
      กรุณากรอกข้อมูลที่เป็นความจริง เพื่อง่ายต่อการทำงานและการติดต่อของท่าน
    </p>
	<form name="form_singin" id="form_singin"  enctype="multipart/form-data">
	<input type="hidden" value="<?=$rand;?>" id="rand" name="rand" />
	<input type="hidden" value="" id="code_privince" name="code_privince" />
	<input type="hidden" value="<?=$_GET[ref];?>" id="register_reference" name="register_reference" />
    <ons-card class="card">
		<ons-list-header class="list-header"><b>ข้อมูลส่วนตัว</b></ons-list-header>
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="name-input" float="" maxlength="30" placeholder="<?=$name_th;?>" name="name_th" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$name_th;?>" name="name_th">
                    <span class="text-input__label">
                        <?=$name;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="md-face" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="nickname-input" float="" maxlength="30" placeholder="<?=$nickname;?>"  name="nickname" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$nickname;?>"  name="nickname">
                    <span class="text-input__label">
                        <?=$nickname;?></span>
                </ons-input>
            </label>
        </ons-list-item>

        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-home" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="address-input" float=""  placeholder="<?=$address;?>" name="address" style="width:100%;">
                    <input type="text" class="text-input" placeholder="<?=$address;?>" name="address" id="address">
                    <span class="text-input__label">
                        <?=$address;?></span>
                </ons-input>
            </label>
        </ons-list-item>

        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone-input" float="" placeholder="<?=$phone;?>" name="phone" style="width:100%;">
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone;?>" name="phone" id="phone" onkeyup="validPhoneNum($(this).val());">
                    <span class="text-input__label">
                        <?=$phone;?></span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_phone" />
                 <i id="corrent-phone" class="fa fa-check-circle pass checking-phone" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-phone" class="fa fa-times-circle no-pass checking-phone" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important"></span>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone-input" float="" placeholder="<?=$phone2;?>" name="phone2" style="width:100%;">
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone2;?>" name="phone2" id="phone2" >
                    <span class="text-input__label">
                        <?=$phone2;?></span>
                </ons-input>
             
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-volume-control-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone_em-input" float="" placeholder="<?=$phone_em;?>" name="phone_em" style="width:100%;">
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone_em;?>" name="phone_em" id="phone_em" >
                    <span class="text-input__label">
                        <?=$phone_em;?></span>
                </ons-input>
                
            </label>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        <div class="left list-item__left">
                <ons-icon icon="fa-users" class="list-item__icon ons-icon"></ons-icon><span class="txt-important" style="margin-left: 32px;">*</span>
            </div>
            <label class="center list-item__center">
		         <ons-select name="em_person" id="em_person" style=" right: 0px;  margin-top: 0px;  width: 100%;">
						    <option>เลือกผู้ติดต่อฉุกเฉิน</option>
				</ons-select>
			</label>
		</ons-list-item>
        <div>
            <div class="" style="width: 100%;">
                คุณอยู่จังหวัด&nbsp;<span id="txt-province" style="color: #ff6464;font-weight: 800;">..</span>
            </div>
        </div>

        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-location-arrow" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open':'user_province'}, 'lift-ios')">
                <span id="txt_user_province" >เลือก</span>
                 <input type="hidden" name="province" id="province" />
            </label>
        </ons-list-item>
             
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-at" class="list-item__icon ons-icon"></ons-icon>
            </div>
            <label class="center list-item__center">
                <ons-input id="email-input" float="" placeholder="<?=$email;?>" name="email" style="width:100%;">
                    <input type="email" class="text-input"  placeholder="<?=$email;?>" name="email" id="email" onkeyup="validEmail($(this).val());">
                    <span class="text-input__label">
                        <?=$phone;?></span>
                </ons-input>
                <i id="corrent-email" class="fa fa-check-circle pass checking-mail" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-email" class="fa fa-times-circle no-pass checking-mail" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
		
 		
		<ons-list-header class="list-header"><b>ภาพประจำตัว</b></ons-list-header>        
        <div align="center">
			<div >
			  
			  <input type="file" class="cropit-image-input" id="img_profile" accept="image/*"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-profile" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-profile" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_profile"  style="width: 170px;height: 170px;">
	      	<img src="../../../data/pic/driver/small/default-avatar.jpg" style="max-width: 100%; height: 170px;" id="pv_profile" onclick="performClick('img_profile');"  /><br/>
	      	<span class="txt-upload-profile"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลด</span>
	      </div> 
	    </div>
	   

    </ons-card>
    
    <ons-card  class="card">
      <ons-list-header class="list-header"><b>บัตรประชาชน</b></ons-list-header>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="   /* margin-left: -7px;*/">
                <ons-icon icon="fa-id-badge" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="idcard-input" float="" placeholder="<?=$idcard;?>" name="idcard" style="width:100%;">
                    <input type="number" pattern="\d*" class="text-input" placeholder="<?=$idcard;?>" onkeyup="checkIdCard(this.value);" name="idcard" id="idcard">
                    <span class="text-input__label">
                        <?=$idcard;?></span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_idc" />
                <!---- 0=pass, 1=incorrect, 2=overlap ----->
                <i id="corrent-idc" class="fa fa-check-circle pass checking" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-idc" class="fa fa-times-circle no-pass checking" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="   /* margin-left: -7px;*/">
                <span style="width: 100px;">หมดอายุบัตรประชาชน</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="idcard-input" float=""  name="ex_idcard" style="width:100%;" value="<?=date('Y-m-d');?>"  >
                    <input type="date"  class="text-input"  name="ex_idcard" id="ex_idcard">
                    <span class="text-input__label">
                        <?=$txt_ex_idcard;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <div align="center">
			<div >
			  <!--<button class="btn-ip" type="button">เลือกภาพบัตรประจำตัวประชาชน</button>-->
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_id_card"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-id_card" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-id_card" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_id_card" >
	      	<img src="../../images/ex_card/id_card.jpg" class="img-preview-show" id="pv_id_card" onclick="performClick('img_id_card');" />
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    bottom: 278px;
    border-top-left-radius: 5px; pointer-events: none;" ><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
        
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="   /* margin-left: -7px;*/">
                <ons-icon icon="fa-id-card-o" class="list-item__icon ons-icon"></ons-icon><span class="txt-important" style="margin-left: 35px;">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="iddriving-input" float="" placeholder="<?=$card_dv;?>" name="iddriving" style="width:100%;">
                    <input type="text" class="text-input" placeholder="<?=$card_dv;?>"  name="iddriving" id="iddriving">
                    <span class="text-input__label">
                        <?=$card_dv;?></span>
                </ons-input>               
            </label>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="   /* margin-left: -7px;*/">
                <span style="width: 100px;">หมดอายุใบขับขี่</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="idcard-input" float=""  name="ex_iddriving" style="width:100%;" value="<?=date('Y-m-d');?>"  >
                    <input type="date"  class="text-input"  name="ex_iddriving" id="ex_iddriving">
                    <span class="text-input__label">
                        <?=$txt_ex_iddriving;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        <div align="center">
			<div >
			  <!--<button class="btn-ip" type="button" onclick="$('#img_id_drving').click();" >เลือกภาพใบขับขี่</button>-->
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_id_drving"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-id_drving" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-id_drving" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_id_drving" >
	      	<img src="../../images/ex_card/id_driving.jpg" class="img-preview-show" id="pv_id_drving" onclick="performClick('img_id_drving');" />
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    bottom: 22px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
        
 	</ons-card>
    
    <ons-card  class="card">
      <ons-list-header class="list-header"><b>ข้อมูลรถ</b></ons-list-header>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-car" class="list-item__icon ons-icon"></ons-icon>
            </div>
            <label class="center list-item__center">
                <ons-input id="name-input" float="" maxlength="30" placeholder="<?=$plate;?>" name="plate_num" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$plate;?>" name="plate_num" onkeyup="validPlate($(this).val());">
                    <span class="text-input__label">
                        <?=$plate;?></span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_plate" />
                <i id="corrent-plate" class="fa fa-check-circle pass checking-plate" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-plate" class="fa fa-times-circle no-pass checking-plate" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left"  style="width: 105px;">
                <span>ประเภทรถ</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'ประเภทรถ', 'open':'car_type'}, 'lift-ios')">
                <span id="txt_car_type" >เลือก</span>
                <input type="hidden" name="car_type" id="car_type" />
            </div>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" style="width: 105px;">
                <span>ยี่ห้อ</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'ยี่ห้อรถ', 'open':'car_brand'}, 'lift-ios')">
                
                <span class="brand-small list-item__thumbnail" id="img_car_brand_show" style="margin-right: 10px;display: none;"  ></span>
                <span id="txt_car_brand" >เลือก</span>
                <input type="hidden" name="car_brand" id="car_brand" value="" />
                <input type="hidden" name="car_brand_txt" id="car_brand_txt" value="" />
            </div>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" style="width: 105px;">
                <span>สีรถ</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'สีรถ', 'open':'car_color'}, 'lift-ios')">
             	<img src="" style="width: 30px; margin-right: 15px;display: none;border: 1px solid #eee;" id="img_car_color_show"  />
                <span id="txt_car_color" >เลือก</span>
                <input type="hidden" name="car_color" id="car_color" value="" />
                <input type="hidden" name="car_color_txt" id="car_color_txt" value="" />
            </div>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" style="width: 105px;">
                <span>สีป้ายทะเบียน</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'สีป้ายทะเบียน', 'open':'plate_color'}, 'lift-ios')">
            	<img src="" style="width: 30px; margin-right: 15px;display: none;" id="img_plate_color_show"  />
                <span id="txt_plate_color" >เลือก</span>
                <input type="hidden" name="plate_color" id="plate_color" />
                <input type="hidden" name="plate_color_txt" id="plate_color_txt" />
            </div>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" style="width: 105px;">
                <span>จังหวัด</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open':'car_province'}, 'lift-ios')">
            	<span id="txt_car_province" >เลือก</span>
                <input type="hidden" name="car_province" id="car_province" />
            </div>
        </ons-list-item>
        <div align="center" style="margin-top: 10px;">
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_car_img"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-car_img" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-car_img" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_img" onclick="performClick('img_car_img');" >
	      	<img src="" style="" class="img-preview-show" id="pv_car_img"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    bottom: 22px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
 	</ons-card>
</form>
     <ons-card class="card">
    <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="createAlertDialog();" >ยืนยันข้อมูล</ons-button>
    </ons-card>

	
</div>   

<script>
	$(function() {
		
		 var url = "../../mod/material/user/php_user.php?action=upload";
        $('.image-editor').cropit({
          imageState: {
            src: url,
          },
          freeMove: false,
          width : 250,
          height : 350
        });

        $('.rotate-cw').click(function() {
          $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
          $('.image-editor').cropit('rotateCCW');
        });

      });
    
    function readURL(input,type) {

	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    	reader.onload = function(e) {
	    	
				$('#pv_'+type).attr('src', e.target.result);
	      		var data = new FormData($('#form_singin')[0]);
      			data.append('fileUpload', $('#img_'+type)[0].files[0]);
      			var url_upload = "../../mod/user/upload_img/upload.php?id="+$('#rand').val()+"&type="+type;
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
   				                   $('#box_img_'+type).fadeIn(200);
   				                   $('#txt-img-has-'+type).show();
   				                   $('#txt-img-nohas-'+type).hide();
   				                },
						        error: function(e){
						                console.log(e)
						        }
   				 	});
	    }
	    	reader.readAsDataURL(input.files[0]);
	   		
	  }
	  
	}
    
	$("#img_id_card").change(function() {
	  	 readURL(this,'id_card');
	});
	
	$("#img_id_drving").change(function() {
	  	 readURL(this,'id_drving');
	});
	
	$("#img_car_img").change(function() {
	  	 readURL(this,'car_img');
	});
	
	$("#img_profile").change(function() {
//	  	 readURLprofile(this);
		var input = this;
		if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    	reader.onload = function(e) {
	    		$('#pv_profile').attr('src', e.target.result);
	    }
	    	reader.readAsDataURL(input.files[0]);
	  }
	});

</script>