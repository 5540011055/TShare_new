 <? 
 $clock_color="#009999;font-size:26px";
  $no_clock_color="#999999;font-size:26px";
  $time_color="#009999";
  $spin=" fa-spin 2x";
 ?>
 
 
 <style type="text/css">
<!--
.topictransfer { padding-top:10px; font-size:16px;  font-weight:normal; color: <?=$main_color?> ; 
 
}
.style1 {font-size: 16px}
.style2 {font-size: 16}
-->
</style> 
  <?
 /*
if($daywork != ''){
	$daywork = $daywork;
}else{
$daywork = "2016-07-12";
}

*/
 //echo $_SESSION['data_user_name'];
//  echo $_GET[server];
?>
 
 <?
 
 /*
if($_GET[server]=="th"){
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}
if($_GET[server]=="cn"){
$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}
*/
//$daywork= $daywork;
$daywork = $_GET[day];
 
$select_order="id,invoice,program,orderid,pickup_place,to_place,carno,cartype,drivername,air,airin_time,airout_h,airout_m,airout_time,driver_remark,total,guest_name,guest_phone,server";


$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		mysql_query("SET NAMES UTF8"); 
		mysql_query("SET character_set_results=utf-8"); 
$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' and transfer_date='". $daywork."'  and status = 'CONFIRM'  and airout_time <>'' group by invoice order by  airout_time ASC ");
//  $res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' and transfer_date='". $daywork."'   order by  airout_time ASC  ");
$rows[project] = $db->rows($res[project]);

if($rows[project]){	
}else{
	$rows[project] = 0;
}

/// map th

/// map cn
  
	 

/*

$row_processing = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$daywork."' and status = 'CONFIRM' and driver_complete  ='0' group by carno  ");
$row_complete = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$daywork."' and status = 'CONFIRM' and driver_complete  ='1' group by carno  ");
*/
?>
 

      <div class="row" style="height:auto; padding:0px; margin-right:-10px; ">
				 
<?

$i=1;
while($arr[project] = $db->fetch($res[project])){



$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

if ($arr[project][server]=='th'){
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
} 
if ($arr[project][server]=='cn'){
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_cn_new."  ");
}
 
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_map[$arr[gg_map][id]] = $arr[gg_map][map];
		$arr_type[$arr[gg_map][id]] = $arr[gg_map][transferplace_type];
		$arr_star[$arr[gg_map][id]] = $arr[gg_map][star];
	}
 
 if ($arr[project][server]=='th'){
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace."  ");
} 
 if ($arr[project][server]=='cn'){
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace_cn."  ");
}
 while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_t_topic[$arr[gg_map][id]] = $arr[gg_map][topic];
		$arr_t_province[$arr[gg_map][id]] = $arr[gg_map][province];
		$arr_t_amphur[$arr[gg_map][id]] = $arr[gg_map][amphur];
	}
	


 
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
$arr[product] = $db->fetch($res[product]);
  
	$res[place] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
	$arr[place] = $db->fetch($res[place]);
	$res[to] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
	//////////
 
//for($i=1;$i<=6;$i++){
?>


 

        <div class="col-md-12" >
	  <div class="box box-danger" style="padding:10px; height:320px;  border: solid 2px #ECF0F5;display:none" onmouseover="this.style.border='solid 2px #FF6600';" onmouseout="this.style.border='solid 2px #ECF0F5';" id="booking_<?=$arr[project][invoice];?>"  >
	  
	 
		 
	  </div>  
   
              
  </div>  
 
   <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
			
			<? if($i==1){?>
            <li class="time-label" style="margin-right:25px;  ">
<span class="bg-red font_35" style="font-size:28px; margin-left:15px; width:100% "><center>
<? echo $daywork;   ?> </center>
              </span>
            </li>
			<? } ?>
 
			 

			
			
			
			
            <!-- timeline item -->
            <li style="margin-top:-5px;  ">
             

              <div class="timeline-item" style="margin-left:40px;  margin-right: 0px; margin-top:0px"><a rel="external" href="?name=view&file=show&id=<?=$arr[project][id];?>&day=<?=$daywork;?>&carno=<?=$arr[project][carno];?>&cartype=<?= $arr[product][cartype];?>&car_list=<?=$i;?>&sv=<?=$arr[project][server];?>">
             
<? if($i==1){?>
             <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top: 20px ">
			 <? } ?>
			 
			 <? if($i<>1){?>
             <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top: 30px; height:40px; ">
			 <? } ?>
   <tr>
    <td width="30"  style="background-color:#F6F6F6 ">

	
	<a  rel="external" href="?name=view&file=show&id=<?=$arr[project][id];?>&day=<?=$daywork;?>&carno=<?=$arr[project][carno];?>&cartype=<?= $arr[product][cartype];?>&car_list=<?=$i;?>&sv=<?=$arr[project][server];?>">
	<div class="cirnumbershow<? 	if($arr[project][driver_complete]=="1"){ ?>ok<? } ?>" id="cir_<?=$arr[project][invoice];?>"  >
		
	<table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="font-size:30px; color:#FFFFFF; font-weight:bold "><center><?=$i;?></center><? //=$arr[project][server];?></td>
  </tr>
