<style>
.font_close_icon {
    font-size: 36px;
}
@media screen and (max-width: 320px){
	.font_close_icon {
    	font-size: 32px;
	}
}
	.topictransfer1 {
    padding-top: 8px;
    font-family: Arial, Helvetica, sans-serif;
    padding-left: 0x;
    padding-bottom: 5px;
    margin-left: 5px;
    font-size: 16px;
    font-weight: bold;
    color: #444444;
    text-align: left;
}
.font_16 {
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
}
td{
	font-size: 14px;
}
</style>
<style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
	border-radius : 20px;
    position: absolute;
    top: -4px;
    left: 0;
    height: 30px;
    width: 30px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 11px;
    top: 6px;
    width: 9px;
    height: 15px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

</style>
<script>
	$('#load_mod_popup_clean').css('animation','showSweetAlert 0.4s');
</script>
<?php 
	/*$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res[cartype] = $db->select_query("SELECT id, topic_en, topic_cn, topic_th, pax, pax_cn, pax_th FROM web_carall_type where id = ".$_POST[cartype]." ");
	$arr[cartype] = $db->fetch($res[cartype]);*/
	
	$adult_txt = t_adult." ".$_POST[adult];
	$child_txt = t_child." ".$_POST[child];
	
	if($_POST[air]!=""){
		$display_none_air = '';
	}else{
		$display_none_air = 'display:none;';
	}
	$car_type = $_POST[car_type][$place_shopping];
/*	if($_POST[s_status_pay]==0){
		$type_pay = 'งานนี้เป็นงานลูกค้าจ่ายเงินสด จำเป็นต้องหักเงินในระบบของคุณ จำนวน '.$_POST[s_cost];
	}else{
		$type_pay = 'โอนเงินเข้าบัญชี';
	}*/
	if($_POST[s_status_pay]==0){
		$type_pay = 'จ่ายเงินสด';
	}else{
		$type_pay = 'โอนเงินเข้าบัญชี';
	}
