<form method="post"  id="edit_form" name="edit_form">

    <link rel="stylesheet" href="plugins/iCheck/square/green.css">
<script src="plugins/iCheck/icheck.min.js"></script>

<style>
.check_mark {
  width: 80px;
  height: 130px;
  margin: 0 auto;
}

button {
  cursor: pointer;
  margin-left: 15px;
}

.hide{
  display:none;
}

.sa-icon {
  width: 80px;
  height: 80px;
  border: 4px solid gray;
  -webkit-border-radius: 40px;
  border-radius: 40px;
  border-radius: 50%;
  margin: 20px auto;
  padding: 0;
  position: relative;
  box-sizing: content-box;
}

.sa-icon.sa-success {
  border-color: #4CAF50;
}

.sa-icon.sa-success::before, .sa-icon.sa-success::after {
  content: '';
  -webkit-border-radius: 40px;
  border-radius: 40px;
  border-radius: 50%;
  position: absolute;
  width: 60px;
  height: 120px;
  background: white;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}

.sa-icon.sa-success::before {
  -webkit-border-radius: 120px 0 0 120px;
  border-radius: 120px 0 0 120px;
  top: -7px;
  left: -33px;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
  -webkit-transform-origin: 60px 60px;
  transform-origin: 60px 60px;
}

.sa-icon.sa-success::after {
  -webkit-border-radius: 0 120px 120px 0;
  border-radius: 0 120px 120px 0;
  top: -11px;
  left: 30px;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
  -webkit-transform-origin: 0px 60px;
  transform-origin: 0px 60px;
}

.sa-icon.sa-success .sa-placeholder {
  width: 80px;
  height: 80px;
  border: 4px solid rgba(76, 175, 80, .5);
  -webkit-border-radius: 40px;
  border-radius: 40px;
  border-radius: 50%;
  box-sizing: content-box;
  position: absolute;
  left: -4px;
  top: -4px;
  z-index: 2;
}

.sa-icon.sa-success .sa-fix {
  width: 5px;
  height: 90px;
  background-color: white;
  position: absolute;
  left: 28px;
  top: 8px;
  z-index: 1;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}

.sa-icon.sa-success.animate::after {
  -webkit-animation: rotatePlaceholder 4.25s ease-in;
  animation: rotatePlaceholder 4.25s ease-in;
}

.sa-icon.sa-success {
  border-color: transparent\9;
}
.sa-icon.sa-success .sa-line.sa-tip {
  -ms-transform: rotate(45deg) \9;
}
.sa-icon.sa-success .sa-line.sa-long {
  -ms-transform: rotate(-45deg) \9;
}

.animateSuccessTip {
  -webkit-animation: animateSuccessTip 0.75s;
  animation: animateSuccessTip 0.75s;
}

.animateSuccessLong {
  -webkit-animation: animateSuccessLong 0.75s;
  animation: animateSuccessLong 0.75s;
}

@-webkit-keyframes animateSuccessLong {
  0% {
    width: 0;
    right: 46px;
    top: 54px;
  }
  65% {
    width: 0;
    right: 46px;
    top: 54px;
  }
  84% {
    width: 55px;
    right: 0px;
    top: 35px;
  }
  100% {
    width: 47px;
    right: 8px;
    top: 38px;
  }
}
@-webkit-keyframes animateSuccessTip {
  0% {
    width: 0;
    left: 1px;
    top: 19px;
  }
  54% {
    width: 0;
    left: 1px;
    top: 19px;
  }
  70% {
    width: 50px;
    left: -8px;
    top: 37px;
  }
  84% {
    width: 17px;
    left: 21px;
    top: 48px;
  }
  100% {
    width: 25px;
    left: 14px;
    top: 45px;
  }
}
@keyframes animateSuccessTip {
  0% {
    width: 0;
    left: 1px;
    top: 19px;
  }
  54% {
    width: 0;
    left: 1px;
    top: 19px;
  }
  70% {
    width: 50px;
    left: -8px;
    top: 37px;
  }
  84% {
    width: 17px;
    left: 21px;
    top: 48px;
  }
  100% {
    width: 25px;
    left: 14px;
    top: 45px;
  }
}

@keyframes animateSuccessLong {
  0% {
    width: 0;
    right: 46px;
    top: 54px;
  }
  65% {
    width: 0;
    right: 46px;
    top: 54px;
  }
  84% {
    width: 55px;
    right: 0px;
    top: 35px;
  }
  100% {
    width: 47px;
    right: 8px;
    top: 38px;
  }
}