</table>
</div> 
</a>
</td>
    <td width="80" height="30" style="background-color:#F3F3F3;   ">
		
	
	
	<? if($arr[product][cartype] == 2){  
	
	$work_type="จอย";
	
	?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
           <td style="font-size:22px ; color:#009999"><i class="fa fa-users"></i></td>
          <td  style="font-size:16px ; font-weight:bold; margin-left:-10px;">จอย </td>
        </tr>
      </table>
      <? }else{ 
	  $work_type="ไพรเวท";
	  
	  ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="font-size:22px ; color: #666666"><i class="fa fa-user"></i></td>
          <td  style="font-size:16px ; font-weight:bold">ไพรเวท</td>
        </tr>
      </table>
    <? } ?></td>
    <td valign="middle" style="font-size:16px ; font-weight:bold"> 
	
						<? if($arr[product][area] == 'In'){ 
						$work_area="รับเข้า";
						
						?> 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:25px ; color: #3399CC  " width="35">&nbsp;<i class="fa   fa-arrow-down "></i></td>
    <td style="font-size:16px ; font-weight:bold">&nbsp;รับเข้า</td>
  </tr>
</table>  
						  
						 
						   
						   <?  } elseif($arr[product][area] == 'Out'){
						   $work_area="ส่งออก";
						    ?>
						   
						   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:25px ; color: #FF0000  " width="35">&nbsp;<i class="fa   fa-arrow-up "></i></td>
    <td style="font-size:16px ; font-weight:bold">&nbsp;ส่งออก</td>
  </tr>
</table>  
 
						  
	 <? }elseif($arr[product][area] == 'Point'){ 
	 
	  $work_area="พ้อยท์ทูพ้อยท์";
	 ?>  
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:25px ; color: #666699 " width="35">&nbsp;<i class="fa   fa-share-alt"></i></td>
    <td style="font-size:16px ; font-weight:bold">&nbsp;พ้อยท์ทูพ้อยท์</td>
  </tr>
</table>  
						  
						   <? }else{ 
						   $work_area="เซอร์วิส";
						   
						   ?> 
												<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:22px ; color: #FF9900" width="35">&nbsp;<i class="fa  fa-taxi"></i></td>
    <td style="font-size:16px ; font-weight:bold">&nbsp;เซอร์วิส</td>
  </tr>
</table>
						
						   <? } ?> </td>
    <td width="50" valign="middle" style="font-size:16px ; font-weight:bold;padding-right:5px"> 
	
	<?
						if( $arr[project][server] == 'cn'){
	$link_vc = "http://www.t-bookingcn.com/";
}else{
	$link_vc = "http://www.t-booking.com/";
}

						?>   
	
	<a href="<?=$link_vc;?>/print.php?name=admin/voucher&file=transfer&no=<? echo $arr[project][vc_id];?>&order=<? echo $arr[project][orderid];?>&code=<? echo $arr[project][vc_code];?>" target="_blank">
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:22px ; color: #3399CC; color:#444444 " width="35">&nbsp;<i class="fa  fa-search-plus"></i></td>
        <td style="font-size:16px ; font-weight:bold">&nbsp;ดู</td>
      </tr>
    </table></a></td>
   </tr>
</table>
             <a rel="external" href="?name=view&file=show&id=<?=$arr[project][id];?>&day=<?=$daywork;?>&carno=<?=$arr[project][carno];?>&cartype=<?= $arr[product][cartype];?>&car_list=<?=$i;?>&sv=<?=$arr[project][server];?>">
<div class="btn-startwork" ><?echo $arr[project][airout_time];?>&nbsp;&nbsp; &nbsp;จัดการงาน </div></a>
 
              
             <style>
.timeline-header a {
font-size:18px; color:#006699; font-weight:bold; padding:3px;
}
.timeline-header {
font-size:18px; color:#006699; font-weight:bold; padding:3px;
}
.timeline-l { padding:5px;margin-left:20px;
}

</style>
                <div class="timeline-body">
 
                </div>
 
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa  fa-map-marker bg-blue" style="z-index:1; color:#FFFFFF "></i>

              <div class="timeline-item"  style="margin-left:40px; margin-right: 0px;">
                <span class="time" style="font-size:16px"><i class="fa fa-clock-o  <? 	if($arr[project][driver_topoint_date]<>""){ echo $spin; } ?>" style="color:<? 	if($arr[project][driver_topoint_date]<>""){ echo $clock_color;} else {  echo $no_clock_color; }?>" ></i> 
				       <div  style="font-size:16px; margin-top:-22px; margin-left:25px;">     
					   
					 
							<? 	if($arr[project][driver_topoint_date]<>""){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_topoint_date]- 25200,'1','short'); ?></b></font>