?>
<!--<div class="font-22" style="padding: 5px 0px;margin-top: 0px;padding-left: 10px;" onclick="hideDetail();" ><a ><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;<?=t_back_previous;?></a></div>-->
<div style="padding: 5px 0px;margin-top: 0px;padding-left: 10px;">
<a onclick="hideDetail();" style="position:  absolute; right: 15px;" ><i class="fa fa-times font_close_icon" aria-hidden="true"></i></a>
</div>
<div style="margin-top: 0px;padding: 5px;" >
<span style="font-size: 16px;"></span>
   <div style="margin-left:0px;  margin-right: 0px; margin-top:0px;/*box-shadow: 0px -5px 5px #f6f6f6;*/ padding:5px;">
   <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tbody>
         <tr>
            <td width="60" style="background-color:#F6F6F6 ">
               <div id="cir_1">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                     <tbody>
                        <tr>
                           <td height="35" class="boxnumber" style="font-size:18px; color:#FFFFFF; background-color: #006699 ; font-weight:bold ;border-radius: 0px;" id="">
                              <center>
                                 <span id="place_number_190914">1</span> | 1 
                                 
                              </center>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </td>
            <td width="100" height="30" valign="top" style="background-color:#F3F3F3; padding-top:8px; padding-left:10px;  ">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                     <tr>
                        <td style="font-size:24px ; color:#009999; color:#444444;"><i class="fa fa-user"></i></td>
                        <td style="font-size:14px ; font-weight:bold"><?=$_POST[program][type];?></td>
                     </tr>
                  </tbody>
               </table>
            </td>
            <td valign="middle" style="font-size:16px ; font-weight:bold; padding-top:5px;">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                     <tr>
                        <td style="font-size:24px ; color: #3399CC; color:#444444  " width="35" >&nbsp;<?=$font_icon_area;?></td>
                        <td style="font-size:14px ; font-weight:bold">&nbsp;<?=$area;?></td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
  
   <div style="margin-top:10px; font-size:22px; font-weight:bold; background-color:#F6F6F6; padding:5PX;border-radius: 10px; "><?=$_POST[ondate];?></div>
   <div style="margin-top:10px;padding:5px;    ">
      <div class="show_product_detail_all" style="display: nones;">
         <font class="font-24">
         <b><?=$_POST[program][topic_en];?>&nbsp; &nbsp;<font color="#666666"></font></b></font>
      </div>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td>
                     <div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td valign="top">
                                    <div class="topictransfer1" style=" margin-top: -2px; margin-left:"><i class="fa  fa-map-marker" style="color:#c1c1c1;padding: 0px 7px;"></i> <span class="font_16 text-cap"><?=t_pick_up_place;?></span></div>
                                 </td>
                                 <td width="40">
                                 	<div onclick="mapsSelector('<?=$_POST[pickup_place][lat];?>','<?=$_POST[pickup_place][lng];?>');">
                                    <a class="test" data-toggle="tooltip" title="<?=t_navigation_map;?>" 
                                   target="_blank"> 
                                    <i class="icon-new-uniF13A-7" style=" font-size:28px; color:#3C8DBC"></i>
                                    </a>
                                    </div>
                                 </td>
                                 <td width="40" style="padding-right:10px; ">                                                                                      
                                 <a href="tel:076351166" target="_blank" class="test" data-toggle="tooltip" title="โทรออก"> <i class="icon-new-uniF152-4" style=" font-size:24px; color:#3C8DBC"></i></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>
                     <div align="left" style="font-size:16px;padding:5px 15px; "> 
                     <span id="address_form" class="font-24">
                     	<?=$_POST[pickup_place][topic];?>
                     </span>					   
                       
                     </div>
                     <font color="#666666" class="font_16">
                     </font>
                  </td>
               </tr>

               <tr>
                  <td>
                     <div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td valign="top">
                                    <div class="topictransfer1" style=" margin-top:-2px;"><i class="fa  fa-map-marker" style="color:#c1c1c1;padding: 0px 7px;"></i> <span class="font_16 text-cap"><?=t_drop_place;?></span></div>
                                 </td>
                                 <td width="40">
                                    <div onclick="mapsSelector('<?=$_POST[to_place][lat];?>','<?=$_POST[to_place][lng];?>');">
                                       <a class="test" data-toggle="tooltip" title="<?=t_navigation_map;?>" 
                                       target="_blank">
                                       <i class="icon-new-uniF13A-7" style=" font-size:28px; color:#3C8DBC"></i> </a>
                                    </div>
                                 </td>
                                 <td width="40" style="padding-right:10px; ">
                                    <div>
                                       <a href="tel:+6676380500" target="_blank" class="test" data-toggle="tooltip" title="โทรออก"><i class="icon-new-uniF152-4" style=" font-size:24px; color:#3C8DBC"></i></a>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>
                     <div align="left" style="padding:5px 15px; "> 
                     	<span id="address_to"class="font-24"><?=$_POST[to_place][topic];?></span>		   
                       
                     </div>
                    
                  </td>
               </tr>
			   <tr>
			   	<td>
			   		<div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td valign="top">
                                    <div class="topictransfer1" style=" margin-top:-2px;"><i class="fa fa-info" style="color:#c1c1c1;padding: 0px 7px;"></i> <span class="font_16 text-cap">
                                    <b><?=t_details;?></b></span></div>
                                 </td>
                                 
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     
			   	</td>
				</tr>
			   <tr>
                  <td id="show_guest_detail" class="show_guest_detail_all" style="display: table-cell;">
                     
                     <table width="100%" border="0" cellspacing="2" cellpadding="4">
                        <tbody>
                           <tr>
                              <td width="20" valign="top"><i class="icon-new-uniF10E-5" style="color:#666666; font-size:18px;"></i></td>
                              <td width="120" valign="top" class="td-text text-cap"><b><?=t_time;?></b></td>
                              <td valign="top" class="td-text"><span class="font-22"><?=$_POST[airout_time];?></span></td>
                           </tr>
                           <tr style="<?=$display_none_air;?>">
                              <td valign="top"><i class="icon-new-uniF104" style="color:#666666; font-size:18px;"></i></td>
                              <td width="120" valign="top" class="td-text"><b><?=t_flight;?></b></td>
                              <td valign="top" class="td-text"><span class="font-22"><?=$_POST[air];?> </span></td>
                           </tr>
                           <tr style="display: none;">
                              <td valign="top"><i class="icon-new-uniF137" style="color:#666666; font-size:18px;"></i></td>
                              <td width="120" valign="top" class="td-text text-cap"><b><?=t_agents;?></b></td>
                              <td valign="top" class="td-text"><span class="font-22"><?=$_POST[agent_q][username];?></span></td>
                           </tr>
                           <tr >
                              <td valign="top"><i class="icon-new-uniF12B-3" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text text-cap"><b><?=t_number_customers;?></b></td>
                              <td valign="top" class="td-text"><span class="font-22"> <?=$adult_txt." ".$child_txt;?></span>
                              </td>
                           </tr>
                           <tr style="display: none;">
                              <td valign="top"><i class="icon-new-uniF109-14" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text text-cap"><b><?=t_name_guest;?></b></td>
                              <td valign="top" class="td-text"><span class="font-22"><?=$_POST[bookagent][guest];?></span></td>
                           </tr>
                           <tr style="display: none;">
                              <td valign="top"><i class="icon-new-uniF152-4" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text text-cap"><b><?=t_phone;?></b></td>
                              <td valign="top" class="td-text"><a href="tel:<?=$_POST[agent_q][phone];?>"><span class="font-22"><?=$_POST[agent_q][phone];?></span></a></td>
                           </tr>
                           <tr style="display: none;">
                              <td valign="top"><i class="icon-app-uniF111" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text text-cap"><b><?=t_voucher_number;?></b></td>
                              <td valign="top" class="td-text"><a href="<?=$_POST[invoice];?>" target="_blank">
                              <span class="span-detail1"> <font color="#00808B" class="font-22" ><?=$_POST[invoice];?></font></span></a>
                              </td>
                           </tr>
                           <tr style="display: nones;">
                              <td valign="top"><i class="icon-new-uniF121-10" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text text-cap"><b><?=t_work_remuneration;?></b></td>
                              <td valign="top" class="td-text">
                              <span class="span-detail1"> <font class="font-22" ><?=$_POST[s_cost]." ".t_THB;?></font></span>
                              </td>
                           </tr>
                           <tr style="display: nones;">
                              <td valign="top"><i class="fa fa-exchange" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text text-cap"><b><?=t_get_paid_type;?></b></td>
                              <td valign="top" class="td-text">
                              <span class="span-detail1"> <font class="font-22" ><?=$type_pay;?></font></span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     
                  </td>
               </tr>
               <tr>
			   	<td>
			   		<div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td valign="top">
                                    <div class="topictransfer1" style=" margin-top:-2px;"><i class="fa fa-car" style="color:#c1c1c1;padding: 0px 7px;"></i> <span class="font_16 text-cap">
                                    <b><?=t_car_request;?></b></span></div>
                                 </td>
                                 
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     
			   	</td>
				</tr>
			   <tr>
					<td>
						<table width="100%" border="0" cellspacing="2" cellpadding="4">
                        <tbody>
                           <tr>
                              <td width="20" valign="top"><i class="fa fa-car" style="color:#666666; font-size:18px;"></i></td>
                              <td width="120" valign="top" class="td-text text-cap"><b><?=t_type_of_vehicle;?></b></td>
                              <td valign="top" class="td-text"><span class="font-22"><?=$car_type;?></span></td>
                           </tr>
                           <tr>
                              <td width="20" valign="top" align="center"><i class="fa fa-users" style="color:#666666; font-size:18px;"></i></td>
                              <td width="120" valign="top" class="td-text text-cap"><b><?=t_capacity;?></b></td>
                              <td valign="top" class="td-text"><span class="font-22"><?=$_POST[car_type][$car_pax];?></span></td>
                           </tr>
                        </tbody>
                     </table>
					</td>
				</tr>
			   <tr>
			   	<td>
			   		<div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td valign="top">
                                    <div class="topictransfer1" style=" margin-top:-2px;"><i class="fa fa-car" style="color:#c1c1c1;padding: 0px 7px;"></i> <span class="font_16 text-cap">
                                    <b><?=t_select_your_car;?></b></span></div>
                                 </td>
                                 
                              </tr>
                           </tbody>
                        </table>
                     </div> 
			   	</td>
				</tr>
			   <tr>
			   	<td>
			   		<div style="padding: 0px 10px;">
					<div style="padding: 5px;border: 1px solid #ddd;margin-top: 0px;">