.sa-icon.sa-success .sa-line {
  height: 5px;
  background-color: #4CAF50;
  display: block;
  border-radius: 2px;
  position: absolute;
  z-index: 2;
}

.sa-icon.sa-success .sa-line.sa-tip {
  width: 25px;
  left: 14px;
  top: 46px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}

.sa-icon.sa-success .sa-line.sa-long {
  width: 47px;
  right: 8px;
  top: 38px;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}

@-webkit-keyframes rotatePlaceholder {
  0% {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
  }
  5% {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
  }
  12% {
    transform: rotate(-405deg);
    -webkit-transform: rotate(-405deg);
  }
  100% {
    transform: rotate(-405deg);
    -webkit-transform: rotate(-405deg);
  }
}
@keyframes rotatePlaceholder {
  0% {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
  }
  5% {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
  }
  12% {
    transform: rotate(-405deg);
    -webkit-transform: rotate(-405deg);
  }
  100% {
    transform: rotate(-405deg);
    -webkit-transform: rotate(-405deg);
  }
}


</style>
	<style>
		.step-booking
		{
			border-radius: 50%;
			background-color: #FF9933;
			padding: 10px;
			width: 60px;
			height: 60px;
			text-align: justify;
			color: #FFFFFF;
			font-size: 30px;
			font-weight: bold;
			margin-top: -10px;
			text-align: center;
			border: solid 4px #FFFFFF;
			box-shadow: 0 0 0px 0px #E8E6E6;
			position: absolute;
			background: #f39c12 !important;
			color: #fff;
		}
		.step-booking-small
		{
			border-radius: 50%;
			background-color: <?=$main_color?> ;
			padding: 5px;
			width: 40px;
			height: 40px;
			text-align: justify;
			color: #FFFFFF;
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			vertical-align: middle;
			border: solid 4px #FFFFFF;
			background: <?=$main_color?> !important;
			color: #fff;
		}
		.step-booking-small-no
		{
			border-radius: 50%;
			background-color: #FF9933;
			padding: 5px;
			width: 40px;
			height: 40px;
			text-align: justify;
			color: #FFFFFF;
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			border: solid 4px #FFFFFF;
			background: #999999 !important;
			color: #fff;
		}
		.step-booking-active
		{
			text-align: justify;
			color: #FFFFFF;
			border: solid 1px <?=$main_color?>;
			background-color: #F6F6F6;
			color: #fff;
			border-radius: 10px;
			margin-bottom: 10xp;
		}
		.step-booking-active-no
		{
			text-align: justify;
			color: #FFFFFF;
			border: solid 1px #dadada;
			color: #fff;
			border-radius: 10px;
		}
	</style>
	<?
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$_GET[place]."' ");
	$arr[shop] = $db->fetch($res[shop]);
	$res[shopmain] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$arr[shop][main]."' ");
	$arr[shopmain] = $db->fetch($res[shopmain]);
	$res[shopsub] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$arr[shop][main]."' ");
	$arr[shopsub] = $db->fetch($res[shopsub]);
	$arr[project][program]=$_GET[place];
	?>
	<script>
		$(".text-topic-action-mod-3" ).html("<?=$arr[shop][topic_th]?>");
	</script>
	<input name="program" type="hidden"  required="true" class="form-control" id="program"    value="<?=$arr[shop][id]?>" >
	<div class="<?= $coldata?>" id="show_step_detail" style="margin-top:50px;padding:5px;   border-radius: 10px; border: 0px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; ">
	<script>
		$("#main_edit_booking_step_1").click(function(){
				$( "#time_number" ).addClass('border-alert');
				//	 $( "#load_mod_popup_4" ).toggle();
				$("#back_booking_step_2").click();
			});
	</script>
	<script>
		$("#main_edit_booking_step_2").click(function(){
				// $( "#load_mod_popup_4" ).toggle();
				$("#back_booking_step_3").click();
			});
	</script>
	<script>
		$("#main_edit_booking_step_3").click(function(){
				$( "#adult_number" ).addClass('border-alert');
				$( "#child_number" ).addClass('border-alert');
				$("#submit_booking_step_2").click();
				// $( "#load_mod_popup_4" ).toggle();
			});
	</script>
	<?
	date_default_timezone_set('UTC');
	// echo date('H:i:s');
	?>
	<div class="<?= $coldata?>" id="show_time_detail" style=" border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:nones;padding: 5px;margin-top: 5px;"  >
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td><div class="font-28" style="color:<?=$main_color?>"><b>เวลาถึงโดยประมาณ</div></td>
					<td width="50" style="display: none;" id="row_accept">
					<!--	<div class="check_mark">
  <div class="sa-icon sa-success animate">
    <span class="sa-line sa-tip animateSuccessTip"></span>
    <span class="sa-line sa-long animateSuccessLong"></span>
    <div class="sa-placeholder"></div>
    <div class="sa-fix"></div>
  </div>
