<?php 
			$name_th = "ชื่อ - นามสกุล";
			$name_en = "ชื่อ - นามสกุล (อังกฤษ)";
			$nickname = "ชื่อเล่น";
			$idcard = "เลขบัตรประชาชน";
			$address = "ที่อยู่ปัจจุบัน";
			$phone = "เบอร์โทรศัพท์";
			$phone_em = "เบอร์โทรศัพท์ฉุกเฉิน";
			$province = "จังหวัดที่คุณอยู่ประจำ";
			$email = "อีเมล์";
			$plate = "เลขทะเบียนรถ";
			$card_dv = "ใบขับขี่";
		?>

<div style="padding: 1px 0 0 0;">
	<p class="intro" >
      กรุณากรอกข้อมูลที่เป็นความจริง เพื่อง่ายต่อการทำงานและการติดต่อของท่าน
    </p>
	<form name="form_singin" id="form_singin"  enctype="multipart/form-data">
    <ons-card class="card">
		<ons-list-header class="list-header"><b>ข้อมูลส่วนตัว</b></ons-list-header>
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon>
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
                <ons-icon icon="md-face" class="list-item__icon ons-icon"></ons-icon>
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
                <ons-icon icon="fa-home" class="list-item__icon ons-icon"></ons-icon>
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
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon>
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
                <ons-icon icon="fa-volume-control-phone" class="list-item__icon ons-icon"></ons-icon>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone-input" float="" placeholder="<?=$phone_em;?>" name="phone" style="width:100%;">
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone_em;?>" name="phone_em" id="phone_em" >
                    <span class="text-input__label">
                        <?=$phone_em;?></span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_phone" />
                 <i id="corrent-phone" class="fa fa-check-circle pass checking-phone" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-phone" class="fa fa-times-circle no-pass checking-phone" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>

        <ons-list-item class="list-item">
            <div class="center list-item__center">
                <ons-select  name="province" id="choose-province"  style="width: 100px;" ><!--onchange="$('#txt-province').text($(this).find('option:selected').text());"-->
                    <option value="0">เลือก</option>
                </ons-select>
            </div>
            <div class="right right-label list-item__right" style="width: 200px;">
                คุณอยู่จังหวัด&nbsp;<span id="txt-province" style="color: #ff6464;font-weight: 800;">..</span>
            </div>
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
		
 		<div class="image-editor" align="center">
			<div class="upload-btn-wrapper">
			  <button class="btn-ip" type="button">เลือกภาพประจำตัว</button>
			  <!--<input type="file" class=""  id="imgInp" >-->
			  <input type="file" class="cropit-image-input" id="imgInp"  style="opacity: 0;/*position: absolute;*/">
			</div>
	      
	      <div class="cropit-preview" >
	      </div>
	      <div align="center">
	      	<button class="rotate-ccw" type="button"><ons-icon icon="fa-repeat" class="list-item__icon ons-icon"></ons-icon></button>
	      	<!--<button class="rotate-cw" type="button" style="margin-left: 20px;"><ons-icon icon="fa-chevron-right" class="list-item__icon ons-icon"></ons-icon></button> -->
	      </div>
	      <input type="hidden" name="image-data" class="hidden-image-data" />
	      <!--<button type="button" onclick="testUpload();">Click</button>  -->  
	    </div>

    </ons-card>
    
    <ons-card  class="card">
      <ons-list-header class="list-header"><b>บัตรประชาชน</b></ons-list-header>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="   /* margin-left: -7px;*/">
                <ons-icon icon="fa-id-badge" class="list-item__icon ons-icon"></ons-icon>
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
        
        <div align="center">
			<div >
			  <!--<button class="btn-ip" type="button">เลือกภาพบัตรประจำตัวประชาชน</button>-->
			  <input type="file" class="cropit-image-input" id="img_id_card"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-id_card" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-id_card" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_id_card" onclick="$('#img_id_card').click();">
	      	<img src="../../images/ex_card/id_card.jpg" class="img-preview-show" id="pv_id_card"  />
	      	
	      </div> 
	    </div>
        
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="   /* margin-left: -7px;*/">
                <ons-icon icon="fa-id-card-o" class="list-item__icon ons-icon"></ons-icon>
            </div>
            <label class="center list-item__center">
                <ons-input id="iddriving-input" float="" placeholder="<?=$card_dv;?>" name="iddriving" style="width:100%;">
                    <input type="number" pattern="\d*" class="text-input" placeholder="<?=$card_dv;?>"  name="iddriving" id="iddriving">
                    <span class="text-input__label">
                        <?=$card_dv;?></span>
                </ons-input>               
            </label>
        </ons-list-item>
        
        <div align="center">
			<div >
			  <button class="btn-ip" type="button" onclick="$('#img_id_drving').click();" >เลือกภาพใบขับขี่</button>
			  <input type="file" class="cropit-image-input" id="img_id_drving"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-id_drving" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
	      <div class="box-preview-img" id="box_img_id_drving">
	      	<img src="" style="max-width: 280px;height: auto;" id="pv_id_drving" />
	      </div> 
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
</script>