<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>			 
			
			</div>
				
				
				</span>

                <h3 class="timeline-header" style="padding-top:10px; padding-bottom:5px; "><a >สถานที่รับ</a></h3>
				<div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; "><? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
                                   <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
                                   <?=$arr_t_province[$arr[project][pickup_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][pickup_place]];?>
      )
      <? } ?>

				
                </div>
				
				
              </div>
            </li>
 
			
            <!-- END timeline item -->
			
			<?
			 if($arr[product][area] == 'In'){ 
			 
			 $work_airin="เที่ยวบิน".$arr[project][air]. "";
			  ?>
			   <!-- timeline item -->
            <li  >
              <i class="fa  fa fa-plane"  style="z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;">
                <span class="time" style="font-size:16px"> <? echo $arr[project][airin_time];?></span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a ><font color="#666666">เที่ยวบิน</font></a> <B><? // echo $arr[project][airin_time];?></B></div>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; "> <?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?>
                </div>
 
              </div>
            </li>
			<? } 
			
						if($arr[product][area] <> 'In'){ 
			
			$work_airin="";
			}
			
			?>
			
			
			
			
			
            <!-- timeline item -->
            <li  >
              <i class="fa  fa-users bg-green"  style="z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;">
                <span class="time" style="font-size:16px"><i class="fa fa-clock-o <? 	if($arr[project][driver_pickup_date]<>""){ echo $spin; } ?>" 
				style="color:<? 	if($arr[project][driver_pickup_date]<>""){ echo $clock_color;} else {  echo $no_clock_color; }?>"
				
				>
				
				</i> 
				 
				        <div  style="font-size:16px; margin-top:-22px; margin-left:25px;">      
			<? 	if($arr[project][driver_pickup_date]<>""){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_pickup_date]- 25200,'1','short'); ?> </b></font>
			<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>
 
			
				</div>
				
				</span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a ><font >รับแขก</font></a> <span class="font_26" style="margin-top:-5px; position:absolute "><B >&nbsp;&nbsp;<? echo $arr[project][airout_time];?></B></span></div>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; ">
				
				
				<? if($arr[project][guest_phone]<>''){?>   
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; ">
  <tr>
    <td width="25"><i class="fa  fa-phone" style="color:#999999; font-size:20px"></i></td>
    <td style="color:#666666;font-size:16px"><b><?=$arr[project][guest_phone];?></b></td>
  </tr>
</table>

				<? } ?>
 
				<?=$arr[project][guest_name]?>
                </div>
 
              </div>
            </li>
            <!-- END timeline item -->
			  
			
			<!-- timeline item -->
            <li>
              <i class="fa fa-map-marker bg-blue"  style="z-index:1 "></i></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;">
                <span class="time" style="font-size:16px"><i class="fa fa-clock-o <? 	if($arr[project][driver_complete_date]<>""){ echo $spin; } ?>" style="color:<? 	if($arr[project][driver_complete_date]<>""){ echo $clock_color;} else {  echo $no_clock_color; }?>"></i>   
				
				  <div  style="font-size:16px; margin-top:-22px; margin-left:25px;">
				<? 	if($arr[project][driver_complete_date]<>""){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_complete_date]- 25200,'1','short'); ?> </b>
			<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>
			</div>
			</span>

                <h3 class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a >สถานที่ส่ง</a></h3>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; ">
				

				
				
<? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
                                   <? echo $arr_t_topic[$arr[project][to_place]];?> (
                                   <?=$arr_t_province[$arr[project][to_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][to_place]];?>
      )
      <? } ?>
                </div>
 
              </div>
            </li>
            <!-- END timeline item -->
			
			
            
			
			
            <!-- /.timeline-label -->
			
			
			<? if($arr[product][area] == 'Out'){  
			
			  $work_airout="เที่ยวบิน".$arr[project][air]. "";
			
			?>
			   <!-- timeline item -->
            <li  >
              <i class="fa  fa fa-plane"  style="z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;">
                <span class="time" style="font-size:16px">  <? echo $arr[project][airin_time];?></span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a ><font color="#666666">เที่ยวบิน</font></a> <B></B></div>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; "> <?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?>
                </div>
 
              </div>
            </li>
			<? }
			
			 
			
			 ?>
            <!-- END timeline item -->
            <!-- timeline item -->
          
            <!-- END timeline item -->
            <!-- timeline item -->
     
 
  
			   
            <!-- END timeline item -->
            <li style="margin-bottom:-30px; ">
              <i></i>
            </li>
			
          </ul>
 

<?
$i++;	
}
$db->closedb ();
?>  </div>  

 