</div>
<center>
  <button id="restart" type="button">Restart Animation</button>
</center>-->
					<img src="images/icon/accept.png" width="40px"/>
					</td>
				</tr>
			</tbody>
		</table>
		<div>
			<table width="100%" border="0" cellspacing="1" cellpadding="1" style="margin-top:-10px;">
				<tbody>
					<tr>
						<td width="60%">
							<div class="topicname" style="margin-left:-5px;">วันที่    &nbsp; <span class="font-28">     <?=date('Y-m-d');?></span></div>
							<div class="input-group date" style="z-index:0">
								<input type="text" class="form-control" value="<?=date('Y-m-d');?>"  name="transfer_date_new" id="transfer_date_new"    style="background-color:#FFFFFF; height:40px; font-size:16px; display:none " readonly>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="margin-top:0px;">
								<tbody>
									
									<tr>
										<td><table width="100%" border="0" cellspacing="1" cellpadding="1">
												<tbody>
													<tr>
														<td width="50%">
															<?
															date_default_timezone_set("Asia/Bangkok");
															?>
															<div  style="width:100%; font-size:28px; padding:5px;   " >
															<table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-10px;"  >
																<tbody>
																	<tr>
																		<td width="50%" align="center">
																			<div class="topicname"><center>ชั่วโมง</div>
																			<div name="time_h_number" id="time_h_number" style="width:100%; font-size:22px;padding-top:5px;  height:40px; font-weight:bold" class="border-alert" ><strong>เลือก</strong></div>
																		</td>
																		<td width="50%" align="center">
																			<div class="topicname"><center>นาที</div>
																			<div name="time_m_number" id="time_m_number" style="width:100%; font-size:22px; padding-top:5px; height:40px; font-weight:bold" class="border-alert-no" ><strong>เลือก</strong></div>
																		</td>
																	</tr>
																</tbody>
															</table>
															<input  name="time"  type="hidden" class="form-control"  id="time" value="0"   >
															<input  name="time_to"  type="hidden" class="form-control"  id="time_to" value="0"   >
															<input name="airout_h" type="hidden"    id="airout_h"    value="" >
															<input name="airout_m" type="hidden"    id="airout_m"    value="" >
															<input name="ondate_time" type="hidden"    id="ondate_time"    value="<?=$time_all?>" >
															<div  id="show_to_times" style="display:none">
																<div>
																	<table width="100%" border="0" cellspacing="0" cellpadding="2">
																		<tbody>
																			<tr>
																				<td width="180"> <div class="topicname">เวลาถึงโดยประมาณ</div></td>
																				<td><div class="font-24" id="text_to_time" style="color:<?=$main_color?>"></div></td>
																			</tr>
																		</tbody>
																	</table>
																</div>
																<div  id="show_to_times_alert" style="display:none">
																</div>
															</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table></td>
									</tr>
								</tbody>
							</table></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

<!-- DIV PAX -->	
	<div class="<?= $coldata?>" id="show_guest_detail" style="margin-top:20px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:none ">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			<tbody>
				<tr>
					<td><div class="font-28" style="color:<?=$main_color?>"><b>จำนวนแขก</div></td>
					<td width="50" style="display: none;" id="row_accept_guest">
					<img src="images/icon/accept.png" width="40px"/>
					</td>
				</tr>
			</tbody>
		</table>
		<div >
			<table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-5px;"  >
				<tbody>
					<tr>
						<td width="50%" align="center">
							<div class="topicname"><center>ผู้ใหญ่</div>
							<div name="adult_number" id="adult_number" style="width:100%; font-size:22px;padding-top:5px;  height:40px; font-weight:bold" class="border-alert-no" ><strong>เลือก</strong></div>
							<input  name="adult"  type="hidden" class="form-control"  id="adult" value="0"   >
							<input  name="child"  type="hidden" class="form-control"  id="child" value="0"   >
							<input  name="pax"  type="hidden" class="form-control"  id="pax" value="0"   >
						</td>
						<td width="50%" align="center">
							<div class="topicname"><center>เด็ก</div>
							<div name="child_number" id="child_number" style="width:100%; font-size:22px; padding-top:5px; height:40px; font-weight:bold" class="border-alert-no" ><strong>เลือก</strong></div>
						</td>
					</tr>
				</tbody>
			</table>
			<div style="padding-top:10px; padding-bottom:10px; color:#FF0000; text-align:left" class="font-22"><center>
				ผู้ลงทะเบียนต้องอายุ 18 ปี ขึ้นไป
			</div>
		</div>
	</div>
