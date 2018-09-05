<div style="height: 200px; padding: 1px 0 0 0;">
	<form name="form_recovery" id="form_recovery"  enctype="multipart/form-data">
	
    <ons-card class="card">
    <div style="" align="center">
		<ons-icon icon="fa-lock" style="font-size: 56px;" class="list-item__icon ons-icon"></ons-icon>
	</div>
		      <ons-list-item class="input-items">
		        <div class="left">
		          <span>ชื่อผู้ใช้งาน</span>
		        </div>
		        <label class="center">
		        <ons-input  id="username_for_rcv" float maxlength="20" value="<?=$_COOKIE[app_remember_user];?>" onkeyup="getPhoneByUser($(this).val());" ></ons-input>
		        <i id="corrent-user" class="fa fa-check-circle pass" aria-hidden="true" style="display: none;"></i>
		      </label>
		      </ons-list-item>  
		      
	<ons-list-header style="margin-top: 10px;">เลือกช่องทางการรับรหัสผ่าน</ons-list-header>
      <ons-list-item tappable>
        <label class="left">
          <ons-checkbox class="checkbox-color rcp" input-id="checkbox-0" value="Red" onclick="selectTypeRcp(0);"></ons-checkbox>
        </label>
        <label class="center" for="checkbox-0">
          SMS OTP (ส่งข้อความ)
        </label>
       
      </ons-list-item>
       		<div style="padding: 10px;display: none;" id="box_us_phone">
		        <span>เบอร์โทร</span>&nbsp;&nbsp;
		        <span id="txt_phone_show"></span>
		        <ons-input id="us_phone" float maxlength="20" value="" type="hidden"></ons-input>
		    </div>
      <ons-list-item tappable>
        <label class="left">
          <ons-checkbox class="checkbox-color rcp" input-id="checkbox-1" value="Green"  onclick="selectTypeRcp(1);" ></ons-checkbox>
        </label>
        <label class="center" for="checkbox-1">
          อีเมล
        </label>
      </ons-list-item>
      <div style="padding: 10px;display: none;" id="box_us_mail">
		        <span>อีเมล</span>&nbsp;&nbsp;
		        <span id="txt_email_show"></span>
		        <ons-input id="us_email" float maxlength="20" value="" type="hidden"></ons-input>
		    </div>
      <input type="hidden" value="-1" id="check_type_rcp" />
    </ons-card>
    

</form>
	<div style="margin: 0px 10px;">
   		<ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="submitRecoveryPassword();" style="background-color: #fff;" >ยืนยันข้อมูล</ons-button>
    </div>
</div>

<script>
	function selectTypeRcp(id){
		
		if(id==0){
			$('#box_us_phone').show();
			$('#box_us_mail').hide();
		}else{
			if($('#us_email').val()==""){
				$('.rcp').prop('checked', false);
				ons.notification.alert({message: 'ชื่อผู้ใช้นี้ ไม่ได้ใส่ข้อมูลอีเมล ไม่สามารถเลือกได้',title:"สำเร็จ",buttonLabel:"ปิด"})
									  .then(function() {
									   		
									  });
				return;
			}
			$('#box_us_phone').hide();
			$('#box_us_mail').show();
		}
		$('.rcp').prop('checked', false);
		$('#checkbox-'+id).prop('checked', true);
		$('#check_type_rcp').val(id);
	}
</script>