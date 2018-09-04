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
		        <ons-input id="name-input" float maxlength="20" value="<?=$_COOKIE[app_remember_user];?>" ></ons-input>
		      </label>
		      </ons-list-item>  
		      
	<ons-list-header style="margin-top: 10px;">เลือกช่องทางการรับรหัสผ่าน</ons-list-header>
      <ons-list-item tappable>
        <label class="left">
          <ons-checkbox class="checkbox-color rcp" input-id="checkbox-0" value="Red" onclick="selectTypeRcp(0);"></ons-checkbox>
        </label>
        <label class="center" for="checkbox-0">
          SMS OTP
        </label>
      </ons-list-item>
      <ons-list-item tappable>
        <label class="left">
          <ons-checkbox class="checkbox-color rcp" input-id="checkbox-1" value="Green"  onclick="selectTypeRcp(1);" ></ons-checkbox>
        </label>
        <label class="center" for="checkbox-1">
          Email
        </label>
      </ons-list-item>
      <input type="hidden" value="" id="check_type_rcp" />
    </ons-card>
    

</form>
	<div style="margin: 0px 10px;">
   		<ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="submitRecoveryPassword();" style="background-color: #fff;" >ยืนยันข้อมูล</ons-button>
    </div>
</div>

<script>
	function selectTypeRcp(id){
		$('.rcp').prop('checked', false);
		$('#checkbox-'+id).prop('checked', true);
		$('#check_type_rcp').val(id);
	}
</script>