<!-- Agent Issu -->	
	<div class="<?= $coldata?>" id="show_payment_detail" style="margin-top:20px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:none ">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			<tbody>
				<tr>
					<td><div class="font-28" style="color:<?=$main_color?>"><b>ค่าตอบแทน</div></td>
					<td width="50" style="display: none;" id="row_accept_payment">
					<img src="images/icon/accept.png" width="40px"/>
					</td>
				</tr>
			</tbody>
		</table>
		<div >
			<table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-5px;">
				<tbody>
					<tr>
						<td width="100%">
						<style>
							.label_price_plan{
								vertical-align:top;padding:5px;margin: 4px;
							}
							
							
						</style>                                        
                             
               
				
				
		
<input  name="plan_setting"  type="hidden" class="form-control"  id="plan_setting" value="0"   />
                        
                        
                        
						<!--<select  class="form-control" name="price_plan" id="price_plan" style="width:100%; font-size:16px; padding:5px; height:40px" >-->
								<!--<option value="">- เลือกประเภทค่าตอบแทน -</option>-->
								<?
 if($arr[shop][price_plan]>0){
									$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
									$res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan]."");
									while($arr[category] = $db->fetch($res[category])){
										
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=1 ");
 $arr[open] = $db->fetch($res[open]);		  
										
										
										//echo "<option value=\"".$arr[category][id]."\"";
										if($arr[category][id] ==$arr[project][price_plan]){
											//echo " Selected";
										}
										//echo ">".$arr[category][topic_th]." </option>";
										?>
                                        
                         
                                        
                                        
                                        
<script>

 		///
$('#show_price_plan_1').click(function(){  
 
 $( "#load_mod_popup_4" ).toggle();
 
  var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_1); 
  
 
 	});
 

</script>                    
                            
                                        
                                        
                                        
                                        
 <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;">
                                        
					 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
      <td width="20" rowspan="2">
      
      
      
      
      
      
      
      
      
      
      
      
      
      <input type="radio" name="price_plan" class="price_plan_select" value="<?=$arr[open][id];?>" id="price_plan_1" /></td>
      <td class="font-22"><b> <?=$arr[category][topic_th];?> </td>
      <td width="20" rowspan="2" valign="middle"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
    </tr>
    <tr>
      <td>  
	  
	  

      <?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan]."   ");
             
  $arr[price] = $db->fetch($res[price]);
 
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
 $show_commision=$arr[price][price_commision];
  
  
  
  
  if($show_park==1){	  
 $status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
echo  $status_show_commision='';	  
  }
	  
	  ?>
      
      
	  
	  
	  
	  <? if($arr[open][price_extra]==1){ 
 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
	
 
	  
	  ?>
 
 
 
 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="80"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;จีน  </td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>

        
        
        
        <? } ?> 
        
        
        
        <? if($arr[open][price_all]==1){ 
		
		
		 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
		
		
		
		?>
        
        
        
        
        
        
        
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;ทั้งหมด</td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>
        
        
        
        
        
       
        
        
        
        <? } ?> 
        
        
      </td>
      </tr>
  </tbody>
</table>
                    

                   
										</div>
                                        
                                        
                                        
                                        
                                        
										<?php
									}
									$db->closedb ();
								}
								?>
								<?
								if($arr[shop][price_plan_2]>0){
									$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
									$res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_2]."");
									while($arr[category] = $db->fetch($res[category])){
										
										 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=2 ");
 											$arr[open] = $db->fetch($res[open]);		  
										
										
										//echo "<option value=\"".$arr[category][id]."\"";
										if($arr[category][id] ==$arr[project][price_plan]){
											//echo " Selected";
										}
										//echo ">".$arr[category][topic_th]." </option>";
			
			
			
										?>
                                        
                                        
                                                                                
<script>

 		///
$('#show_price_plan_2').click(function(){  
 
 $( "#load_mod_popup_4" ).toggle();
 
  var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_1); 
  
 
 	});
 