<?php 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$select = "SELECT * FROM web_carall where drivername = '".$_SESSION['data_user_id']."'  ";
$res[car] = $db->select_query($select);
while($arr[car] = $db->fetch($res[car])){	
$res[ct] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[car][car_type]."' ");
$arr[ct] = $db->fetch($res[ct]);
if($arr[car][plate_color]=="Green"){
$plate_color="009999"; }
if($arr[car][plate_color]=="Yellow"){
$plate_color="FFCC00"; } 
 if($arr[car][plate_color]=="Black"){
 $plate_color="FFFFFF"; } 
 if($arr[car][plate_color]=="Red"){
 $plate_color="FF0000"; 
 } 
?>
	<a id="car_<?=$arr[car][id];?>" style="text-decoration:none; margin-top:30px;" onclick="selectCar('<?=$arr[car][id];?>');">
    	<table width="100%" border="0" cellspacing="2" cellpadding="2" id="div_car_<?=$arr[car][id];?>">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="1" cellspacing="2">
                           <tbody>
                           <tr>
                           <td width="100" align="center" bgcolor="<?=$plate_color;?>" style="border: solid 2px; height:20px; color:#DADADA; padding:5px; padding-right:0px;border-radius:5px;"><font color="#FFFFFF" class="font-28"><b><?=$arr[car][plate_num];?><br>
                                 <font class="font-20"><?=$arr[car][province];?></font></b></font>
                              </td>
                           </tr>
                        </tbody>
                        </table>
                        
                     </td>
                     <td width="50" align="center">
                      <label class="container">
					  <input type="checkbox" name="car" id="car_use_<?=$arr[car][id];?>" value="1">
					  <span class="checkmark"></span>
					</label>
                     </td>
                  </tr>
               </tbody>
            </table>
    </a>
