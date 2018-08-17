<?php 
	$name = "ชื่อ - นามสกุล";
	$nickname = "ชื่อเล่น";
	$idcard = "เลขบัตรประชาชน";
?>
<div style="height: 200px; padding: 1px 0 0 0;">
  <div class="card">
    
    <ons-list-item class="input-items list-item p-l-0">
        <div class="left list-item__left">
          <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon>
        </div>
        <label class="center list-item__center">
        <ons-input id="name-input" float="" maxlength="30" placeholder="<?=$name;?>">
	      <input type="text" class="text-input" maxlength="30" placeholder="<?=$name;?>">
	      <span class="text-input__label"><?=$name;?></span>
	    </ons-input>
      </label>
      </ons-list-item>
      
      <ons-list-item class="input-items list-item p-l-0">
        <div class="left list-item__left">
          <ons-icon icon="md-face" class="list-item__icon ons-icon"></ons-icon>
        </div>
        <label class="center list-item__center">
        <ons-input id="name-input" float="" maxlength="30" placeholder="<?=$nickname;?>">
	      <input type="text" class="text-input" maxlength="30" placeholder="<?=$nickname;?>">
	      <span class="text-input__label"><?=$nickname;?></span>
	    </ons-input>
      </label>
      </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
        <div class="left list-item__left" style="padding-right: 7px;">
          <ons-icon icon="fa-id-card-o" class="list-item__icon ons-icon"></ons-icon>
        </div>
        <label class="center list-item__center">
        <ons-input id="name-input" float="" maxlength="2" placeholder="<?=$idcard;?>">
	      <input type="text" class="text-input" maxlength="2" placeholder="<?=$idcard;?>" onkeyup="checkIdCard(this.value);"  >
	      <span class="text-input__label"><?=$idcard;?></span>
	    </ons-input>
	    <i id="corrent-idc" class="fa fa-check-circle pass checking" aria-hidden="true" style="display: none;"></i>
	    <i id="incorrent-idc" class="fa fa-times-circle no-pass checking" aria-hidden="true" style="display: none;"></i>
      </label>
      </ons-list-item>
    
  </div>
</div>