</script>                    
                            
                                   
                                      
 <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;">
                                        
										 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
      <td width="20" rowspan="2"><input type="radio" name="price_plan" class="price_plan_select" value="<?=$arr[open][id];?>" id="price_plan_2" /></td>
      <td class="font-22"><b> <?=$arr[category][topic_th];?> </td>
      <td width="20" rowspan="2"><a id="show_price_plan_2"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
    </tr>
    <tr>
      <td>  

      <?
 
	  
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan_2]."   ");
             
  $arr[price] = $db->fetch($res[price]);
 
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
 $show_commision=$arr[price][price_commision];
  
  
  
  
  if($show_park==1){	  
 $status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
echo  $status_show_commision='';	  
  }
	  
	  ?>
      
      
	  
	  
	  
	  <? if($arr[open][price_extra]==1){ 
 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
	
 
	  
	  ?>
 
 
 
 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="80"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;จีน  </td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>

        
        
        
        <? } ?> 
        
        
        
        <? if($arr[open][price_all]==1){ 
		
		
		 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
		
		
		
		?>
        
        
        
        
        
        
        
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;ทั้งหมด</td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>
        
        
        
        
        
       
        
        
        
        <? } ?> 
        
        
      </td>
      </tr>
  </tbody>
</table>
                    

                   
						  </div>
                                        
										<?php
									}
									$db->closedb ();
								}
								?>
                                
                                
                                
								<?
								if($arr[shop][price_plan_3]>0){
									$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
									$res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_3]."");
									while($arr[category] = $db->fetch($res[category])){
										
										
									 $res[open] = $db->select_query("SELECT  * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=3 ");
 									 $arr[open] = $db->fetch($res[open]);		
										
										
										//echo "<option value=\"".$arr[category][id]."\"";
										if($arr[category][id] ==$arr[project][price_plan]){
											//echo " Selected";
										}
										//echo ">".$arr[category][topic_th]." </option>";
										?>
 
 
 
                                         
<script>

 		///
$('#show_price_plan_3').click(function(){  
 
 $( "#load_mod_popup_4" ).toggle();
 
  var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_1); 
  
 
 	});
 

</script>                    
                            
                                                                       
 <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 0px;">
                                        
										 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
      <td width="20" rowspan="2"><input type="radio" name="price_plan" class="price_plan_select" value="<?=$arr[open][id];?>" id="price_plan_3" /></td>
      <td class="font-22"><b> <?=$arr[category][topic_th];?> </td>
      <td width="20" rowspan="2"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
    </tr>
    <tr>
      <td> 

 <?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan_3]."   ");
             
  $arr[price] = $db->fetch($res[price]);
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
 $show_commision=$arr[price][price_commision];
 
  
  if($show_park==1){	  
 $status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
echo  $status_show_commision='';	  
  }
	  
	  ?>
      
      
	  
	  
	  
	  <? if($arr[open][price_extra]==1){ 
 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
	
 
	  
	  ?>
 
 
 
 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="80"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;จีน  </td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>

        
        
        
        <? } ?> 
        
        
        
        <? if($arr[open][price_all]==1){ 
		
		
		 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
		
		
		
		?>
        
        
        
        
        
        
        
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;ทั้งหมด</td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>
        
        
        
        
        
       
        
        
        
        <? } ?> 
        
        
        
      </td>
      </tr>
  </tbody>
</table>
                    

                   
						  </div>
										<?php
									}
									$db->closedb ();
								}
								?>
								<?
								?>
							<!--</select>-->
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
<!-- DIV CAR -->	
	<div class="<?= $coldata?>" id="show_transfer_detail" style="margin-top:20px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:none  ">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td><div class="font-28" style="color:<?=$main_color?>"><b>ข้อมูลรถของท่าน</div>
					</td>
					<td width="50" style="display: none;" id="row_accept_car">
					<img src="images/icon/accept.png" width="40px"/>
					</td>
				</tr>
			</tbody>
		</table>
		<div style="margin-top:-50px;" id="show_car_detail">
			<?   include ("mod/booking/load/booking/car.php");   ?>
		</div>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0" id="button_show_car_detail" style="display:none">
			<tr >
				<td width="100%"  style="display:none" ><button type="button"  id="back_booking_step_2" class="btn btn-block btn-default"  style="width:100%px "><span class="font-28"><i class="    fa fa-chevron-circle-left"></i>&nbsp;ย้อนกลับ</button></td>
				<td width="100%"  >
					<div class="border-alert"  id="div_submit_booking_step_2"  style="width:100%; display:none ">
						<button id="submit_booking_step_2" type="button" class="btn  btn-primary" style="width:100% "><span class="font-28"><i class="    fa fa-chevron-circle-right"></i>&nbsp;ขั้นตอนต่อไป</button></div>
				</td>
			</tr>
		</table>
	</div>	
