<?php 
			$name_th = "ชื่อ - นามสกุล (ภาษาไทย)";
			$name_en = "ชื่อ - นามสกุล (อังกฤษ)";
			$nickname = "ชื่อเล่น";
			$idcard = "เลขบัตรประชาชน";
			$address = "ที่อยู่ปัจจุบัน";
			$phone = "เบอร์โทรศัพท์";
			$province = "จังหวัดที่คุณอยู่ประจำ";
			$email = "อีเมล์";
		?>

<div style="height: 200px; padding: 1px 0 0 0;">
	<form name="form_singin" id="form_singin"  enctype="multipart/form-data">
    <ons-card class="card">

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
                <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon>
            </div>
            <label class="center list-item__center">
                <ons-input id="name-input" float="" maxlength="30" placeholder="<?=$name_en;?>" name="name_en" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$name_en;?>" name="name_en">
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
            <div class="left list-item__left" style="    margin-left: -7px;">
                <ons-icon icon="fa-id-card-o" class="list-item__icon ons-icon"></ons-icon>
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
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone;?>" name="phone" id="phone">
                    <span class="text-input__label">
                        <?=$phone;?></span>
                </ons-input>
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
    </ons-card>
    
    <ons-card  class="card">
      <ons-list-header class="list-header"><b>ภาพประจำตัว</b></ons-list-header>
        <div class="camera" onclick="$('#imgInp').click();">
        	<div class="focus"></div>
        	<img src="" name="image_id_driver" id="image_id_driver" style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
 		</div>
 </ons-card>
	
	<input type='file' id="imgInp" style="opacity: 0;position: absolute;" onchange="readURL(this);" />
</form>
     <ons-card class="card">
    <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="createAlertDialog();" >ยืนยันข้อมูล</ons-button>
    </ons-card>
</div>



    