<? } ?>
<input id="carid" value="" type="hidden" />
<? //echo $select; ?>
</div>
					</div>
			   	</td>
			   </tr>
            </tbody>
         </table>
     
   </div>
</div>



<div style="padding-bottom: 20px;padding-left: 20px;padding-right: 20px;padding-top:5px;">
<button onclick="selectjob('<?=$_POST[orderid];?>','<?=$_POST[id];?>','<?=$_POST[invoice];?>','<?=$_POST[code];?>','<?=$_POST[program][id];?>','<?=$_POST[pickup_place][id];?>','<?=$_POST[to_place][id];?>','<?=$_POST[agent];?>','<?=$_POST[airout_time];?>','<?=$_POST[airin_time];?>','<?=$_POST[s_cost];?>','<?=$_POST[outdate];?>','<?=$_POST[ondate];?>','<?=$_POST[s_status_pay];?>')" style="margin-top:10px;background-color: #fff;border: 1px solid #3b5998;width: 100%;border-radius: 25px;padding: 8px;color: #3b5998; "><span class="font-24"><strong><?=t_accept_order?></strong></span> </button>
</div>


	
</div>	

<script>
//	$('#back-full-popup').fadeOut(500);
$('#show_main_tool_bottom').fadeOut(500);

function selectCar(id){
//	$('#car_use_'+id).click();
//	
	$('input[type="checkbox"]').prop('checked', false); // Unchecks it
	$('#car_use_'+id).prop('checked', true); // Checks it
	$('#carid').val(id);
}
</script>