<!-- BTN  -->	
	<table width="100%" border="0" cellspacing="2" cellpadding="2" id="show_submit" style="display: none;"> 
		<tbody>
			<tr>
				<td width="50%"><button type="button" class="btn btn-success btn-lg"   id="submit_data_update"  style=" width:100%; margin-top:10px;"> <span id="txt_btn_save">ส่งข้อมูล</span> </button></td>
				<td width="50%"><button type="reset" class="btn btn-default btn-lg"   id="submit_data_set"   style=" width:100%; margin-top:10px;"> <span id="txt_btn_reset"> รีเซ็ต</span> </button>
				</td>
			</tr>
		</tbody>
	</table>
	<p>&nbsp;</p>
	<p>
	</p>
</form>
<input type="hidden" value="0" id="check_t_h" />						
<input type="hidden" value="0" id="check_t_m" />						
<input type="hidden" value="0" id="check_adult" />							
<input type="hidden" value="0" id="check_child" />	
<input type="hidden" value="0" id="check_show_submit" />	

<script>
$("button").click(function() {
  $(".sa-success").addClass("hide");
  setTimeout(function() {
    $(".sa-success").removeClass("hide");
  }, 10);
});

$('#submit_data_set').click(function(){
	$('#check_t_h').val(0);
	$('#check_t_m').val(0);
	$('#check_adult').val(0);
	$('#check_child').val(0);
	$('#check_car_click').val(0);
	
	$('#airout_h').val('');
	$('#time_h_number').text('เลือก');
	$('#time_h_number').removeClass('border-alert-no');
	$('#time_h_number').addClass('border-alert');
	
	$('#time_m_number').text('เลือก');
	$('#time_m_number').removeClass('border-alert-no');
	$('#time_m_number').addClass('border-alert');
	$('#airout_m').val('');
	
	$('#adult_number').val('');
	$('#adult_number').text('เลือก');
	$('#adult_number').removeClass('border-alert-no');
	$('#adult_number').addClass('border-alert');
	
	$('#adult').val('');
	$('#child_number').text('เลือก');
	$('#child_number').removeClass('border-alert-no');
	$('#child_number').addClass('border-alert');
	
	
	$('.iradio_square-green').removeClass('checked');
	$('input[type="radio"]').prop('checked', false);
});





	$("#time_number").click(function(){
			$( "#load_mod_popup_4" ).toggle();
			var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=time&type=adult";
			url_load_adult = url_load_adult+"&id="+document.getElementById('time').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_adult);
		});
		
		$("#time_h_number").click(function(){
			$( "#load_mod_popup_4" ).toggle();
			var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=time_h&type=adult";
			url_load_adult =url_load_adult+"&id=hx"+document.getElementById('time').value;
			url_load_adult =url_load_adult+"&product_id=<?=$_GET[place];?>";
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_adult);
		});
		
		$("#time_m_number").click(function(){
			if($('#check_t_h').val()==0){
				alert('กรุณาเลือกชั่วโมง');
				return false;
			}
			$( "#load_mod_popup_4" ).toggle();
				var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=time_m&type=adult";
				url_load_adult =url_load_adult+"&id=mx"+document.getElementById('time').value;
				url_load_adult =url_load_adult+"&product_id=<?=$_GET[place];?>";
				url_load_adult =url_load_adult+"&airout_h="+document.getElementById('airout_h').value;
				$('#load_mod_popup_4').html(load_main_mod);
				$('#load_mod_popup_4').load(url_load_adult);
		});
		
		
		
	$("#adult_number").click(function(){
			if($('#check_t_h').val()==0){
				alert('กรุณาเลือกชั่วโมง');
				return false;
			}
			if($('#check_t_m').val()==0){
				alert('กรุณาเลือกนาที');
				return false;
			}
			
			$( "#load_mod_popup_4" ).toggle();
			var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=adult&type=adult";
			url_load_adult =url_load_adult+"&id="+document.getElementById('adult').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_adult);
		});
	$("#child_number").click(function(){
			if($('#check_t_h').val()==0){
				alert('กรุณาเลือกชั่วโมง');
				return false;
			}
			if($('#check_t_m').val()==0){
				alert('กรุณาเลือกนาที');
				return false;
			}
			if($('#check_adult').val()==0){
				alert('กรุณาเลือกจำนวนแขกผู้ใหญ่');
				return false;
			}
			$( "#load_mod_popup_4" ).toggle();
			var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=child&type=adult";
			url_load_adult =url_load_adult+"&id="+document.getElementById('child').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_adult);
		});
		

	$("#submit_booking_step_3").click(function(){
			$("#main_edit_booking_step_3").show();
			if(document.getElementById('adult').value=="0" && document.getElementById('child').value=="0" ) {
				alert('กรุณาเลือกจำนวนผู้ใหญ่หรือเด็กอย่างน้อย 1 คน');
				document.getElementById('adult').focus() ;
				document.getElementById('child').focus() ;
				return false ;
			}
			/*
			$.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
			$('#send_booking_data').html(response);
			});
			*/
		/*	$( "#load_mod_popup_4" ).toggle();
			var url_load_finish= "load_page_mod_4.php?name=booking/step/load&file=finish&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
			url_load_finish =url_load_finish+"&adult="+document.getElementById('adult').value;
			url_load_finish =url_load_finish+"&child="+document.getElementById('child').value;
			url_load_finish =url_load_finish+"&time="+document.getElementById('time').value;
			url_load_finish =url_load_finish+"&car="+document.getElementById('check_use_car_id').value;
			url_load_finish =url_load_finish+"&airout_h="+document.getElementById('airout_h').value;
			url_load_finish =url_load_finish+"&airout_m="+document.getElementById('airout_m').value;
			url_load_finish =url_load_finish+"&car_color="+document.getElementById('car_color').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_finish);*/
			/*
			if(document.getElementById('guest_name').value==""  &&  document.getElementById('check_photo_passport').value=="") {
			alert('กรุณากรอกชื่อแขกหรือถ่ายภาพพาสปอร์ต');
			document.getElementById('guest_name').focus() ;
			return false ;
			}
			if(document.getElementById('nation').value=="") {
			alert('กรุณาเลือกสัญชาติ');
			document.getElementById('nation').focus() ;
			return false ;
			}
			if(document.getElementById('payment_type').value=="") {
			alert('กรุณาเลือกช่องทางการรับเงิน');
			document.getElementById('payment_type').focus() ;
			return false ;
			}
			*/
			/*
			swal({
			title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
			text: "<font style='font-size:22px'>ว่ากรอกข้อมูลถูกต้อง",
			type: "info",
			showCancelButton: true,
			confirmButtonColor: '#5BC0DE',
			confirmButtonText: 'แน่ใจ',
			cancelButtonText: "ไม่แน่ใจ",
			closeOnConfirm: true,
			closeOnCancel: true,
			html: true
			},
			function(isConfirm){
			if (isConfirm){
			$.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
			$('#send_booking_data').html(response);
			});
			////$("#load_mod_popup" ).toggle();
			//$('.loader').show();
			var date_report = $("#date_report").val();
			//alert(date_report);
			$('#load_booking_data').html(load_main_icon_big);
			//var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
			var url = "go.php?name=booking/load&file=work_all&find=day&day="+$("#date_report").val()+"";
			$('#load_booking_data').load(url);
			//  alert('dd');
			} else {
			//    swal("Cancelled", "", "error");
			}
			});
			//// $("#send_booking_data").load('load.php');
			*/
		});
</script>
<div  id="send_booking_data"></div>
<br>
<br>

<script>
	$("#submit_data_update").click(function(){
		
		
 if(document.getElementById('airout_h').value =="" ) {
		
alert('กรุณาเลือกชั่วโมง');
document.getElementById('airout_h').focus() ;



 return false ;	
}

 if(document.getElementById('airout_m').value =="" ) {
	 
 alert('กรุณาเลือกนาที');
document.getElementById('airout_h').focus() ;
 
 
 
 return false ;	
}
		
				
		
		
		
		if(document.getElementById('all_car').value < 1 ) {
	
alert('กรุณาเลือกรถที่ใช้งาน');
 return false ;	
}
		
		
		
			if(document.getElementById('adult').value=="0" && document.getElementById('child').value=="0" ) {
				alert('กรุณาเลือกจำนวนผู้ใหญ่หรือเด็กอย่างน้อย 1 คน');
				document.getElementById('adult').focus() ;
				document.getElementById('child').focus() ;
				return false ;
			}
			
if(document.getElementById('all_car').value < 1 ) {
	
alert('กรุณาเลือกรถที่ใช้งาน');
 return false ;	
}
			
		 
			
			var price_plan = $('.price_plan').val();
//			if(document.getElementById('plan_setting').value==0 ) {
	if(document.getElementById('plan_setting').value==0 ) {
				alert('กรุณาเลือกประเภทค่าตอบแทน');
			 document.getElementById('price_plan').focus() ;
				return false ;
			}
			
			
		$( "#load_mod_popup_4" ).toggle();
			var url_load_finish= "load_page_mod_4.php?name=booking/step/load&file=finish&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
			url_load_finish =url_load_finish+"&adult="+document.getElementById('adult').value;
			url_load_finish =url_load_finish+"&child="+document.getElementById('child').value;
			url_load_finish =url_load_finish+"&time="+document.getElementById('time').value;
			url_load_finish =url_load_finish+"&car="+document.getElementById('check_use_car_id').value;
			url_load_finish =url_load_finish+"&airout_h="+document.getElementById('airout_h').value;
			url_load_finish =url_load_finish+"&airout_m="+document.getElementById('airout_m').value;
			url_load_finish =url_load_finish+"&car_color="+document.getElementById('car_color').value;
			url_load_finish =url_load_finish+"&plan="+document.getElementById('plan_setting').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_finish);	
			
			/*$.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
//					$('#send_booking_data').html(response);
					console.log(response);
						swal({
						  title: "ยืนยันข้อมูลส่งแขก ?",
						  text: "เวลาถึง : "+$('#airout_h').val()+"."+$('#airout_m').val()+" น.",
						  html:
    'You can use <b>bold text</b>, ' +
    '<a href="//github.com">links</a> ' +
    'and other HTML tags',
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "ยืนยัน",
						  cancelButtonText: 'ยกเลิก',
						  closeOnConfirm: false
						},
						function(){
						  swal("ส่งข้อมูลสำเร็จ !", "ขอบคุณที่ส่งแขก", "success");
						  $('.button-close-popup-mod-3').click();
							$('.button-close-popup-mod-2').click();
							$('.button-close-popup-mod-1').click();
							$('.button-close-popup-mod').click();
							$('.close-small-popup').click();
							$('#btn_todaywork_bottom_menu').click();
						});
					
				});*/
		});
		
		
 
		
		
		
		
		
</script>	
        <script>
		
 

		
 
 
    $(function () {
	  
    $('#price_plan_1').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green 1',
      increaseArea: '20%' // optional
    });
	
	
	    $('#price_plan_2').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green 2',
      increaseArea: '20%' // optional
    });
	
	
		    $('#price_plan_3').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green 3',
      increaseArea: '20%' // optional
    });
	
	
	
	
	
  });
   
</script>				






<script>

$('.price_plan_select').on('ifChecked', function(event){
	
	var data_id = $(this).attr("value");
	
	if($('#check_t_h').val()==0){
				alert('กรุณาเลือกชั่วโมง');
				setTimeout(function(){ $('.'+data_id).removeClass('checked');
				$('.'+data_id).attr('aria-checked','false');	
				$( "#target" ).focus();
				
				 }, 300);
			
				return false;
			}
	if($('#check_t_m').val()==0){
				alert('กรุณาเลือกนาที');
				setTimeout(function(){ $('.'+data_id).removeClass('checked');
				$('.'+data_id).attr('aria-checked','false');	 }, 300);
				
			    return false;
	}  
	if($('#check_adult').val()==0){
				alert('กรุณาเลือกจำนวนแขกผู้ใหญ่');
				setTimeout(function(){ $('.'+data_id).removeClass('checked');
				$('.'+data_id).attr('aria-checked','false');	 }, 300);
				return false;
		}

	if($('#check_child').val()==0){
					alert('กรุณาเลือกจำนวนแขกเด็ก');
					setTimeout(function(){  $('.'+data_id).removeClass('checked');
					$('.'+data_id).attr('aria-checked','false');	 }, 300);
					return false;
			}

 $('#plan_setting').val(data_id);
 $('#show_transfer_detail').show();
 $('#show_payment_detail').removeClass('border-alert');
 $('#row_accept_payment').show();
 
 if($('#check_show_submit').val()==1){
 	$('#show_transfer_detail').removeClass('border-alert');
	$('#show_submit').show();
	$('#show_submit').addClass('border-alert');
	var x = document.getElementById("load_mod_popup_3");
 	x.scrollTo(0, x.scrollHeight);
 	
 }else{
 	$('#show_transfer_detail').addClass('border-alert');
 	$('#check_show_submit').val(1);
 }
									
 var x = document.getElementById("load_mod_popup_3");
 x.scrollTo(0, x.scrollHeight); 
});
	
  
 </script>            